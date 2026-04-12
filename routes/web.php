<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Auth routes (all manually created)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Protected routes (require authentication)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

// Page routes
Route::get('/trading', [PageController::class, 'trading'])->name('trading');
Route::get('/system', [PageController::class, 'system'])->name('system');
Route::get('/company', [PageController::class, 'company'])->name('company');
Route::get('/education', [PageController::class, 'education'])->name('education');