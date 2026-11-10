<?php

test('portal nasabah meminta autentikasi', function (string $route) {
    $this->get(route($route))->assertRedirect(route('login'));
})->with([
    'nasabah.dashboard',
    'nasabah.simpanan',
    'nasabah.pinjaman',
    'nasabah.pinjaman.pengajuan',
    'nasabah.toko',
    'nasabah.transaksi',
    'nasabah.dokumen',
    'nasabah.profil',
]);
