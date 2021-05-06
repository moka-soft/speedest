<?php

namespace App\Http\Livewire;

use App\Models\RaceRunner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ListRaceRunners extends ListRunners
{
    public $race;

    protected $listeners = ['refreshRaceRunnersList' => '$refresh'];

    public string $emptyMessage = 'You not has added runners ;(';

    public function columns(): array
    {
        return [
            Column::make('Name'),
            Column::make('Subs. Code'),
            Column::make('Status'),
            Column::make('Actions')->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return RaceRunner::query()
            ->where('race_id', '=', $this->race->id)
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function rowView(): string
    {
        return 'livewire.list-race-runners-row';
    }
}
