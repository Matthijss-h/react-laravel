<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Theme;
use Illuminate\Database\Seeder;

class ParticipantThemeSeeder extends Seeder
{
    public function run(): void
    {
        $grollooZorgt = Participant::where('name', 'Grolloo Zorgt')->first();
        $basisschool  = Participant::where('name', 'Basisschool Grolloo')->first();

        $gezondheid = Theme::where('name', 'Gezondheid')->first();
        $zorg       = Theme::where('name', 'Zorg')->first();
        $jongeren   = Theme::where('name', 'Jongeren')->first();

        if ($grollooZorgt && $gezondheid && $zorg) {
            $grollooZorgt->themes()->syncWithoutDetaching([
                $gezondheid->id,
                $zorg->id,
            ]);
        }

        if ($basisschool && $jongeren) {
            $basisschool->themes()->syncWithoutDetaching([
                $jongeren->id,
            ]);
        }
    }
}
