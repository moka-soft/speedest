<?php

namespace App\Http\Livewire;

use App\Models\Race;
use LivewireUI\Modal\ModalComponent;

class AttachRaceRunner extends ModalComponent
{
    public $race;

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function mount($race)
    {
        $this->race = Race::findOrFail($race['id']);
    }

    public function render()
    {
        return view('livewire.attach-race-runner', ['race' => $this->race]);
    }
}
