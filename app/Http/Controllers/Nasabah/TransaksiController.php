<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __invoke(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'jenis' => ['nullable', 'in:simpanan,pinjaman'],
        ]);

        $query = DB::table('transaksi')
            ->select(['tanggal', 'jenis', 'jumlah', 'keterangan'])
            ->where('user_id', Auth::id());

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';

            $query->where(function ($query) use ($search): void {
                $query->whereRaw('LOWER(jenis) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(keterangan) LIKE ?', [$search]);
            });
        }

        if (! empty($filters['jenis'])) {
            $query->whereRaw('LOWER(TRIM(jenis)) = ?', [$filters['jenis']]);
        }

        $transaksi = $query
            ->orderByDesc('tanggal')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('nasabah.transaksi', [
            'transaksi' => $transaksi,
            'search' => $filters['q'] ?? '',
            'jenis' => $filters['jenis'] ?? '',
        ]);
    }
}
