<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;

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
Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register']);
//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//reset-password
Route::get('/password/reset', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.update');
//index
Route::get('/', [ArticleController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
