<?php

namespace Database\Seeders;

use App\Models\SettingModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingModel::updateOrCreate(
            [
                'name' => 'Ngajiyuk',
                'name_bank' => 'BNI',
                'number_bank' => '2223884381293',
                'qr_code_url' => '/storage/qr_code/qr-1.png',
                'title_home' => 'Ayo Mulai Mengaji Bersama NgajiYuk!',
                'note_home' => "Gabung bersama komunitas kami untuk memperdalam ilmu Al-Qur'an dan mempererat ukhuwah Islamiyah.",
            ]
        );
    }
}
