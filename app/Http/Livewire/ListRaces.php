<?php

namespace App\Http\Livewire;

use App\Enums\RaceStatusEnum;
use App\Models\Race;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ListRaces extends DataTableComponent
{
    protected $listeners = ['refreshRacesList' => '$refresh'];

    public function getEmptyMessage(): string
    {
        return __('You not have races to list.');
    }

    public function filters(): array
    {
        return [
            __('status') => Filter::make(__('Status'))
                ->select([
                    '' => __('All'),
                    __('coming') => RaceStatusEnum::coming(),
                    __('running') => RaceStatusEnum::running(),
                    __('completed') => RaceStatusEnum::completed()
                ])
        ];
    }

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
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter(__('status')), function ($query, $status) {
                if ($status == RaceStatusEnum::coming())
                    return $query->where('date', '>', now());

                if ($status == RaceStatusEnum::completed())
                    return $query->where('date', '<', now());

                if ($status == RaceStatusEnum::running())
                    return $query->where('date', '=', now()->format('Y-m-d'));

                return $query;
            })
            ->orderBy('updated_at', 'desc');
    }

    public function rowView(): string
    {
        return 'livewire.list-races-row';
    }
}
