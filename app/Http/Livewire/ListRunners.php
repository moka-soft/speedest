<?php

namespace App\Http\Livewire;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ListRunners extends DataTableComponent
{
    protected $listeners = ['refreshRunnersList' => '$refresh'];

    public string $emptyMessage ='You not have runners to list.';

    public function columns(): array
    {
        return [
            Column::make(__('id'))->sortable(),
            Column::make(__('Name'))->sortable(),
            Column::make(__('Code'))->sortable(),
            Column::make(__('Updated at'))->sortable(),
            Column::make(__('Actions'))->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return Runner::query()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->orderBy('updated_at', 'desc');
    }

    public function rowView(): string
    {
        return 'livewire.list-runners-row';
    }
}
