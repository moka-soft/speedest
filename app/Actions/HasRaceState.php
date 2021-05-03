<?php

namespace App\Actions;

trait HasRaceState
{
    public $race;

    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }
}
