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
        return view('livewire.show-race', [
            'race' => Race::find($id)
        ]);
    }
}
