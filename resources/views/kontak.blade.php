<x-layouts.public title="Kontak">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">
            Pusat Bantuan
        </span>
        <h1 class="text-3xl sm:text-4xl font-bold text-[#0c1e40] tracking-tight">
            Hubungi Pengurus Koperasi
        </h1>
        <p class="text-sm sm:text-base text-[#5c6b84] mt-3 leading-relaxed">
            Punya pertanyaan mengenai simpanan, pengajuan pinjaman, atau keanggotaan? Kami siap melayani Anda.
        </p>
    </div>

    <!-- 2 Column: Info Card & Form Card -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-14">
        <!-- Info Kontak (Left 5 cols) -->
        <div class="lg:col-span-5 space-y-4">
            <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0 space-y-6">
                <h2 class="text-lg font-bold text-[#0c1e40] pb-3 border-b border-slate-100">
                    Informasi Kantor
                </h2>

                <div class="flex items-start gap-3.5 text-sm">
                    <div class="w-9 h-9 rounded-lg bg-blue-50 text-[#1d5ec9] flex items-center justify-center shrink-0">
                        <x-lucide name="building-2" class="w-4 h-4 text-[#1d5ec9]" />
                    </div>
                    <div>
                        <div class="font-semibold text-[#0c1e40]">Lokasi Koperasi</div>
                        <div class="text-[#5c6b84] text-xs sm:text-sm mt-0.5 leading-relaxed">
                            Gedung Koperasi Sekolah, Lantai 1<br>
                            Jl. Pendidikan No. 10, Jakarta Selatan
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 text-sm">
                    <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                        <x-lucide name="credit-card" class="w-4 h-4 text-emerald-600" />
                    </div>
                    <div>
                        <div class="font-semibold text-[#0c1e40]">Jam Layanan Kasir</div>
                        <div class="text-[#5c6b84] text-xs sm:text-sm mt-0.5 leading-relaxed">
                            Senin - Jumat: 08.00 - 15.00 WIB<br>
                            Sabtu & Minggu: Libur
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 text-sm">
                    <div class="w-9 h-9 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                        <x-lucide name="receipt-text" class="w-4 h-4 text-purple-600" />
                    </div>
                    <div>
                        <div class="font-semibold text-[#0c1e40]">WhatsApp & Telepon</div>
                        <div class="text-[#5c6b84] text-xs sm:text-sm mt-0.5">
                            +62 812-3456-7890
                        </div>
                    </div>
                </div>

                <div class="flex items-start gap-3.5 text-sm">
                    <div class="w-9 h-9 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                        <x-lucide name="users" class="w-4 h-4 text-amber-600" />
                    </div>
                    <div>
                        <div class="font-semibold text-[#0c1e40]">Email Resmi</div>
                        <div class="text-[#5c6b84] text-xs sm:text-sm mt-0.5">
                            kontak@koperasi-sekolah.sch.id
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Pesan (Right 7 cols) -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
                <h2 class="text-lg font-bold text-[#0c1e40] mb-2">Kirim Pesan / Pengaduan</h2>
                <p class="text-xs sm:text-sm text-[#5c6b84] mb-6">Silakan tuliskan pesan Anda, pengurus kami akan membalas secepatnya.</p>

                <form onsubmit="event.preventDefault(); alert('Terima kasih! Pesan Anda telah terkirim kepada pengurus.');" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-[#475569] mb-1.5">Nama Lengkap</label>
                            <input
                                type="text"
                                placeholder="Masukkan nama Anda"
                                required
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d5ec9] bg-slate-50/50 focus:bg-white transition"
                            />
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-[#475569] mb-1.5">NIS / Nomor Anggota</label>
                            <input
                                type="text"
                                placeholder="Nomor anggota (opsional)"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d5ec9] bg-slate-50/50 focus:bg-white transition"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-[#475569] mb-1.5">Subjek</label>
                        <input
                            type="text"
                            placeholder="Contoh: Pertanyaan seputar pencairan pinjaman"
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d5ec9] bg-slate-50/50 focus:bg-white transition"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-[#475569] mb-1.5">Isi Pesan</label>
                        <textarea
                            rows="4"
                            placeholder="Tuliskan pertanyaan atau kebutuhan Anda secara jelas..."
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d5ec9] bg-slate-50/50 focus:bg-white transition"
                        ></textarea>
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="bg-[#1d5ec9] hover:bg-[#154cb0] text-white px-7 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition"
                        >
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.public>
