<x-layouts.public title="Beranda">
    <section class="grid items-center gap-10 lg:grid-cols-2">
        <div>
            <span class="mb-4 inline-flex rounded-full bg-[#e8f1fc] px-3 py-1 text-xs font-semibold text-[#1d5ec9]">Koperasi Sekolah Bina Bangkit Mandiri</span>
            <h1 class="text-3xl font-bold leading-tight tracking-tight text-[#0c1e40] sm:text-4xl">Bersama Membangun Kesejahteraan Anggota</h1>
            <p class="mt-4 max-w-lg text-sm leading-relaxed text-[#5c6b84] sm:text-base">Koperasi simpan pinjam hadir membantu anggota mengelola keuangan dengan aman, nyaman, dan terpercaya.</p>
            <div class="mt-7 flex flex-wrap gap-3">
                <a href="{{ route('register') }}" class="rounded-lg bg-[#1d5ec9] px-6 py-3 text-sm font-semibold text-white hover:bg-[#154cb0]">Daftar Anggota</a>
                <a href="{{ route('layanan') }}" class="rounded-lg border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-[#0c1e40] hover:bg-slate-50">Pelajari Layanan</a>
            </div>
        </div>
        <div class="rounded-2xl bg-white p-8 text-center shadow-sm">
            <x-lucide name="building-2" class="mx-auto h-20 w-20 text-[#1d5ec9]" />
            <p class="mt-4 font-semibold text-[#0c1e40]">Layanan untuk anggota</p>
            <p class="mt-1 text-sm text-[#5c6b84]">Simpanan, pinjaman, dan informasi koperasi dalam satu portal.</p>
        </div>
    </section>
    <section class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            ['Simpanan', 'Kelola informasi simpanan anggota.', 'wallet'],
            ['Pinjaman', 'Ajukan pinjaman untuk ditinjau koperasi.', 'hand-coins'],
            ['Transaksi', 'Lihat riwayat transaksi akun Anda.', 'receipt-text'],
            ['Keanggotaan', 'Informasi layanan koperasi anggota.', 'users'],
        ] as [$heading, $description, $icon])
            <div class="rounded-xl border border-slate-100 bg-white p-5 text-center shadow-sm">
                <x-lucide :name="$icon" class="mx-auto h-7 w-7 text-[#1d5ec9]" />
                <h2 class="mt-3 font-bold">{{ $heading }}</h2>
                <p class="mt-1 text-xs text-[#5c6b84]">{{ $description }}</p>
            </div>
        @endforeach
    </section>
</x-layouts.public>
