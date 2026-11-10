<x-layouts.nasabah title="Toko Koperasi">
    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <span class="mb-1.5 inline-flex rounded-full border border-amber-200 bg-amber-50 px-2.5 py-0.5 text-xs font-semibold text-amber-700">Unit Usaha Toko Sekolah</span>
            <h1 class="text-2xl font-bold text-[#0f2942]">Toko Koperasi Bina Bangkit Mandiri</h1>
            <p class="text-sm text-[#64748b]">Katalog dan pesanan anggota koperasi.</p>
        </div>
        <button onclick="openTokoCart()" type="button" class="inline-flex items-center gap-2 self-start rounded-lg bg-[#1d5ec9] px-4 py-2.5 text-sm font-semibold text-white hover:bg-[#154cb0]">
            <x-lucide name="shopping-cart" class="h-4 w-4" />
            Keranjang <span class="rounded-full bg-amber-400 px-1.5 text-xs font-bold text-slate-900">{{ $cartCount }}</span>
        </button>
    </div>

    @if (session('status'))
        <div role="status" class="mb-5 rounded-lg bg-emerald-50 p-4 text-sm text-emerald-800">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div role="alert" class="mb-5 rounded-lg bg-rose-50 p-4 text-sm text-rose-700">{{ $errors->first() }}</div>
    @endif

    <div class="mb-8 rounded-xl border border-slate-200/80 bg-white p-4 shadow-sm">
        <div class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <nav class="flex flex-wrap gap-2 text-xs font-semibold">
                @foreach (['' => 'Semua Produk', 'ATK & Buku' => 'ATK & Buku', 'Seragam & Atribut' => 'Seragam & Atribut', 'Makanan & Minuman' => 'Makanan & Minuman'] as $value => $label)
                    <a href="{{ route('nasabah.toko', array_filter(['category' => $value, 'q' => $search])) }}" class="rounded-lg px-3.5 py-2 {{ $category === $value ? 'bg-[#1d5ec9] text-white' : 'bg-slate-100 text-[#64748b] hover:bg-slate-200' }}">{{ $label }}</a>
                @endforeach
                <a href="#riwayat-pembelian" class="rounded-lg bg-amber-50 px-3.5 py-2 text-amber-700 hover:bg-amber-100">Riwayat Pembelian</a>
            </nav>
            <form method="GET" action="{{ route('nasabah.toko') }}" class="flex gap-2">
                @if ($category)<input type="hidden" name="category" value="{{ $category }}">@endif
                <label for="store-search" class="sr-only">Cari barang</label>
                <input id="store-search" name="q" value="{{ $search }}" type="search" placeholder="Cari barang atau ATK..." class="w-full rounded-lg border border-slate-200 px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500 md:w-56">
                <button type="submit" class="rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold hover:bg-slate-200">Cari</button>
            </form>
        </div>
    </div>

    <div class="mb-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @forelse ($products as $product)
            @php
                $icon = match ($product->category) {
                    'ATK & Buku' => 'file-text',
                    'Seragam & Atribut' => 'tag',
                    default => 'shopping-bag',
                };
            @endphp
            <article class="flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm transition hover:shadow-md">
                <div class="p-5">
                    <div class="relative mb-4 flex h-36 items-center justify-center rounded-xl bg-slate-50">
                        <x-lucide :name="$icon" class="h-12 w-12 text-blue-300" />
                        <span class="absolute left-2.5 top-2.5 rounded bg-blue-50 px-2 py-0.5 text-[10px] font-bold text-blue-700">{{ $product->category }}</span>
                        <span class="absolute right-2.5 top-2.5 rounded bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700">Stok: {{ $product->stock }} {{ $product->unit }}</span>
                    </div>
                    <h2 class="mb-1 font-bold text-[#0f2942]">{{ $product->name }}</h2>
                    <p class="mb-3 text-xs text-[#64748b]">{{ $product->description }}</p>
                    <p class="font-extrabold text-[#1d5ec9]">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</p>
                </div>
                <form method="POST" action="{{ route('nasabah.toko.cart.add') }}" class="flex items-center gap-2 px-5 pb-5">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label class="sr-only" for="qty-{{ $product->id }}">Jumlah {{ $product->name }}</label>
                    <input id="qty-{{ $product->id }}" type="number" name="quantity" value="1" min="1" max="{{ min(50, $product->stock) }}" required class="w-16 rounded-lg border border-slate-200 px-2 py-2 text-center text-xs">
                    <button type="submit" @disabled($product->stock < 1) class="flex-1 rounded-lg bg-[#1d5ec9] py-2 text-xs font-semibold text-white hover:bg-[#154cb0] disabled:cursor-not-allowed disabled:opacity-50">
                        {{ $product->stock > 0 ? 'Tambah ke Keranjang' : 'Stok Habis' }}
                    </button>
                </form>
            </article>
        @empty
            <div class="col-span-full rounded-xl border border-slate-200 bg-white p-8 text-center text-sm text-slate-500">
                Produk tidak ditemukan atau katalog belum diisi.
            </div>
        @endforelse
    </div>

    <section id="riwayat-pembelian" class="mb-10 rounded-xl border border-slate-200/80 bg-white p-6 shadow-sm">
        <h2 class="mb-4 text-lg font-bold text-[#0f2942]">Riwayat Pesanan Saya</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-slate-100 text-xs uppercase text-slate-400">
                    <tr><th class="py-3">Nomor Pesanan / Tanggal</th><th>Barang</th><th>Total</th><th>Pembayaran</th><th>Status</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($orders as $order)
                        <tr class="align-top">
                            <td class="py-3">
                                <strong>{{ $order->order_number }}</strong>
                                <span class="block text-xs text-slate-500">{{ \Illuminate\Support\Carbon::parse($order->created_at)->format('d-m-Y H:i') }}</span>
                            </td>
                            <td>
                                @foreach ($orderItems->get($order->id, collect()) as $item)
                                    <span class="block">{{ $item->product_name }} ({{ $item->quantity }} {{ $item->unit }})</span>
                                @endforeach
                            </td>
                            <td>Rp {{ number_format((float) $order->total, 0, ',', '.') }}</td>
                            <td>{{ strtoupper($order->payment_method) }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @empty
                        <tr><td class="py-4 text-slate-500" colspan="5">Belum ada pesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div id="cart-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/40 p-4 backdrop-blur-sm">
        <div class="w-full max-w-lg rounded-2xl border border-slate-200 bg-white p-6 shadow-2xl">
            <div class="mb-5 flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h2 class="font-bold text-[#0f2942]">Keranjang Belanja</h2>
                    <p class="text-xs text-[#64748b]">Pesanan dicatat untuk konfirmasi koperasi.</p>
                </div>
                <button onclick="closeTokoCart()" type="button" aria-label="Tutup keranjang" class="rounded-lg p-1 text-slate-400 hover:bg-slate-100">
                    <x-lucide name="x" class="h-5 w-5" />
                </button>
            </div>

            @forelse ($cartProducts as $item)
                <div class="mb-3 flex items-center justify-between gap-3 rounded-xl border border-slate-100 bg-slate-50 p-3 text-xs">
                    <div>
                        <strong class="block text-[#0f2942]">{{ $item->name }}</strong>
                        <span class="text-slate-500">{{ $item->quantity }} x Rp {{ number_format((float) $item->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <strong class="text-[#1d5ec9]">Rp {{ number_format((float) $item->line_total, 0, ',', '.') }}</strong>
                        <form method="POST" action="{{ route('nasabah.toko.cart.remove', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" aria-label="Hapus {{ $item->name }} dari keranjang" class="text-rose-500 hover:text-rose-700"><x-lucide name="trash-2" class="h-4 w-4" /></button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="rounded-lg bg-slate-50 p-4 text-sm text-slate-500">Keranjang masih kosong. Tambahkan produk dari katalog.</p>
            @endforelse

            <div class="my-5 flex justify-between border-t border-slate-100 pt-4 font-bold text-[#0f2942]">
                <span>Total</span>
                <span class="text-[#1d5ec9]">Rp {{ number_format((float) $cartTotal, 0, ',', '.') }}</span>
            </div>
            @if ($cartProducts->isNotEmpty())
                <form method="POST" action="{{ route('nasabah.toko.checkout') }}" class="space-y-4 text-sm">
                    @csrf
                    <div>
                        <label for="payment_method" class="mb-1 block font-semibold">Metode pembayaran</label>
                        <select id="payment_method" name="payment_method" required class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm">
                            <option value="tunai">Tunai di kasir</option>
                            <option value="qris">QRIS (menunggu konfirmasi)</option>
                        </select>
                        <p class="mt-1 text-xs text-slate-500">Pembayaran belum diproses otomatis. Saldo simpanan tidak akan dipotong.</p>
                    </div>
                    <div>
                        <label for="pickup_note" class="mb-1 block font-semibold">Catatan pengambilan (opsional)</label>
                        <input id="pickup_note" name="pickup_note" type="text" maxlength="500" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button onclick="closeTokoCart()" type="button" class="rounded-lg px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100">Batal</button>
                        <button type="submit" class="rounded-lg bg-[#1d5ec9] px-5 py-2 text-xs font-semibold text-white hover:bg-[#154cb0]">Buat Pesanan</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <script>
        function openTokoCart() {
            document.getElementById('cart-modal').classList.remove('hidden');
            document.getElementById('cart-modal').classList.add('flex');
        }

        function closeTokoCart() {
            document.getElementById('cart-modal').classList.add('hidden');
            document.getElementById('cart-modal').classList.remove('flex');
        }
    </script>
</x-layouts.nasabah>
