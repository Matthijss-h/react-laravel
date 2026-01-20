<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_participant_id',
        'to_participant_id',
        'relation_type_id',
        'description',
    ];

    public function fromParticipant(): BelongsTo
    {
        return $this->belongsTo(Participant::class, 'from_participant_id');
    }

    public function toParticipant(): BelongsTo
    {
        return $this->belongsTo(Participant::class, 'to_participant_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(RelationType::class, 'relation_type_id');
    }
}

