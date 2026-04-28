<!-- Hero Section with Video Background -->
<div class="relative min-h-screen sm:min-h-[250px] md:min-h-[500px] lg:min-h-[600px] xl:min-h-[700px] overflow-hidden">
   
    <!-- Video Background -->
    <div class="absolute inset-0 z-0">
        <video class="w-full h-full object-cover" autoplay loop muted playsinline>
            <source src="{{ asset('videos/primevest-video4.mp4') }}" type="video/mp4">
            <!-- Fallback image in case video doesn't load -->
            <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=1920&h=1080&fit=crop" 
                 alt="Trading Background">
        </video>
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-gray-900/80"></div>
    </div>

    <!-- TradingView Widget -->
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
    
    <!-- Hero Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 md:py-16 lg:py-20 mt-10 md:mt-auto">
        <div class="max-w-4xl">
            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-4xl xl:text-4xl font-bold text-white mb-4 sm:mb-4 md:mb-6 leading-tight">
                <span class="bg-gradient-to-r from-red-400 to-red-500 uppercase bg-clip-text text-transparent block mt-2 sm:mt-3">
                   Trade Shares and Forex with Financial Thinking
                </span>
            </h1>
            
            <!-- Description -->
            <p class="text-base sm:text-base md:text-lg lg:text-xl text-gray-300 mb-6 sm:mb-8 md:mb-10 leading-relaxed max-w-2xl">
                Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                Metals, Energies and Shares. Experience the global markets at your fingertips.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-5">
                <a href="/register" 
                   class="group relative inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 text-base sm:text-lg font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500">
                    <span>Create Free Account</span>
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Trust Indicators -->
            <div class="mt-8 sm:mt-10 md:mt-12 flex flex-wrap gap-4 sm:gap-6 md:gap-8">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="text-gray-300 text-xs sm:text-sm">Regulated Broker</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-gray-300 text-xs sm:text-sm">Zero Commission</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="text-gray-300 text-xs sm:text-sm">Instant Execution</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span class="text-gray-300 text-xs sm:text-sm">Secure Platform</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }
    .animate-bounce {
        animation: bounce 2s infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    /* For ultra-wide screens (2560px and above) */
    @media (min-width: 2560px) {
        .hero-section {
            min-height: 700px;
        }
    }
    
    /* For very large screens (3840px and above) */
    @media (min-width: 3840px) {
        .hero-section {
            min-height: 800px;
        }
    }
</style>