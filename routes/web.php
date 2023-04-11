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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminStudySectionController;



Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('register.store');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('study', StudySectionController::class)->only(['index', 'show']);

    Route::get('user', [UserAccountController::class, 'index'])->name('user');

    Route::get('testing/{id}/{question_id}', [QuestionController::class, 'index'])->name('testing');
    Route::post('testing', [QuestionController::class, 'store'])->name('testing.store');

    Route::get('result/{study_section_id}', [QuestionController::class, 'result'])->name('result');

    Route::resource('notification', NotificationController::class)->only(['index', 'update', 'destroy']);
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/study', AdminStudySectionController::class);
});
Route::get('rating', [IndexController::class, 'rating'])->name('rating');


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

