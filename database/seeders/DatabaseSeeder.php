<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(GalleryPicSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(CategoryClassSeeder::class);
    }
}
