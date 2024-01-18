<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JournalistController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//reset-password
Route::get('/password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');
//index

Route::get('/dashboard', [DashboardController::class, "showDashboard"])->name('dashboard');

Route::resource('articles', ArticleController::class);

// Assuming you have authentication set up:
Route::middleware(['auth'])->group(function () {
    // Place any routes that require the user to be authenticated inside this group

    // Additional custom routes for authenticated users
    // For example, a route to the journalist dashboard
    Route::get('/journalist/dashboard', [JournalistController::class, 'dashboard'])->name('journalist.dashboard');
    Route::resource('articles', ArticleController::class);

});


Route::get('/', [ArticleController::class, 'index']);
