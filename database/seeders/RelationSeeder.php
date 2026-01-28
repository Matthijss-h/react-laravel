<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Relation;
use App\Models\RelationType;
use Illuminate\Database\Seeder;

class RelationSeeder extends Seeder
{
    public function run(): void
    {
        $grollooZorgt = Participant::where('name', 'Grolloo Zorgt')->first();
        $gemeente = Participant::where('name', 'Gemeente Aa en Hunze')->first();
        $basisschool = Participant::where('name', 'Basisschool Grolloo')->first();

        $werktSamenMet = RelationType::where('name', 'Werkt samen met')->first();

        Relation::create([
            'from_participant_id' => $grollooZorgt->id,
            'to_participant_id'   => $gemeente->id,
            'relation_type_id'    => $werktSamenMet->id,
            'description'         => 'Grolloo Zorgt werkt samen met de gemeente Aa en Hunze.',
        ]);

        Relation::create([
            'from_participant_id' => $grollooZorgt->id,
            'to_participant_id'   => $basisschool->id,
            'relation_type_id'    => $werktSamenMet->id,
            'description'         => 'Grolloo Zorgt werkt samen met de basisschool in Grolloo.',
        ]);
    }
}
