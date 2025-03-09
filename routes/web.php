<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Models\Position;
use App\Http\Controllers\ElectionController;





Route::get('/vote', function () {
    $positions = Position::with('nominees')->get();
    return view('vote', compact('positions'));
})->name('vote.view');

Route::post('/vote', [VoteController::class, '__invoke'])->name('vote');


Route::get('/positions', [PositionController::class, 'showPositionsPage'])->name('positions.index');
Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
Route::put('/positions/{position}', [PositionController::class, 'update'])->name('positions.update');
Route::delete('/positions/{position}', [PositionController::class, 'destroy'])->name('positions.destroy');


Route::get('/elections', [ElectionController::class, 'index'])->name('elections.view');
Route::post('/elections/add', [ElectionController::class, 'addElection'])->name('elections.add');
Route::post('/elections/start', [ElectionController::class, 'startElection'])->name('elections.start');
Route::post('/elections/stop', [ElectionController::class, 'stopElection'])->name('elections.stop');
