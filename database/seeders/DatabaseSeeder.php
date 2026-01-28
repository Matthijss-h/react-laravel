<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ParticipantTypeSeeder::class,
            LayerSeeder::class,
            RelationTypeSeeder::class,
            ThemeSeeder::class,
            ProjectSeeder::class,
            ParticipantSeeder::class,
            RelationSeeder::class,
            ParticipantThemeSeeder::class,
            ProjectParticipantSeeder::class,
        ]);
    }
}
