<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Dashboard' }} - Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8fafc] text-[#1e293b] min-h-screen flex font-sans antialiased">
    <!-- Sidebar Admin (1:1 with dark navy theme #0d2d52) -->
    <aside class="w-64 shrink-0 min-h-screen bg-[#0d2d52] text-slate-300 flex flex-col justify-between p-5">
        <div>
            <!-- Admin Role Header -->
            <div class="flex items-center gap-3 px-2 py-3 mb-6 font-semibold text-white text-base">
                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                    <x-lucide name="user" class="w-4 h-4 text-white" />
                </div>
                <span>Admin</span>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-1.5 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="layout-dashboard" class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.nasabah') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.nasabah') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="users" class="w-4 h-4 {{ request()->routeIs('admin.nasabah') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Data Nasabah</span>
                </a>

                <a href="{{ route('admin.simpanan') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.simpanan') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="wallet" class="w-4 h-4 {{ request()->routeIs('admin.simpanan') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Simpanan</span>
                </a>

                <a href="{{ route('admin.pinjaman') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.pinjaman') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="credit-card" class="w-4 h-4 {{ request()->routeIs('admin.pinjaman') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Pinjaman</span>
                </a>

                <a href="{{ route('admin.transaksi') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.transaksi') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="receipt-text" class="w-4 h-4 {{ request()->routeIs('admin.transaksi') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Transaksi</span>
                </a>

                <a href="{{ route('admin.laporan') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.laporan') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="chart-column" class="w-4 h-4 {{ request()->routeIs('admin.laporan') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Laporan</span>
                </a>

                <a href="{{ route('admin.pengaturan') }}"
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg transition {{ request()->routeIs('admin.pengaturan') ? 'bg-[#2563eb] text-white font-semibold shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <x-lucide name="settings" class="w-4 h-4 {{ request()->routeIs('admin.pengaturan') ? 'text-white' : 'text-slate-400' }}" />
                    <span>Pengaturan</span>
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
