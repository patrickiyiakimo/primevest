<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Dashboard</title>
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
        
        /* ============================================
           PROFESSIONAL SIDEBAR - REDESIGNED
        ============================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            background: #ffffff;
            z-index: 50;
            transition: transform 0.3s ease;
            overflow-y: auto;
            border-right: 1px solid #eef2f6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.02);
        }
        
        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 4px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
        
        /* Logo Section */
        .sidebar-logo {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid #eef2f6;
            margin-bottom: 1rem;
        }
        
        .sidebar-logo a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        
        .sidebar-logo img {
            width: 32px;
            height: 32px;
        }
        
        .sidebar-logo span {
            font-size: 1.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.3px;
        }
        
        /* User Profile Card */
        .user-profile {
            padding: 1rem 1rem 1.25rem;
            margin: 0 0.75rem 1rem;
            background: linear-gradient(135deg, #fef2f2, #fef5f5);
            border-radius: 12px;
            border: 1px solid #fee2e2;
        }
        
        .user-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
        }
        
        .user-avatar span {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }
        
        .user-email {
            font-size: 0.7rem;
            color: #6b7280;
        }
        
        /* Navigation Sections */
        .nav-section {
            padding: 0 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .nav-section-title {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #9ca3af;
            padding: 0 0.75rem 0.5rem;
        }
        
        /* Navigation Items */
        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            margin-bottom: 0.25rem;
            border-radius: 10px;
            color: #4b5563;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .nav-item:hover {
            background: #fef2f2;
            color: #dc2626;
        }
        
        .nav-item-active {
            background: #fef2f2;
            color: #dc2626;
        }
        
        .nav-item svg {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
            color: #9ca3af;
        }
        
        .nav-item:hover svg,
        .nav-item-active svg {
            color: #dc2626;
        }
        
        /* Dropdown Styles */
        .dropdown-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .dropdown-btn .nav-item {
            flex: 1;
            margin-bottom: 0;
        }
        
        .dropdown-arrow {
            transition: transform 0.2s ease;
            color: #9ca3af;
        }
        
        .dropdown-arrow.rotated {
            transform: rotate(180deg);
        }
        
        .dropdown-menu {
            padding-left: 2.5rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .dropdown-menu.open {
            max-height: 300px;
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0.875rem;
            margin-bottom: 0.125rem;
            border-radius: 8px;
            color: #6b7280;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: #fef2f2;
            color: #dc2626;
        }
        
        /* Logout Button */
        .logout-btn {
            width: calc(100% - 1.5rem);
            margin: 0 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            border-radius: 10px;
            color: #9ca3af;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid #eef2f6;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background: #fef2f2;
            color: #dc2626;
            border-color: #fecaca;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        /* Top Navbar */
        .top-navbar {
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
            transition: left 0.3s ease;
        }
        
        .page-title h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .page-title p {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-top: 0.125rem;
        }
        
        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-menu-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 12px;
            transition: background 0.2s;
        }
        
        .user-menu-btn:hover {
            background: #f9fafb;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-info-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1f2937;
        }
        
        .user-info-role {
            font-size: 0.7rem;
            color: #9ca3af;
        }
        
        .user-avatar-small {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-avatar-small span {
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }
        
        /* Dropdown Menu */
        .dropdown-user-menu {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            width: 240px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2f6;
            overflow: hidden;
            z-index: 50;
        }
        
        .dropdown-user-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #4b5563;
            font-size: 0.875rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .dropdown-user-item:hover {
            background: #f9fafb;
            color: #dc2626;
        }
        
        /* Mobile Responsive */
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
            }
            .top-navbar {
                left: 0;
            }
            .mobile-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(2px);
                z-index: 999;
                display: none;
            }
            .mobile-overlay.active {
                display: block;
            }
        }
        
        /* Content Area */
        .dashboard-content {
            padding: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .dashboard-content {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Mobile Overlay -->
<div id="mobileOverlay" class="mobile-overlay" onclick="closeSidebar()"></div>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="/">
            <img src="{{ asset('/images/primevest-logo.png') }}" alt="PrimeVest">
            <span>PrimeVest</span>
        </a>
    </div>
    
    <!-- User Profile Card -->
    <div class="user-profile">
        <div class="user-avatar">
            <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
        </div>
        <div class="user-name">{{ Auth::user()->name }}</div>
        <div class="user-email">{{ Auth::user()->email }}</div>
    </div>
    
    <!-- Navigation -->
    <div class="nav-section">
        <div class="nav-section-title">Main Menu</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span>Dashboard</span>
        </a>
    </div>
    
    <!-- Funds Section -->
    <div class="nav-section">
        <div class="nav-section-title">Funds</div>
        <a href="{{ route('deposit') }}" class="nav-item {{ request()->routeIs('deposit') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Deposit</span>
        </a>
        <a href="{{ route('invest') }}" class="nav-item {{ request()->routeIs('invest') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
            </svg>
            <span>Invest</span>
        </a>
        <a href="{{ route('withdraw') }}" class="nav-item {{ request()->routeIs('withdraw') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Withdraw</span>
        </a>
    </div>
    
    <!-- Markets Section -->
    <div class="nav-section">
        <div class="nav-section-title">Markets</div>
        
        <!-- Crypto Dropdown -->
        <div class="crypto-dropdown">
            <button onclick="toggleDropdown('cryptoDropdown')" class="dropdown-btn">
                <div class="nav-item" style="flex: 1; margin-bottom: 0;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Buy Crypto</span>
                </div>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="cryptoDropdown" class="dropdown-menu">
                <a href="https://coinbase.com" target="_blank" class="dropdown-item">Coinbase</a>
                <a href="https://robinhood.com" target="_blank" class="dropdown-item">Robinhood</a>
                <a href="https://exodus.com" target="_blank" class="dropdown-item">Exodus</a>
            </div>
        </div>
        
        <!-- Stocks Dropdown -->
        <div class="stocks-dropdown">
            <button onclick="toggleDropdown('stocksDropdown')" class="dropdown-btn">
                <div class="nav-item" style="flex: 1; margin-bottom: 0;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Stock Trading</span>
                </div>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="stocksDropdown" class="dropdown-menu">
                <a href="{{ route('stock-trading') }}?symbol=AAPL" class="dropdown-item">Apple (AAPL)</a>
                <a href="{{ route('stock-trading') }}?symbol=MSFT" class="dropdown-item">Microsoft (MSFT)</a>
                <a href="{{ route('stock-trading') }}?symbol=TSLA" class="dropdown-item">Tesla (TSLA)</a>
                <a href="{{ route('stock-trading') }}?symbol=AMZN" class="dropdown-item">Amazon (AMZN)</a>
                <a href="{{ route('stock-trading') }}?symbol=GOOGL" class="dropdown-item">Google (GOOGL)</a>
                <a href="{{ route('stock-trading') }}?symbol=SPY" class="dropdown-item">S&P 500 (SPY)</a>
            </div>
        </div>
    </div>
    
    <!-- Transaction History Section -->
    <div class="nav-section">
        <div class="nav-section-title">History</div>
        
        <div class="history-dropdown">
            <button onclick="toggleDropdown('historyDropdown')" class="dropdown-btn">
                <div class="nav-item" style="flex: 1; margin-bottom: 0;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Transaction History</span>
                </div>
                <svg class="dropdown-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="historyDropdown" class="dropdown-menu">
                <a href="{{ route('deposits-history') }}" class="dropdown-item">Deposits</a>
                <a href="{{ route('withdrawals-history') }}" class="dropdown-item">Withdrawals</a>
                <a href="{{ route('earnings-history') }}" class="dropdown-item">Earnings</a>
                <a href="{{ route('investments-history') }}" class="dropdown-item">Investments</a>
                <a href="{{ route('stock.history') }}" class="dropdown-item">Stock Trading</a>
            </div>
        </div>
    </div>
    
    <!-- Account Section -->
    <div class="nav-section">
        <div class="nav-section-title">Account</div>
        <a href="{{ route('card-application') }}" class="nav-item {{ request()->routeIs('card-application') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </svg>
            <span>Card Application</span>
        </a>
         <a href="{{ route('kyc.form') }}" class="nav-item {{ request()->routeIs('kyc.form') || request()->routeIs('kyc.status') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </svg>
            <span>KYC Verification</span>
        </a>
        <a href="{{ route('profile') }}" class="nav-item {{ request()->routeIs('profile') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span>Profile Settings</span>
        </a>
    </div>
    
    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Logout</span>
        </button>
    </form>
</aside>

<!-- Top Navbar -->
<nav class="top-navbar">
    <div class="page-title">
        <h1>@yield('page-title', 'Dashboard')</h1>
        <p>@yield('breadcrumb', 'Welcome back, ' . Auth::user()->name)</p>
    </div>
    
    <div class="user-menu">
        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        
        <!-- User Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="user-menu-btn">
                <div class="user-info hidden sm:block">
                    <div class="user-info-name">{{ Auth::user()->name }}</div>
                    <div class="user-info-role">Premium Member</div>
                </div>
                <div class="user-avatar-small">
                    <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="{ 'rotate-180': open }" style="transition: transform 0.2s">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <div x-show="open" @click.away="open = false" x-transition class="dropdown-user-menu" style="display: none;">
                <a href="{{ route('profile') }}" class="dropdown-user-item">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>
                <a href="{{ route('settings') }}" class="dropdown-user-item">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Settings</span>
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-user-item w-full">
                        <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    <div class="dashboard-content">
        @yield('dashboard-content')
    </div>
</main>

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
    const overlay = document.getElementById('mobileOverlay');
    
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
    if (overlay) overlay.addEventListener('click', closeSidebar);
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.crypto-dropdown') && 
            !event.target.closest('.stocks-dropdown') && 
            !event.target.closest('.history-dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('open');
            });
            document.querySelectorAll('.dropdown-arrow').forEach(arrow => {
                arrow.classList.remove('rotated');
            });
        }
    });
    
    // Close sidebar on window resize if open
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            closeSidebar();
        }
    });
</script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- AI Support Chat -->
@auth
    @include('components.ai-support-chat')
@endauth

</body>
</html>