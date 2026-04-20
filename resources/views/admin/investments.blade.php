@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Investment Management</h1>
            <p class="text-sm text-gray-500 mt-1">Monitor and manage all user investments</p>
        </div>
        <div class="bg-green-50 px-4 py-2 rounded-xl">
            <span class="text-green-600 font-semibold">Active Investments: {{ $activeInvestments }}</span>
        </div>
    </div>

    <!-- Investment Summary Cards - Clean Design -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Invested</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($totalInvested, 2) }}</p>
                </div>
                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100">
                <span class="text-xs text-gray-400">Across all users</span>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Active Investments</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $activeInvestments }}</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100">
                <span class="text-xs text-gray-400">Currently active</span>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Completed Investments</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $completedInvestments }}</p>
                </div>
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100">
                <span class="text-xs text-gray-400">Successfully completed</span>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Returns</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($totalReturns, 2) }}</p>
                </div>
                <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-gray-100">
                <span class="text-xs text-gray-400">Paid out to investors</span>
            </div>
        </div>
    </div>

    <!-- Investments Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">All Investments</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Detailed list of all investment records</p>
                </div>
                <div class="flex gap-2">
                    <button onclick="filterInvestments('all')" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 bg-gray-900 text-white shadow-sm">All</button>
                    <button onclick="filterInvestments('active')" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200">Active</button>
                    <button onclick="filterInvestments('completed')" class="filter-btn px-4 py-1.5 text-sm font-medium rounded-lg transition-all duration-200 bg-gray-100 text-gray-700 hover:bg-gray-200">Completed</button>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Investor</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Plan</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ROI</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Expected Return</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Start Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">End Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Days Left</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($investments as $investment)
                    <tr class="investment-row hover:bg-gray-50 transition-colors duration-200" data-status="{{ $investment->status }}">
                        <td class="px-6 py-4 text-sm text-gray-500">#{{ $investment->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-100 to-emerald-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-xs font-semibold">{{ substr($investment->user->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $investment->user->name }}</p>
                                    <p class="text-xs text-gray-400">{{ $investment->user->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if($investment->plan_name == 'VIP Elite Plan')
                                    <span class="text-yellow-500">👑</span>
                                @elseif($investment->plan_name == 'Diamond Plan')
                                    <span class="text-blue-500">💎</span>
                                @elseif($investment->plan_name == 'Platinum Plan')
                                    <span class="text-gray-500">⚡</span>
                                @elseif($investment->plan_name == 'Gold Plan')
                                    <span class="text-yellow-500">🥇</span>
                                @elseif($investment->plan_name == 'Silver Plan')
                                    <span class="text-gray-400">🥈</span>
                                @else
                                    <span class="text-green-500">🚀</span>
                                @endif
                                <span class="text-sm text-gray-700">{{ $investment->plan_name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-semibold text-green-600">${{ number_format($investment->amount, 2) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-medium text-blue-600">{{ $investment->roi }}%</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm font-semibold text-purple-600">${{ number_format($investment->expected_return, 2) }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $investment->start_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $investment->end_date->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            @if($investment->status == 'active')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                    <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-1.5"></span>
                                    Completed
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($investment->status == 'active')
                                @php
                                    $daysLeft = max(0, now()->diffInDays($investment->end_date, false));
                                @endphp
                                @if($daysLeft > 0)
                                    <span class="text-sm font-medium text-amber-600">{{ $daysLeft }} days</span>
                                @else
                                    <span class="text-sm font-medium text-emerald-600">Due today</span>
                                @endif
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($investments->hasPages())
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
            {{ $investments->links() }}
        </div>
        @endif
    </div>
</div>

<script>
    function filterInvestments(status) {
        const rows = document.querySelectorAll('.investment-row');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update button styles
        buttons.forEach(btn => {
            btn.classList.remove('bg-gray-900', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-700');
        });
        
        const activeBtn = event.target;
        activeBtn.classList.remove('bg-gray-100', 'text-gray-700');
        activeBtn.classList.add('bg-gray-900', 'text-white');
        
        // Filter rows
        rows.forEach(row => {
            if (status === 'all') {
                row.style.display = '';
            } else {
                if (row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }
</script>

<style>
    .filter-btn {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    
    .filter-btn:hover {
        transform: translateY(-1px);
    }
</style>
@endsection