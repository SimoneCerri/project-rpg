<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    protected $fillable = ['name', 'type_id', 'description', 'attack', 'defense', 'speed'];

    use HasFactory;

    /**
     * Get the type that owns the Character
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
