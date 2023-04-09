<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserAccountController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudySectionController;
use App\Http\Controllers\QuestionController;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('study', StudySectionController::class);

    Route::get('user', [UserAccountController::class, 'index'])->name('user');

    Route::get('testing/{id}/{question_id}', [QuestionController::class, 'index'])->name('testing');
    Route::post('testing', [QuestionController::class, 'store'])->name('testing.store');

    Route::get('result/{study_section_id}', [QuestionController::class, 'result'])->name('result');
});

Route::get('rating', [IndexController::class, 'rating'])->name('rating');

Route::get('email/verify', function (){
    return inertia('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');

// VERIFICATION
Route::get('email/verify', function (){
    return inertia('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home')->with('success', 'Електронну пошту підтверджено!');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect()->route('home')->with('success', 'Посилання для підтвердження електронної пошти надіслано!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

