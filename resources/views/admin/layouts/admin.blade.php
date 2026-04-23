<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .admin-sidebar {
            transition: transform 0.3s ease;
            transform: translateX(0);
        }
        .admin-sidebar-item {
            transition: all 0.3s ease;
        }
        .admin-sidebar-item:hover {
            padding-left: 1.5rem;
            background-color: rgba(255,255,255,0.1);
        }
        
        /* Custom scrollbar for sidebar */
        .admin-sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .admin-sidebar::-webkit-scrollbar-track {
            background: #1f2937;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 5px;
        }
        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }
        
        /* Badge for pending items */
        .pending-badge {
            background-color: #ef4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 9999px;
            margin-left: 8px;
        }
        
        /* Mobile styles */
        @media (max-width: 768px) {
            .admin-sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 18rem;
                z-index: 1000;
                transform: translateX(-100%);
            }
            .admin-sidebar.open {
                transform: translateX(0);
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
            .admin-content {
                width: 100%;
            }
        }
        
        /* Desktop styles */
        @media (min-width: 769px) {
            .mobile-menu-btn {
                display: none;
            }
        }
        
        /* Navbar styles for admin */
        .admin-navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 45;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Mobile Overlay -->
    <div id="sidebarOverlay" class="overlay" onclick="closeSidebar()"></div>
    
    <!-- Mobile Navbar with Hamburger -->
    <div class="mobile-menu-btn fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200 px-4 py-3 flex items-center justify-between lg:hidden">
        <button onclick="toggleSidebar()" class="text-gray-600 hover:text-green-600 transition-colors duration-200 p-2 rounded-lg hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-sm">A</span>
            </div>
            <span class="text-lg font-bold text-gray-800">Admin Panel</span>
        </div>
        <div class="w-10"></div> <!-- Spacer for alignment -->
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div id="adminSidebar" class="admin-sidebar w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl min-h-screen">
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-gray-700 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">A</span>
                    </div>
                    <span class="text-xl font-bold text-white">Admin Panel</span>
                </div>
                <button onclick="closeSidebar()" class="lg:hidden text-gray-400 hover:text-white transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div class="flex-1 py-6 overflow-y-auto">
                <nav class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <!-- User Management -->
                    <a href="{{ route('admin.users') }}" class="admin-sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.users*') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span>User Management</span>
                    </a>
                    
                    <!-- Deposit Requests with Pending Badge -->
                    <a href="{{ route('admin.deposits') }}" class="admin-sidebar-item flex items-center justify-between px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.deposits') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Deposit Requests</span>
                        </div>
                        @php
                            $pendingDepositsCount = \App\Models\DepositRequest::where('status', 'pending')->count();
                        @endphp
                        @if($pendingDepositsCount > 0)
                            <span class="pending-badge">{{ $pendingDepositsCount }}</span>
                        @endif
                    </a>
                    
                    <!-- Withdrawals -->
                    <a href="{{ route('admin.withdrawals') }}" class="admin-sidebar-item flex items-center justify-between px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.withdrawals') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Withdrawals</span>
                        </div>
                        @php
                            $pendingCount = \App\Models\WithdrawalRequest::where('status', 'pending')->count();
                        @endphp
                        @if($pendingCount > 0)
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                        @endif
                    </a>
                    
                    <!-- Investments -->
                    <a href="{{ route('admin.investments') }}" class="admin-sidebar-item flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.investments') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span>Investments</span>
                    </a>

                    <!-- Card Applications -->
                    <a href="{{ route('admin.card-applications') }}" class="admin-sidebar-item flex items-center justify-between px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.card-applications') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                            <span>Card Applications</span>
                        </div>
                        @php
                            $pendingCards = \App\Models\CardApplication::where('status', 'pending')->count();
                        @endphp
                        @if($pendingCards > 0)
                            <span class="pending-badge">{{ $pendingCards }}</span>
                        @endif
                    </a>
                </nav>
            </div>
            
            <!-- Footer Section -->
            <div class="p-4 border-t border-gray-700">
                <a href="/dashboard" class="flex items-center space-x-3 px-4 py-2 text-gray-400 hover:text-white transition-colors duration-300 rounded-lg hover:bg-gray-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Back to Site</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 w-full px-4 py-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 admin-content">
            <!-- Desktop Navbar (visible on larger screens) -->
            <div class="hidden lg:block bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-gray-800">Admin Dashboard</h1>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                        <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <main class="p-6">
                @yield('admin-content')
            </main>
        </div>
    </div>
    
    <script>
        // Get sidebar element
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('active');
            if (sidebar.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
        
        function closeSidebar() {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Close sidebar when clicking overlay
        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }
        
        // Close sidebar on window resize if open and screen becomes larger
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                closeSidebar();
            }
        });
        
        // Prevent body scroll when sidebar is open on mobile
        document.addEventListener('touchmove', function(e) {
            if (sidebar.classList.contains('open') && window.innerWidth < 768) {
                e.preventDefault();
            }
        }, { passive: false });
    </script>
</body>
</html>