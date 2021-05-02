<?php

namespace App\Http\Livewire;

use App\Models\Runner;
use LivewireUI\Modal\ModalComponent;

class CreateRunner extends ModalComponent
{
    public $name;
    public $cpf;
    public $birth_date;

    protected $rules = [
        'name' => 'required|min:4',
        'cpf' => 'required|min:11|max:11|regex:/^\d{3}\d{3}\d{3}\d{2}$/|unique:runners',
        'birth_date' => 'required|date|before:-18 years'
    ];

    public function submit()
    {
        $this->validate();

        Runner::create([
            'name' => $this->name,
            'cpf' => $this->cpf,
            'birth_date' => $this->birth_date
        ]);

        session()->flash('notifier',['text'=>__("Runner $this->name has been created!")]);

        redirect()->route('runners');
    }

    public function render()
    {
        return view('livewire.create-runner');
    }
}
