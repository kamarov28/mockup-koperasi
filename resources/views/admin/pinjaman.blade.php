<x-layouts.admin title="Manajemen Pinjaman">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f172a]">Manajemen Pinjaman & Persetujuan</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Verifikasi pengajuan kredit, persetujuan pimpinan, dan perhitungan angsuran otomatis.</p>
        </div>
        <button onclick="document.getElementById('modal-loan').classList.remove('hidden')" type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
            <x-lucide name="plus" class="w-4 h-4 text-white" />
            <span>+ Input Pengajuan Pinjaman</span>
        </button>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[240px]">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="search"
                placeholder="Cari no pengajuan, nama, atau no anggota..."
                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]"
            />
        </div>

        <select class="px-3 py-2.5 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]">
            <option value="">Semua Status Pinjaman</option>
            <option value="proses">Menunggu Persetujuan Pimpinan</option>
            <option value="disetujui">Disetujui (Berjalan)</option>
            <option value="lunas">Lunas</option>
            <option value="ditolak">Ditolak</option>
        </select>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50/80 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-5 font-bold">No. Pengajuan</th>
                        <th class="py-3 px-5 font-bold">Nama Peminjam</th>
                        <th class="py-3 px-5 font-bold">Plafon Pinjaman</th>
                        <th class="py-3 px-5 font-bold">Tenor</th>
                        <th class="py-3 px-5 font-bold">Angsuran / Bln (Auto)</th>
                        <th class="py-3 px-5 font-bold">Status Persetujuan</th>
                        <th class="py-3 px-5 font-bold text-right">Tindakan Pimpinan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <!-- Row 1: Menunggu Persetujuan -->
                    <tr class="hover:bg-slate-50/60 transition bg-amber-50/20">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">PJ-2026-1015</td>
                        <td class="px-5">
                            <strong class="text-[#0f172a] block">Siti Rahmawati, S.Pd.</strong>
                            <span class="text-[11px] text-slate-400">Guru Tetap</span>
                        </td>
                        <td class="px-5 font-bold text-[#0f172a]">Rp 10.000.000</td>
                        <td class="px-5">12 Bulan</td>
                        <td class="px-5 font-bold text-amber-700">
                            Rp 933.333
                            <span class="block text-[10px] text-slate-400 font-normal">Pokok: 833rb + Bunga 1%</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                Menunggu Persetujuan
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <button onclick="alert('Pengajuan pinjaman PJ-2026-1015 sebesar Rp 10.000.000 DISETUJUI!')" type="button" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-2.5 py-1 rounded transition">
                                    Setujui
                                </button>
                                <button onclick="alert('Pengajuan pinjaman ditolak.')" type="button" class="bg-rose-500 hover:bg-rose-600 text-white text-xs font-semibold px-2.5 py-1 rounded transition">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Disetujui / Berjalan -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">PJ-2026-0810</td>
                        <td class="px-5">
                            <strong class="text-[#0f172a] block">Muhammad Rizky Pratama</strong>
                            <span class="text-[11px] text-slate-400">Siswa (XII SIJA)</span>
                        </td>
                        <td class="px-5 font-bold text-[#0f172a]">Rp 5.000.000</td>
                        <td class="px-5">6 Bulan</td>
                        <td class="px-5 font-bold text-[#1d4ed8]">
                            Rp 900.000
                            <span class="block text-[10px] text-slate-400 font-normal">Sisa 3x Cicilan</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                                Disetujui (Berjalan)
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-blue-600 hover:underline">
                                Cetak Akad
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3: Lunas -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5 font-semibold text-[#0f172a]">PJ-2025-0622</td>
                        <td class="px-5">
                            <strong class="text-[#0f172a] block">Budi Santoso</strong>
                            <span class="text-[11px] text-slate-400">Alumni</span>
                        </td>
                        <td class="px-5 font-bold text-[#0f172a]">Rp 3.000.000</td>
                        <td class="px-5">3 Bulan</td>
                        <td class="px-5 font-bold text-slate-400">
                            Rp 1.030.000
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                Lunas 100%
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <span class="text-xs text-slate-400">Selesai</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Input Pengajuan & Perhitungan Angsuran Otomatis -->
    <div id="modal-loan" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
                <h3 class="font-bold text-base text-[#0f172a]">Input Pengajuan Pinjaman Baru</h3>
                <button onclick="document.getElementById('modal-loan').classList.add('hidden')" type="button" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <x-lucide name="x" class="w-5 h-5" />
                </button>
            </div>

            <form onsubmit="alert('Pengajuan pinjaman berhasil dibuat dan diteruskan ke pimpinan untuk persetujuan!'); document.getElementById('modal-loan').classList.add('hidden'); return false;" class="space-y-3.5 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Nama Anggota Pemohon</label>
                    <select class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                        <option value="KBM-2024-0412">Muhammad Rizky Pratama (Siswa)</option>
                        <option value="KBM-2021-0015" selected>Siti Rahmawati, S.Pd. (Guru)</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Plafon Pinjaman (Rp)</label>
                        <input type="number" id="loan-amount" value="5000000" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                    </div>
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Jangka Waktu (Tenor)</label>
                        <select id="loan-tenor" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none bg-white">
                            <option value="3">3 Bulan</option>
                            <option value="6" selected>6 Bulan</option>
                            <option value="12">12 Bulan</option>
                            <option value="24">24 Bulan</option>
                        </select>
                    </div>
                </div>

                <!-- Box Perhitungan Angsuran Otomatis -->
                <div class="bg-blue-50/70 p-3.5 rounded-xl border border-blue-100 space-y-1.5 text-slate-700">
                    <span class="text-[11px] font-bold text-[#1d4ed8] block uppercase">Perhitungan Angsuran Otomatis:</span>
                    <div class="flex justify-between">
                        <span>Pokok per Bulan:</span>
                        <strong id="calc-pokok">Rp 833.333</strong>
                    </div>
                    <div class="flex justify-between">
                        <span>Jasa / Bunga Koperasi (1% flat):</span>
                        <strong id="calc-bunga">Rp 50.000</strong>
                    </div>
                    <div class="flex justify-between text-[#0f172a] font-bold text-xs pt-1 border-t border-blue-200">
                        <span>Total Angsuran per Bulan:</span>
                        <span class="text-[#1d4ed8]" id="calc-total">Rp 883.333</span>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Keperluan Pengajuan</label>
                    <input type="text" value="Pendidikan dan modal usaha siswa" class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs focus:ring-2 focus:ring-[#1d4ed8] focus:outline-none" />
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2.5">
                    <button onclick="document.getElementById('modal-loan').classList.add('hidden')" type="button" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Batal
                    </button>
                    <button type="submit" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm transition">
                        Simpan & Ajukan ke Pimpinan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
