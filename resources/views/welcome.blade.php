<x-layouts.public title="Beranda">
    <!-- Hero Section -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-4">
                <x-lucide name="building-2" class="w-3.5 h-3.5 text-[#1d5ec9]" />
                <span>Koperasi Sekolah Bina Bangkit Mandiri</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#0c1e40] leading-[1.25] tracking-tight">
                Bersama Membangun Kesejahteraan Anggota
            </h1>
            <p class="text-[#5c6b84] text-sm sm:text-base leading-relaxed mt-4 mb-8 max-w-lg">
                Koperasi Bina Bangkit Mandiri hadir sebagai pilar kemandirian ekonomi civitas sekolah melalui layanan simpan pinjam terpercaya, toko koperasi lengkap, serta pemberdayaan kewirausahaan siswa dan guru.
            </p>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-[#1d5ec9] hover:bg-[#154cb0] text-white font-semibold px-7 py-3.5 rounded-lg shadow-sm transition text-sm sm:text-base">
                    <span>Masuk Portal Anggota</span>
                    <x-lucide name="arrow-right" class="w-4 h-4 text-white" />
                </a>
                <a href="{{ route('layanan') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-[#0c1e40] border border-slate-200/80 font-medium px-6 py-3.5 rounded-lg transition text-sm sm:text-base">
                    <span>Pelajari Layanan</span>
                </a>
            </div>
            <p class="text-xs text-[#8292ab] mt-3">
                *Akses akun dan keanggotaan diterbitkan langsung oleh pengurus koperasi sekolah.
            </p>
        </div>

        <div class="flex justify-center items-center">
            <div class="w-full max-w-[500px]">
                <!-- Hero Banner Illustration -->
                <img
                    src="{{ asset('images/hero-banner.png') }}"
                    alt="Ilustrasi Kesejahteraan Anggota Koperasi"
                    class="w-full h-auto object-contain mix-blend-multiply pointer-events-none select-none"
                />
            </div>
        </div>
    </section>

    <!-- 4 Quick Service Cards -->
    <section id="layanan" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-12 mb-10">
        <!-- Card 1: Simpanan -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="wallet" class="w-6 h-6 text-[#15803d]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Simpanan</h3>
            <p class="text-xs text-[#5c6b84]">Pokok, wajib & sukarela aman</p>
        </a>

        <!-- Card 2: Pinjaman -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="hand-coins" class="w-6 h-6 text-[#1d5ec9]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Pinjaman</h3>
            <p class="text-xs text-[#5c6b84]">Pengajuan online cepat</p>
        </a>

        <!-- Card 3: Toko Koperasi -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="shopping-bag" class="w-6 h-6 text-amber-600" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Toko Koperasi</h3>
            <p class="text-xs text-[#5c6b84]">ATK, seragam & konsumsi</p>
        </a>

        <!-- Card 4: Transparansi -->
        <a href="{{ route('tentang') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="receipt-text" class="w-6 h-6 text-purple-600" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Transparansi</h3>
            <p class="text-xs text-[#5c6b84]">Laporan & mutasi real-time</p>
        </a>
    </section>

    <!-- Statistik Koperasi Section -->
    <section class="bg-white rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] mb-12">
        <div class="text-center max-w-xl mx-auto mb-6">
            <span class="text-xs font-bold text-[#1d5ec9] uppercase tracking-wider">Statistik Koperasi</span>
            <h2 class="text-xl sm:text-2xl font-bold text-[#0c1e40] mt-1">Capaian & Kepercayaan Bersama</h2>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center divide-y lg:divide-y-0 lg:divide-x divide-slate-100">
            <div class="pt-4 lg:pt-0">
                <div class="text-2xl sm:text-3xl font-extrabold text-[#1d5ec9]">1.250+</div>
                <div class="text-xs font-semibold text-[#0c1e40] mt-1">Anggota Aktif</div>
                <p class="text-[11px] text-[#5c6b84] mt-0.5">Siswa, guru & staf sekolah</p>
            </div>
            <div class="pt-4 lg:pt-0">
                <div class="text-2xl sm:text-3xl font-extrabold text-[#15803d]">Rp 480 Jt+</div>
                <div class="text-xs font-semibold text-[#0c1e40] mt-1">Total Aset Simpanan</div>
                <p class="text-[11px] text-[#5c6b84] mt-0.5">Dikelola aman & amanah</p>
            </div>
            <div class="pt-4 lg:pt-0">
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-600">350+</div>
                <div class="text-xs font-semibold text-[#0c1e40] mt-1">Produk Toko Koperasi</div>
                <p class="text-[11px] text-[#5c6b84] mt-0.5">ATK, seragam & konsumsi</p>
            </div>
            <div class="pt-4 lg:pt-0">
                <div class="text-2xl sm:text-3xl font-extrabold text-purple-600">99,4%</div>
                <div class="text-xs font-semibold text-[#0c1e40] mt-1">Tingkat Kepuasan</div>
                <p class="text-[11px] text-[#5c6b84] mt-0.5">Berdasarkan survei RAT</p>
            </div>
        </div>
    </section>

    <!-- Visi & Misi Ringkas Section -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <div class="bg-[#0c284d] text-white rounded-2xl p-7 sm:p-8 flex flex-col justify-between">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium bg-white/10 text-blue-200 mb-3">Visi Koperasi</span>
                <h3 class="text-xl font-bold mb-3">Kemandirian Finansial Berkelanjutan</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Menjadi koperasi sekolah percontohan yang modern, unggul, dan terpercaya dalam menyejahterakan seluruh anggota melalui tata kelola ekonomi digital yang akuntabel dan berjiwa kekeluargaan.
                </p>
            </div>
            <div class="mt-6 pt-4 border-t border-white/10 flex items-center gap-2 text-xs text-blue-300">
                <x-lucide name="shield-check" class="w-4 h-4 text-emerald-400" />
                <span>Berasaskan gotong royong dan kekeluargaan</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">Misi Koperasi</span>
                <h3 class="text-xl font-bold text-[#0c1e40] mb-3">Pelayanan Prima Bagi Civitas</h3>
                <ul class="space-y-2.5 text-xs sm:text-sm text-[#5c6b84]">
                    <li class="flex items-start gap-2.5">
                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[10px] font-bold">✓</span>
                        <span>Menyediakan produk simpanan aman dengan sistem imbal hasil adil.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[10px] font-bold">✓</span>
                        <span>Mendukung kebutuhan sekolah melalui toko koperasi lengkap dan terjangkau.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-4 h-4 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[10px] font-bold">✓</span>
                        <span>Mendorong kemandirian siswa melalui unit produksi & kewirausahaan kreatif.</span>
                    </li>
                </ul>
            </div>
            <div class="mt-6">
                <a href="{{ route('tentang') }}" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1.5">
                    <span>Lihat profil lengkap kami</span>
                    <x-lucide name="arrow-right" class="w-3.5 h-3.5" />
                </a>
            </div>
        </div>
    </section>

    <!-- Pengumuman & Berita Terbaru Section -->
    <section class="mb-14">
        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="text-xs font-bold text-[#1d5ec9] uppercase tracking-wider">Kabar Koperasi</span>
                <h2 class="text-xl sm:text-2xl font-bold text-[#0c1e40] mt-0.5">Pengumuman & Kegiatan Terbaru</h2>
            </div>
            <a href="{{ route('berita') }}" class="text-xs sm:text-sm font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1">
                <span>Lihat Semua</span>
                <x-lucide name="arrow-right" class="w-4 h-4" />
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Berita 1 -->
            <article class="bg-white rounded-xl p-5 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs mb-3">
                        <span class="px-2.5 py-0.5 rounded-full font-semibold bg-emerald-50 text-emerald-700">Kegiatan Koperasi</span>
                        <span class="text-[#8292ab]">14 Okt 2026</span>
                    </div>
                    <h3 class="font-bold text-sm text-[#0c1e40] mb-2 hover:text-[#1d5ec9] transition">
                        Persiapan Rapat Anggota Tahunan (RAT) Tahun Buku 2026
                    </h3>
                    <p class="text-xs text-[#5c6b84] leading-relaxed line-clamp-3">
                        Pengurus Koperasi Bina Bangkit Mandiri mengumumkan jadwal pembagian SHU dan agenda rapat evaluasi pertanggungjawaban tahunan.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100">
                    <a href="{{ route('berita') }}" class="text-xs font-semibold text-[#1d5ec9] hover:underline">Baca selengkapnya &rarr;</a>
                </div>
            </article>

            <!-- Berita 2 -->
            <article class="bg-white rounded-xl p-5 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs mb-3">
                        <span class="px-2.5 py-0.5 rounded-full font-semibold bg-blue-50 text-blue-700">Khusus Siswa</span>
                        <span class="text-[#8292ab]">10 Okt 2026</span>
                    </div>
                    <h3 class="font-bold text-sm text-[#0c1e40] mb-2 hover:text-[#1d5ec9] transition">
                        Pameran Produk Kewirausahaan Siswa di Toko Koperasi
                    </h3>
                    <p class="text-xs text-[#5c6b84] leading-relaxed line-clamp-3">
                        Mulai pekan ini, hasil karya kerajinan dan kudapan olahan siswa SMK binaan mulai dipasarkan di etalase toko koperasi.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100">
                    <a href="{{ route('berita') }}" class="text-xs font-semibold text-[#1d5ec9] hover:underline">Baca selengkapnya &rarr;</a>
                </div>
            </article>

            <!-- Berita 3 -->
            <article class="bg-white rounded-xl p-5 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs mb-3">
                        <span class="px-2.5 py-0.5 rounded-full font-semibold bg-amber-50 text-amber-700">Khusus Guru & Staf</span>
                        <span class="text-[#8292ab]">05 Okt 2026</span>
                    </div>
                    <h3 class="font-bold text-sm text-[#0c1e40] mb-2 hover:text-[#1d5ec9] transition">
                        Jadwal Pengajuan Pinjaman Ringan Periode Semester Ganjil
                    </h3>
                    <p class="text-xs text-[#5c6b84] leading-relaxed line-clamp-3">
                        Fasilitas pinjaman pendidikan dan kebutuhan mendesak bagi anggota aktif telah dibuka dengan tenor fleksibel hingga 24 bulan.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100">
                    <a href="{{ route('berita') }}" class="text-xs font-semibold text-[#1d5ec9] hover:underline">Baca selengkapnya &rarr;</a>
                </div>
            </article>
        </div>
    </section>
</x-layouts.public>