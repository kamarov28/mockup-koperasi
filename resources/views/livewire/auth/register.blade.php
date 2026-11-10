<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Anggota - Koperasi Bina Bangkit Mandiri</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-[#edf3fc] p-4 font-sans text-[#0c284d]">
    <main class="grid w-full max-w-4xl overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-xl md:grid-cols-2">
        <section class="p-8 sm:p-10">
            <a href="{{ route('home') }}" class="text-xs font-semibold text-[#1d68bd] hover:underline">&larr; Kembali ke Beranda</a>
            <h1 class="mt-6 text-2xl font-bold">Daftar Anggota</h1>
            <p class="mb-6 mt-2 text-sm text-[#5c6b84]">Bergabung untuk mengakses layanan koperasi.</p>
            @if (session('status'))
                <div role="status" class="mb-4 rounded-lg bg-emerald-50 p-3 text-sm text-emerald-700">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div role="alert" class="mb-4 rounded-lg bg-rose-50 p-3 text-sm text-rose-700">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="email" class="mb-1 block text-sm font-medium">Alamat Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="password" class="mb-1 block text-sm font-medium">Kata Sandi</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="password_confirmation" class="mb-1 block text-sm font-medium">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full rounded-lg bg-[#1d68bd] py-3 text-sm font-semibold text-white hover:bg-[#15549a]">Daftar Sekarang</button>
            </form>
            <p class="mt-6 border-t border-slate-100 pt-4 text-center text-xs text-[#5c6b84]">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-[#1d68bd] hover:underline">Masuk di sini</a>
            </p>
        </section>
        <aside class="hidden flex-col items-center justify-center bg-[#cfe4fc] p-10 text-center md:flex">
            <x-lucide name="building-2" class="h-24 w-24 text-[#1d68bd]" />
            <h2 class="mt-5 text-xl font-bold">Koperasi Bina Bangkit Mandiri</h2>
            <p class="mt-2 max-w-xs text-sm text-[#5c6b84]">Layanan simpan pinjam untuk membangun kesejahteraan anggota.</p>
        </aside>
    </main>
</body>
</html>
