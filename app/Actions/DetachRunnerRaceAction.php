<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class DetachRunnerRaceAction extends Action
{
    use Confirmable, HasRaceState;

    public $title = 'Detach Runner';

    public $icon = 'user-minus';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really detach this Runner?';
    }

    public function renderIf($item)
    {
        $races = $item->races->filter(function ($race)  {
            return $race->id === $this->race->id;
        });

        return $races->count() > 0;
    }

    public function handle($model)
    {
        $model->races()->detach($this->race->id);

        session()->flash('notifier', ['text' => __('Runner has been detached!')]);

        redirect()->route('race-runners', $this->race->id);
    }
}
