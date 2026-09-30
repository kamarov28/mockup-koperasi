<x-layouts.nasabah title="Riwayat Transaksi">
    <!-- Header Halaman (1:1 with 07_riwayat_transaksi_nasabah) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2d59]">Riwayat Transaksi</h1>
    </div>

    <!-- Search & Filter Toolbar -->
    <form class="flex flex-wrap items-center gap-3 mb-6" onsubmit="return false;">
        <div class="relative flex-1 min-w-[240px] max-w-sm">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="search"
                placeholder="Cari transaksi..."
                class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1976d2]"
            />
        </div>

        <select class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1976d2]">
            <option value="">Semua Jenis</option>
            <option value="simpanan">Simpanan</option>
            <option value="pinjaman">Pinjaman</option>
        </select>

        <button type="button" class="bg-[#1976d2] hover:bg-[#1565c0] text-white text-sm font-semibold px-6 py-2 rounded-lg shadow-sm transition">
            Cari
        </button>
    </form>

    <!-- Transaksi Table Card (1:1 with 07_riwayat_transaksi_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                        <th class="py-3.5 px-6 font-bold">Tanggal</th>
                        <th class="py-3.5 px-6 font-bold">Jenis</th>
                        <th class="py-3.5 px-6 font-bold">Jumlah</th>
                        <th class="py-3.5 px-6 font-bold">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-4 px-6">12-08-2025</td>
                        <td class="px-6">Simpanan</td>
                        <td class="px-6 font-medium">Rp 500.000</td>
                        <td class="px-6">Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-4 px-6">10-08-2025</td>
                        <td class="px-6">Pinjaman</td>
                        <td class="px-6 font-medium">Rp 5.000.000</td>
                        <td class="px-6">Pencairan</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-4 px-6">08-08-2025</td>
                        <td class="px-6">Simpanan</td>
                        <td class="px-6 font-medium">Rp 300.000</td>
                        <td class="px-6">Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-4 px-6">05-08-2025</td>
                        <td class="px-6">Pinjaman</td>
                        <td class="px-6 font-medium">Rp 900.000</td>
                        <td class="px-6">Angsuran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-4 px-6">28-07-2025</td>
                        <td class="px-6">Simpanan</td>
                        <td class="px-6 font-medium">Rp 400.000</td>
                        <td class="px-6">Setoran</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
