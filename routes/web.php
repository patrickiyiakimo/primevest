<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Make a Deposit
    Route::get('/deposit', function () { return view('dashboard.deposit'); })->name('deposit');
    Route::get('/invest', function () { return view('dashboard.invest'); })->name('invest');
    Route::get('/withdraw', function () { return view('dashboard.withdraw'); })->name('withdraw');
    
    // Buy Crypto
    Route::get('/buy-crypto', function () { return view('dashboard.buy-crypto'); })->name('buy-crypto');
    
    // Stocks
    Route::get('/stock-trading', function () { return view('dashboard.stock-trading'); })->name('stock-trading');
    
    // History
    Route::get('/deposits-history', function () { return view('dashboard.deposits-history'); })->name('deposits-history');
    Route::get('/withdrawals-history', function () { return view('dashboard.withdrawals-history'); })->name('withdrawals-history');
    Route::get('/earnings-history', function () { return view('dashboard.earnings-history'); })->name('earnings-history');
    Route::get('/investments-history', function () { return view('dashboard.investments-history'); })->name('investments-history');
    
    // Account
    Route::get('/card-application', function () { return view('dashboard.card-application'); })->name('card-application');
});

// Page routes
Route::get('/trading', [PageController::class, 'trading'])->name('trading');
Route::get('/system', [PageController::class, 'system'])->name('system');
Route::get('/company', [PageController::class, 'company'])->name('company');
Route::get('/education', [PageController::class, 'education'])->name('education');