<x-layouts.nasabah title="Cetak Dokumen">
    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2d59]">Cetak Dokumen & Laporan</h1>
            <p class="mt-1 text-sm text-[#64748b]">Data dokumen diambil dari simpanan, transaksi, pinjaman, dan profil akun Anda.</p>
        </div>
        <button onclick="window.print()" type="button" class="inline-flex items-center gap-2 self-start rounded-lg bg-[#1d5ec9] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#154cb0]">
            <x-lucide name="printer" class="h-4 w-4" />
            Cetak / Simpan PDF
        </button>
    </div>

    <nav class="mb-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
        @foreach ([
            'simpanan' => ['Laporan Simpanan', 'Rekapitulasi saldo dan mutasi simpanan aktual.', 'file-text', 'text-blue-600'],
            'transaksi' => ['Bukti Transaksi Terakhir', 'Cetak bukti transaksi terakhir yang tercatat.', 'receipt-text', 'text-emerald-600'],
            'pinjaman' => ['Ringkasan Pinjaman Aktif', 'Rincian pinjaman yang sudah disetujui atau dicairkan.', 'file-check', 'text-purple-600'],
            'kartu-anggota' => ['Kartu Anggota Digital', 'Cetak identitas berdasarkan data akun Anda.', 'user', 'text-amber-600'],
        ] as $key => [$title, $description, $icon, $color])
            <a href="{{ route('nasabah.dokumen', ['document' => $key]) }}#dokumen-preview" class="rounded-xl border bg-white p-5 shadow-sm transition hover:border-blue-200 hover:shadow-md {{ $document === $key ? 'border-blue-300 ring-1 ring-blue-100' : 'border-slate-200/80' }}">
                <x-lucide :name="$icon" class="mb-3 h-6 w-6 {{ $color }}" />
                <h2 class="font-bold text-[#0f2942]">{{ $title }}</h2>
                <p class="mt-1 text-xs leading-relaxed text-[#64748b]">{{ $description }}</p>
            </a>
        @endforeach
    </nav>

    <section id="dokumen-preview" class="mx-auto max-w-3xl rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8">
        <header class="mb-6 flex flex-col items-center justify-between gap-4 border-b-2 border-[#0c284d] pb-4 text-center sm:flex-row sm:text-left">
            <div class="flex items-center gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#1d5ec9] text-white"><x-lucide name="building-2" class="h-6 w-6" /></span>
                <div>
                    <h2 class="font-bold uppercase tracking-wide text-[#0c284d]">Koperasi Bina Bangkit Mandiri</h2>
                    <p class="text-xs text-[#64748b]">Dokumen anggota koperasi</p>
                </div>
            </div>
            <div class="text-xs text-[#64748b]">
                <strong class="block text-[#0f2942]">{{ match ($document) {
                    'transaksi' => 'BUKTI TRANSAKSI',
                    'pinjaman' => 'RINGKASAN PINJAMAN AKTIF',
                    'kartu-anggota' => 'KARTU ANGGOTA',
                    default => 'LAPORAN SIMPANAN',
                } }}</strong>
                <span>Tanggal: {{ now()->format('d-m-Y') }}</span>
            </div>
        </header>

        <div class="mb-6 grid grid-cols-1 gap-4 rounded-xl bg-slate-50 p-4 text-xs sm:grid-cols-2">
            <div>
                <span class="mb-0.5 block text-slate-400">Nama Anggota</span>
                <strong class="text-sm text-[#0f2942]">{{ $user->name }}</strong>
                <span class="mt-0.5 block text-slate-500">Email: {{ $user->email }}</span>
            </div>
            <div class="sm:text-right">
                <span class="mb-0.5 block text-slate-400">Nomor Anggota / Akun</span>
                <strong class="text-sm text-[#0f2942]">{{ $user->getAttribute('no_anggota') ?: 'ID-'.$user->id }}</strong>
                <span class="mt-0.5 block text-slate-500">Dibuat {{ optional($user->created_at)->format('d-m-Y') ?: '-' }}</span>
            </div>
        </div>

        @if ($document === 'kartu-anggota')
            <div class="mx-auto max-w-md rounded-2xl border-2 border-blue-100 bg-blue-50 p-8 text-center">
                <x-lucide name="user" class="mx-auto h-12 w-12 text-[#1d5ec9]" />
                <h3 class="mt-4 text-xl font-bold text-[#0f2942]">{{ $user->name }}</h3>
                <p class="mt-2 text-sm text-[#64748b]">Nomor Anggota</p>
                <p class="text-lg font-bold text-[#1d5ec9]">{{ $user->getAttribute('no_anggota') ?: 'ID-'.$user->id }}</p>
                <p class="mt-3 text-xs text-[#64748b]">{{ $user->email }}</p>
            </div>
        @elseif ($document === 'transaksi')
            @if ($transaksiTerbaru)
                <table class="w-full text-sm">
                    <tbody class="divide-y divide-slate-100">
                        <tr><th class="py-3 text-left font-medium text-slate-500">Tanggal</th><td class="py-3 text-right">{{ \Illuminate\Support\Carbon::parse($transaksiTerbaru->tanggal)->format('d-m-Y') }}</td></tr>
                        <tr><th class="py-3 text-left font-medium text-slate-500">Jenis</th><td class="py-3 text-right">{{ $transaksiTerbaru->jenis }}</td></tr>
                        <tr><th class="py-3 text-left font-medium text-slate-500">Keterangan</th><td class="py-3 text-right">{{ $transaksiTerbaru->keterangan }}</td></tr>
                        <tr><th class="py-3 text-left font-bold text-[#0f2942]">Jumlah</th><td class="py-3 text-right font-bold text-[#1d5ec9]">Rp {{ number_format((float) $transaksiTerbaru->jumlah, 0, ',', '.') }}</td></tr>
                    </tbody>
                </table>
            @else
                <p class="rounded-lg bg-slate-50 p-5 text-center text-sm text-slate-500">Belum ada transaksi untuk dicetak.</p>
            @endif
        @elseif ($document === 'pinjaman')
            @if ($pinjamanAktif->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-b border-slate-200 text-xs text-slate-500"><tr><th class="py-3">Tanggal Cair</th><th>Keperluan</th><th>Jumlah</th><th>Tenor</th><th>Status</th></tr></thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($pinjamanAktif as $loan)
                                <tr>
                                    <td class="py-3">{{ $loan->tanggal_pencairan ? \Illuminate\Support\Carbon::parse($loan->tanggal_pencairan)->format('d-m-Y') : '-' }}</td>
                                    <td>{{ $loan->keperluan ?: '-' }}</td>
                                    <td>Rp {{ number_format((float) $loan->jumlah_pinjaman, 0, ',', '.') }}</td>
                                    <td>{{ $loan->jangka_waktu ? $loan->jangka_waktu.' bulan' : '-' }}</td>
                                    <td>{{ $loan->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="mt-4 text-xs text-slate-500">Dokumen ini adalah ringkasan data pinjaman, bukan akad/perjanjian pinjaman.</p>
            @else
                <p class="rounded-lg bg-slate-50 p-5 text-center text-sm text-slate-500">Belum ada pinjaman aktif yang disetujui atau dicairkan.</p>
            @endif
        @else
            <div class="mb-4 flex items-center justify-between gap-4">
                <h3 class="font-bold text-[#0f2942]">Mutasi Simpanan</h3>
                <div class="text-right text-xs text-slate-500">Saldo tercatat<strong class="mt-1 block text-base text-emerald-600">Rp {{ number_format((float) $saldoSimpanan, 0, ',', '.') }}</strong></div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-slate-200 text-xs text-slate-500"><tr><th class="py-3">Tanggal</th><th>Jenis</th><th>Keterangan</th><th class="text-right">Mutasi</th><th class="text-right">Saldo</th></tr></thead>
                    <tbody class="divide-y divide-slate-100">
                        @php
                            $runningBalance = 0;
                        @endphp
                        @forelse ($simpanan as $item)
                            @php
                                $withdrawal = str_contains(mb_strtolower(trim((string) $item->keterangan)), 'penarikan');
                                $amount = $withdrawal ? -(float) $item->jumlah : (float) $item->jumlah;
                                $runningBalance += $amount;
                            @endphp
                            <tr>
                                <td class="py-3">{{ \Illuminate\Support\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->keterangan ?: '-' }}</td>
                                <td class="text-right {{ $withdrawal ? 'text-rose-600' : 'text-emerald-600' }}">{{ $withdrawal ? '-' : '+' }}Rp {{ number_format(abs($amount), 0, ',', '.') }}</td>
                                <td class="text-right">Rp {{ number_format((float) $runningBalance, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr><td class="py-4 text-center text-slate-500" colspan="5">Belum ada catatan simpanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <p class="mt-4 border-t border-slate-100 pt-4 text-right text-sm font-bold text-[#0f2942]">Saldo akhir: Rp {{ number_format((float) $saldoSimpanan, 0, ',', '.') }}</p>
        @endif
        <footer class="mt-8 border-t border-slate-100 pt-4 text-center text-xs text-slate-500">
            Dokumen dibuat dari data akun yang sedang masuk. Simpan sebagai PDF melalui dialog cetak browser.
        </footer>
    </section>
</x-layouts.nasabah>
