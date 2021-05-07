<?php

namespace App\Http\Livewire;

use App\Enums\RaceRunnerStatusEnum;
use App\Models\RaceRunner;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Jetstream\InteractsWithBanner;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class ListRaceRunners extends ListRunners
{
    use InteractsWithBanner;

    public $race;

    protected $listeners = ['refreshRaceRunnersList' => '$refresh'];

    public function getEmptyMessage(): string
    {
        return __('You not have runners to list.');
    }

    public function filters(): array
    {
        return [
            __('status') => Filter::make(__('Status'))
                ->select([
                    '' => __('All'),
                    __('pending') => RaceRunnerStatusEnum::pending(),
                    __('running') => RaceRunnerStatusEnum::running(),
                    __('completed') => RaceRunnerStatusEnum::completed()
                ])
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name')),
            Column::make(__('Subs. Code')),
            Column::make(__('Status')),
            Column::make(__('Actions'))->addClass('flex justify-end')
        ];
    }

    public function detachRunner($id)
    {
        $runner = Runner::find($id);

        try {
            $runner->detachRace($this->race);
            $this->dangerBanner(___('Runner', $runner->name, 'detached.'));
            $this->emit('refreshRaceRunnersList');
            $this->emit('refreshRaceHeader', $this->race);
        } catch (\Exception $exception) {
            $this->dangerBanner($exception->getMessage());
        }
    }

    public function query(): Builder
    {
        return RaceRunner::query()
            ->when($this->getFilter(__('status')), function ($query, $status) {
                if ($status == RaceRunnerStatusEnum::pending())
                    return $query->where('end_at', '=', null)->where('start_at', '=', null);

                if ($status == RaceRunnerStatusEnum::completed())
                    return $query->where('end_at', '!=', null)->where('start_at', '!=', null);

                if ($status == RaceRunnerStatusEnum::running())
                    return $query->where('end_at', '=', null)->where('start_at', '!=', null);

                return $query;
            })
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->where('race_id', '=', $this->race->id);
    }

    public function rowView(): string
    {
        return 'livewire.list-race-runners-row';
    }
}
