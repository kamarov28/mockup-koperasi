<x-layouts.nasabah title="Riwayat Transaksi">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2d59]">Riwayat Transaksi</h1>
        <p class="mt-1 text-sm text-[#64748b]">Cari atau filter transaksi yang tercatat pada akun Anda.</p>
    </div>
    <form method="GET" action="{{ route('nasabah.transaksi') }}" class="mb-6 flex flex-wrap items-center gap-3">
        <input type="search" name="q" value="{{ $search }}" placeholder="Cari transaksi..." class="min-w-[220px] flex-1 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <select name="jenis" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" @selected($jenis === '')>Semua Jenis</option>
            <option value="simpanan" @selected($jenis === 'simpanan')>Simpanan</option>
            <option value="pinjaman" @selected($jenis === 'pinjaman')>Pinjaman</option>
        </select>
        <button type="submit" class="rounded-lg bg-[#1976d2] px-6 py-2 text-sm font-semibold text-white hover:bg-[#1565c0]">Cari</button>
    </form>
    <div class="overflow-hidden rounded-xl border border-slate-200/80 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-100 bg-blue-50 text-xs font-bold text-slate-600">
                    <tr><th class="px-6 py-3.5">Tanggal</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    @forelse ($transaksi as $item)
                        <tr>
                            <td class="px-6 py-4">{{ \Illuminate\Support\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>Rp {{ number_format((float) $item->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @empty
                        <tr><td class="px-6 py-4 text-slate-500" colspan="4">Tidak ada transaksi yang cocok.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($transaksi->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $transaksi->links() }}</div>
        @endif
    </div>
</x-layouts.nasabah>
