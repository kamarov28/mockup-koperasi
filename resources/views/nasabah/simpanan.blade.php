<x-layouts.nasabah title="Simpanan">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Data Simpanan</h1>
        <p class="mt-1 text-sm text-[#64748b]">Ringkasan dan riwayat simpanan yang tercatat untuk akun Anda.</p>
    </div>
    <div class="mb-8 flex items-center gap-4 rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600"><x-lucide name="wallet" class="h-6 w-6" /></span>
        <div>
            <span class="text-xs font-medium text-[#64748b]">Total Simpanan</span>
            <div class="mt-0.5 text-2xl font-bold text-[#0f2942]">Rp {{ number_format((float) $totalSimpanan, 0, ',', '.') }}</div>
        </div>
    </div>
    <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <h2 class="mb-4 font-bold text-[#0f172a]">Riwayat Simpanan</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-100 text-xs uppercase text-slate-400">
                    <tr><th class="py-3">Tanggal</th><th>Jenis</th><th>Jumlah</th><th>Keterangan</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($simpanan as $item)
                        @php($isPenarikan = str_contains(mb_strtolower(trim((string) $item->keterangan)), 'penarikan'))
                        <tr>
                            <td class="py-3.5">{{ \Illuminate\Support\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td class="{{ $isPenarikan ? 'text-rose-600' : 'text-emerald-600' }}">{{ $isPenarikan ? '-' : '+' }}Rp {{ number_format((float) $item->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @empty
                        <tr><td class="py-4 text-slate-500" colspan="4">Belum ada riwayat simpanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
