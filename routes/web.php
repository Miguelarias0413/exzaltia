<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClothingController;
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




Route::middleware(['auth'])->group(function () {
    Route::post('/logout',[LogoutController::class,'logout'])->name('logout.logout');
    Route::get('/account/{user:name}',[AccountController::class, 'index'])->name('account.index');
    Route::get('/cart',[ClothingController::class, 'cartIndex'])->name('cart');
    Route::get('/cart/get-quantity-cart',[ClothingController::class, 'getQuantityFromCart'])->name('getQuantityFromCart');
    Route::post('/cart/add-to-cart',[ClothingController::class, 'addClothingToUserCart'])->name('addClothingToUserCart');
    Route::post('/cart/destroy/{clothingItem}',[ClothingController::class, 'destroy'])->name('cart.destroy');
    // Add more routes here that require authentication makePayment
    Route::post('/cart/makePayment',[ClothingController::class, 'makePayment'])->name('cart.makePayment');
    
});


Route::middleware(['admin'])->group(function (){

    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/clothing/create',[AdminController::class,'create'])->name('admin.create');
    Route::post('/admin/clothing/store',[AdminController::class,'store'])->name('admin.store');

});


Route::get('/clothing/{clothingitem:name}',[ClothingController::class,'show'])->name('clothing.show');