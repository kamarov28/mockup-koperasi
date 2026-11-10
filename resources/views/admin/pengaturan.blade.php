<x-layouts.admin title="Pengaturan Koperasi">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Pengaturan Koperasi</h1>
    <p class="mb-6 text-sm text-slate-500">Nilai yang disimpan di sini menjadi konfigurasi aplikasi dan perhitungan pinjaman baru.</p>

    @if (session('status'))
        <div class="mb-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-800"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form method="POST" action="{{ route('admin.pengaturan.update') }}" class="max-w-3xl space-y-6">
        @csrf
        @method('PUT')
        <section class="space-y-4 rounded-xl border border-slate-200 bg-white p-5">
            <h2 class="font-semibold">Profil koperasi</h2>
            <label class="block text-sm">Nama koperasi<input name="cooperative_name" required maxlength="150" value="{{ old('cooperative_name', $settings['cooperative_name']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="block text-sm">Nomor badan hukum<input name="legal_number" maxlength="100" value="{{ old('legal_number', $settings['legal_number']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="block text-sm">Kontak resmi<input name="contact" maxlength="30" value="{{ old('contact', $settings['contact']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="block text-sm">Alamat<textarea name="address" maxlength="500" rows="3" class="mt-1 w-full rounded-lg border border-slate-300 p-2">{{ old('address', $settings['address']) }}</textarea></label>
        </section>
        <section class="grid gap-4 rounded-xl border border-slate-200 bg-white p-5 sm:grid-cols-2">
            <h2 class="font-semibold sm:col-span-2">Aturan simpan pinjam</h2>
            <label class="text-sm">Simpanan pokok (Rp)<input name="principal_savings" type="number" min="0" step="1" required value="{{ old('principal_savings', $settings['principal_savings']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="text-sm">Simpanan wajib bulanan (Rp)<input name="monthly_savings" type="number" min="0" step="1" required value="{{ old('monthly_savings', $settings['monthly_savings']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="text-sm">Bunga flat per bulan (%)<input name="interest_rate" type="number" min="0" max="100" step="0.01" required value="{{ old('interest_rate', $settings['interest_rate']) }}" class="mt-1 w-full rounded-lg border border-slate-300 p-2"></label>
            <label class="text-sm">Maksimal tenor pinjaman
                <select name="max_tenor" required class="mt-1 w-full rounded-lg border border-slate-300 p-2">
                    @foreach ([3, 6, 12, 24] as $months)<option value="{{ $months }}" @selected((string) old('max_tenor', $settings['max_tenor']) === (string) $months)>{{ $months }} bulan</option>@endforeach
                </select>
            </label>
            <p class="text-xs text-slate-500 sm:col-span-2">Angsuran persetujuan baru dihitung dari pokok ÷ tenor + bunga flat bulanan × pokok. Pengaturan ini tidak mengubah pinjaman yang sudah diproses dan tidak mencatat pencairan.</p>
        </section>
        <button class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white">Simpan pengaturan</button>
    </form>
</x-layouts.admin>
