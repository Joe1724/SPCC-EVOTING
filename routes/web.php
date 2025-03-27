<?php
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/', function () {
    return view('welcome');
});
// Nominees Routes


Route::get('/nominees', [NomineeController::class, 'index'])->name('nominees.index')->middleware('auth');
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


// Authentication Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (protected routes)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Create this file for admin dashboard
    })->name('admin.dashboard')->middleware('is_admin');

    Route::get('/voter/dashboard', function () {
        return view('voter.dashboard'); // Create this file for voter dashboard
    })->name('voter.dashboard');
});

// Middleware for Admin Access
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', function () {
        return "Admin Page";
    });
});
