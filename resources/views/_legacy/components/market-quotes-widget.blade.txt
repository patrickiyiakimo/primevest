<!-- Market Quotes Widget with Constrained Width (Tailwind) -->
<!-- This widget displays real-time data for Indices, Commodities, Forex, and Crypto -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-10">
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright">
            <a href="https://www.tradingview.com/markets/" rel="noopener noreferrer" target="_blank">
                <span class="text-gray-400 text-xs">Market data by TradingView</span>
            </a>
        </div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
        {
            "width": "100%",
            "height": 550,
            "symbolsGroups": [
                {
                    "name": "Indices",
                    "originalName": "Indices",
                    "symbols": [
                        { "name": "SP:SPX", "displayName": "S&P 500" },
                        { "name": "NASDAQ:IXIC", "displayName": "Nasdaq 100" },
                        { "name": "DJI:DJI", "displayName": "Dow Jones" },
                        { "name": "FTSE:UKX", "displayName": "FTSE 100" },
                        { "name": "HSI:HSI", "displayName": "Hong Kong HS42" }
                    ]
                },
                {
                    "name": "Commodities",
                    "originalName": "Commodities",
                    "symbols": [
                        { "name": "TVC:GOLD", "displayName": "Gold" },
                        { "name": "TVC:SILVER", "displayName": "Silver" },
                        { "name": "NYMEX:CL1!", "displayName": "Crude Oil" },
                        { "name": "TVC:USOIL", "displayName": "WTI Oil" },
                        { "name": "NYMEX:NG1!", "displayName": "Natural Gas" }
                    ]
                },
                {
                    "name": "Forex",
                    "originalName": "Forex",
                    "symbols": [
                        { "name": "FX:EURUSD", "displayName": "EUR/USD" },
                        { "name": "FX:GBPUSD", "displayName": "GBP/USD" },
                        { "name": "FX:USDJPY", "displayName": "USD/JPY" },
                        { "name": "FX:USDCHF", "displayName": "USD/CHF" },
                        { "name": "FX:USDCAD", "displayName": "USD/CAD" },
                        { "name": "FX:AUDUSD", "displayName": "AUD/USD" }
                    ]
                },
                {
                    "name": "Crypto",
                    "originalName": "Cryptocurrencies",
                    "symbols": [
                        { "name": "BINANCE:BTCUSDT", "displayName": "Bitcoin" },
                        { "name": "BINANCE:ETHUSDT", "displayName": "Ethereum" },
                        { "name": "BINANCE:SOLUSDT", "displayName": "Solana" },
                        { "name": "BINANCE:BNBUSDT", "displayName": "BNB" },
                        { "name": "BINANCE:XRPUSDT", "displayName": "XRP" }
                    ]
                }
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