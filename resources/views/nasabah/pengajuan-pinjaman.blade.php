<x-layouts.nasabah title="Pengajuan Pinjaman">
    <!-- Header Halaman (1:1 with 05_pengajuan_pinjaman_nasabah) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Pengajuan Pinjaman</h1>
    </div>

    <!-- Stepper 3 Tahap (1:1 with 05_pengajuan_pinjaman_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 max-w-2xl">
        <div class="flex items-center justify-between relative">
            <!-- Connecting line -->
            <div class="absolute left-6 right-6 top-1/2 -translate-y-1/2 h-0.5 bg-slate-200 -z-0"></div>

            <!-- Step 1: Active -->
            <div class="flex items-center gap-2.5 bg-white pr-3 relative z-10">
                <div class="w-8 h-8 rounded-full bg-[#2563eb] text-white flex items-center justify-center text-sm font-bold shadow-sm">
                    1
                </div>
                <span class="text-xs sm:text-sm font-semibold text-[#0f2942]">Data Pengajuan</span>
            </div>

            <!-- Step 2: Inactive -->
            <div class="flex items-center gap-2.5 bg-white px-3 relative z-10">
                <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-sm font-medium">
                    2
                </div>
                <span class="text-xs sm:text-sm text-slate-500 font-medium">Verifikasi</span>
            </div>

            <!-- Step 3: Inactive -->
            <div class="flex items-center gap-2.5 bg-white pl-3 relative z-10">
                <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center text-sm font-medium">
                    3
                </div>
                <span class="text-xs sm:text-sm text-slate-500 font-medium">Selesai</span>
            </div>
        </div>
    </div>

    <!-- Form Pengajuan Pinjaman Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 sm:p-8 max-w-2xl">
        <h2 class="text-base font-bold text-[#0f2942] mb-6">Form Pengajuan Pinjaman</h2>

        <div class="mb-5 rounded-lg bg-amber-50 p-4 text-sm text-amber-800">
            Pengajuan akan dicatat dengan status Menunggu Verifikasi. Pengiriman formulir tidak berarti pinjaman disetujui atau dicairkan.
        </div>

        <form action="{{ route('nasabah.pinjaman.pengajuan.store') }}" method="POST" class="space-y-5">
            @csrf
            <!-- Field: Jumlah Pinjaman -->
            <div>
                <label for="amount" class="block text-xs sm:text-sm font-medium text-[#475569] mb-1.5">
                    Jumlah Pinjaman
                </label>
                <input
                    id="amount"
                    type="number"
                    name="amount"
                    placeholder="Masukkan jumlah pinjaman"
                    min="1"
                    max="999999999999999"
                    step="1"
                    value="{{ old('amount') }}"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] bg-slate-50/50 focus:bg-white transition"
                />
                @error('amount')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field: Jangka Waktu -->
            <div>
                <label for="tenor" class="block text-xs sm:text-sm font-medium text-[#475569] mb-1.5">
                    Jangka Waktu
                </label>
                <select
                    id="tenor"
                    name="tenor"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] bg-slate-50/50 focus:bg-white text-slate-600 transition"
                >
                    <option value="" disabled @selected(old('tenor') === null)>Pilih jangka waktu</option>
                    <option value="3" @selected(old('tenor') === '3')>3 Bulan</option>
                    <option value="6" @selected(old('tenor') === '6')>6 Bulan</option>
                    <option value="12" @selected(old('tenor') === '12')>12 Bulan</option>
                    <option value="24" @selected(old('tenor') === '24')>24 Bulan</option>
                </select>
                @error('tenor')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Field: Keperluan -->
            <div>
                <label for="purpose" class="block text-xs sm:text-sm font-medium text-[#475569] mb-1.5">
                    Keperluan
                </label>
                <select
                    id="purpose"
                    name="purpose"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#2563eb] bg-slate-50/50 focus:bg-white text-slate-600 transition"
                >
                    <option value="" disabled @selected(old('purpose') === null)>Pilih keperluan</option>
                    <option value="modal_usaha" @selected(old('purpose') === 'modal_usaha')>Modal Usaha</option>
                    <option value="pendidikan" @selected(old('purpose') === 'pendidikan')>Pendidikan</option>
                    <option value="konsumtif" @selected(old('purpose') === 'konsumtif')>Konsumtif</option>
                    <option value="kebutuhan_mendesak" @selected(old('purpose') === 'kebutuhan_mendesak')>Kebutuhan Mendesak</option>
                </select>
                @error('purpose')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white px-6 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition"
                >
                    Ajukan Pinjaman
                </button>
            </div>
        </form>
    </div>
</x-layouts.nasabah>
