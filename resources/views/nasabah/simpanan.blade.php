<x-layouts.nasabah title="Data Simpanan">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2942]">Data Simpanan Anggota</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Rincian simpanan pokok, wajib, sukarela, serta mutasi setor & tarik.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="window.print()" type="button" class="bg-white hover:bg-slate-50 text-[#0f2942] border border-slate-200 text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="printer" class="w-4 h-4 text-slate-600" />
                <span>Cetak Laporan</span>
            </button>
            <button type="button" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="plus" class="w-4 h-4" />
                <span>Setor Simpanan</span>
            </button>
        </div>
    </div>

    <!-- 3 Breakdown Simpanan Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Simpanan Pokok -->
        <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Simpanan Pokok</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-[#1d5ec9]">Tetap</span>
                </div>
                <div class="text-2xl font-bold text-[#0f2942]">Rp 100.000</div>
                <p class="text-xs text-[#64748b] mt-1.5 leading-relaxed">
                    Dibayarkan 1x saat pertama kali mendaftar sebagai anggota resmi koperasi.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-[#64748b]">
                <span>Status: Terverifikasi</span>
                <span class="text-emerald-600 font-semibold">Lunas</span>
            </div>
        </div>

        <!-- Simpanan Wajib -->
        <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Simpanan Wajib</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-50 text-emerald-700">Bulanan</span>
                </div>
                <div class="text-2xl font-bold text-emerald-600">Rp 1.200.000</div>
                <p class="text-xs text-[#64748b] mt-1.5 leading-relaxed">
                    Iuran wajib berkala sebesar Rp 50.000 per bulan (Tercatat 24 bulan aktif).
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-[#64748b]">
                <span>Periode: Okt 2026</span>
                <span class="text-emerald-600 font-semibold">Tertib</span>
            </div>
        </div>

        <!-- Simpanan Sukarela -->
        <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Simpanan Sukarela</span>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-purple-50 text-purple-700">Fleksibel</span>
                </div>
                <div class="text-2xl font-bold text-purple-600">Rp 1.200.000</div>
                <p class="text-xs text-[#64748b] mt-1.5 leading-relaxed">
                    Tabungan bebas yang dapat disetor dan ditarik anggota sewaktu-waktu.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px]">
                <button type="button" class="text-[#1d5ec9] font-semibold hover:underline">Tarik Saldo</button>
                <span class="text-slate-400">Bebas Admin</span>
            </div>
        </div>
    </div>

    <!-- Riwayat Simpanan Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <div>
                <h2 class="text-base font-bold text-[#0f172a]">Riwayat Setor & Tarik Simpanan</h2>
                <p class="text-xs text-[#64748b]">Seluruh mutasi dana simpanan yang tercatat di pembukuan koperasi</p>
            </div>

            <!-- Filter Status Setor/Tarik -->
            <div class="flex items-center gap-2">
                <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-[#1d5ec9] text-white">Semua</button>
                <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Setoran</button>
                <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-600 hover:bg-slate-200">Penarikan</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                        <th class="py-3 px-4 rounded-l-lg font-bold">Tanggal</th>
                        <th class="py-3 px-4 font-bold">Kategori Simpanan</th>
                        <th class="py-3 px-4 font-bold">Jenis Mutasi</th>
                        <th class="py-3 px-4 font-bold">Nominal</th>
                        <th class="py-3 px-4 font-bold">Saldo Akhir</th>
                        <th class="py-3 px-4 rounded-r-lg font-bold">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">14-10-2026</td>
                        <td class="px-4">Simpanan Sukarela</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">Setor Tunai</span>
                        </td>
                        <td class="px-4 font-semibold text-emerald-600">+Rp 100.000</td>
                        <td class="px-4 font-medium">Rp 2.500.000</td>
                        <td class="px-4 text-[#64748b]">Setoran tabungan via kasir koperasi</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">01-10-2026</td>
                        <td class="px-4">Simpanan Wajib</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700">Setor Wajib</span>
                        </td>
                        <td class="px-4 font-semibold text-emerald-600">+Rp 50.000</td>
                        <td class="px-4 font-medium">Rp 2.400.000</td>
                        <td class="px-4 text-[#64748b]">Iuran wajib periode Oktober 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">18-09-2026</td>
                        <td class="px-4">Simpanan Sukarela</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-rose-50 text-rose-700">Penarikan</span>
                        </td>
                        <td class="px-4 font-semibold text-rose-500">-Rp 200.000</td>
                        <td class="px-4 font-medium">Rp 2.350.000</td>
                        <td class="px-4 text-[#64748b]">Penarikan dana tunai untuk modul ujian</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">01-09-2026</td>
                        <td class="px-4">Simpanan Wajib</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700">Setor Wajib</span>
                        </td>
                        <td class="px-4 font-semibold text-emerald-600">+Rp 50.000</td>
                        <td class="px-4 font-medium">Rp 2.550.000</td>
                        <td class="px-4 text-[#64748b]">Iuran wajib periode September 2026</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium">15-07-2024</td>
                        <td class="px-4">Simpanan Pokok</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-purple-50 text-purple-700">Setor Awal</span>
                        </td>
                        <td class="px-4 font-semibold text-emerald-600">+Rp 100.000</td>
                        <td class="px-4 font-medium">Rp 100.000</td>
                        <td class="px-4 text-[#64748b]">Registrasi awal anggota resmi</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
