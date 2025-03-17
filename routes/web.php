<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\PartylistController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ResultController;


Route::resource('elections', ElectionController::class);

Route::resource('nominees', NomineeController::class);



Route::resource('partylists', PartylistController::class);


Route::resource('positions', PositionController::class);


Route::resource('votes', VoteController::class);
