<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BreedType extends BaseModel
{
    protected $fillable = ['name', 'code', 'description'];

    public function breeds(): HasMany
    {
        return $this->hasMany(Breed::class);
    }
}