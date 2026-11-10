<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Portal Anggota' }} - Koperasi Bina Bangkit Mandiri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f8fafd] font-sans text-[#0f2942] antialiased md:flex">
    <aside class="flex w-full shrink-0 flex-col justify-between bg-[#0c284d] p-5 text-slate-300 md:min-h-screen md:w-64">
        <div>
            <a href="{{ route('nasabah.dashboard') }}" class="mb-6 flex items-center gap-3 border-b border-slate-700/50 px-2 pb-5 text-white">
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-600">
                    <x-lucide name="building-2" class="h-4 w-4" />
                </span>
                <span>
                    <strong class="block text-sm">Portal Anggota</strong>
                    <small class="text-[11px] text-blue-200">Koperasi Bina Bangkit Mandiri</small>
                </span>
            </a>
            <nav class="space-y-1.5 text-sm font-medium">
                @foreach ([
                    ['nasabah.dashboard', 'Beranda', 'home'],
                    ['nasabah.simpanan', 'Simpanan', 'wallet'],
                    ['nasabah.pinjaman', 'Pinjaman', 'credit-card'],
                    ['nasabah.toko', 'Toko Koperasi', 'shopping-bag'],
                    ['nasabah.transaksi', 'Transaksi', 'receipt-text'],
                    ['nasabah.dokumen', 'Cetak Dokumen', 'printer'],
                    ['nasabah.profil', 'Profil', 'user'],
                ] as [$routeName, $label, $icon])
                    <a href="{{ route($routeName) }}" class="flex items-center gap-3 rounded-lg px-3.5 py-2.5 transition {{ request()->routeIs($routeName.'*') ? 'bg-[#2563eb] font-semibold text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                        <x-lucide :name="$icon" class="h-4 w-4" />
                        <span>{{ $label }}</span>
                    </a>
                @endforeach
            </nav>
        </div>
        <div class="mt-6 space-y-2 border-t border-slate-700/50 pt-4">
            <a href="{{ route('home') }}" class="block px-3.5 py-2 text-xs text-slate-300 hover:text-white">Ke Beranda Publik</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3.5 py-2 text-left text-sm text-slate-300 hover:bg-white/5 hover:text-rose-300">
                    <x-lucide name="log-out" class="h-4 w-4" />
                    Keluar
                </button>
            </form>
        </div>
    </aside>
    <main class="min-w-0 flex-1 overflow-y-auto p-5 sm:p-8 lg:p-10">
        {{ $slot }}
    </main>
</body>
</html>
