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
use App\Http\Controllers\EarningsHistoryController;
use App\Http\Controllers\InvestmentsHistoryController;
use App\Http\Controllers\CardApplicationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\AISupportController;
use App\Models\User;  // ← ADD THIS
use Illuminate\Support\Facades\Hash;  // ← ADD THIS

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
    Route::get('/', function () {
        if (Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access. Admin privileges required.');
        }
        return app(App\Http\Controllers\Admin\AdminController::class)->dashboard();
    })->name('dashboard');
    
    // Route::get('/users', function () {
    //     if (Auth::user()->is_admin != 1) abort(403);
    //     return app(App\Http\Controllers\Admin\UserManagementController::class)->index(request());
    // })->name('users');
    
    // Route::get('/users/{user}/edit', function ($user) {
    //     if (Auth::user()->is_admin != 1) abort(403);
    //     return app(App\Http\Controllers\Admin\UserManagementController::class)->edit($user);
    // })->name('users.edit');
    
    // Route::put('/users/{user}', function ($user) {
    //     if (Auth::user()->is_admin != 1) abort(403);
    //     return app(App\Http\Controllers\Admin\UserManagementController::class)->update(request(), $user);
    // })->name('users.update');

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
    
    // Card Applications management
    Route::get('/card-applications', [AdminController::class, 'cardApplications'])->name('card-applications');
    Route::post('/card-applications/{id}/approve', [AdminController::class, 'approveCardApplication'])->name('card-applications.approve');
    Route::post('/card-applications/{id}/reject', [AdminController::class, 'rejectCardApplication'])->name('card-applications.reject');
});

// Temporary route to create an admin user (for testing purposes)
Route::get('/create-admin', function () {
    // Check if admin already exists
    if (User::where('email', 'iyiakimopatrick2002@gmail.com')->exists()) {
        return "Admin already exists!";
    }
    
    $user = User::create([
        'name' => 'Patrick Iyiakimo',
        'email' => 'iyiakimopatrick2002@gmail.com',
        'password' => Hash::make('Test@1234'),
        'balance' => 0,
        'total_profits' => 0,
        'is_admin' => true,
    ]);
    
    return "Admin created successfully!!! Email: iyiakimopatrick2002@gmail.com, Password: Test@1234";
});

// Temporary route to make an existing user an admin (for testing purposes)
Route::get('/make-me-admin', function () {
    $user = App\Models\User::where('email', 'iyiakimopatrick2002@gmail.com')->first();
    if ($user) {
        $user->is_admin = 1;
        $user->save();
        return "User {$user->name} is now admin! is_admin = " . $user->is_admin;
    }
    return "User not found!";
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

// Card Application Routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/card-application', function () {
        return view('dashboard.card-application');
    })->name('card-application');
    Route::post('/card-application/submit', [CardApplicationController::class, 'submit'])->name('card-application.submit');
});

// AI Support Routes
Route::middleware('auth')->group(function () {
    Route::post('/ai/ask', [AISupportController::class, 'ask'])->name('ai.ask');
    Route::get('/ai/history', [AISupportController::class, 'getHistory'])->name('ai.history');
    Route::post('/ai/clear-history', [AISupportController::class, 'clearHistory'])->name('ai.clear-history');
});

// Protected routes (accessible by all authenticated users)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // History Routes
    Route::get('/deposits-history', [DepositHistoryController::class, 'index'])->name('deposits-history');
    Route::get('/withdrawals-history', [WithdrawalHistoryController::class, 'index'])->name('withdrawals-history');
    Route::get('/earnings-history', [EarningsHistoryController::class, 'index'])->name('earnings-history');
    Route::get('/investments-history', [InvestmentsHistoryController::class, 'index'])->name('investments-history');

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