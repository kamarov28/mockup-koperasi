<?php

use App\Models\User;

test('panel admin meminta autentikasi', function (string $route) {
    $this->get(route($route))->assertRedirect(route('login'));
})->with([
    'admin.dashboard',
    'admin.nasabah',
    'admin.simpanan',
    'admin.pinjaman',
    'admin.transaksi',
    'admin.laporan',
    'admin.pengaturan',
]);

test('nasabah tidak dapat membuka panel admin', function (string $route) {
    $this->actingAs(User::factory()->create())
        ->get(route($route))
        ->assertForbidden();
})->with([
    'admin.dashboard',
    'admin.nasabah',
    'admin.simpanan',
    'admin.pinjaman',
    'admin.transaksi',
    'admin.laporan',
    'admin.pengaturan',
]);
