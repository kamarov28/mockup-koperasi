<x-layouts.admin title="Laporan">
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div><h1 class="mb-1 text-2xl font-bold text-slate-900">Laporan Koperasi</h1><p class="text-sm text-slate-500">Ringkasan dihitung dari transaksi dan status aktual.</p></div>
        <button type="button" onclick="window.print()" class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Cetak / Simpan PDF</button>
    </div>

    <form method="GET" class="mb-6 flex flex-wrap items-end gap-3 rounded-xl border border-slate-200 bg-white p-4">
        <label class="text-sm">Dari tanggal<input type="date" name="from" value="{{ $from }}" class="mt-1 block rounded-lg border border-slate-300 p-2"></label>
        <label class="text-sm">Sampai tanggal<input type="date" name="to" value="{{ $to }}" class="mt-1 block rounded-lg border border-slate-300 p-2"></label>
        <button class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Terapkan</button>
    </form>

    <div class="grid gap-4 md:grid-cols-3">
        <section class="rounded-xl border border-slate-200 bg-white p-5"><p class="text-sm text-slate-500">Perubahan bersih simpanan</p><p class="mt-2 text-xl font-bold text-emerald-700">Rp {{ number_format($savings, 0, ',', '.') }}</p></section>
        <section class="rounded-xl border border-slate-200 bg-white p-5"><p class="text-sm text-slate-500">Nilai pinjaman disetujui*</p><p class="mt-2 text-xl font-bold text-blue-700">Rp {{ number_format($loanApplications, 0, ',', '.') }}</p></section>
        <section class="rounded-xl border border-slate-200 bg-white p-5"><p class="text-sm text-slate-500">Pembayaran toko dikonfirmasi</p><p class="mt-2 text-xl font-bold text-amber-700">Rp {{ number_format($shopRevenue, 0, ',', '.') }}</p></section>
    </div>
    <p class="mt-3 text-xs text-slate-500">* Pinjaman dihitung berdasarkan tanggal pengajuan yang disetujui, bukan tanggal pencairan.</p>

    <h2 class="mb-3 mt-8 font-semibold">Rincian buku transaksi</h2>
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Tanggal</th><th class="p-3">Nasabah</th><th class="p-3">Jenis</th><th class="p-3">Jumlah</th><th class="p-3">Keterangan</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($ledger as $entry)
                    <tr><td class="p-3">{{ $entry->tanggal }}</td><td class="p-3">{{ $entry->member_name ?? '-' }}</td><td class="p-3">{{ ucfirst($entry->jenis) }}</td><td class="p-3">Rp {{ number_format((float) $entry->jumlah, 0, ',', '.') }}</td><td class="p-3">{{ $entry->keterangan }}</td></tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-slate-500">Tidak ada transaksi dalam periode ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $ledger->links() }}</div>
</x-layouts.admin>
