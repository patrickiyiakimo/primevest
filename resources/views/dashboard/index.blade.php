@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 
    <!-- Stats Cards - Premium Red Gradient Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-10">
        <!-- Main Balance Card -->
        <div class="relative bg-gradient-to-br from-red-700 via-red-800 to-red-900 rounded-2xl shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
            <!-- Animated Background Pattern -->
            <div class="absolute inset-0 opacity-15">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="grid" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect width="20" height="20" fill="none" stroke="white" stroke-width="0.5"/>
                            <circle cx="10" cy="10" r="1" fill="white" opacity="0.5"/>
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)"/>
                </svg>
            </div>
            <!-- Animated Shine Effect -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
            <div class="absolute top-5 left-5">
                <svg width="44" height="34" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="36" rx="6" fill="#FFD700"/>
                    <rect x="7" y="7" width="34" height="22" rx="3" fill="none" stroke="#DAA520" stroke-width="1.5"/>
                    <line x1="24" y1="7" x2="24" y2="29" stroke="#DAA520" stroke-width="1"/>
                    <line x1="7" y1="18" x2="41" y2="18" stroke="#DAA520" stroke-width="1"/>
                    <circle cx="24" cy="18" r="3" fill="#DAA520" opacity="0.6"/>
                </svg>
            </div>
            <div class="absolute top-5 right-5">
                <div class="flex items-center space-x-1">
                    <span class="w-2 h-2 rounded-full bg-red-300 animate-pulse"></span>
                    <p class="text-[10px] text-red-200 uppercase tracking-wider font-semibold">PrimeVest</p>
                </div>
            </div>
            <div class="p-6 pt-14">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h3m9 0h-3M5 18h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-xs text-red-200 uppercase tracking-wider font-medium">Main Balance</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight">${{ number_format($user->balance, 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-red-300 uppercase tracking-wider">Card Holder</p>
                        <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-red-300 uppercase tracking-wider">Valid Thru</p>
                        <p class="text-sm font-semibold text-white">08/28</p>
                    </div>
                </div>
            </div>
            <!-- Card Chip Decor -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- Profits Card -->
        <div class="relative bg-gradient-to-br from-emerald-700 via-emerald-800 to-emerald-900 rounded-2xl shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="profitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="white" stop-opacity="0.8"/>
                            <stop offset="100%" stop-color="white" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <path d="M10,70 L30,40 L50,55 L70,30 L90,50" fill="none" stroke="url(#profitGrad)" stroke-width="1.5"/>
                    <path d="M5,80 L95,80" stroke="white" stroke-width="0.5" stroke-dasharray="4 4"/>
                </svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
            <div class="absolute top-5 left-5">
                <svg width="44" height="34" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="36" rx="6" fill="#FFD700"/>
                    <path d="M15 20 L20 15 L28 23 L36 15 L40 19" stroke="#DAA520" stroke-width="1.8" fill="none" stroke-linecap="round"/>
                    <rect x="10" y="24" width="28" height="6" rx="2" fill="#DAA520" fill-opacity="0.3" stroke="#DAA520" stroke-width="1"/>
                </svg>
            </div>
            <div class="absolute top-5 right-5">
                <div class="flex items-center space-x-1">
                    <span class="w-2 h-2 rounded-full bg-emerald-300 animate-pulse"></span>
                    <p class="text-[10px] text-emerald-200 uppercase tracking-wider font-semibold">PrimeVest</p>
                </div>
            </div>
            <div class="p-6 pt-14">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <p class="text-xs text-emerald-200 uppercase tracking-wider font-medium">Total Profits</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight">${{ number_format($profits, 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-emerald-300 uppercase tracking-wider">Card Holder</p>
                        <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-emerald-300 uppercase tracking-wider">Valid Thru</p>
                        <p class="text-sm font-semibold text-white">08/28</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- Last Deposit Card -->
        <div class="relative bg-gradient-to-br from-amber-700 via-amber-800 to-amber-900 rounded-2xl shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle cx="50" cy="50" r="25" fill="none" stroke="white" stroke-width="1" stroke-dasharray="3 3"/>
                    <circle cx="50" cy="50" r="15" fill="none" stroke="white" stroke-width="0.8"/>
                    <line x1="50" y1="35" x2="50" y2="65" stroke="white" stroke-width="1"/>
                    <line x1="35" y1="50" x2="65" y2="50" stroke="white" stroke-width="1"/>
                </svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
            <div class="absolute top-5 left-5">
                <svg width="44" height="34" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="36" rx="6" fill="#FFD700"/>
                    <path d="M18 12 L24 6 L30 12" stroke="#DAA520" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    <rect x="14" y="14" width="20" height="16" rx="2" fill="none" stroke="#DAA520" stroke-width="1.5"/>
                    <circle cx="24" cy="22" r="3" fill="#DAA520" fill-opacity="0.4" stroke="#DAA520" stroke-width="1"/>
                </svg>
            </div>
            <div class="absolute top-5 right-5">
                <div class="flex items-center space-x-1">
                    <span class="w-2 h-2 rounded-full bg-amber-300 animate-pulse"></span>
                    <p class="text-[10px] text-amber-200 uppercase tracking-wider font-semibold">PrimeVest</p>
                </div>
            </div>
            <div class="p-6 pt-14">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs text-amber-200 uppercase tracking-wider font-medium">Last Deposit</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight">${{ number_format($lastDepositAmount ?? 0, 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-amber-300 uppercase tracking-wider">Card Holder</p>
                        <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-amber-300 uppercase tracking-wider">Valid Thru</p>
                        <p class="text-sm font-semibold text-white">08/28</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- Last Withdrawal Card -->
        <div class="relative bg-gradient-to-br from-rose-700 via-rose-800 to-rose-900 rounded-2xl shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="withdrawGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="white" stop-opacity="0.6"/>
                            <stop offset="100%" stop-color="white" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <path d="M50,25 L65,50 L50,75" fill="none" stroke="url(#withdrawGrad)" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M50,25 L35,50 L50,75" fill="none" stroke="url(#withdrawGrad)" stroke-width="1.8" stroke-linecap="round"/>
                    <circle cx="50" cy="50" r="3" fill="white" opacity="0.6"/>
                </svg>
            </div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
            <div class="absolute top-5 left-5">
                <svg width="44" height="34" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="36" rx="6" fill="#FFD700"/>
                    <rect x="10" y="12" width="28" height="16" rx="2" fill="none" stroke="#DAA520" stroke-width="1.5"/>
                    <path d="M20 20 L24 16 L28 20" stroke="#DAA520" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    <line x1="24" y1="16" x2="24" y2="28" stroke="#DAA520" stroke-width="1.5"/>
                </svg>
            </div>
            <div class="absolute top-5 right-5">
                <div class="flex items-center space-x-1">
                    <span class="w-2 h-2 rounded-full bg-rose-300 animate-pulse"></span>
                    <p class="text-[10px] text-rose-200 uppercase tracking-wider font-semibold">PrimeVest</p>
                </div>
            </div>
            <div class="p-6 pt-14">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-rose-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm0 0v2"/>
                    </svg>
                    <p class="text-xs text-rose-200 uppercase tracking-wider font-medium">Last Withdrawal</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</p>
                @if(isset($lastWithdrawalDate))
                <p class="text-xs text-rose-300 mt-1">{{ $lastWithdrawalDate }}</p>
                @endif
                <div class="flex justify-between items-end mt-6">
                    <div>
                        <p class="text-[10px] text-rose-300 uppercase tracking-wider">Card Holder</p>
                        <p class="text-sm font-semibold text-white tracking-wider">{{ strtoupper($user->name) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-rose-300 uppercase tracking-wider">Valid Thru</p>
                        <p class="text-sm font-semibold text-white">08/28</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>
    </div>

    <!-- TradingView Widgets Container -->
    <div>
        <div class="tradingview-widget-container" style="height:45px;">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/?utm_campaign=ticker-tape-logo&utm_medium=widget&utm_source=bitxprofits.net" rel="noopener noreferrer" target="_blank">
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    { "proName": "BITSTAMP:BTCUSD", "title": "Bitcoin" },
                    { "proName": "BITSTAMP:ETHUSD", "title": "Ethereum" },
                    { "proName": "BINANCE:SOLUSD", "title": "Solana" },
                    { "proName": "FX:EURUSD", "title": "EUR/USD" },
                    { "proName": "TVC:GOLD", "title": "Gold" },
                    { "proName": "NASDAQ:NDX", "title": "Nasdaq 100" }
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
    </div>

    <!-- News & Chart Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- TradingView News Widget -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white">Market News & Analysis</h2>
                        <p class="text-sm text-red-200">Real-time financial news from TradingView</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-xs text-red-200">Live Updates</span>
                    </div>
                </div>
            </div>
            <div class="p-4">
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
            <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white">Live Trading Chart</h2>
                        <p class="text-sm text-red-200">Real-time market data</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="changeSymbol('FX:EURUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">EUR/USD</button>
                        <button onclick="changeSymbol('FX:GBPUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">GBP/USD</button>
                        <button onclick="changeSymbol('BITSTAMP:BTCUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">BTC/USD</button>
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
    <div class="bg-white rounded-2xl my-10 shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Transaction History</h2>
                    <p class="text-sm text-red-200">All your deposits, withdrawals, and earnings</p>
                </div>
                <a href="{{ route('deposits-history') }}" class="text-red-200 hover:text-white text-sm font-semibold transition">View All →</a>
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
        <div class="tradingview-widget-container" style="height:45px;">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/?utm_campaign=ticker-tape-logo&utm_medium=widget&utm_source=bitxprofits.net" rel="noopener noreferrer" target="_blank">
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                { "proName": "BITSTAMP:BTCUSD", "title": "Bitcoin" },
                { "proName": "BITSTAMP:ETHUSD", "title": "Ethereum" },
                { "proName": "BINANCE:SOLUSD", "title": "Solana" },
                { "proName": "FX:EURUSD", "title": "EUR/USD" },
                { "proName": "TVC:GOLD", "title": "Gold" },
                { "proName": "NASDAQ:NDX", "title": "Nasdaq 100" }
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
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