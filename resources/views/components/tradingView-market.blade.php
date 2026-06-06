<!-- TradingView Market Summary Section -->
<div class="w-full bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Market Summary
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Real-time global market data, indices, commodities, and crypto
            </p>
        </div>

        <!-- Grid Container -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Card 1: Major Indices -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Major Indices</h3>
                    <p class="text-xs text-gray-500">Global stock market performance</p>
                </div>
                <div class="flex-1 p-2 min-h-[300px]">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                        {
                            "width": "100%",
                            "height": 300,
                            "symbolsGroups": [
                                {
                                    "name": "Indices",
                                    "originalName": "Indices",
                                    "symbols": [
                                        {"name": "SP:SPX", "displayName": "S&P 500"},
                                        {"name": "NASDAQ:NDX", "displayName": "Nasdaq 100"},
                                        {"name": "JPX:NI225", "displayName": "Japan 225"},
                                        {"name": "SSE:000001", "displayName": "SSE Composite"},
                                        {"name": "FTSE:UKX", "displayName": "FTSE 100"},
                                        {"name": "GER:DAX", "displayName": "DAX"},
                                        {"name": "FRA:PX1", "displayName": "CAC 40"}
                                    ]
                                }
                            ],
                            "showSymbolLogo": false,
                            "colorTheme": "light",
                            "isTransparent": false,
                            "locale": "en",
                            "backgroundColor": "#ffffff"
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Card 2: Crypto Market -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Cryptocurrency Market</h3>
                    <p class="text-xs text-gray-500">Crypto prices and dominance</p>
                </div>
                <div class="flex-1 p-2 min-h-[300px]">
                    <!-- Crypto Market Overview -->
                    <div class="tradingview-widget-container mb-3">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                        {
                            "symbols": [
                                ["CRYPTOCAP:TOTAL", "Total Crypto Cap|1M"],
                                ["CRYPTOCAP:BTC.D", "Bitcoin Dominance|1M"],
                                ["CRYPTOCAP:ETH.D", "Ethereum Dominance|1M"]
                            ],
                            "chartOnly": false,
                            "width": "100%",
                            "height": 180,
                            "locale": "en",
                            "colorTheme": "light",
                            "autosize": false,
                            "showVolume": false,
                            "showMA": false,
                            "hideDateRanges": false,
                            "hideMarketStatus": false,
                            "hideSymbolLogo": true,
                            "scalePosition": "right",
                            "scaleMode": "Normal",
                            "fontSize": "10",
                            "noTimeScale": false,
                            "valuesTracking": "1",
                            "changeMode": "price-and-percent"
                        }
                        </script>
                    </div>
                    <!-- Top Cryptos -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                        {
                            "symbols": [
                                {"proName": "BINANCE:BTCUSDT", "title": "Bitcoin"},
                                {"proName": "BINANCE:ETHUSDT", "title": "Ethereum"},
                                {"proName": "BINANCE:SOLUSDT", "title": "Solana"}
                            ],
                            "showSymbolLogo": true,
                            "colorTheme": "light",
                            "isTransparent": false,
                            "locale": "en",
                            "backgroundColor": "#ffffff"
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Card 3: Commodities & Forex -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">Commodities & Forex</h3>
                    <p class="text-xs text-gray-500">Oil, gold, copper, and dollar index</p>
                </div>
                <div class="flex-1 p-2 min-h-[300px]">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                        {
                            "width": "100%",
                            "height": 300,
                            "symbolsGroups": [
                                {
                                    "name": "Commodities",
                                    "originalName": "Commodities",
                                    "symbols": [
                                        {"name": "NYMEX:CL1!", "displayName": "Light Crude Oil"},
                                        {"name": "NYMEX:NG1!", "displayName": "Natural Gas"},
                                        {"name": "COMEX:GC1!", "displayName": "Gold"},
                                        {"name": "COMEX:HG1!", "displayName": "Copper"}
                                    ]
                                },
                                {
                                    "name": "Forex",
                                    "originalName": "Forex",
                                    "symbols": [
                                        {"name": "FX:DXY", "displayName": "US Dollar Index"}
                                    ]
                                }
                            ],
                            "showSymbolLogo": false,
                            "colorTheme": "light",
                            "isTransparent": false,
                            "locale": "en",
                            "backgroundColor": "#ffffff"
                        }
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <!-- Second Row: US Economy and Bonds -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
            
            <!-- Card 4: US Economy Indicators -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">US Economy</h3>
                    <p class="text-xs text-gray-500">Interest rates, inflation, and key indicators</p>
                </div>
                <div class="flex-1 p-2 min-h-[250px]">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-economics.js" async>
                        {
                            "colorTheme": "light",
                            "isTransparent": false,
                            "width": "100%",
                            "height": 250,
                            "locale": "en",
                            "countryFilter": ["united_states"],
                            "indicatorFilter": [
                                "Interest Rate",
                                "Inflation Rate",
                                "Unemployment Rate",
                                "Gross Domestic Product (GDP)"
                            ]
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Card 5: US Treasury Yields -->
            <div class="bg-white border border-gray-200 shadow-sm h-full flex flex-col">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800">US Treasury Yields</h3>
                    <p class="text-xs text-gray-500">Government bond rates</p>
                </div>
                <div class="flex-1 p-2 min-h-[250px]">
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                        {
                            "width": "100%",
                            "height": 250,
                            "symbolsGroups": [
                                {
                                    "name": "Treasury Yields",
                                    "originalName": "Treasury Yields",
                                    "symbols": [
                                        {"name": "BOND:US10Y", "displayName": "US 10-Year Yield"}
                                    ]
                                }
                            ],
                            "showSymbolLogo": false,
                            "colorTheme": "light",
                            "isTransparent": false,
                            "locale": "en",
                            "backgroundColor": "#ffffff"
                        }
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Note -->
        <div class="text-center mt-8">
            <p class="text-xs text-gray-400">Data provided by TradingView. Real-time market data for informational purposes only.</p>
        </div>
    </div>
</div>