<x-layouts.public title="Beranda">
    <!-- Hero Section (1:1 with 02_halaman_utama_pengunjung) -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <div>
            <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#0c1e40] leading-[1.25] tracking-tight">
                Bersama Membangun Kesejahteraan Anggota
            </h1>
            <p class="text-[#5c6b84] text-sm sm:text-base leading-relaxed mt-4 mb-8 max-w-lg">
                Koperasi simpan pinjam hadir untuk membantu anggota dalam mengelola keuangan dengan aman, nyaman, dan terpercaya.
            </p>
            <div>
                <a href="{{ route('login') }}" class="inline-block bg-[#1d5ec9] hover:bg-[#154cb0] text-white font-semibold px-8 py-3.5 rounded-lg shadow-sm transition text-sm sm:text-base">
                    Gabung Sekarang
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center">
            <div class="w-full max-w-[500px]">
                <!-- Hero Banner Illustration (Seamless integration matching Figma) -->
                <img
                    src="{{ asset('images/hero-banner.png') }}"
                    alt="Ilustrasi Kesejahteraan Anggota Koperasi"
                    class="w-full h-auto object-contain mix-blend-multiply pointer-events-none select-none"
                />
            </div>
        </div>
    </section>

    <!-- 4 Service / Feature Cards (1:1 with 02_halaman_utama_pengunjung) -->
    <section id="layanan" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-12 mb-12">
        <!-- Card 1: Simpanan -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="wallet" class="w-6 h-6 text-[#15803d]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Simpanan</h3>
            <p class="text-xs text-[#5c6b84]">Mudah dan aman</p>
        </a>

        <!-- Card 2: Pinjaman -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="hand-coins" class="w-6 h-6 text-[#1d5ec9]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Pinjaman</h3>
            <p class="text-xs text-[#5c6b84]">Proses cepat</p>
        </a>

        <!-- Card 3: Transaksi -->
        <a href="{{ route('layanan') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="receipt-text" class="w-6 h-6 text-[#15803d]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Transaksi</h3>
            <p class="text-xs text-[#5c6b84]">Transparan</p>
        </a>

        <!-- Card 4: Anggota -->
        <a href="{{ route('tentang') }}" class="group bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
            <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center group-hover:scale-105 transition-transform">
                <x-lucide name="users" class="w-6 h-6 text-[#1d5ec9]" />
            </div>
            <h3 class="font-bold text-base text-[#0c1e40] mb-1">Anggota</h3>
            <p class="text-xs text-[#5c6b84]">Untuk kesejahteraan bersama</p>
        </a>
    </section>
</x-layouts.public>