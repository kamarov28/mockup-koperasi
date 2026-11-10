<x-layouts.admin title="Manajemen Simpanan">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f172a]">Manajemen Simpanan Anggota</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Pengelolaan setoran, penarikan dana sukarela, dan rekapitulasi buku simpanan.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="document.getElementById('modal-deposit').classList.remove('hidden')" type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="plus" class="w-4 h-4 text-white" />
                <span>+ Catat Transaksi Simpanan</span>
            </button>
        </div>
    </div>

    <!-- 4 Rekap Simpanan KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Kas Simpanan</span>
            <div class="text-2xl font-extrabold text-[#1d4ed8] mt-1">Rp 480.250.000</div>
            <span class="text-[11px] text-slate-400 mt-0.5 block">1.250 Anggota Terdaftar</span>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Simpanan Pokok</span>
            <div class="text-xl font-bold text-[#0f172a] mt-1">Rp 125.000.000</div>
            <span class="text-[11px] text-blue-600 mt-0.5 block">Rp 100.000 / Anggota</span>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Simpanan Wajib</span>
            <div class="text-xl font-bold text-emerald-600 mt-1">Rp 210.450.000</div>
            <span class="text-[11px] text-emerald-600 mt-0.5 block">Rp 50.000 / Bulan</span>
        </div>
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Simpanan Sukarela</span>
            <div class="text-xl font-bold text-purple-600 mt-1">Rp 144.800.000</div>
            <span class="text-[11px] text-purple-600 mt-0.5 block">Fleksibel Setor/Tarik</span>
        </div>
    </div>

    <!-- Search & Filter Toolbar -->
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
            <option value="">Semua Kategori Anggota</option>
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
            <option value="karyawan">Staf</option>
        </select>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No. Anggota</th>
                        <th class="py-3 px-5 font-bold">Nama Anggota</th>
                        <th class="py-3 px-5 font-bold">Simpanan Pokok</th>
                        <th class="py-3 px-5 font-bold">Simpanan Wajib</th>
                        <th class="py-3 px-5 font-bold">Simpanan Sukarela</th>
                        <th class="py-3 px-5 font-bold">Total Saldo</th>
                        <th class="py-3 px-5 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">KBM-2024-0412</td>
                        <td class="px-5 font-medium text-[#0f172a]">Muhammad Rizky Pratama</td>
                        <td class="px-5">Rp 100.000</td>
                        <td class="px-5">Rp 1.200.000</td>
                        <td class="px-5">Rp 1.200.000</td>
                        <td class="px-5 font-bold text-[#1d4ed8]">Rp 2.500.000</td>
                        <td class="px-5 text-right">
                            <button onclick="document.getElementById('modal-deposit').classList.remove('hidden')" type="button" class="text-xs font-semibold text-[#1d4ed8] hover:underline">
                                + Setor/Tarik
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">KBM-2021-0015</td>
                        <td class="px-5 font-medium text-[#0f172a]">Siti Rahmawati, S.Pd.</td>
                        <td class="px-5">Rp 100.000</td>
                        <td class="px-5">Rp 2.400.000</td>
                        <td class="px-5">Rp 3.500.000</td>
                        <td class="px-5 font-bold text-[#1d4ed8]">Rp 6.000.000</td>
                        <td class="px-5 text-right">
                            <button onclick="document.getElementById('modal-deposit').classList.remove('hidden')" type="button" class="text-xs font-semibold text-[#1d4ed8] hover:underline">
                                + Setor/Tarik
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">KBM-2023-0199</td>
                        <td class="px-5 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-5">Rp 100.000</td>
                        <td class="px-5">Rp 600.000</td>
                        <td class="px-5">Rp 450.000</td>
                        <td class="px-5 font-bold text-[#1d4ed8]">Rp 1.150.000</td>
                        <td class="px-5 text-right">
                            <button onclick="document.getElementById('modal-deposit').classList.remove('hidden')" type="button" class="text-xs font-semibold text-[#1d4ed8] hover:underline">
                                + Setor/Tarik
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Catat Setor / Tarik Simpanan -->
    <div id="modal-deposit" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
                <h3 class="font-bold text-base text-[#0f172a]">Pencatatan Setoran / Penarikan</h3>
                <button onclick="document.getElementById('modal-deposit').classList.add('hidden')" type="button" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <x-lucide name="x" class="w-5 h-5" />
                </button>
            </div>

            <form onsubmit="alert('Transaksi simpanan berhasil dicatat ke buku besar!'); document.getElementById('modal-deposit').classList.add('hidden'); return false;" class="space-y-3.5 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Pilih Anggota</label>
                    <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                        <option value="KBM-2024-0412" selected>KBM-2024-0412 - Muhammad Rizky Pratama (Siswa)</option>
                        <option value="KBM-2021-0015">KBM-2021-0015 - Siti Rahmawati, S.Pd. (Guru)</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Jenis Transaksi</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                            <option value="setor">Setor Simpanan (+)</option>
                            <option value="tarik">Penarikan Dana (-)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Pos Simpanan</label>
                        <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                            <option value="sukarela">Simpanan Sukarela</option>
                            <option value="wajib">Simpanan Wajib</option>
                            <option value="pokok">Simpanan Pokok</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nominal (Rp)</label>
                    <input type="number" required placeholder="Contoh: 100000" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Keterangan Transaksi</label>
                    <input type="text" placeholder="Contoh: Setoran sukarela via kasir" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
                    <button onclick="document.getElementById('modal-deposit').classList.add('hidden')" type="button" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Batal
                    </button>
                    <button type="submit" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm transition">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
