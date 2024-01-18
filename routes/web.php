<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\EditorController;



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

Route::middleware(['auth'])->group(function () {


    Route::get('articles/{id}/status', [ArticleController::class, 'editStatus'])->name('articles.editStatus');
    Route::put('articles/{id}/status', [ArticleController::class, 'updateStatus'])->name('articles.updateStatus');

    Route::get('/editor/dashboard', [EditorController::class, 'dashboard'])->name('editor.dashboard');
    Route::get('/journalist/dashboard', [JournalistController::class, 'dashboard'])->name('journalist.dashboard');

    Route::resource('articles', ArticleController::class);

});


Route::get('/', [ArticleController::class, 'index']);
