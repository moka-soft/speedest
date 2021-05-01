<?php

namespace App\Http\Livewire;

use App\Actions\DestroyRunnerAction;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;
use LaravelViews\Facades\Header;
use App\Filters\RunnersCreatedAtFilter;

class ListRunners extends TableView
{
    public $searchBy = ['name', 'cpf'];

    public function repository(): Builder
    {
        return Runner::query();
    }

    protected function actionsByRow()
    {
        return [
            new DestroyRunnerAction
        ];
    }

    protected function filters()
    {
        return [
            new RunnersCreatedAtFilter
        ];
    }

    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('id'),
            Header::title('Name')->sortBy('name'),
            'Cpf',
            Header::title('Birth date')->sortBy('birth_date'),
            Header::title('Created at')->sortBy('created_at'),
            Header::title('Updated at')->sortBy('updated_at'),
        ];
    }

    public function row($model): array
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'cpf' => $model->cpf,
            'birth_date' => $model->birth_date->format('Y/m/d'),
            'created_at' => $model->created_at->diffForhumans(),
            'updated_at' => $model->updated_at->diffForhumans(),
        ];
    }
}
