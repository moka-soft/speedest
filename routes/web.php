<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => ['web', 'auth:sanctum', 'verified'],
], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/runners', [\App\Http\Controllers\RunnerController::class, 'index'])->name('runners');
    Route::get('/races', [\App\Http\Controllers\RaceController::class, 'index'])->name('races');
    Route::get('/race/{id}', [\App\Http\Controllers\RaceController::class, 'show'])->name('race.show');
});

