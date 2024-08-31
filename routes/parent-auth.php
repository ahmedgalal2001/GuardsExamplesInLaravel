<?php

use App\Http\Controllers\Parent\Auth\LoginController;
use App\Http\Controllers\Parent\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:parent')->group(function () {
    Route::prefix('parent')->name('parent.')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.store');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
    });
});

Route::middleware('auth:parent')->group(function () {
    Route::prefix('parent')->name('parent.')->group(function () {
        Route::get('/home', function () {
            return view('parent.home');
        })->name('home');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
