<div class="w-full py-20 px-5 bg-gray-100">
    <div class="max-w-7xl mx-auto">
        <!-- Title -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-600 mb-4">
                Trade over 2100 global markets
            </h2>
            <p class="text-gray-400 text-lg">
                Access stocks, forex, commodities, indices and cryptocurrencies from a single platform
            </p>
        </div>

        <!-- TradingView Market Overview Widget -->
        <div class="w-full rounded-xl overflow-hidden shadow-2xl">
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                    "width": "100%",
                    "height": 600,
                    "title": "Market Overview",
                    "titleColor": "#1f2937",
                    "colorTheme": "light",
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