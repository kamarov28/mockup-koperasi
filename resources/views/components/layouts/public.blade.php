<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Koperasi Simpan Pinjam' }} - Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#edf3fc] text-[#0c1e40] min-h-screen antialiased flex flex-col justify-between font-sans selection:bg-[#1d5ec9] selection:text-white">
    <div class="max-w-6xl mx-auto px-6 py-6 w-full">
        <!-- Navigation Header (1:1 with 02_halaman_utama_pengunjung) -->
        <nav class="flex items-center justify-between py-2">
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="font-bold text-lg text-[#0c1e40] flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg bg-[#1d5ec9] flex items-center justify-center text-white shadow-sm">
                        <x-lucide name="building-2" class="w-4 h-4 text-white" />
                    </span>
                    <span>Koperasi Simpan Pinjam</span>
                </a>
                <div class="hidden md:flex items-center gap-7 text-sm font-medium">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#1d5ec9] font-semibold' : 'text-[#5c6b84] hover:text-[#0c1e40] transition' }}">
                        Beranda
                    </a>
                    <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-[#1d5ec9] font-semibold' : 'text-[#5c6b84] hover:text-[#0c1e40] transition' }}">
                        Tentang
                    </a>
                    <a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'text-[#1d5ec9] font-semibold' : 'text-[#5c6b84] hover:text-[#0c1e40] transition' }}">
                        Layanan
                    </a>
                    <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'text-[#1d5ec9] font-semibold' : 'text-[#5c6b84] hover:text-[#0c1e40] transition' }}">
                        Kontak
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-sm font-semibold px-7 py-2.5 rounded-lg shadow-sm transition">
                    Login
                </a>
            </div>
        </nav>

        <!-- Main Body -->
        <main class="mt-6 lg:mt-10">
            {{ $slot }}
        </main>
    </div>

    <!-- Minimal Clean Footer -->
    <footer class="border-t border-slate-200/60 py-6 text-center text-xs text-[#5c6b84] bg-white/40">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <span>&copy; {{ date('Y') }} Koperasi Simpan Pinjam Sekolah. Semua Hak Dilindungi.</span>
            <div class="flex items-center gap-5">
                <a href="{{ route('tentang') }}" class="hover:text-[#0c1e40] transition">Tentang Kami</a>
                <a href="{{ route('layanan') }}" class="hover:text-[#0c1e40] transition">Kebijakan Privasi</a>
                <a href="{{ route('kontak') }}" class="hover:text-[#0c1e40] transition">Kontak</a>
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
