<?php
use App\Http\Controllers\VoteController;
use Illuminate\Routing\Route;

Route::post('/vote', [VoteController::class, 'vote']);
Route::get('/results/{election_id}', [VoteController::class, 'results']);
