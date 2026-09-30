<x-layouts.admin title="Data Nasabah">
    <!-- Header Halaman (1:1 with 10_data_nasabah_admin) -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Data Nasabah</h1>
        <button type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition">
            + Tambah Nasabah
        </button>
    </div>

    <!-- Search Bar Full-Width -->
    <div class="relative mb-6">
        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
            <x-lucide name="search" class="w-4 h-4 text-slate-400" />
        </span>
        <input
            type="search"
            placeholder="Cari nama atau nomor anggota..."
            class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]"
        />
    </div>

    <!-- Table Card (1:1 with 10_data_nasabah_admin) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No</th>
                        <th class="py-3 px-5 font-bold">Nama</th>
                        <th class="py-3 px-5 font-bold">No. Anggota</th>
                        <th class="py-3 px-5 font-bold">No. Telepon</th>
                        <th class="py-3 px-5 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">1</td>
                        <td class="px-5 font-medium text-[#0f172a]">Andi Pratama</td>
                        <td class="px-5">001</td>
                        <td class="px-5">0812 1111 2222</td>
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
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">2</td>
                        <td class="px-5 font-medium text-[#0f172a]">Siti Nurhaliza</td>
                        <td class="px-5">002</td>
                        <td class="px-5">0812 3333 4444</td>
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
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">3</td>
                        <td class="px-5 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-5">003</td>
                        <td class="px-5">0812 5555 6666</td>
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
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">4</td>
                        <td class="px-5 font-medium text-[#0f172a]">Rina Marlina</td>
                        <td class="px-5">004</td>
                        <td class="px-5">0812 7777 8888</td>
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
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">5</td>
                        <td class="px-5 font-medium text-[#0f172a]">Diki Firmansyah</td>
                        <td class="px-5">005</td>
                        <td class="px-5">0812 9999 0000</td>
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

        <!-- Pagination (1:1 with 10_data_nasabah_admin) -->
        <div class="flex items-center justify-end gap-1.5 p-4 border-t border-slate-100">
            <button class="w-8 h-8 rounded-lg bg-[#1d4ed8] text-white text-xs font-semibold">1</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">2</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">3</button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-medium">&gt;</button>
        </div>
    </div>
</x-layouts.admin>
