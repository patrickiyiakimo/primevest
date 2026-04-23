<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 18rem;
            height: 100vh;
            background: linear-gradient(to bottom, #111827, #1f2937);
            color: white;
            z-index: 40;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        
        .sidebar-item {
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: #d1d5db;
        }
        
        .sidebar-item:hover {
            background-color: #374151;
            color: white;
            padding-left: 1.5rem;
        }
        
        .sidebar-item-active {
            background-color: #1f2937;
            color: white;
            border-left: 4px solid #10b981;
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
            transition: margin-left 0.3s ease;
            padding-top: 65px;
        }
        
        /* Navbar styles */
        .dashboard-navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 18rem;
            z-index: 45;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        
        /* Mobile styles */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .dashboard-navbar {
                left: 0;
            }
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }
            .overlay.active {
                display: block;
            }
        }
        
        /* Desktop styles */
        @media (min-width: 1025px) {
            .mobile-only {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="overlay" onclick="closeSidebar()"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- Sidebar Header with Close Button -->
        <div class="p-4 border-b border-gray-700 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-sm">P</span>
                </div>
                <a href="/dashboard" class="text-xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                    PrimeVest
                </a>
            </div>
            <button id="closeSidebarBtn" class="lg:hidden text-gray-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- User Info -->
        <div class="p-4 border-b border-gray-700">
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
                <a href="{{ route('dashboard') }}" class="sidebar-item {{ request()->routeIs('dashboard') ? 'sidebar-item-active' : '' }}">
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
                <a href="{{ route('deposit') }}" class="sidebar-item {{ request()->routeIs('deposit') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Deposit</span>
                </a>
                <a href="{{ route('invest') }}" class="sidebar-item {{ request()->routeIs('invest') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span>Invest</span>
                </a>
                <a href="{{ route('withdraw') }}" class="sidebar-item {{ request()->routeIs('withdraw') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Withdraw</span>
                </a>
            </nav>

            <!-- Buy Crypto Dropdown -->
            <div class="px-4 mt-6 mb-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">BUY CRYPTO</p>
            </div>
            <nav class="space-y-1">
                <div class="crypto-dropdown">
                    <button onclick="toggleDropdown('cryptoDropdown')" class="sidebar-item w-full justify-between">
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
                        <a href="https://robinhood.com" target="_self" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Robinhood</a>
                        <a href="https://coinbase.com" target="_self" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Coinbase</a>
                        <a href="https://exodus.com" target="_self" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">Exodus</a>
                        <a href="https://cash.app" target="_self" class="flex items-center px-6 py-2 text-sm text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300">CashApp</a>
                    </div>
                </div>
            </nav>

            <!-- Stocks Dropdown -->
            <div class="px-4 mt-6 mb-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">STOCKS</p>
            </div>
            <nav class="space-y-1">
                <div class="stocks-dropdown">
                    <button onclick="toggleDropdown('stocksDropdown')" class="sidebar-item w-full justify-between">
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

            <!-- Transaction History Dropdown -->
            <div class="px-4 mt-6 mb-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">TRANSACTION HISTORY</p>
            </div>
            <nav class="space-y-1">
                <div class="history-dropdown">
                    <button onclick="toggleDropdown('historyDropdown')" class="sidebar-item w-full justify-between">
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

            <!-- Account -->
            <div class="px-4 mt-6 mb-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">ACCOUNT</p>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('card-application') }}" class="sidebar-item {{ request()->routeIs('card-application') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span>Card Application</span>
                </a>
                <a href="{{ route('profile') }}" class="sidebar-item {{ request()->routeIs('profile') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile Settings</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="sidebar-item w-full text-red-600 hover:bg-red-500 mt-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
    </div>

    <!-- Dashboard Navbar -->
    <nav class="dashboard-navbar">
        <div class="px-4 sm:px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Left side - Hamburger menu button (mobile only) + page title -->
                <div class="flex items-center space-x-4">
                    <button id="mobileMenuBtn" class="lg:hidden text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <div>
                        <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-xs text-gray-500 hidden sm:block">@yield('breadcrumb', 'Welcome back, ' . Auth::user()->name)</p>
                    </div>
                </div>

                <!-- Right side - Tools & User Menu -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <!-- Fullscreen Toggle -->
                    <button id="fullscreenToggle" class="text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                        </svg>
                    </button>

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none group">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="w-9 h-9 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                                <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-500 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-2xl py-2 z-50 border border-gray-200">
                            <div class="px-4 py-3 border-b border-gray-200">
                                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile') }}" class="flex items-center space-x-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center space-x-3 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
        <main class="p-4 sm:p-6">
            @yield('dashboard-content')
        </main>
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

        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('open');
            if (overlay) overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openSidebar);
        if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        // Close dropdowns when clicking outside
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

        // Fullscreen Toggle
        const fullscreenToggle = document.getElementById('fullscreenToggle');
        if (fullscreenToggle) {
            fullscreenToggle.addEventListener('click', function() {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            });
        }

        // Close sidebar on window resize if open
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });
    </script>

    <!-- AI Support Chat -->
@auth
    @include('components.ai-support-chat')
@endauth
</body>
</html>