<?php

namespace App\Http\Controllers;

use App\Models\Race;

class RaceController extends Controller
{
    public function index()
    {
        return view('race.index');
    }

    public function show($id)
    {
        return $this->view('race.show', $id);
    }

    public function runners($raceId)
    {
        return $this->view('race.runners', $raceId);
    }

    public function results($raceId)
    {
        return $this->view('race.results', $raceId);
    }

    private function compose($race)
    {
        return [
            'race' => $race,
            'navigation' =>  [
                [
                    'label' => __('Info'),
                    'route' => [
                        'name' => 'race.show',
                        'parameters' => [
                            'id' => $race->id,
                        ]
                    ],
                    'icon' => 'heroicon-o-information-circle',
                ],
                [
                    'label' => __('Runners'),
                    'route' => [
                        'name' => 'race-runners',
                        'parameters' => [
                            'race_id' => $race->id,
                        ]
                    ],
                    'icon' => 'heroicon-o-user-group',
                ],
                [
                    'label' => __('Results'),
                    'route' => [
                        'name' => 'race-results',
                        'parameters' => [
                            'race_id' => $race->id,
                        ]
                    ],
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
