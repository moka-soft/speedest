<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunnerController extends Controller
{
    public function index(Request $request)
    {
        return view('runner.index', [
            'request' => $request
        ]);
    }
}
