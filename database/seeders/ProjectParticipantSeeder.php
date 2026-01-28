<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectParticipantSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::where('name', 'Leergemeenschap Grolloo')->first();

        if (! $project) {
            return;
        }

        $grollooZorgt = Participant::where('name', 'Grolloo Zorgt')->first();
        $gemeente     = Participant::where('name', 'Gemeente Aa en Hunze')->first();
        $basisschool  = Participant::where('name', 'Basisschool Grolloo')->first();

        $data = [];

        if ($grollooZorgt) {
            $data[$grollooZorgt->id] = ['role' => 'Partner'];
        }

        if ($gemeente) {
            $data[$gemeente->id] = ['role' => 'Coördinator'];
        }

        if ($basisschool) {
            $data[$basisschool->id] = ['role' => 'Deelnemer'];
        }

        if (! empty($data)) {
            $project->participants()->syncWithoutDetaching($data);
        }
    }
}
