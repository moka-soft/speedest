<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class MarkRaceParticipationUnfinishedAction extends Action
{
    use Confirmable, HasRaceState;

    public $title = 'Mark participation as a Unfinished';

    public $icon = 'zap-off';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really want marked this participation as a unfinished ?';
    }

    public function handle($model)
    {
        // TODO database touch

        session()->flash('notifier', ['text' => __('Participation has been marked as a finished!')]);

        redirect()->route('race-participants.index', $this->race->id);
    }
}

