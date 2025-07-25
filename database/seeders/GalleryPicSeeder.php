<?php

namespace Database\Seeders;

use App\Models\GalleryPicModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GalleryPicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryPic = [
            [
                'gallery_id' => 1,
                'pic_url' => '/storage/assets/image/ngaji-1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 1,
                'pic_url' => '/storage/assets/image/ngaji-2.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 1,
                'pic_url' => '/storage/assets/image/ngaji-3.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 1,
                'pic_url' => '/storage/assets/image/ngaji-4.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 2,
                'pic_url' => '/storage/assets/image/mengajar-1.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'gallery_id' => 2,
                'pic_url' => '/storage/assets/image/mengajar-2.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 2,
                'pic_url' => '/storage/assets/image/mengajar-3.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 2,
                'pic_url' => '/storage/assets/image/mengajar-4.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 3,
                'pic_url' => '/storage/assets/image/maulid-nabi-1.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 4,
                'pic_url' => '/storage/assets/image/manasik-haji-1.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-1.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-2.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-3.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-4.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-5.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-6.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gallery_id' => 5,
                'pic_url' => '/storage/assets/image/tarhib-ramadhan-7.jpeg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        GalleryPicModel::insert($galleryPic);
    }
}
