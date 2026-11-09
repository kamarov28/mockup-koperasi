<?php

use App\Http\Controllers\Nasabah\DashboardController;
use App\Http\Controllers\Nasabah\PengajuanPinjamanController;
use App\Http\Controllers\Nasabah\PinjamanController;
use App\Http\Controllers\Nasabah\ProfilController;
use App\Http\Controllers\Nasabah\SimpananController;
use App\Http\Controllers\Nasabah\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/kontak', 'kontak')->name('kontak');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Nasabah Routes
    Route::prefix('nasabah')->name('nasabah.')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::get('/simpanan', SimpananController::class)->name('simpanan');
        Route::view('/pinjaman/pengajuan', 'nasabah.pengajuan-pinjaman')->name('pinjaman.pengajuan');
        Route::post('/pinjaman/pengajuan', [PengajuanPinjamanController::class, 'store'])->name('pinjaman.pengajuan.store');
        Route::get('/pinjaman', PinjamanController::class)->name('pinjaman');
        Route::get('/transaksi', TransaksiController::class)->name('transaksi');
        Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
        Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
    });

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

require __DIR__.'/settings.php';
