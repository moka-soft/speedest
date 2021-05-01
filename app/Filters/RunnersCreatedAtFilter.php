<?php

namespace App\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\DateFilter;

class RunnersCreatedAtFilter extends DateFilter
{
    public function apply(Builder $query, Carbon $date, $request): Builder
    {
        return $query->whereDate('created_at', $date->toDateString());
    }
}
