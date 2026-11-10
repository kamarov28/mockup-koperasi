<x-layouts.nasabah title="Dashboard Anggota">
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0f172a]">Halo, {{ auth()->user()->name }}!</h1>
            <p class="mt-1 text-sm text-[#64748b]">Ringkasan data akun koperasi Anda.</p>
        </div>
        <a href="{{ route('nasabah.toko') }}" class="rounded-lg bg-[#1d5ec9] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#154cb0]">Toko Koperasi</a>
    </div>

    <div class="mb-8 grid gap-5 md:grid-cols-3">
        @foreach ([
            ['Total Simpanan', 'Rp '.number_format((float) $totalSimpanan, 0, ',', '.'), 'wallet', 'text-emerald-600'],
            ['Pinjaman Aktif', 'Rp '.number_format((float) $pinjamanAktif, 0, ',', '.'), 'credit-card', 'text-blue-600'],
            ['Jumlah Transaksi', number_format($jumlahTransaksi, 0, ',', '.'), 'receipt-text', 'text-purple-600'],
        ] as [$label, $value, $icon, $color])
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-sm">
                <x-lucide :name="$icon" class="mb-3 h-5 w-5 {{ $color }}" />
                <div class="text-xs font-medium text-[#64748b]">{{ $label }}</div>
                <div class="mt-1 text-xl font-bold {{ $color }}">{{ $value }}</div>
            </div>
        @endforeach
    </div>

    <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="font-bold text-[#0f172a]">Transaksi Terbaru</h2>
            <a href="{{ route('nasabah.transaksi') }}" class="text-sm font-semibold text-[#2563eb] hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-100 text-xs uppercase text-slate-400">
                    <tr><th class="py-3">Tanggal</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($transaksiTerbaru as $transaksi)
                        <tr>
                            <td class="py-3">{{ \Illuminate\Support\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $transaksi->jenis }}</td>
                            <td>Rp {{ number_format((float) $transaksi->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $transaksi->keterangan }}</td>
                        </tr>
                    @empty
                        <tr><td class="py-4 text-slate-500" colspan="4">Belum ada transaksi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
