<x-layouts.nasabah title="Dashboard Nasabah">
    <!-- Header Greeting (1:1 with 03_dashboard_nasabah) -->
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-[#0f172a]">Halo, Selamat Datang!</h1>
        <p class="text-sm text-[#64748b] mt-1">Semoga hari Anda menyenangkan.</p>
    </div>

    <!-- 3 Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Card 1: Total Simpanan -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <div class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                <x-lucide name="wallet" class="w-5 h-5 text-emerald-600" />
            </div>
            <div class="text-xs font-medium text-[#64748b]">Total Simpanan</div>
            <div class="text-xl font-bold text-emerald-600 mt-1">Rp 2.500.000</div>
        </div>

        <!-- Card 2: Pinjaman Aktif -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <div class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                <x-lucide name="credit-card" class="w-5 h-5 text-blue-600" />
            </div>
            <div class="text-xs font-medium text-[#64748b]">Pinjaman Aktif</div>
            <div class="text-xl font-bold text-blue-600 mt-1">Rp 5.000.000</div>
        </div>

        <!-- Card 3: Saldo Tersedia -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <div class="w-9 h-9 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mb-3">
                <x-lucide name="circle-dollar-sign" class="w-5 h-5 text-purple-600" />
            </div>
            <div class="text-xs font-medium text-[#64748b]">Saldo Tersedia</div>
            <div class="text-xl font-bold text-purple-600 mt-1">Rp 2.500.000</div>
        </div>
    </div>

    <!-- Transaksi Terbaru Card (1:1 with 03_dashboard_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-base font-bold text-[#0f172a]">Transaksi Terbaru</h2>
            <a href="{{ route('nasabah.transaksi') }}" class="text-sm font-semibold text-[#2563eb] hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-100">
                        <th class="py-3 font-semibold">Tanggal</th>
                        <th class="py-3 font-semibold">Jenis</th>
                        <th class="py-3 font-semibold">Jumlah</th>
                        <th class="py-3 font-semibold">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">12-08-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-emerald-600">+Rp 500.000</td>
                        <td>Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">10-08-2025</td>
                        <td>Pinjaman</td>
                        <td class="font-medium text-blue-600">Rp 5.000.000</td>
                        <td>Pencairan</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">08-08-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-emerald-600">+Rp 300.000</td>
                        <td>Setoran</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
