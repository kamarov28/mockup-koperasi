<x-layouts.nasabah title="Pinjaman Saya">
    <!-- Header Halaman (1:1 with 06_pinjaman_nasabah) -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#0f2942]">Pinjaman Saya</h1>
        <a href="{{ route('nasabah.pinjaman.pengajuan') }}" class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-lg shadow-sm transition">
            + Pengajuan Baru
        </a>
    </div>

    <!-- Status Pinjaman Card (1:1 with 06_pinjaman_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 mb-8 max-w-2xl">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
            <span class="font-bold text-sm text-[#0f2942]">Status Pinjaman</span>
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                Disetujui
            </span>
        </div>

        <div class="space-y-3.5 text-sm">
            <div class="flex justify-between items-center">
                <span class="text-[#64748b]">Jumlah Pinjaman</span>
                <span class="font-semibold text-[#0f2942]">Rp 5.000.000</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[#64748b]">Jangka Waktu</span>
                <span class="font-semibold text-[#0f2942]">6 bulan</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[#64748b]">Angsuran per Bulan</span>
                <span class="font-semibold text-[#0f2942]">Rp 900.000</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[#64748b]">Tanggal Pencairan</span>
                <span class="font-semibold text-[#0f2942]">10-08-2025</span>
            </div>
        </div>
    </div>

    <!-- Riwayat Pinjaman Section (1:1 with 06_pinjaman_nasabah) -->
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.03)] p-6 max-w-2xl">
        <h2 class="text-base font-bold text-[#0f2942] mb-4">Riwayat Pinjaman</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-[#f0f5fa] text-[#334155] text-xs">
                        <th class="py-3 px-4 rounded-l-lg font-bold">Tanggal</th>
                        <th class="py-3 px-4 font-bold">Jumlah</th>
                        <th class="py-3 px-4 rounded-r-lg font-bold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-[#334155]">
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4">10-08-2025</td>
                        <td class="px-4 font-medium">Rp 5.000.000</td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#dcfce7] text-[#15803d]">
                                Disetujui
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="py-3.5 px-4">22-06-2025</td>
                        <td class="px-4 font-medium">Rp 3.000.000</td>
                        <td class="px-4">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#e0f2fe] text-[#0284c7]">
                                Lunas
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.nasabah>
