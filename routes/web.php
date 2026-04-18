<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
    // ===== WITHDRAW ROUTES (Using closures - no controller needed) =====
    Route::get('/withdraw', function () {
        return view('dashboard.withdraw');
    })->name('withdraw');
    
    Route::post('/withdraw/request', function (Request $request) {
        $user = Auth::user();
        
        $validated = $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric|min:1000|max:500000',
            'wallet_address' => 'required|string|max:255',
            'network' => 'required|string',
        ]);
        
        // Check if user has sufficient balance
        if ($validated['amount'] > $user->balance) {
            return redirect()->back()->with('error', 'Insufficient balance.')->withInput();
        }
        
        return redirect()->route('withdraw')->with('success', 'Withdrawal request submitted successfully! Our team will process it within 24 hours.');
    })->name('withdraw.request');
    // ==========================================

    // Card Application Routes
Route::middleware('auth')->group(function () {
    Route::get('/card-application', function () {
        return view('dashboard.card-application');
    })->name('card-application');
    
    Route::post('/card-application/submit', function (Request $request) {
        $user = Auth::user();
        
        if ($user->balance < 2000) {
            return redirect()->back()->with('error', 'Minimum balance of $2,000 required to apply for a card');
        }
        
        $validated = $request->validate([
            'card_type' => 'required|string',
            'delivery_address' => 'required|string',
            'phone' => 'nullable|string',
            'id_type' => 'required|string',
        ]);
        
        return redirect()->route('card-application')->with('success', 'Card application submitted successfully! You will receive your card within 7-10 business days.');
    })->name('card-application.submit');
});

 // History Routes
    Route::get('/deposits-history', [DepositHistoryController::class, 'index'])->name('deposits-history');
    Route::get('/withdrawals-history', function () { return view('dashboard.withdrawals-history'); })->name('withdrawals-history');
    Route::get('/earnings-history', function () { return view('dashboard.earnings-history'); })->name('earnings-history');
    Route::get('/investments-history', function () { return view('dashboard.investments-history'); })->name('investments-history');
    
    // Make a Deposit
    Route::get('/deposit', function () { return view('dashboard.deposit'); })->name('deposit');
    Route::get('/invest', function () { return view('dashboard.invest'); })->name('invest');
    
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