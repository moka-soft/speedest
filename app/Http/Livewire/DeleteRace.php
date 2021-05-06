<?php

namespace App\Http\Livewire;

use App\Actions\DestroyRacerAction;
use App\Models\Race;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;

class DeleteRace extends ModalComponent
{
    use InteractsWithBanner;

    public $race;

    public function mount($race)
    {
        $this->race = Race::find($race['id']);
    }

    public function deleteRace()
    {
        $race = $this->race;

        (new DestroyRacerAction())->destroy($race);

        $this->dangerBanner(__("Race $race->name removed."));
        $this->emit('refreshRacesList');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-race');
    }
}
