<x-layouts.nasabah title="Pinjaman Saya">
    <!-- Header Halaman (1:1 with 06_pinjaman_nasabah) -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Pinjaman Saya</h1>
        <a href="{{ route('nasabah.pinjaman.pengajuan') }}" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
            + Pengajuan Baru
        </a>
    </div>

    @if (session('status'))
        <div role="status" class="mb-6 max-w-2xl rounded-lg bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    <!-- Ringkasan pinjaman aktif -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 max-w-2xl">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
            <span class="font-bold text-sm text-[#0f2942]">Total Pinjaman Aktif</span>
            <span class="font-bold text-lg text-[#0f2942]">Rp {{ number_format((float) $pinjamanAktif, 0, ',', '.') }}</span>
        </div>

        @if ($pinjamanTerbaru)
            <div class="space-y-3.5 text-sm">
                <div class="flex justify-between items-center">
                    <span class="text-[#64748b]">Status Pinjaman Terbaru</span>
                    <span class="font-semibold text-[#0f2942]">{{ $pinjamanTerbaru->status }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#64748b]">Jumlah Pinjaman</span>
                    <span class="font-semibold text-[#0f2942]">Rp {{ number_format((float) $pinjamanTerbaru->jumlah_pinjaman, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#64748b]">Jangka Waktu</span>
                    <span class="font-semibold text-[#0f2942]">{{ $pinjamanTerbaru->jangka_waktu }} bulan</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#64748b]">Angsuran per Bulan</span>
                    <span class="font-semibold text-[#0f2942]">
                        {{ $pinjamanTerbaru->angsuran_per_bulan !== null ? 'Rp '.number_format((float) $pinjamanTerbaru->angsuran_per_bulan, 0, ',', '.') : '-' }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[#64748b]">Tanggal Pencairan</span>
                    <span class="font-semibold text-[#0f2942]">
                        {{ $pinjamanTerbaru->tanggal_pencairan ? \Illuminate\Support\Carbon::parse($pinjamanTerbaru->tanggal_pencairan)->format('d-m-Y') : '-' }}
                    </span>
                </div>
            </div>
        @else
            <p class="text-sm text-slate-500">Belum ada pinjaman aktif.</p>
        @endif
    </div>

    <!-- Riwayat Pinjaman Section (1:1 with 06_pinjaman_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 max-w-2xl">
        <h2 class="text-base font-bold text-[#0f2942] mb-4">Riwayat Pinjaman</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-[#f0f5fa] text-[#334155] text-xs">
                        <th class="py-3 px-4 rounded-l-lg font-bold">Tanggal</th>
                        <th class="py-3 px-4 font-bold">Jumlah</th>
                        <th class="py-3 px-4 rounded-r-lg font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    @forelse ($pinjaman as $item)
                        <tr class="hover:bg-slate-50/60 transition">
                            <td class="py-3.5 px-4">
                                {{ $item->tanggal_pencairan
                                    ? \Illuminate\Support\Carbon::parse($item->tanggal_pencairan)->format('d-m-Y')
                                    : ($item->created_at ? \Illuminate\Support\Carbon::parse($item->created_at)->format('d-m-Y') : '-') }}
                            </td>
                            <td class="px-4 font-medium">Rp {{ number_format((float) $item->jumlah_pinjaman, 0, ',', '.') }}</td>
                            <td class="px-4">
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                    {{ $item->status ?: 'Belum ada status' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="py-4 px-4 text-slate-500" colspan="3">Belum ada riwayat pinjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
