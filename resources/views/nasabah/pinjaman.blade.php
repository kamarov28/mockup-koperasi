<x-layouts.nasabah title="Data Pinjaman">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2942]">Data Pinjaman Anggota</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Informasi status persetujuan, sisa pinjaman, dan jadwal angsuran bulanan.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('nasabah.pinjaman.pengajuan') }}" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="plus" class="w-4 h-4" />
                <span>Pengajuan Pinjaman Baru</span>
            </a>
        </div>
    </div>

    <!-- Status Pinjaman Aktif & Sisa Pinjaman -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-4">
                <span class="font-bold text-sm text-[#0f2942]">Status Pinjaman Aktif</span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50">
                    Disetujui
                </span>
            </div>

            <div class="space-y-3 text-xs sm:text-sm">
                <div class="flex justify-between items-center py-1">
                    <span class="text-[#64748b]">No. Kontrak Pinjaman</span>
                    <strong class="text-[#0f2942]">PJ-2026-0810</strong>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="text-[#64748b]">Total Plafon Pinjaman</span>
                    <strong class="text-[#0f2942]">Rp 5.000.000</strong>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="text-[#64748b]">Sisa Pokok Pinjaman</span>
                    <strong class="text-[#1d5ec9] text-base">Rp 2.300.000</strong>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="text-[#64748b]">Tenor / Jangka Waktu</span>
                    <strong class="text-[#0f2942]">6 Bulan (Sisa 3x)</strong>
                </div>
                <div class="flex justify-between items-center py-1">
                    <span class="text-[#64748b]">Angsuran per Bulan</span>
                    <strong class="text-amber-600 font-bold">Rp 900.000</strong>
                </div>
            </div>
        </div>

        <!-- Jadwal Angsuran Table -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-base font-bold text-[#0f2942]">Jadwal Angsuran Pinjaman</h2>
                    <p class="text-xs text-[#64748b]">Status pembayaran tiap termin cicilan</p>
                </div>
                <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1">
                    <x-lucide name="printer" class="w-3.5 h-3.5" />
                    <span>Cetak Jadwal</span>
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                            <th class="py-2.5 px-3 rounded-l-lg font-bold">Bulan Ke</th>
                            <th class="py-2.5 px-3 font-bold">Jatuh Tempo</th>
                            <th class="py-2.5 px-3 font-bold">Jumlah Angsuran</th>
                            <th class="py-2.5 px-3 font-bold">Tgl Bayar</th>
                            <th class="py-2.5 px-3 rounded-r-lg font-bold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-[#334155]">
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-2.5 px-3 font-medium">Bulan ke-1</td>
                            <td class="px-3">10-08-2026</td>
                            <td class="px-3 font-semibold">Rp 900.000</td>
                            <td class="px-3 text-slate-500">10-08-2026</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">Lunas</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-2.5 px-3 font-medium">Bulan ke-2</td>
                            <td class="px-3">10-09-2026</td>
                            <td class="px-3 font-semibold">Rp 900.000</td>
                            <td class="px-3 text-slate-500">09-09-2026</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">Lunas</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-2.5 px-3 font-medium">Bulan ke-3</td>
                            <td class="px-3">10-10-2026</td>
                            <td class="px-3 font-semibold">Rp 900.000</td>
                            <td class="px-3 text-slate-500">10-10-2026</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">Lunas</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition bg-amber-50/30">
                            <td class="py-2.5 px-3 font-bold text-amber-900">Bulan ke-4</td>
                            <td class="px-3 font-bold text-amber-900">10-11-2026</td>
                            <td class="px-3 font-bold text-amber-700">Rp 900.000</td>
                            <td class="px-3 text-amber-700">-</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-100 text-amber-800">Tagihan Aktif</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition text-slate-400">
                            <td class="py-2.5 px-3 font-medium">Bulan ke-5</td>
                            <td class="px-3">10-12-2026</td>
                            <td class="px-3">Rp 900.000</td>
                            <td class="px-3">-</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-slate-100 text-slate-500">Belum Jatuh Tempo</span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition text-slate-400">
                            <td class="py-2.5 px-3 font-medium">Bulan ke-6</td>
                            <td class="px-3">10-01-2027</td>
                            <td class="px-3">Rp 900.000</td>
                            <td class="px-3">-</td>
                            <td class="px-3">
                                <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-slate-100 text-slate-500">Belum Jatuh Tempo</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Riwayat Seluruh Pengajuan Pinjaman -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
        <h2 class="text-base font-bold text-[#0f2942] mb-4">Riwayat Pengajuan Pinjaman</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-[#f0f5fa] text-[#334155] text-xs">
                        <th class="py-3 px-4 rounded-l-lg font-bold">No. Pengajuan</th>
                        <th class="py-3 px-4 font-bold">Tanggal</th>
                        <th class="py-3 px-4 font-bold">Plafon</th>
                        <th class="py-3 px-4 font-bold">Tenor</th>
                        <th class="py-3 px-4 font-bold">Keperluan</th>
                        <th class="py-3 px-4 rounded-r-lg font-bold">Status Persetujuan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">PJ-2026-0810</td>
                        <td class="px-4">10-08-2026</td>
                        <td class="px-4 font-semibold text-[#0f2942]">Rp 5.000.000</td>
                        <td class="px-4">6 Bulan</td>
                        <td class="px-4">Modal Wirausaha Siswa</td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Disetujui Pimpinan
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">PJ-2025-0622</td>
                        <td class="px-4">22-06-2025</td>
                        <td class="px-4 font-semibold text-[#0f2942]">Rp 3.000.000</td>
                        <td class="px-4">3 Bulan</td>
                        <td class="px-4">Pendidikan</td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#e0f2fe] text-[#0284c7]">
                                Lunas
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
