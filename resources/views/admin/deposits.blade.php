<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Deposits Management | ProfitMassTrade</title>
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
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .status-approved {
            background-color: #d1fae5;
            color: #059669;
        }
        
        .status-rejected {
            background-color: #fee2e2;
            color: #dc2626;
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
            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-green-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Users</span>
            </a>
            <a href="{{ route('admin.deposits') }}" class="flex items-center gap-3 px-4 py-2 text-green-600 bg-green-600/20 text-white transition-all duration-300 mt-1">
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
            <h1 class="text-xl font-bold text-gray-900">Deposits Management</h1>
            <p class="text-sm text-gray-500">View and manage all deposit requests</p>
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
        <!-- Pending Deposits Section -->
        <div class="mb-8">
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-yellow-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h2 class="text-lg font-semibold text-yellow-800">Pending Deposit Requests</h2>
                        </div>
                        <span class="px-3 py-1 bg-yellow-200 text-yellow-800 text-sm font-semibold">{{ $pendingDeposits->count() }} Pending</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">User</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Amount</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Method</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Date</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Proof</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pendingDeposits as $deposit)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 text-sm">
                                    {{ $deposit->user->name ?? 'N/A' }}<br>
                                    <span class="text-xs text-gray-500">{{ $deposit->user->email ?? '' }}</span>
                                </td>
                                <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($deposit->amount, 2) }}</td>
                                <td class="px-4 py-3 text-sm">{{ ucfirst($deposit->method) }}</td>
                                <td class="px-4 py-3 text-sm">{{ $deposit->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if($deposit->proof_path)
                                        <a href="{{ Storage::url($deposit->proof_path) }}" target="_blank" class="text-blue-600 hover:underline">View Proof</a>
                                    @else
                                        <span class="text-gray-400">No proof</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex gap-2">
                                        <form method="POST" action="{{ route('admin.deposits.approve', $deposit) }}">
                                            @csrf
                                            <button type="submit" class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.deposits.reject', $deposit) }}">
                                            @csrf
                                            <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs">Reject</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    No pending deposit requests
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Recent Deposits Section -->
        <div>
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Recent Approved Deposits</h2>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">User</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Amount</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Method</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Date</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($approvedDeposits as $deposit)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 text-sm">
                                    {{ $deposit->user->name ?? 'N/A' }}<br>
                                    <span class="text-xs text-gray-500">{{ $deposit->user->email ?? '' }}</span>
                                </td>
                                <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($deposit->amount, 2) }}</td>
                                <td class="px-4 py-3 text-sm">{{ ucfirst($deposit->method) }}</td>
                                <td class="px-4 py-3 text-sm">{{ $deposit->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="status-badge status-approved">Approved</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                    No approved deposits found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>