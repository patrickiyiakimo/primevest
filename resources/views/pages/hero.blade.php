<!-- Hero Section -->
<div class="relative min-h-screen overflow-hidden bg-white">

    <!-- Background Gradient & Texture Layers -->
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <!-- Soft white-to-red base wash -->
        <div class="absolute inset-0 bg-gradient-to-b from-white via-white to-red-50/70"></div>

        <!-- Aurora bloom — top right -->
        <div class="absolute -top-56 -right-40 w-[42rem] h-[42rem] rounded-full bg-gradient-to-br from-red-500/25 via-rose-300/20 to-transparent blur-3xl animate-aurora"></div>

        <!-- Aurora bloom — bottom left -->
        <div class="absolute -bottom-64 -left-48 w-[44rem] h-[44rem] rounded-full bg-gradient-to-tr from-red-600/20 via-rose-200/25 to-transparent blur-3xl animate-aurora-slow"></div>

        <!-- Centered crimson bloom -->
        <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[60rem] h-[40rem] rounded-full" style="background: radial-gradient(ellipse at center, rgba(225,29,72,0.08), transparent 62%);"></div>

        <!-- Diagonal light beam -->
        <div class="absolute -top-1/4 right-1/4 w-[42rem] h-96 rotate-12 bg-gradient-to-r from-transparent via-red-100/70 to-transparent blur-3xl"></div>

        <!-- Fine premium dot grid -->
        <div class="absolute inset-0 opacity-40" style="background-image: radial-gradient(rgba(190,18,60,0.09) 1px, transparent 1px); background-size: 30px 30px;"></div>

        <!-- Fade into the section below -->
        <div class="absolute bottom-0 inset-x-0 h-44 bg-gradient-to-b from-transparent to-white"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 flex items-center">
        <div class="max-w-7xl mx-auto w-full px-5 sm:px-6 lg:px-8 pt-32 lg:pt-40 pb-16 sm:pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-16 items-center">

                <!-- Left Side — Text Content -->
                <div class="text-center lg:text-left">

                    <!-- Trust Badge -->
                    <!-- <div class="animate-fade-up inline-flex items-center gap-2.5 rounded-full border border-red-100 bg-white/80 backdrop-blur px-4 py-1.5 shadow-[0_2px_12px_rgba(190,18,60,0.08)]">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-70"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                        </span>
                        <span class="text-xs font-semibold text-gray-700 tracking-wide">Trusted by 22M+ investors worldwide</span>
                    </div> -->

                    <!-- Main Heading -->
                    <h1 class="animate-fade-up hero-delay-1 mt-6 text-[2.6rem] leading-[1.08] sm:text-5xl sm:leading-[1.08] xl:text-6xl font-extrabold tracking-tight text-gray-900">
                        Trade Shares &amp; Forex
                        <!-- <br class="hidden sm:block"/> -->
                        with <span class="bg-gradient-to-r from-red-600 via-red-500 to-rose-500 bg-clip-text text-transparent">Financial Thinking</span>
                    </h1>

                    <!-- Description -->
                    <p class="animate-fade-up hero-delay-2 mt-6 text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Trade CFDs across a broad range of instruments — from major FX pairs and
                        Indices to Metals, Energies and Shares. Experience the global markets
                        at your fingertips with institutional-grade execution.
                    </p>

                    <!-- CTA Row -->
                    <div class="animate-fade-up hero-delay-3 mt-9 flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register"
                           class="group relative inline-flex items-center justify-center px-9 py-4 text-base font-bold text-white rounded-full bg-gradient-to-r from-red-600 via-red-500 to-rose-500 bg-[length:150%_auto] hover:bg-right transition-[background-position] duration-500 shadow-xl shadow-red-600/30 hover:shadow-2xl hover:shadow-red-600/40 hover:-translate-y-0.5">
                            <span>Create Free Account</span>
                            <svg class="w-5 h-5 ml-2.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <!-- <a href="#markets"
                           class="group inline-flex items-center justify-center px-4 py-2 text-base font-semibold text-gray-800 hover:text-red-600 transition-colors duration-300">
                            Explore Markets
                            <svg class="w-4 h-4 ml-1.5 transition-transform duration-300 group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7M17 7H8M17 7v9"></path>
                            </svg>
                        </a> -->
                    </div>

                    <!-- Stats Row -->
                    <!-- <div class="animate-fade-up hero-delay-4 mt-12 flex items-center justify-center lg:justify-start gap-7 sm:gap-10">
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">22M+</p>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500 font-medium">Active Traders</p>
                        </div>
                        <div class="w-px h-12 bg-gradient-to-b from-transparent via-red-200 to-transparent"></div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">120+</p>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500 font-medium">Global Markets</p>
                        </div>
                        <div class="w-px h-12 bg-gradient-to-b from-transparent via-red-200 to-transparent"></div>
                        <div>
                            <p class="text-2xl sm:text-3xl font-extrabold text-gray-900">24/7</p>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500 font-medium">Expert Support</p>
                        </div>
                    </div> -->

                    <!-- Risk Disclosure -->
                    <!-- <p class="animate-fade-up hero-delay-5 mt-8 text-[11px] leading-relaxed text-gray-400 max-w-md mx-auto lg:mx-0">
                        CFDs are complex instruments and come with a high risk of losing money rapidly due to leverage.
                    </p> -->
                </div>

                <!-- Right Side — Premium Widget Card -->
                <div class="animate-fade-up hero-delay-2 relative flex justify-center lg:justify-end">
                    <!-- Halo behind card -->
                    <div class="absolute inset-0 -inset-x-8 sm:-inset-x-8 -inset-y-6 rounded-[3rem] bg-gradient-to-br from-red-500/25 via-rose-300/15 to-transparent blur-2xl"></div>

                    <!-- Gradient ring wrapper -->
                    <div class="relative w-full max-w-xl p-[1.5px] rounded-[2rem] bg-gradient-to-br from-red-500/40 via-white/60 to-red-400/40 shadow-[0_40px_100px_-28px_rgba(190,18,60,0.40)]">
                        <div class="rounded-[2rem] overflow-hidden bg-white">

                            <!-- Widget header bar -->
                            <div class="flex items-center justify-between px-5 py-4 bg-slate-900">
                                <div class="flex items-center gap-2.5">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-70"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                    </span>
                                    <span class="text-white text-[11px] font-bold tracking-[0.22em] uppercase">Live Market Overview</span>
                                </div>
                                <span class="text-gray-500 text-[11px] font-medium hidden sm:block">Powered by TradingView</span>
                            </div>

                            <!-- TradingView widget -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                                {
                                    "width": "100%",
                                    "height": 470,
                                    "title": "Market Overview",
                                    "titleColor": "#f9fafb",
                                    "colorTheme": "dark",
                                    "locale": "en",
                                    "trendLineColor": "#e11d48",
                                    "isTransparent": false,
                                    "showVolume": false,
                                    "showChart": true,
                                    "tabs": [
                                        {
                                            "title": "Forex",
                                            "symbols": [
                                                {"s": "FX:EURUSD", "d": "EUR/USD"},
                                                {"s": "FX:GBPUSD", "d": "GBP/USD"},
                                                {"s": "FX:USDJPY", "d": "USD/JPY"},
                                                {"s": "FX:AUDUSD", "d": "AUD/USD"},
                                                {"s": "FX:USDCAD", "d": "USD/CAD"}
                                            ]
                                        },
                                        {
                                            "title": "Indices",
                                            "symbols": [
                                                {"s": "SP:SPX", "d": "S&P 500"},
                                                {"s": "NASDAQ:IXIC", "d": "Nasdaq"},
                                                {"s": "DJI:DJI", "d": "Dow Jones"},
                                                {"s": "FTSE:UKX", "d": "FTSE 100"},
                                                {"s": "HSI:HSI", "d": "Hang Seng"}
                                            ]
                                        },
                                        {
                                            "title": "Commodities",
                                            "symbols": [
                                                {"s": "TVC:GOLD", "d": "Gold"},
                                                {"s": "TVC:SILVER", "d": "Silver"},
                                                {"s": "NYMEX:CL1!", "d": "Crude Oil"},
                                                {"s": "TVC:USOIL", "d": "WTI Oil"}
                                            ]
                                        },
                                        {
                                            "title": "Crypto",
                                            "symbols": [
                                                {"s": "BINANCE:BTCUSDT", "d": "Bitcoin"},
                                                {"s": "BINANCE:ETHUSDT", "d": "Ethereum"},
                                                {"s": "BINANCE:SOLUSDT", "d": "Solana"},
                                                {"s": "BINANCE:BNBUSDT", "d": "BNB"}
                                            ]
                                        }
                                    ]
                                }
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- Floating accent chip — top left -->
                    <!-- <div class="animate-float absolute -top-5 -left-3 sm:left-2 hidden sm:flex items-center gap-2.5 rounded-2xl bg-white/90 backdrop-blur px-4 py-3 shadow-lg shadow-red-900/10 ring-1 ring-red-100">
                        <span class="w-8 h-8 rounded-xl bg-red-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </span>
                        <div>
                            <p class="text-[11px] text-gray-500 font-medium">S&amp;P 500</p>
                            <p class="text-sm font-bold text-gray-900">+1.24%</p>
                        </div>
                    </div> -->

                    <!-- Floating accent chip — bottom right -->
                    <!-- <div class="animate-float-slow absolute -bottom-6 right-2 sm:right-4 hidden sm:flex items-center gap-2.5 rounded-2xl bg-white/90 backdrop-blur px-4 py-3 shadow-lg shadow-red-900/10 ring-1 ring-red-100">
                        <span class="w-8 h-8 rounded-xl bg-red-50 flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </span>
                        <div>
                            <p class="text-[11px] text-gray-500 font-medium">EUR/USD</p>
                            <p class="text-sm font-bold text-gray-900">1.0892</p>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* Luxury entrance animations */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-up {
        animation: fadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    .hero-delay-1 { animation-delay: 0.12s; }
    .hero-delay-2 { animation-delay: 0.24s; }
    .hero-delay-3 { animation-delay: 0.36s; }
    .hero-delay-4 { animation-delay: 0.48s; }
    .hero-delay-5 { animation-delay: 0.60s; }

    /* Floating accent chips */
    @keyframes floatY {
        0%, 100% { transform: translateY(0); }
        50%      { transform: translateY(-12px); }
    }
    .animate-float      { animation: floatY 6s ease-in-out infinite; }
    .animate-float-slow { animation: floatY 7.5s ease-in-out 1.2s infinite; }

    /* Background bloom drift */
    @keyframes aurora {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50%      { transform: translate(-24px, 18px) scale(1.06); }
    }
    .animate-aurora      { animation: aurora 14s ease-in-out infinite; }
    .animate-aurora-slow { animation: aurora 18s ease-in-out -4s infinite reverse; }
</style>