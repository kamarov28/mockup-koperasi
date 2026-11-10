<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TokoController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'category' => ['nullable', 'in:ATK & Buku,Seragam & Atribut,Makanan & Minuman'],
        ]);

        $productQuery = DB::table('toko_products')->where('is_active', true);

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';
            $productQuery->where(function ($query) use ($search): void {
                $query->whereRaw('LOWER(name) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$search]);
            });
        }

        if (! empty($filters['category'])) {
            $productQuery->where('category', $filters['category']);
        }

        $products = $productQuery->orderBy('name')->get();
        $cart = $request->session()->get('toko_cart', []);
        $cartProducts = collect();

        if ($cart !== []) {
            $cartProducts = DB::table('toko_products')
                ->whereIn('id', array_keys($cart))
                ->where('is_active', true)
                ->get()
                ->map(function (object $product) use ($cart): object {
                    $product->quantity = (int) $cart[$product->id];
                    $product->line_total = $product->quantity * (float) $product->price;

                    return $product;
                });
        }

        $orders = DB::table('toko_orders')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        $orderItems = $orders->isEmpty()
            ? collect()
            : DB::table('toko_order_items')
                ->whereIn('order_id', $orders->pluck('id'))
                ->orderBy('id')
                ->get()
                ->groupBy('order_id');

        return view('nasabah.toko', [
            'products' => $products,
            'cartProducts' => $cartProducts,
            'cartTotal' => $cartProducts->sum('line_total'),
            'cartCount' => $cartProducts->sum('quantity'),
            'orders' => $orders,
            'orderItems' => $orderItems,
            'search' => $filters['q'] ?? '',
            'category' => $filters['category'] ?? '',
        ]);
    }

    public function addToCart(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['required', 'integer', 'exists:toko_products,id'],
            'quantity' => ['required', 'integer', 'min:1', 'max:50'],
        ]);

        $product = DB::table('toko_products')
            ->where('id', $validated['product_id'])
            ->where('is_active', true)
            ->first();

        if (! $product || $product->stock < $validated['quantity']) {
            throw ValidationException::withMessages([
                'quantity' => 'Stok produk tidak mencukupi.',
            ]);
        }

        $cart = $request->session()->get('toko_cart', []);
        $newQuantity = (int) ($cart[$product->id] ?? 0) + $validated['quantity'];

        if ($newQuantity > $product->stock) {
            throw ValidationException::withMessages([
                'quantity' => 'Jumlah di keranjang melebihi stok yang tersedia.',
            ]);
        }

        $cart[$product->id] = $newQuantity;
        $request->session()->put('toko_cart', $cart);

        return redirect()->route('nasabah.toko')->with('status', 'Produk ditambahkan ke keranjang.');
    }

    public function removeFromCart(Request $request, int $product): RedirectResponse
    {
        $cart = $request->session()->get('toko_cart', []);
        unset($cart[$product]);
        $request->session()->put('toko_cart', $cart);

        return redirect()->route('nasabah.toko')->with('status', 'Produk dihapus dari keranjang.');
    }

    public function checkout(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'payment_method' => ['required', 'in:tunai,qris'],
            'pickup_note' => ['nullable', 'string', 'max:500'],
        ]);

        $cart = $request->session()->get('toko_cart', []);
        if ($cart === []) {
            throw ValidationException::withMessages([
                'cart' => 'Keranjang masih kosong.',
            ]);
        }

        DB::transaction(function () use ($cart, $validated): void {
            $products = DB::table('toko_products')
                ->whereIn('id', array_keys($cart))
                ->where('is_active', true)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            if ($products->count() !== count($cart)) {
                throw ValidationException::withMessages([
                    'cart' => 'Ada produk yang sudah tidak tersedia. Perbarui keranjang dan coba lagi.',
                ]);
            }

            $total = 0;
            foreach ($cart as $productId => $quantity) {
                $product = $products->get($productId);
                if (! $product || $quantity > $product->stock) {
                    throw ValidationException::withMessages([
                        'cart' => 'Stok produk berubah dan tidak mencukupi. Perbarui keranjang.',
                    ]);
                }
                $total += (int) $quantity * (float) $product->price;
            }

            $now = now();
            $orderId = DB::table('toko_orders')->insertGetId([
                'user_id' => Auth::id(),
                'order_number' => 'TOKO-'.now()->format('Ymd').'-'.Str::upper(Str::random(6)),
                'status' => 'Menunggu Konfirmasi',
                'payment_method' => $validated['payment_method'],
                'pickup_note' => $validated['pickup_note'] ?? null,
                'total' => $total,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            foreach ($cart as $productId => $quantity) {
                $product = $products->get($productId);
                $lineTotal = (int) $quantity * (float) $product->price;

                DB::table('toko_order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $quantity,
                    'unit' => $product->unit,
                    'unit_price' => $product->price,
                    'line_total' => $lineTotal,
                ]);

                DB::table('toko_products')
                    ->where('id', $product->id)
                    ->decrement('stock', $quantity);
            }
        });

        $request->session()->forget('toko_cart');

        return redirect()
            ->route('nasabah.toko')
            ->with('status', 'Pesanan berhasil dicatat dan menunggu konfirmasi koperasi.');
    }
}
