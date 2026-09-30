<x-layouts.public title="Tentang Kami">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="inline-block px-3.5 py-1 rounded-full text-xs font-semibold bg-[#e8f1fc] text-[#1d5ec9] mb-3">
            Profil & Visi Koperasi
        </span>
        <h1 class="text-3xl sm:text-4xl font-bold text-[#0c1e40] tracking-tight">
            Tentang Koperasi Sekolah
        </h1>
        <p class="text-sm sm:text-base text-[#5c6b84] mt-3 leading-relaxed">
            Membangun kemandirian ekonomi anggota dan civitas sekolah melalui layanan simpan pinjam yang profesional, transparan, dan berasaskan kekeluargaan.
        </p>
    </div>

    <!-- 2 Column Overview Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <!-- Visi -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1d5ec9] flex items-center justify-center mb-4">
                <x-lucide name="chart-column" class="w-5 h-5 text-[#1d5ec9]" />
            </div>
            <h2 class="text-lg font-bold text-[#0c1e40] mb-2">Visi Kami</h2>
            <p class="text-sm text-[#5c6b84] leading-relaxed">
                Menjadi koperasi sekolah percontohan yang modern, terpercaya, dan unggul dalam menyejahterakan seluruh anggota melalui pengelolaan keuangan berbasis teknologi digital yang transparan dan akuntabel.
            </p>
        </div>

        <!-- Misi -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                <x-lucide name="shield-check" class="w-5 h-5 text-emerald-600" />
            </div>
            <h2 class="text-lg font-bold text-[#0c1e40] mb-2">Misi Utama</h2>
            <ul class="text-sm text-[#5c6b84] space-y-2 leading-relaxed">
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold">✓</span>
                    <span>Menyediakan produk simpanan yang aman dengan imbal hasil yang adil.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold">✓</span>
                    <span>Menyalurkan fasilitas pinjaman yang cepat, mudah, dan berbunga ringan.</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-emerald-500 font-bold">✓</span>
                    <span>Mendorong literasi dan kemandirian finansial bagi seluruh anggota sekolah.</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- 4 Core Values -->
    <div class="mb-14">
        <h2 class="text-xl font-bold text-[#0c1e40] text-center mb-6">Nilai-Nilai Dasar</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white rounded-xl p-5 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
                <div class="w-10 h-10 rounded-full bg-[#dff3e8] text-[#15803d] flex items-center justify-center mx-auto mb-3">
                    <x-lucide name="users" class="w-5 h-5 text-[#15803d]" />
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Kekeluargaan</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Dari anggota, oleh anggota, dan untuk kesejahteraan anggota bersama.</p>
            </div>

            <div class="bg-white rounded-xl p-5 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
                <div class="w-10 h-10 rounded-full bg-[#e8f1fc] text-[#1d5ec9] flex items-center justify-center mx-auto mb-3">
                    <x-lucide name="receipt-text" class="w-5 h-5 text-[#1d5ec9]" />
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Transparan</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Setiap mutasi simpanan dan pinjaman dapat dipantau langsung kapan saja.</p>
            </div>

            <div class="bg-white rounded-xl p-5 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
                <div class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mx-auto mb-3">
                    <x-lucide name="shield-check" class="w-5 h-5 text-purple-600" />
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Amanah</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Dana anggota dikelola secara profesional sesuai regulasi dan badan hukum.</p>
            </div>

            <div class="bg-white rounded-xl p-5 text-center shadow-[0_4px_16px_rgba(0,0,0,0.03)] border-0">
                <div class="w-10 h-10 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center mx-auto mb-3">
                    <x-lucide name="hand-coins" class="w-5 h-5 text-amber-600" />
                </div>
                <h3 class="font-bold text-sm text-[#0c1e40] mb-1">Solutif</h3>
                <p class="text-xs text-[#5c6b84] leading-relaxed">Membantu kebutuhan modal usaha dan keperluan mendesak anggota.</p>
            </div>
        </div>
    </div>
</x-layouts.public>
