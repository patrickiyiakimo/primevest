@extends('layouts.app')

@section('page-title', 'Forex Minor Pairs')
@section('meta-description', 'Trade Forex minor and cross currency pairs including EUR/GBP, GBP/JPY, EUR/AUD and more. Competitive spreads, fast execution, and professional trading conditions.')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 pt-20">
                Forex Minor & Cross Pairs
            </h1>
            <p class="text-gray-300 text-lg lg:text-xl max-w-3xl mx-auto">
                Trade minor and exotic currency pairs with competitive pricing and exceptional liquidity
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

<!-- Forex Minors Table Section -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Minor & Cross Currency Pairs
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Access a wide range of cross currency pairs with competitive spreads
            </p>
        </div>
        
        <!-- TradingView Live Forex Widget -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Live Cross Rates</h3>
                        <p class="text-sm text-gray-400">Real-time streaming prices for minor pairs</p>
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
                        "height": 500,
                        "symbolsGroups": [
                            {
                                "name": "Euro Crosses",
                                "originalName": "Euro Crosses",
                                "symbols": [
                                    { "name": "FX:EURGBP", "displayName": "EUR/GBP" },
                                    { "name": "FX:EURJPY", "displayName": "EUR/JPY" },
                                    { "name": "FX:EURCHF", "displayName": "EUR/CHF" },
                                    { "name": "FX:EURCAD", "displayName": "EUR/CAD" },
                                    { "name": "FX:EURAUD", "displayName": "EUR/AUD" },
                                    { "name": "FX:EURNZD", "displayName": "EUR/NZD" }
                                ]
                            },
                            {
                                "name": "Pound Crosses",
                                "originalName": "Pound Crosses",
                                "symbols": [
                                    { "name": "FX:GBPJPY", "displayName": "GBP/JPY" },
                                    { "name": "FX:GBPCHF", "displayName": "GBP/CHF" },
                                    { "name": "FX:GBPCAD", "displayName": "GBP/CAD" },
                                    { "name": "FX:GBPAUD", "displayName": "GBP/AUD" },
                                    { "name": "FX:GBPNZD", "displayName": "GBP/NZD" }
                                ]
                            },
                            {
                                "name": "Other Crosses",
                                "originalName": "Other Crosses",
                                "symbols": [
                                    { "name": "FX:AUDJPY", "displayName": "AUD/JPY" },
                                    { "name": "FX:AUDCAD", "displayName": "AUD/CAD" },
                                    { "name": "FX:AUDNZD", "displayName": "AUD/NZD" },
                                    { "name": "FX:CADJPY", "displayName": "CAD/JPY" },
                                    { "name": "FX:CHFJPY", "displayName": "CHF/JPY" },
                                    { "name": "FX:NZDJPY", "displayName": "NZD/JPY" }
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
        
        <!-- Euro Crosses Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Euro Crosses</h3>
                </div>
            </div>
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
                                    <span class="font-bold text-gray-800">EUR/GBP</span>
                                    <span class="text-xs text-gray-400">Euro / British Pound</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs British Pound</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.2 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-7.8 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/JPY</span>
                                    <span class="text-xs text-gray-400">Euro / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs Japanese Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.5 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-8.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.8 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/CHF</span>
                                    <span class="text-xs text-gray-400">Euro / Swiss Franc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs Swiss Franc</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.8 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-9.2 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.1 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/CAD</span>
                                    <span class="text-xs text-gray-400">Euro / Canadian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs Canadian Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-10.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/AUD</span>
                                    <span class="text-xs text-gray-400">Euro / Australian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs Australian Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.2 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-11.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.8 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">EUR/NZD</span>
                                    <span class="text-xs text-gray-400">Euro / New Zealand Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Euro vs New Zealand Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.5 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-11.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+5.1 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pound Crosses Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Pound Crosses</h3>
                </div>
            </div>
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
                                    <span class="font-bold text-gray-800">GBP/JPY</span>
                                    <span class="text-xs text-gray-400">British Pound / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pound vs Japanese Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.8 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-9.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.2 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">GBP/CHF</span>
                                    <span class="text-xs text-gray-400">British Pound / Swiss Franc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pound vs Swiss Franc</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-10.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">GBP/CAD</span>
                                    <span class="text-xs text-gray-400">British Pound / Canadian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pound vs Canadian Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.3 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-11.2 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.9 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">GBP/AUD</span>
                                    <span class="text-xs text-gray-400">British Pound / Australian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pound vs Australian Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.5 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-12.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+5.2 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">GBP/NZD</span>
                                    <span class="text-xs text-gray-400">British Pound / New Zealand Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Pound vs New Zealand Dollar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.8 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-12.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+5.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Other Crosses Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Other Crosses</h3>
                </div>
            </div>
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
                                    <span class="font-bold text-gray-800">AUD/JPY</span>
                                    <span class="text-xs text-gray-400">Australian Dollar / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Aussie vs Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.6 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-8.8 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.9 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">AUD/CAD</span>
                                    <span class="text-xs text-gray-400">Australian Dollar / Canadian Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Aussie vs Loonie</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.1 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-10.2 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.6 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">AUD/NZD</span>
                                    <span class="text-xs text-gray-400">Australian Dollar / New Zealand Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Aussie vs Kiwi</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.4 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-11.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+5.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">CAD/JPY</span>
                                    <span class="text-xs text-gray-400">Canadian Dollar / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Loonie vs Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.7 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-9.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">CHF/JPY</span>
                                    <span class="text-xs text-gray-400">Swiss Franc / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Swissie vs Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">1.9 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-9.8 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.3 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">NZD/JPY</span>
                                    <span class="text-xs text-gray-400">New Zealand Dollar / Japanese Yen</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Kiwi vs Yen</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">2.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-10.5 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.7 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Additional Information Box -->
        <div class="mt-8 p-4 bg-amber-50 rounded-xl border border-amber-200">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="text-sm text-amber-800">
                        <strong>Important Note:</strong> Minor and cross-currency pairs typically have wider spreads than major pairs. 
                        Spreads shown are indicative and may vary based on market volatility and liquidity conditions.
                        Swaps are charged for positions held overnight. Trading hours are Sunday 22:00 GMT to Friday 22:00 GMT.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Trade Minor Forex Pairs Section -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade Minor & Cross Pairs?
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Discover the advantages of diversifying your forex trading portfolio
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Diversification</h3>
                <p class="text-gray-500 text-sm">Access unique trading opportunities not correlated with major pairs</p>
            </div>
            
            <!-- Benefit 2 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Volatility Opportunities</h3>
                <p class="text-gray-500 text-sm">Cross pairs often offer higher volatility and more trading opportunities</p>
            </div>
            
            <!-- Benefit 3 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Global Exposure</h3>
                <p class="text-gray-500 text-sm">Trade currencies from emerging and developed economies worldwide</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 lg:py-20 bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Trade Minor Forex Pairs?
        </h2>
        <p class="text-gray-300 text-lg mb-8">
            Open your account today and access over 50+ currency pairs with competitive pricing
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
@endsection