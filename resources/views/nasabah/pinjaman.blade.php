<x-layouts.nasabah title="Pinjaman">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2942]">Data Pinjaman</h1>
            <p class="mt-1 text-sm text-[#64748b]">Pengajuan dan pinjaman yang tercatat untuk akun Anda.</p>
        </div>
        <a href="{{ route('nasabah.pinjaman.pengajuan') }}" class="rounded-lg bg-[#1d5ec9] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#154cb0]">Ajukan Pinjaman</a>
    </div>
    @if (session('status'))
        <div role="status" class="mb-5 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    <div class="mb-8 rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <span class="text-xs font-medium text-[#64748b]">Total Pinjaman Aktif</span>
        <div class="mt-1 text-2xl font-bold text-blue-600">Rp {{ number_format((float) $pinjamanAktif, 0, ',', '.') }}</div>
    </div>
    <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <h2 class="mb-4 font-bold text-[#0f172a]">Riwayat Pinjaman</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-100 text-xs uppercase text-slate-400">
                    <tr><th class="py-3">Tanggal</th><th>Jumlah</th><th>Tenor</th><th>Angsuran/Bulan</th><th>Keperluan</th><th>Status</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($pinjaman as $item)
                        <tr>
                            <td class="py-3.5">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td>Rp {{ number_format((float) $item->jumlah_pinjaman, 0, ',', '.') }}</td>
                            <td>{{ $item->jangka_waktu ? $item->jangka_waktu.' bulan' : '-' }}</td>
                            <td>{{ $item->angsuran_per_bulan ? 'Rp '.number_format((float) $item->angsuran_per_bulan, 0, ',', '.') : '-' }}</td>
                            <td>{{ $item->keperluan ?: '-' }}</td>
                            <td>{{ $item->status ?: 'Menunggu Verifikasi' }}</td>
                        </tr>
                    @empty
                        <tr><td class="py-4 text-slate-500" colspan="6">Belum ada data pinjaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
