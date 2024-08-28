<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class,'index'])->name('landing.index');

Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register/user',[RegisterController::class, 'store'])->name('register.store');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login/user',[LoginController::class,'login'])->name('login.login');


Route::post('/logout',[LogoutController::class,'logout'])->name('logout.logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/account/{user:name}',[AccountController::class, 'index'])->name('account.index');
    // Add more routes here that require authentication
});
