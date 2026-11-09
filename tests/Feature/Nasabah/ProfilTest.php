<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

function addNasabahProfileColumns(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('no_anggota')->nullable();
        $table->string('no_telepon')->nullable();
        $table->text('alamat')->nullable();
    });
}

test('guests cannot visit the nasabah profile', function () {
    $this->get(route('nasabah.profil'))
        ->assertRedirect(route('login'));
});

test('nasabah profile shows account and membership information', function () {
    addNasabahProfileColumns();

    $user = User::factory()->create([
        'name' => 'Nasabah Uji',
        'no_telepon' => '08123456789',
        'alamat' => 'Jl. Contoh No. 1',
    ]);
    $user->no_anggota = 'KSP-123';
    $user->save();

    $this->actingAs($user)
        ->get(route('nasabah.profil'))
        ->assertOk()
        ->assertSee('Nasabah Uji')
        ->assertSee('KSP-123')
        ->assertSee('08123456789')
        ->assertSee('Jl. Contoh No. 1')
        ->assertSee($user->email);
});

test('nasabah can update only their contact information', function () {
    addNasabahProfileColumns();

    $user = User::factory()->create([
        'name' => 'Nama Tetap',
        'no_telepon' => '08000000000',
        'alamat' => 'Alamat Lama',
    ]);
    $user->no_anggota = 'KSP-123';
    $user->save();

    $this->actingAs($user)
        ->put(route('nasabah.profil.update'), [
            'no_telepon' => '08123456789',
            'alamat' => 'Jl. Baru No. 2',
            'name' => 'Nama Tidak Sah',
            'no_anggota' => 'KSP-999',
            'role' => 'admin',
        ])
        ->assertRedirect(route('nasabah.profil'))
        ->assertSessionHas('status');

    $user->refresh();

    expect($user->no_telepon)->toBe('08123456789')
        ->and($user->alamat)->toBe('Jl. Baru No. 2')
        ->and($user->name)->toBe('Nama Tetap')
        ->and($user->no_anggota)->toBe('KSP-123');
});

test('profile contact fields are validated', function () {
    addNasabahProfileColumns();

    $user = User::factory()->create();

    $this->actingAs($user)
        ->from(route('nasabah.profil'))
        ->put(route('nasabah.profil.update'), [
            'no_telepon' => str_repeat('1', 31),
            'alamat' => str_repeat('a', 1001),
        ])
        ->assertRedirect(route('nasabah.profil'))
        ->assertSessionHasErrors(['no_telepon', 'alamat']);
});
