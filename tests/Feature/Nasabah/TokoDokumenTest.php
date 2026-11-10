<?php

use App\Models\User;
use Database\Seeders\TokoProductSeeder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function createTokoTestTables(): void
{
    Schema::dropIfExists('toko_order_items');
    Schema::dropIfExists('toko_orders');
    Schema::dropIfExists('toko_products');
    $migration = require database_path('migrations/2026_11_10_000000_create_toko_tables.php');
    $migration->up();
}

function createDocumentTestTables(): void
{
    Schema::create('simpanan', function (Blueprint $table) {
        $table->integer('user_id');
        $table->date('tanggal');
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });

    Schema::create('transaksi', function (Blueprint $table) {
        $table->integer('user_id');
        $table->date('tanggal');
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->string('keterangan');
        $table->timestamps();
    });

    Schema::create('pinjaman', function (Blueprint $table) {
        $table->integer('user_id');
        $table->decimal('jumlah_pinjaman', 15, 2);
        $table->integer('jangka_waktu')->nullable();
        $table->decimal('angsuran_per_bulan', 15, 2)->nullable();
        $table->string('keperluan')->nullable();
        $table->string('status')->nullable();
        $table->date('tanggal_pencairan')->nullable();
        $table->timestamps();
    });
}

test('nasabah can place an order and stock is reduced atomically', function () {
    createTokoTestTables();

    $user = User::factory()->create();
    $productId = DB::table('toko_products')->insertGetId([
        'sku' => 'TEST-001',
        'name' => 'Buku Uji',
        'category' => 'ATK & Buku',
        'description' => 'Produk untuk pengujian.',
        'price' => 10000,
        'stock' => 5,
        'unit' => 'Unit',
        'is_active' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->actingAs($user)
        ->post(route('nasabah.toko.cart.add'), [
            'product_id' => $productId,
            'quantity' => 2,
        ])
        ->assertRedirect(route('nasabah.toko'));

    $this->post(route('nasabah.toko.checkout'), [
        'payment_method' => 'tunai',
        'pickup_note' => 'Ambil saat istirahat',
    ])
        ->assertRedirect(route('nasabah.toko'))
        ->assertSessionHas('status');

    $order = DB::table('toko_orders')->first();
    $item = DB::table('toko_order_items')->first();

    expect(DB::table('toko_orders')->count())->toBe(1)
        ->and($order->user_id)->toBe($user->id)
        ->and($order->status)->toBe('Menunggu Konfirmasi')
        ->and((float) $order->total)->toBe(20000.0)
        ->and($item->product_name)->toBe('Buku Uji')
        ->and($item->quantity)->toBe(2)
        ->and($item->unit)->toBe('Unit')
        ->and(DB::table('toko_products')->where('id', $productId)->value('stock'))->toBe(3);

    $this->get(route('nasabah.toko'))
        ->assertOk()
        ->assertSee('Buku Uji')
        ->assertSee($order->order_number)
        ->assertSee('Menunggu Konfirmasi');
});

test('catalog seeder does not replace existing stock levels', function () {
    createTokoTestTables();

    (new TokoProductSeeder)->run();
    DB::table('toko_products')->where('sku', 'SKU-ATK-001')->update(['stock' => 7]);
    (new TokoProductSeeder)->run();

    expect(DB::table('toko_products')->where('sku', 'SKU-ATK-001')->value('stock'))->toBe(7)
        ->and(DB::table('toko_products')->count())->toBe(7);
});

test('checkout rejects a cart if stock was reduced after it was added', function () {
    createTokoTestTables();

    $user = User::factory()->create();
    $productId = DB::table('toko_products')->insertGetId([
        'sku' => 'TEST-002',
        'name' => 'Produk Stok Terbatas',
        'category' => 'ATK & Buku',
        'price' => 1000,
        'stock' => 1,
        'unit' => 'Unit',
        'is_active' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->actingAs($user)
        ->withSession(['toko_cart' => [$productId => 2]])
        ->from(route('nasabah.toko'))
        ->post(route('nasabah.toko.checkout'), ['payment_method' => 'qris'])
        ->assertRedirect(route('nasabah.toko'))
        ->assertSessionHasErrors('cart');

    expect(DB::table('toko_orders')->count())->toBe(0)
        ->and(DB::table('toko_products')->where('id', $productId)->value('stock'))->toBe(1);
});

test('nasabah document summary uses only their real financial records', function () {
    createDocumentTestTables();

    $user = User::factory()->create(['name' => 'Anggota Aktif']);
    $otherUser = User::factory()->create(['name' => 'Anggota Lain']);

    DB::table('simpanan')->insert([
        [
            'user_id' => $user->id,
            'tanggal' => '2026-11-01',
            'jenis' => 'Wajib',
            'jumlah' => 150000,
            'keterangan' => 'Setoran bulanan',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $user->id,
            'tanggal' => '2026-11-02',
            'jenis' => 'Sukarela',
            'jumlah' => 25000,
            'keterangan' => 'Penarikan tunai',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'user_id' => $otherUser->id,
            'tanggal' => '2026-11-03',
            'jenis' => 'Wajib',
            'jumlah' => 990000,
            'keterangan' => 'Data rahasia',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);

    DB::table('transaksi')->insert([
        'user_id' => $user->id,
        'tanggal' => '2026-11-02',
        'jenis' => 'Simpanan',
        'jumlah' => 150000,
        'keterangan' => 'Setoran bulanan',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $this->actingAs($user)
        ->get(route('nasabah.dokumen', ['document' => 'simpanan']))
        ->assertOk()
        ->assertSee('Anggota Aktif')
        ->assertSee('Rp 125.000')
        ->assertSee('Setoran bulanan')
        ->assertDontSee('Anggota Lain')
        ->assertDontSee('Data rahasia');
});
