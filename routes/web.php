<?php
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Nominees Routes


Route::get('/nominees', [NomineeController::class, 'index'])->name('nominees.index');
Route::get('/nominees/create', [NomineeController::class, 'create'])->name('nominees.create');
Route::post('/nominees', [NomineeController::class, 'store'])->name('nominees.store');
Route::get('/nominees/{id}/edit', [NomineeController::class, 'edit'])->name('nominees.edit'); // ✅ Ensure this route exists
Route::put('/nominees/{id}', [NomineeController::class, 'update'])->name('nominees.update');


// Votes Routes
Route::get('/votes', [VoteController::class, 'index'])->name('votes.index');
Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');

// Settings Routes
Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
