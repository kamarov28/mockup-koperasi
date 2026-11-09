<x-layouts.nasabah title="Profil Nasabah">
    <!-- Header Halaman (1:1 with 08_profil_nasabah) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Profil Saya</h1>
    </div>

    <!-- Top Profile Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 max-w-2xl flex items-center gap-6">
        <div class="w-20 h-20 rounded-full bg-[#3b82f6] text-white flex items-center justify-center text-3xl shrink-0 shadow-sm">
            <svg class="w-12 h-12 fill-white" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
            </svg>
        </div>

        <div>
            <h2 class="text-lg font-bold text-[#0f172a]">{{ $user->name }}</h2>
            <p class="text-xs text-[#64748b] mt-0.5">No. Anggota: {{ $user->no_anggota ?: 'Belum tersedia' }}</p>
        </div>
    </div>

    <!-- Informasi Pribadi Section (1:1 with 08_profil_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 sm:p-8 max-w-2xl">
        <h3 class="text-base font-bold text-[#0f172a] mb-5">Informasi Pribadi</h3>

        @if (session('status'))
            <div role="status" class="mb-5 rounded-lg bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-[130px_16px_1fr] sm:grid-cols-[160px_20px_1fr] gap-y-3.5 text-xs sm:text-sm mb-8">
            <span class="text-[#64748b]">Nama Lengkap</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">{{ $user->name }}</span>

            <span class="text-[#64748b]">No. Anggota</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">{{ $user->no_anggota ?: 'Belum tersedia' }}</span>

            <span class="text-[#64748b]">Email</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">{{ $user->email }}</span>
        </div>

        <h4 class="text-sm font-bold text-[#0f172a] mb-4">Perbarui Informasi Kontak</h4>
        <form method="POST" action="{{ route('nasabah.profil.update') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="no_telepon" class="mb-1.5 block text-sm font-medium text-[#475569]">No. Telepon</label>
                <input
                    id="no_telepon"
                    name="no_telepon"
                    type="tel"
                    maxlength="30"
                    value="{{ old('no_telepon', $user->no_telepon) }}"
                    class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                @error('no_telepon')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="mb-1.5 block text-sm font-medium text-[#475569]">Alamat</label>
                <textarea
                    id="alamat"
                    name="alamat"
                    rows="3"
                    maxlength="1000"
                    class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="rounded-lg bg-[#2563eb] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1d4ed8]">
                Simpan Profil
            </button>
        </form>
    </div>
</x-layouts.nasabah>
