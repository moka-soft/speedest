<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class RaceParticipantsFilter extends Filter
{
    public function apply(Builder $query, $value): Builder
    {
        return $query;
    }

    public function options()
    {
        return [
          'attached' => 'attached',
          'detached' => 'detached',
          'pending' => 'pending',
          'finished' => 'finished',
        ];
    }
}
