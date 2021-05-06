<?php

namespace App\Http\Livewire;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ListRunners extends DataTableComponent
{
    protected $listeners = ['refreshRunnersList' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('ID')->sortable(),
            Column::make('Name')->sortable(),
            Column::make('Code')->sortable(),
            Column::make('Actions')->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return Runner::query()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function rowView(): string
    {
        return 'livewire.list-runners-row';
    }
}
