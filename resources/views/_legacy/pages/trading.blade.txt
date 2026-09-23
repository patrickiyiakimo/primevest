@extends('layouts.app')

@section('title', 'Trading Platforms')
@section('content')

<!-- Hero Section - Same Design as Homepage -->
<div class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden bg-white">
    
    <!-- Red Gradient Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Top right red gradient -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-red-500 via-red-200 to-transparent rounded-full opacity-60"></div>
        <!-- Bottom left red gradient -->
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-400 via-red-200 to-transparent rounded-full opacity-60"></div>
        <!-- Center subtle red glow -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-red-50/30 via-transparent to-red-50/30 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <!-- Main Heading -->
                    <h1 class="text-4xl sm:text-5xl md:text-4xl lg:text-4xl xl:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        GET MORE FROM METATRADER WITH <span class="text-red-600">PrimeVest</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Our MT4 and MT5 platforms combine the charting and analysis power of MetaTrader with PrimeVest raw spreads and rapid execution. Available on PC, Mac, web and mobile.
                    </p>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register" 
                           class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                            <span>Start Trading</span>
                            <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <!-- <a href="#platforms" 
                           class="inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-gray-700 bg-white border-2 border-gray-200 hover:border-red-200 hover:text-red-600 transition-all duration-500">
                            Explore Platforms
                        </a> -->
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="mt-10 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center lg:justify-start">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Raw Spreads</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Rapid Execution</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Multi-Device</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Expert Advisors</span>
                        </div>
                    </div>
                </div>
                
              <!-- Right Side - Live Chart -->
<div class="flex justify-center lg:justify-end relative">
    <div class="w-full rounded-xl overflow-hidden ">
        <!-- TradingView Widget - Advanced Chart -->
        <div class="tradingview-widget-container">
            <div id="tradingview_live_chart" style="height: 450px; width: 100%;"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
                new TradingView.widget({
                    "width": "100%",
                    "height": 450,
                    "symbol": "FX:EURUSD",
                    "interval": "60",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "container_id": "tradingview_live_chart"
                });
            </script>
        </div>
    </div>
</div>
                
            </div>
        </div>
    </div>
</div>

<!-- Instant Access Section -->
<div class="bg-white py-20 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 mb-6">
                    <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Instant Access</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6">
                    INSTANT ACCESS TO <span class="text-red-600">GLOBAL MARKETS</span>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Analyse the markets, spot your opportunities and trade, all from the same platform. Charts, news streams, and multiple order execution options available from any device.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-600">Professional technical analysis</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-600">Automatic trading using expert advisors</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-600">Mobile, web, and desktop trading</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-gray-600">Chart trading and market execution</span>
                    </div>
                </div>
            </div>
           <div class="relative">
            
    <!-- TradingView Market Overview Widget -->
    <div class="rounded-2xl  overflow-hidden bg-white">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
            {
                "width": "100%",
                "height": 450,
                "title": "Market Overview",
                "titleColor": "#1f2937",
                "colorTheme": "light",
                "locale": "en",
                "trendLineColor": "#dc2626",
                "isTransparent": false,
                "showVolume": false,
                "showChart": true,
                "tabs": [
                    {
                        "title": "Forex",
                        "symbols": [
                            { "s": "FX:EURUSD", "d": "EUR/USD" },
                            { "s": "FX:GBPUSD", "d": "GBP/USD" },
                            { "s": "FX:USDJPY", "d": "USD/JPY" },
                            { "s": "FX:AUDUSD", "d": "AUD/USD" },
                            { "s": "FX:USDCAD", "d": "USD/CAD" }
                        ]
                    },
                    {
                        "title": "Indices",
                        "symbols": [
                            { "s": "SP:SPX", "d": "S&P 500" },
                            { "s": "NASDAQ:IXIC", "d": "Nasdaq" },
                            { "s": "DJI:DJI", "d": "Dow Jones" },
                            { "s": "FTSE:UKX", "d": "FTSE 100" },
                            { "s": "HSI:HSI", "d": "Hang Seng" }
                        ]
                    },
                    {
                        "title": "Commodities",
                        "symbols": [
                            { "s": "TVC:GOLD", "d": "Gold" },
                            { "s": "TVC:SILVER", "d": "Silver" },
                            { "s": "NYMEX:CL1!", "d": "Crude Oil" }
                        ]
                    },
                    {
                        "title": "Crypto",
                        "symbols": [
                            { "s": "BINANCE:BTCUSDT", "d": "Bitcoin" },
                            { "s": "BINANCE:ETHUSDT", "d": "Ethereum" },
                            { "s": "BINANCE:SOLUSDT", "d": "Solana" }
                        ]
                    }
                ]
            }
            </script>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<!-- Best in Business Section -->
<div class="bg-gray-50 py-20 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 mb-4">
                <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Why Choose Us</span>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                THE BEST IN THE <span class="text-red-600">BUSINESS</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- React Rapidly -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">REACT RAPIDLY</h3>
                <p class="text-gray-500 leading-relaxed">
                    When milliseconds matter, our ultra‑low‑latency networks let you enter and exit your trades with precision timing.
                </p>
            </div>
            
            <!-- Never Miss a Trade -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">NEVER MISS A TRADE</h3>
                <p class="text-gray-500 leading-relaxed">
                    Indicators, objects and tools to help you analyse every market and find your entry and exit points.
                </p>
            </div>
            
            <!-- Automate Trades -->
            <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">AUTOMATE TRADES</h3>
                <p class="text-gray-500 leading-relaxed">
                    Test your strategy without your intervention. Apply "expert advisors" to automate trades based on your rules.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Swaps Section -->
<div class="bg-white py-20 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 mb-6">
                    <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Understanding Swaps</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-6">
                    WHAT ARE <span class="text-red-600">SWAPS?</span>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Swap is the interest paid or earned for holding a position overnight. Each symbol has an overnight lending rate associated with it. Spot trades need to be settled and rolled forward every day. Swaps are attached to open positions and are realized when the position is closed.
                </p>
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <p class="text-gray-700 font-semibold mb-2">Key Information:</p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Overnight interest rates determine whether you pay or earn interest
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            22:00 (UK Time) is the beginning and end of a trade session
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Swap is calculated and charged once daily
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            3x swap applied on Wednesday for weekend positions*
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 text-white">
                    <h3 class="text-xl font-bold mb-4">PrimeVest SWAP RATES</h3>
                    <p class="text-gray-300 mb-6">
                        To view the latest swap rates for any of our instruments, please refer to the MT4 or MT5 Trading platforms.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 p-3 bg-white/10 rounded-xl">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <span class="text-gray-200">Open MT4 or MT5</span>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-white/10 rounded-xl">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <span class="text-gray-200">View > Market Watch</span>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-white/10 rounded-xl">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <span class="text-gray-200">Right click on Market Watch and select Symbols</span>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-white/10 rounded-xl">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">4</span>
                            </div>
                            <span class="text-gray-200">Right click on the instrument and choose Properties</span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 bg-yellow-50 rounded-2xl p-5 border border-yellow-200">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-yellow-800">Important Note</p>
                            <p class="text-xs text-yellow-700 mt-1">
                                For AUS200, STOXX50, HK50, JP225, DE30, ESP35, UK100, DJ, ND, S&P500 the 3x swap is applied on Friday, while for USDTRY, USDCAD & USDRUB the 3x swap is applied on Thursday.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative py-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-red-900/90"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black/20"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Trading?</h2>
        <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">
            Join our trading programs and become a better trader
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 font-semibold  transition-all duration-300 shadow-lg hover:shadow-xl">
                Open an Account
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="/demo" class="inline-flex items-center px-8 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold transition-all duration-300 border border-white/30">
                Try Demo Account
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Hover effect for button icon */
    .group-hover\:translate-x-1:hover {
        transform: translateX(4px);
    }
    
    /* Custom blur utilities */
    .blur-3xl {
        filter: blur(64px);
    }
    
    .blur-2xl {
        filter: blur(40px);
    }
    
    /* Image optimization */
    img {
        max-width: 100%;
        height: auto;
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