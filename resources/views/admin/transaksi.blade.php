<x-layouts.admin title="Data Transaksi">
    <!-- Header Halaman -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Data Transaksi</h1>
    </div>

    <!-- Search & Filter Toolbar -->
    <div class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[240px]">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="search"
                placeholder="Cari nomor transaksi, nama nasabah..."
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]"
            />
        </div>

        <select class="px-3 py-2.5 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]">
            <option value="">Semua Jenis Transaksi</option>
            <option value="simpanan">Simpanan</option>
            <option value="pinjaman">Pinjaman</option>
            <option value="angsuran">Angsuran</option>
            <option value="penarikan">Penarikan</option>
        </select>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No</th>
                        <th class="py-3 px-5 font-bold">ID Transaksi</th>
                        <th class="py-3 px-5 font-bold">Tanggal</th>
                        <th class="py-3 px-5 font-bold">Nama Nasabah</th>
                        <th class="py-3 px-5 font-bold">Jenis</th>
                        <th class="py-3 px-5 font-bold">Jumlah</th>
                        <th class="py-3 px-5 font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">1</td>
                        <td class="px-5 font-mono text-xs text-slate-500">TRX-20250812-001</td>
                        <td class="px-5">12-08-2025</td>
                        <td class="px-5 font-medium text-[#0f172a]">Andi Pratama</td>
                        <td class="px-5">Simpanan</td>
                        <td class="px-5 font-semibold text-emerald-600">+Rp 500.000</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Berhasil
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">2</td>
                        <td class="px-5 font-mono text-xs text-slate-500">TRX-20250810-002</td>
                        <td class="px-5">10-08-2025</td>
                        <td class="px-5 font-medium text-[#0f172a]">Siti Nurhaliza</td>
                        <td class="px-5">Pinjaman</td>
                        <td class="px-5 font-semibold text-blue-600">Rp 5.000.000</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#e0f2fe] text-[#0284c7]">
                                Cair
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">3</td>
                        <td class="px-5 font-mono text-xs text-slate-500">TRX-20250808-003</td>
                        <td class="px-5">08-08-2025</td>
                        <td class="px-5 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-5">Angsuran</td>
                        <td class="px-5 font-semibold text-purple-600">Rp 900.000</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Berhasil
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-end gap-1.5 p-4 border-t border-slate-100">
            <button class="w-8 h-8 rounded-lg bg-[#1d4ed8] text-white text-xs font-semibold">1</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">2</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">3</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">&gt;</button>
        </div>
    </div>
</x-layouts.admin>
