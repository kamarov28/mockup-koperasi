<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#edf3fc] text-[#0c1e40] min-h-screen antialiased flex flex-col justify-between font-sans selection:bg-[#1d5ec9] selection:text-white">
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
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center">
                        <x-lucide name="wallet" class="w-6 h-6 text-[#15803d]" />
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Simpanan</h3>
                    <p class="text-xs text-[#5c6b84]">Mudah dan aman</p>
                </div>

                <!-- Card 2: Pinjaman -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center">
                        <x-lucide name="hand-coins" class="w-6 h-6 text-[#1d5ec9]" />
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Pinjaman</h3>
                    <p class="text-xs text-[#5c6b84]">Proses cepat</p>
                </div>

                <!-- Card 3: Transaksi -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center">
                        <x-lucide name="receipt-text" class="w-6 h-6 text-[#15803d]" />
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Transaksi</h3>
                    <p class="text-xs text-[#5c6b84]">Transparan</p>
                </div>

                <!-- Card 4: Anggota -->
                <div class="bg-white rounded-xl p-6 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto mb-3.5 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center">
                        <x-lucide name="users" class="w-6 h-6 text-[#1d5ec9]" />
                    </div>
                    <h3 class="font-bold text-base text-[#0c1e40] mb-1">Anggota</h3>
                    <p class="text-xs text-[#5c6b84]">Untuk kesejahteraan bersama</p>
                </div>
            </section>
        </main>
    </div>

    <!-- Minimal Clean Footer -->
    <footer class="border-t border-slate-200/60 py-6 text-center text-xs text-[#5c6b84] bg-white/40">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span>&copy; {{ date('Y') }} Koperasi Simpan Pinjam Sekolah. Semua Hak Dilindungi.</span>
            <div class="flex items-center gap-5">
                <a href="#tentang" class="hover:text-[#0c1e40] transition">Tentang Kami</a>
                <a href="#layanan" class="hover:text-[#0c1e40] transition">Kebijakan Privasi</a>
                <a href="#kontak" class="hover:text-[#0c1e40] transition">Kontak</a>
            </div>
        </div>
    </footer>

    <!-- Floating Dev Portal Switcher (discreet at bottom right) -->
    <div class="fixed bottom-4 right-4 bg-white/90 backdrop-blur border border-slate-200/80 shadow-lg rounded-full px-3 py-1.5 flex items-center gap-2 text-xs font-medium z-50">
        <span class="text-slate-400">Pintas:</span>
        <a href="{{ route('nasabah.dashboard') }}" class="text-blue-600 hover:underline">Nasabah</a>
        <span class="text-slate-300">|</span>
        <a href="{{ route('admin.dashboard') }}" class="text-slate-700 hover:underline">Admin</a>
    </div>
</body>
</html>