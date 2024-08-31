<?php

use App\Http\Controllers\Instructor\Auth\LoginController;
use App\Http\Controllers\Instructor\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:instructor')->group(function () {
    Route::prefix('instructor')->name('instructor.')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.store');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::middleware('auth:instructor')->group(function () {
    Route::prefix('instructor')->name('instructor.')->group(function () {
        Route::get('/home', function () {
            return view('instructor.home');
        })->name('home');
    });
});
