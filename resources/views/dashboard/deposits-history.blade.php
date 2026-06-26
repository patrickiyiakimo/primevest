@extends('layouts.dashboard')

@section('page-title', 'Deposit History')
@section('breadcrumb', 'View all your deposit transactions')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="border-l-4 border-green-600 shadow-md p-6 bg-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Deposit History</h1>
                <p class="text-gray-500 mt-1">View all your deposit transactions</p>
            </div>
            <div class="bg-green-50 border border-green-200 px-5 py-2.5">
                <span class="text-green-600 text-sm font-semibold">💰 Total Deposited: ${{ number_format($totalDeposits ?? 0, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Deposit History Table -->
    <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Deposit History</h2>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="window.location.href='{{ route('deposit') }}'" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition-all duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Deposit
                    </button>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">USD</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">BTC</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">DATE</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($deposits ?? [] as $index => $deposit)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">${{ number_format($deposit['amount'] ?? 0, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            @php
                                $btcRate = 65000; // Example BTC rate
                                $btcAmount = ($deposit['amount'] ?? 0) / $btcRate;
                            @endphp
                            ₿{{ number_format($btcAmount, 6) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span class="inline-flex items-center gap-1">
                                @if(($deposit['method'] ?? '') == 'bitcoin')
                                    <span class="text-orange-600">₿</span> Bitcoin
                                @elseif(($deposit['method'] ?? '') == 'ethereum')
                                    <span class="text-indigo-600">Ξ</span> Ethereum
                                @elseif(($deposit['method'] ?? '') == 'solana')
                                    <span class="text-purple-600">◎</span> Solana
                                @elseif(($deposit['method'] ?? '') == 'usdt_erc20')
                                    <span class="text-blue-600">USDT</span> (ERC20)
                                @elseif(($deposit['method'] ?? '') == 'usdt_trc20')
                                    <span class="text-teal-600">USDT</span> (TRC20)
                                @elseif(($deposit['method'] ?? '') == 'paypal')
                                    <span class="text-blue-600">P</span> PayPal
                                @elseif(($deposit['method'] ?? '') == 'etransfer')
                                    <span class="text-red-600">E</span> E-Transfer
                                @else
                                    Bank Transfer
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $deposit['date'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                                Completed
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm font-medium">No deposit history found</p>
                            <p class="text-xs mt-1">Make your first deposit to see it here</p>
                            <div class="mt-4">
                                <a href="{{ route('deposit') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition-all duration-300">
                                    Make a Deposit
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
        @if(isset($deposits) && method_exists($deposits, 'links'))
        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
            {{ $deposits->links() }}
        </div>
        @endif
    </div>
    
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="border-l-4 border-green-500 p-5 bg-white border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Deposits</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($totalDeposits ?? 0, 2) }}</p>
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
                    <p class="text-sm text-gray-500">Average Deposit</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($averageDeposit ?? 0, 2) }}</p>
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
                    <p class="text-sm text-gray-500">Last Deposit</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($lastDepositAmount ?? 0, 2) }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            if (!this.container) {
                this.container = document.createElement('div');
                this.container.id = 'toastContainer';
                this.container.className = 'toast-container';
                document.body.appendChild(this.container);
            }
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
            
            toast.className = `${colors[type]} text-white px-5 py-3 shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
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
    /* No rounded corners */
    .bg-white, .border, button, .toast, .bg-green-50, .bg-blue-100, .bg-purple-100 {
        border-radius: 0 !important;
    }
    
    /* Remove all border-radius */
    * {
        border-radius: 0 !important;
    }
    
    table {
        min-width: 600px;
    }
    
    .rounded-full {
        border-radius: 0 !important;
    }
</style>
@endsection