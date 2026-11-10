<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Beranda' }} - Koperasi Bina Bangkit Mandiri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-[#edf3fc] font-sans text-[#0c1e40] antialiased">
    <div class="mx-auto w-full max-w-6xl flex-1 px-6 py-6">
        <nav class="flex flex-wrap items-center justify-between gap-4 py-2">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 font-bold">
                <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#1d5ec9] text-white">
                    <x-lucide name="building-2" class="h-4 w-4" />
                </span>
                Koperasi Bina Bangkit Mandiri
            </a>
            <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-[#5c6b84]">
                @foreach ([
                    ['home', 'Beranda'],
                    ['tentang', 'Tentang'],
                    ['layanan', 'Layanan'],
                    ['berita', 'Berita'],
                    ['galeri', 'Galeri'],
                    ['kontak', 'Kontak'],
                ] as [$routeName, $label])
                    <a href="{{ route($routeName) }}" class="{{ request()->routeIs($routeName) ? 'font-semibold text-[#1d5ec9]' : 'hover:text-[#0c1e40]' }}">{{ $label }}</a>
                @endforeach
            </div>
            <a href="{{ route('login') }}" class="rounded-lg bg-[#1d5ec9] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#154cb0]">Portal Anggota</a>
        </nav>
        <main class="mt-8 lg:mt-12">
            {{ $slot }}
        </main>
    </div>
    <footer class="border-t border-slate-200/60 bg-white/40 py-6 text-center text-xs text-[#5c6b84]">
        &copy; {{ date('Y') }} Koperasi Bina Bangkit Mandiri. Semua Hak Dilindungi.
    </footer>
</body>
</html>
