<x-layouts.nasabah title="Simpanan Nasabah">
    <!-- Header Halaman (1:1 with 04_halaman_simpanan_nasabah) -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Simpanan</h1>
    </div>

    <!-- Total Simpanan Card -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <x-lucide name="wallet" class="w-6 h-6 text-blue-600" />
            </div>
            <div>
                <span class="text-xs font-medium text-[#64748b]">Total Simpanan</span>
                <div class="text-2xl font-bold text-[#0f2942] mt-0.5">Rp 2.500.000</div>
            </div>
        </div>

        <div>
            <button type="button" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white px-5 py-2.5 rounded-lg text-sm font-semibold shadow-sm transition flex items-center gap-2">
                <x-lucide name="plus" class="w-4 h-4" />
                <span>Setor Simpanan</span>
            </button>
        </div>
    </div>

    <!-- Riwayat Simpanan Card (1:1 with 04_halaman_simpanan_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6">
        <h2 class="text-base font-bold text-[#0f172a] mb-4">Riwayat Simpanan</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-slate-400 text-xs uppercase tracking-wider border-b border-slate-100">
                        <th class="py-3 font-semibold">Tanggal</th>
                        <th class="py-3 font-semibold">Jenis</th>
                        <th class="py-3 font-semibold">Jumlah</th>
                        <th class="py-3 font-semibold">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">12-08-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-emerald-600">+Rp 500.000</td>
                        <td>Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">05-08-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-emerald-600">+Rp 300.000</td>
                        <td>Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">28-07-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-emerald-600">+Rp 400.000</td>
                        <td>Setoran</td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5">20-07-2025</td>
                        <td>Simpanan</td>
                        <td class="font-medium text-rose-500">-Rp 200.000</td>
                        <td>Penarikan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
