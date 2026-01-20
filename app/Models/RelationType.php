<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RelationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function relations(): HasMany
    {
        return $this->hasMany(Relation::class);
    }
}
