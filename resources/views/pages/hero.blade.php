<!-- Hero Section -->
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
                    <h1 class="text-4xl sm:text-5xl md:text-4xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-6 leading-tight pt-20 lg:pt-0">
                        Trade Shares and Forex <br>with <span class="text-red-600">Financial Thinking</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                        Metals, Energies and Shares. Experience the global markets at your fingertips.
                    </p>

                    <!-- Button -->
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register" 
                           class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                            <span>Create Free Account</span>
                            <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    
                    
                </div>
                
                <!-- Right Side - Image with subtle red glow -->
                <div class="flex justify-center lg:justify-end relative">
                    <!-- <div class="absolute inset-0 bg-gradient-to-r from-red-200 to-transparent rounded-full blur-2xl opacity-50"></div> -->
                     <div class="w-full rounded-xl overflow-hidden ">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                    "width": "100%",
                    "height": 500,
                    "title": "Market Overview",
                    "titleColor": "#1f2937",
                    "colorTheme": "dark",
                    "locale": "en",
                    "trendLineColor": "#b91c1c",
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
                
            </div>
        </div>
    </div>
</div>

<style>
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
</style>