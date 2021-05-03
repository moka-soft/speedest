<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AttachRunnerRaceAction extends Action
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
            $result = $model->races()->sync($this->race->id);
        }

        if (!isset($result['attached']))
            session()->flash('notifier', ['type' => 'error', 'text' => __('The Runner was already been attached in this Race!')]);

        if ($hasRaceIntheSameDay && $races->first()->id !== $this->race->id)
            session()->flash('notifier', ['type' => 'error','duration' => 10000 ,'text' => __('The Runner has a Race participation in the same date given!')]);

        if (!$hasRaceIntheSameDay && isset($result['attached']))
            session()->flash('notifier', ['text' => __('Runner has been attached!')]);

        redirect()->route('race-runners', $this->race->id);
    }
}
