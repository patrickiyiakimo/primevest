@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 <!-- Card Application Status Notification -->
@php
    $cardApplication = App\Models\CardApplication::where('user_id', Auth::id())
        ->whereIn('status', ['approved', 'rejected'])
        ->latest()
        ->first();
@endphp

@if($cardApplication)
    @if($cardApplication->status == 'approved')
        <div id="cardNotification" class="bg-green-50 border-l-4 border-green-500 rounded-lg p-4 mb-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            🎉 Congratulations! Your {{ ucfirst($cardApplication->card_type) }} {{ ucfirst($cardApplication->card_tier) }} card application has been approved!
                        </p>
                        <p class="text-xs text-green-700 mt-1">Your card will be delivered within 7-10 business days.</p>
                    </div>
                </div>
                <button onclick="closeNotification()" class="text-green-600 hover:text-green-800 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Progress Bar -->
            <div class="absolute bottom-0 left-0 h-1 bg-green-500 rounded-b-lg" style="width: 100%; animation: shrinkWidth 10s linear forwards;"></div>
        </div>
    @elseif($cardApplication->status == 'rejected')
        <div id="cardNotification" class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6 relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">
                            Your card application has been reviewed.
                        </p>
                        <p class="text-xs text-red-700 mt-1">
                            Reason: {{ $cardApplication->admin_notes ?? 'Please contact support for more information.' }}
                        </p>
                    </div>
                </div>
                <button onclick="closeNotification()" class="text-red-600 hover:text-red-800 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Progress Bar -->
            <div class="absolute bottom-0 left-0 h-1 bg-red-500 rounded-b-lg" style="width: 100%; animation: shrinkWidth 10s linear forwards;"></div>
        </div>
    @endif
@endif

<style>
    @keyframes shrinkWidth {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
</style>

<script>
    // Auto close notification after 10 seconds
    setTimeout(function() {
        const notification = document.getElementById('cardNotification');
        if (notification) {
            notification.style.transition = 'opacity 0.5s ease';
            notification.style.opacity = '0';
            setTimeout(function() {
                notification.remove();
            }, 500);
        }
    }, 10000);
    
    // Manual close function
    function closeNotification() {
        const notification = document.getElementById('cardNotification');
        if (notification) {
            notification.style.transition = 'opacity 0.5s ease';
            notification.style.opacity = '0';
            setTimeout(function() {
                notification.remove();
            }, 500);
        }
    }
</script>
    <!-- Stats Cards - Credit Card Style -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <!-- Main Balance Card -->
        <div class="relative bg-gradient-to-br from-gray-800 to-gray-900  overflow-hidden group">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
                    <circle cx="20" cy="20" r="15" fill="white"/>
                    <circle cx="80" cy="80" r="25" fill="white"/>
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
                <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">PrimeVest</p>
            </div>
            <div class="p-6 pt-16">
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Main Balance</p>
                <p class="text-3xl font-bold text-white">${{ number_format($user->balance, 2) }}</p>
                <div class="flex justify-between items-end mt-6">
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
        </div>

        <!-- Profits Card -->
        <div class="relative bg-gradient-to-br from-green-800 to-green-900 overflow-hidden group">
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
                </svg>
            </div>
            <div class="absolute top-4 right-4">
                <p class="text-[10px] text-green-300 uppercase tracking-wider font-semibold">PrimeVest</p>
            </div>
            <div class="p-6 pt-16">
               <p class="text-xs text-green-300 uppercase tracking-wider mb-1">Total Profits</p>
        <p class="text-3xl font-bold text-white">${{ number_format($profits, 2) }}</p>
                <div class="flex justify-between items-end mt-6">
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
        </div>

       <!-- Last Deposit Card -->
<div class="relative bg-gradient-to-br from-blue-800 to-blue-900 overflow-hidden group">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <circle cx="50" cy="50" r="20" fill="none" stroke="white" stroke-width="1"/>
            <line x1="50" y1="35" x2="50" y2="65" stroke="white" stroke-width="1"/>
            <line x1="35" y1="50" x2="65" y2="50" stroke="white" stroke-width="1"/>
        </svg>
    </div>
    <div class="absolute top-4 left-4">
        <svg width="40" height="30" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="36" rx="4" fill="#D4AF37"/>
        </svg>
    </div>
    <div class="absolute top-4 right-4">
        <p class="text-[10px] text-blue-300 uppercase tracking-wider font-semibold">PrimeVest</p>
    </div>
    <div class="p-6 pt-16">
        <p class="text-xs text-blue-300 uppercase tracking-wider mb-1">Last Deposit</p>
        <p class="text-3xl font-bold text-white">${{ number_format($lastDepositAmount ?? 0, 2) }}</p>
        <div class="flex justify-between items-end mt-6">
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
</div>
       <!-- Last Withdrawal Card -->
<div class="relative bg-gradient-to-br from-purple-800 to-purple-900 shadow-lg overflow-hidden group">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
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
        <p class="text-xs text-purple-300 uppercase tracking-wider mb-1">Last Withdrawal</p>
        <p class="text-3xl font-bold text-white">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</p>
        @if(isset($lastWithdrawalDate))
        <p class="text-xs text-purple-300 mt-1">{{ $lastWithdrawalDate }}</p>
        @endif
        <div class="flex justify-between items-end mt-6">
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
</div>
    </div>

    <div>
     <iframe 
        src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" 
        width="100%" 
        height="45px" 
        scrolling="auto" 
        marginwidth="0" 
        marginheight="0" 
        frameborder="0" 
        border="0" 
        style="border:0;margin:0;padding:0;display:block;">
    </iframe>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- TradingView News Widget -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Market News & Analysis</h2>
                    <p class="text-sm text-gray-400">Real-time financial news from TradingView</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-xs text-gray-400">Live Updates</span>
                </div>
            </div>
        </div>
        <div class="p-4">
            <!-- TradingView Timeline Widget -->
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

    <!-- Live Trading Chart -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Live Trading Chart</h2>
                    <p class="text-sm text-gray-400">Real-time market data</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="changeSymbol('FX:EURUSD')" class="px-3 py-1 text-xs bg-gray-700 text-white rounded hover:bg-green-600 transition">EUR/USD</button>
                    <button onclick="changeSymbol('FX:GBPUSD')" class="px-3 py-1 text-xs bg-gray-700 text-white rounded hover:bg-green-600 transition">GBP/USD</button>
                    <button onclick="changeSymbol('BITSTAMP:BTCUSD')" class="px-3 py-1 text-xs bg-gray-700 text-white rounded hover:bg-green-600 transition">BTC/USD</button>
                </div>
            </div>
        </div>
        <div class="p-4">
            <div class="tradingview-widget-container">
                <div id="tradingview_chart" style="height: 500px; width: 100%;"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    let widget = null;
                    
                    function loadWidget(symbol) {
                        if (widget) {
                            const container = document.getElementById('tradingview_chart');
                            if (container) container.innerHTML = '';
                        }
                        widget = new TradingView.widget({
                            "width": "100%",
                            "height": 500,
                            "symbol": symbol,
                            "interval": "60",
                            "timezone": "Etc/UTC",
                            "theme": "light",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "container_id": "tradingview_chart"
                        });
                    }
                    
                    function changeSymbol(symbol) {
                        loadWidget(symbol);
                    }
                    
                    document.addEventListener('DOMContentLoaded', function() {
                        loadWidget('FX:EURUSD');
                    });
                </script>
            </div>
        </div>
    </div>
    </div>

    <!-- Transaction History -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Transaction History</h2>
                    <p class="text-sm text-gray-400">All your deposits, withdrawals, and earnings</p>
                </div>
                <a href="{{ route('deposits-history') }}" class="text-green-400 hover:text-green-300 text-sm font-semibold">View All →</a>
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
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions ?? [] as $index => $transaction)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction['date'] ?? 'N/A' }}</td>
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
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1"></span>
                                Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $transaction['ref'] ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm font-medium">No transactions yet</p>
                            <p class="text-xs mt-1">Your transaction history will appear here</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

     <div>
     <iframe 
        src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" 
        width="100%" 
        height="45px" 
        scrolling="auto" 
        marginwidth="0" 
        marginheight="0" 
        frameborder="0" 
        border="0" 
        style="border:0;margin:0;padding:0;display:block;">
    </iframe>
    </div>
</div>

<style>
    @keyframes ping {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .animate-ping {
        animation: ping 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection