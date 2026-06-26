<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - PrimeVest</title>
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
            background: #f1f5f9;
        }
        
        /* ============================================
           PROFESSIONAL ADMIN SIDEBAR
        ============================================ */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            background: #ffffff;
            z-index: 1000;
            overflow-y: auto;
            transition: transform 0.3s ease;
            border-right: 1px solid #e2e8f0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.02);
        }
        
        /* Custom Scrollbar */
        .admin-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .admin-sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
        }
        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #ef4444;
        }
        
        /* Logo Section */
        .sidebar-logo {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid #eef2f6;
            margin-bottom: 1rem;
        }
        
        .sidebar-logo a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        
        .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-icon svg {
            width: 20px;
            height: 20px;
            color: white;
        }
        
        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            letter-spacing: -0.3px;
        }
        
        .logo-sub {
            font-size: 0.6rem;
            color: #64748b;
            margin-top: 0.15rem;
        }
        
        /* Navigation */
        .nav-section {
            padding: 0 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .nav-section-title {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #94a3b8;
            padding: 0 0.75rem 0.5rem;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            margin-bottom: 0.25rem;
            color: #475569;
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
            color: #94a3b8;
        }
        
        .nav-item:hover svg,
        .nav-item-active svg {
            color: #dc2626;
        }
        
        /* Stats Cards in Sidebar */
        .sidebar-stats {
            padding: 0 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.7rem;
            color: #64748b;
            margin-bottom: 0.25rem;
        }
        
        .stat-value {
            font-size: 1.25rem;
            font-weight: 700;
        }
        
        .stat-value.yellow { color: #d97706; }
        .stat-value.green { color: #059669; }
        .stat-value.red { color: #dc2626; }
        .stat-value.blue { color: #2563eb; }
        
        /* Divider */
        .sidebar-divider {
            height: 1px;
            background: #eef2f6;
            margin: 1rem 0.75rem;
        }
        
        /* Logout Button */
        .logout-btn {
            width: calc(100% - 1.5rem);
            margin: 0 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            color: #475569;
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
        .admin-main {
            margin-left: 280px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }
        
        /* Top Navbar */
        .admin-top-navbar {
            position: sticky;
            top: 0;
            right: 0;
            left: 280px;
            z-index: 40;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: left 0.3s ease;
        }
        
        .page-title h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #0f172a;
        }
        
        .page-title p {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 0.125rem;
        }
        
        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #dc2626, #991b1b);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .user-avatar span {
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }
        
        /* Mobile Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        
        .sidebar-overlay.active {
            display: block;
        }
        
        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            
            .admin-sidebar.open {
                transform: translateX(0);
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .admin-top-navbar {
                left: 0;
            }
        }
        
        @media (min-width: 1025px) {
            .sidebar-overlay {
                display: none !important;
            }
        }
        
        /* No rounded corners */
        .admin-sidebar, .nav-item, .stat-card, .logout-btn, .user-avatar, .logo-icon {
            border-radius: 0 !important;
        }
        
        /* Badge for pending KYC count */
        .nav-badge {
            margin-left: auto;
            background: #dc2626;
            color: white;
            font-size: 0.65rem;
            font-weight: 600;
            padding: 0.15rem 0.45rem;
            line-height: 1.2;
        }
    </style>
</head>
<body>

<!-- Sidebar Overlay -->
<div id="sidebarOverlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

<!-- Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="{{ route('admin.dashboard') }}">
            <div class="logo-icon">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
            <div>
                <div class="logo-text">PrimeVest</div>
                <div class="logo-sub">Admin Panel</div>
            </div>
        </a>
    </div>
    
    <!-- Navigation -->
    <div class="nav-section">
        <div class="nav-section-title">MAIN MENU</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Users</span>
        </a>
        <a href="{{ route('admin.deposits') }}" class="nav-item {{ request()->routeIs('admin.deposits*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Deposits</span>
        </a>
        <a href="{{ route('admin.withdrawals') }}" class="nav-item {{ request()->routeIs('admin.withdrawals*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Withdrawals</span>
        </a>
        <a href="{{ route('admin.investments') }}" class="nav-item {{ request()->routeIs('admin.investments*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
            </svg>
            <span>Investments</span>
        </a>
        <!-- COPY TRADING MANAGEMENT -->
        <a href="{{ route('admin.copy-traders.index') }}" class="nav-item {{ request()->routeIs('admin.copy-traders*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10H7m6 0h6m-6 4H7m6 0h6m-6 4H7m6 0h6"></path>
            </svg>
            <span>Copy Traders</span>
        </a>


        <a href="{{ route('admin.card-applications') }}" class="nav-item {{ request()->routeIs('admin.card-applications*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </svg>
            <span>Card Apps</span>
        </a>
      <!-- STOCK MANAGEMENT SECTION -->
<div class="nav-section">
    <div class="nav-section-title">STOCK MANAGEMENT</div>
    <a href="{{ route('admin.stock.prices') }}" class="nav-item {{ request()->routeIs('admin.stock.prices*') ? 'nav-item-active' : '' }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9m3-9L9 5m3 1l3-2m0 0l3-1m-3 1L9 8m3 1l3-2m0 0l3-1m-3 1L9 11m3 1l3-2m0 0l3-1m-3 1L9 14m3 1l3-2m0 0l3-1m-3 1L9 17m6 1l3-2m0 0l3-1m-3 1L9 20M9 20l-3.5.94a4.501 4.501 0 01-4.263-7.418l12.762-4.34a4.501 4.501 0 014.263 7.418L15 21"></path>
        </svg>
        <span>Stock Prices</span>
    </a>
    <a href="{{ route('admin.stock.portfolio') }}" class="nav-item {{ request()->routeIs('admin.stock.portfolio*') ? 'nav-item-active' : '' }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
        </svg>
        <span>User Portfolios</span>
    </a>
    <a href="{{ route('admin.stock.transactions') }}" class="nav-item {{ request()->routeIs('admin.stock.transactions*') ? 'nav-item-active' : '' }}">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
        </svg>
        <span>Transactions</span>
    </a>
</div>

        <!-- ============================================
             KYC SUBMISSIONS MENU ITEM (NEW)
        ============================================ -->
        <a href="{{ route('admin.kyc.index') }}" class="nav-item {{ request()->routeIs('admin.kyc*') ? 'nav-item-active' : '' }}">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>KYC Submissions</span>
            <!-- Optional pending badge (will be populated dynamically or via backend) -->
            @if(isset($pendingKYC) && $pendingKYC > 0)
                <span class="nav-badge">{{ $pendingKYC }}</span>
            @endif
        </a>
    </div>
    
    <!-- KYC Stats Section -->
    <div class="sidebar-stats">
        <div class="nav-section-title">KYC OVERVIEW</div>
        <div class="stat-card">
            <div class="stat-label">Pending Verification</div>
            <div class="stat-value yellow">{{ $pendingKYC ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Verified Users</div>
            <div class="stat-value green">{{ $verifiedKYC ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Rejected</div>
            <div class="stat-value red">{{ $rejectedKYC ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Not Submitted</div>
            <div class="stat-value blue">{{ $notSubmittedKYC ?? 0 }}</div>
        </div>
    </div>
    
    <div class="sidebar-divider"></div>
    
    <!-- Logout -->
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

<!-- Main Content -->
<main class="admin-main">
    <nav class="admin-top-navbar">
        <div class="page-title">
            <h1>@yield('page-title', 'Admin Dashboard')</h1>
            <p>@yield('breadcrumb', 'Welcome back, ' . Auth::user()->name)</p>
        </div>
        
        <div class="user-menu">
            <!-- Mobile Menu Button -->
            <button id="mobileMenuToggle" class="lg:hidden p-2 hover:bg-gray-100 transition-colors duration-300">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            
            <div class="text-right hidden sm:block">
                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
            
            <div class="user-avatar">
                <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
        </div>
    </nav>
    
    <div class="p-6">
        @yield('admin-content')
    </div>
</main>

<script>
    // Mobile sidebar toggle functionality
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    
    function openSidebar() {
        if (sidebar) sidebar.classList.add('open');
        if (overlay) overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    function closeSidebar() {
        if (sidebar) sidebar.classList.remove('open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    function toggleSidebar() {
        if (sidebar?.classList.contains('open')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    }
    
    // Toggle button click
    if (mobileToggle) {
        mobileToggle.addEventListener('click', toggleSidebar);
    }
    
    // Close sidebar on window resize if open
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024 && sidebar?.classList.contains('open')) {
            closeSidebar();
        }
    });
    
    // Close sidebar when clicking on overlay
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
</script>

</body>
</html>