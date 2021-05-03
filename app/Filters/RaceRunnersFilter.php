<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class RaceRunnersFilter extends Filter
{
    public $race;

    public function apply(Builder $query, $value): Builder
    {
        if ($value === 'attached')
            return $query->whereHas('races', function (Builder $query) {
                $query->where('race_id', '=', $this->race->id);
            });

        if ($value === 'all')
            return $query;

        if ($value === 'pending')
            return $query->whereHas('races', function (Builder $query) {
                $query->where('race_id', '=', $this->race->id)
                    ->where('end_at', '=', null);
            });

        if ($value === 'finished')
            return $query->whereHas('races', function (Builder $query) {
                $query->where('race_id', '=', $this->race->id)
                    ->where('end_at', '!=', null);
            });

        return $query;
    }

    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    public function options()
    {
        return [
            'all' => 'all',
            'attached' => 'attached',
            'pending' => 'pending',
            'finished' => 'finished'
        ];
    }
}
