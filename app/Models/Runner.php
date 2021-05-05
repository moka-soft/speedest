<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Void_;

class Runner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'birth_date',
    ];

    protected $dates = [
        'birth_date'
    ];

    public static  function search($searchKey)
    {
        return self::where('name', 'LIKE', '%' . $searchKey . '%')
            ->orWhere('code', 'LIKE', '%' . $searchKey . '%');
    }

    public function races()
    {
        return $this->belongsToMany(Race::class, 'participations',  'runner_id', 'race_id')
            ->withTimestamps()
            ->withPivot('runner_id', 'race_id', 'start_at', 'end_at');
    }

    /**
     * Attach race
     *
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
}
