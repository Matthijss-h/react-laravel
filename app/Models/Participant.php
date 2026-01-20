<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'participant_type_id',
        'layer_id',
        'website',
        'email',
        'phone',
        'is_active',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ParticipantType::class, 'participant_type_id');
    }

    public function layer(): BelongsTo
    {
        return $this->belongsTo(Layer::class);
    }

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(Theme::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)
            ->withPivot('role');
    }

    public function outgoingRelations(): HasMany
    {
        return $this->hasMany(Relation::class, 'from_participant_id');
    }

    public function incomingRelations(): HasMany
    {
        return $this->hasMany(Relation::class, 'to_participant_id');
    }
}
