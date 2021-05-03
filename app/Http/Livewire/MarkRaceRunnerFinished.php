<?php

namespace App\Http\Livewire;

use App\Models\Runner;
use LivewireUI\Modal\ModalComponent;

class MarkRaceRunnerFinished extends ModalComponent
{
    public $race_id;
    public $runner_id;
    public $start_at;
    public $end_at;

    protected $rules = [
        'race_id' => 'required',
        'runner_id' => 'required',
        'start_at' => 'date_format:H:i',
        'end_at' => 'date_format:H:i'
    ];

    public function submit()
    {
        $this->validate();

        $runner = Runner::find($this->runner_id);

        $race = $runner->races()
            ->wherePivot('runner_id', $this->runner_id)
            ->wherePivot('race_id', $this->race_id)
            ->get()
            ->first();

        if ($race){
            $runner->races()->sync([
                $this->race_id => [
                    'start_at' => $race->date->format('Y-m-d') . ' ' . $this->start_at,
                    'end_at' => $race->date->format('Y-m-d') . ' ' . $this->end_at
                ]
            ]);
            session()->flash('notifier',['text'=>__('Participation has been marked as a finished!')]);
        } else {
            session()->flash('notifier', ['type' => 'error', 'text' => __('The Runner can\'t marked as a finished!')]);
        }

        redirect()->route('race-runners', $this->race_id);
    }

    public function render()
    {
        return view('livewire.mark-race-runner-finished');
    }
}
