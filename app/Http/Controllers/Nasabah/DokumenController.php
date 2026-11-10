<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokumenController extends Controller
{
    public function __invoke(Request $request): View
    {
        $filters = $request->validate([
            'document' => ['nullable', 'in:simpanan,transaksi,pinjaman,kartu-anggota'],
        ]);

        $user = Auth::user();
        $simpanan = DB::table('simpanan')
            ->select(['tanggal', 'jenis', 'jumlah', 'keterangan'])
            ->where('user_id', $user->id)
            ->orderBy('tanggal')
            ->orderBy('created_at')
            ->get();

        $saldoSimpanan = $simpanan->sum(function (object $item): float {
            $amount = (float) $item->jumlah;
            $isWithdrawal = str_contains(mb_strtolower(trim((string) $item->keterangan)), 'penarikan');

            return $isWithdrawal ? -$amount : $amount;
        });

        $transaksiTerbaru = DB::table('transaksi')
            ->select(['tanggal', 'jenis', 'jumlah', 'keterangan'])
            ->where('user_id', $user->id)
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->first();

        $pinjamanAktif = DB::table('pinjaman')
            ->select(['jumlah_pinjaman', 'jangka_waktu', 'angsuran_per_bulan', 'keperluan', 'status', 'tanggal_pencairan', 'created_at'])
            ->where('user_id', $user->id)
            ->whereIn(DB::raw('LOWER(TRIM(status))'), [
                'aktif',
                'disetujui',
                'active',
                'approved',
                'dicairkan',
                'disbursed',
            ])
            ->orderByDesc('tanggal_pencairan')
            ->orderByDesc('created_at')
            ->get();

        return view('nasabah.dokumen', [
            'user' => $user,
            'simpanan' => $simpanan,
            'saldoSimpanan' => $saldoSimpanan,
            'transaksiTerbaru' => $transaksiTerbaru,
            'pinjamanAktif' => $pinjamanAktif,
            'document' => $filters['document'] ?? 'simpanan',
        ]);
    }
}
