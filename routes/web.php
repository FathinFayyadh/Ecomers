<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/* get */

Route::middleware(['UserMiddleware:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('Dashboard');
    Route::get('/create-product',[AdminController::class,'createproduct'])->name('create-product');
    Route::get('/manageproduct',[AdminController::class,'manageproduct'])->name('manage.product');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'Login'])->name('login.create');
Route::get('/register', [HomeController::class, 'register'])->name('register.create');
Route::get('/login-admin',[AdminController::class,'loginAdmin'])->name('login-admin');



// Post
Route::post('/login', [FormController::class, 'LoginStore'])->name('login.store');
Route::post('/register', [FormController::class, 'RegisterStore'])->name('register.store');
Route::post('/logout', [FormController::class, 'logout'])->name('logout');
Route::post('/create-product', [AdminController::class, 'getproduct'])->name('store.product');