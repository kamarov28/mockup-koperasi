# Koperasi Bina Bangkit Mandiri

Sistem informasi koperasi simpan pinjam dan platform toko sekolah terintegrasi untuk civitas akademika (siswa, guru, dan staf sekolah). Dibangun menggunakan arsitektur modern berbasis **Laravel 13.x** dan **Tailwind CSS v4** dengan penekanan pada presisi antarmuka, efisiensi pembukuan kasir, dan keterbukaan tata kelola keuangan bersama.

---

## Daftar Isi

- [Ikhtisar Sistem](#ikhtisar-sistem)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Modul dan Fitur Utama](#modul-dan-fitur-utama)
  - [1. Halaman Publik (Pengunjung)](#1-halaman-publik-pengunjung)
  - [2. Portal Anggota](#2-portal-anggota)
  - [3. Toko Koperasi Sekolah](#3-toko-koperasi-sekolah)
  - [4. Sistem Administrasi (Admin Cockpit)](#4-sistem-administrasi-admin-cockpit)
  - [5. Fitur Pendukung](#5-fitur-pendukung)
- [Struktur Rute Aplikasi](#struktur-rute-aplikasi)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi dan Setup Lokal](#instalasi-dan-setup-lokal)
- [Pengujian dan Standar Kode](#pengujian-dan-standar-kode)
- [Lisensi](#lisensi)

---

## Ikhtisar Sistem

Koperasi Bina Bangkit Mandiri dirancang untuk menggabungkan dua unit usaha utama koperasi sekolah:
1. **Unit Simpan Pinjam (USP):** Pengelolaan simpanan pokok, simpanan wajib berkala, dan tabungan sukarela, serta fasilitas pembiayaan mikro/pinjaman pendidikan anggota dengan bunga transparan.
2. **Unit Toko Koperasi:** Etalase kebutuhan perlengkapan sekolah (ATK, seragam resmi, modul prakerin) dan sarana hilirisasi produk kewirausahaan kreatif buatan siswa kejuruan.

---

## Teknologi yang Digunakan

- **Backend:** Laravel 13.x (PHP 8.3+)
- **Frontend / Styling:** Tailwind CSS v4, Blade Templating, Livewire 3
- **Iconography:** Lucide Icons (Inline Zero-Emoji SVG Component)
- **Asset Bundler:** Vite 8.x + Vite-Plus
- **Autentikasi & Keamanan:** Laravel Fortify, WebAuthn Passkeys, CSRF Protection
- **Testing Engine:** Pest PHP (55 Unit & Feature Tests Passed)
- **Code Formatter:** Laravel Pint

---

## Modul dan Fitur Utama

### 1. Halaman Publik (Pengunjung)
Akses terbuka bagi masyarakat dan wali murid tanpa memerlukan otentikasi login:
- **Beranda (`/`):** Profil profil koperasi, visi misi, capaian statistik riil (1.250+ anggota, 350+ produk, aset dana simpanan), dan ringkasan layanan cepat.
- **Berita & Pengumuman (`/berita`):** Publikasi agenda rapat tahunan, pengumuman jadwal pinjaman, serta arsip kegiatan sekolah dengan sistem filter kategori.
- **Galeri Kegiatan (`/galeri`):** Dokumentasi foto Rapat Anggota Tahunan (RAT), pelatihan literasi keuangan, bazar kewirausahaan siswa, dan modernisasi kasir toko.
- **Layanan (`/layanan`) & Tentang Kami (`/tentang`):** Edukasi hak dan kewajiban anggota, skema simpanan, dan ketentuan pembiayaan.
- **Kontak (`/kontak`):** Saluran komunikasi resmi dan lokasi sekretariat koperasi sekolah.

### 2. Portal Anggota
Area khusus anggota terdaftar dengan hak akses individual:
- **Dashboard Anggota (`/nasabah/dashboard`):** Menampilkan identitas NIS/NIP anggota, total akumulasi simpanan, sisa saldo aktif, kewajiban cicilan mendatang, dan mutasi terakhir.
- **Data Simpanan (`/nasabah/simpanan`):**
  - *Simpanan Pokok:* Setoran awal keanggotaan sah.
  - *Simpanan Wajib:* Iuran berkala bulanan.
  - *Simpanan Sukarela:* Tabungan fleksibel yang dapat disetor atau ditarik kapan saja.
  - Riwayat mutasi setor dan penarikan kas.
- **Data Pinjaman (`/nasabah/pinjaman`):** Status persetujuan kredit, sisa plafon pinjaman, dan tabel jadwal angsuran 6 bulan (status lunas, aktif, dan termin mendatang).
- **Pengajuan Pinjaman Online (`/nasabah/pinjaman/pengajuan`):** Formulir digital permohonan pinjaman dengan kalkulasi simulasi tenor.
- **Riwayat Transaksi (`/nasabah/transaksi`):** Filter komprehensif mutasi simpanan, penarikan, angsuran, dan pembelanjaan toko.
- **Cetak Dokumen (`/nasabah/dokumen`):** Lembar slip transaksi, kuitansi setoran sah, bukti perjanjian pinjaman, dan kartu anggota digital yang siap cetak standar printer dokumen atau thermal (`window.print()`).

### 3. Toko Koperasi Sekolah
Platform belanja perlengkapan pendidikan bagi civitas:
- **Katalog Produk (`/nasabah/toko`):**
  - Kategori *Alat Tulis Kantor (ATK)* dan buku pelajaran.
  - Kategori *Seragam & Atribut* resmi OSIS, jas almamater, dan pakaian praktek laboratorium.
  - Kategori *Makanan & Minuman* hasil kreasi siswa tata boga dan konsumsi harian.
- **Manajemen Ketersediaan:** Indikator stok barang real-time (Tersedia, Terbatas, Fresh Harian).
- **Keranjang & Checkout:** Drawer belanja interaktif dengan opsi pembayaran potong saldo simpanan sukarela, tunai kasir, atau QRIS sekolah.
- **Riwayat Pesanan:** Daftar faktur pembelian barang anggota beserta status pengambilan barang di kasir sekolah.

### 4. Sistem Administrasi (Admin Cockpit)
Dasbor sentral bagi pengurus dan juru buku koperasi:
- **Manajemen Anggota (`/admin/nasabah`):** Registrasi anggota baru, perbaikan biodata, manajemen mutasi kelulusan siswa / kepindahan tugas guru, dan kontrol nonaktif akun.
- **Manajemen Simpanan (`/admin/simpanan`):** Input kas masuk simpanan pokok/wajib/sukarela, approval penarikan sukarela, dan ringkasan kas buku besar.
- **Manajemen Pinjaman (`/admin/pinjaman`):** Verifikasi pengajuan pinjaman baru, otorisasi persetujuan pimpinan koperasi, serta kalkulator otomatis pokok dan margin bunga 1% flat.
- **Mutasi Transaksi (`/admin/transaksi`):** Pengawasan seluruh pergerakan kas masuk dan kas keluar lintas unit koperasi.
- **Pengaturan Sistem (`/admin/pengaturan`):** Konfigurasi identitas legal koperasi, besaran iuran wajib, dan kebijakan suku bunga.

### 5. Fitur Pendukung
- **Ekspor Dokumen Laporan (`/admin/laporan`):** Unduh berkas rekapitulasi pembukuan dalam format PDF siap cetak dan spreadsheet Excel (`.xlsx`).
- **Integrasi Notifikasi WhatsApp:** Modul generator pesan otomatis untuk:
  - Notifikasi bukti setoran simpanan masuk.
  - Pengingat tanggal jatuh tempo tagihan pinjaman anggota.
  - Broadcast pengumuman resmi dan undangan RAT.

---

## Struktur Rute Aplikasi

```
Halaman Publik:
GET  /                    -> Beranda (welcome)
GET  /tentang             -> Profil & Visi Misi Koperasi
GET  /layanan             -> Panduan Layanan Simpan Pinjam
GET  /berita              -> Berita & Pengumuman Koperasi
GET  /galeri              -> Galeri Foto & Portofolio RAT
GET  /kontak              -> Informasi Kontak Resmi

Portal Anggota:
GET  /nasabah/dashboard          -> Dashboard Utama Anggota
GET  /nasabah/simpanan           -> Rincian 3 Jenis Simpanan & Mutasi
GET  /nasabah/pinjaman           -> Jadwal Angsuran & Kontrak Pinjaman
GET  /nasabah/pinjaman/pengajuan -> Form Pengajuan Kredit Baru
GET  /nasabah/toko               -> Katalog Toko, Keranjang & Checkout
GET  /nasabah/transaksi          -> Riwayat Mutasi Lengkap
GET  /nasabah/dokumen            -> Pusat Cetak Slip & Laporan
GET  /nasabah/profil             -> Pengaturan Profil Akun

Admin Cockpit:
GET  /admin/dashboard     -> Ringkasan Statistik Operasional
GET  /admin/nasabah       -> Manajemen Anggota & Mutasi
GET  /admin/simpanan      -> Pencatatan Kas Simpanan
GET  /admin/pinjaman      -> Otorisasi Pinjaman & Kalkulator Bunga
GET  /admin/transaksi     -> Pengawasan Transaksi Keuangan
GET  /admin/laporan       -> Ekspor PDF, Excel & Broadcast WA
GET  /admin/pengaturan    -> Konfigurasi Koperasi
```

---

## Persyaratan Sistem

- PHP >= 8.3 dengan ekstensi: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`
- Composer >= 2.5
- Node.js >= 20.x & npm >= 10.x
- Database MySQL / MariaDB / SQLite (In-Memory Testing)

---

## Instalasi dan Setup Lokal

1. **Clone Repositori:**
   ```bash
   git clone https://github.com/kamarov28/mockup-koperasi.git
   cd mockup-koperasi
   ```

2. **Pasang Ketergantungan Backend & Frontend:**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Berkas Lingkungan (.env):**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Jalankan Migrasi Database:**
   ```bash
   php artisan migrate
   ```

5. **Kompilasi Aset Frontend (Tailwind CSS v4 & Vite):**
   ```bash
   npm run build
   # atau untuk mode live-reloading:
   npm run dev
   ```

6. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui peramban pada alamat `http://127.0.0.1:8000` (atau virtual host Laragon `http://website-koperasi.test`).

---

## Pengujian dan Standar Kode

Seluruh fungsionalitas rute, struktur komponen Blade, dan alur modul telah dilengkapi pengujian otomatis menggunakan **Pest PHP**:

```bash
# Menjalankan seluruh rangkaian tes otomatis
php artisan test

# Menjalankan pengujian spesifik per modul
php artisan test --filter=PublicPagesTest
php artisan test --filter=NasabahPortalTest
php artisan test --filter=AdminPanelTest

# Format kode sesuai standar Laravel Pint
./vendor/bin/pint --test
```

---

## Lisensi

Proyek ini dikembangkan secara tertutup untuk kebutuhan digitalisasi operasional **Koperasi Bina Bangkit Mandiri**. Seluruh hak kekayaan intelektual dilindungi.
