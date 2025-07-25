<?php

namespace Database\Seeders;

use App\Models\GalleryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallery = [
            [
                'name' => 'Gallery Home',
                'type' => 'home',
                'note' => 'untuk halaman depan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kegiatan Mengajar',
                'type' => 'gallery',
                'note' => 'ini adalah kegiatan mengajar kami di Mushala Al-Amin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Maulid Nabi',
                'type' => 'gallery',
                'note' => 'ini adalah kegiatan Maulid Nabi kami di Mushala Al-Amin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Manasik Haji',
                'type' => 'gallery',
                'note' => 'ini adalah kegiatan Manasik Haji kami di Mushala Al-Amin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tarhib Ramadhan',
                'type' => 'gallery',
                'note' => 'ini adalah kegiatan Tarhib Ramadhan kami di Mushala Al-Amin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        GalleryModel::insert($gallery);
    }
}
