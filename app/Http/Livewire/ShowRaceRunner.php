<?php

namespace App\Http\Livewire;

use App\Models\RaceRunner;
use App\Models\Runner;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;

class ShowRaceRunner extends ModalComponent
{
    use InteractsWithBanner;

    public $race;
    public $runner;
    public $race_runner;
    public $start_at;
    public $end_at;

    protected $rules = [
        'start_at' => 'nullable|date_format:H:i',
        'end_at' => 'nullable|date_format:H:i|after:start_at'
    ];

    public function mount($race_runner)
    {
        $this->race_runner = RaceRunner::find($race_runner['id']) ?? abort(404);
        $this->runner = $this->race_runner->runner;
        $this->race = $this->race_runner->race;
        $this->start_at = $this->race_runner->start_at ? $this->race_runner->start_at->format('H:i') : null;
        $this->end_at = $this->race_runner->end_at ? $this->race_runner->end_at->format('H:i') : null;
    }

    public function submit()
    {
        $this->resetErrorBag();

        $this->validate();

        $updated = $this->race_runner->update([
            'start_at' => $this->start_at ? $this->race->date->format('Y-m-d') . ' ' . $this->start_at : null,
            'end_at' => $this->end_at ? $this->race->date->format('Y-m-d') . ' ' . $this->end_at : null
        ]);

        if ($updated) {
            $this->banner(___('Runner', $this->runner->name,'status updated!'));
            $this->emit('refreshRaceRunnersList');
        } else {
            $this->dangerBanner(___('Runner', $this->runner->name, 'can\'t updated!'));
        }

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.show-race-runner', ['runner' => $this->runner]);
    }
}
