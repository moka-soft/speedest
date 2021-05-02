<?php

namespace App\Http\Livewire;

use App\Actions\DestroyRacerAction;
use App\Actions\ShowRaceAction;
use App\Filters\RacesDateFilter;
use App\Filters\RacesTypeFilter;
use App\Models\Race;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use LaravelViews\Facades\Header;

class ListRaces extends TableView
{
    public $searchBy = ['name'];

    public function repository(): Builder
    {
        return Race::query();
    }

    protected function actionsByRow()
    {
        return [
            new ShowRaceAction,
            new DestroyRacerAction
        ];
    }

    protected function filters()
    {
        return [
            new RacesTypeFilter,
            new RacesDateFilter
        ];
    }

    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            Header::title('Date')->sortBy('date'),
            'Status',
            Header::title('Type')->sortBy('type_id'),
            'Distance',
            Header::title('Updated at')->sortBy('updated_at')
        ];
    }

    public function row($model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'date' => $model->date->format('Y/m/d'),
            'status' => $model->status,
            'type' => $model->type->name,
            'distance' => $model->type->distance / 1000 . ' KM',
            'updated_at' => $model->updated_at->diffForhumans()
        ];
    }
}
