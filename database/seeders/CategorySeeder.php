<?php

namespace Database\Seeders;

use App\Models\CategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            // 1
            [
                'name' => "⁠Iqro awal (Iqro 1–3)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 2
            [
                'name' => "⁠Iqro lanjutan (Iqro 4–6) hingga mulai Al-Qur’an",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 3
            [
                'name' => "⁠Al-Qur’an (tahsin & tilawah)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 4
            [
                'name' => "⁠Belajar menulis huruf hijaiyah",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 5
            [
                'name' => "⁠Doa-doa harian",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 6
            [
                'name' => "Doa-doa harian lanjutan",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 7
            [
                'name' => "⁠Surat-surat pendek ringan (Al-Fatihah, Al-Ikhlas, An-Nas, dst.)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 8
            [
                'name' => "⁠Hafalan surat-surat dalam Juz 30",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 9
            [
                'name' => "⁠Hafalan surat-surat panjang",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 10
            [
                'name' => "⁠Hafalan bacaan sholat dasar",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 11
            [
                'name' => "⁠Pengenalan huruf hijaiyah dan dasar mengaji",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 12
            [
                'name' => "⁠Pembiasaan ibadah dan hafalan ringan",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 13
            [
                'name' => "⁠⁠Latihan hafalan dan pemahaman dasar keislaman",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 14
            [
                'name' => "⁠Dinul Islam (akidah, akhlak, fiqih ringan)",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 15
            [
                'name' => "⁠⁠Kosakata Bahasa Arab dasar",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 16
            [
                'name' => "⁠⁠Hadist-hadist pendek",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 17
            [
                'name' => "⁠Hadist-hadist panjang & maknanya",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 18
            [
                'name' => "⁠Tajwid tingkat lanjut",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 19
            [
                'name' => "⁠Pendalaman bacaan Al-Qur’an dan tajwid",
                'created_at' => now(),
                'updated_at' => now()
            ],
            // 20
            [
                'name' => "⁠Tasinul Kitabah (Membiasakan (kaligrafi) dasar untuk anak remaja )",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        CategoryModel::insert($category);
    }
}
