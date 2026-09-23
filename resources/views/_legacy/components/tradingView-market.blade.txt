<!-- TradingView Professional Market Dashboard -->
<div class="w-full bg-gray-50 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Market Summary
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Real-time global market data, indices, commodities, and cryptocurrency
            </p>
        </div>

        <!-- Row 1: Major Indices - 4 columns -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- S&P 500 Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">S&P 500</h3>
                            <p class="text-xs text-gray-500">SPX</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">7,383.73</p>
                            <p class="text-xs text-red-600">−2.64%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "SP:SPX",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true,
                            "largeChartUrl": ""
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Nasdaq 100 Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Nasdaq 100</h3>
                            <p class="text-xs text-gray-500">NDX</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">28,957.60</p>
                            <p class="text-xs text-red-600">−4.77%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "NASDAQ:NDX",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Japan 225 Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Japan 225</h3>
                            <p class="text-xs text-gray-500">NI225</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">66,587.90</p>
                            <p class="text-xs text-red-600">−1.31%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "JPX:NI225",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- SSE Composite Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">SSE Composite</h3>
                            <p class="text-xs text-gray-500">000001</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">4,027.74</p>
                            <p class="text-xs text-red-600">−0.74%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "SSE:000001",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row 2: European Indices -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- FTSE 100 Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">FTSE 100</h3>
                            <p class="text-xs text-gray-500">UKX</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">10,368.05</p>
                            <p class="text-xs text-green-600">+0.07%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "FTSE:UKX",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- DAX Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">DAX</h3>
                            <p class="text-xs text-gray-500">DAX</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">24,759.05</p>
                            <p class="text-xs text-red-600">−0.75%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "GER:DAX",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- CAC 40 Chart -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">CAC 40</h3>
                            <p class="text-xs text-gray-500">PX1</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">8,218.24</p>
                            <p class="text-xs text-red-600">−0.32%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "FRA:PX1",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row 3: Cryptocurrency Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Crypto Market Cap & Dominance -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-bold text-gray-800">Cryptocurrency Market</h3>
                    <p class="text-xs text-gray-500">Market cap and dominance</p>
                </div>
                <div class="p-3">
                    <!-- Total Crypto Cap Chart -->
                    <div class="mb-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-600">Total Market Cap</span>
                            <span class="text-sm font-bold text-gray-900">$2.1T <span class="text-red-600">−20.14%</span></span>
                        </div>
                        <div class="tradingview-widget-container h-32">
                            <div class="tradingview-widget-container__widget" style="height:100%"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                            {
                                "symbol": "CRYPTOCAP:TOTAL",
                                "width": "100%",
                                "height": "100%",
                                "locale": "en",
                                "dateRange": "1M",
                                "colorTheme": "light",
                                "isTransparent": true,
                                "autosize": true
                            }
                            </script>
                        </div>
                    </div>
                    
                    <!-- Dominance Donut Chart -->
                    <div class="tradingview-widget-container h-64">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-data.js" async>
                        {
                            "width": "100%",
                            "height": 250,
                            "colorTheme": "light",
                            "locale": "en",
                            "isTransparent": true,
                            "symbols": [
                                {"s": "CRYPTOCAP:BTC.D", "d": "Bitcoin Dominance"},
                                {"s": "CRYPTOCAP:ETH.D", "d": "Ethereum Dominance"}
                            ]
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Bitcoin & Ethereum Charts -->
            <div class="space-y-6">
                <!-- Bitcoin Chart -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-3 border-b border-gray-100 bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-gray-800">Bitcoin</h3>
                                <p class="text-xs text-gray-500">BTC/USD</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-900">$61,605</p>
                                <p class="text-xs text-green-600">+1.23%</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 h-64">
                        <div class="tradingview-widget-container h-full">
                            <div class="tradingview-widget-container__widget" style="height:100%"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                            {
                                "symbol": "BINANCE:BTCUSDT",
                                "width": "100%",
                                "height": "100%",
                                "locale": "en",
                                "dateRange": "1M",
                                "colorTheme": "light",
                                "isTransparent": true,
                                "autosize": true
                            }
                            </script>
                        </div>
                    </div>
                </div>

                <!-- Ethereum Chart -->
                <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-3 border-b border-gray-100 bg-gray-50">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold text-gray-800">Ethereum</h3>
                                <p class="text-xs text-gray-500">ETH/USD</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-900">$1,593.00</p>
                                <p class="text-xs text-green-600">+1.52%</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 h-64">
                        <div class="tradingview-widget-container h-full">
                            <div class="tradingview-widget-container__widget" style="height:100%"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                            {
                                "symbol": "BINANCE:ETHUSDT",
                                "width": "100%",
                                "height": "100%",
                                "locale": "en",
                                "dateRange": "1M",
                                "colorTheme": "light",
                                "isTransparent": true,
                                "autosize": true
                            }
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row 4: Commodities -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <!-- US Dollar Index -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">US Dollar Index</h3>
                            <p class="text-xs text-gray-500">DXY</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">100.071</p>
                            <p class="text-xs text-green-600">+2.08%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "FX:DXY",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Light Crude Oil -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Light Crude Oil</h3>
                            <p class="text-xs text-gray-500">CL1!</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">$90.54</p>
                            <p class="text-xs text-red-600">−2.69%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "NYMEX:CL1!",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Natural Gas -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Natural Gas</h3>
                            <p class="text-xs text-gray-500">NG1!</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">$3.229</p>
                            <p class="text-xs text-red-600">−3.21%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "NYMEX:NG1!",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Gold -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Gold</h3>
                            <p class="text-xs text-gray-500">GC1!</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">$4,365.30</p>
                            <p class="text-xs text-red-600">−3.10%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-48">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "COMEX:GC1!",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row 5: Copper and US Economy -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Copper -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-3 border-b border-gray-100 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-gray-800">Copper</h3>
                            <p class="text-xs text-gray-500">HG1!</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">$6.2845</p>
                            <p class="text-xs text-red-600">−3.83%</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 h-64">
                    <div class="tradingview-widget-container h-full">
                        <div class="tradingview-widget-container__widget" style="height:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                        {
                            "symbol": "COMEX:HG1!",
                            "width": "100%",
                            "height": "100%",
                            "locale": "en",
                            "dateRange": "1M",
                            "colorTheme": "light",
                            "isTransparent": true,
                            "autosize": true
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- US Economy Indicators -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 overflow-hidden">
                <div class="p-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="font-bold text-gray-800">United States Economy</h3>
                    <p class="text-xs text-gray-500">Key economic indicators</p>
                </div>
                <div class="p-4">
                    <!-- US 10-Year Yield -->
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">US 10-Year Yield</span>
                            <span class="text-sm font-bold text-gray-900">4.513% <span class="text-green-600">+1.13%</span></span>
                        </div>
                        <div class="tradingview-widget-container h-24">
                            <div class="tradingview-widget-container__widget" style="height:100%"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                            {
                                "symbol": "BOND:US10Y",
                                "width": "100%",
                                "height": "100%",
                                "locale": "en",
                                "dateRange": "1M",
                                "colorTheme": "light",
                                "isTransparent": true,
                                "autosize": true
                            }
                            </script>
                        </div>
                    </div>

                    <!-- Economic Indicators Table -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Inflation Rate</span>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-gray-900">3.8%</span>
                                <span class="text-xs text-gray-500 ml-2">(Actual)</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Interest Rate</span>
                            <div class="text-right">
                                <span class="text-sm font-semibold text-gray-900">3.75%</span>
                                <span class="text-xs text-gray-500 ml-2">(Actual)</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                            <span class="text-sm text-gray-600">Next Release</span>
                            <span class="text-sm font-semibold text-gray-900">Jun 17, 2026</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Note -->
        <div class="text-center mt-8 pt-4 border-t border-gray-200">
            <p class="text-xs text-gray-400">Real-time market data provided by TradingView. Charts update automatically.</p>
        </div>
    </div>
</div>

<script>
    // Force widget refresh on load
    window.addEventListener('load', function() {
        if (window.TradingView) {
            window.dispatchEvent(new Event('resize'));
        }
    });
</script>