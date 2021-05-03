<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class MarkParticipationFinished extends ModalComponent
{
    public $start;
    public $end;
    public $runner_id;
    public $race_id;

    protected $rules = [
        'race_id' => 'required',
        'runner_id' => 'required',
        'end' => 'date_format:H:i',
        'start' => 'date_format:H:i'
    ];

    public function submit()
    {
        $this->validate();

        session()->flash('notifier',['text'=>__('Participation has been marked as a finished!')]);

        redirect()->route('race-participants.index', $this->race_id);
    }

    public function render()
    {
        return view('livewire.mark-participation-finished');
    }
}
