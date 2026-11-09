<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show(): View
    {
        return view('nasabah.profil', ['user' => Auth::user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'no_telepon' => ['nullable', 'string', 'max:30'],
            'alamat' => ['nullable', 'string', 'max:1000'],
        ]);

        $user = Auth::user();
        $user->no_telepon = $validated['no_telepon'] ?? null;
        $user->alamat = $validated['alamat'] ?? null;
        $user->save();

        return redirect()
            ->route('nasabah.profil')
            ->with('status', 'Profil berhasil diperbarui.');
    }
}
