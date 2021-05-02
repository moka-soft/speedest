<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;

trait Faker
{
    private function randomizeDate($days, $method = 'subDays')
    {
        return Carbon::now()->$method($days) ;
    }
}
