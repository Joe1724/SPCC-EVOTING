<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ResultController; // <-- Added result controller
use App\Http\Controllers\InformationController; // <-- Added information controller
use App\Http\Controllers\Voter\NomineeController as VoterNomineeController;
use App\Http\Middleware\PreventBackHistory;

// Public routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/', fn() => view('welcome'));
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login.form');
    Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
});

// Voter routes (accessible only by authenticated users)
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/dashboard', fn() => view('voter.index'))->name('voter.dashboard');
    Route::get('/vote', [VoteController::class, 'index'])->name('vote');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
    Route::get('/nominees', [NomineeController::class, 'index'])->name('voter.nominees');
    Route::get('/results', [ResultController::class, 'index'])->name('voter.results'); //
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Admin routes (accessible only by authenticated admins)
// Admin routes (accessible only by authenticated admins)
Route::middleware(['auth', 'admin', PreventBackHistory::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('nominees', NomineeController::class);
    });

    Route::get('/admin/results', [ResultController::class, 'index'])->name('admin.results');
    Route::get('/admin/information', [InformationController::class, 'index'])->name('admin.information');

});


// Voter-specific Nominee Routes
Route::prefix('voter')->middleware('auth')->group(function () {
    Route::get('/nominees', [NomineeController::class, 'index'])->name('voter.nominees');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin', PreventBackHistory::class])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
    Route::delete('/users/delete-voters', [UserController::class, 'deleteVoters'])->name('users.deleteVoters');
});



Route::get('/admin/information', [InformationController::class, 'index'])->middleware('admin');




Route::get('/admin/information/export', [InformationController::class, 'exportPdf'])->name('admin.information.export');

use App\Http\Controllers\UserImportController;

Route::get('/admin/users/import', [UserImportController::class, 'showImportForm'])->name('admin.users.import');
Route::post('/admin/users/import', [UserImportController::class, 'import'])->name('admin.users.import');
