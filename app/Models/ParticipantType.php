<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParticipantType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class);
    }
}
