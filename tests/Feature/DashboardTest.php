<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function createDashboardDataTables(): void
{
    Schema::create('simpanan', function (Blueprint $table) {
        $table->integer('user_id')->nullable();
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->text('keterangan')->nullable();
        $table->date('tanggal');
        $table->timestamps();
    });

    Schema::create('pinjaman', function (Blueprint $table) {
        $table->integer('user_id')->nullable();
        $table->decimal('jumlah_pinjaman', 15, 2);
        $table->integer('jangka_waktu')->nullable();
        $table->decimal('angsuran_per_bulan', 15, 2)->nullable();
        $table->string('keperluan')->nullable();
        $table->string('status')->nullable();
        $table->date('tanggal_pencairan')->nullable();
        $table->timestamps();
    });

    Schema::create('transaksi', function (Blueprint $table) {
        $table->integer('user_id')->nullable();
        $table->string('jenis');
        $table->decimal('jumlah', 15, 2);
        $table->string('keterangan');
        $table->date('tanggal');
        $table->timestamp('created_at')->nullable();
    });
}

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    createDashboardDataTables();

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('nasabah.dashboard'));
});

test('admin users are redirected to the admin dashboard', function () {
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('nasabah');
    });

    $user = User::factory()->create();
    $user->forceFill(['role' => 'admin'])->save();

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertRedirect(route('admin.dashboard'));
});

test('nasabah dashboard shows summaries and transactions for the authenticated user only', function () {
    createDashboardDataTables();

    $user = User::factory()->create(['name' => 'Nasabah Uji']);
    $otherUser = User::factory()->create();

    DB::table('simpanan')->insert([
        ['user_id' => $user->id, 'jenis' => 'Wajib', 'jumlah' => 1200000, 'tanggal' => '2026-11-08'],
        ['user_id' => $otherUser->id, 'jenis' => 'Wajib', 'jumlah' => 9900000, 'tanggal' => '2026-11-08'],
    ]);

    DB::table('pinjaman')->insert([
        ['user_id' => $user->id, 'jumlah_pinjaman' => 3000000, 'status' => 'Disetujui'],
        ['user_id' => $user->id, 'jumlah_pinjaman' => 700000, 'status' => 'Lunas'],
        ['user_id' => $otherUser->id, 'jumlah_pinjaman' => 8800000, 'status' => 'Aktif'],
    ]);

    DB::table('transaksi')->insert([
        [
            'user_id' => $user->id,
            'jenis' => 'Simpanan',
            'jumlah' => 200000,
            'keterangan' => 'Setoran milik nasabah',
            'tanggal' => '2026-11-08',
            'created_at' => '2026-11-08 12:00:00',
        ],
        [
            'user_id' => $otherUser->id,
            'jenis' => 'Simpanan',
            'jumlah' => 999999,
            'keterangan' => 'Data rahasia nasabah lain',
            'tanggal' => '2026-11-09',
            'created_at' => '2026-11-09 12:00:00',
        ],
    ]);

    $this->actingAs($user)
        ->get(route('nasabah.dashboard'))
        ->assertOk()
        ->assertSee('Halo, Nasabah Uji!')
        ->assertSee('Rp 1.200.000')
        ->assertSee('Rp 3.000.000')
        ->assertSee('Setoran milik nasabah')
        ->assertDontSee('Data rahasia nasabah lain')
        ->assertDontSee('Rp 9.900.000');
});

test('guests cannot visit the nasabah dashboard', function () {
    $this->get(route('nasabah.dashboard'))
        ->assertRedirect(route('login'));
});

test('nasabah savings page shows their balance and history only', function () {
    createDashboardDataTables();

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    DB::table('simpanan')->insert([
        [
            'user_id' => $user->id,
            'jenis' => 'Wajib',
            'jumlah' => 500000,
            'tanggal' => '2026-11-08',
            'keterangan' => 'Setoran',
        ],
        [
            'user_id' => $user->id,
            'jenis' => 'Sukarela',
            'jumlah' => 100000,
            'tanggal' => '2026-11-09',
            'keterangan' => 'Penarikan',
        ],
        [
            'user_id' => $otherUser->id,
            'jenis' => 'Wajib',
            'jumlah' => 9900000,
            'tanggal' => '2026-11-09',
            'keterangan' => 'Data rahasia nasabah lain',
        ],
    ]);

    $this->actingAs($user)
        ->get(route('nasabah.simpanan'))
        ->assertOk()
        ->assertSee('Rp 400.000')
        ->assertSee('Wajib')
        ->assertSee('Penarikan')
        ->assertDontSee('Data rahasia nasabah lain')
        ->assertDontSee('Rp 9.900.000');
});

test('guests cannot visit the nasabah savings page', function () {
    $this->get(route('nasabah.simpanan'))
        ->assertRedirect(route('login'));
});

test('nasabah loans page shows their loan records and active total only', function () {
    createDashboardDataTables();

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    DB::table('pinjaman')->insert([
        [
            'user_id' => $user->id,
            'jumlah_pinjaman' => 3000000,
            'jangka_waktu' => 6,
            'angsuran_per_bulan' => 550000,
            'keperluan' => 'Pendidikan',
            'status' => 'Disetujui',
            'tanggal_pencairan' => '2026-11-08',
        ],
        [
            'user_id' => $user->id,
            'jumlah_pinjaman' => 700000,
            'jangka_waktu' => 3,
            'angsuran_per_bulan' => 250000,
            'keperluan' => 'Lainnya',
            'status' => 'Lunas',
            'tanggal_pencairan' => '2026-10-01',
        ],
        [
            'user_id' => $otherUser->id,
            'jumlah_pinjaman' => 9900000,
            'jangka_waktu' => 12,
            'angsuran_per_bulan' => 900000,
            'keperluan' => 'Rahasia',
            'status' => 'Aktif',
            'tanggal_pencairan' => '2026-11-09',
        ],
    ]);

    $this->actingAs($user)
        ->get(route('nasabah.pinjaman'))
        ->assertOk()
        ->assertSee('Rp 3.000.000')
        ->assertSee('Disetujui')
        ->assertSee('Lunas')
        ->assertDontSee('Rp 9.900.000')
        ->assertDontSee('Rahasia');
});

test('guests cannot visit the nasabah loans page', function () {
    $this->get(route('nasabah.pinjaman'))
        ->assertRedirect(route('login'));
});

test('nasabah can search and filter only their own transactions', function () {
    createDashboardDataTables();

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    DB::table('transaksi')->insert([
        [
            'user_id' => $user->id,
            'jenis' => 'Simpanan',
            'jumlah' => 100000,
            'keterangan' => 'Setoran bulanan',
            'tanggal' => '2026-11-08',
            'created_at' => '2026-11-08 12:00:00',
        ],
        [
            'user_id' => $user->id,
            'jenis' => 'Pinjaman',
            'jumlah' => 500000,
            'keterangan' => 'Pencairan',
            'tanggal' => '2026-11-09',
            'created_at' => '2026-11-09 12:00:00',
        ],
        [
            'user_id' => $otherUser->id,
            'jenis' => 'Simpanan',
            'jumlah' => 9900000,
            'keterangan' => 'Data rahasia nasabah lain',
            'tanggal' => '2026-11-09',
            'created_at' => '2026-11-09 13:00:00',
        ],
    ]);

    $this->actingAs($user)
        ->get(route('nasabah.transaksi', ['jenis' => 'simpanan', 'q' => 'bulanan']))
        ->assertOk()
        ->assertSee('Setoran bulanan')
        ->assertDontSee('Pencairan')
        ->assertDontSee('Data rahasia nasabah lain')
        ->assertDontSee('Rp 9.900.000');
});

test('guests cannot visit the nasabah transactions page', function () {
    $this->get(route('nasabah.transaksi'))
        ->assertRedirect(route('login'));
});
