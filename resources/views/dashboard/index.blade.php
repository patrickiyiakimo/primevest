@extends('layouts.dashboard')

@section('dashboard-content')
<div class="space-y-8">
    <!-- Stats Cards - Credit/Debit Card Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Main Balance Card -->
    <div class="relative bg-gradient-to-br from-gray-800 to-gray-900 rounded-md  overflow-hidden group transition-all duration-300">
        <!-- Card Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
                <circle cx="20" cy="20" r="15" fill="white"/>
                <circle cx="80" cy="80" r="25" fill="white"/>
                <circle cx="50" cy="50" r="10" fill="white"/>
            </svg>
        </div>
        
        <!-- Card Chip -->
        <div class="absolute top-4 left-4">
            <svg width="40" height="30" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="36" rx="4" fill="#D4AF37"/>
                <rect x="6" y="6" width="36" height="24" rx="2" fill="none" stroke="#B8960C" stroke-width="1.5"/>
                <line x1="24" y1="6" x2="24" y2="30" stroke="#B8960C" stroke-width="1"/>
                <line x1="6" y1="18" x2="42" y2="18" stroke="#B8960C" stroke-width="1"/>
            </svg>
        </div>
        
        <!-- Card Brand -->
        <div class="absolute top-4 right-4">
            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">PrimeVest</p>
        </div>
        
        <div class="p-6 pt-16">
            <!-- Card Type -->
            <div class="mb-8">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Main Balance</p>
                <p class="text-3xl font-bold text-white">${{ number_format($user->balance, 2) }}</p>
            </div>
            
            <!-- Card Footer -->
            <div class="flex justify-between items-end">
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Card Holder</p>
                    <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-gray-500 uppercase tracking-wider">Valid Thru</p>
                    <p class="text-sm font-semibold text-white">08/28</p>
                </div>
            </div>
        </div>
        
        <!-- Card Hover Glow -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 via-green-500/10 to-green-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>

    <!-- Profits Card -->
    <div class="relative bg-gradient-to-br from-green-800 to-green-900 rounded-md shadow-2xl overflow-hidden group transition-all duration-300">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
                <path d="M10,50 L30,30 L50,50 L70,30 L90,50" fill="none" stroke="white" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="absolute top-4 left-4">
            <svg width="40" height="30" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="36" rx="4" fill="#D4AF37"/>
                <rect x="6" y="6" width="36" height="24" rx="2" fill="none" stroke="#B8960C" stroke-width="1.5"/>
                <line x1="24" y1="6" x2="24" y2="30" stroke="#B8960C" stroke-width="1"/>
                <line x1="6" y1="18" x2="42" y2="18" stroke="#B8960C" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="absolute top-4 right-4">
            <p class="text-[10px] text-green-300 uppercase tracking-wider font-semibold">PrimeVest</p>
        </div>
        
        <div class="p-6 pt-16">
            <div class="mb-8">
                <p class="text-xs text-green-300 uppercase tracking-wider mb-1">Profits</p>
                <p class="text-3xl font-bold text-white">${{ number_format($profits ?? 0, 2) }}</p>
            </div>
            <div class="flex justify-between items-end">
                <div>
                    <p class="text-[10px] text-green-300 uppercase tracking-wider">Card Holder</p>
                    <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-green-300 uppercase tracking-wider">Valid Thru</p>
                    <p class="text-sm font-semibold text-white">08/28</p>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 via-green-400/10 to-green-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>

    <!-- Last Deposit Card -->
    <div class="relative bg-gradient-to-br from-blue-800 to-blue-900 rounded-md shadow-2xl overflow-hidden group transition-all duration-300">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
                <circle cx="50" cy="50" r="20" fill="none" stroke="white" stroke-width="1"/>
                <line x1="50" y1="35" x2="50" y2="65" stroke="white" stroke-width="1"/>
                <line x1="35" y1="50" x2="65" y2="50" stroke="white" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="absolute top-4 left-4">
            <svg width="40" height="30" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="36" rx="4" fill="#D4AF37"/>
                <rect x="6" y="6" width="36" height="24" rx="2" fill="none" stroke="#B8960C" stroke-width="1.5"/>
                <line x1="24" y1="6" x2="24" y2="30" stroke="#B8960C" stroke-width="1"/>
                <line x1="6" y1="18" x2="42" y2="18" stroke="#B8960C" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="absolute top-4 right-4">
            <p class="text-[10px] text-blue-300 uppercase tracking-wider font-semibold">PrimeVest</p>
        </div>
        
        <div class="p-6 pt-16">
            <div class="mb-8">
                <p class="text-xs text-blue-300 uppercase tracking-wider mb-1">Last Deposit</p>
                <p class="text-3xl font-bold text-white">${{ number_format($lastDeposit ?? 0, 2) }}</p>
            </div>
            <div class="flex justify-between items-end">
                <div>
                    <p class="text-[10px] text-blue-300 uppercase tracking-wider">Card Holder</p>
                    <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-blue-300 uppercase tracking-wider">Valid Thru</p>
                    <p class="text-sm font-semibold text-white">08/28</p>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-blue-400/10 to-blue-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>

    <!-- Last Withdrawal Card -->
    <div class="relative bg-gradient-to-br from-purple-800 to-purple-900 rounded-md shadow-2xl overflow-hidden group transition-all duration-300">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
                <path d="M50,30 L65,50 L50,70" fill="none" stroke="white" stroke-width="1.5"/>
                <path d="M50,30 L35,50 L50,70" fill="none" stroke="white" stroke-width="1.5"/>
            </svg>
        </div>
        
        <div class="absolute top-4 left-4">
            <svg width="40" height="30" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="48" height="36" rx="4" fill="#D4AF37"/>
                <rect x="6" y="6" width="36" height="24" rx="2" fill="none" stroke="#B8960C" stroke-width="1.5"/>
                <line x1="24" y1="6" x2="24" y2="30" stroke="#B8960C" stroke-width="1"/>
                <line x1="6" y1="18" x2="42" y2="18" stroke="#B8960C" stroke-width="1"/>
            </svg>
        </div>
        
        <div class="absolute top-4 right-4">
            <p class="text-[10px] text-purple-300 uppercase tracking-wider font-semibold">PrimeVest</p>
        </div>
        
        <div class="p-6 pt-16">
            <div class="mb-8">
                <p class="text-xs text-purple-300 uppercase tracking-wider mb-1">Last Withdrawal</p>
                <p class="text-3xl font-bold text-white">${{ number_format($lastWithdrawal ?? 0, 2) }}</p>
            </div>
            <div class="flex justify-between items-end">
                <div>
                    <p class="text-[10px] text-purple-300 uppercase tracking-wider">Card Holder</p>
                    <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-purple-300 uppercase tracking-wider">Valid Thru</p>
                    <p class="text-sm font-semibold text-white">08/28</p>
                </div>
            </div>
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/0 via-purple-400/10 to-purple-500/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>
</div>

    <!-- TradingView News Widget -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Market News & Analysis</h2>
                    <p class="text-sm text-gray-500">Real-time financial news from TradingView</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-xs text-gray-500">Live Updates</span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <!-- TradingView News Widget -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                {
                    "feedMode": "market",
                    "market": "forex",
                    "colorTheme": "light",
                    "isTransparent": false,
                    "displayMode": "regular",
                    "width": "100%",
                    "height": 400,
                    "locale": "en"
                }
                </script>
            </div>
        </div>
    </div>

    <!-- Transaction History Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Transaction History</h2>
                    <p class="text-sm text-gray-500">All deposits, withdrawals, and earnings</p>
                </div>
                <a href="#" class="text-green-600 hover:text-green-700 text-sm font-semibold">View All →</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reference</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($transactions ?? [] as $transaction)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $transaction['date'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if(($transaction['type'] ?? '') == 'deposit')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Deposit
                                </span>
                            @elseif(($transaction['type'] ?? '') == 'withdrawal')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                    Withdrawal
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    Profit
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold {{ (($transaction['type'] ?? '') == 'withdrawal') ? 'text-red-600' : 'text-green-600' }}">
                            {{ (($transaction['type'] ?? '') == 'withdrawal') ? '-' : '+' }}${{ number_format($transaction['amount'] ?? 0, 2) }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Completed</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $transaction['ref'] ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm">No transactions yet</p>
                            <p class="text-xs mt-1">Your transaction history will appear here</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Trading Activities -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Recent Trading Activities</h2>
            <p class="text-sm text-gray-500">Watch your daily earnings top up...</p>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recentActivities ?? [] as $activity)
                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                            @if($activity['type'] == 'crypto')
                                <span class="text-lg">₿</span>
                            @elseif($activity['type'] == 'stock')
                                <span class="text-lg">📈</span>
                            @else
                                <span class="text-lg">💰</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $activity['title'] ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-500">{{ $activity['time'] ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <p class="text-sm font-bold text-green-600">+${{ number_format($activity['amount'] ?? 0, 2) }}</p>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <p class="text-sm">No recent activities</p>
                </div>
                @endforelse
            </div>
            <div class="mt-6 pt-4 border-t border-gray-200">
                <a href="#" class="text-green-600 hover:text-green-700 text-sm font-semibold inline-flex items-center">
                    View All Activities
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection