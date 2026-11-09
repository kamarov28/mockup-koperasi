<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    public function __invoke(): View
    {
        $pinjaman = DB::table('pinjaman')
            ->select([
                'jumlah_pinjaman',
                'jangka_waktu',
                'angsuran_per_bulan',
                'keperluan',
                'status',
                'tanggal_pencairan',
                'created_at',
            ])
            ->where('user_id', Auth::id())
            ->orderByDesc('tanggal_pencairan')
            ->orderByDesc('created_at')
            ->get();

        $pinjamanAktif = $pinjaman
            ->filter(fn (object $item): bool => $this->isActive($item->status))
            ->sum(fn (object $item): float => (float) $item->jumlah_pinjaman);

        $pinjamanTerbaru = $pinjaman->first(
            fn (object $item): bool => $this->isActive($item->status)
        );

        return view('nasabah.pinjaman', compact('pinjaman', 'pinjamanAktif', 'pinjamanTerbaru'));
    }

    private function isActive(?string $status): bool
    {
        return in_array(mb_strtolower(trim((string) $status)), [
            'aktif',
            'disetujui',
            'active',
            'approved',
            'dicairkan',
            'disbursed',
        ], true);
    }
}
