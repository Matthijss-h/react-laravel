<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        Theme::insert([
            ['name' => 'Gezondheid'],
            ['name' => 'Sport'],
            ['name' => 'Jongeren'],
            ['name' => 'Ouderen'],
            ['name' => 'Zorg'],
            ['name' => 'Wonen'],
            ['name' => 'Werk en inkomen'],
        ]);
    }
}
