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
        
        /* Dropdown styles */
        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .dropdown-menu.open {
            max-height: 500px;
        }
        .dropdown-arrow {
            transition: transform 0.3s ease;
        }
        .dropdown-arrow.rotated {
            transform: rotate(180deg);
        }
        
        /* Main content adjustment */
        .main-content {
            margin-left: 18rem;
            width: calc(100% - 18rem);
        }
        
        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="">
        <!-- Sidebar -->
        <div class="sidebar w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl overflow-y-auto fixed h-full">
            <!-- Sidebar Header -->
            <div class="p-3 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <a href="/dashboard" class="text-2xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                        PrimeVest
                    </a>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-3 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Hello, {{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Main Menu -->
            <div class="flex-1 py-6 overflow-y-auto">
                <div class="px-4 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Main Menu</p>
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
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">MAKE A DEPOSIT</p>
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
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">BUY CRYPTO</p>
                </div>
                <nav class="space-y-1">
                    <div class="crypto-dropdown">
                        <button onclick="toggleDropdown('cryptoDropdown')" class="sidebar-item flex items-center justify-between w-full px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Buy Crypto</span>
                            </div>
                            <svg class="dropdown-arrow w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="cryptoDropdown" class="dropdown-menu pl-12 space-y-1">
                            <a href="{{ route('buy-crypto') }}?coin=BTC" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Bitcoin (BTC)</a>
                            <a href="{{ route('buy-crypto') }}?coin=ETH" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Ethereum (ETH)</a>
                            <a href="{{ route('buy-crypto') }}?coin=BNB" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Binance Coin (BNB)</a>
                            <a href="{{ route('buy-crypto') }}?coin=SOL" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Solana (SOL)</a>
                            <a href="{{ route('buy-crypto') }}?coin=DOGE" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Dogecoin (DOGE)</a>
                        </div>
                    </div>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">STOCKS</p>
                </div>
                <nav class="space-y-1">
                    <div class="stocks-dropdown">
                        <button onclick="toggleDropdown('stocksDropdown')" class="sidebar-item flex items-center justify-between w-full px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                <span>Stock Trading</span>
                            </div>
                            <svg class="dropdown-arrow w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="stocksDropdown" class="dropdown-menu pl-12 space-y-1">
                            <a href="{{ route('stock-trading') }}?symbol=TSLA" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Tesla (TSLA)</a>
                            <a href="{{ route('stock-trading') }}?symbol=SPY" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">SPDR S&P 500 (SPY)</a>
                            <a href="{{ route('stock-trading') }}?symbol=SPX" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">S&P 500 (SPX)</a>
                            <a href="{{ route('stock-trading') }}?symbol=AAPL" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Apple (AAPL)</a>
                            <a href="{{ route('stock-trading') }}?symbol=BA" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Boeing (BA)</a>
                            <a href="{{ route('stock-trading') }}?symbol=MSFT" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Microsoft (MSFT)</a>
                            <a href="{{ route('stock-trading') }}?symbol=GOOGL" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Google (GOOGL)</a>
                            <a href="{{ route('stock-trading') }}?symbol=AMZN" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Amazon (AMZN)</a>
                        </div>
                    </div>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">TRANSACTION HISTORY</p>
                </div>
                <nav class="space-y-1">
                    <div class="history-dropdown">
                        <button onclick="toggleDropdown('historyDropdown')" class="sidebar-item flex items-center justify-between w-full px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <span>Transaction History</span>
                            </div>
                            <svg class="dropdown-arrow w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="historyDropdown" class="dropdown-menu pl-12 space-y-1">
                            <a href="{{ route('deposits-history') }}" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Deposits History</a>
                            <a href="{{ route('withdrawals-history') }}" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Withdrawals History</a>
                            <a href="{{ route('earnings-history') }}" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Earnings History</a>
                            <a href="{{ route('investments-history') }}" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Investments History</a>
                        </div>
                    </div>
                </nav>

                <div class="px-4 mt-6 mb-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">ACCOUNT</p>
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
                        <span>Profile Settings</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center space-x-3 w-full px-6 py-3 text-white bg-red-600 hover:bg-red-700 transition-all duration-300 mt-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto main-content">
            @include('layouts.dashboard-navbar')
            <main class="p-6 mt-16">
                @yield('dashboard-content')
            </main>
        </div>
    </div>

    <script>
        // Dropdown toggle function
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const button = dropdown.previousElementSibling;
            const arrow = button.querySelector('.dropdown-arrow');
            
            dropdown.classList.toggle('open');
            if (arrow) arrow.classList.toggle('rotated');
        }

        // Close dropdowns when clicking outside (optional)
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.stocks-dropdown') && !event.target.closest('.history-dropdown') && !event.target.closest('.crypto-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('open');
                });
                document.querySelectorAll('.dropdown-arrow').forEach(arrow => {
                    arrow.classList.remove('rotated');
                });
            }
        });
    </script>
</body>
</html>