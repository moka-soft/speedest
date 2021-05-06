<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RaceRunner extends Model
{
    /**
     * Fillable fields.
     *
     * @var string[]
     */
    protected $fillable = [
        'start_at',
        'end_at',
    ];

    /**
     * Model dates.
     *
     * @var array
     */
    protected $dates = [
        'start_at',
        'end_at'
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
            fn ($query) => $query->whereHas('runner', function (Builder $query) use ($term) {
                    $query->where('name', 'like', '%'.$term.'%')
                        ->orWhere('code', 'like', '%'.$term.'%');
                })
                ->orWhere('id', 'like', '%'.$term.'%')
        );
    }

    /**
     * The Race.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    /**
     * The Runner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }
}
