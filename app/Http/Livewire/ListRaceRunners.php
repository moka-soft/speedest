<?php

namespace App\Http\Livewire;

use App\Enums\RaceRunnerEnum;
use App\Models\RaceRunner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ListRaceRunners extends ListRunners
{
    public $race;

    protected $listeners = ['refreshRaceRunnersList' => '$refresh'];

    public string $emptyMessage = 'You not have runners to list ;(';

    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => __('All'),
                    'pending' => RaceRunnerEnum::pending(),
                    'running' => RaceRunnerEnum::running(),
                    'completed' => RaceRunnerEnum::completed()
                ])
        ];
    }

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
            ->when($this->getFilter('status'), function ($query, $status) {
                if ($status == RaceRunnerEnum::pending())
                    return $query->where('end_at', '=', null)->where('start_at', '=', null);

                if ($status == RaceRunnerEnum::completed())
                    return $query->where('end_at', '!=', null)->where('start_at', '!=', null);

                if ($status == RaceRunnerEnum::running())
                    return $query->where('end_at', '=', null)->where('start_at', '!=', null);

                return $query;
            })
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function rowView(): string
    {
        return 'livewire.list-race-runners-row';
    }
}
