<x-layouts.admin title="Dashboard Admin">
    <!-- Header Halaman (1:1 with 09_dashboard_admin) -->
    <div class="mb-6">
        <h1 class="text-xl font-bold text-[#0f172a]">Dashboard Admin</h1>
        <h2 class="text-lg font-semibold text-[#1e293b] mt-2">Selamat Datang, Admin</h2>
        <p class="text-xs sm:text-sm text-[#64748b] mt-0.5">Kelola data koperasi dengan mudah.</p>
    </div>

    <!-- 3 Summary Stack Cards (1:1 with 09_dashboard_admin) -->
    <div class="space-y-4 max-w-xl">
        <!-- Card 1: Total Nasabah -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex items-center justify-between">
            <div>
                <span class="text-xs font-medium text-[#64748b]">Total Nasabah</span>
                <div class="text-2xl font-bold text-[#0f172a] mt-0.5">45</div>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                <x-lucide name="users" class="w-5 h-5 text-blue-600" />
            </div>
        </div>

        <!-- Card 2: Total Simpanan -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex items-center justify-between">
            <div>
                <span class="text-xs font-medium text-[#64748b]">Total Simpanan</span>
                <div class="text-2xl font-bold text-[#0f172a] mt-0.5">Rp 45.000.000</div>
            </div>
            <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <x-lucide name="wallet" class="w-5 h-5 text-emerald-600" />
            </div>
        </div>

        <!-- Card 3: Total Pinjaman -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex items-center justify-between">
            <div>
                <span class="text-xs font-medium text-[#64748b]">Total Pinjaman</span>
                <div class="text-2xl font-bold text-[#0f172a] mt-0.5">Rp 60.000.000</div>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                <x-lucide name="credit-card" class="w-5 h-5 text-purple-600" />
            </div>
        </div>
    </div>
</x-layouts.admin>
