<x-layouts.nasabah title="Riwayat Transaksi">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2d59]">Riwayat Transaksi Anggota</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Catatan mutasi simpanan, penarikan, angsuran pinjaman, dan belanja di toko koperasi.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="window.print()" type="button" class="bg-white hover:bg-slate-50 text-[#0f2942] border border-slate-200 text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="printer" class="w-4 h-4 text-slate-600" />
                <span>Cetak Rekap</span>
            </button>
            <a href="{{ route('nasabah.dokumen') }}" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="file-text" class="w-4 h-4 text-white" />
                <span>Pusat Dokumen</span>
            </a>
        </div>
    </div>

    <!-- Filter Tabs & Search Bar -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-4 sm:p-5 mb-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Filter Tabs -->
            <div class="flex flex-wrap items-center gap-1.5 text-xs font-semibold">
                <button type="button" class="px-3.5 py-2 rounded-lg bg-[#1d5ec9] text-white shadow-sm transition">
                    Semua Transaksi
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Simpanan
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Penarikan
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Angsuran Pinjaman
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Pembelian Toko
                </button>
            </div>

            <!-- Search Field -->
            <div class="relative w-full md:w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                    <x-lucide name="search" class="w-3.5 h-3.5 text-slate-400" />
                </span>
                <input
                    type="search"
                    placeholder="Cari no. transaksi / ket..."
                    class="w-full pl-8 pr-3 py-1.5 rounded-lg border border-slate-200 text-xs text-[#0f2942] focus:outline-none focus:ring-2 focus:ring-[#1d5ec9]"
                />
            </div>
        </div>
    </div>

    <!-- Transaksi Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                        <th class="py-3.5 px-5 font-bold">No. Bukti / Tgl</th>
                        <th class="py-3.5 px-5 font-bold">Jenis Mutasi</th>
                        <th class="py-3.5 px-5 font-bold">Nominal</th>
                        <th class="py-3.5 px-5 font-bold">Keterangan</th>
                        <th class="py-3.5 px-5 font-bold">Status</th>
                        <th class="py-3.5 px-5 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <!-- Row 1: Simpanan -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">
                            <strong class="text-[#0f2942] block">TRX-20261014-001</strong>
                            <span class="text-[11px] text-slate-400">14-10-2026 10:15 WIB</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">Simpanan Sukarela</span>
                        </td>
                        <td class="px-5 font-bold text-emerald-600">+Rp 100.000</td>
                        <td class="px-5 text-slate-600">Setor tunai simpanan via kasir koperasi</td>
                        <td class="px-5">
                            <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-xs">
                                <x-lucide name="check" class="w-3 h-3 text-emerald-600" />
                                <span>Berhasil</span>
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 ml-auto">
                                <x-lucide name="printer" class="w-3 h-3" />
                                <span>Bukti</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2: Angsuran -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">
                            <strong class="text-[#0f2942] block">TRX-20261010-042</strong>
                            <span class="text-[11px] text-slate-400">10-10-2026 09:30 WIB</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">Angsuran Pinjaman</span>
                        </td>
                        <td class="px-5 font-bold text-rose-500">-Rp 900.000</td>
                        <td class="px-5 text-slate-600">Pembayaran angsuran ke-3 (PJ-2026-0810)</td>
                        <td class="px-5">
                            <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-xs">
                                <x-lucide name="check" class="w-3 h-3 text-emerald-600" />
                                <span>Berhasil</span>
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 ml-auto">
                                <x-lucide name="printer" class="w-3 h-3" />
                                <span>Bukti</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3: Pembelian Toko -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">
                            <strong class="text-[#0f2942] block">TRX-20261008-019</strong>
                            <span class="text-[11px] text-slate-400">08-10-2026 12:45 WIB</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700">Pembelian Toko</span>
                        </td>
                        <td class="px-5 font-bold text-rose-500">-Rp 45.000</td>
                        <td class="px-5 text-slate-600">Pembelian ATK: Buku Tulis & Pulpen Gel (3 item)</td>
                        <td class="px-5">
                            <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-xs">
                                <x-lucide name="check" class="w-3 h-3 text-emerald-600" />
                                <span>Berhasil</span>
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 ml-auto">
                                <x-lucide name="printer" class="w-3 h-3" />
                                <span>Struk</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4: Simpanan Wajib -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">
                            <strong class="text-[#0f2942] block">TRX-20261001-003</strong>
                            <span class="text-[11px] text-slate-400">01-10-2026 08:00 WIB</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 text-purple-700">Simpanan Wajib</span>
                        </td>
                        <td class="px-5 font-bold text-emerald-600">+Rp 50.000</td>
                        <td class="px-5 text-slate-600">Iuran simpanan wajib bulanan Oktober 2026</td>
                        <td class="px-5">
                            <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-xs">
                                <x-lucide name="check" class="w-3 h-3 text-emerald-600" />
                                <span>Berhasil</span>
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 ml-auto">
                                <x-lucide name="printer" class="w-3 h-3" />
                                <span>Bukti</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5: Penarikan Sukarela -->
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-5">
                            <strong class="text-[#0f2942] block">TRX-20260918-011</strong>
                            <span class="text-[11px] text-slate-400">18-09-2026 14:10 WIB</span>
                        </td>
                        <td class="px-5">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 text-rose-700">Penarikan Dana</span>
                        </td>
                        <td class="px-5 font-bold text-rose-500">-Rp 200.000</td>
                        <td class="px-5 text-slate-600">Penarikan simpanan sukarela untuk buku paket</td>
                        <td class="px-5">
                            <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-xs">
                                <x-lucide name="check" class="w-3 h-3 text-emerald-600" />
                                <span>Berhasil</span>
                            </span>
                        </td>
                        <td class="px-5 text-right">
                            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 ml-auto">
                                <x-lucide name="printer" class="w-3 h-3" />
                                <span>Bukti</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
