<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    public function __invoke(): View
    {
        $simpanan = DB::table('simpanan')
            ->select(['tanggal', 'jenis', 'jumlah', 'keterangan'])
            ->where('user_id', Auth::id())
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->get();

        $totalSimpanan = $simpanan->sum(function (object $item): float {
            $jumlah = (float) $item->jumlah;
            $isPenarikan = str_contains(mb_strtolower(trim((string) $item->keterangan)), 'penarikan');

            return $isPenarikan ? -$jumlah : $jumlah;
        });

        return view('nasabah.simpanan', compact('simpanan', 'totalSimpanan'));
    }
}
