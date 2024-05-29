<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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


    /**
     * The items that belong to the Character
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
}
