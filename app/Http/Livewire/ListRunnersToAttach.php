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

    public array $perPageAccepted = [5, 10, 15];

    public int $perPage = 5;

    public bool $showPagination = false;

    public $race;

    public $runnersAttached = [];

    public string $emptyMessage ='Try search a term.';

    public function mount($race)
    {
        $this->race = Race::findOrFail($race['id']);

        if (!$this->runnersAttached)
            $this->runnersAttached = $this->race->runners->pluck('id')->toArray();
    }

    public function attachRunner($id)
    {
        $runner = Runner::findOrFail($id);

        try {
            $runner->attachRace($this->race);
            $this->banner(___('Runner', $runner->name, 'attached.'));
            $this->emit('refreshRaceRunnersList');
            $this->emit('refreshRaceHeader', $this->race);
        } catch (\Exception $exception) {
            $this->dangerBanner($exception->getMessage());
        }
    }

    public function detachRunner($id)
    {
        $runner = Runner::findOrFail($id);

        try {
            $runner->detachRace($this->race);
            $this->dangerBanner(___('Runner', $runner->name, 'detached.'));
            $this->emit('refreshRaceRunnersList');
            $this->emit('refreshRaceHeader', $this->race);
        } catch (\Exception $exception) {
            $this->dangerBanner($exception->getMessage());
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Runner'),
            Column::make(___('Attach', '/', 'Detach'))->addClass('flex justify-end')
        ];
    }

    public function query(): Builder
    {
        return Runner::query()
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when(count($this->runnersAttached) > 0 && !$this->getFilter('search'), fn (Builder $query) => $query->whereNotIn('id', $this->runnersAttached));
    }

    public function rowView(): string
    {
        return 'livewire.list-runners-to-attach-row';
    }
}
