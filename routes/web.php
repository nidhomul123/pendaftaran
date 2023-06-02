<?php

use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('reload_captcha', [CaptchaValidationController::class, 'reloadCaptcha'])->name('reload_captcha');
Route::post('captcha_validation', [CaptchaValidationController::class, 'captchaValidation'])->name('captcha_validation');

Route::post('register', [RegistrationController::class, 'register'])->name('registration.register');

Auth::routes(['register' => false]);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(FormController::class)->group(function () {
    Route::get('form', 'index')->name('form');
    Route::get('form/detail/{id}', 'detail')->name('form.detail');
    Route::post('form/accept', 'accept')->name('form.accept');
    Route::post('form/reject', 'reject')->name('form.reject');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::put('profile/update', 'update')->name('profile.update');
});
