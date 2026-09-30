<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-[#edf3fc] via-[#f5f9fd] to-white text-[#0c1e40] min-h-screen antialiased flex flex-col justify-between font-sans">
    <div class="max-w-6xl mx-auto px-6 py-6 w-full">
        <!-- Navigation Header (1:1 with 02_halaman_utama_pengunjung) -->
        <nav class="flex items-center justify-between py-2">
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="font-bold text-lg text-[#0c1e40] flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg bg-[#1d5ec9] flex items-center justify-center text-white">
                        <x-lucide name="building-2" class="w-4 h-4 text-white" />
                    </span>
                    <span>Koperasi Simpan Pinjam</span>
                </a>
                <div class="hidden md:flex items-center gap-7 text-sm font-medium">
                    <a href="{{ route('home') }}" class="text-[#1d5ec9] font-semibold">Beranda</a>
                    <a href="#tentang" class="text-[#5c6b84] hover:text-[#0c1e40] transition">Tentang</a>
                    <a href="#layanan" class="text-[#5c6b84] hover:text-[#0c1e40] transition">Layanan</a>
                    <a href="#kontak" class="text-[#5c6b84] hover:text-[#0c1e40] transition">Kontak</a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-sm font-semibold px-7 py-2.5 rounded-lg shadow-sm transition">
                    Login
                </a>
            </div>
        </nav>

        <!-- Hero Section (1:1 with 02_halaman_utama_pengunjung) -->
        <main class="mt-8 lg:mt-14">
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#0c1e40] leading-[1.25] tracking-tight">
                        Bersama Membangun Kesejahteraan Anggota
                    </h1>
                    <p class="text-[#5c6b84] text-base leading-relaxed mt-5 mb-8 max-w-lg">
                        Koperasi simpan pinjam hadir untuk membantu anggota dalam mengelola keuangan dengan aman, nyaman, dan terpercaya.
                    </p>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('login') }}" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white font-semibold px-8 py-3.5 rounded-lg shadow-sm transition text-base">
                            Gabung Sekarang
                        </a>
                        <a href="{{ route('nasabah.dashboard') }}" class="text-[#1d5ec9] hover:bg-blue-50 font-semibold px-5 py-3.5 rounded-lg text-sm transition flex items-center gap-1.5 border border-blue-200">
                            Portal Nasabah &rarr;
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="text-[#0c284d] hover:bg-slate-100 font-semibold px-5 py-3.5 rounded-lg text-sm transition flex items-center gap-1.5 border border-slate-200">
                            Portal Admin &rarr;
                        </a>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="relative w-full max-w-[480px]">
                        <!-- Hero Banner Illustration (1:1 with 02_halaman_utama_pengunjung) -->
                        <img
                            src="{{ asset('images/hero-banner.jpg') }}"
                            alt="Ilustrasi Kesejahteraan Anggota Koperasi"
                            class="w-full h-auto rounded-2xl drop-shadow-sm object-contain"
                        />
                    </div>
                </div>
            </section>

            <!-- 4 Service / Feature Cards (1:1 with 02_halaman_utama_pengunjung) -->
            <section id="layanan" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-14 mb-14">
                <!-- Card 1: Simpanan -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.04)] border border-slate-100 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center text-xl">
                        <svg class="w-6 h-6 text-[#15803d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Simpanan</h3>
                    <p class="text-xs text-[#5c6b84]">Mudah dan aman</p>
                </div>

                <!-- Card 2: Pinjaman -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.04)] border border-slate-100 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center text-xl">
                        <svg class="w-6 h-6 text-[#1d5ec9]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Pinjaman</h3>
                    <p class="text-xs text-[#5c6b84]">Proses cepat</p>
                </div>

                <!-- Card 3: Transaksi -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.04)] border border-slate-100 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center text-xl">
                        <svg class="w-6 h-6 text-[#15803d]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Transaksi</h3>
                    <p class="text-xs text-[#5c6b84]">Transparan</p>
                </div>

                <!-- Card 4: Anggota -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.04)] border border-slate-100 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center text-xl">
                        <svg class="w-6 h-6 text-[#1d5ec9]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Anggota</h3>
                    <p class="text-xs text-[#5c6b84]">Untuk kesejahteraan bersama</p>
                </div>
            </section>
        </main>
    </div>

    <!-- Minimal Clean Footer -->
    <footer class="border-t border-slate-200/70 py-6 text-center text-xs text-[#5c6b84]">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-2">
            <span>&copy; {{ date('Y') }} Koperasi Simpan Pinjam Sekolah. Semua Hak Dilindungi.</span>
            <div class="flex items-center gap-4">
                <a href="#tentang" class="hover:text-[#0c1e40]">Tentang Kami</a>
                <a href="#layanan" class="hover:text-[#0c1e40]">Kebijakan Privasi</a>
                <a href="#kontak" class="hover:text-[#0c1e40]">Kontak</a>
            </div>
        </div>
    </footer>
</body>
</html>