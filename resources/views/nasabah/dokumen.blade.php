<x-layouts.nasabah title="Cetak Dokumen">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2d59]">Cetak Dokumen & Laporan</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Unduh dan cetak bukti transaksi resmi, laporan simpanan, serta kuitansi anggota.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="window.print()" type="button" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2">
                <x-lucide name="printer" class="w-4 h-4 text-white" />
                <span>Cetak Tampilan Ini</span>
            </button>
        </div>
    </div>

    <!-- 4 Document Types Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <!-- Dokumen 1 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-[#1d5ec9] flex items-center justify-center mb-3">
                    <x-lucide name="file-text" class="w-5 h-5 text-[#1d5ec9]" />
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Laporan Simpanan</h3>
                <p class="text-xs text-[#64748b] leading-relaxed">
                    Rekap saldo simpanan pokok, wajib, dan sukarela beserta mutasi tahunan.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Format PDF / A4</span>
                <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1">
                    <x-lucide name="download" class="w-3.5 h-3.5" />
                    <span>Unduh PDF</span>
                </button>
            </div>
        </div>

        <!-- Dokumen 2 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                    <x-lucide name="receipt-text" class="w-5 h-5 text-emerald-600" />
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Bukti Kuitansi Setoran</h3>
                <p class="text-xs text-[#64748b] leading-relaxed">
                    Kuitansi sah setoran simpanan sukarela dan wajib periode terakhir.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Format Thermal / Struk</span>
                <button onclick="window.print()" type="button" class="text-xs font-semibold text-emerald-600 hover:underline flex items-center gap-1">
                    <x-lucide name="printer" class="w-3.5 h-3.5" />
                    <span>Cetak Struk</span>
                </button>
            </div>
        </div>

        <!-- Dokumen 3 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center mb-3">
                    <x-lucide name="file-check" class="w-5 h-5 text-purple-600" />
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Perjanjian Pinjaman</h3>
                <p class="text-xs text-[#64748b] leading-relaxed">
                    Surat akad pinjaman aktif (PJ-2026-0810) beserta lampiran jadwal angsuran.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Legal Surat</span>
                <button onclick="window.print()" type="button" class="text-xs font-semibold text-purple-600 hover:underline flex items-center gap-1">
                    <x-lucide name="download" class="w-3.5 h-3.5" />
                    <span>Unduh PDF</span>
                </button>
            </div>
        </div>

        <!-- Dokumen 4 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center mb-3">
                    <x-lucide name="user" class="w-5 h-5 text-amber-600" />
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Kartu Anggota Digital</h3>
                <p class="text-xs text-[#64748b] leading-relaxed">
                    Identitas resmi keanggotaan Koperasi Sekolah Bina Bangkit Mandiri.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] text-slate-400">ID Card / Cetak</span>
                <button onclick="window.print()" type="button" class="text-xs font-semibold text-amber-600 hover:underline flex items-center gap-1">
                    <x-lucide name="printer" class="w-3.5 h-3.5" />
                    <span>Cetak Kartu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Official Preview Sheet / Bukti Transaksi Resmi -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 sm:p-8 max-w-3xl mx-auto">
        <!-- Kop Surat Dokumen -->
        <div class="border-b-2 border-[#0c284d] pb-4 mb-6 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-[#1d5ec9] text-white flex items-center justify-center">
                    <x-lucide name="building-2" class="w-6 h-6 text-white" />
                </div>
                <div>
                    <h2 class="text-base font-bold text-[#0c284d] uppercase tracking-wide">Koperasi Bina Bangkit Mandiri</h2>
                    <p class="text-xs text-[#64748b]">Badan Hukum No. 518/BH/KOP/X/2022 • Unit Simpan Pinjam & Toko Sekolah</p>
                </div>
            </div>
            <div class="text-right text-xs text-[#64748b]">
                <span class="block font-bold text-[#0f2942]">SURAT BUKTI TRANSAKSI</span>
                <span>Ref: KBM/SLP/2026/10-042</span>
            </div>
        </div>

        <!-- Informasi Anggota & Dokumen -->
        <div class="grid grid-cols-2 gap-4 text-xs mb-6 bg-slate-50 p-4 rounded-xl">
            <div>
                <span class="text-slate-400 block mb-0.5">Nama Anggota:</span>
                <strong class="text-[#0f2942] text-sm">Muhammad Rizky Pratama</strong>
                <span class="text-slate-500 block mt-0.5">No. Anggota: KBM-2024-0412 (Siswa)</span>
            </div>
            <div class="text-right">
                <span class="text-slate-400 block mb-0.5">Tanggal Dokumen:</span>
                <strong class="text-[#0f2942]">14 Oktober 2026</strong>
                <span class="text-emerald-600 font-semibold block mt-0.5">Status: Terverifikasi Sistem</span>
            </div>
        </div>

        <!-- Detail Rincian Simpanan & Transaksi -->
        <table class="w-full text-xs sm:text-sm text-left mb-6">
            <thead>
                <tr class="border-b border-slate-200 text-slate-500 text-xs">
                    <th class="py-2">Uraian / Keterangan</th>
                    <th class="py-2 text-right">Debit</th>
                    <th class="py-2 text-right">Kredit</th>
                    <th class="py-2 text-right">Saldo Kumulatif</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-[#334155]">
                <tr>
                    <td class="py-2.5 font-medium">Simpanan Pokok (Awal Anggota)</td>
                    <td class="text-right">-</td>
                    <td class="text-right text-emerald-600 font-medium">Rp 100.000</td>
                    <td class="text-right font-medium">Rp 100.000</td>
                </tr>
                <tr>
                    <td class="py-2.5 font-medium">Simpanan Wajib (Total s.d. Okt 2026)</td>
                    <td class="text-right">-</td>
                    <td class="text-right text-emerald-600 font-medium">Rp 1.200.000</td>
                    <td class="text-right font-medium">Rp 1.300.000</td>
                </tr>
                <tr>
                    <td class="py-2.5 font-medium">Simpanan Sukarela (Total Saldo)</td>
                    <td class="text-right">-</td>
                    <td class="text-right text-emerald-600 font-medium">Rp 1.200.000</td>
                    <td class="text-right font-bold text-[#1d5ec9]">Rp 2.500.000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-slate-200 font-bold text-sm">
                    <td class="py-3 text-[#0f2942]">TOTAL SALDO SIMPANAN ANGGOTA</td>
                    <td colspan="2" class="text-right text-slate-400">Total Sah</td>
                    <td class="py-3 text-right text-emerald-600">Rp 2.500.000</td>
                </tr>
            </tfoot>
        </table>

        <!-- Signatures / Footer Stempel -->
        <div class="grid grid-cols-2 gap-8 text-center text-xs text-[#64748b] pt-6 border-t border-slate-100">
            <div>
                <p class="mb-14">Anggota Koperasi,</p>
                <p class="font-bold text-[#0f2942] underline">Muhammad Rizky Pratama</p>
                <p class="text-[10px]">NIS / No: KBM-2024-0412</p>
            </div>
            <div>
                <p class="mb-14">Pengurus / Kasir Koperasi,</p>
                <p class="font-bold text-[#0f2942] underline">Siti Rahmawati, S.Pd.</p>
                <p class="text-[10px]">NIP: 19850412 201001 2 003</p>
            </div>
        </div>
    </div>
</x-layouts.nasabah>