<x-layouts.nasabah title="Toko Koperasi">
    <!-- Header Halaman Toko -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 mb-1.5 border border-amber-200/60">
                <x-lucide name="shopping-bag" class="w-3.5 h-3.5 text-amber-600" />
                <span>Unit Usaha Toko Sekolah</span>
            </div>
            <h1 class="text-2xl font-bold text-[#0f2942]">Toko Koperasi Bina Bangkit Mandiri</h1>
            <p class="text-xs sm:text-sm text-[#64748b]">Penyedia perlengkapan ATK, seragam sekolah resmi, serta aneka produk konsumsi anggota.</p>
        </div>

        <div class="flex items-center gap-2.5">
            <!-- Keranjang Belanja Trigger Button -->
            <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-lg shadow-sm transition flex items-center gap-2 relative">
                <x-lucide name="shopping-cart" class="w-4 h-4 text-white" />
                <span>Keranjang</span>
                <span class="bg-amber-400 text-slate-900 font-extrabold text-[11px] px-1.5 py-0.2 rounded-full ml-1">
                    2
                </span>
            </button>
        </div>
    </div>

    <!-- Filter Kategori & Search Toolbar -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-4 sm:p-5 mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Kategori Tabs -->
            <div class="flex flex-wrap items-center gap-1.5 text-xs font-semibold" id="category-tabs">
                <button type="button" class="px-3.5 py-2 rounded-lg bg-[#1d5ec9] text-white shadow-sm transition">
                    Semua Produk
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    ATK & Buku
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Seragam & Atribut
                </button>
                <button type="button" class="px-3.5 py-2 rounded-lg bg-slate-100 text-[#64748b] hover:bg-slate-200 hover:text-[#0f2942] transition">
                    Makanan & Minuman
                </button>
                <button onclick="document.getElementById('riwayat-pembelian-section').scrollIntoView({ behavior: 'smooth' })" type="button" class="px-3.5 py-2 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 transition">
                    Riwayat Pembelian
                </button>
            </div>

            <!-- Search & Sort -->
            <div class="flex items-center gap-2 w-full md:w-auto">
                <div class="relative flex-1 md:w-56">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                        <x-lucide name="search" class="w-3.5 h-3.5 text-slate-400" />
                    </span>
                    <input
                        type="search"
                        placeholder="Cari barang atau ATK..."
                        class="w-full pl-8 pr-3 py-1.5 rounded-lg border border-slate-200 text-xs text-[#0f2942] focus:outline-none focus:ring-2 focus:ring-[#1d5ec9]"
                    />
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Katalog Produk Toko -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Produk 1: ATK -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="file-text" class="w-12 h-12 text-[#1d5ec9]/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-[#1d5ec9]">
                        ATK & Buku
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 42 Unit
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Buku Tulis Spiral A5 80 Lembar</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Kertas tebal 80gsm tidak tembus tinta, cocok untuk catatan mata pelajaran.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 8.500</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 2: ATK -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="pencil" class="w-12 h-12 text-[#1d5ec9]/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-[#1d5ec9]">
                        ATK & Buku
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 110 Unit
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Paket Bolpoin Gel 0.5mm (3 Warna)</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Tinta cepat kering warna Hitam, Biru, dan Merah untuk tugas harian.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 12.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 3: Seragam -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="tag" class="w-12 h-12 text-indigo-500/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-50 text-indigo-700">
                        Seragam & Atribut
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 28 Unit
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Kemeja Seragam Putih OSIS (M/L/XL)</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Bahan katun Oxford adem dan nyaman dengan bordir resmi logo sekolah.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 65.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 4: Seragam -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="tag" class="w-12 h-12 text-indigo-500/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-50 text-indigo-700">
                        Seragam & Atribut
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-amber-50 text-amber-700">
                        Stok: 8 Terbatas
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Jas Almamater Sekolah Resmi</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Furing tebal bahan drill premium untuk seragam upacara dan acara resmi.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 140.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 5: Makanan & Minuman -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="shopping-bag" class="w-12 h-12 text-amber-500/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700">
                        Makanan & Minuman
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Fresh Harian
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Roti Coklat Keju Karya Siswa Tata Boga</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Produk olahan higienis tanpa bahan pengawet hasil karya praktik siswa kejuruan.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 5.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 6: Makanan & Minuman -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="shopping-bag" class="w-12 h-12 text-amber-500/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-amber-50 text-amber-700">
                        Makanan & Minuman
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 60 Unit
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Susu Kotak UHT 250ml Aneka Rasa</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Minuman bernutrisi rasa Coklat, Stroberi, dan Full Cream kemasan higienis.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 6.500</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 7: ATK -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="file-text" class="w-12 h-12 text-[#1d5ec9]/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-[#1d5ec9]">
                        ATK & Buku
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 15 Rim
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Kertas HVS A4 75gsm (1 Rim / 500lbr)</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Kertas putih bersih untuk print makalah, laporan prakerin, dan tugas sekolah.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 48.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>

        <!-- Produk 8: Seragam -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col justify-between hover:shadow-md transition">
            <div class="p-5">
                <div class="h-36 bg-slate-50 rounded-xl flex items-center justify-center mb-4 relative">
                    <x-lucide name="tag" class="w-12 h-12 text-indigo-500/40" />
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-50 text-indigo-700">
                        Seragam & Atribut
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-50 text-emerald-700">
                        Stok: 50 Unit
                    </span>
                </div>
                <h3 class="font-bold text-sm text-[#0f2942] mb-1">Paket Atribut (Dasi, Topi & Kaos Kaki)</h3>
                <p class="text-[11px] text-[#64748b] line-clamp-2 mb-3">Perlengkapan atribut wajib upacara hari Senin lengkap dengan logo bordir.</p>
                <div class="text-base font-extrabold text-[#1d5ec9]">Rp 25.000</div>
            </div>
            <div class="p-5 pt-0">
                <button onclick="document.getElementById('cart-modal').classList.remove('hidden')" type="button" class="w-full inline-flex items-center justify-center gap-1.5 bg-[#1d5ec9] hover:bg-[#154cb0] text-white text-xs font-semibold py-2 rounded-lg transition">
                    <x-lucide name="plus" class="w-3.5 h-3.5" />
                    <span>Pesan Barang</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Section Riwayat Pembelian Anggota -->
    <div id="riwayat-pembelian-section" class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-12">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <div>
                <h2 class="text-base font-bold text-[#0f2942]">Riwayat Pembelian Toko Koperasi</h2>
                <p class="text-xs text-[#64748b]">Daftar barang pesanan dan transaksi belanja Anda di toko sekolah</p>
            </div>
            <button onclick="window.print()" type="button" class="text-xs font-semibold text-[#1d5ec9] hover:underline flex items-center gap-1">
                <x-lucide name="printer" class="w-3.5 h-3.5" />
                <span>Cetak Rekap Belanja</span>
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="bg-[#f0f6ff] text-[#334155] text-xs">
                        <th class="py-3 px-4 rounded-l-lg font-bold">No. Faktur</th>
                        <th class="py-3 px-4 font-bold">Tanggal</th>
                        <th class="py-3 px-4 font-bold">Item Barang</th>
                        <th class="py-3 px-4 font-bold">Total Belanja</th>
                        <th class="py-3 px-4 font-bold">Metode Pembayaran</th>
                        <th class="py-3 px-4 rounded-r-lg font-bold">Status Pesanan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-semibold text-[#0f2942]">FKT-20261008-019</td>
                        <td class="px-4 text-slate-500">08-10-2026 12:45</td>
                        <td class="px-4">Buku Tulis Spiral (1x), Pulpen Gel (3x)</td>
                        <td class="px-4 font-bold text-[#1d5ec9]">Rp 45.000</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-purple-50 text-purple-700">Potong Simpanan</span>
                        </td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                                Sudah Diambil
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4 font-semibold text-[#0f2942]">FKT-20260920-004</td>
                        <td class="px-4 text-slate-500">20-09-2026 09:15</td>
                        <td class="px-4">Kertas HVS A4 1 Rim (1x), Dasi Topi (1x)</td>
                        <td class="px-4 font-bold text-[#1d5ec9]">Rp 73.000</td>
                        <td class="px-4">
                            <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-emerald-50 text-emerald-700">Tunai Kasir</span>
                        </td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">
                                Selesai
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Keranjang Belanja & Checkout (Vanilla JS Toggle) -->
    <div id="cart-modal" class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-5">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#1d5ec9] flex items-center justify-center">
                        <x-lucide name="shopping-cart" class="w-4 h-4 text-[#1d5ec9]" />
                    </div>
                    <div>
                        <h3 class="font-bold text-base text-[#0f2942]">Keranjang & Checkout Toko</h3>
                        <p class="text-xs text-[#64748b]">Konfirmasi pemesanan perlengkapan sekolah</p>
                    </div>
                </div>
                <button onclick="document.getElementById('cart-modal').classList.add('hidden')" type="button" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg">
                    <x-lucide name="x" class="w-5 h-5" />
                </button>
            </div>

            <!-- List Item Keranjang -->
            <div class="space-y-3 mb-5 max-h-52 overflow-y-auto pr-1">
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs">
                    <div>
                        <strong class="text-[#0f2942] block">Buku Tulis Spiral A5</strong>
                        <span class="text-slate-500">1 x Rp 8.500</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-bold text-[#1d5ec9]">Rp 8.500</span>
                        <button type="button" class="text-rose-500 hover:text-rose-700 p-1">
                            <x-lucide name="trash-2" class="w-3.5 h-3.5" />
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs">
                    <div>
                        <strong class="text-[#0f2942] block">Paket Bolpoin Gel 3 Warna</strong>
                        <span class="text-slate-500">3 x Rp 12.000</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-bold text-[#1d5ec9]">Rp 36.000</span>
                        <button type="button" class="text-rose-500 hover:text-rose-700 p-1">
                            <x-lucide name="trash-2" class="w-3.5 h-3.5" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Total Rincian -->
            <div class="bg-[#f0f6ff] p-4 rounded-xl mb-5 space-y-2 text-xs">
                <div class="flex justify-between text-slate-600">
                    <span>Subtotal Produk (4 item)</span>
                    <span>Rp 44.500</span>
                </div>
                <div class="flex justify-between text-emerald-600 font-medium">
                    <span>Diskon Khusus Anggota (Koperasi)</span>
                    <span>-Rp 2.000</span>
                </div>
                <div class="flex justify-between text-[#0f2942] font-extrabold text-sm pt-2 border-t border-blue-200/60">
                    <span>Total Pembayaran</span>
                    <span class="text-[#1d5ec9]">Rp 42.500</span>
                </div>
            </div>

            <!-- Form Pilihan Pembayaran & Catatan -->
            <form onsubmit="alert('Pesanan berhasil dibuat! Silakan ambil barang di kasir toko koperasi sekolah.'); document.getElementById('cart-modal').classList.add('hidden'); return false;" class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-[#0f2942] mb-1.5">Metode Pembayaran</label>
                    <select required class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1d5ec9]">
                        <option value="simpanan" selected>Potong Saldo Simpanan Sukarela (Saldo: Rp 1.200.000)</option>
                        <option value="tunai">Bayar Tunai di Kasir Toko Koperasi</option>
                        <option value="qris">QRIS Koperasi Sekolah</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-[#0f2942] mb-1.5">Catatan Pengambilan</label>
                    <input
                        type="text"
                        placeholder="Contoh: Diambil saat istirahat pertama oleh Rizky"
                        value="Diambil saat jam istirahat pertama"
                        class="w-full px-3 py-2 rounded-lg border border-slate-200 text-xs text-[#0f2942] focus:outline-none focus:ring-2 focus:ring-[#1d5ec9]"
                    />
                </div>

                <div class="pt-2 flex items-center justify-end gap-2.5">
                    <button onclick="document.getElementById('cart-modal').classList.add('hidden')" type="button" class="px-4 py-2 rounded-lg text-xs font-semibold text-slate-600 hover:bg-slate-100 transition">
                        Batal
                    </button>
                    <button type="submit" class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white px-5 py-2 rounded-lg text-xs font-semibold shadow-sm transition flex items-center gap-1.5">
                        <x-lucide name="check" class="w-3.5 h-3.5" />
                        <span>Konfirmasi Pesanan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.nasabah>