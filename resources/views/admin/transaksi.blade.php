<x-layouts.admin title="Transaksi">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Transaksi</h1>
    <p class="mb-6 text-sm text-slate-500">Riwayat transaksi simpanan dan pembayaran yang sudah dikonfirmasi.</p>

    @if (session('status'))
        <div class="mb-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-800"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <h2 class="mb-3 font-semibold">Pesanan toko</h2>
    <div class="mb-8 overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Nomor / tanggal</th><th class="p-3">Nasabah</th><th class="p-3">Pembayaran</th><th class="p-3">Total</th><th class="p-3">Status</th><th class="p-3">Tindakan</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($orders as $order)
                    <tr>
                        <td class="p-3">{{ $order->order_number }}<span class="block text-xs text-slate-500">{{ $order->created_at }}</span></td>
                        <td class="p-3">{{ $order->member_name }}</td>
                        <td class="p-3">{{ strtoupper($order->payment_method) }}</td>
                        <td class="p-3">Rp {{ number_format((float) $order->total, 0, ',', '.') }}</td>
                        <td class="p-3">{{ $order->status }}</td>
                        <td class="p-3">
                            @if ($order->status === 'Menunggu Konfirmasi')
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('admin.transaksi.order', [$order->id, 'complete']) }}">@csrf<button class="rounded bg-emerald-700 px-2 py-1 text-xs font-semibold text-white">Konfirmasi bayar</button></form>
                                    <form method="POST" action="{{ route('admin.transaksi.order', [$order->id, 'reject']) }}">@csrf<button class="rounded bg-rose-700 px-2 py-1 text-xs font-semibold text-white">Tolak</button></form>
                                </div>
                            @else
                                <span class="text-xs text-slate-500">Sudah diproses</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-500">Belum ada pesanan toko.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mb-8">{{ $orders->links() }}</div>

    <h2 class="mb-3 font-semibold">Buku transaksi</h2>
    <form method="GET" class="mb-4 flex flex-wrap gap-2">
        <input name="q" value="{{ $search }}" type="search" placeholder="Cari nasabah atau keterangan" class="min-w-60 rounded-lg border border-slate-300 px-3 py-2 text-sm">
        <select name="jenis" class="rounded-lg border border-slate-300 px-3 py-2 text-sm">
            <option value="">Semua jenis</option>
            @foreach (['simpanan', 'penarikan', 'pinjaman', 'angsuran', 'toko'] as $option)<option value="{{ $option }}" @selected($jenis === $option)>{{ ucfirst($option) }}</option>@endforeach
        </select>
        <button class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Filter</button>
    </form>
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Tanggal</th><th class="p-3">Nasabah</th><th class="p-3">Jenis</th><th class="p-3">Jumlah</th><th class="p-3">Keterangan</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($transactions as $transaction)
                    <tr><td class="p-3">{{ $transaction->tanggal }}</td><td class="p-3">{{ $transaction->member_name ?? '-' }}</td><td class="p-3">{{ ucfirst($transaction->jenis) }}</td><td class="p-3">Rp {{ number_format((float) $transaction->jumlah, 0, ',', '.') }}</td><td class="p-3">{{ $transaction->keterangan }}</td></tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-slate-500">Belum ada transaksi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $transactions->links() }}</div>
</x-layouts.admin>
