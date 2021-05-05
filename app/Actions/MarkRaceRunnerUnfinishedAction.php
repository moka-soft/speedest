<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class MarkRaceRunnerUnfinishedAction extends Action
{
    use Confirmable, HasRaceState, HasRaceState;

    public $title = 'Mark participation as a Unfinished';

    public $icon = 'zap-off';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really want marked this participation as a unfinished ?';
    }

    public function renderIf($item)
    {
        $race = $item->races->filter(function ($race)  {
            return $race->id === $this->race->id;
        })->first();

        return isset($race->pivot) ? $race->pivot->end_at : false;
    }

    public function handle($model)
    {
        $race = $model->races()
            ->wherePivot('race_id', $this->race->id)->get()->first();

        if ($race) {
            $model->races()->sync([
                $this->race->id => [
                    'start_at' => null,
                    'end_at' => null
                ]
            ]);
        }
    }
}

