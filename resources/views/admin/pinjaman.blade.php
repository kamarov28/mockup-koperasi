<x-layouts.admin title="Data Pinjaman">
    <!-- Header Halaman (1:1 with 11_data_pinjaman_admin) -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Data Pinjaman</h1>
        <button type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition">
            + Tambah Pinjaman
        </button>
    </div>

    <!-- Filter & Search Toolbar (1:1 with 11_data_pinjaman_admin) -->
    <div class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[240px]">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="search"
                placeholder="Cari nama atau nomor anggota..."
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]"
            />
        </div>

        <select class="px-3 py-2.5 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]">
            <option value="">Semua Status</option>
            <option value="disetujui">Disetujui</option>
            <option value="lunas">Lunas</option>
            <option value="proses">Proses</option>
            <option value="ditolak">Ditolak</option>
        </select>
    </div>

    <!-- Table Card (1:1 with 11_data_pinjaman_admin) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No</th>
                        <th class="py-3 px-5 font-bold">Nama</th>
                        <th class="py-3 px-5 font-bold">Jumlah</th>
                        <th class="py-3 px-5 font-bold">Jangka Waktu</th>
                        <th class="py-3 px-5 font-bold">Status</th>
                        <th class="py-3 px-5 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <!-- Row 1: Disetujui -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">1</td>
                        <td class="px-5 font-medium text-[#0f172a]">Andi Pratama</td>
                        <td class="px-5 font-medium">Rp 5.000.000</td>
                        <td class="px-5">6 bulan</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Disetujui
                            </span>
                        </td>
                        <td class="px-5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button type="button" class="text-rose-500 hover:text-rose-700 p-1" title="Hapus">
                                    <x-lucide name="trash-2" class="w-4 h-4 text-rose-500" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Lunas -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">2</td>
                        <td class="px-5 font-medium text-[#0f172a]">Siti Nurhaliza</td>
                        <td class="px-5 font-medium">Rp 3.000.000</td>
                        <td class="px-5">3 bulan</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#e0f2fe] text-[#0284c7]">
                                Lunas
                            </span>
                        </td>
                        <td class="px-5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button type="button" class="text-rose-500 hover:text-rose-700 p-1" title="Hapus">
                                    <x-lucide name="trash-2" class="w-4 h-4 text-rose-500" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: Proses -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">3</td>
                        <td class="px-5 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-5 font-medium">Rp 2.000.000</td>
                        <td class="px-5">4 bulan</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#fef3c7] text-[#b45309]">
                                Proses
                            </span>
                        </td>
                        <td class="px-5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button type="button" class="text-rose-500 hover:text-rose-700 p-1" title="Hapus">
                                    <x-lucide name="trash-2" class="w-4 h-4 text-rose-500" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4: Disetujui -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">4</td>
                        <td class="px-5 font-medium text-[#0f172a]">Rina Marlina</td>
                        <td class="px-5 font-medium">Rp 4.000.000</td>
                        <td class="px-5">5 bulan</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Disetujui
                            </span>
                        </td>
                        <td class="px-5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button type="button" class="text-rose-500 hover:text-rose-700 p-1" title="Hapus">
                                    <x-lucide name="trash-2" class="w-4 h-4 text-rose-500" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 5: Ditolak -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">5</td>
                        <td class="px-5 font-medium text-[#0f172a]">Diki Firmansyah</td>
                        <td class="px-5 font-medium">Rp 1.500.000</td>
                        <td class="px-5">3 bulan</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#ffe4e6] text-[#be123c]">
                                Ditolak
                            </span>
                        </td>
                        <td class="px-5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button type="button" class="text-rose-500 hover:text-rose-700 p-1" title="Hapus">
                                    <x-lucide name="trash-2" class="w-4 h-4 text-rose-500" />
                                </button>
                            </div>
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
