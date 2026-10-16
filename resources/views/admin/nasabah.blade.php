<x-layouts.admin title="Manajemen Anggota">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f172a]">Manajemen Anggota Koperasi</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Kelola pendaftaran anggota baru, perubahan data, mutasi lulus/pindah, dan status keaktifan.</p>
        </div>
        <button onclick="document.getElementById('modal-member').classList.remove('hidden')" type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
            <x-lucide name="plus" class="w-4 h-4 text-white" />
            <span>+ Tambah Anggota Baru</span>
        </button>
    </div>

    <!-- Search & Filter Category Bar -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-4 sm:p-5 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Filter Kategori Tabs -->
            <div class="flex flex-wrap items-center gap-1.5 text-xs font-semibold">
                <button type="button" class="px-3 py-1.5 rounded-lg bg-[#1d4ed8] text-white shadow-sm transition">
                    Semua (1.250)
                </button>
                <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                    Siswa Aktif
                </button>
                <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                    Guru & Karyawan
                </button>
                <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                    Mutasi / Lulus
                </button>
                <button type="button" class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition">
                    Nonaktif
                </button>
            </div>

            <!-- Search Field -->
            <div class="relative w-full md:w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <x-lucide name="search" class="w-3.5 h-3.5 text-slate-400" />
                </span>
                <input
                    type="search"
                    placeholder="Cari nama / NIS / No Anggota..."
                    class="w-full pl-8 pr-3 py-1.5 rounded-lg border border-slate-200 text-xs text-[#0f172a] focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]"
                />
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No. Anggota / NIS</th>
                        <th class="py-3 px-5 font-bold">Nama Lengkap</th>
                        <th class="py-3 px-5 font-bold">Kategori</th>
                        <th class="py-3 px-5 font-bold">No. WhatsApp</th>
                        <th class="py-3 px-5 font-bold">Status Mutasi</th>
                        <th class="py-3 px-5 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <!-- Member 1: Siswa Aktif -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">
                            KBM-2024-0412
                            <span class="block text-[11px] text-slate-400 font-normal">NIS: 222310412</span>
                        </td>
                        <td class="px-5 font-medium text-[#0f172a]">Muhammad Rizky Pratama</td>
                        <td class="px-5">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700">Siswa (XII SIJA)</span>
                        </td>
                        <td class="px-5 text-slate-600">0812-3456-7890</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                                Aktif
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <div class="inline-flex items-center gap-2">
                                <button onclick="document.getElementById('modal-member').classList.remove('hidden')" type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Data">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button onclick="alert('Ubah status keanggotaan Muhammad Rizky (Mutasi/Nonaktif)?')" type="button" class="text-amber-600 hover:text-amber-800 p-1" title="Mutasi / Nonaktifkan">
                                    <x-lucide name="settings" class="w-4 h-4 text-amber-600" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Member 2: Guru Aktif -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">
                            KBM-2021-0015
                            <span class="block text-[11px] text-slate-400 font-normal">NIP: 19850412 201001 2 003</span>
                        </td>
                        <td class="px-5 font-medium text-[#0f172a]">Siti Rahmawati, S.Pd.</td>
                        <td class="px-5">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-purple-50 text-purple-700">Guru Tetap</span>
                        </td>
                        <td class="px-5 text-slate-600">0813-8899-1122</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                                Aktif
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <div class="inline-flex items-center gap-2">
                                <button onclick="document.getElementById('modal-member').classList.remove('hidden')" type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Data">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button onclick="alert('Ubah status keanggotaan?')" type="button" class="text-amber-600 hover:text-amber-800 p-1" title="Mutasi / Nonaktifkan">
                                    <x-lucide name="settings" class="w-4 h-4 text-amber-600" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Member 3: Mutasi Lulus -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">
                            KBM-2023-0199
                            <span class="block text-[11px] text-slate-400 font-normal">NIS: 212210199</span>
                        </td>
                        <td class="px-5 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-5">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-slate-100 text-slate-700">Alumni</span>
                        </td>
                        <td class="px-5 text-slate-600">0812-5555-6666</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                Mutasi (Lulus)
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <div class="inline-flex items-center gap-2">
                                <button onclick="document.getElementById('modal-member').classList.remove('hidden')" type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Data">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button onclick="alert('Ubah status keanggotaan?')" type="button" class="text-amber-600 hover:text-amber-800 p-1" title="Mutasi / Nonaktifkan">
                                    <x-lucide name="settings" class="w-4 h-4 text-amber-600" />
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Member 4: Nonaktif -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">
                            KBM-2022-0082
                            <span class="block text-[11px] text-slate-400 font-normal">NIS: 202110082</span>
                        </td>
                        <td class="px-5 font-medium text-[#0f172a]">Diki Firmansyah</td>
                        <td class="px-5">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-slate-100 text-slate-700">Pindah Sekolah</span>
                        </td>
                        <td class="px-5 text-slate-600">0812-9999-0000</td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 text-rose-700">
                                Nonaktif
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <div class="inline-flex items-center gap-2">
                                <button onclick="document.getElementById('modal-member').classList.remove('hidden')" type="button" class="text-blue-600 hover:text-blue-800 p-1" title="Edit Data">
                                    <x-lucide name="pencil" class="w-4 h-4 text-blue-600" />
                                </button>
                                <button onclick="alert('Aktifkan kembali anggota ini?')" type="button" class="text-emerald-600 hover:text-emerald-800 p-1" title="Aktifkan Kembali">
                                    <x-lucide name="check" class="w-4 h-4 text-emerald-600" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between p-4 border-t border-slate-100 text-xs text-slate-500">
            <span>Menampilkan 4 dari 1.250 Anggota</span>
            <div class="flex items-center gap-1.5">
                <button class="w-7 h-7 rounded-lg bg-[#1d4ed8] text-white font-semibold">1</button>
                <button class="w-7 h-7 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium">2</button>
                <button class="w-7 h-7 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium">3</button>
                <button class="w-7 h-7 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium">&gt;</button>
            </div>
        </div>
    </div>

    <!-- Modal Form Tambah / Edit Anggota -->
    <div id="modal-member" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
                <h3 class="font-bold text-base text-[#0f172a]">Formulir Data Anggota</h3>
                <button onclick="document.getElementById('modal-member').classList.add('hidden')" type="button" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <x-lucide name="x" class="w-5 h-5" />
                </button>
            </div>

            <form onsubmit="alert('Data anggota berhasil disimpan!'); document.getElementById('modal-member').classList.add('hidden'); return false;" class="space-y-3.5 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                    <input type="text" required placeholder="Nama anggota..." value="Muhammad Rizky Pratama" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">No. Anggota</label>
                        <input type="text" required value="KBM-2024-0412" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">NIS / NIP</label>
                        <input type="text" required value="222310412" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Kategori</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                            <option value="siswa" selected>Siswa Sekolah</option>
                            <option value="guru">Guru / Pendidik</option>
                            <option value="karyawan">Staf Karyawan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Status Keaktifan / Mutasi</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                            <option value="aktif" selected>Aktif</option>
                            <option value="mutasi">Mutasi (Lulus / Pindah)</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">No. WhatsApp (Untuk Notifikasi)</label>
                    <input type="tel" required value="081234567890" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
                    <button onclick="document.getElementById('modal-member').classList.add('hidden')" type="button" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Batal
                    </button>
                    <button type="submit" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm transition">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
