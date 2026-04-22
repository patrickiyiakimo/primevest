@extends('layouts.dashboard')

@section('page-title', 'Investments History')
@section('breadcrumb', 'Track all your investment activities')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold">Hi, welcome back!</h1>
                <p class="text-gray-300 mt-1">Your investments history</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/20">
                <span class="text-green-400 text-sm font-semibold">💰 Total Invested: ${{ number_format($totalInvested ?? 0, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Investment Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-5 border border-green-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-green-700">Total Invested</p>
                    <p class="text-2xl font-bold text-green-800">${{ number_format($totalInvested ?? 0, 2) }}</p>
                </div>
                <!-- <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div> -->
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-5 border border-blue-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-blue-700">Active Investments</p>
                    <p class="text-2xl font-bold text-blue-800">{{ $activeInvestments ?? 0 }}</p>
                </div>
                <!-- <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div> -->
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-5 border border-purple-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-purple-700">Total Returns</p>
                    <p class="text-2xl font-bold text-purple-800">${{ number_format($totalReturns ?? 0, 2) }}</p>
                </div>
                <!-- <div class="w-5 h-5 bg-purple-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div> -->
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl p-5 border border-yellow-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-yellow-700">ROI</p>
                    <p class="text-2xl font-bold text-yellow-800">{{ number_format($roi ?? 0, 2) }}%</p>
                </div>
                <!-- <div class="w-5 h-5 bg-yellow-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div> -->
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-red-50 to-rose-50 rounded-2xl p-5 border border-red-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-red-700">Completed</p>
                    <p class="text-2xl font-bold text-red-800">{{ $completedInvestments ?? 0 }}</p>
                </div>
                <!-- <div class="w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Investments History Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-900">Investments History</h2>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Plan Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ROI</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Expected Return</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Start Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">End Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
 @forelse($investments ?? [] as $index => $investment)
                     <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $investments->firstItem() + $index }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-800">
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
                                {{ $investment->plan_name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold text-green-600">${{ number_format($investment->amount, 2) }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-blue-600">{{ $investment->roi }}%</td>
                        <td class="px-6 py-4 text-sm font-semibold text-purple-600">${{ number_format($investment->expected_return, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $investment->start_date ? $investment->start_date->format('Y-m-d') : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $investment->end_date ? $investment->end_date->format('Y-m-d') : 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if($investment->status == 'active')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5 animate-pulse"></span>
                                    Active
                                </span>
                            @elseif($investment->status == 'completed')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    <span class="w-1.5 h-1.5 bg-blue-600 rounded-full mr-1.5"></span>
                                    Completed
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                    {{ ucfirst($investment->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm font-medium">No investment history found</p>
                            <p class="text-xs mt-1">Start investing to see your investments here</p>
                            <div class="mt-4">
                                <a href="{{ route('invest') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition-all duration-300">
                                    Start Investing
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
        @if(isset($investments) && method_exists($investments, 'links'))
        <div class="border-t border-gray-100 px-6 py-4 bg-gray-50">
            {{ $investments->links() }}
        </div>
        @endif
    </div>
   
    <!-- Investment Distribution -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Investment Distribution</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @if(($vipPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">VIP Elite Plan</span>
                            <span class="font-semibold text-gray-800">{{ $vipPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $vipPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($diamondPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Diamond Plan</span>
                            <span class="font-semibold text-gray-800">{{ $diamondPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $diamondPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($platinumPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Platinum Plan</span>
                            <span class="font-semibold text-gray-800">{{ $platinumPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gray-500 h-2 rounded-full" style="width: {{ $platinumPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($goldPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Gold Plan</span>
                            <span class="font-semibold text-gray-800">{{ $goldPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: {{ $goldPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($silverPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Silver Plan</span>
                            <span class="font-semibold text-gray-800">{{ $silverPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gray-400 h-2 rounded-full" style="width: {{ $silverPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($starterPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Starter Plan</span>
                            <span class="font-semibold text-gray-800">{{ $starterPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: {{ $starterPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                    
                    @if(($otherPercentage ?? 0) > 0)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Other Plans</span>
                            <span class="font-semibold text-gray-800">{{ $otherPercentage ?? 0 }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gray-300 h-2 rounded-full" style="width: {{ $otherPercentage ?? 0 }}%"></div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-900">Quick Actions</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <a href="{{ route('invest') }}" class="flex items-center justify-between p-4 bg-green-50 rounded-xl hover:bg-green-100 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Make New Investment</p>
                                <p class="text-xs text-gray-500">Start earning passive income</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-between p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">View Dashboard</p>
                                <p class="text-xs text-gray-500">Check your portfolio performance</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ route('deposit') }}" class="flex items-center justify-between p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition-all duration-300">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Add Funds</p>
                                <p class="text-xs text-gray-500">Deposit to increase investment</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<script>
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
        min-width: 900px;
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