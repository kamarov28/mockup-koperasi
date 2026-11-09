<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $userId = Auth::id();

        $totalSimpanan = DB::table('simpanan')
            ->where('user_id', $userId)
            ->sum('jumlah');

        $pinjamanAktif = DB::table('pinjaman')
            ->where('user_id', $userId)
            ->whereIn(DB::raw('lower(status)'), [
                'aktif',
                'disetujui',
                'active',
                'approved',
                'dicairkan',
                'disbursed',
            ])
            ->sum('jumlah_pinjaman');

        $jumlahTransaksi = DB::table('transaksi')
            ->where('user_id', $userId)
            ->count();

        $transaksiTerbaru = DB::table('transaksi')
            ->select(['tanggal', 'jenis', 'jumlah', 'keterangan'])
            ->where('user_id', $userId)
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('nasabah.dashboard', compact(
            'totalSimpanan',
            'pinjamanAktif',
            'jumlahTransaksi',
            'transaksiTerbaru',
        ));
    }
}
