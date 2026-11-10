<x-layouts.nasabah title="Profil Anggota">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Profil Saya</h1>
        <p class="mt-1 text-sm text-[#64748b]">Informasi akun dan kontak anggota.</p>
    </div>
    <div class="mb-6 flex max-w-2xl items-center gap-5 rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-blue-600 text-xl font-bold text-white">{{ $user->initials() }}</div>
        <div>
            <h2 class="font-bold text-[#0f172a]">{{ $user->name }}</h2>
            <p class="mt-1 text-sm text-[#64748b]">{{ $user->email }}</p>
            <p class="mt-1 text-xs text-[#64748b]">No. Anggota: {{ $user->no_anggota ?: 'Belum tersedia' }}</p>
        </div>
    </div>
    <div class="max-w-2xl rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8">
        <h2 class="mb-5 font-bold text-[#0f172a]">Perbarui Informasi Kontak</h2>
        @if (session('status'))
            <div role="status" class="mb-5 rounded-lg bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('nasabah.profil.update') }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="no_telepon" class="mb-1.5 block text-sm font-medium text-[#475569]">No. Telepon</label>
                <input id="no_telepon" name="no_telepon" type="tel" maxlength="30" value="{{ old('no_telepon', $user->no_telepon) }}" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('no_telepon')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="alamat" class="mb-1.5 block text-sm font-medium text-[#475569]">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" maxlength="1000" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="rounded-lg bg-[#2563eb] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#1d4ed8]">Simpan Profil</button>
        </form>
    </div>
</x-layouts.nasabah>
