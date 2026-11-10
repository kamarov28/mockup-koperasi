<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $members = $this->membersQuery();
        $totalSavings = DB::table('simpanan')->selectRaw(
            "COALESCE(SUM(CASE WHEN LOWER(COALESCE(keterangan, '')) LIKE '%penarikan%' THEN -jumlah ELSE jumlah END), 0) as total"
        )->value('total');

        $activeLoans = DB::table('pinjaman')
            ->whereIn(DB::raw('LOWER(status)'), ['disetujui', 'aktif', 'dicairkan', 'approved', 'disbursed'])
            ->sum('jumlah_pinjaman');

        return view('admin.dashboard', [
            'memberCount' => $members->count(),
            'totalSavings' => (float) $totalSavings,
            'activeLoans' => (float) $activeLoans,
            'pendingLoans' => DB::table('pinjaman')
                ->whereIn(DB::raw('LOWER(status)'), ['menunggu verifikasi', 'menunggu persetujuan'])
                ->count(),
            'pendingOrders' => DB::table('toko_orders')->where('status', 'Menunggu Konfirmasi')->count(),
            'recentTransactions' => DB::table('transaksi')
                ->leftJoin('users', 'users.id', '=', 'transaksi.user_id')
                ->select('transaksi.*', 'users.name as member_name')
                ->orderByDesc('transaksi.tanggal')
                ->orderByDesc('transaksi.created_at')
                ->limit(8)
                ->get(),
        ]);
    }

    public function members(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);
        $query = $this->membersQuery();

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';
            $query->where(function ($builder) use ($search): void {
                $builder->whereRaw('LOWER(name) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(email) LIKE ?', [$search]);

                if (Schema::hasColumn('users', 'no_anggota')) {
                    $builder->orWhereRaw('LOWER(COALESCE(no_anggota, \'\')) LIKE ?', [$search]);
                }
            });
        }

        return view('admin.nasabah', [
            'members' => $query->orderBy('name')->paginate(15)->withQueryString(),
            'search' => $filters['q'] ?? '',
        ]);
    }

    public function savings(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);
        $withdrawal = "LOWER(COALESCE(simpanan.keterangan, '')) LIKE '%penarikan%'";
        $amount = "CASE WHEN {$withdrawal} THEN -simpanan.jumlah ELSE simpanan.jumlah END";
        $query = $this->membersQuery()
            ->leftJoin('simpanan', 'simpanan.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', 'users.email')
            ->selectRaw("COALESCE(SUM(CASE WHEN LOWER(simpanan.jenis) LIKE '%pokok%' THEN {$amount} ELSE 0 END), 0) as total_pokok")
            ->selectRaw("COALESCE(SUM(CASE WHEN LOWER(simpanan.jenis) LIKE '%wajib%' THEN {$amount} ELSE 0 END), 0) as total_wajib")
            ->selectRaw("COALESCE(SUM(CASE WHEN LOWER(simpanan.jenis) LIKE '%sukarela%' THEN {$amount} ELSE 0 END), 0) as total_sukarela")
            ->selectRaw("COALESCE(SUM({$amount}), 0) as total_saldo")
            ->groupBy('users.id', 'users.name', 'users.email');

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';
            $query->where(function ($builder) use ($search): void {
                $builder->whereRaw('LOWER(users.name) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(users.email) LIKE ?', [$search]);
            });
        }

        $transactions = DB::table('simpanan')
            ->join('users', 'users.id', '=', 'simpanan.user_id')
            ->select('simpanan.*', 'users.name as member_name')
            ->orderByDesc('simpanan.tanggal')
            ->orderByDesc('simpanan.created_at')
            ->limit(20)
            ->get();

        return view('admin.simpanan', [
            'members' => $query->orderBy('users.name')->paginate(15)->withQueryString(),
            'memberOptions' => $this->membersQuery()->orderBy('name')->get(['id', 'name', 'email']),
            'transactions' => $transactions,
            'search' => $filters['q'] ?? '',
            'totalSavings' => (float) DB::table('simpanan')->selectRaw("COALESCE(SUM({$amount}), 0) as total")->value('total'),
        ]);
    }

    public function recordSavings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'direction' => ['required', 'in:setor,tarik'],
            'jenis' => ['required', 'in:Pokok,Wajib,Sukarela'],
            'jumlah' => ['required', 'integer', 'min:1', 'max:999999999999999'],
            'keterangan' => ['nullable', 'string', 'max:500'],
        ]);
        if (! $this->membersQuery()->where('id', $validated['user_id'])->exists()) {
            throw ValidationException::withMessages([
                'user_id' => 'Pilih akun nasabah yang valid.',
            ]);
        }

        if ($validated['direction'] === 'tarik' && $validated['jenis'] !== 'Sukarela') {
            throw ValidationException::withMessages([
                'jenis' => 'Penarikan hanya dapat dicatat dari simpanan sukarela.',
            ]);
        }

        DB::transaction(function () use ($validated): void {
            DB::table('users')->where('id', $validated['user_id'])->lockForUpdate()->first();

            if ($validated['direction'] === 'tarik') {
                $balance = DB::table('simpanan')
                    ->where('user_id', $validated['user_id'])
                    ->whereRaw("LOWER(jenis) LIKE '%sukarela%'")
                    ->selectRaw("COALESCE(SUM(CASE WHEN LOWER(COALESCE(keterangan, '')) LIKE '%penarikan%' THEN -jumlah ELSE jumlah END), 0) as total")
                    ->value('total');

                if ((float) $balance < $validated['jumlah']) {
                    throw ValidationException::withMessages([
                        'jumlah' => 'Saldo simpanan sukarela tidak mencukupi.',
                    ]);
                }
            }

            $now = now();
            $note = trim((string) ($validated['keterangan'] ?? ''));
            if ($validated['direction'] === 'tarik') {
                $note = 'Penarikan'.($note === '' ? '' : ': '.$note);
            } elseif ($note === '') {
                $note = 'Setoran simpanan '.$validated['jenis'];
            }

            DB::table('simpanan')->insert(array_merge([
                'user_id' => $validated['user_id'],
                'jenis' => $validated['jenis'],
                'jumlah' => $validated['jumlah'],
                'keterangan' => $note,
                'tanggal' => $now->toDateString(),
            ], $this->timestampsFor('simpanan', $now)));

            DB::table('transaksi')->insert(array_merge([
                'user_id' => $validated['user_id'],
                'jenis' => $validated['direction'] === 'tarik' ? 'penarikan' : 'simpanan',
                'jumlah' => $validated['jumlah'],
                'keterangan' => $note,
                'tanggal' => $now->toDateString(),
            ], $this->timestampsFor('transaksi', $now)));
        });

        return redirect()->route('admin.simpanan')->with('status', 'Transaksi simpanan berhasil dicatat.');
    }

    public function loans(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);
        $query = DB::table('pinjaman')
            ->join('users', 'users.id', '=', 'pinjaman.user_id')
            ->select('pinjaman.*', 'users.name as member_name', 'users.email as member_email');

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';
            $query->where(function ($builder) use ($search): void {
                $builder->whereRaw('LOWER(users.name) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(users.email) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(COALESCE(pinjaman.keperluan, \'\')) LIKE ?', [$search]);
            });
        }

        if (! empty($filters['status'])) {
            $query->whereRaw('LOWER(pinjaman.status) = ?', [mb_strtolower($filters['status'])]);
        }

        return view('admin.pinjaman', [
            'loans' => $query->orderByDesc('pinjaman.created_at')->paginate(15)->withQueryString(),
            'search' => $filters['q'] ?? '',
            'status' => $filters['status'] ?? '',
        ]);
    }

    public function decideLoan(Request $request, int $loan, string $decision): RedirectResponse
    {
        abort_unless(in_array($decision, ['approve', 'reject'], true), 404);
        $validated = $request->validate([
            'catatan' => ['nullable', 'string', 'max:500'],
        ]);

        DB::transaction(function () use ($loan, $decision): void {
            $record = DB::table('pinjaman')->where('id', $loan)->lockForUpdate()->first();
            abort_if(! $record, 404);

            if (! in_array(mb_strtolower(trim((string) $record->status)), ['menunggu verifikasi', 'menunggu persetujuan'], true)) {
                throw ValidationException::withMessages([
                    'status' => 'Pengajuan ini sudah diproses sebelumnya.',
                ]);
            }

            $now = now();
            $update = [
                'status' => $decision === 'approve' ? 'Disetujui' : 'Ditolak',
            ];
            if (Schema::hasColumn('pinjaman', 'updated_at')) {
                $update['updated_at'] = $now;
            }
            if ($decision === 'approve') {
                $rate = (float) (DB::table('koperasi_settings')->where('key', 'interest_rate')->value('value') ?? 1);
                $principal = (float) $record->jumlah_pinjaman;
                $tenor = max(1, (int) $record->jangka_waktu);
                $update['angsuran_per_bulan'] = round(($principal / $tenor) + ($principal * $rate / 100), 2);
            }

            DB::table('pinjaman')->where('id', $loan)->update($update);
        });

        return redirect()->route('admin.pinjaman')->with(
            'status',
            $decision === 'approve'
                ? 'Pengajuan disetujui. Persetujuan ini belum mencatat pencairan dana.'
                : 'Pengajuan pinjaman ditolak.'
        );
    }

    public function transactions(Request $request): View
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'jenis' => ['nullable', 'in:simpanan,penarikan,pinjaman,angsuran,toko'],
        ]);
        $query = DB::table('transaksi')
            ->leftJoin('users', 'users.id', '=', 'transaksi.user_id')
            ->select('transaksi.*', 'users.name as member_name');

        if (! empty($filters['q'])) {
            $search = '%'.mb_strtolower($filters['q']).'%';
            $query->where(function ($builder) use ($search): void {
                $builder->whereRaw('LOWER(COALESCE(users.name, \'\')) LIKE ?', [$search])
                    ->orWhereRaw('LOWER(COALESCE(transaksi.keterangan, \'\')) LIKE ?', [$search]);
            });
        }

        if (! empty($filters['jenis'])) {
            $query->whereRaw('LOWER(TRIM(transaksi.jenis)) = ?', [$filters['jenis']]);
        }

        $orders = DB::table('toko_orders')
            ->join('users', 'users.id', '=', 'toko_orders.user_id')
            ->select('toko_orders.*', 'users.name as member_name')
            ->orderByDesc('toko_orders.created_at')
            ->paginate(10, ['*'], 'orders_page')
            ->withQueryString();

        return view('admin.transaksi', [
            'transactions' => $query->orderByDesc('transaksi.tanggal')->orderByDesc('transaksi.created_at')
                ->paginate(15)->withQueryString(),
            'orders' => $orders,
            'search' => $filters['q'] ?? '',
            'jenis' => $filters['jenis'] ?? '',
        ]);
    }

    public function updateOrder(Request $request, int $order, string $decision): RedirectResponse
    {
        abort_unless(in_array($decision, ['complete', 'reject'], true), 404);

        DB::transaction(function () use ($order, $decision): void {
            $record = DB::table('toko_orders')->where('id', $order)->lockForUpdate()->first();
            abort_if(! $record, 404);

            if ($record->status !== 'Menunggu Konfirmasi') {
                throw ValidationException::withMessages([
                    'status' => 'Pesanan ini sudah diproses sebelumnya.',
                ]);
            }

            $now = now();
            if ($decision === 'complete') {
                DB::table('transaksi')->insert(array_merge([
                    'user_id' => $record->user_id,
                    'jenis' => 'toko',
                    'jumlah' => $record->total,
                    'keterangan' => 'Pembayaran pesanan toko #'.$record->order_number.' ('.Str::upper($record->payment_method).')',
                    'tanggal' => $now->toDateString(),
                ], $this->timestampsFor('transaksi', $now)));
            } else {
                $items = DB::table('toko_order_items')->where('order_id', $order)->get();
                foreach ($items as $item) {
                    if ($item->product_id !== null) {
                        DB::table('toko_products')->where('id', $item->product_id)->increment('stock', $item->quantity);
                    }
                }
            }

            DB::table('toko_orders')->where('id', $order)->update([
                'status' => $decision === 'complete' ? 'Selesai' : 'Ditolak',
                'updated_at' => $now,
            ]);
        });

        return redirect()->route('admin.transaksi')->with(
            'status',
            $decision === 'complete'
                ? 'Pembayaran dikonfirmasi dan dicatat sebagai transaksi.'
                : 'Pesanan ditolak dan stok produk dikembalikan.'
        );
    }

    public function reports(Request $request): View
    {
        $filters = $request->validate([
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);
        $from = $filters['from'] ?? now()->startOfMonth()->toDateString();
        $to = $filters['to'] ?? now()->toDateString();
        $dateRange = static fn (Builder $query, string $column): Builder => $query
            ->whereDate($column, '>=', $from)
            ->whereDate($column, '<=', $to);
        $withdrawal = "LOWER(COALESCE(keterangan, '')) LIKE '%penarikan%'";

        $savings = $dateRange(DB::table('simpanan'), 'tanggal')
            ->selectRaw("COALESCE(SUM(CASE WHEN {$withdrawal} THEN -jumlah ELSE jumlah END), 0) as total")
            ->value('total');
        $loanApplications = $dateRange(
            DB::table('pinjaman')->whereIn(DB::raw('LOWER(status)'), ['disetujui', 'aktif', 'dicairkan', 'approved', 'disbursed']),
            'created_at'
        )->sum('jumlah_pinjaman');
        $shopRevenue = $dateRange(
            DB::table('toko_orders')->where('status', 'Selesai'),
            'updated_at'
        )->sum('total');

        $ledger = $dateRange(
            DB::table('transaksi')->leftJoin('users', 'users.id', '=', 'transaksi.user_id')
                ->select('transaksi.*', 'users.name as member_name'),
            'transaksi.tanggal'
        )->orderByDesc('transaksi.tanggal')->paginate(20)->withQueryString();

        return view('admin.laporan', [
            'from' => $from,
            'to' => $to,
            'savings' => (float) $savings,
            'loanApplications' => (float) $loanApplications,
            'shopRevenue' => (float) $shopRevenue,
            'ledger' => $ledger,
        ]);
    }

    public function settings(): View
    {
        $defaults = [
            'cooperative_name' => 'Koperasi Bina Bangkit Mandiri',
            'legal_number' => '',
            'contact' => '',
            'address' => '',
            'principal_savings' => '0',
            'monthly_savings' => '0',
            'interest_rate' => '1',
            'max_tenor' => '24',
        ];
        $saved = DB::table('koperasi_settings')->pluck('value', 'key')->all();

        return view('admin.pengaturan', ['settings' => array_merge($defaults, $saved)]);
    }

    public function saveSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cooperative_name' => ['required', 'string', 'max:150'],
            'legal_number' => ['nullable', 'string', 'max:100'],
            'contact' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'principal_savings' => ['required', 'integer', 'min:0', 'max:999999999999999'],
            'monthly_savings' => ['required', 'integer', 'min:0', 'max:999999999999999'],
            'interest_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'max_tenor' => ['required', 'in:3,6,12,24'],
        ]);

        $now = now();
        foreach ($validated as $key => $value) {
            DB::table('koperasi_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => (string) ($value ?? ''), 'updated_at' => $now, 'created_at' => $now]
            );
        }

        return redirect()->route('admin.pengaturan')->with('status', 'Pengaturan koperasi berhasil disimpan.');
    }

    private function membersQuery(): Builder
    {
        return DB::table('users')
            ->when(Schema::hasColumn('users', 'role'), fn ($query) => $query->whereRaw("LOWER(COALESCE(role, 'nasabah')) <> 'admin'"));
    }

    /**
     * @return array<string, mixed>
     */
    private function timestampsFor(string $table, mixed $timestamp): array
    {
        $columns = [];

        foreach (['created_at', 'updated_at'] as $column) {
            if (Schema::hasColumn($table, $column)) {
                $columns[$column] = $timestamp;
            }
        }

        return $columns;
    }
}
