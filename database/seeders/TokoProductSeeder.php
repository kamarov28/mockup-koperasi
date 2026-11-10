<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['SKU-ATK-001', 'Buku Tulis Spiral A5 80 Lembar', 'ATK & Buku', 'Kertas tebal 80gsm untuk catatan pelajaran.', 8500, 42, 'Unit'],
            ['SKU-ATK-002', 'Paket Bolpoin Gel 0.5mm (3 Warna)', 'ATK & Buku', 'Tinta hitam, biru, dan merah untuk tugas harian.', 12000, 110, 'Paket'],
            ['SKU-SRG-001', 'Kemeja Seragam Putih OSIS (M/L/XL)', 'Seragam & Atribut', 'Bahan katun Oxford dengan bordir logo sekolah.', 65000, 28, 'Pcs'],
            ['SKU-SRG-002', 'Jas Almamater Sekolah Resmi', 'Seragam & Atribut', 'Jas bahan drill untuk kegiatan resmi sekolah.', 140000, 8, 'Pcs'],
            ['SKU-MKN-001', 'Roti Coklat Keju Karya Siswa Tata Boga', 'Makanan & Minuman', 'Produk olahan harian hasil karya siswa.', 5000, 30, 'Pcs'],
            ['SKU-MKN-002', 'Susu Kotak UHT 250ml Aneka Rasa', 'Makanan & Minuman', 'Minuman kemasan higienis aneka rasa.', 6500, 60, 'Kotak'],
            ['SKU-ATK-003', 'Kertas HVS A4 75gsm (1 Rim / 500 Lembar)', 'ATK & Buku', 'Kertas putih untuk tugas dan laporan.', 48000, 15, 'Rim'],
        ];

        $now = now();
        DB::table('toko_products')->insertOrIgnore(array_map(
            fn (array $product): array => [
                'sku' => $product[0],
                'name' => $product[1],
                'category' => $product[2],
                'description' => $product[3],
                'price' => $product[4],
                'stock' => $product[5],
                'unit' => $product[6],
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            $products,
        ));
    }
}
