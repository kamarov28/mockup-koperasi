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
            <h2 class="text-lg font-bold text-[#0f172a]">Nama Nasabah</h2>
            <p class="text-xs text-[#64748b] mt-0.5 mb-3">NIS : 123456</p>
            <button type="button" class="border border-[#3b82f6] text-[#3b82f6] hover:bg-blue-50 px-4 py-1.5 rounded-lg text-xs font-semibold transition">
                Edit Profil
            </button>
        </div>
    </div>

    <!-- Informasi Pribadi Section (1:1 with 08_profil_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 sm:p-8 max-w-2xl">
        <h3 class="text-base font-bold text-[#0f172a] mb-5">Informasi Pribadi</h3>

        <div class="grid grid-cols-[130px_16px_1fr] sm:grid-cols-[160px_20px_1fr] gap-y-3.5 text-xs sm:text-sm">
            <span class="text-[#64748b]">Nama Lengkap</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">Nama Nasabah</span>

            <span class="text-[#64748b]">No. Anggota</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">123456</span>

            <span class="text-[#64748b]">Alamat</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">Jl. Pendidikan No. 10</span>

            <span class="text-[#64748b]">No. Telepon</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">0812 3456 7890</span>

            <span class="text-[#64748b]">Email</span>
            <span class="text-slate-400">:</span>
            <span class="font-medium text-[#334155]">nama@email.com</span>
        </div>
    </div>
</x-layouts.nasabah>
