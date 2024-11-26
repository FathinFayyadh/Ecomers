<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/* get */
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [HomeController::class, 'Login'])->name('login.create');
Route::get('/register', [HomeController::class, 'register'])->name('register.create');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('Dashboard');
Route::get('/login-admin',[AdminController::class,'loginAdmin'])->name('login-admin');
Route::get('/create-product',[AdminController::class,'createproduct'])->name('create-product');
Route::get('/manageproduct',[AdminController::class,'manageproduct'])->name('manageproduct');

// Post
Route::post('/login', [HomeController::class, 'login'])->name('login.store');
Route::post('/register', [HomeController::class, 'register'])->name('register.store');
Route::post('/create-product', [AdminController::class, 'adminstrore'])->name('adminstrore');    
