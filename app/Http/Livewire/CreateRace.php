<?php

namespace App\Http\Livewire;

use App\Models\Race;
use App\Models\RaceType;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;

class CreateRace extends ModalComponent
{
    use InteractsWithBanner;

    public $name;
    public $type;
    public $date;

    protected $rules = [
        'name' => 'required|min:4',
        'date' => 'date|after:yesterday',
        'type' => 'required|exists:race_types,id'
    ];

    public function submit()
    {
        $this->validate();

        Race::create([
            'name' => $this->name,
            'date' => $this->date,
            'type_id' => $this->type
        ]);

        $this->banner(__("Race $this->name added."));
        $this->emit('refreshRacesList');
        $this->closeModal();
    }

    public function render()
    {
        $types = RaceType::all();

        return view('livewire.create-race', compact('types'));
    }
}
