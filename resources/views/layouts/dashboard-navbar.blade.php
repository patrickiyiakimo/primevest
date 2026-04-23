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
        
        body {
            padding-top: 65px;
        }
        
        .sidebar {
            position: fixed;
            top: 65px;
            left: 0;
            height: calc(100vh - 65px);
            width: 18rem;
            transition: transform 0.3s ease;
            z-index: 40;
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
            transition: margin-left 0.3s ease;
            padding-top: 0;
        }
        
        /* Navbar styles */
        .dashboard-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: white;
        }
        
        /* Mobile styles */
        @media (max-width: 1024px) {
            body {
                padding-top: 0;
            }
            
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 18rem;
                z-index: 1000;
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            .dashboard-navbar {
                position: relative;
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
        
        /* Active sidebar item */
        .sidebar-item-active {
            background-color: #1f2937;
            color: white;
            border-left: 4px solid #10b981;
        }
    </style>
</head>
<body>
    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="overlay" onclick="closeSidebar()"></div>
    
    <!-- Dashboard Navbar -->
    <nav class="dashboard-navbar bg-white border-b border-gray-200 shadow-sm">
        <div class="px-4 sm:px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Left Side - Page Title & Breadcrumb -->
                <div class="flex items-center space-x-4">
                    <button id="mobileMenuBtn" class="lg:hidden text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <div class="hidden md:block">
                        <h1 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-xs text-gray-500 mt-0.5">@yield('breadcrumb', 'Welcome back, ' . Auth::user()->name)</p>
                    </div>
                </div>

                <!-- Right Side - Tools & User Menu -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <!-- Fullscreen Toggle -->
                    <button id="fullscreenToggle" class="text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                        </svg>
                    </button>

                    <!-- Search -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                        <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <!-- Notifications -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100 relative">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-2xl py-2 z-50 border border-gray-200">
                            <div class="px-4 py-2 border-b border-gray-200">
                                <p class="text-sm font-semibold text-gray-800">Recent Transactions</p>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                @php
                                    $recentTransactions = App\Models\Transaction::where('user_id', Auth::id())->latest()->take(4)->get();
                                @endphp
                                @forelse($recentTransactions as $transaction)
                                <div class="px-4 py-3 hover:bg-gray-50 transition-colors duration-200 border-b border-gray-100">
                                    <div class="flex items-center justify-between mb-1">
                                        <div class="flex items-center space-x-2">
                                            @if($transaction->type == 'deposit')
                                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                </div>
                                                <span class="text-xs font-semibold text-green-600">Deposit</span>
                                            @elseif($transaction->type == 'withdrawal')
                                                <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                                </div>
                                                <span class="text-xs font-semibold text-red-600">Withdrawal</span>
                                            @else
                                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-600">Profit</span>
                                            @endif
                                        </div>
                                        <span class="text-xs text-gray-500">{{ $transaction->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="flex justify-between items-center mt-1">
                                        <p class="text-sm text-gray-700">{{ ucfirst($transaction->type) }}</p>
                                        <p class="text-sm font-bold {{ $transaction->type == 'withdrawal' ? 'text-red-600' : 'text-green-600' }}">
                                            {{ $transaction->type == 'withdrawal' ? '-' : '+' }}${{ number_format($transaction->amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                @empty
                                <div class="px-4 py-8 text-center">
                                    <p class="text-sm text-gray-500">No transactions yet</p>
                                </div>
                                @endforelse
                            </div>
                            <div class="px-4 py-2 border-t border-gray-200 bg-gray-50">
                                <a href="{{ route('deposits-history') }}" class="text-xs text-green-600 hover:text-green-700 font-semibold flex items-center justify-between">
                                    View all transactions
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>

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

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl overflow-y-auto">
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
                <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('dashboard') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Dashboard</span>
                </a>
            </nav>

            <!-- Rest of your navigation items... -->
            <!-- (Keep all your existing nav items here) -->
            
            <div class="px-4 mt-6 mb-2">
                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">MAKE A DEPOSIT</p>
            </div>
            <nav class="space-y-1">
                <a href="{{ route('deposit') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('deposit') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span>Deposit</span>
                </a>
                <a href="{{ route('invest') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('invest') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    <span>Invest</span>
                </a>
                <a href="{{ route('withdraw') }}" class="sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('withdraw') ? 'sidebar-item-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span>Withdraw</span>
                </a>
            </nav>
            
            <!-- Add the rest of your navigation items (Buy Crypto, Stocks, Transaction History, Account) here -->
            
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <main class="p-4 sm:p-6">
            @yield('dashboard-content')
        </main>
    </div>

    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const button = dropdown.previousElementSibling;
            const arrow = button.querySelector('.dropdown-arrow');
            dropdown.classList.toggle('open');
            if (arrow) arrow.classList.toggle('rotated');
        }

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

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.stocks-dropdown') && !event.target.closest('.history-dropdown') && !event.target.closest('.crypto-dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.remove('open'));
                document.querySelectorAll('.dropdown-arrow').forEach(arrow => arrow.classList.remove('rotated'));
            }
        });

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

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });
    </script>
</body>
</html>