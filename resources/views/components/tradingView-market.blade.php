<!-- TradingView Market Data Section -->
<div class="w-full bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Global Market Data
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Real-time insights from crypto, futures, and global economies
            </p>
        </div>

        <!-- Grid Container: 3 columns on laptop/desktop, 1 column on mobile -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Card 1: Crypto Dominance Chart -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">Crypto Dominance</h3>
                    <p class="text-xs text-gray-500">Bitcoin vs. the crypto market</p>
                </div>
                <div class="flex-1 p-2 min-h-[350px]">
                    <!-- TradingView Widget: Crypto Market Dominance -->
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                        {
                            "symbols": [
                                ["CRYPTOCAP:BTC.D", "BTC Dominance|1D"],
                                ["CRYPTOCAP:ETH.D", "ETH Dominance|1D"],
                                ["CRYPTOCAP:USDT.D", "USDT Dominance|1D"],
                                ["CRYPTOCAP:TOTAL", "Total Crypto Cap|1D"]
                            ],
                            "chartOnly": false,
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "colorTheme": "light",
                            "autosize": true,
                            "showVolume": false,
                            "showMA": false,
                            "hideDateRanges": false,
                            "hideMarketStatus": false,
                            "hideSymbolLogo": true,
                            "scalePosition": "right",
                            "scaleMode": "Normal",
                            "fontFamily": "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif",
                            "fontSize": "10",
                            "noTimeScale": false,
                            "valuesTracking": "1",
                            "changeMode": "price-and-percent",
                            "chartType": "area",
                            "maLineColor": "#2962FF",
                            "maLineWidth": 1,
                            "maLength": 9,
                            "lineWidth": 2,
                            "lineType": 0,
                            "dateRanges": [
                                "1d|1",
                                "1m|30",
                                "3m|60",
                                "1y|1D",
                                "ALL|1W"
                            ]
                        }
                        </script>
                    </div>
                </div>
                <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
                    <a href="https://www.tradingview.com/markets/cryptocurrencies/dominance/" target="_blank" rel="noopener noreferrer" class="text-red-600 hover:text-red-700 text-xs font-medium">
                        View Live Crypto Dominance Chart →
                    </a>
                </div>
            </div>

            <!-- Card 2: Futures Market Overview -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">Futures Market</h3>
                    <p class="text-xs text-gray-500">Commodities, currencies, and indices</p>
                </div>
                <div class="flex-1 p-2 min-h-[350px]">
                    <!-- TradingView Widget: Market Overview (Futures-focused Tabs) -->
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                        {
                            "colorTheme": "light",
                            "dateRange": "1D",
                            "showChart": true,
                            "locale": "en",
                            "largeChartUrl": "",
                            "isTransparent": false,
                            "showSymbolLogo": false,
                            "width": "100%",
                            "height": "100%",
                            "plotLineColorGrowing": "rgba(34, 197, 94, 1)",
                            "plotLineColorFalling": "rgba(239, 68, 68, 1)",
                            "gridLineColor": "rgba(42, 46, 57, 0)",
                            "scaleFontColor": "rgba(106, 115, 125, 1)",
                            "belowLineFillColorGrowing": "rgba(34, 197, 94, 0.05)",
                            "belowLineFillColorFalling": "rgba(239, 68, 68, 0.05)",
                            "symbolActiveColor": "rgba(42, 46, 57, 0.12)",
                            "tabs": [
                                {
                                    "title": "Commodities",
                                    "symbols": [
                                        {"s": "COMEX:GC1!", "d": "Gold"},
                                        {"s": "COMEX:SI1!", "d": "Silver"},
                                        {"s": "NYMEX:CL1!", "d": "Crude Oil"},
                                        {"s": "CBOT:ZC1!", "d": "Corn"},
                                        {"s": "ICE_TF:SB1!", "d": "Sugar"}
                                    ]
                                },
                                {
                                    "title": "Currencies",
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
                                }
                            ]
                        }
                        </script>
                    </div>
                </div>
                <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
                    <a href="https://www.tradingview.com/markets/futures/quotes-all/" target="_blank" rel="noopener noreferrer" class="text-red-600 hover:text-red-700 text-xs font-medium">
                        View All Futures Quotes →
                    </a>
                </div>
            </div>

            <!-- Card 3: US Economy Dashboard -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800">United States Economy</h3>
                    <p class="text-xs text-gray-500">Key indicators & forecasts</p>
                </div>
                <div class="flex-1 p-2 min-h-[350px]">
                    <!-- TradingView Widget: Economic Calendar / Key Indicators -->
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-economics.js" async>
                        {
                            "colorTheme": "light",
                            "isTransparent": false,
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "countryFilter": ["united_states"],
                            "indicatorFilter": [
                                "Gross Domestic Product (GDP)",
                                "Interest Rate",
                                "Inflation Rate",
                                "Unemployment Rate",
                                "Balance of Trade",
                                "Government Debt to GDP"
                            ]
                        }
                        </script>
                    </div>
                </div>
                <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
                    <a href="https://www.tradingview.com/markets/world-economy/countries/united-states/" target="_blank" rel="noopener noreferrer" class="text-red-600 hover:text-red-700 text-xs font-medium">
                        View Full US Economic Data →
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>