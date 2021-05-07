<?php

namespace App\Http\Livewire;

use App\Models\Runner;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;

class CreateRunner extends ModalComponent
{
    use InteractsWithBanner;

    public $name;
    public $code;
    public $birth_date;

    protected $rules = [
        'name' => 'required|min:4',
        'code' => 'required|min:2|max:11|unique:runners',
        'birth_date' => 'required|date|before:-12 years'
    ];

    public function submit()
    {
        $this->validate();

        Runner::create([
            'name' => $this->name,
            'code' => $this->code,
            'birth_date' => $this->birth_date
        ]);

        $this->banner(___('Runner', $this->name, 'has been created!'));
        $this->emit('refreshRunnersList');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.create-runner');
    }
}
