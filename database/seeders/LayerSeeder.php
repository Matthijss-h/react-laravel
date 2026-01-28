<?php

namespace Database\Seeders;

use App\Models\Layer;
use Illuminate\Database\Seeder;

class LayerSeeder extends Seeder
{
    public function run(): void
    {
        Layer::insert([
            ['name' => 'Grolloo'],
            ['name' => 'Gemeente Aa en Hunze'],
            ['name' => 'Regio Drenthe'],
            ['name' => 'Andere provincie'],
            ['name' => 'Landelijk'],
        ]);
    }
}
