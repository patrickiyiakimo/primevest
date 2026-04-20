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
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .admin-sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1000;
                height: 100vh;
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="admin-sidebar w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl min-h-screen">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">A</span>
                    </div>
                    <span class="text-xl font-bold text-white">Admin Panel</span>
                </div>
            </div>
            
            <div class="flex-1 py-6">
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white transition-all duration-300 {{ request()->routeIs('admin.users*') ? 'bg-gray-700 text-white border-l-4 border-green-500' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span>User Management</span>
                    </a>
                </nav>
            </div>
            
            <div class="p-4 border-t border-gray-700">
                <a href="/dashboard" class="flex items-center space-x-3 px-4 py-2 text-gray-400 hover:text-white transition-colors duration-300">
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
        <div class="flex-1">
            <main class="p-6">
                @yield('admin-content')
            </main>
        </div>
    </div>
    
    <script>
        // Mobile menu toggle
        const sidebar = document.querySelector('.admin-sidebar');
        const overlay = document.createElement('div');
        overlay.className = 'fixed inset-0 bg-black/50 z-40 hidden';
        document.body.appendChild(overlay);
        
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
        }
    </script>
</body>
</html>