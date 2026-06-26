<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KYCController;
use App\Http\Controllers\StockController;
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

// ============================================
// ADMIN ROUTES (Only for admins)
// ============================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (Auth::user()->is_admin != 1) {
            abort(403, 'Unauthorized access. Admin privileges required.');
        }
        return app(AdminController::class)->dashboard();
    })->name('dashboard');
    
    // User Management
    Route::get('/users', [UserManagementController::class, 'index'])->name('users');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    
    // Deposit management
    Route::get('/deposits', [AdminController::class, 'deposits'])->name('deposits');
    Route::post('/deposits/{id}/approve', [AdminController::class, 'approveDeposit'])->name('deposits.approve');
    Route::post('/deposits/{id}/reject', [AdminController::class, 'rejectDeposit'])->name('deposits.reject');
    
    // Withdrawal management
    Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('withdrawals');
    Route::post('/withdrawals/{id}/approve', [AdminController::class, 'approveWithdrawal'])->name('withdrawals.approve');
    Route::post('/withdrawals/{id}/reject', [AdminController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
    
    // Admin investment view
    Route::get('/investments', [AdminController::class, 'investments'])->name('investments');
    
    // Card Applications management
    Route::get('/card-applications', [AdminController::class, 'cardApplications'])->name('card-applications');
    Route::post('/card-applications/{id}/approve', [AdminController::class, 'approveCardApplication'])->name('card-applications.approve');
    Route::post('/card-applications/{id}/reject', [AdminController::class, 'rejectCardApplication'])->name('card-applications.reject');
    
    // KYC Management
    Route::get('/kyc', [AdminController::class, 'kycSubmissions'])->name('kyc.index');
    Route::get('/kyc/{id}', [AdminController::class, 'viewKycSubmission'])->name('kyc.view');
    Route::post('/kyc/{id}/approve', [AdminController::class, 'approveKyc'])->name('kyc.approve');
    Route::post('/kyc/{id}/reject', [AdminController::class, 'rejectKyc'])->name('kyc.reject');
    Route::get('/kyc/{id}/download/{type}', [AdminController::class, 'downloadKycDocument'])->name('kyc.download');
    
    // Stock Management
    Route::get('/stock-prices', [App\Http\Controllers\Admin\StockManagementController::class, 'stockPrices'])->name('stock.prices');
    Route::post('/stock-prices/update', [App\Http\Controllers\Admin\StockManagementController::class, 'updateStockPrice'])->name('stock.prices.update');
    Route::post('/stock-prices/update-all', [App\Http\Controllers\Admin\StockManagementController::class, 'updateAllStockPrices'])->name('stock.prices.update-all');
    Route::get('/stock-portfolios', [App\Http\Controllers\Admin\StockManagementController::class, 'userPortfolios'])->name('stock.portfolio');
    Route::get('/stock-transactions', [App\Http\Controllers\Admin\StockManagementController::class, 'stockTransactions'])->name('stock.transactions');
    
    // Admin Copy Trading Management
    Route::get('/copy-traders', [CopyTraderController::class, 'index'])->name('copy-traders.index');
    Route::get('/copy-traders/create', [CopyTraderController::class, 'create'])->name('copy-traders.create');
    Route::post('/copy-traders', [CopyTraderController::class, 'store'])->name('copy-traders.store');
    Route::get('/copy-traders/{trader}/edit', [CopyTraderController::class, 'edit'])->name('copy-traders.edit');
    Route::put('/copy-traders/{trader}', [CopyTraderController::class, 'update'])->name('copy-traders.update');
    Route::delete('/copy-traders/{trader}', [CopyTraderController::class, 'destroy'])->name('copy-traders.destroy');
    Route::post('/copy-traders/{trader}/performances', [CopyTraderController::class, 'storePerformance'])->name('copy-traders.performances.store');
    Route::delete('/copy-traders/performances/{performance}', [CopyTraderController::class, 'destroyPerformance'])->name('copy-traders.performances.destroy');
    // Add this route inside the admin group
Route::get('/copy-trading-requests', [App\Http\Controllers\Admin\CopyTraderController::class, 'requests'])->name('admin.copy-trading-requests');
Route::post('/copy-trading-requests/{id}/approve', [App\Http\Controllers\Admin\CopyTraderController::class, 'approveRequest'])->name('admin.copy-trading-requests.approve');
Route::post('/copy-trading-requests/{id}/reject', [App\Http\Controllers\Admin\CopyTraderController::class, 'rejectRequest'])->name('admin.copy-trading-requests.reject');   
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    // KYC Routes
    Route::get('/kyc/form', [KYCController::class, 'showForm'])->name('kyc.form');
    Route::get('/kyc/status', [KYCController::class, 'showStatus'])->name('kyc.status');
    Route::post('/kyc/submit', [KYCController::class, 'submit'])->name('kyc.submit');
    Route::put('/kyc/update/{user}', [KYCController::class, 'updateStatus'])->name('kyc.update')->middleware('admin');
    
    // History Routes
    Route::get('/deposits-history', [DepositHistoryController::class, 'index'])->name('deposits-history');
    Route::get('/withdrawals-history', [WithdrawalHistoryController::class, 'index'])->name('withdrawals-history');
    Route::get('/earnings-history', [EarningsHistoryController::class, 'index'])->name('earnings-history');
    Route::get('/investments-history', [InvestmentsHistoryController::class, 'index'])->name('investments-history');
    
    // Make a Deposit/Invest
    Route::get('/deposit', function () { return view('dashboard.deposit'); })->name('deposit');
    Route::get('/invest', function () { return view('dashboard.invest'); })->name('invest');
    
    // Buy Crypto
    Route::get('/buy-crypto', function () { return view('dashboard.buy-crypto'); })->name('buy-crypto');
    
    // Stocks
    Route::get('/stock-trading', [StockController::class, 'index'])->name('stock-trading');
    Route::post('/stock/buy', [StockController::class, 'buy'])->name('stock.buy');
    Route::post('/stock/sell', [StockController::class, 'sell'])->name('stock.sell');
    Route::get('/stock/quote', [StockController::class, 'getStockQuote'])->name('stock.quote');
    Route::get('/stock/history', [StockController::class, 'history'])->name('stock.history');
});


// Page routes (public)
Route::get('/trading', [PageController::class, 'trading'])->name('trading');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/company', [PageController::class, 'company'])->name('company');
// Real Estate Routes
Route::get('/real-estate', [PageController::class, 'realEstate'])->name('real-estate');
Route::get('/real-estate/{id}', function ($id) {
    return view('pages.property-details', ['id' => $id]);
})->name('real-estate.show');
Route::get('/education', [PageController::class, 'education'])->name('education');
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy.policy');
Route::get('/settings', [PageController::class, 'settings'])->name('settings');
Route::put('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile.update');
Route::put('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password.update');
Route::get('/forex/majors', function () {
    return view('pages.forex-majors');
})->name('forex.majors');
Route::get('/forex/minors', function () {
    return view('pages.forex-minors');
})->name('forex.minors');
Route::get('/forex/exotics', function () {
    return view('pages.forex-exotics');
})->name('forex.exotics');
Route::get('/shares/us', function () {
    return view('pages.shares-us');
})->name('shares.us');
Route::get('/shares/uk', function () {
    return view('pages.shares-uk');
})->name('shares.uk');