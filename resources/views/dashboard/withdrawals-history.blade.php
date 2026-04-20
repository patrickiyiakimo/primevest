@extends('layouts.dashboard')

@section('page-title', 'Withdrawal History')
@section('breadcrumb', 'View all your withdrawal transactions')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold">Hi, welcome back!</h1>
                <p class="text-gray-300 mt-1">Your withdrawal history</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/20">
                <span class="text-green-400 text-sm font-semibold">💰 Total Withdrawn: ${{ number_format($totalWithdrawals ?? 0, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Withdrawal History Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Withdrawal History</h2>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="window.location.href='{{ route('withdraw') }}'" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition-all duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Withdrawal
                    </button>
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
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $withdrawals->firstItem() + $index }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">${{ number_format($withdrawal->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span class="inline-flex items-center gap-1">
                                @if($withdrawal->method == 'bitcoin')
                                    <span class="text-orange-500">₿</span> Bitcoin (BTC)
                                @elseif($withdrawal->method == 'ethereum')
                                    <span class="text-indigo-500">Ξ</span> Ethereum (ERC20)
                                @elseif($withdrawal->method == 'solana')
                                    <span class="text-purple-500">◎</span> Solana
                                @elseif($withdrawal->method == 'usdt_erc20')
                                    <span class="text-blue-500">USDT</span> Tether (ERC20)
                                @elseif($withdrawal->method == 'usdt_trc20')
                                    <span class="text-teal-500">USDT</span> Tether (TRC20)
                                @else
                                    {{ ucfirst($withdrawal->method ?? 'N/A') }}
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">
                            {{ substr($withdrawal->wallet_address ?? 'N/A', 0, 15) }}...
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $withdrawal->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($withdrawal->status == 'completed')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                                    Completed
                                </span>
                            @elseif($withdrawal->status == 'pending')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                    <span class="w-1.5 h-1.5 bg-yellow-600 rounded-full mr-1.5 animate-pulse"></span>
                                    Pending
                                </span>
                            @elseif($withdrawal->status == 'processing')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    <span class="w-1.5 h-1.5 bg-blue-600 rounded-full mr-1.5"></span>
                                    Processing
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
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
                            <p class="text-xs mt-1">Make your first withdrawal to see it here</p>
                            <div class="mt-4">
                                <a href="{{ route('withdraw') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition-all duration-300">
                                    Request Withdrawal
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($withdrawals) && method_exists($withdrawals, 'links'))
        <div class="border-t border-gray-100 px-6 py-4 bg-gray-50">
            {{ $withdrawals->links() }}
        </div>
        @endif
    </div>
    
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-5 border border-green-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-green-700">Total Withdrawn</p>
                    <p class="text-2xl font-bold text-green-800">${{ number_format($totalWithdrawals ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-5 border border-blue-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-blue-700">Average Withdrawal</p>
                    <p class="text-2xl font-bold text-blue-800">${{ number_format($averageWithdrawal ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-5 border border-purple-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-purple-700">Last Withdrawal</p>
                    <p class="text-2xl font-bold text-purple-800">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-5 border border-yellow-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-yellow-700">Pending Requests</p>
                    <p class="text-2xl font-bold text-yellow-800">{{ $pendingCount ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<script>
    // Toast Notification System
    class Toast {
        constructor() {
            this.container = document.getElementById('toastContainer');
        }
        
        show(message, type = 'success', duration = 4000) {
            const toast = document.createElement('div');
            const colors = {
                success: 'bg-green-600',
                error: 'bg-red-600',
                warning: 'bg-yellow-600',
                info: 'bg-blue-600'
            };
            const icons = {
                success: '✓',
                error: '✗',
                warning: '⚠',
                info: 'ℹ'
            };
            
            toast.className = `${colors[type]} text-white px-5 py-3 rounded-xl shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 4000) { this.show(message, 'success', duration); }
        error(message, duration = 4000) { this.show(message, 'error', duration); }
        warning(message, duration = 4000) { this.show(message, 'warning', duration); }
        info(message, duration = 4000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    
    @if(session('success'))
        toast.success('{{ session('success') }}');
    @endif
    
    @if(session('error'))
        toast.error('{{ session('error') }}');
    @endif
</script>

<style>
    table {
        min-width: 700px;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection