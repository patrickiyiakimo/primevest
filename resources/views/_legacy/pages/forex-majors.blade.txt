@extends('layouts.app')

@section('page-title', 'Forex Major Pairs')
@section('meta-description', 'Trade the world\'s most popular Forex major pairs including EUR/USD, GBP/USD, USD/JPY and more. Competitive spreads, fast execution, and advanced trading tools.')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 pt-20">
                Forex Major Pairs
            </h1>
            <p class="text-gray-300 text-lg lg:text-xl max-w-3xl mx-auto">
                Trade the world's most liquid currency pairs with competitive spreads and lightning-fast execution
            </p>
            <div class="mt-8">
                <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                    Start Trading Forex
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Forex Majors Table Section -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Major Currency Pairs
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Live prices, spreads, and market data for the most traded forex pairs
            </p>
        </div>
        
        <!-- TradingView Live Forex Widget -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Live Forex Rates</h3>
                        <p class="text-sm text-gray-400">Real-time streaming prices</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-xs text-gray-400">Live Updates</span>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <!-- TradingView Market Data Widget -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                    {
                        "width": "100%",
                        "height": 450,
                        "symbolsGroups": [
                            {
                                "name": "Major Forex Pairs",
                                "originalName": "Major Forex Pairs",
                                "symbols": [
                                    { "name": "FX:EURUSD", "displayName": "EUR/USD" },
                                    { "name": "FX:GBPUSD", "displayName": "GBP/USD" },
                                    { "name": "FX:USDJPY", "displayName": "USD/JPY" },
                                    { "name": "FX:USDCHF", "displayName": "USD/CHF" },
                                    { "name": "FX:USDCAD", "displayName": "USD/CAD" },
                                    { "name": "FX:AUDUSD", "displayName": "AUD/USD" },
                                    { "name": "FX:NZDUSD", "displayName": "NZD/USD" }
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
        </div>
        
        <!-- Detailed Forex Majors Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pair</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Typical Spread</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Swap Long</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Swap Short</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Trading Hours</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/USD</span>
                                    <span class="text-xs text-gray-400">Euro / US Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">0.6 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-6.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.2 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">GBP/USD</span>
                                    <span class="text-xs text-gray-400">British Pound / US Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">British Pound</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">0.9 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-7.2 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.8 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/JPY</span>
                                    <span class="text-xs text-gray-400">US Dollar / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">US Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">0.7 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-6.8 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/CHF</span>
                                    <span class="text-xs text-gray-400">US Dollar / Swiss Franc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">US Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.2 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-8.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.1 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/CAD</span>
                                    <span class="text-xs text-gray-400">US Dollar / Canadian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">US Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.4 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-9.2 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">AUD/USD</span>
                                    <span class="text-xs text-gray-400">Australian Dollar / US Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Australian Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-7.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.9 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">NZD/USD</span>
                                    <span class="text-xs text-gray-400">New Zealand Dollar / US Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">New Zealand Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.3 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-8.9 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.3 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Additional Information Box -->
        <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-200">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="text-sm text-blue-800">
                        <strong>Important Note:</strong> Spreads shown are indicative and may vary based on market conditions. 
                        Swaps are charged for positions held overnight. Trading hours are Sunday 22:00 GMT to Friday 22:00 GMT.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Trade Forex Section -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade Forex with PrimeVest?
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Experience competitive trading conditions and exceptional execution
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Competitive Spreads</h3>
                <p class="text-gray-500 text-sm">From as low as 0.6 pips on major pairs</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Fast Execution</h3>
                <p class="text-gray-500 text-sm">Lightning-fast order execution in milliseconds</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Regulated Broker</h3>
                <p class="text-gray-500 text-sm">Fully regulated with client fund protection</p>
            </div>
            
            <!-- Feature 4 -->
            <div class="text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">24/5 Support</h3>
                <p class="text-gray-500 text-sm">Dedicated support during market hours</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 lg:py-20 bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Start Trading Forex?
        </h2>
        <p class="text-gray-300 text-lg mb-8">
            Open a live account in minutes and access the world's largest financial market
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/register" class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                Open Live Account
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="/register" class="inline-flex items-center justify-center px-8 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-full transition-all duration-300 border border-white/30">
                Try Demo Account
            </a>
        </div>
    </div>
</div>

<script>
    // Any additional JavaScript for dynamic data can be added here
    document.addEventListener('DOMContentLoaded', function() {
        // You can add real-time price updates via WebSocket or API here
        console.log('Forex majors page loaded');
    });
</script>
@endsection