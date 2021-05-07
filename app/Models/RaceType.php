<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceType extends Model
{
    use HasFactory;

    /**
     * Fill able fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'distance',
    ];

    /**
     * The Races.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function races()
    {
        return $this->hasMany(Race::class);
    }
}
