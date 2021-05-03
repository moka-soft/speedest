<?php

namespace App\Http\Livewire;

use App\Actions\AttachRunnerRaceAction;
use App\Actions\DetachRunnerRaceAction;
use App\Filters\RaceParticipantsFilter;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;
use LaravelViews\Facades\Header;

class ListRaceParticipants extends ListView
{
    public $searchBy = ['name', 'cpf'];

    public $paginate = 10;

    public $itemComponent = 'livewire.list-race-participants';

    public function repository(): Builder
    {
        return Runner::query();
    }

    protected function actionsByRow()
    {
        return [
            new AttachRunnerRaceAction,
            new DetachRunnerRaceAction
        ];
    }

    protected function filters()
    {
        return [
            new RaceParticipantsFilter
        ];
    }

    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            'Cpf',
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
