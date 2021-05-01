<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\DateFilter;

class RacesDateFilter extends DateFilter
{
    public function apply(Builder $query, Carbon $date): Builder
    {
        return $query->whereDate('date', $date->toDateString());
    }
}
