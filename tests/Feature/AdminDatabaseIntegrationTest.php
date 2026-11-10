<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function createAdminIntegrationTables(): void
{
    Schema::dropIfExists('toko_order_items');
    Schema::dropIfExists('toko_orders');
    Schema::dropIfExists('toko_products');
    Schema::dropIfExists('simpanan');
    Schema::dropIfExists('transaksi');
    Schema::dropIfExists('pinjaman');

    if (! Schema::hasColumn('users', 'role')) {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('role')->default('nasabah');
        });
    }

    Schema::create('simpanan', function (Blueprint $table): void {
        $table->integer('user_id');
        $table->date('tanggal');
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->text('keterangan')->nullable();
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('transaksi', function (Blueprint $table): void {
        $table->integer('user_id');
        $table->date('tanggal');
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->string('keterangan');
        $table->timestamp('created_at')->nullable();
    });

    Schema::create('pinjaman', function (Blueprint $table): void {
        $table->id();
        $table->integer('user_id');
        $table->decimal('jumlah_pinjaman', 15, 2);
        $table->integer('jangka_waktu')->nullable();
        $table->decimal('angsuran_per_bulan', 15, 2)->nullable();
        $table->string('keperluan')->nullable();
        $table->string('status')->nullable();
        $table->date('tanggal_pencairan')->nullable();
        $table->timestamps();
    });

    $migration = require database_path('migrations/2026_11_10_000000_create_toko_tables.php');
    $migration->up();
}

function createAdminActor(): User
{
    $admin = User::factory()->create();
    DB::table('users')->where('id', $admin->id)->update(['role' => 'admin']);

    return $admin->forceFill(['role' => 'admin']);
}

test('admin pages display database-backed content', function () {
    createAdminIntegrationTables();
    $admin = createAdminActor();
    $member = User::factory()->create(['name' => 'Nasabah Uji']);

    foreach ([
        'admin.dashboard',
        'admin.nasabah',
        'admin.simpanan',
        'admin.pinjaman',
        'admin.transaksi',
        'admin.laporan',
        'admin.pengaturan',
    ] as $route) {
        $this->actingAs($admin)->get(route($route))->assertOk();
    }

    $this->get(route('admin.nasabah', ['q' => 'Nasabah Uji']))
        ->assertOk()
        ->assertSee('Nasabah Uji');
    expect($member->exists)->toBeTrue();
});

test('admin saving entries update both savings and transaction ledgers and prevent overdrafts', function () {
    createAdminIntegrationTables();
    $admin = createAdminActor();
    $member = User::factory()->create();

    $this->actingAs($admin)->post(route('admin.simpanan.store'), [
        'user_id' => $member->id,
        'direction' => 'setor',
        'jenis' => 'Sukarela',
        'jumlah' => 50000,
        'keterangan' => 'Setoran loket',
    ])->assertRedirect(route('admin.simpanan'));

    $this->post(route('admin.simpanan.store'), [
        'user_id' => $member->id,
        'direction' => 'tarik',
        'jenis' => 'Sukarela',
        'jumlah' => 10000,
        'keterangan' => 'Tarik tunai',
    ])->assertRedirect(route('admin.simpanan'));

    expect(DB::table('simpanan')->count())->toBe(2)
        ->and(DB::table('transaksi')->count())->toBe(2)
        ->and((float) DB::table('transaksi')->where('jenis', 'penarikan')->value('jumlah'))->toBe(10000.0);

    $this->from(route('admin.simpanan'))->post(route('admin.simpanan.store'), [
        'user_id' => $member->id,
        'direction' => 'tarik',
        'jenis' => 'Sukarela',
        'jumlah' => 50000,
    ])->assertSessionHasErrors('jumlah');

    expect(DB::table('simpanan')->count())->toBe(2)
        ->and(DB::table('transaksi')->count())->toBe(2);
});

test('approving a loan calculates the configured flat monthly installment without disbursing it', function () {
    createAdminIntegrationTables();
    $admin = createAdminActor();
    $member = User::factory()->create();
    $loan = DB::table('pinjaman')->insertGetId([
        'user_id' => $member->id,
        'jumlah_pinjaman' => 10000000,
        'jangka_waktu' => 12,
        'status' => 'Menunggu Verifikasi',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->actingAs($admin)
        ->post(route('admin.pinjaman.decide', [$loan, 'approve']))
        ->assertRedirect(route('admin.pinjaman'));

    $record = DB::table('pinjaman')->where('id', $loan)->first();
    expect((float) $record->angsuran_per_bulan)->toBe(933333.33)
        ->and($record->status)->toBe('Disetujui')
        ->and($record->tanggal_pencairan)->toBeNull()
        ->and(DB::table('transaksi')->count())->toBe(0);
});

test('confirming a store order creates one payment transaction and rejection restores stock', function () {
    createAdminIntegrationTables();
    $admin = createAdminActor();
    $member = User::factory()->create();
    $product = DB::table('toko_products')->insertGetId([
        'sku' => 'ADMIN-001',
        'name' => 'Buku',
        'category' => 'ATK & Buku',
        'price' => 10000,
        'stock' => 3,
        'unit' => 'Unit',
        'is_active' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    $order = DB::table('toko_orders')->insertGetId([
        'user_id' => $member->id,
        'order_number' => 'TOKO-TEST-001',
        'status' => 'Menunggu Konfirmasi',
        'payment_method' => 'tunai',
        'total' => 20000,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    DB::table('toko_order_items')->insert([
        'order_id' => $order,
        'product_id' => $product,
        'product_name' => 'Buku',
        'quantity' => 2,
        'unit' => 'Unit',
        'unit_price' => 10000,
        'line_total' => 20000,
    ]);

    $this->actingAs($admin)
        ->post(route('admin.transaksi.order', [$order, 'complete']))
        ->assertRedirect(route('admin.transaksi'));

    expect(DB::table('transaksi')->where('jenis', 'toko')->count())->toBe(1)
        ->and(DB::table('toko_orders')->where('id', $order)->value('status'))->toBe('Selesai');

    $this->from(route('admin.transaksi'))
        ->post(route('admin.transaksi.order', [$order, 'complete']))
        ->assertSessionHasErrors('status');
    expect(DB::table('transaksi')->where('jenis', 'toko')->count())->toBe(1);

    $rejectedOrder = DB::table('toko_orders')->insertGetId([
        'user_id' => $member->id,
        'order_number' => 'TOKO-TEST-002',
        'status' => 'Menunggu Konfirmasi',
        'payment_method' => 'qris',
        'total' => 10000,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    DB::table('toko_order_items')->insert([
        'order_id' => $rejectedOrder,
        'product_id' => $product,
        'product_name' => 'Buku',
        'quantity' => 1,
        'unit' => 'Unit',
        'unit_price' => 10000,
        'line_total' => 10000,
    ]);

    $this->post(route('admin.transaksi.order', [$rejectedOrder, 'reject']))
        ->assertRedirect(route('admin.transaksi'));

    expect(DB::table('toko_products')->where('id', $product)->value('stock'))->toBe(4)
        ->and(DB::table('toko_orders')->where('id', $rejectedOrder)->value('status'))->toBe('Ditolak');
});

test('admin settings persist submitted cooperative parameters', function () {
    createAdminIntegrationTables();

    $this->actingAs(createAdminActor())
        ->put(route('admin.pengaturan.update'), [
            'cooperative_name' => 'Koperasi Uji',
            'legal_number' => 'AHU-123',
            'contact' => '08123456789',
            'address' => 'Jl. Uji',
            'principal_savings' => 500000,
            'monthly_savings' => 100000,
            'interest_rate' => 1,
            'max_tenor' => 24,
        ])
        ->assertRedirect(route('admin.pengaturan'));

    expect(DB::table('koperasi_settings')->where('key', 'cooperative_name')->value('value'))->toBe('Koperasi Uji')
        ->and(DB::table('koperasi_settings')->where('key', 'interest_rate')->value('value'))->toBe('1');
});
