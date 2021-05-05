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
        $races = $item->races->filter(function ($race)  {
            return $race->id === $this->race->id;
        });

        return $races->count() === 0;
    }

    public function handle($model)
    {
        try {
            $model->attachRace($this->race);
        } catch (\Exception $exception) {
            session()->flash('notifier', ['type' => 'error', 'text' => __($exception->getMessage())]);
            redirect()->route('race-runners', $this->race->id);
        }
    }
}

