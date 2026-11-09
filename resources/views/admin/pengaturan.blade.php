<x-layouts.admin title="Pengaturan Koperasi">
    <!-- Header Halaman -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f172a]">Pengaturan Koperasi</h1>
        <p class="text-xs sm:text-sm text-[#64748b] mt-0.5">Konfigurasi profil koperasi dan parameter simpan pinjam.</p>
    </div>

    <div class="space-y-6 max-w-3xl">
        <!-- Card 1: Profil Koperasi -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <h2 class="text-base font-bold text-[#0f172a] mb-4">Profil Koperasi</h2>
            <div class="space-y-4 text-sm">
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Nama Koperasi</label>
                    <input type="text" value="Koperasi Simpan Pinjam Sekolah" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-[#64748b] mb-1">Nomor Badan Hukum</label>
                        <input type="text" value="AHU-0012345.AH.01.26.TAHUN 2024" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-[#64748b] mb-1">Kontak Resmi (WhatsApp)</label>
                        <input type="text" value="0812-3456-7890" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Alamat Kantor</label>
                    <input type="text" value="Jl. Pendidikan No. 10, Jakarta Selatan" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
            </div>
        </div>

        <!-- Card 2: Parameter Finansial -->
        <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
            <h2 class="text-base font-bold text-[#0f172a] mb-4">Aturan Finansial Simpan Pinjam</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Simpanan Pokok (Sekali)</label>
                    <input type="text" value="Rp 500.000" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Simpanan Wajib per Bulan</label>
                    <input type="text" value="Rp 100.000" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Suku Bunga Pinjaman (% / bulan)</label>
                    <input type="text" value="1.0%" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
                <div>
                    <label class="block text-xs font-medium text-[#64748b] mb-1">Maksimal Tenor Pinjaman</label>
                    <input type="text" value="24 Bulan" class="w-full px-4 py-2 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]" />
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 flex justify-end">
                <button type="button" class="bg-[#1d4ed8] hover:bg-[#1e40af] text-white px-6 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</x-layouts.admin>
