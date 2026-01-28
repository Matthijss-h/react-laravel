<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::insert([
            [
                'name'        => 'Leergemeenschap Grolloo',
                'description' => 'Hoofdproject voor het netwerk in Grolloo.',
                'start_date'  => '2025-01-01',
                'end_date'    => null,
                'status'      => 'ongoing',
            ],
            [
                'name'        => 'Pilot Gezonde Marke',
                'description' => 'Pilotproject rondom een gezonde en vitale regio.',
                'start_date'  => '2025-03-01',
                'end_date'    => null,
                'status'      => 'idea',
            ],
        ]);
    }
}
