<x-layouts.nasabah title="Dashboard Anggota">
    <!-- Header Greeting & Member Profile Banner -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center font-bold text-xl border border-blue-100">
                MR
            </div>
            <div>
                <div class="flex items-center gap-2.5">
                    <h1 class="text-xl sm:text-2xl font-bold text-[#0f172a]">Muhammad Rizky Pratama</h1>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                        Anggota Aktif
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-[#64748b] mt-1.5">
                    <span>No. Anggota: <strong class="text-[#0f172a]">KBM-2024-0412</strong></span>
                    <span>•</span>
                    <span>Kategori: <strong class="text-[#0f172a]">Siswa (Kelas XII SIJA)</strong></span>
                    <span>•</span>
                    <span>Bergabung: <strong class="text-[#0f172a]">15 Juli 2024</strong></span>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('nasabah.simpanan') }}" class="inline-flex items-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition">
                <x-lucide name="plus" class="w-4 h-4" />
                <span>Setor Simpanan</span>
            </a>
            <a href="{{ route('nasabah.toko') }}" class="inline-flex items-center gap-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition">
                <x-lucide name="shopping-bag" class="w-4 h-4" />
                <span>Belanja Toko</span>
            </a>
        </div>
    </div>

    <!-- 3 Summary Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Card 1: Total Simpanan -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Total Simpanan</span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <x-lucide name="wallet" class="w-4 h-4 text-emerald-600" />
                    </div>
                </div>
                <div class="text-2xl font-extrabold text-emerald-600">Rp 2.500.000</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] text-[#64748b] flex justify-between">
                <span>Pokok: Rp 100rb</span>
                <span>Wajib: Rp 1,2Jt</span>
                <span>Sukarela: Rp 1,2Jt</span>
            </div>
        </div>

        <!-- Card 2: Pinjaman Aktif -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Sisa Pinjaman Aktif</span>
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#1d5ec9] flex items-center justify-center">
                        <x-lucide name="credit-card" class="w-4 h-4 text-[#1d5ec9]" />
                    </div>
                </div>
                <div class="text-2xl font-extrabold text-[#1d5ec9]">Rp 2.300.000</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] text-[#64748b] flex justify-between">
                <span>Plafon: Rp 5.000.000</span>
                <span>Sisa: 3 Bln</span>
            </div>
        </div>

        <!-- Card 3: Tagihan Angsuran Berikutnya -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold uppercase tracking-wider text-[#64748b]">Jatuh Tempo Angsuran</span>
                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                        <x-lucide name="clock" class="w-4 h-4 text-amber-600" />
                    </div>
                </div>
                <div class="text-2xl font-extrabold text-amber-600">Rp 900.000</div>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 text-[11px] text-[#64748b] flex justify-between">
                <span>Jatuh Tempo: 10 Nov 2026</span>
                <span class="text-amber-700 font-semibold">Angsuran ke-4</span>
            </div>
        </div>
    </div>

    <!-- 2 Column Overview (Pinjaman Info & Transaksi Terbaru) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Status Pinjaman Ringkas -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base font-bold text-[#0f172a]">Pinjaman Berjalan</h2>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                    Disetujui
                </span>
            </div>

            <div class="space-y-3 text-xs sm:text-sm">
                <div class="flex justify-between py-1.5 border-b border-slate-100">
                    <span class="text-[#64748b]">Total Pinjaman</span>
                    <strong class="text-[#0f172a]">Rp 5.000.000</strong>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-100">
                    <span class="text-[#64748b]">Jangka Waktu</span>
                    <strong class="text-[#0f172a]">6 Bulan</strong>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-100">
                    <span class="text-[#64748b]">Cicilan / Bulan</span>
                    <strong class="text-[#0f172a]">Rp 900.000</strong>
                </div>
                <div class="flex justify-between py-1.5 border-b border-slate-100">
                    <span class="text-[#64748b]">Sudah Terbayar</span>
                    <strong class="text-emerald-600">Rp 2.700.000 (3x)</strong>
                </div>
                <div class="flex justify-between py-1.5">
                    <span class="text-[#64748b]">Sisa Pinjaman</span>
                    <strong class="text-[#1d5ec9]">Rp 2.300.000 (3x)</strong>
                </div>
            </div>

            <div class="mt-5">
                <a href="{{ route('nasabah.pinjaman') }}" class="w-full inline-flex items-center justify-center gap-1.5 bg-slate-100 hover:bg-slate-200 text-[#0f172a] text-xs font-semibold py-2.5 rounded-lg transition">
                    <span>Lihat Jadwal Angsuran</span>
                    <x-lucide name="arrow-right" class="w-3.5 h-3.5" />
                </a>
            </div>
        </div>

        <!-- Transaksi Terbaru Table Card -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-base font-bold text-[#0f172a]">Mutasi Transaksi Terakhir</h2>
                    <p class="text-xs text-[#64748b]">Aktivitas simpanan, angsuran & belanja toko</p>
                </div>
                <a href="{{ route('nasabah.transaksi') }}" class="text-xs sm:text-sm font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <x-lucide name="arrow-right" class="w-3.5 h-3.5" />
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-100">
                            <th class="py-3 font-semibold">Tanggal</th>
                            <th class="py-3 font-semibold">Jenis</th>
                            <th class="py-3 font-semibold">Nominal</th>
                            <th class="py-3 font-semibold">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-[#334155]">
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5">14 Okt 2026</td>
                            <td>
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700">Simpanan</span>
                            </td>
                            <td class="font-semibold text-emerald-600">+Rp 100.000</td>
                            <td>Setoran Simpanan Sukarela</td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5">10 Okt 2026</td>
                            <td>
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-blue-50 text-blue-700">Angsuran</span>
                            </td>
                            <td class="font-semibold text-rose-500">-Rp 900.000</td>
                            <td>Angsuran Ke-3 Pinjaman KBM</td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5">08 Okt 2026</td>
                            <td>
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-amber-50 text-amber-700">Toko Koperasi</span>
                            </td>
                            <td class="font-semibold text-rose-500">-Rp 45.000</td>
                            <td>Pembelian Paket ATK Ujian</td>
                        </tr>
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5">01 Okt 2026</td>
                            <td>
                                <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-purple-50 text-purple-700">Simpanan Wajib</span>
                            </td>
                            <td class="font-semibold text-emerald-600">+Rp 50.000</td>
                            <td>Iuran Wajib Bulanan Okt</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.nasabah>