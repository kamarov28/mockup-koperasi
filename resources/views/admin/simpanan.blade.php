<x-layouts.admin title="Simpanan">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Simpanan</h1>
    <p class="mb-6 text-sm text-slate-500">Catat setoran atau penarikan simpanan sukarela. Penarikan dibatasi oleh saldo tersedia.</p>

    @if (session('status'))
        <div class="mb-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-800"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <div class="mb-5 rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm text-slate-500">Saldo simpanan bersih</p>
        <p class="text-2xl font-bold text-blue-700">Rp {{ number_format($totalSavings, 0, ',', '.') }}</p>
    </div>

    <details class="mb-6 rounded-xl border border-slate-200 bg-white p-5">
        <summary class="cursor-pointer font-semibold text-blue-700">Catat transaksi simpanan</summary>
        <form method="POST" action="{{ route('admin.simpanan.store') }}" class="mt-4 grid gap-4 sm:grid-cols-2">
            @csrf
            <label class="text-sm">Nasabah
                <select name="user_id" required class="mt-1 w-full rounded-lg border border-slate-300 p-2">
                    @foreach ($memberOptions as $member)<option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>@endforeach
                </select>
            </label>
            <label class="text-sm">Jenis transaksi
                <select name="direction" required class="mt-1 w-full rounded-lg border border-slate-300 p-2">
                    <option value="setor">Setoran</option><option value="tarik">Penarikan (sukarela saja)</option>
                </select>
            </label>
            <label class="text-sm">Pos simpanan
                <select name="jenis" required class="mt-1 w-full rounded-lg border border-slate-300 p-2">
                    <option value="Sukarela">Sukarela</option><option value="Wajib">Wajib</option><option value="Pokok">Pokok</option>
                </select>
            </label>
            <label class="text-sm">Nominal (Rp)
                <input name="jumlah" type="number" min="1" step="1" required value="{{ old('jumlah') }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2">
            </label>
            <label class="text-sm sm:col-span-2">Keterangan
                <input name="keterangan" maxlength="500" value="{{ old('keterangan') }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2">
            </label>
            <button class="w-fit rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Simpan transaksi</button>
        </form>
    </details>

    <h2 class="mb-3 font-semibold">Saldo per nasabah</h2>
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Nasabah</th><th class="p-3">Pokok</th><th class="p-3">Wajib</th><th class="p-3">Sukarela</th><th class="p-3">Saldo total</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($members as $member)
                    <tr><td class="p-3">{{ $member->name }}<span class="block text-xs text-slate-500">{{ $member->email }}</span></td><td class="p-3">Rp {{ number_format((float) $member->total_pokok, 0, ',', '.') }}</td><td class="p-3">Rp {{ number_format((float) $member->total_wajib, 0, ',', '.') }}</td><td class="p-3">Rp {{ number_format((float) $member->total_sukarela, 0, ',', '.') }}</td><td class="p-3 font-semibold">Rp {{ number_format((float) $member->total_saldo, 0, ',', '.') }}</td></tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-slate-500">Belum ada data nasabah.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $members->links() }}</div>

    <h2 class="mb-3 mt-8 font-semibold">Catatan simpanan terbaru</h2>
    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="p-3">Tanggal</th><th class="p-3">Nasabah</th><th class="p-3">Jenis</th><th class="p-3">Nominal</th><th class="p-3">Keterangan</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($transactions as $transaction)
                    <tr><td class="p-3">{{ $transaction->tanggal }}</td><td class="p-3">{{ $transaction->member_name }}</td><td class="p-3">{{ $transaction->jenis }}</td><td class="p-3">Rp {{ number_format((float) $transaction->jumlah, 0, ',', '.') }}</td><td class="p-3">{{ $transaction->keterangan }}</td></tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-slate-500">Belum ada catatan simpanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
