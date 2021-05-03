<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttachRaceRunnerAction extends Action
{
    use Confirmable, HasRaceState, AuthorizesRequests;

    public $title = 'Attach Runner';

    public $icon = 'user-check';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really attach this Runner?';
    }

    public function renderIf($item)
    {
        $r = $item->races->filter(function ($race)  {
            return $race->id === $this->race->id;
        });

        return $r->count() === 0;
    }

    public function handle($model)
    {
        $races = $model->races()->where('date', $this->race->date)->get();

        $hasRaceIntheSameDay = $races->count() > 0;

        if (!$hasRaceIntheSameDay){
           $model->races()->sync($this->race->id);
        }
    }
}
