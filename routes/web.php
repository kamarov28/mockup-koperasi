<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardRedirectController;
use App\Http\Controllers\Nasabah\DashboardController;
use App\Http\Controllers\Nasabah\DokumenController;
use App\Http\Controllers\Nasabah\PengajuanPinjamanController;
use App\Http\Controllers\Nasabah\PinjamanController;
use App\Http\Controllers\Nasabah\ProfilController;
use App\Http\Controllers\Nasabah\SimpananController;
use App\Http\Controllers\Nasabah\TokoController;
use App\Http\Controllers\Nasabah\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/layanan', 'layanan')->name('layanan');
Route::view('/berita', 'berita')->name('berita');
Route::view('/galeri', 'galeri')->name('galeri');
Route::view('/kontak', 'kontak')->name('kontak');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardRedirectController::class)->name('dashboard');

    Route::prefix('nasabah')->name('nasabah.')->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
        Route::get('/simpanan', SimpananController::class)->name('simpanan');
        Route::get('/pinjaman/pengajuan', [PengajuanPinjamanController::class, 'create'])->name('pinjaman.pengajuan');
        Route::post('/pinjaman/pengajuan', [PengajuanPinjamanController::class, 'store'])->name('pinjaman.pengajuan.store');
        Route::get('/pinjaman', PinjamanController::class)->name('pinjaman');
        Route::get('/toko', [TokoController::class, 'index'])->name('toko');
        Route::post('/toko/keranjang', [TokoController::class, 'addToCart'])->name('toko.cart.add');
        Route::delete('/toko/keranjang/{product}', [TokoController::class, 'removeFromCart'])->name('toko.cart.remove');
        Route::post('/toko/pesan', [TokoController::class, 'checkout'])->name('toko.checkout');
        Route::get('/transaksi', TransaksiController::class)->name('transaksi');
        Route::get('/dokumen', DokumenController::class)->name('dokumen');
        Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
        Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');
    });

    Route::middleware('can:access-admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/nasabah', [AdminController::class, 'members'])->name('nasabah');
        Route::get('/simpanan', [AdminController::class, 'savings'])->name('simpanan');
        Route::post('/simpanan', [AdminController::class, 'recordSavings'])->name('simpanan.store');
        Route::get('/pinjaman', [AdminController::class, 'loans'])->name('pinjaman');
        Route::post('/pinjaman/{loan}/{decision}', [AdminController::class, 'decideLoan'])->name('pinjaman.decide');
        Route::get('/transaksi', [AdminController::class, 'transactions'])->name('transaksi');
        Route::post('/transaksi/pesanan/{order}/{decision}', [AdminController::class, 'updateOrder'])->name('transaksi.order');
        Route::get('/laporan', [AdminController::class, 'reports'])->name('laporan');
        Route::get('/pengaturan', [AdminController::class, 'settings'])->name('pengaturan');
        Route::put('/pengaturan', [AdminController::class, 'saveSettings'])->name('pengaturan.update');
    });
});

require __DIR__.'/settings.php';
