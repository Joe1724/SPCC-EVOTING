<?php
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->post('/vote', VoteController::class);
