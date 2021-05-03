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
        return view('race.show', $this->compose(Race::find($id)));
    }

    public function participants($raceId)
    {
        return view('race.participants.index', $this->compose(Race::find($raceId)));
    }

    private function compose($race)
    {
        return [
            'race' => $race,
            'navigation' =>  [
                [
                    'label' => 'Informations',
                    'route' => [
                        'name' => 'race.show',
                        'parameters' => [
                            'id' => $race->id
                        ]
                    ],
                    'icon' => 'heroicon-o-information-circle',
                ],
                [
                    'label' => 'Participants',
                    'route' => [
                        'name' => 'race-participants.index',
                        'parameters' => [
                            'race_id' => $race->id
                        ]
                    ],
                    'icon' => 'heroicon-o-user-group',
                ]
            ]
        ];
    }
}
