<?php

namespace Database\Seeders;

use App\Models\TeacherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [[
            'name' => 'Ustazah Siti Aminah',
            'category' => 'Guru Anak Usia Dini (3–7 tahun)',
            'note' => '1.⁠ ⁠Iqro awal (Iqro 1–2/3)
2.⁠ ⁠Belajar menulis huruf hijaiyah
3.⁠ ⁠Doa-doa harian
4.⁠ ⁠Surat-surat pendek ringan (Al-Fatihah, Al-Ikhlas, An-Nas, dst.)
5.⁠ ⁠Hafalan bacaan sholat dasar
6.⁠ ⁠Pengenalan huruf hijaiyah dan dasar mengaji
7.⁠ ⁠Pembiasaan ibadah dan hafalan ringan
',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Salsaabilah',
            'category' => 'Guru Anak Usia Dini (3–7 tahun)',
            'note' => '1.⁠ ⁠Iqro awal (Iqro 1–2/3)
2.⁠ ⁠Belajar menulis huruf hijaiyah
3.⁠ ⁠Doa-doa harian
4.⁠ ⁠Surat-surat pendek ringan (Al-Fatihah, Al-Ikhlas, An-Nas, dst.)
5.⁠ ⁠Hafalan bacaan sholat dasar
6.⁠ ⁠Pengenalan huruf hijaiyah dan dasar mengaji
7.⁠ ⁠Pembiasaan ibadah dan hafalan ringan
',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Tari Murniati',
            'category' => '⁠Guru Anak Usia Sekolah Dasar (7 tahun ke atas)',
            'note' => '1.⁠ ⁠Iqro lanjutan (Iqro 4–6) hingga mulai Al-Qur’an
2.⁠ ⁠Doa-doa harian lanjutan
3.⁠ ⁠Hadist-hadist pendek
4.⁠ ⁠Kosakata Bahasa Arab dasar
5.⁠ ⁠Dinul Islam (akidah, akhlak, fiqih ringan)
6.⁠ ⁠Hafalan surat-surat dalam Juz 30
7.⁠ ⁠⁠Latihan hafalan dan pemahaman dasar keislaman
',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Wiwid Rahmawati S.Pd',
            'category' => 'Guru Remaja (Tingkat Lanjut)',
            'note' => '1.⁠ ⁠Al-Qur’an (tahsin & tilawah)
2.⁠ ⁠Hafalan surat-surat panjang
3.⁠ ⁠Hadist-hadist panjang & maknanya
4.⁠ ⁠Tajwid tingkat lanjut
5.⁠ ⁠Doa-doa harian lanjutan
6.⁠ ⁠⁠tasinul kitabah (Membiasakan (kaligrafi) dasar untuk anak remaja )
7.⁠ ⁠Pendalaman bacaan Al-Qur’an dan tajwid
',
            'created_at' => now(),
            'updated_at' => now()
        ]];
        TeacherModel::insert($teachers);
    }
}
