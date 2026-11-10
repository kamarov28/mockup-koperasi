<x-layouts.admin title="Laporan & Fitur Pendukung">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[#0f172a]">Laporan Koperasi & Notifikasi</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Rekapitulasi keuangan, ekspor dokumen PDF/Excel, serta broadcast notifikasi WhatsApp.</p>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="window.print()" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-1.5">
                <x-lucide name="printer" class="w-4 h-4 text-white" />
                <span>Unduh PDF</span>
            </button>
            <button type="button" onclick="alert('Mengunduh rekapitulasi data format Excel (.xlsx)...')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-1.5">
                <x-lucide name="download" class="w-4 h-4 text-white" />
                <span>Unduh Excel</span>
            </button>
        </div>
    </div>

    <!-- Category Tabs -->
    <div class="flex flex-wrap items-center gap-2 mb-6">
        <button type="button" class="bg-[#dbeafe] text-[#1d4ed8] font-semibold text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Simpanan
        </button>
        <button type="button" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Pinjaman
        </button>
        <button type="button" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium text-xs sm:text-sm px-4 py-2 rounded-lg transition">
            Laporan Toko Koperasi
        </button>
        <button onclick="document.getElementById('whatsapp-notification-panel').scrollIntoView({ behavior: 'smooth' })" type="button" class="bg-emerald-50 text-emerald-700 font-semibold text-xs sm:text-sm px-4 py-2 rounded-lg transition flex items-center gap-1.5">
            <x-lucide name="bell" class="w-4 h-4 text-emerald-600" />
            <span>Notifikasi WhatsApp</span>
        </button>
    </div>

    <!-- Date Filter & Actions Toolbar -->
    <form class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-4 sm:p-5 mb-8 flex flex-wrap items-end gap-4" onsubmit="return false;">
        <div>
            <label class="block text-xs font-medium text-[#64748b] mb-1">Periode Dari</label>
            <input
                type="date"
                value="2026-10-01"
                class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2563eb]"
            />
        </div>

        <div>
            <label class="block text-xs font-medium text-[#64748b] mb-1">Sampai Tanggal</label>
            <input
                type="date"
                value="2026-10-31"
                class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#2563eb]"
            />
        </div>

        <button type="button" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-sm font-semibold px-5 py-2 rounded-lg shadow-sm transition">
            Filter Laporan
        </button>
    </form>

    <!-- 3 Summary KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Total Simpanan Masuk</span>
            <div class="text-xl font-bold text-emerald-600 mt-1">Rp 480.250.000</div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Total Penyaluran Pinjaman</span>
            <div class="text-xl font-bold text-blue-600 mt-1">Rp 128.000.000</div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)]">
            <span class="text-xs font-medium text-[#64748b]">Omzet Toko Koperasi</span>
            <div class="text-xl font-bold text-amber-600 mt-1">Rp 18.450.000</div>
        </div>
    </div>

    <!-- Detail Laporan Table Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-12">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-base font-bold text-[#0f172a]">Detail Rekap Buku Simpanan Periode Oktober 2026</h2>
            <span class="text-xs text-slate-400">Terverifikasi Akuntansi Koperasi</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-600 text-xs border-b border-slate-200">
                        <th class="py-3 px-4 font-bold">No. Anggota</th>
                        <th class="py-3 px-4 font-bold">Nama Anggota</th>
                        <th class="py-3 px-4 font-bold">Kategori</th>
                        <th class="py-3 px-4 font-bold">Simpanan Pokok</th>
                        <th class="py-3 px-4 font-bold">Simpanan Wajib</th>
                        <th class="py-3 px-4 font-bold">Simpanan Sukarela</th>
                        <th class="py-3 px-4 font-bold text-right">Total Akumulasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium text-[#0f172a]">KBM-2024-0412</td>
                        <td class="px-4 font-medium text-[#0f172a]">Muhammad Rizky Pratama</td>
                        <td class="px-4">Siswa (XII SIJA)</td>
                        <td class="px-4">Rp 100.000</td>
                        <td class="px-4">Rp 1.200.000</td>
                        <td class="px-4">Rp 1.200.000</td>
                        <td class="px-4 text-right font-bold text-emerald-600">Rp 2.500.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium text-[#0f172a]">KBM-2021-0015</td>
                        <td class="px-4 font-medium text-[#0f172a]">Siti Rahmawati, S.Pd.</td>
                        <td class="px-4">Guru Tetap</td>
                        <td class="px-4">Rp 100.000</td>
                        <td class="px-4">Rp 2.400.000</td>
                        <td class="px-4">Rp 3.500.000</td>
                        <td class="px-4 text-right font-bold text-emerald-600">Rp 6.000.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-medium text-[#0f172a]">KBM-2023-0199</td>
                        <td class="px-4 font-medium text-[#0f172a]">Budi Santoso</td>
                        <td class="px-4">Alumni</td>
                        <td class="px-4">Rp 100.000</td>
                        <td class="px-4">Rp 600.000</td>
                        <td class="px-4">Rp 450.000</td>
                        <td class="px-4 text-right font-bold text-emerald-600">Rp 1.150.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section Notifikasi WhatsApp (Fitur Pendukung Sesuai PRD) -->
    <div id="whatsapp-notification-panel" class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 sm:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <x-lucide name="bell" class="w-5 h-5 text-emerald-600" />
            </div>
            <div>
                <h2 class="text-base font-bold text-[#0f172a]">Integrasi Notifikasi WhatsApp Anggota</h2>
                <p class="text-xs text-[#64748b]">Kirimkan konfirmasi setoran, pengingat tagihan angsuran, dan pengumuman resmi ke nomor HP anggota</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Template 1: Setoran Masuk -->
            <div class="p-5 rounded-xl border border-slate-200 bg-slate-50 flex flex-col justify-between">
                <div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase">1. Setoran Masuk</span>
                    <h3 class="font-bold text-sm text-[#0f172a] mt-2 mb-2">Konfirmasi Simpanan</h3>
                    <p class="text-xs text-slate-600 bg-white p-3 rounded-lg border border-slate-200 font-mono leading-relaxed">
                        "Halo *Muhammad Rizky*, setoran Simpanan Sukarela sebesar *Rp 100.000* berhasil dicatat. Saldo akhir Anda: *Rp 2.500.000*. Terima kasih - Koperasi Bina Bangkit Mandiri."
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-200">
                    <button onclick="alert('Notifikasi WhatsApp Setoran Masuk berhasil dikirim ke 0812-3456-7890!')" type="button" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold py-2 rounded-lg transition flex items-center justify-center gap-1.5">
                        <x-lucide name="check" class="w-3.5 h-3.5 text-white" />
                        <span>Kirim Notifikasi WA</span>
                    </button>
                </div>
            </div>

            <!-- Template 2: Tagihan Angsuran -->
            <div class="p-5 rounded-xl border border-slate-200 bg-slate-50 flex flex-col justify-between">
                <div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-800 uppercase">2. Tagihan Angsuran</span>
                    <h3 class="font-bold text-sm text-[#0f172a] mt-2 mb-2">Pengingat Jatuh Tempo</h3>
                    <p class="text-xs text-slate-600 bg-white p-3 rounded-lg border border-slate-200 font-mono leading-relaxed">
                        "Pengingat: Angsuran pinjaman ke-4 Anda sebesar *Rp 900.000* akan jatuh tempo pada *10 Nov 2026*. Silakan setor di kasir koperasi sekolah."
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-200">
                    <button onclick="alert('Notifikasi WhatsApp Tagihan Angsuran berhasil dikirim!')" type="button" class="w-full bg-[#1d4ed8] hover:bg-[#1e40af] text-white text-xs font-semibold py-2 rounded-lg transition flex items-center justify-center gap-1.5">
                        <x-lucide name="check" class="w-3.5 h-3.5 text-white" />
                        <span>Kirim Pengingat WA</span>
                    </button>
                </div>
            </div>

            <!-- Template 3: Pengumuman Koperasi -->
            <div class="p-5 rounded-xl border border-slate-200 bg-slate-50 flex flex-col justify-between">
                <div>
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800 uppercase">3. Pengumuman Koperasi</span>
                    <h3 class="font-bold text-sm text-[#0f172a] mt-2 mb-2">Broadcast Info Civitas</h3>
                    <p class="text-xs text-slate-600 bg-white p-3 rounded-lg border border-slate-200 font-mono leading-relaxed">
                        "PENGUMUMAN: Rapat Anggota Tahunan (RAT) Tahun Buku 2026 akan dilaksanakan pada hari Sabtu, 24 Okt 2026 di Aula Sekolah. Diharapkan kehadiran anggota."
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-200">
                    <button onclick="alert('Broadcast pengumuman berhasil dikirim ke 1.250 kontak anggota!')" type="button" class="w-full bg-amber-600 hover:bg-amber-700 text-white text-xs font-semibold py-2 rounded-lg transition flex items-center justify-center gap-1.5">
                        <x-lucide name="check" class="w-3.5 h-3.5 text-white" />
                        <span>Broadcast Semua Anggota</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
