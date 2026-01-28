<?php

namespace Database\Seeders;

use App\Models\RelationType;
use Illuminate\Database\Seeder;

class RelationTypeSeeder extends Seeder
{
    public function run(): void
    {
        RelationType::insert([
            ['name' => 'Werkt samen met'],
            ['name' => 'Onderdeel van'],
            ['name' => 'Financiert'],
            ['name' => 'Coördineert'],
        ]);
    }
}
