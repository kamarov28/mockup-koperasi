<?php

test('halaman publik dapat diakses dengan sukses', function (string $route) {
    $response = $this->get(route($route));

    $response->assertOk();
})->with([
    'home',
    'tentang',
    'layanan',
    'berita',
    'galeri',
    'kontak',
]);
