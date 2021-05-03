<?php

namespace App\Http\Controllers;

use App\Models\Race;

class RaceController extends Controller
{
    public function index()
    {
        return view('livewire.list-races');
    }

    public function show($id)
    {
        return $this->view('race.show', $id);
    }

    public function participants($raceId)
    {
        return $this->view('race.participants.index', $raceId);
    }

    public function results($raceId)
    {
        return $this->view('race.results', $raceId);
    }

    private function compose($race)
    {
        $route = function ($name) use ($race) {
            return [
                'name' => $name,
                'parameters' => [
                    'id' => $race->id,
                    'race_id' => $race->id
                ]
            ];
        };

        return [
            'race' => $race,
            'navigation' =>  [
                [
                    'label' => 'Info',
                    'route' => $route('race.show'),
                    'icon' => 'heroicon-o-information-circle',
                ],
                [
                    'label' => 'Participants',
                    'route' => $route('race-participants.index'),
                    'icon' => 'heroicon-o-user-group',
                ],
                [
                    'label' => 'Results',
                    'route' => $route('race-results'),
                    'icon' => 'heroicon-o-document-report',
                ]
            ]
        ];
    }

    private function view($view, $raceId)
    {
        return view($view, $this->compose(Race::find($raceId)));
    }
}
