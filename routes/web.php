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
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ImageController;



Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('register.store');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('rating', [IndexController::class, 'rating'])->name('rating');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user', [UserAccountController::class, 'index'])->name('user');
    Route::get('testing/{id}', [QuestionController::class, 'index'])->name('testing');
    Route::post('testing/{id}', [QuestionController::class, 'store'])->name('testing.store');
    Route::get('result/{id}', [QuestionController::class, 'result'])->name('result');
    Route::resource('study', StudySectionController::class)->only(['index', 'show']);
    Route::resource('notification', NotificationController::class)->only(['index', 'update', 'destroy']);
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/admin-study', AdminStudySectionController::class);
    Route::resource('/questions',  AdminQuestionController::class);
    Route::get('/users', [AdminUserController::class, 'users'])->name('admin.users');
    Route::get('/admins', [AdminUserController::class, 'admins'])->name('admin.admins');
    Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('upload.image');
});


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

