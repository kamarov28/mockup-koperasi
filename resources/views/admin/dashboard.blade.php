<x-layouts.admin title="Dashboard Admin">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Dashboard Admin</h1>
    <p class="mb-6 text-sm text-slate-500">Ringkasan data yang tersimpan di database.</p>

    @if (session('status'))
        <div class="mb-5 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['Total Nasabah', number_format($memberCount, 0, ',', '.'), 'users'],
            ['Saldo Simpanan', 'Rp '.number_format($totalSavings, 0, ',', '.'), 'wallet'],
            ['Pinjaman Disetujui', 'Rp '.number_format($activeLoans, 0, ',', '.'), 'credit-card'],
            ['Menunggu Persetujuan', number_format($pendingLoans + $pendingOrders, 0, ',', '.'), 'clock'],
        ] as [$label, $value, $icon])
            <section class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm text-slate-500">{{ $label }}</p>
                <p class="mt-2 text-2xl font-bold text-slate-900">{{ $value }}</p>
            </section>
        @endforeach
    </div>

    <div class="mt-8 rounded-xl border border-slate-200 bg-white">
        <div class="border-b border-slate-100 p-5">
            <h2 class="font-semibold text-slate-900">Transaksi terbaru</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr><th class="p-3">Tanggal</th><th class="p-3">Nasabah</th><th class="p-3">Jenis</th><th class="p-3 text-right">Jumlah</th><th class="p-3">Keterangan</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($recentTransactions as $transaction)
                        <tr>
                            <td class="p-3">{{ $transaction->tanggal }}</td>
                            <td class="p-3">{{ $transaction->member_name ?? 'Nasabah tidak ditemukan' }}</td>
                            <td class="p-3">{{ ucfirst($transaction->jenis) }}</td>
                            <td class="p-3 text-right">Rp {{ number_format((float) $transaction->jumlah, 0, ',', '.') }}</td>
                            <td class="p-3">{{ $transaction->keterangan }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-500">Belum ada transaksi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
