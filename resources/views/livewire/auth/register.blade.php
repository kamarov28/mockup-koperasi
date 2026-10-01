<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - Koperasi Simpan Pinjam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#edf3fc] min-h-screen flex items-center justify-center p-4 sm:p-6 font-sans text-[#0c284d]">
    <!-- 1:1 Floating Split Card matching 01_halaman_login design system -->
    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-[0_10px_30px_rgba(12,40,77,0.08)] overflow-hidden grid grid-cols-1 md:grid-cols-2 border border-slate-100">
        <!-- Left Side: Registration Form -->
        <div class="p-8 sm:p-10 lg:p-12 flex flex-col justify-between">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#1d68bd] mb-6 hover:underline">
                    &larr; Kembali ke Beranda
                </a>

                <h1 class="text-2xl sm:text-[28px] font-bold text-[#0c284d] leading-snug">
                    Daftar Anggota<br>
                    <span class="text-[#1d68bd]">Koperasi Simpan Pinjam</span>
                </h1>
                <p class="text-xs sm:text-sm text-[#5c6b84] mt-2 mb-6 leading-relaxed">
                    Bergabung bersama kami untuk kemudahan simpanan dan pinjaman sekolah.
                </p>

                <!-- Session / Error Status -->
                @if (session('status'))
                    <div class="mb-4 text-xs font-medium text-emerald-600 bg-emerald-50 p-3 rounded-lg border border-emerald-200">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-4 text-xs font-medium text-rose-600 bg-rose-50 p-3 rounded-lg border border-rose-200">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-3.5">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400">
                                <x-lucide name="user" class="w-4 h-4 text-slate-400" />
                            </span>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="Nama Lengkap"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d68bd] focus:bg-white transition"
                            />
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400">
                                <x-lucide name="mail" class="w-4 h-4 text-slate-400" />
                            </span>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="Alamat Email"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d68bd] focus:bg-white transition"
                            />
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400">
                                <x-lucide name="lock" class="w-4 h-4 text-slate-400" />
                            </span>
                            <input
                                type="password"
                                name="password"
                                required
                                placeholder="Kata Sandi"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d68bd] focus:bg-white transition"
                            />
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-slate-400">
                                <x-lucide name="lock" class="w-4 h-4 text-slate-400" />
                            </span>
                            <input
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Konfirmasi Kata Sandi"
                                class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50/50 text-sm focus:outline-none focus:ring-2 focus:ring-[#1d68bd] focus:bg-white transition"
                            />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#1d68bd] hover:bg-[#15549a] text-white py-3 rounded-lg font-semibold text-sm shadow-sm transition mt-3">
                        Daftar Sekarang
                    </button>
                </form>
            </div>

            <!-- Bottom Login Link -->
            <div class="text-xs text-center text-[#5c6b84] mt-6 pt-4 border-t border-slate-100">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-[#1d68bd] font-semibold hover:underline">Masuk di sini</a>
            </div>
        </div>

        <!-- Right Side: Illustrated Cooperative Building Panel (1:1 with 01_halaman_login) -->
        <div class="bg-[#cfe4fc] hidden md:flex flex-col items-center justify-center p-8 relative overflow-hidden">
            <!-- Decorative clouds -->
            <div class="absolute top-8 left-8 opacity-75">
                <svg width="60" height="32" viewBox="0 0 60 32" fill="#ffffff">
                    <circle cx="20" cy="18" r="12" />
                    <circle cx="36" cy="14" r="14" />
                    <circle cx="48" cy="18" r="10" />
                    <rect x="16" y="16" width="36" height="14" rx="7" />
                </svg>
            </div>
            <div class="absolute top-14 right-10 opacity-75">
                <svg width="45" height="24" viewBox="0 0 60 32" fill="#ffffff">
                    <circle cx="20" cy="18" r="12" />
                    <circle cx="36" cy="14" r="14" />
                    <circle cx="48" cy="18" r="10" />
                    <rect x="16" y="16" width="36" height="14" rx="7" />
                </svg>
            </div>

            <!-- Cooperative Building & Gold Coins Illustration SVG -->
            <svg viewBox="0 0 400 360" class="w-full max-w-[340px] drop-shadow-sm" xmlns="http://www.w3.org/2000/svg">
                <!-- Ground base -->
                <ellipse cx="200" cy="315" rx="170" ry="25" fill="#b9d7fa" opacity="0.6" />

                <!-- Green Potted Plants Left -->
                <g transform="translate(60, 240)">
                    <path d="M15 45 L35 45 L32 65 L18 65 Z" fill="#94a3b8" />
                    <circle cx="25" cy="30" r="16" fill="#22c55e" />
                    <circle cx="16" cy="22" r="12" fill="#16a34a" />
                    <circle cx="34" cy="22" r="12" fill="#4ade80" />
                </g>

                <!-- Classic Bank/Cooperative Building -->
                <g id="building">
                    <!-- Base steps -->
                    <rect x="90" y="270" width="220" height="12" rx="3" fill="#ffffff" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="100" y="260" width="200" height="10" rx="2" fill="#f8fafc" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="110" y="250" width="180" height="10" rx="2" fill="#ffffff" stroke="#94a3b8" stroke-width="1.5" />

                    <!-- Building Body Wall -->
                    <rect x="120" y="150" width="160" height="100" fill="#ffffff" stroke="#94a3b8" stroke-width="1.5" />

                    <!-- Roman Pillars -->
                    <!-- Pillar 1 -->
                    <rect x="135" y="150" width="16" height="100" fill="#f1f5f9" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="132" y="146" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <rect x="132" y="248" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <!-- Pillar 2 -->
                    <rect x="175" y="150" width="16" height="100" fill="#f1f5f9" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="172" y="146" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <rect x="172" y="248" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <!-- Pillar 3 -->
                    <rect x="210" y="150" width="16" height="100" fill="#f1f5f9" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="207" y="146" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <rect x="207" y="248" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <!-- Pillar 4 -->
                    <rect x="250" y="150" width="16" height="100" fill="#f1f5f9" stroke="#94a3b8" stroke-width="1.5" />
                    <rect x="247" y="146" width="22" height="6" rx="2" fill="#e2e8f0" />
                    <rect x="247" y="248" width="22" height="6" rx="2" fill="#e2e8f0" />

                    <!-- Main Entrance Door -->
                    <path d="M185 250 L185 190 Q200 178, 215 190 L215 250 Z" fill="#1d68bd" />
                    <circle cx="209" cy="220" r="2.5" fill="#fef08a" />

                    <!-- Entablature / Architrave beam -->
                    <rect x="110" y="136" width="180" height="14" rx="2" fill="#ffffff" stroke="#94a3b8" stroke-width="1.5" />

                    <!-- Triangular Pediment (Roof) -->
                    <polygon points="200,75 100,136 300,136" fill="#1d68bd" stroke="#0c284d" stroke-width="2" />
                    <polygon points="200,88 116,134 284,134" fill="#ffffff" />
                    <!-- Emblem inside pediment -->
                    <circle cx="200" cy="116" r="11" fill="#fef3c7" stroke="#f59e0b" stroke-width="1.5" />
                    <text x="200" y="120" font-family="system-ui, sans-serif" font-size="11" font-weight="bold" fill="#b45309" text-anchor="middle">K</text>
                </g>

                <!-- Stack of Gold Coins Right -->
                <g id="coins" transform="translate(285, 230)" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.1))">
                    <!-- Coin Stack 1 -->
                    <ellipse cx="25" cy="50" rx="18" ry="7" fill="#f59e0b" />
                    <rect x="7" y="44" width="36" height="6" fill="#f59e0b" />
                    <ellipse cx="25" cy="44" rx="18" ry="7" fill="#fbbf24" stroke="#fef3c7" stroke-width="1" />

                    <ellipse cx="25" cy="38" rx="18" ry="7" fill="#f59e0b" />
                    <rect x="7" y="32" width="36" height="6" fill="#f59e0b" />
                    <ellipse cx="25" cy="32" rx="18" ry="7" fill="#fbbf24" stroke="#fef3c7" stroke-width="1" />

                    <ellipse cx="25" cy="26" rx="18" ry="7" fill="#f59e0b" />
                    <rect x="7" y="20" width="36" height="6" fill="#f59e0b" />
                    <ellipse cx="25" cy="20" rx="18" ry="7" fill="#fbbf24" stroke="#fef3c7" stroke-width="1" />

                    <!-- Coin Stack 2 (smaller foreground) -->
                    <ellipse cx="50" cy="58" rx="15" ry="6" fill="#d97706" />
                    <rect x="35" y="53" width="30" height="5" fill="#d97706" />
                    <ellipse cx="50" cy="53" rx="15" ry="6" fill="#fbbf24" stroke="#fef3c7" stroke-width="1" />

                    <ellipse cx="50" cy="48" rx="15" ry="6" fill="#d97706" />
                    <rect x="35" y="43" width="30" height="5" fill="#d97706" />
                    <ellipse cx="50" cy="43" rx="15" ry="6" fill="#fbbf24" stroke="#fef3c7" stroke-width="1" />
                </g>

                <!-- Floating sparkle/star accents -->
                <circle cx="310" cy="180" r="3" fill="#fbbf24" />
                <circle cx="340" cy="210" r="2" fill="#fbbf24" />
                <circle cx="85" cy="180" r="2.5" fill="#38bdf8" />
            </svg>
        </div>
    </div>
</body>
</html>
