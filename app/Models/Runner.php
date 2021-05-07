<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;

    /**
     * Fill able fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'birth_date',
    ];

    /**
     * Model dates.
     *
     * @var array
     */
    protected $dates = [
        'birth_date'
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
        return $query->where('name', 'like', '%'.$term.'%')
            ->orWhere('code', 'like', '%'.$term.'%');
    }

    /**
     * The Races.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function races()
    {
        return $this->belongsToMany(Race::class, 'race_runners',  'runner_id', 'race_id')
            ->withTimestamps()
            ->withPivot('runner_id', 'race_id', 'start_at', 'end_at');
    }

    /**
     * Attach the given Race.
     *
     * @param Race
     * @return void
     * @throws \Exception
     */
    public function attachRace(Race $race)
    {
        $races =  $this->races()->get()->where('date', $race->date);

        $hasRaceSameDay = $races->count() > 0;

        if ($hasRaceSameDay)
            throw new \Exception('Runner has a race on the same-day');

        $this->races()->attach($race->id);
    }

    /**
     * Detach the given Race.
     *
     * @param Race
     * @return void
     * @throws \Exception
     */
    public function detachRace(Race $race)
    {
        $this->races()->detach($race->id);
    }
}
