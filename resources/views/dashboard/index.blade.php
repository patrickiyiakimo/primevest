@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 
    <!-- Stats Cards - Premium Red Gradient Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-7 mt-10">

    <!-- MAIN BALANCE - Premium Ray of Light Gradient -->
    <div class="relative overflow-hidden rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl group"
         style="background: radial-gradient(ellipse 180% 120% at 30% 20%, #ff2d2d 0%, #cc0000 45%, #8b0000 100%);">
        
        <!-- Massive Ray of Light Beam -->
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="ray1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="white" stop-opacity="0.6"/>
                        <stop offset="30%" stop-color="white" stop-opacity="0.05"/>
                        <stop offset="100%" stop-color="white" stop-opacity="0"/>
                    </linearGradient>
                    <linearGradient id="ray2" x1="20%" y1="0%" x2="80%" y2="100%">
                        <stop offset="0%" stop-color="#ffcc00" stop-opacity="0.4"/>
                        <stop offset="50%" stop-color="white" stop-opacity="0.1"/>
                        <stop offset="100%" stop-color="transparent" stop-opacity="0"/>
                    </linearGradient>
                    <radialGradient id="glowOrb" cx="25%" cy="15%" r="50%">
                        <stop offset="0%" stop-color="#ff6666" stop-opacity="0.5"/>
                        <stop offset="50%" stop-color="#ff0000" stop-opacity="0.2"/>
                        <stop offset="100%" stop-color="transparent" stop-opacity="0"/>
                    </radialGradient>
                </defs>
                <!-- Primary light ray -->
                <polygon points="0,0 350,0 500,600 0,600" fill="url(#ray1)"/>
                <polygon points="100,0 280,0 420,600 200,600" fill="url(#ray2)"/>
                <!-- Cross light beam -->
                <polygon points="0,200 800,100 800,250 0,350" fill="white" opacity="0.08"/>
                <polygon points="0,350 800,250 800,400 0,500" fill="white" opacity="0.05"/>
            </svg>
        </div>

        <!-- Secondary soft glow orb -->
        <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 60% at 20% 10%, rgba(255,100,100,0.25), transparent 70%);"></div>

        <!-- Animated Shine Effect - enhanced -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 skew-x-12"></div>

        <!-- Top Accent Glow - more vibrant -->
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-red-300 via-yellow-300 to-red-500"></div>

        <!-- Premium Decorative SVG Patterns -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.3"/>
                <circle cx="15" cy="15" r="12" fill="white" opacity="0.6"/>
                <circle cx="85" cy="85" r="18" fill="white" opacity="0.3"/>
                <circle cx="45" cy="30" r="6" fill="white" opacity="0.5"/>
                <path d="M70,10 L80,20 L70,30 L60,20 Z" fill="white" opacity="0.4"/>
                <path d="M20,70 L35,75 L30,90 L15,85 Z" fill="white" opacity="0.3"/>
            </svg>
        </div>

        <div class="p-7 relative z-10">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-red-100 font-semibold drop-shadow-lg">
                        Main Balance
                    </p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl text-red-100 drop-shadow-md">$</span>
                        <h2 class="text-[42px] leading-none font-bold text-white tracking-tight drop-shadow-2xl">
                            {{ number_format($user->balance, 2) }}
                        </h2>
                    </div>
                </div>
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-md border border-white/30 shadow-lg">
                    <svg class="h-7 w-7 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 10h18M7 15h2m4 0h4M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-8 border-t border-white/15"></div>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Account Holder</p>
                    <p class="mt-2 text-sm font-semibold tracking-wide text-white drop-shadow-md">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Account Type</p>
                    <p class="mt-2 text-sm font-semibold text-white drop-shadow-md">Premium Elite</p>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-br from-yellow-400/20 to-red-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- TOTAL PROFITS - Intense Light Ray Gradient -->
    <div class="relative overflow-hidden rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl group"
         style="background: radial-gradient(ellipse 200% 130% at 70% 15%, #ff3333 0%, #d40000 40%, #7a0000 100%);">
        
        <div class="absolute inset-0 opacity-25 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="profitRay" x1="60%" y1="0%" x2="30%" y2="100%">
                        <stop offset="0%" stop-color="#fff5cc" stop-opacity="0.7"/>
                        <stop offset="40%" stop-color="white" stop-opacity="0.2"/>
                        <stop offset="100%" stop-color="transparent" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <polygon points="400,0 800,0 800,600 200,600" fill="url(#profitRay)"/>
                <polygon points="500,0 700,0 550,600 350,600" fill="white" opacity="0.12"/>
                <rect x="600" y="200" width="200" height="300" fill="white" opacity="0.06" transform="skewX(-20)"/>
            </svg>
        </div>
        
        <div class="absolute inset-0" style="background: radial-gradient(circle at 85% 20%, rgba(255,200,100,0.3), transparent 60%);"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-red-300 via-amber-300 to-red-500"></div>

        <div class="absolute inset-0 opacity-8 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M10,50 L30,30 L50,50 L70,30 L90,50" fill="none" stroke="white" stroke-width="0.8" stroke-dasharray="4 4"/>
                <path d="M5,70 L95,70" stroke="white" stroke-width="0.6" stroke-dasharray="2 4"/>
                <polygon points="80,10 90,15 85,25" fill="white" opacity="0.5"/>
            </svg>
        </div>

        <div class="p-7 relative z-10">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-red-100 font-semibold drop-shadow-lg">Total Profits</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl text-red-100 drop-shadow-md">$</span>
                        <h2 class="text-[42px] leading-none font-bold text-white tracking-tight drop-shadow-2xl">{{ number_format($profits, 2) }}</h2>
                    </div>
                </div>
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-md border border-white/30 shadow-lg">
                    <svg class="h-7 w-7 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8L10 18l-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <div class="mt-8 border-t border-white/15"></div>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Investor</p>
                    <p class="mt-2 text-sm font-semibold tracking-wide text-white drop-shadow-md">{{ strtoupper($user->name) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Performance</p>
                    <div class="mt-2 flex items-center gap-1.5"><span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span><p class="text-sm font-semibold text-green-300 drop-shadow">+12.5%</p></div>
                </div>
            </div>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-tl from-amber-400/20 to-red-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- LAST DEPOSIT - Solar Flare Gradient -->
    <div class="relative overflow-hidden rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl group"
         style="background: radial-gradient(ellipse 170% 140% at 40% 10%, #ff4444 0%, #bb0000 50%, #660000 100%);">
        
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="depositRay" x1="0%" y1="0%" x2="100%" y2="80%">
                        <stop offset="0%" stop-color="#ffdd99" stop-opacity="0.8"/>
                        <stop offset="25%" stop-color="white" stop-opacity="0.3"/>
                        <stop offset="70%" stop-color="#ff8000" stop-opacity="0.05"/>
                        <stop offset="100%" stop-color="transparent" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <polygon points="0,0 300,0 400,600 0,600" fill="url(#depositRay)"/>
                <polygon points="150,0 280,0 350,600 220,600" fill="white" opacity="0.15"/>
                <circle cx="120" cy="100" r="80" fill="white" opacity="0.08"/>
            </svg>
        </div>
        
        <div class="absolute inset-0" style="background: radial-gradient(circle at 15% 20%, rgba(255,180,80,0.35), transparent 65%);"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/15 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-red-300 via-yellow-200 to-red-600"></div>

        <div class="absolute inset-0 opacity-8 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <circle cx="50" cy="50" r="25" fill="none" stroke="white" stroke-width="1" stroke-dasharray="3 4"/>
                <line x1="50" y1="35" x2="50" y2="65" stroke="white" stroke-width="0.8"/>
                <line x1="35" y1="50" x2="65" y2="50" stroke="white" stroke-width="0.8"/>
                <circle cx="70" cy="20" r="5" fill="white" opacity="0.5"/>
            </svg>
        </div>

        <div class="p-7 relative z-10">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-red-100 font-semibold drop-shadow-lg">Last Deposit</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl text-red-100 drop-shadow-md">$</span>
                        <h2 class="text-[42px] leading-none font-bold text-white tracking-tight drop-shadow-2xl">{{ number_format($lastDepositAmount ?? 0, 2) }}</h2>
                    </div>
                    @if(isset($lastDepositDate))<p class="mt-2 text-xs text-red-100 drop-shadow">{{ $lastDepositDate }}</p>@endif
                </div>
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-md border border-white/30 shadow-lg">
                    <svg class="h-7 w-7 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-8 border-t border-white/15"></div>
            <div class="mt-6 flex items-center justify-between">
                <div><p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Depositor</p><p class="mt-2 text-sm font-semibold tracking-wide text-white drop-shadow-md">{{ strtoupper($user->name) }}</p></div>
                <div class="text-right"><p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Status</p><div class="mt-2 flex items-center gap-1.5 justify-end"><span class="w-2 h-2 bg-green-400 rounded-full"></span><p class="text-sm font-semibold text-green-300 drop-shadow">Completed</p></div></div>
            </div>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-bl from-yellow-400/20 via-red-500/20 to-transparent rounded-full blur-3xl"></div>
    </div>

    <!-- LAST WITHDRAWAL - Radiant Explosion Gradient -->
    <div class="relative overflow-hidden rounded-2xl shadow-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl group"
         style="background: radial-gradient(ellipse 160% 150% at 80% 30%, #ff2a2a 0%, #c10000 45%, #800000 100%);">
        
        <div class="absolute inset-0 opacity-25 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 800 600" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="withdrawRay" x1="80%" y1="0%" x2="10%" y2="100%">
                        <stop offset="0%" stop-color="#ffddaa" stop-opacity="0.7"/>
                        <stop offset="35%" stop-color="white" stop-opacity="0.25"/>
                        <stop offset="100%" stop-color="transparent" stop-opacity="0"/>
                    </linearGradient>
                </defs>
                <polygon points="500,0 800,0 800,600 300,600" fill="url(#withdrawRay)"/>
                <polygon points="600,0 750,0 600,600 450,600" fill="white" opacity="0.12"/>
                <rect x="650" y="100" width="150" height="400" fill="white" opacity="0.06" transform="skewX(-15)"/>
                <circle cx="650" cy="150" r="60" fill="white" opacity="0.08"/>
            </svg>
        </div>
        
        <div class="absolute inset-0" style="background: radial-gradient(circle at 90% 10%, rgba(255,220,120,0.4), transparent 70%);"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-red-400 via-amber-200 to-red-700"></div>

        <div class="absolute inset-0 opacity-8 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M50,25 L65,50 L50,75" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M50,25 L35,50 L50,75" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="50" cy="50" r="4" fill="white" opacity="0.6"/>
                <polygon points="20,80 30,85 25,95" fill="white" opacity="0.3"/>
            </svg>
        </div>

        <div class="p-7 relative z-10">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-red-100 font-semibold drop-shadow-lg">Last Withdrawal</p>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-3xl text-red-100 drop-shadow-md">$</span>
                        <h2 class="text-[42px] leading-none font-bold text-white tracking-tight drop-shadow-2xl">{{ number_format($lastWithdrawalAmount ?? 0, 2) }}</h2>
                    </div>
                    @if(isset($lastWithdrawalDate))<p class="mt-2 text-xs text-red-100 drop-shadow">{{ $lastWithdrawalDate }}</p>@endif
                </div>
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-md border border-white/30 shadow-lg">
                    <svg class="h-7 w-7 text-white drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 17H7m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-8 border-t border-white/15"></div>
            <div class="mt-6 flex items-center justify-between">
                <div><p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Beneficiary</p><p class="mt-2 text-sm font-semibold tracking-wide text-white drop-shadow-md">{{ strtoupper($user->name) }}</p></div>
                <div class="text-right"><p class="text-[10px] uppercase tracking-[0.2em] text-red-100 font-semibold">Status</p><div class="mt-2 flex items-center gap-1.5 justify-end"><span class="w-2 h-2 bg-green-400 rounded-full"></span><p class="text-sm font-semibold text-green-300 drop-shadow">Processed</p></div></div>
            </div>
        </div>
        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gradient-to-t from-amber-500/20 to-red-600/20 rounded-full blur-3xl"></div>
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