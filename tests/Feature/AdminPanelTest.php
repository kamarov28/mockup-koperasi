<?php

test('panel admin dapat diakses dengan sukses', function (string $route) {
    $response = $this->get(route($route));

    $response->assertOk();
})->with([
    'admin.dashboard',
    'admin.nasabah',
    'admin.simpanan',
    'admin.pinjaman',
    'admin.transaksi',
    'admin.laporan',
    'admin.pengaturan',
]);
