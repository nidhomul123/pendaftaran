<?php

use App\Http\Controllers\CaptchaValidationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
