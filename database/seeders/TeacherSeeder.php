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
            'category' => 'Kelas Anak Usia Dini (3–7 tahun)',
            'note' => '',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Salsaabilah',
            'category' => 'Kelas Anak Usia Dini (3–7 tahun)',
            'note' => '',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Tari Murniati',
            'category' => '⁠Kelas Anak Usia Sekolah Dasar (7 tahun ke atas)',
            'note' => '',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'name' => 'Ustazah Wiwid Rahmawati S.Pd',
            'category' => 'Kelas Remaja (Tingkat Lanjut)',
            'note' => '',
            'created_at' => now(),
            'updated_at' => now()
        ]];
        TeacherModel::insert($teachers);
    }
}
