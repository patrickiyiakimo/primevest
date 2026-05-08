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
        
        /* Sidebar Styles - International Professional Style */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 18rem;
            height: 100vh;
            background: #f3f4f6;
            color: #1f2937;
            z-index: 40;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            border-right: 1px solid #e5e7eb;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.02);
        }
        
        /* Sidebar Header with subtle brand accent */
        .sidebar-header {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 1rem;
            background: linear-gradient(to bottom, #f9fafb, #f3f4f6);
        }
        
        .sidebar-header h2 {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }
        
        .sidebar-header p {
            font-size: 0.7rem;
            color: #6b7280;
            margin-top: 0.25rem;
            font-weight: 400;
        }
        
        /* Sidebar Navigation Items */
        .sidebar-nav {
            padding: 0 0.75rem;
        }
        
        .sidebar-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #374151;
            border-radius: 0.5rem;
            margin-bottom: 0.25rem;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            position: relative;
        }
        
        .sidebar-item:hover {
            background-color: #fee2e2;
            color: #dc2626;
            transform: translateX(2px);
        }
        
        .sidebar-item-active {
            background: linear-gradient(135deg, #fef2f2, #fecaca);
            color: #dc2626;
            border-left: 3px solid #dc2626;
            font-weight: 600;
        }
        
        /* Sidebar Icons */
        .sidebar-item svg {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
            color: #6b7280;
            transition: all 0.2s ease;
        }
        
        .sidebar-item:hover svg {
            color: #dc2626;
            transform: scale(1.05);
        }
        
        .sidebar-item-active svg {
            color: #dc2626;
        }
        
        /* Section Titles */
        .sidebar-section-title {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #6b7280;
            padding: 0.75rem 1rem 0.5rem;
            margin-top: 0.5rem;
        }
        
        /* Dropdown styles - Professional Animation */
        .dropdown-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        
        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding-left: 2rem;
        }
        
        .dropdown-menu.open {
            max-height: 30rem;
        }
        
        .dropdown-menu .sidebar-item {
            padding: 0.625rem 1rem;
            font-size: 0.813rem;
            margin-bottom: 0.125rem;
        }
        
        .dropdown-menu .sidebar-item:hover {
            transform: translateX(4px);
        }
        
        .dropdown-arrow {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: #9ca3af;
            font-size: 0.75rem;
        }
        
        .dropdown-arrow.rotated {
            transform: rotate(180deg);
        }
        
        /* Nested dropdowns (for transaction history sub-items) */
        .sub-dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            padding-left: 1.75rem;
        }
        
        .sub-dropdown-menu.open {
            max-height: 20rem;
        }
        
        .sub-dropdown-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        
        .sub-dropdown-arrow {
            transition: transform 0.3s ease;
            color: #9ca3af;
            font-size: 0.65rem;
        }
        
        .sub-dropdown-arrow.rotated {
            transform: rotate(180deg);
        }
        
        /* Custom scrollbar for sidebar - Light theme */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #e5e7eb;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
        
        /* Main content adjustment */
        .main-content {
            margin-left: 18rem;
            width: calc(100% - 18rem);
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding-top: 65px;
            background: #f9fafb;
            min-height: 100vh;
        }
        
        /* Navbar styles - Clean white header */
        .dashboard-navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 18rem;
            z-index: 45;
            background: white;
            border-bottom: 1px solid #f0f0f0;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03);
            transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* User Avatar */
        .user-avatar {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }
        
        /* Animation for dropdown items - staggered entrance */
        .dropdown-menu .sidebar-item {
            animation: slideIn 0.25s ease forwards;
            opacity: 0;
            transform: translateX(-8px);
        }
        
        .dropdown-menu.open .sidebar-item {
            animation: slideIn 0.25s ease forwards;
        }
        
        .dropdown-menu.open .sidebar-item:nth-child(1) { animation-delay: 0.02s; }
        .dropdown-menu.open .sidebar-item:nth-child(2) { animation-delay: 0.04s; }
        .dropdown-menu.open .sidebar-item:nth-child(3) { animation-delay: 0.06s; }
        .dropdown-menu.open .sidebar-item:nth-child(4) { animation-delay: 0.08s; }
        .dropdown-menu.open .sidebar-item:nth-child(5) { animation-delay: 0.1s; }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-8px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Staggered entrance for sub-dropdown items */
        .sub-dropdown-menu .sidebar-item {
            animation: slideInSub 0.25s ease forwards;
            opacity: 0;
        }
        
        .sub-dropdown-menu.open .sidebar-item {
            animation: slideInSub 0.25s ease forwards;
        }
        
        .sub-dropdown-menu.open .sidebar-item:nth-child(1) { animation-delay: 0.02s; }
        .sub-dropdown-menu.open .sidebar-item:nth-child(2) { animation-delay: 0.04s; }
        .sub-dropdown-menu.open .sidebar-item:nth-child(3) { animation-delay: 0.06s; }
        
        @keyframes slideInSub {
            from {
                opacity: 0;
                transform: translateX(-6px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Mobile styles */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
                box-shadow: none;
            }
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 2px 0 12px rgba(0, 0, 0, 0.1);
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
                background: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(2px);
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
        
        /* International accent - UK/US inspired subtle flag elements */
        .sidebar-footer {
            padding: 1rem 1rem;
            border-top: 1px solid #e5e7eb;
            margin-top: 1rem;
            font-size: 0.7rem;
            color: #6b7280;
            text-align: center;
        }
        
        .region-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            background: #ffffff;
            padding: 0.25rem 0.65rem;
            border-radius: 2rem;
            font-size: 0.6rem;
            color: #374151;
            border: 1px solid #e5e7eb;
        }
        
        /* Notification badge */
        .sidebar-badge {
            margin-left: auto;
            background: #ef4444;
            color: white;
            font-size: 0.6rem;
            font-weight: 600;
            padding: 0.125rem 0.5rem;
            border-radius: 1rem;
        }
        
        /* Tooltip for sidebar items */
        .sidebar-item[data-tooltip] {
            position: relative;
        }
        
        .sidebar-item[data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: #1f2937;
            color: white;
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            white-space: nowrap;
            margin-left: 0.5rem;
            z-index: 50;
            pointer-events: none;
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
           <a href="/" class="flex items-center space-x-1">
    <img src="{{ asset('/images/primevest-logo.png') }}" alt="PrimeVest Logo" class="w-10 h-10">
    <span class="text-xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">
        PrimeVest
    </span>
</a>
            <button id="closeSidebarBtn" class="lg:hidden text-gray-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- User Info -->
        <div class="p-4 border-b border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <p class="font-semibold text-gray-900">Hello, {{ Auth::user()->name }}</p>
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
            <hr class="my-6 border-gray-700" />

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
            <hr class="my-6 border-gray-700" />


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
            <hr class="my-6 border-gray-700" />

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
            <hr class="my-6 border-gray-700" />

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
            <hr class="my-6 border-gray-700" />

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