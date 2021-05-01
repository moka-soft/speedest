<?php

namespace App\Http\Controllers;

class RunnerController extends Controller
{
    public function index()
    {
        return view('livewire.list-runners');
    }
}
