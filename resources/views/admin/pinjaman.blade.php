<x-layouts.admin title="Pinjaman">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Pinjaman</h1>
    <p class="mb-6 text-sm text-slate-500">Tinjau dan proses pengajuan pinjaman. Persetujuan tidak otomatis mencairkan dana.</p>

    @if (session('status'))
        <div class="mb-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-800"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form method="GET" class="mb-5 flex flex-wrap gap-2">
        <input name="q" value="{{ $search }}" type="search" placeholder="Cari nama atau keperluan" class="min-w-60 rounded-lg border border-slate-300 px-3 py-2 text-sm">
        <select name="status" class="rounded-lg border border-slate-300 px-3 py-2 text-sm">
            <option value="">Semua status</option>
            @foreach (['Menunggu Verifikasi', 'Disetujui', 'Ditolak'] as $option)<option value="{{ $option }}" @selected($status === $option)>{{ $option }}</option>@endforeach
        </select>
        <button class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Filter</button>
    </form>

    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Tanggal</th><th class="p-3">Nasabah / Keperluan</th><th class="p-3">Pokok</th><th class="p-3">Tenor</th><th class="p-3">Angsuran/bulan</th><th class="p-3">Status</th><th class="p-3">Tindakan</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($loans as $loan)
                    <tr>
                        <td class="p-3">{{ $loan->created_at }}</td>
                        <td class="p-3">{{ $loan->member_name }}<span class="block text-xs text-slate-500">{{ $loan->keperluan }}</span></td>
                        <td class="p-3">Rp {{ number_format((float) $loan->jumlah_pinjaman, 0, ',', '.') }}</td>
                        <td class="p-3">{{ $loan->jangka_waktu }} bulan</td>
                        <td class="p-3">{{ $loan->angsuran_per_bulan === null ? '-' : 'Rp '.number_format((float) $loan->angsuran_per_bulan, 0, ',', '.') }}</td>
                        <td class="p-3">{{ $loan->status }}</td>
                        <td class="p-3">
                            @if (in_array(mb_strtolower(trim((string) $loan->status)), ['menunggu verifikasi', 'menunggu persetujuan'], true))
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('admin.pinjaman.decide', [$loan->id, 'approve']) }}">@csrf<button class="rounded bg-emerald-700 px-2 py-1 text-xs font-semibold text-white">Setujui</button></form>
                                    <form method="POST" action="{{ route('admin.pinjaman.decide', [$loan->id, 'reject']) }}">@csrf<button class="rounded bg-rose-700 px-2 py-1 text-xs font-semibold text-white">Tolak</button></form>
                                </div>
                            @else
                                <span class="text-xs text-slate-500">Sudah diproses</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="p-6 text-center text-slate-500">Belum ada pengajuan pinjaman.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $loans->links() }}</div>
</x-layouts.admin>
