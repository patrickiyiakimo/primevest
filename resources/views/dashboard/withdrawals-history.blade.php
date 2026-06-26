@extends('layouts.dashboard')

@section('page-title', 'Withdrawal History')
@section('breadcrumb', 'View all your withdrawal transactions')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="border-l-4 border-green-600 shadow-md p-6 bg-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Withdrawal History</h1>
                <p class="text-gray-500 mt-1">View all your withdrawal transactions</p>
            </div>
            <div class="bg-green-50 border border-green-200 px-5 py-2.5">
                <span class="text-green-600 text-sm font-semibold">💰 Total Withdrawn: ${{ number_format($totalWithdrawals ?? 0, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Withdrawal History Table -->
    <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Withdrawal History</h2>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('withdraw') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition-all duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Withdrawal
                    </a>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount (USD)</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Wallet Address</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($withdrawals ?? [] as $index => $withdrawal)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ ($withdrawals->currentPage() - 1) * $withdrawals->perPage() + $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">${{ number_format($withdrawal->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ ucfirst($withdrawal->method) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ substr($withdrawal->wallet_address, 0, 15) }}...</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $withdrawal->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($withdrawal->status == 'approved')
                                <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                                    Completed
                                </span>
                            @elseif($withdrawal->status == 'pending')
                                <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700">
                                    <span class="w-1.5 h-1.5 bg-yellow-600 rounded-full mr-1.5"></span>
                                    Pending
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-red-100 text-red-700">
                                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                    {{ ucfirst($withdrawal->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm font-medium">No withdrawal history found</p>
                            <p class="text-xs mt-1">Your approved withdrawals will appear here</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($withdrawals) && method_exists($withdrawals, 'links'))
        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
            {{ $withdrawals->links() }}
        </div>
        @endif
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="border-l-4 border-green-500 p-5 bg-white border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Withdrawn</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($totalWithdrawals ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="border-l-4 border-blue-500 p-5 bg-white border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Average Withdrawal</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($averageWithdrawal ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="border-l-4 border-purple-500 p-5 bg-white border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Last Withdrawal</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="border-l-4 border-yellow-500 p-5 bg-white border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pending Requests</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pendingCount ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* No rounded corners */
    .bg-white, .border, button, a, .bg-green-50, .bg-blue-100, .bg-purple-100, .bg-yellow-100 {
        border-radius: 0 !important;
    }
    
    /* Remove all border-radius */
    * {
        border-radius: 0 !important;
    }
    
    .rounded-full {
        border-radius: 0 !important;
    }
    
    table {
        min-width: 600px;
    }
</style>
@endsection