<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DepositHistoryController;
use App\Http\Controllers\WithdrawalHistoryController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\InvestmentController;

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

// Admin Routes (only for admins)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserManagementController::class, 'index'])->name('users');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    
    // Deposit management routes
    Route::get('/deposits', [AdminController::class, 'deposits'])->name('deposits');
    Route::post('/deposits/{id}/approve', [AdminController::class, 'approveDeposit'])->name('deposits.approve');
    Route::post('/deposits/{id}/reject', [AdminController::class, 'rejectDeposit'])->name('deposits.reject');
    
    // Withdrawal management routes
    Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('withdrawals');
    Route::post('/withdrawals/{id}/approve', [AdminController::class, 'approveWithdrawal'])->name('withdrawals.approve');
    Route::post('/withdrawals/{id}/reject', [AdminController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
    
    // Admin investment view
    Route::get('/investments', [AdminController::class, 'investments'])->name('investments');
});

// User Investment Routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/invest/store', [InvestmentController::class, 'store'])->name('invest.store');
});

// Deposit Routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/deposit/request', [DepositController::class, 'request'])->name('deposit.request');
});

// Withdraw Routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/withdraw', [WithdrawalController::class, 'index'])->name('withdraw');
    Route::post('/withdraw/request', [WithdrawalController::class, 'request'])->name('withdraw.request');
});

// Protected routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // Card Application Routes
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
        
        return redirect()->route('card-application')->with('success', 'Card application submitted successfully!');
    })->name('card-application.submit');
    
    // History Routes
    Route::get('/deposits-history', [DepositHistoryController::class, 'index'])->name('deposits-history');
    Route::get('/withdrawals-history', [WithdrawalHistoryController::class, 'index'])->name('withdrawals-history');
    Route::get('/earnings-history', function () { return view('dashboard.earnings-history'); })->name('earnings-history');
    Route::get('/investments-history', function () { return view('dashboard.investments-history'); })->name('investments-history');
    
    // Make a Deposit
    Route::get('/deposit', function () { return view('dashboard.deposit'); })->name('deposit');
    Route::get('/invest', function () { return view('dashboard.invest'); })->name('invest');
    
    // Buy Crypto
    Route::get('/buy-crypto', function () { return view('dashboard.buy-crypto'); })->name('buy-crypto');
    
    // Stocks
    Route::get('/stock-trading', function () { return view('dashboard.stock-trading'); })->name('stock-trading');
});

// Page routes (public)
Route::get('/trading', [PageController::class, 'trading'])->name('trading');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/company', [PageController::class, 'company'])->name('company');
Route::get('/education', [PageController::class, 'education'])->name('education');