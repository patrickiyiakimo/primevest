@extends('layouts.app')

@section('page-title', 'Forex Exotic Pairs')
@section('meta-description', 'Trade exotic currency pairs from emerging markets including USD/ZAR, USD/TRY, USD/MXN and more. Access unique trading opportunities with competitive conditions.')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 pt-20">
                Forex Exotic Pairs
            </h1>
            <p class="text-gray-300 text-lg lg:text-xl max-w-3xl mx-auto">
                Access emerging market currencies from around the world with competitive pricing and unique trading opportunities
            </p>
            <div class="mt-8">
                <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                    Start Trading Exotics
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Forex Exotics Table Section -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Emerging Market & Exotic Pairs
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Trade exotic currencies from Africa, Asia, Latin America, and the Middle East
            </p>
        </div>
        
        <!-- TradingView Live Exotic Rates Widget -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-12">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-white">Live Exotic Rates</h3>
                        <p class="text-sm text-gray-400">Real-time streaming prices for exotic pairs</p>
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
                                "name": "African Currencies",
                                "originalName": "African Currencies",
                                "symbols": [
                                    { "name": "FX:USDZAR", "displayName": "USD/ZAR" },
                                    { "name": "FX:USDEGP", "displayName": "USD/EGP" },
                                    { "name": "FX:USDNGN", "displayName": "USD/NGN" },
                                    { "name": "FX:USDMAD", "displayName": "USD/MAD" }
                                ]
                            },
                            {
                                "name": "Asian Exotics",
                                "originalName": "Asian Exotics",
                                "symbols": [
                                    { "name": "FX:USDTHB", "displayName": "USD/THB" },
                                    { "name": "FX:USDMYR", "displayName": "USD/MYR" },
                                    { "name": "FX:USDIDR", "displayName": "USD/IDR" },
                                    { "name": "FX:USDPHP", "displayName": "USD/PHP" },
                                    { "name": "FX:USDKRW", "displayName": "USD/KRW" },
                                    { "name": "FX:USDSGD", "displayName": "USD/SGD" }
                                ]
                            },
                            {
                                "name": "Latin American Exotics",
                                "originalName": "Latin American Exotics",
                                "symbols": [
                                    { "name": "FX:USDMXN", "displayName": "USD/MXN" },
                                    { "name": "FX:USDBRL", "displayName": "USD/BRL" },
                                    { "name": "FX:USDCLP", "displayName": "USD/CLP" },
                                    { "name": "FX:USDCOP", "displayName": "USD/COP" },
                                    { "name": "FX:USDARS", "displayName": "USD/ARS" },
                                    { "name": "FX:USDPEN", "displayName": "USD/PEN" }
                                ]
                            },
                            {
                                "name": "Middle Eastern Exotics",
                                "originalName": "Middle Eastern Exotics",
                                "symbols": [
                                    { "name": "FX:USDTRY", "displayName": "USD/TRY" },
                                    { "name": "FX:USDSAR", "displayName": "USD/SAR" },
                                    { "name": "FX:USDAED", "displayName": "USD/AED" },
                                    { "name": "FX:USDQAR", "displayName": "USD/QAR" },
                                    { "name": "FX:USDKWD", "displayName": "USD/KWD" },
                                    { "name": "FX:USDBHD", "displayName": "USD/BHD" }
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
        
        <!-- African Currencies Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-amber-600 to-amber-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">African Currencies</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pair</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Country/Region</th>
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
                                    <span class="font-bold text-gray-800">USD/ZAR</span>
                                    <span class="text-xs text-gray-400">US Dollar / South African Rand</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">South Africa</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">25.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-35.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+15.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/EGP</span>
                                    <span class="text-xs text-gray-400">US Dollar / Egyptian Pound</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Egypt</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">30.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-40.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+18.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/NGN</span>
                                    <span class="text-xs text-gray-400">US Dollar / Nigerian Naira</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Nigeria</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">35.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-45.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+20.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/MAD</span>
                                    <span class="text-xs text-gray-400">US Dollar / Moroccan Dirham</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Morocco</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">28.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-38.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+16.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Asian Exotics Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-teal-600 to-teal-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Asian Exotics</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pair</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Country/Region</th>
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
                                    <span class="font-bold text-gray-800">USD/THB</span>
                                    <span class="text-xs text-gray-400">US Dollar / Thai Baht</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Thailand</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">20.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-30.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+12.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/MYR</span>
                                    <span class="text-xs text-gray-400">US Dollar / Malaysian Ringgit</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Malaysia</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">22.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-32.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+14.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/IDR</span>
                                    <span class="text-xs text-gray-400">US Dollar / Indonesian Rupiah</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Indonesia</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">25.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-35.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+16.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/PHP</span>
                                    <span class="text-xs text-gray-400">US Dollar / Philippine Peso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Philippines</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">18.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-28.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+10.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/KRW</span>
                                    <span class="text-xs text-gray-400">US Dollar / South Korean Won</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">South Korea</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">15.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-25.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+8.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/SGD</span>
                                    <span class="text-xs text-gray-400">US Dollar / Singapore Dollar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Singapore</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">8.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-15.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+5.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Latin American Exotics Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Latin American Exotics</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pair</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Country/Region</th>
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
                                    <span class="font-bold text-gray-800">USD/MXN</span>
                                    <span class="text-xs text-gray-400">US Dollar / Mexican Peso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Mexico</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">18.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-28.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+10.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/BRL</span>
                                    <span class="text-xs text-gray-400">US Dollar / Brazilian Real</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Brazil</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">22.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-32.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+14.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/CLP</span>
                                    <span class="text-xs text-gray-400">US Dollar / Chilean Peso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Chile</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">28.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-38.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+18.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/COP</span>
                                    <span class="text-xs text-gray-400">US Dollar / Colombian Peso</span>
                                </div>
                            </tr>
                            <td class="px-6 py-4 text-sm text-gray-600">Colombia</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">30.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-40.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+20.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/ARS</span>
                                    <span class="text-xs text-gray-400">US Dollar / Argentine Peso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Argentina</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">40.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-55.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+25.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/PEN</span>
                                    <span class="text-xs text-gray-400">US Dollar / Peruvian Sol</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Peru</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">25.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-35.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+15.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Middle Eastern Exotics Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-rose-600 to-rose-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Middle Eastern Exotics</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pair</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Country/Region</th>
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
                                    <span class="font-bold text-gray-800">USD/TRY</span>
                                    <span class="text-xs text-gray-400">US Dollar / Turkish Lira</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Turkey</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">35.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-50.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+22.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/SAR</span>
                                    <span class="text-xs text-gray-400">US Dollar / Saudi Riyal</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Saudi Arabia</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">10.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-12.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/AED</span>
                                    <span class="text-xs text-gray-400">US Dollar / UAE Dirham</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">UAE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">8.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-10.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+2.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/QAR</span>
                                    <span class="text-xs text-gray-400">US Dollar / Qatari Riyal</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Qatar</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">9.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-11.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+2.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/KWD</span>
                                    <span class="text-xs text-gray-400">US Dollar / Kuwaiti Dinar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Kuwait</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">12.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-14.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+4.0 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-gray-800">USD/BHD</span>
                                    <span class="text-xs text-gray-400">US Dollar / Bahraini Dinar</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Bahrain</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">11.0 pips</td>
                            <td class="px-6 py-4 text-right text-sm text-red-500">-13.0 points</td>
                            <td class="px-6 py-4 text-right text-sm text-green-500">+3.5 points</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">24/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Additional Information Box -->
        <div class="mt-8 p-4 bg-purple-50 rounded-xl border border-purple-200">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="text-sm text-purple-800">
                        <strong>Important Note:</strong> Exotic currency pairs typically have wider spreads and higher volatility than major or minor pairs. 
                        They are influenced by local economic conditions, political stability, and commodity prices. 
                        Spreads shown are indicative and may widen significantly during periods of high volatility or low liquidity.
                        Trading hours are Sunday 22:00 GMT to Friday 22:00 GMT.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Trade Exotic Forex Pairs Section -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade Exotic Pairs?
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Discover unique opportunities in emerging market currencies
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Benefit 1 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">High Volatility</h3>
                <p class="text-gray-500 text-sm">Greater price movements create more trading opportunities</p>
            </div>
            
            <!-- Benefit 2 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Interest Rate Differentials</h3>
                <p class="text-gray-500 text-sm">Potentially high carry trade opportunities</p>
            </div>
            
            <!-- Benefit 3 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Emerging Markets Exposure</h3>
                <p class="text-gray-500 text-sm">Diversify your portfolio with developing economies</p>
            </div>
            
            <!-- Benefit 4 -->
            <div class="text-center p-6 bg-gray-50 rounded-2xl">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Unique Correlations</h3>
                <p class="text-gray-500 text-sm">Low correlation with major pairs for better diversification</p>
            </div>
        </div>
    </div>
</div>

<!-- Risk Warning Section -->
<div class="py-8 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-4 bg-red-50 rounded-xl border border-red-200">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-red-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-red-800">Risk Warning: Exotic Forex Pairs</p>
                    <p class="text-sm text-red-700 mt-1">
                        Exotic currency pairs carry higher risk due to wider spreads, lower liquidity, and increased volatility. 
                        They are more susceptible to sudden price movements and political/economic instability in emerging markets. 
                        Ensure you understand these risks before trading exotic pairs. Past performance does not guarantee future results.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 lg:py-20 bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Trade Exotic Pairs?
        </h2>
        <p class="text-gray-300 text-lg mb-8">
            Open your account today and access over 50+ exotic currency pairs with competitive pricing
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