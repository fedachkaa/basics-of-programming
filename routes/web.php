<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudySectionController;

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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('register', [UserController::class, 'create'])
    ->name('register');
Route::post('register', [UserController::class, 'store'])
    ->name('register.store');

Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('study', StudySectionController::class);

Route::get('user', [\App\Http\Controllers\UserAccountController::class, 'index'])->name('user');
