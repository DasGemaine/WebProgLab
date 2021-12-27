<?php

namespace Database\Seeders;

use App\Models\FurnitureType;
use Illuminate\Database\Seeder;

class FurnitureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FurnitureType::create([
            'type' => 'Bedside Table',
        ]);

        FurnitureType::create([
            'type' => 'Rak',
        ]);

        FurnitureType::create([
            'type' => 'Lemari Pakaian',
        ]);

        FurnitureType::create([
            'type' => 'Meja Tamu',
        ]);

        FurnitureType::create([
            'type' => 'Kursi',
        ]);

        FurnitureType::create([
            'type' => 'Sofa',
        ]);
    }
}
