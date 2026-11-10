<x-layouts.nasabah title="Pengajuan Pinjaman">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Pengajuan Pinjaman</h1>
        <p class="mt-1 text-sm text-[#64748b]">Isi data pengajuan untuk diteruskan ke proses verifikasi koperasi.</p>
    </div>
    <div class="mb-6 max-w-2xl rounded-xl border border-slate-200/80 bg-white p-5 shadow-sm">
        <ol class="grid grid-cols-3 gap-2 text-center text-xs sm:text-sm">
            <li class="rounded-lg bg-blue-50 px-2 py-3 font-semibold text-blue-700">1. Data Pengajuan</li>
            <li class="rounded-lg bg-slate-50 px-2 py-3 text-slate-500">2. Verifikasi</li>
            <li class="rounded-lg bg-slate-50 px-2 py-3 text-slate-500">3. Selesai</li>
        </ol>
    </div>
    <div class="max-w-2xl rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8">
        <h2 class="mb-4 font-bold text-[#0f2942]">Form Pengajuan Pinjaman</h2>
        @if (session('status'))
            <div role="status" class="mb-5 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800">{{ session('status') }}</div>
        @endif
        <div class="mb-5 rounded-lg bg-amber-50 p-4 text-sm text-amber-800">
            Pengajuan dicatat dengan status Menunggu Verifikasi. Pengiriman formulir tidak berarti pinjaman disetujui atau dicairkan.
        </div>
        <form action="{{ route('nasabah.pinjaman.pengajuan.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="amount" class="mb-1.5 block text-sm font-medium text-[#475569]">Jumlah Pinjaman</label>
                <input id="amount" name="amount" type="number" min="1" max="999999999999999" step="1" value="{{ old('amount') }}" required class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('amount')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="tenor" class="mb-1.5 block text-sm font-medium text-[#475569]">Jangka Waktu</label>
                <select id="tenor" name="tenor" required class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih jangka waktu</option>
                    @foreach ($tenors as $months)
                        <option value="{{ $months }}" @selected((string) old('tenor') === (string) $months)>{{ $months }} Bulan</option>
                    @endforeach
                </select>
                @error('tenor')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="purpose" class="mb-1.5 block text-sm font-medium text-[#475569]">Keperluan</label>
                <select id="purpose" name="purpose" required class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih keperluan</option>
                    @foreach (['modal_usaha' => 'Modal Usaha', 'pendidikan' => 'Pendidikan', 'konsumtif' => 'Konsumtif', 'kebutuhan_mendesak' => 'Kebutuhan Mendesak'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('purpose') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('purpose')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="rounded-lg bg-[#2563eb] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#1d4ed8]">Ajukan Pinjaman</button>
        </form>
    </div>
</x-layouts.nasabah>
