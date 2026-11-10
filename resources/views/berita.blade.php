<x-layouts.public title="Berita & Pengumuman">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">
            Informasi & Kabar Terkini
        </span>
        <h1 class="text-3xl sm:text-4xl font-bold text-[#0c1e40] tracking-tight">
            Berita & Pengumuman
        </h1>
        <p class="text-sm sm:text-base text-[#5c6b84] mt-3 leading-relaxed">
            Dapatkan update seputar kegiatan koperasi sekolah, agenda tahunan, serta pengumuman penting khusus siswa, guru, dan karyawan.
        </p>
    </div>

    <!-- Category Filters & Search -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_16px_rgba(0,0,0,0.03)] mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center gap-2 w-full md:w-auto" id="filter-container">
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-[#1d5ec9] text-white shadow-sm transition">
                Semua Informasi
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Kegiatan Koperasi
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Khusus Siswa & Guru
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Pengumuman Resmi
            </button>
        </div>

        <!-- Search Input -->
        <div class="relative w-full md:w-72">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="text"
                placeholder="Cari berita atau agenda..."
                class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-200 text-xs sm:text-sm text-[#0c1e40] focus:outline-none focus:ring-2 focus:ring-[#1d5ec9]/20 focus:border-[#1d5ec9] transition"
            />
        </div>
    </div>

    <!-- News & Announcements Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Card 1 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-emerald-50 text-emerald-700">Kegiatan Koperasi</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        14 Okt 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Persiapan Rapat Anggota Tahunan (RAT) Tahun Buku 2026
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Pemberitahuan kepada seluruh anggota mengenai penetapan agenda RAT, pengesahan laporan pertanggungjawaban pengurus, dan skema pembagian Sisa Hasil Usaha (SHU).
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Pengurus Utama</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>

        <!-- Card 2 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-blue-50 text-blue-700">Khusus Siswa</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        10 Okt 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Pameran Produk Kewirausahaan Siswa di Toko Koperasi
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Koperasi membuka booth khusus karya kreativitas siswa berupa snack olahan, merchandise sekolah, dan kerajinan tangan untuk melatih jiwa wirausaha sejak dini.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Seksi Usaha</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>

        <!-- Card 3 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-amber-50 text-amber-700">Khusus Guru & Staf</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        05 Okt 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Pembukaan Pengajuan Pinjaman Pendidikan Semester Ganjil
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Fasilitas pinjaman ringan tanpa jaminan untuk anggota guru dan staf sekolah dengan plafon hingga Rp 10.000.000 dan proses persetujuan maksimal 1x24 jam kerja.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Unit Simpan Pinjam</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>

        <!-- Card 4 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-purple-50 text-purple-700">Pengumuman Resmi</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        28 Sep 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Sosialisasi Penggunaan Portal Anggota & Pembaruan Data
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Dihimbau kepada seluruh anggota aktif untuk mengecek data profil, no WhatsApp aktif, serta riwayat simpanan pokok dan wajib melalui portal website koperasi.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Tim IT Koperasi</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>

        <!-- Card 5 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-blue-50 text-blue-700">Khusus Siswa</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        20 Sep 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Diskon Paket ATK & Buku Tulis Menjelang Ujian Tengah Semester
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Toko koperasi menyediakan paket alat tulis lengkap dengan potongan harga 15% khusus bagi siswa terdaftar anggota koperasi sekolah.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Unit Toko</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>

        <!-- Card 6 -->
        <article class="bg-white rounded-2xl p-6 shadow-[0_4px_16px_rgba(0,0,0,0.03)] flex flex-col justify-between hover:shadow-md transition">
            <div>
                <div class="flex items-center justify-between text-xs mb-3">
                    <span class="px-2.5 py-1 rounded-full font-semibold bg-emerald-50 text-emerald-700">Kegiatan Koperasi</span>
                    <span class="text-[#8292ab] flex items-center gap-1">
                        <x-lucide name="calendar" class="w-3.5 h-3.5" />
                        12 Sep 2026
                    </span>
                </div>
                <h2 class="text-base font-bold text-[#0c1e40] mb-2 leading-snug">
                    Workshop Pengelolaan Keuangan Cerdas & Budaya Menabung
                </h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] leading-relaxed mb-4">
                    Pelatihan literasi finansial bersama pengurus koperasi yang dihadiri perwakilan kelas untuk menumbuhkan kebiasaan gemar menabung sejak bangku sekolah.
                </p>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[11px] text-[#8292ab]">Oleh: Bidang Pendidikan</span>
                <span class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1 cursor-pointer">
                    <span>Detail</span>
                    <x-lucide name="arrow-right" class="w-3 h-3" />
                </span>
            </div>
        </article>
    </div>
</x-layouts.public>