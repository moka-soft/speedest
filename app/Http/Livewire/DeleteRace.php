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
        $this->race = Race::findOrFail($race['id']);
    }

    public function deleteRace()
    {
        (new DestroyRacerAction())->destroy($this->race);

        $this->dangerBanner(___('Race', $this->race->name, 'removed!'));
        $this->emit('refreshRacesList');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-race');
    }
}
