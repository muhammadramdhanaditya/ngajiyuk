<?php

namespace Database\Seeders;

use App\Models\LocationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LocationModel::updateOrCreate(
            [
                'name' => 'Mushola Al-Amin',
                'type' => 'offline',
                'link' => 'https://maps.app.goo.gl/1doHfVV7Ec38EQcz7?g_st=ipc',
                'detail_address' => 'Jl. Raya Sasak Jikin, RT.004/RW.004, Jatimurni, Kec. Pd. Melati, Kota Bks, Jawa Barat 17431',
                'note' => 'Gang samping Toko Fahri',
            ]
        );
    }
}
