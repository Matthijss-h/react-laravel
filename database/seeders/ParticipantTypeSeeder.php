<?php

namespace Database\Seeders;

use App\Models\ParticipantType;
use Illuminate\Database\Seeder;

class ParticipantTypeSeeder extends Seeder
{
    public function run(): void
    {
        ParticipantType::insert([
            ['name' => 'Bewoner'],
            ['name' => 'Zorgorganisatie'],
            ['name' => 'Onderwijs'],
            ['name' => 'Gemeente'],
            ['name' => 'Vereniging'],
            ['name' => 'Bedrijf'],
        ]);
    }
}
