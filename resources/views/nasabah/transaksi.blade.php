<x-layouts.nasabah title="Riwayat Transaksi">
    <!-- Header Halaman (1:1 with 07_riwayat_transaksi_nasabah) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2d59]">Riwayat Transaksi</h1>
    </div>

    <!-- Search & Filter Toolbar -->
    <form method="GET" action="{{ route('nasabah.transaksi') }}" class="flex flex-wrap items-center gap-3 mb-6">
        <div class="relative flex-1 min-w-[240px] max-w-sm">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400">
                <x-lucide name="search" class="w-4 h-4 text-slate-400" />
            </span>
            <input
                type="search"
                name="q"
                value="{{ $search }}"
                placeholder="Cari transaksi..."
                class="w-full pl-9 pr-4 py-2 rounded-lg border border-slate-200 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-[#1976d2]"
            />
        </div>

        <select name="jenis" class="px-3 py-2 rounded-lg border border-slate-200 text-sm bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1976d2]">
            <option value="" @selected($jenis === '')>Semua Jenis</option>
            <option value="simpanan" @selected($jenis === 'simpanan')>Simpanan</option>
            <option value="pinjaman" @selected($jenis === 'pinjaman')>Pinjaman</option>
        </select>

        <button type="submit" class="bg-[#1976d2] hover:bg-[#1565c0] text-white text-sm font-semibold px-6 py-2 rounded-lg shadow-sm transition">
            Cari
        </button>
    </form>

    <!-- Transaksi Table Card (1:1 with 07_riwayat_transaksi_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                        <th class="py-3.5 px-6 font-bold">Tanggal</th>
                        <th class="py-3.5 px-6 font-bold">Jenis</th>
                        <th class="py-3.5 px-6 font-bold">Jumlah</th>
                        <th class="py-3.5 px-6 font-bold">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    @forelse ($transaksi as $item)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-4 px-6">{{ \Illuminate\Support\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6">{{ $item->jenis }}</td>
                            <td class="px-6 font-medium">Rp {{ number_format((float) $item->jumlah, 0, ',', '.') }}</td>
                            <td class="px-6">{{ $item->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-4 px-6 text-slate-500" colspan="4">Tidak ada transaksi yang cocok.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($transaksi->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">
                {{ $transaksi->links() }}
            </div>
        @endif
    </div>
</x-layouts.nasabah>
