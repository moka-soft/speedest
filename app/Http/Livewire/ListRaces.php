<?php

namespace App\Http\Livewire;

use App\Models\Race;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ListRaces extends DataTableComponent
{
    protected $listeners = ['refreshRacesList' => '$refresh'];

    public function columns(): array
    {
        return [
            Column::make('id')->sortable(),
            Column::make('Name')->sortable(),
            Column::make('Date')->sortable(),
            Column::make('Updated at')->sortable(),
            Column::make('Status'),
            Column::make('Actions')->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return Race::query()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function rowView(): string
    {
        return 'livewire.list-races-row';
    }
}
