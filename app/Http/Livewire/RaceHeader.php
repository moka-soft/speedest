<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RaceHeader extends Component
{
    public $race;

    protected $listeners = ['refreshRaceHeader' => '$refresh'];

    public function mount($race)
    {
        $this->race = $race;
    }

    public function updateRace()
    {
        $this->race->refresh();
    }

    public function render()
    {
        return view('livewire.race-header');
    }
}
