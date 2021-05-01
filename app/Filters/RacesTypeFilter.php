<?php

namespace App\Filters;

use App\Models\RaceType;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class RacesTypeFilter extends Filter
{
    public function apply(Builder $query, $value): Builder
    {
        return $query->where('type_id', $value);
    }

    public function options()
    {
        return RaceType::all()
            ->pluck('id', 'name')
            ->toArray();
    }
}
