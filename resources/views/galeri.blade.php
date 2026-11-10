<x-layouts.public title="Galeri Kegiatan">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">
            Dokumentasi & Portofolio
        </span>
        <h1 class="text-3xl sm:text-4xl font-bold text-[#0c1e40] tracking-tight">
            Galeri Kegiatan Koperasi
        </h1>
        <p class="text-sm sm:text-base text-[#5c6b84] mt-3 leading-relaxed">
            Momen kebersamaan, pelaksanaan rapat tahunan (RAT), serta karya nyata program kewirausahaan siswa Koperasi Bina Bangkit Mandiri.
        </p>
    </div>

    <!-- Category Filters -->
    <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-[0_4px_16px_rgba(0,0,0,0.03)] mb-8 flex flex-wrap items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-2">
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-[#1d5ec9] text-white shadow-sm transition">
                Semua Dokumentasi
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Foto Kegiatan
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Dokumentasi RAT
            </button>
            <button type="button" class="px-4 py-2 rounded-lg text-xs font-semibold bg-slate-100 text-[#5c6b84] hover:bg-slate-200 hover:text-[#0c1e40] transition">
                Kewirausahaan Siswa
            </button>
        </div>

        <span class="text-xs text-[#8292ab] font-medium hidden sm:block">
            Menampilkan 6 album dokumentasi
        </span>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-14">
        <!-- Item 1: RAT -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-blue-900 to-[#0c284d] flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="users" class="w-6 h-6 text-blue-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-blue-300 font-semibold">Dokumentasi RAT</span>
                    <h3 class="text-sm font-bold text-white mt-1">Rapat Anggota Tahunan 2025</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    24 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-[#1d5ec9]">Dokumentasi RAT</span>
                    <span>15 Jan 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Musyawarah Pertanggungjawaban & Pembagian SHU
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Dihadiri oleh seluruh dewan pembina, pengurus, guru, dan perwakilan siswa anggota dalam aula utama sekolah.
                </p>
            </div>
        </div>

        <!-- Item 2: Kewirausahaan Siswa -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-emerald-800 to-emerald-950 flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="shopping-bag" class="w-6 h-6 text-emerald-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-emerald-300 font-semibold">Kewirausahaan Siswa</span>
                    <h3 class="text-sm font-bold text-white mt-1">Bazar Produk Olahan Siswa</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    18 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-emerald-600">Kewirausahaan Siswa</span>
                    <span>22 Feb 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Pemasaran Hasil Produk Kreatif Siswa di Toko Koperasi
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Siswa jurusan tata boga dan kriya memamerkan sekaligus menjual makanan ringan dan kerajinan tangan di etalase koperasi.
                </p>
            </div>
        </div>

        <!-- Item 3: Foto Kegiatan -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-indigo-800 to-indigo-950 flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="wallet" class="w-6 h-6 text-indigo-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-indigo-300 font-semibold">Foto Kegiatan</span>
                    <h3 class="text-sm font-bold text-white mt-1">Gerakan Gemar Menabung</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    12 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-indigo-600">Foto Kegiatan</span>
                    <span>08 Mar 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Sosialisasi Simpanan Sukarela Pelajar di Tiap Kelas
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Edukasi literasi finansial oleh pengurus koperasi kepada para siswa baru mengenai pentingnya menyisihkan uang saku.
                </p>
            </div>
        </div>

        <!-- Item 4: Kewirausahaan Siswa -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-amber-700 to-amber-950 flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="tag" class="w-6 h-6 text-amber-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-amber-300 font-semibold">Kewirausahaan Siswa</span>
                    <h3 class="text-sm font-bold text-white mt-1">Pengadaan Seragam & Atribut</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    15 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-amber-600">Kewirausahaan Siswa</span>
                    <span>10 Jul 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Distribusi Seragam Praktik Hasil Jahit Siswa Busana
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Kolaborasi antara unit toko koperasi dengan jurusan tata busana dalam memproduksi seragam lab dan jas almamater siswa.
                </p>
            </div>
        </div>

        <!-- Item 5: Dokumentasi RAT -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-sky-800 to-slate-900 flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="file-text" class="w-6 h-6 text-sky-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-sky-300 font-semibold">Dokumentasi RAT</span>
                    <h3 class="text-sm font-bold text-white mt-1">Penyerahan Piagam Pengurus</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    9 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-[#1d5ec9]">Dokumentasi RAT</span>
                    <span>16 Jan 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Apresiasi Pengurus & Anggota Terbaik Tahun 2025
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Pemberian penghargaan sertifikat dan doorprize simpanan kepada anggota dengan keaktifan menabung terbaik.
                </p>
            </div>
        </div>

        <!-- Item 6: Foto Kegiatan -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-[0_4px_16px_rgba(0,0,0,0.03)] group hover:shadow-md transition">
            <div class="h-48 bg-gradient-to-br from-purple-800 to-purple-950 flex items-center justify-center relative p-6 text-white text-center">
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-white/10 flex items-center justify-center">
                        <x-lucide name="receipt-text" class="w-6 h-6 text-purple-200" />
                    </div>
                    <span class="text-xs uppercase tracking-wider text-purple-300 font-semibold">Foto Kegiatan</span>
                    <h3 class="text-sm font-bold text-white mt-1">Modernisasi Kasir Digital</h3>
                </div>
                <span class="absolute top-3 right-3 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white backdrop-blur">
                    14 Foto
                </span>
            </div>
            <div class="p-5">
                <div class="flex items-center justify-between text-xs text-[#8292ab] mb-2">
                    <span class="font-medium text-purple-600">Foto Kegiatan</span>
                    <span>18 Ags 2026</span>
                </div>
                <h4 class="font-bold text-sm text-[#0c1e40] mb-1.5 leading-snug">
                    Implementasi Sistem Kasir Barcode di Toko Koperasi
                </h4>
                <p class="text-xs text-[#5c6b84] leading-relaxed">
                    Pengurus dan siswa magang mempraktikkan pencatatan inventaris barang ATK menggunakan pemindai barcode otomatis.
                </p>
            </div>
        </div>
    </div>
</x-layouts.public>