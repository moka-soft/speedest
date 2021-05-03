<?php

namespace App\Http\Livewire;

use App\Actions\AttachRunnerRaceAction;
use App\Actions\DetachRunnerRaceAction;
use App\Actions\MarkRaceParticipationUnfinishedAction;
use App\Filters\RaceParticipantsFilter;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

class ListRaceParticipants extends ListView
{
    public $searchBy = ['name', 'cpf'];

    public $paginate = 10;

    public $race;

    public $itemComponent = 'livewire.list-race-participants';

    public function repository(): Builder
    {
        return Runner::query();
    }

    public function markParticipationFinished($runner_id)
    {
        $this->emit('openModal', 'mark-participation-finished', ['race_id' => $this->race->id, 'runner_id' => $runner_id]);
    }

    protected function actionsByRow()
    {
        return [
            (new MarkRaceParticipationUnfinishedAction)->setRace($this->race),
            (new AttachRunnerRaceAction)->setRace($this->race),
            (new DetachRunnerRaceAction)->setRace($this->race)
        ];
    }

    protected function filters()
    {
        return [
            new RaceParticipantsFilter
        ];
    }

    public function data($model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'cpf' => $model->cpf
        ];
    }
}
