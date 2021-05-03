<?php

namespace App\Http\Livewire;

use App\Actions\AttachRaceRunnerAction;
use App\Actions\DetachRaceRunnerAction;
use App\Actions\MarkRaceRunnerUnfinishedAction;
use App\Filters\RaceRunnersFilter;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

class ListRaceRunners extends ListView
{
    public $searchBy = ['name', 'cpf'];

    public $paginate = 10;

    public $race;

    public $itemComponent = 'livewire.list-race-runners';

    public function repository(): Builder
    {
        return Runner::query();
    }

    public function markRunnerFinished($runner_id)
    {
        $this->emit('openModal', 'mark-race-runner-finished', ['race_id' => $this->race->id, 'runner_id' => $runner_id]);
    }

    protected function actionsByRow()
    {
        return [
            (new MarkRaceRunnerUnfinishedAction)->setRace($this->race),
            (new AttachRaceRunnerAction)->setRace($this->race),
            (new DetachRaceRunnerAction)->setRace($this->race)
        ];
    }

    protected function filters()
    {
        return [
            (new RaceRunnersFilter())->setRace($this->race)
        ];
    }

    public function data($model): array
    {
        $races = $model->races->filter(function ($race)  {
            return $race->id === $this->race->id;
        });

        return [
            'attached' => $races->count() !== 0,
            'finished' => isset($races->first()->pivot->end_at)
        ];
    }
}
