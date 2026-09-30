<x-layouts.admin title="Laporan">
    <!-- Header Halaman (1:1 with 12_laporan_admin) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Laporan</h1>
    </div>

    <!-- Category Tabs (1:1 with 12_laporan_admin) -->
    <div class="flex flex-wrap items-center gap-2 mb-6">
        <button type="button" class="bg-[#dbeafe] text-[#1d4ed8] font-semibold text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Simpanan
        </button>
        <button type="button" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Pinjaman
        </button>
        <button type="button" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Transaksi
        </button>
    </div>

    <!-- Date Filter & Actions Toolbar -->
    <form class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-4 sm:p-5 mb-8 flex flex-wrap items-end gap-4" onsubmit="return false;">
        <div>
            <label class="block text-xs font-medium text-[#64748b] mb-1">Dari Tanggal</label>
            <input
                type="date"
                value="2025-08-01"
                class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2563eb]"
            />
        </div>

        <div>
            <label class="block text-xs font-medium text-[#64748b] mb-1">Sampai Tanggal</label>
            <input
                type="date"
                value="2025-08-31"
                class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2563eb]"
            />
        </div>

        <button type="button" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-sm font-semibold px-5 py-2 rounded-lg shadow-sm transition">
            Tampilkan
        </button>

        <button type="button" onclick="window.print()" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-semibold px-4 py-2 rounded-lg transition flex items-center gap-2">
            <x-lucide name="printer" class="w-4 h-4 text-slate-600" />
            <span>Cetak / PDF</span>
        </button>
    </form>

    <!-- 3 Summary KPI Cards (1:1 with 12_laporan_admin) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Total Simpanan</span>
            <div class="text-xl font-bold text-[#0b3558] mt-1">Rp 12.500.000</div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Total Pinjaman</span>
            <div class="text-xl font-bold text-[#0b3558] mt-1">Rp 18.000.000</div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Jumlah Transaksi</span>
            <div class="text-xl font-bold text-[#0b3558] mt-1">57</div>
        </div>
    </div>

    <!-- Detail Laporan Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
        <h2 class="text-base font-bold text-[#0f172a] mb-4">Detail Laporan Simpanan</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-500 text-xs border-b border-slate-200">
                        <th class="py-3 px-4 font-semibold">No</th>
                        <th class="py-3 px-4 font-semibold">Nama</th>
                        <th class="py-3 px-4 font-semibold">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4">1</td>
                        <td class="px-4 font-medium text-[#0f172a]">Andi Pratama</td>
                        <td class="px-4">Rp 1.500.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4">2</td>
                        <td class="px-4 font-medium text-[#0f172a]">Siti Nurhaliza</td>
                        <td class="px-4">Rp 1.000.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4">3</td>
                        <td class="px-4 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-4">Rp 750.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
