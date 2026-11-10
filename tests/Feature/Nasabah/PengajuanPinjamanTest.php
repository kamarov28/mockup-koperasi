<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function createLoanApplicationTable(): void
{
    Schema::create('pinjaman', function (Blueprint $table) {
        $table->integer('user_id')->nullable();
        $table->decimal('jumlah_pinjaman');
        $table->integer('jangka_waktu')->nullable();
        $table->decimal('angsuran_per_bulan')->nullable();
        $table->string('keperluan')->nullable();
        $table->string('status')->nullable();
        $table->date('tanggal_pencairan')->nullable();
        $table->timestamps();
    });
}

test('verified nasabah can submit a loan application for themselves as pending review', function () {
    createLoanApplicationTable();

    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('nasabah.pinjaman.pengajuan.store'), [
            'amount' => '2500000',
            'tenor' => '12',
            'purpose' => 'modal_usaha',
            'user_id' => 999,
            'status' => 'Disetujui',
            'tanggal_pencairan' => '2026-11-09',
        ])
        ->assertRedirect(route('nasabah.pinjaman'))
        ->assertSessionHas('status');

    $application = DB::table('pinjaman')->first();

    expect(DB::table('pinjaman')->count())->toBe(1)
        ->and($application->user_id)->toBe($user->id)
        ->and((float) $application->jumlah_pinjaman)->toBe(2500000.0)
        ->and($application->jangka_waktu)->toBe(12)
        ->and($application->keperluan)->toBe('Modal Usaha')
        ->and($application->status)->toBe('Menunggu Verifikasi')
        ->and($application->angsuran_per_bulan)->toBeNull()
        ->and($application->tanggal_pencairan)->toBeNull();
});

test('guests cannot submit a loan application', function () {
    $this->post(route('nasabah.pinjaman.pengajuan.store'), [
        'amount' => '2500000',
        'tenor' => '12',
        'purpose' => 'modal_usaha',
    ])->assertRedirect(route('login'));
});

test('loan applications reject invalid amounts, tenors, and purposes', function () {
    createLoanApplicationTable();

    $this->actingAs(User::factory()->create())
        ->from(route('nasabah.pinjaman.pengajuan'))
        ->post(route('nasabah.pinjaman.pengajuan.store'), [
            'amount' => '-10',
            'tenor' => '5',
            'purpose' => 'approve_me',
        ])
        ->assertRedirect(route('nasabah.pinjaman.pengajuan'))
        ->assertSessionHasErrors(['amount', 'tenor', 'purpose']);

    expect(DB::table('pinjaman')->count())->toBe(0);
});

test('loan tenor choices honor the maximum configured by the administrator', function () {
    createLoanApplicationTable();
    DB::table('koperasi_settings')->insert([
        'key' => 'max_tenor',
        'value' => '12',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    $user = User::factory()->create();
    $this->actingAs($user)
        ->get(route('nasabah.pinjaman.pengajuan'))
        ->assertOk()
        ->assertSee('12 Bulan')
        ->assertDontSee('24 Bulan');

    $this->from(route('nasabah.pinjaman.pengajuan'))
        ->post(route('nasabah.pinjaman.pengajuan.store'), [
            'amount' => 1000000,
            'tenor' => 24,
            'purpose' => 'pendidikan',
        ])
        ->assertSessionHasErrors('tenor');

    expect(DB::table('pinjaman')->count())->toBe(0);
});
