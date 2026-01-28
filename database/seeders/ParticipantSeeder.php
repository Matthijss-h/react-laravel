<?php

namespace Database\Seeders;

use App\Models\Layer;
use App\Models\Participant;
use App\Models\ParticipantType;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    public function run(): void
    {
        $zorgType = ParticipantType::where('name', 'Zorgorganisatie')->first();
        $gemeenteType = ParticipantType::where('name', 'Gemeente')->first();
        $onderwijsType = ParticipantType::where('name', 'Onderwijs')->first();

        $grollooLayer = Layer::where('name', 'Grolloo')->first();
        $gemeenteLayer = Layer::where('name', 'Gemeente Aa en Hunze')->first();

        Participant::create([
            'name'                => 'Grolloo Zorgt',
            'short_description'   => 'Lokaal zorginitiatief in Grolloo.',
            'participant_type_id' => $zorgType->id,
            'layer_id'            => $grollooLayer->id,
            'website'             => null,
            'email'               => 'info@grolloozorgt.nl',
            'phone'               => null,
            'is_active'           => true,
        ]);

        Participant::create([
            'name'                => 'Gemeente Aa en Hunze',
            'short_description'   => 'Gemeente die de leergemeenschap ondersteunt.',
            'participant_type_id' => $gemeenteType->id,
            'layer_id'            => $gemeenteLayer->id,
            'website'             => 'https://www.aaenhunze.nl',
            'email'               => 'info@aaenhunze.nl',
            'phone'               => null,
            'is_active'           => true,
        ]);

        Participant::create([
            'name'                => 'Basisschool Grolloo',
            'short_description'   => 'Lokale basisschool in Grolloo.',
            'participant_type_id' => $onderwijsType->id,
            'layer_id'            => $grollooLayer->id,
            'website'             => null,
            'email'               => null,
            'phone'               => null,
            'is_active'           => true,
        ]);
        if (class_exists(\Database\Factories\ParticipantFactory::class)) {
            Participant::factory()
                ->count(10)
                ->create();
        }
    }
}
