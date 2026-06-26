<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Manage User | ProfitMassTrade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f7f9fc;
        }
        
        /* No rounded corners */
        .bg-white, .border, button, a, div, .toast {
            border-radius: 0 !important;
        }
        
        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            background: #0a1a2f;
            z-index: 50;
            overflow-y: auto;
        }
        
        .admin-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        
        .admin-sidebar::-webkit-scrollbar-track {
            background: #1a2a3f;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #10b981;
        }
        
        /* Main Content */
        .admin-main {
            margin-left: 280px;
            min-height: 100vh;
        }
        
        /* Top Navbar */
        .admin-top-navbar {
            position: sticky;
            top: 0;
            right: 0;
            left: 280px;
            z-index: 40;
            background: white;
            border-bottom: 1px solid #eef2f6;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .admin-main, .admin-top-navbar {
                margin-left: 0;
                left: 0;
            }
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #10b981;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="admin-sidebar">
    <div class="p-6 border-b border-gray-700">
        <a href="/admin" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-green-600 flex items-center justify-center">
                <span class="text-white font-bold text-sm">PMT</span>
            </div>
            <span class="text-white font-bold">ProfitMassTrade</span>
        </a>
    </div>
    
    <nav class="p-4">
        <div class="mb-6">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">MAIN MENU</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-2 text-green-600 bg-green-600/20 text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Users</span>
            </a>
            <a href="{{ route('admin.deposits') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Deposits</span>
            </a>
            <a href="{{ route('admin.withdrawals') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Withdrawals</span>
            </a>
            <a href="{{ route('admin.investments') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span>Investments</span>
            </a>
        </div>
        
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>

<!-- Main Content -->
<main class="admin-main">
    <nav class="admin-top-navbar">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Manage User Balance</h1>
            <p class="text-sm text-gray-500">Update balance for {{ $user->name }}</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
            <div class="w-10 h-10 bg-green-600 flex items-center justify-center">
                <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
        </div>
    </nav>
    
    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <h1 class="text-xl font-bold text-gray-900">Manage User Balance</h1>
                    <p class="text-sm text-gray-500 mt-1">Update balance for {{ $user->name }}</p>
                </div>
                
                <div class="p-6">
                    <!-- User Info -->
                    <div class="bg-gray-50 p-4 mb-6 border border-gray-200">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-500">Full Name</p>
                                <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Email Address</p>
                                <p class="font-semibold text-gray-900">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Current Balance</p>
                                <p class="text-2xl font-bold text-green-600">${{ number_format($user->balance, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Total Profits</p>
                                <p class="text-2xl font-bold text-blue-600">${{ number_format($user->total_profits ?? 0, 2) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Balance Adjustment Form -->
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Transaction Type</label>
                                <div class="grid md:grid-cols-3 gap-4">
                                    <label class="flex items-center p-4 border-2 border-gray-200 cursor-pointer hover:border-green-500 transition-all duration-300">
                                        <input type="radio" name="transaction_type" value="credit" class="w-5 h-5 text-green-600" checked onchange="updateTransactionType()">
                                        <span class="ml-3 font-semibold text-gray-700">Credit (Add Balance)</span>
                                    </label>
                                    <label class="flex items-center p-4 border-2 border-gray-200 cursor-pointer hover:border-green-500 transition-all duration-300">
                                        <input type="radio" name="transaction_type" value="debit" class="w-5 h-5 text-red-600" onchange="updateTransactionType()">
                                        <span class="ml-3 font-semibold text-gray-700">Debit (Deduct Balance)</span>
                                    </label>
                                    <label class="flex items-center p-4 border-2 border-gray-200 cursor-pointer hover:border-green-500 transition-all duration-300">
                                        <input type="radio" name="transaction_type" value="profit" class="w-5 h-5 text-blue-600" onchange="updateTransactionType()">
                                        <span class="ml-3 font-semibold text-gray-700">Add Profit</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Amount</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-bold">$</span>
                                    <input type="number" name="amount" id="amount" step="0.01" min="0.01" required class="w-full pl-8 pr-4 py-3 border-2 border-gray-200 focus:border-green-500 transition-all duration-300" placeholder="0.00">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Description / Reason</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-3 border-2 border-gray-200 focus:border-green-500 transition-all duration-300" placeholder="Enter reason for this transaction..."></textarea>
                            </div>
                            
                            <div id="newBalancePreview" class="bg-gray-50 p-4 border border-gray-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">New Balance After Transaction:</span>
                                    <span class="text-2xl font-bold text-green-600" id="newBalance">${{ number_format($user->balance, 2) }}</span>
                                </div>
                            </div>
                            
                            <div class="flex gap-4">
                                <button type="submit" class="flex-1 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold transition-all duration-300">
                                    Process Transaction
                                </button>
                                <a href="{{ route('admin.users') }}" class="flex-1 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition-all duration-300 text-center">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const currentBalance = {{ $user->balance }};
    const currentProfits = {{ $user->total_profits ?? 0 }};
    
    function updateTransactionType() {
        const amountInput = document.getElementById('amount');
        const newBalanceSpan = document.getElementById('newBalance');
        const amount = parseFloat(amountInput.value) || 0;
        const transactionType = document.querySelector('input[name="transaction_type"]:checked').value;
        
        let newBalance = currentBalance;
        if (transactionType === 'credit') {
            newBalance = currentBalance + amount;
        } else if (transactionType === 'debit') {
            newBalance = currentBalance - amount;
        } else {
            // Profit doesn't affect balance
            newBalance = currentBalance;
        }
        
        newBalanceSpan.innerText = '$' + newBalance.toFixed(2);
        
        // Color coding
        if (transactionType === 'credit') {
            newBalanceSpan.className = 'text-2xl font-bold text-green-600';
        } else if (transactionType === 'debit') {
            newBalanceSpan.className = 'text-2xl font-bold text-red-600';
        } else {
            newBalanceSpan.className = 'text-2xl font-bold text-blue-600';
        }
    }
    
    document.getElementById('amount').addEventListener('input', updateTransactionType);
</script>

</body>
</html>