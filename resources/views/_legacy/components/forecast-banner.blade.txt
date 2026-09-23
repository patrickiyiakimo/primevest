<div class="w-full bg-gradient-to-r from-slate-900 to-slate-800 border-y border-slate-700 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
            <!-- Left: Title & Live Indicator -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                    </span>
                    <span class="text-xs font-semibold text-green-400 uppercase tracking-wider">Live Forecasts</span>
                </div>
                <div class="h-4 w-px bg-slate-600 hidden sm:block"></div>
                <p class="text-xs text-slate-300">Powered by <a href="https://forecasttrader.interactivebrokers.com/eventtrader/" target="_blank" class="text-blue-400 hover:text-blue-300 transition">Interactive Brokers EventTrader</a></p>
            </div>

            <!-- Right: Forecast Ticker -->
            <div class="flex-1 w-full overflow-x-auto forecast-scroll">
                <div class="flex items-center justify-start sm:justify-end gap-5 min-w-max">
                    <!-- US House Control -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">🇺🇸 House:</span>
                        <span class="font-semibold text-white">GOP</span>
                        <span class="text-emerald-400 font-semibold" id="forecast-house">68%</span>
                    </div>

                    <!-- Senate Majority -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">🏛️ Senate:</span>
                        <span class="font-semibold text-white">GOP</span>
                        <span class="text-emerald-400 font-semibold" id="forecast-senate">72%</span>
                    </div>

                    <!-- Presidential Nominee (Democrat) -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">📋 Dem Nominee:</span>
                        <span class="font-semibold text-white">Open</span>
                        <span class="text-yellow-400 font-semibold" id="forecast-president-dem">54%</span>
                    </div>

                    <!-- Fed Chair Nomination -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">🏦 Fed Chair:</span>
                        <span class="font-semibold text-white">Hassett</span>
                        <span class="text-emerald-400 font-semibold" id="forecast-fed">61%</span>
                    </div>

                    <!-- Florida Special Election -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">🗳️ FL-16:</span>
                        <span class="font-semibold text-white">GOP Primary</span>
                        <span class="text-emerald-400 font-semibold" id="forecast-florida">89%</span>
                    </div>

                    <!-- Bitcoin $78K -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">₿</span>
                        <span class="font-semibold text-white">BTC > $78K</span>
                        <span class="text-rose-400 font-semibold" id="forecast-btc">42%</span>
                    </div>

                    <!-- S&P 500 $7,275 -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400">📈</span>
                        <span class="font-semibold text-white">SPX > 7,275</span>
                        <span class="text-rose-400 font-semibold" id="forecast-spx">38%</span>
                    </div>
                </div>
            </div>

            <!-- View All Link -->
            <a href="https://forecasttrader.interactivebrokers.com/eventtrader/" target="_blank" class="text-xs text-blue-400 hover:text-blue-300 transition flex-shrink-0 hidden sm:inline-flex items-center gap-1">
                View All
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
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
    
    .forecast-scroll::-webkit-scrollbar {
        height: 2px;
    }
    .forecast-scroll::-webkit-scrollbar-track {
        background: #1e293b;
        border-radius: 10px;
    }
    .forecast-scroll::-webkit-scrollbar-thumb {
        background: #475569;
        border-radius: 10px;
    }
</style>