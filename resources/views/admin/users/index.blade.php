<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Users Management | ProfitMassTrade</title>
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
        
        table {
            min-width: 800px;
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
            <h1 class="text-xl font-bold text-gray-900">Users Management</h1>
            <p class="text-sm text-gray-500">View and manage all registered users</p>
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
        <div class="space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white border-l-4 border-blue-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Total Users</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers ?? $users->total() }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-green-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Active Users</p>
                    <p class="text-3xl font-bold text-green-600">{{ $activeUsers ?? 0 }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-purple-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Total Balance</p>
                    <p class="text-3xl font-bold text-purple-600">${{ number_format($totalBalance ?? 0, 2) }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-yellow-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">New This Month</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $newUsersThisMonth ?? 0 }}</p>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">All Users</h2>
                        <div class="flex items-center gap-2">
                            <input type="text" id="searchInput" placeholder="Search users..." class="px-4 py-2 border border-gray-200 focus:outline-none focus:border-green-500 w-64">
                            <button onclick="window.location.reload()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white transition-all duration-300">
                                Refresh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Balance</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Joined</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Country</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100" id="usersTable">
                            @forelse($users ?? [] as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $user->id }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($user->balance, 2) }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">
                                        Active
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600 hover:text-green-700">Edit</a>
                                        <button onclick="viewUser({{ $user->id }})" class="text-blue-600 hover:text-blue-700">View</button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $user->phone ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $user->country ?? 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                                    No users found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if(isset($users) && method_exists($users, 'hasPages') && $users->hasPages())
                <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
                    {{ $users->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<script>
    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        filterTable();
    });
    
    function filterTable() {
        const searchTerm = document.getElementById('searchInput')?.value.toLowerCase() || '';
        const rows = document.querySelectorAll('#usersTable tr');
        
        rows.forEach(row => {
            const name = row.querySelector('td:nth-child(2)')?.innerText.toLowerCase() || '';
            const email = row.querySelector('td:nth-child(3)')?.innerText.toLowerCase() || '';
            
            if (name.includes(searchTerm) || email.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    function viewUser(userId) {
        window.location.href = `/admin/users/${userId}/edit`;
    }
</script>

</body>
</html>