<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'desc'];

    /**
     * Get all of the characters for the Type
     */
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
