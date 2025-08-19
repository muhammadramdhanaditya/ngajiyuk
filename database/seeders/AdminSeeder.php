<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin Utama',
                'email' => 'fatusuzli@gmail.com',
                'password' => Hash::make('iniadmin123'),
                'role' => 'admin',
                'phone' => '087810111815',
            ],
            [
                'name' => 'Ramdhan ATT',
                'email' => 'sales.admin@trumecs.com',
                'password' => Hash::make('123123'),
                'role' => 'peserta',
                'phone' => '085225340707',
            ],
        ];
        UserModel::insert($user);
    }
}
