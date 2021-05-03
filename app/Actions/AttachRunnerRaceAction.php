<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class AttachRunnerRaceAction extends Action
{
    use Confirmable, HasRaceState;

    public $title = 'Attach runner';

    public $icon = 'user-check';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really attach this runner?';
    }

    public function handle($model)
    {
        // TODO database touch

        session()->flash('notifier', ['text' => __('Runner has been attached!')]);

        redirect()->route('race-participants.index', $this->race->id);
    }
}
