<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Portal Nasabah' }} - Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafd] text-[#0f2942] min-h-screen flex font-sans antialiased">
    <!-- Sidebar Nasabah (1:1 with dark navy theme #0c284d) -->
    <aside class="w-60 shrink-0 min-h-screen bg-[#0c284d] text-slate-300 flex flex-col justify-between p-5">
        <div>
            <!-- User Role Header -->
            <div class="flex items-center gap-3 px-2 py-3 mb-6 font-semibold text-white text-base">
                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                    <x-lucide name="user" class="w-4 h-4 text-white" />
                </div>
                <span>Nasabah</span>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-1.5 text-sm font-medium">
                <a href="{{ route('nasabah.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('nasabah.dashboard') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="home" class="w-4 h-4 {{ request()->routeIs('nasabah.dashboard') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Beranda</span>
                </a>

                <a href="{{ route('nasabah.simpanan') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('nasabah.simpanan') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="wallet" class="w-4 h-4 {{ request()->routeIs('nasabah.simpanan') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Simpanan</span>
                </a>

                <a href="{{ route('nasabah.pinjaman') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('nasabah.pinjaman*') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="credit-card" class="w-4 h-4 {{ request()->routeIs('nasabah.pinjaman*') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Pinjaman</span>
                </a>

                <a href="{{ route('nasabah.transaksi') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('nasabah.transaksi') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="receipt-text" class="w-4 h-4 {{ request()->routeIs('nasabah.transaksi') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Transaksi</span>
                </a>

                <a href="{{ route('nasabah.profil') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('nasabah.profil') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="user" class="w-4 h-4 {{ request()->routeIs('nasabah.profil') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Profil</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="pt-4 border-t border-slate-700/50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2 text-sm text-slate-300 hover:text-rose-400 hover:bg-white/5 rounded-lg transition">
                    <x-lucide name="log-out" class="w-4 h-4" />
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Canvas -->
    <main class="flex-1 p-6 sm:p-8 lg:p-10 overflow-y-auto">
        {{ $slot }}
    </main>
</body>
</html>
