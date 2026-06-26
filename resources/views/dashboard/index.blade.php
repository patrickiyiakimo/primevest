@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 
    <!-- TradingView Ticker Widget -->
    <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
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
                "colorTheme": "light",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
    </div>

    <!-- Stats Cards - Premium Gradient Design with Full Logic -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-10">
    
        <!-- MAIN BALANCE CARD - Expanded Red Gradient with Spendable Balance Logic -->
        <div class="relative shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]"
             style="background: linear-gradient(135deg, #991b1b 0%, #ef4444 15%, #f87171 45%, #ef4444 65%, #7f1d1d 100%);">
            
            <!-- Massive Light Ray Overlay -->
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="lightRay1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="white" stop-opacity="0.8"/>
                            <stop offset="20%" stop-color="white" stop-opacity="0.3"/>
                            <stop offset="40%" stop-color="white" stop-opacity="0"/>
                            <stop offset="100%" stop-color="white" stop-opacity="0"/>
                        </linearGradient>
                        <linearGradient id="lightRay2" x1="30%" y1="0%" x2="70%" y2="100%">
                            <stop offset="0%" stop-color="#fcd34d" stop-opacity="0.5"/>
                            <stop offset="30%" stop-color="#fbbf24" stop-opacity="0.2"/>
                            <stop offset="60%" stop-color="transparent" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <polygon points="0,0 350,0 550,600 100,600" fill="url(#lightRay1)"/>
                    <polygon points="200,0 400,0 500,600 300,600" fill="url(#lightRay2)"/>
                    <rect x="450" y="0" width="120" height="600" fill="white" opacity="0.08" transform="skewX(-15)"/>
                </svg>
            </div>

            <!-- Warm Glow Behind Content -->
            <div class="absolute inset-0" style="background: radial-gradient(ellipse 70% 50% at 30% 20%, rgba(248,113,113,0.3), transparent 70%);"></div>
            
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
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
            <div class="p-6 pt-14 relative z-10">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-red-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M6 14h3m9 0h-3M5 18h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-xs text-red-100 uppercase tracking-wider font-medium">Total  Balance</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight drop-shadow-lg">${{ number_format($user->balance + $profits + ($stocksCurrentValue ?? 0), 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-red-200 uppercase tracking-wider">Breakdown</p>
                        <div class="space-y-0.5 mt-1">
                            <p class="text-xs text-red-200">Main: ${{ number_format($user->balance, 2) }}</p>
                            <p class="text-xs text-red-200">Profits: ${{ number_format($profits, 2) }}</p>
                            <p class="text-xs text-red-200">Stocks: ${{ number_format($stocksCurrentValue ?? 0, 2) }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-red-200 uppercase tracking-wider">Status</p>
                        <p class="text-sm font-semibold text-white">Active</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- PROFITS CARD - Expanded Emerald Gradient with Profit Logic -->
        <div class="relative shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]"
             style="background: linear-gradient(135deg, #065f46 0%, #10b981 20%, #34d399 45%, #10b981 70%, #064e3b 100%);">
            
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="emeraldRay" x1="60%" y1="0%" x2="20%" y2="100%">
                            <stop offset="0%" stop-color="#d1fae5" stop-opacity="0.8"/>
                            <stop offset="25%" stop-color="white" stop-opacity="0.3"/>
                            <stop offset="50%" stop-color="transparent" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <polygon points="300,0 550,0 700,600 450,600" fill="url(#emeraldRay)"/>
                    <polygon points="500,0 700,0 600,600 400,600" fill="white" opacity="0.1"/>
                    <circle cx="650" cy="150" r="100" fill="#a7f3d0" opacity="0.08"/>
                </svg>
            </div>
            
            <div class="absolute inset-0" style="background: radial-gradient(circle at 80% 20%, rgba(52,211,153,0.35), transparent 70%);"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
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
            <div class="p-6 pt-14 relative z-10">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-emerald-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    <p class="text-xs text-emerald-100 uppercase tracking-wider font-medium">Total Profits</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight drop-shadow-lg">+${{ number_format($profits, 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-emerald-200 uppercase tracking-wider">Return on Investment</p>
                        <p class="text-sm font-semibold text-white drop-shadow">+{{ $profitPercentage ?? '0' }}%</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-emerald-200 uppercase tracking-wider">Lifetime</p>
                        <p class="text-sm font-semibold text-white">Earnings</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- STOCKS CARD - Expanded Amber Gradient with Stocks Logic -->
        <div class="relative shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]"
             style="background: linear-gradient(135deg, #78350f 0%, #f59e0b 25%, #fbbf24 50%, #f59e0b 75%, #92400e 100%);">
            
            <div class="absolute inset-0 opacity-25 pointer-events-none">
                <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="amberRay" x1="20%" y1="0%" x2="80%" y2="100%">
                            <stop offset="0%" stop-color="#fef3c7" stop-opacity="0.9"/>
                            <stop offset="30%" stop-color="#fde68a" stop-opacity="0.3"/>
                            <stop offset="60%" stop-color="transparent" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <polygon points="100,0 350,0 450,600 200,600" fill="url(#amberRay)"/>
                    <polygon points="400,0 550,0 500,600 350,600" fill="#fffbeb" opacity="0.12"/>
                    <rect x="0" y="250" width="800" height="100" fill="#fef3c7" opacity="0.06"/>
                </svg>
            </div>
            
            <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 40% at 15% 30%, rgba(251,191,36,0.4), transparent 70%);"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
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
            <div class="p-6 pt-14 relative z-10">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <p class="text-xs text-amber-100 uppercase tracking-wider font-medium">Stocks Portfolio</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight drop-shadow-lg">{{ $stocksCount ?? 0 }}</p>
                @php
                    $stocksPL = $totalProfitLoss ?? 0;
                    $stocksInvested = $totalInvested ?? 0;
                    $stocksPLPercentage = $stocksInvested > 0 ? ($stocksPL / $stocksInvested) * 100 : 0;
                @endphp
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-amber-200 uppercase tracking-wider">Total P/L</p>
                        <p class="text-sm font-semibold text-white drop-shadow {{ $stocksPL >= 0 ? 'text-green-300' : 'text-red-300' }}">
                            {{ $stocksPL >= 0 ? '+' : '' }}${{ number_format($stocksPL, 2) }}
                            <span class="text-xs">({{ $stocksPLPercentage >= 0 ? '+' : '' }}{{ number_format($stocksPLPercentage, 2) }}%)</span>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-amber-200 uppercase tracking-wider">Active</p>
                        <p class="text-sm font-semibold text-white">Positions</p>
                    </div>
                </div>
                <!-- Progress Bar -->
                <div class="mt-3 w-full bg-white/20 h-1.5 rounded-full overflow-hidden">
                    <div class="h-full {{ $stocksPLPercentage >= 0 ? 'bg-green-400' : 'bg-red-400' }}" 
                         style="width: {{ min(abs($stocksPLPercentage), 100) }}%; transition: width 0.5s ease;">
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>

        <!-- LAST WITHDRAWAL CARD - Expanded Rose Gradient -->
        <div class="relative shadow-xl overflow-hidden group transition-all duration-300 hover:shadow-2xl hover:scale-[1.02]"
             style="background: linear-gradient(135deg, #9f1239 0%, #f43f5e 25%, #fb7185 48%, #f43f5e 72%, #881337 100%);">
            
            <div class="absolute inset-0 opacity-20 pointer-events-none">
                <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="roseRay" x1="70%" y1="0%" x2="10%" y2="100%">
                            <stop offset="0%" stop-color="#ffe4e6" stop-opacity="0.85"/>
                            <stop offset="35%" stop-color="#fecdd3" stop-opacity="0.25"/>
                            <stop offset="70%" stop-color="transparent" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                    <polygon points="450,0 650,0 550,600 350,600" fill="url(#roseRay)"/>
                    <polygon points="550,0 750,0 650,600 450,600" fill="white" opacity="0.1"/>
                    <ellipse cx="600" cy="300" rx="150" ry="250" fill="#fecdd3" opacity="0.06"/>
                </svg>
            </div>
            
            <div class="absolute inset-0" style="background: radial-gradient(circle at 85% 15%, rgba(251,113,133,0.4), transparent 65%);"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
            
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
            <div class="p-6 pt-14 relative z-10">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-4 h-4 text-rose-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm0 0v2"/>
                    </svg>
                    <p class="text-xs text-rose-100 uppercase tracking-wider font-medium">Last Withdrawal</p>
                </div>
                <p class="text-4xl font-bold text-white tracking-tight drop-shadow-lg">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</p>
                <div class="flex justify-between items-end mt-8">
                    <div>
                        <p class="text-[10px] text-rose-200 uppercase tracking-wider">Date</p>
                        <p class="text-sm font-semibold text-white drop-shadow">{{ $lastWithdrawalDate ?? 'No withdrawals yet' }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[10px] text-rose-200 uppercase tracking-wider">Status</p>
                        <p class="text-sm font-semibold text-white">Processed</p>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-12 h-8 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-md opacity-20"></div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <!-- Quick Deposit Link -->
        <a href="{{ route('deposit') }}" class="group bg-white border border-gray-200 shadow-sm overflow-hidden hover:border-red-300 transition-all duration-300">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-red-100 flex items-center justify-center group-hover:bg-red-600 transition-all duration-300">
                        <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Make a Deposit</h3>
                        <p class="text-xs text-gray-500">Add funds to your trading account</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <!-- Quick Invest Link -->
        <a href="{{ route('invest') }}" class="group bg-white border border-gray-200 shadow-sm overflow-hidden hover:border-red-300 transition-all duration-300">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-red-100 flex items-center justify-center group-hover:bg-red-600 transition-all duration-300">
                        <svg class="w-6 h-6 text-red-600 group-hover:text-white transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900">Start Investing</h3>
                        <p class="text-xs text-gray-500">Grow your wealth with investment plans</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>
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

    <!-- Bottom TradingView Ticker -->
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
    
    /* Smooth transitions for cards */
    .group:hover .group-hover\:scale-\[1\.02\] {
        transform: scale(1.02);
    }
    
    /* Ensure gradient cards have proper overflow */
    .shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endsection