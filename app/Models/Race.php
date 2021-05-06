<?php

namespace App\Models;

use App\Enums\StatusRaceEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    /**
     * Fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date',
        'type_id',
    ];

    /**
     * Model dates.
     *
     * @var array
     */
    protected $dates = [
        'date'
    ];

    /**
     * Model appends.
     *
     * @var array
     */
    protected $appends = [
        'status'
    ];

    /**
     * Search model by term.
     *
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('name', 'like', '%'.$term.'%')
                ->orWhere('id', 'like', '%'.$term.'%')
        );
    }

    /**
     * Get and set status enumeration.
     *
     * @return StatusRaceEnum
     */
    public function getStatusAttribute()
    {
        if ($this->date->isPast()){
            return StatusRaceEnum::completed();
        }

        if ($this->date->isToday()){
            return StatusRaceEnum::running();
        }

        return StatusRaceEnum::coming();
    }

    /**
     * The type of Race.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(RaceType::class);
    }

    /**
     * The Runners.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function runners()
    {
        return $this->belongsToMany(Runner::class, 'race_runners', 'race_id', 'runner_id')->withTimestamps();
    }
}
