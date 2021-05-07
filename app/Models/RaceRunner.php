<?php

namespace App\Models;

use App\Enums\RaceRunnerStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RaceRunner extends Model
{
    /**
     * Fill able fields.
     *
     * @var array
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
     * Model appends.
     *
     * @var array
     */
    protected $appends = [
        'status'
    ];

    /**
     * Get and set status enumeration.
     *
     * @return RaceRunnerStatusEnum
     */
    public function getStatusAttribute()
    {
        if ($this->start_at && !$this->end_at){
            return RaceRunnerStatusEnum::running();
        }

        if ($this->end_at){
            return RaceRunnerStatusEnum::completed();
        }

        return RaceRunnerStatusEnum::pending();
    }


    /**
     * Search model by term.
     *
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->whereHas('runner', function (Builder $query) use ($term) {
            return $query->where('name', 'like', '%'.$term.'%')
                ->orWhere('code', 'like', '%'.$term.'%');
        })->orWhere('id', 'like', '%'.$term.'%');
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
