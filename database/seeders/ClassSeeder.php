<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = [
            [
                'name' => "Kelas Anak Usia Dini (3-7 Tahun) A",
                'type' => "offline",
                'teacher_id' => 1,
                'location_id' => 1,
                'day' => json_encode(["Senin", "Rabu"]),
                'time_start' => "16:00",
                'time_end' => "17:30",
                'timezone' => "WIB",
                'price' => "80000",
                'color' => "#0d6efd",
                'note' => "Jangan sampai telat datang ya",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Kelas Anak Usia Dini (3-7 Tahun) B",
                'type' => "offline",
                'teacher_id' => 2,
                'location_id' => 1,
                'day' => json_encode(["Selasa", "Kamis"]),
                'time_start' => "13:30",
                'time_end' => "15:00",
                'timezone' => "WIB",
                'price' => "80000",
                'color' => "#0d6efd",
                'note' => "Jangan sampai telat datang ya",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "⁠Kelas Anak Usia Sekolah Dasar (7 tahun ke atas)",
                'type' => "offline",
                'teacher_id' => 3,
                'location_id' => 1,
                'day' => json_encode(["Senin", "Kamis"]),
                'time_start' => "13:30",
                'time_end' => "15:00",
                'timezone' => "WIB",
                'price' => "100000",
                'color' => "#0d6efd",
                'note' => "Jangan sampai telat datang ya",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Kelas Remaja (Tingkat Lanjut)",
                'type' => "offline",
                'teacher_id' => 4,
                'location_id' => 1,
                'day' => json_encode(["Senin", "Selasa", "Kamis"]),
                'time_start' => "13:30",
                'time_end' => "15:00",
                'timezone' => "WIB",
                'price' => "150000",
                'color' => "#0d6efd",
                'note' => "Jangan sampai telat datang ya",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        ClassModel::insert($class);
    }
}
