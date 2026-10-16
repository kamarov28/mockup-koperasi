<?php

test('portal nasabah dapat diakses dengan sukses', function (string $route) {
    $response = $this->get(route($route));

    $response->assertOk();
})->with([
    'nasabah.dashboard',
    'nasabah.simpanan',
    'nasabah.pinjaman',
    'nasabah.pinjaman.pengajuan',
    'nasabah.transaksi',
    'nasabah.dokumen',
    'nasabah.profil',
]);
