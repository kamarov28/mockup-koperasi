<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanPinjamanController extends Controller
{
    public function create(): View
    {
        $maxTenor = (int) (DB::table('koperasi_settings')->where('key', 'max_tenor')->value('value') ?? 24);
        $tenors = array_values(array_filter([3, 6, 12, 24], fn (int $months): bool => $months <= $maxTenor));

        return view('nasabah.pengajuan-pinjaman', compact('tenors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $maxTenor = (int) (DB::table('koperasi_settings')->where('key', 'max_tenor')->value('value') ?? 24);
        $allowedTenors = array_filter([3, 6, 12, 24], fn (int $months): bool => $months <= $maxTenor);
        $validated = $request->validate([
            'amount' => ['required', 'integer', 'min:1', 'max:999999999999999'],
            'tenor' => ['required', 'integer', 'in:'.implode(',', $allowedTenors)],
            'purpose' => ['required', 'in:modal_usaha,pendidikan,konsumtif,kebutuhan_mendesak'],
        ]);

        $purposes = [
            'modal_usaha' => 'Modal Usaha',
            'pendidikan' => 'Pendidikan',
            'konsumtif' => 'Konsumtif',
            'kebutuhan_mendesak' => 'Kebutuhan Mendesak',
        ];

        DB::table('pinjaman')->insert([
            'user_id' => Auth::id(),
            'jumlah_pinjaman' => $validated['amount'],
            'jangka_waktu' => $validated['tenor'],
            'angsuran_per_bulan' => null,
            'keperluan' => $purposes[$validated['purpose']],
            'status' => 'Menunggu Verifikasi',
            'tanggal_pencairan' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('nasabah.pinjaman')
            ->with('status', 'Pengajuan terkirim dan menunggu verifikasi koperasi.');
    }
}
