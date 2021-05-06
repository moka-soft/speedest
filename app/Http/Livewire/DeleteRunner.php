<?php

namespace App\Http\Livewire;

use App\Actions\DestroyRunnerAction;
use App\Models\Runner;
use Laravel\Jetstream\InteractsWithBanner;
use LivewireUI\Modal\ModalComponent;

class DeleteRunner extends ModalComponent
{
    use InteractsWithBanner;

    public $runner;

    public function mount($runner)
    {
        $this->runner = Runner::find($runner['id']);
    }

    public function deleteRunner()
    {
        (new DestroyRunnerAction())->destroy($this->runner);

        $this->dangerBanner(__('Runner') . ' ' . $this->runner->name . ' ' . __('removed'));
        $this->emit('refreshRunnersList');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.delete-runner');
    }
}
