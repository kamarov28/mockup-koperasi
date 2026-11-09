<x-layouts.public title="Layanan">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">
            Produk & Fasilitas
        </span>
        <h1 class="text-3xl sm:text-4xl font-bold text-[#0c1e40] tracking-tight">
            Layanan Keuangan Koperasi
        </h1>
        <p class="text-sm sm:text-base text-[#5c6b84] mt-3 leading-relaxed">
            Beragam solusi finansial terintegrasi untuk membantu simpanan masa depan dan pemenuhan kebutuhan pinjaman anggota sekolah.
        </p>
    </div>

    <!-- 4 Services Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <!-- Layanan 1 -->
        <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-[#dff3e8] text-[#15803d] flex items-center justify-center shrink-0">
                <x-lucide name="wallet" class="w-6 h-6 text-[#15803d]" />
            </div>
            <div>
                <h3 class="text-base font-bold text-[#0c1e40] mb-1.5">Simpanan Pokok & Wajib</h3>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-3">
                    Fondasi keanggotaan koperasi dengan setoran pokok sekali saat pendaftaran dan simpanan wajib bulanan terjangkau untuk memperkuat aset bersama.
                </p>
                <div class="flex items-center gap-4 text-xs font-medium text-emerald-600">
                    <span>• Bunga kompetitif</span>
                    <span>• Dana aman terdaftar</span>
                </div>
            </div>
        </div>

        <!-- Layanan 2 -->
        <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center shrink-0">
                <x-lucide name="circle-dollar-sign" class="w-6 h-6 text-[#1d5ec9]" />
            </div>
            <div>
                <h3 class="text-base font-bold text-[#0c1e40] mb-1.5">Simpanan Sukarela</h3>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-3">
                    Tabungan fleksibel tanpa batas minimal bulanan. Bebas biaya administrasi dan dapat disetor atau ditarik kapan saja sesuai kebutuhan anggota.
                </p>
                <div class="flex items-center gap-4 text-xs font-medium text-[#1d5ec9]">
                    <span>• Penarikan fleksibel</span>
                    <span>• Bebas potongan admin</span>
                </div>
            </div>
        </div>

        <!-- Layanan 3 -->
        <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <x-lucide name="hand-coins" class="w-6 h-6 text-amber-600" />
            </div>
            <div>
                <h3 class="text-base font-bold text-[#0c1e40] mb-1.5">Pinjaman Ringan & Cepat</h3>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-3">
                    Fasilitas dana tunai untuk keperluan pendidikan, modal usaha produktif, atau kebutuhan mendesak dengan suku bunga rendah dan pilihan tenor 3 hingga 24 bulan.
                </p>
                <div class="flex items-center gap-4 text-xs font-medium text-amber-600">
                    <span>• Bunga 1% / bulan</span>
                    <span>• Proses verifikasi cepat</span>
                </div>
            </div>
        </div>

        <!-- Layanan 4 -->
        <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 flex items-start gap-5">
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <x-lucide name="receipt-text" class="w-6 h-6 text-purple-600" />
            </div>
            <div>
                <h3 class="text-base font-bold text-[#0c1e40] mb-1.5">Monitoring Mutasi Real-time</h3>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-3">
                    Seluruh riwayat setoran, angsuran, dan saldo simpanan tercatat otomatis di portal nasabah sehingga anggota dapat mengecek riwayat kapan saja.
                </p>
                <div class="flex items-center gap-4 text-xs font-medium text-purple-600">
                    <span>• Transparan 100%</span>
                    <span>• Notifikasi otomatis</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 3 Steps Simple Process -->
    <div class="bg-white rounded-2xl p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 mb-12">
        <h2 class="text-lg font-bold text-[#0c1e40] text-center mb-8">Alur Kemudahan Akses Layanan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="w-10 h-10 rounded-full bg-[#1d5ec9] text-white flex items-center justify-center text-sm font-bold mx-auto mb-3">
                    1
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Registrasi Anggota</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Daftar menggunakan NIS / No. Anggota dan lengkapi data profil koperasi.</p>
            </div>
            <div class="text-center">
                <div class="w-10 h-10 rounded-full bg-[#1d5ec9] text-white flex items-center justify-center text-sm font-bold mx-auto mb-3">
                    2
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Pilih Transaksi</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Mulai menabung simpanan atau ajukan pinjaman dengan formulir digital.</p>
            </div>
            <div class="text-center">
                <div class="w-10 h-10 rounded-full bg-[#1d5ec9] text-white flex items-center justify-center text-sm font-bold mx-auto mb-3">
                    3
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Pantau & Nikmati Hasil</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Cek saldo, mutasi berkala, dan bagi hasil tahunan secara langsung.</p>
            </div>
        </div>
    </div>
</x-layouts.public>
