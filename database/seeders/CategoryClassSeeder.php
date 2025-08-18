<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryClassModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryClass = [
            [
                'class_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 1,
                'category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 2,
                'category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 3,
                'category_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_id' => 4,
                'category_id' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];
        CategoryClassModel::insert($categoryClass);
    }
}
