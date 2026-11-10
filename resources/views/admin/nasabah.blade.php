<x-layouts.admin title="Data Nasabah">
    <h1 class="mb-1 text-2xl font-bold text-slate-900">Data Nasabah</h1>
    <p class="mb-6 text-sm text-slate-500">Daftar akun nasabah yang terdaftar.</p>

    <form method="GET" class="mb-5 flex gap-2">
        <input name="q" value="{{ $search }}" type="search" placeholder="Cari nama, email, atau nomor anggota" class="w-full max-w-lg rounded-lg border border-slate-300 px-3 py-2 text-sm">
        <button class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white">Cari</button>
    </form>

    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                <tr><th class="p-3">No. Anggota</th><th class="p-3">Nama</th><th class="p-3">Email</th><th class="p-3">Telepon</th><th class="p-3">Status Verifikasi</th><th class="p-3">Terdaftar</th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($members as $member)
                    <tr>
                        <td class="p-3">{{ data_get($member, 'no_anggota') ?: '-' }}</td>
                        <td class="p-3 font-medium">{{ $member->name }}</td>
                        <td class="p-3">{{ $member->email }}</td>
                        <td class="p-3">{{ data_get($member, 'no_telepon') ?: '-' }}</td>
                        <td class="p-3">{{ $member->email_verified_at ? 'Terverifikasi' : 'Belum verifikasi' }}</td>
                        <td class="p-3">{{ $member->created_at }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-6 text-center text-slate-500">Nasabah tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $members->links() }}</div>
</x-layouts.admin>
