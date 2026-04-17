<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            padding-left: 1.5rem;
        }
        /* Custom scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #1f2937;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl overflow-y-auto">
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <a href="/dashboard" class="text-2xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                        PrimeVest
                    </a>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Hello, {{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Main Menu -->
            <div class="flex-1 py-6">
                <div class="px-4 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Main Menu</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">MAKE A DEPOSIT</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('deposit') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Deposit</span>
                    </a>
                    <a href="{{ route('invest') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span>Invest</span>
                    </a>
                    <a href="{{ route('withdraw') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Withdraw</span>
                    </a>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Buy Crypto</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('buy-crypto') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Buy Crypto</span>
                    </a>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Stocks</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('stock-trading') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Stock Trading</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=TSLA" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>TSLA</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=SPY" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>SPY</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=SPX" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>SPX</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=AAPL" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>AAPL</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=BA" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>BA</span>
                    </a>
                    <a href="{{ route('stock-trading') }}?symbol=S%26P" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-400 hover:bg-gray-700 hover:text-white transition-all duration-300 pl-10">
                        <span>S&P</span>
                    </a>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">History</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('deposits-history') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span>Deposits</span>
                    </a>
                    <a href="{{ route('withdrawals-history') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span>Withdrawals</span>
                    </a>
                    <a href="{{ route('earnings-history') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Earnings</span>
                    </a>
                    <a href="{{ route('investments-history') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span>Investments</span>
                    </a>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider">Account</p>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('card-application') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <span>Card Application</span>
                    </a>
                   <a href="{{ route('profile') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Profile</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center space-x-3 w-full px-6 py-3 text-white bg-red-400 hover:bg-red-500 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>

            <!-- Footer -->
            <div class="p-4 border-t border-gray-700">
                <p class="text-center text-xs text-gray-500">PrimeVest © {{ date('Y') }}<br>All Rights Reserved</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <main class="p-6">
                @yield('dashboard-content')
            </main>
        </div>
    </div>
</body>
</html>