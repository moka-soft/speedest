<?php

namespace App\Http\Livewire;

use App\Models\Race;
use App\Models\Runner;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Jetstream\InteractsWithBanner;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ListRunnersToAttach extends ListRunners
{
    use InteractsWithBanner;

    protected $listeners = ['refreshRunnersToAttachList' => '$refresh'];

    public string $emptyMessage = 'Search a term to to list';

    public array $perPageAccepted = [5, 10, 15];

    public int $perPage = 5;

    public bool $showPagination = false;

    public $race;

    public $runnersNotIncluded = [];

    public function mount($race)
    {
        $this->race = Race::find($race['id']);

        if (!$this->runnersNotIncluded)
            $this->runnersNotIncluded = $this->race->runners->pluck('id');
    }

    public function attachRunner($id)
    {
        $runner = Runner::find($id);
        $this->runnersNotIncluded = $this->race->runners->pluck('id');

        try {
            $runner->attachRace($this->race);
            $this->banner(__("Runner $runner->name attached'."));
            $this->emit('refreshRaceRunnersList');
            $this->emit('refreshRaceHeader', $this->race);
        } catch (\Exception $exception) {
            $this->dangerBanner( __($exception->getMessage()));
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Runner'),
            Column::make('Attach')->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return Runner::query()
            ->when(!$this->getFilter('search'),
                fn (Builder $query) => $query->join('race_runners', 'runners.id', '=', 'race_runners.runner_id')
                    ->select('race_runners.*', 'runners.id', 'runners.name', 'runners.code')
                    ->whereNotIn('race_runners.runner_id', $this->runnersNotIncluded))
                    ->distinct()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function rowView(): string
    {
        return 'livewire.list-runners-to-attach-row';
    }
}
