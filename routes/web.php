<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/kontak', 'kontak')->name('kontak');

// Nasabah Routes
Route::prefix('nasabah')->name('nasabah.')->group(function () {
    Route::view('/dashboard', 'nasabah.dashboard')->name('dashboard');
    Route::view('/simpanan', 'nasabah.simpanan')->name('simpanan');
    Route::view('/pinjaman/pengajuan', 'nasabah.pengajuan-pinjaman')->name('pinjaman.pengajuan');
    Route::view('/pinjaman', 'nasabah.pinjaman')->name('pinjaman');
    Route::view('/transaksi', 'nasabah.transaksi')->name('transaksi');
    Route::view('/profil', 'nasabah.profil')->name('profil');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/nasabah', 'admin.nasabah')->name('nasabah');
    Route::view('/simpanan', 'admin.simpanan')->name('simpanan');
    Route::view('/pinjaman', 'admin.pinjaman')->name('pinjaman');
    Route::view('/transaksi', 'admin.transaksi')->name('transaksi');
    Route::view('/laporan', 'admin.laporan')->name('laporan');
    Route::view('/pengaturan', 'admin.pengaturan')->name('pengaturan');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'nasabah.dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
