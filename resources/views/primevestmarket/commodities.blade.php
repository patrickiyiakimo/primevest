@extends('primevestmarket.layouts.app')

@section('title', 'Commodities Trading | PrimevestMarket')

@section('content')

        <!-- Hero Section -->
        <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800">
            <!-- Abstract Background Elements -->
            <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
                <div class="absolute top-0 right-0 w-full h-full">
                    <svg class="absolute top-0 right-0 w-full h-full" viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="commoditiesGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop stop-color="#F59E0B" stop-opacity=".25" offset="0%"/>
                        <stop stop-color="#EF4444" stop-opacity=".2" offset="50%"/>
                        <stop stop-color="#EC4899" stop-opacity=".15" offset="100%"/>
                    </linearGradient>
                </defs>
                <path d="M100,600 L200,550 L300,580 L400,500 L500,520 L600,480 L700,400"
                      stroke="url(#commoditiesGrad1)"
                      fill="none"
                      stroke-width="8"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>

                <g stroke="currentColor" stroke-opacity="0.1">
                    <line x1="0" y1="100" x2="800" y2="100" />
                    <line x1="0" y1="200" x2="800" y2="200" />
                    <line x1="0" y1="300" x2="800" y2="300" />
                    <line x1="0" y1="400" x2="800" y2="400" />
                    <line x1="0" y1="500" x2="800" y2="500" />
                    <line x1="0" y1="600" x2="800" y2="600" />
                    <line x1="0" y1="700" x2="800" y2="700" />
                    <line x1="100" y1="0" x2="100" y2="800" />
                    <line x1="200" y1="0" x2="200" y2="800" />
                    <line x1="300" y1="0" x2="300" y2="800" />
                    <line x1="400" y1="0" x2="400" y2="800" />
                    <line x1="500" y1="0" x2="500" y2="800" />
                    <line x1="600" y1="0" x2="600" y2="800" />
                    <line x1="700" y1="0" x2="700" y2="800" />
                </g>
            </svg>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="inline-block px-3 py-1 mb-6 text-xs font-semibold tracking-wider text-yellow-400 uppercase bg-yellow-900 bg-opacity-30 rounded-full">
                            Global Markets
                        </div>
                        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl mb-6">
                            <span class="block">Commodities</span>
                            <span class="block text-yellow-400">Trading</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl max-w-xl">
                            Discover opportunities on UK &amp; US Crude Oil, Gold, Silver and Natural Gas with tight spreads, deep liquidity and ultra-fast execution.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#commodities-table" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition duration-300">
                        View Markets
                        <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                            <a href="{{ route('trading-conditions') }}" class="inline-flex items-center px-6 py-3 border border-gray-700 text-base font-medium rounded-md text-gray-300 bg-transparent hover:bg-gray-800 transition duration-300">
                        Trading Conditions
                    </a>
                        </div>
                    </div>
                    <div class="hidden lg:block">
                        <div class="relative">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-lg blur opacity-30"></div>
                            <div class="relative bg-gray-800 bg-opacity-80 backdrop-blur-sm p-6 rounded-lg border border-gray-700">
                                <div class="flex justify-between items-center mb-6">
                                    <div>
                                        <span class="text-gray-400 text-sm">Precious Metal</span>
                                        <h3 class="text-xl font-bold text-white">Gold (XAU/USD)</h3>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-green-400 text-xl font-bold">2,341.60</span>
                                        <div class="flex items-center justify-end text-green-400">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                                    </svg>
                                            <span class="text-sm">+0.42%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full h-48 relative">
                                    <svg class="w-full h-full" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="commodityChartGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#F59E0B" stop-opacity="0.25"/>
                                        <stop offset="100%" stop-color="#F59E0B" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <g stroke="#2D3748" stroke-width="0.5">
                                    <line x1="0" y1="40" x2="400" y2="40" />
                                    <line x1="0" y1="80" x2="400" y2="80" />
                                    <line x1="0" y1="120" x2="400" y2="120" />
                                    <line x1="0" y1="160" x2="400" y2="160" />
                                </g>
                                <path d="M0,150 L40,140 L80,155 L120,120 L160,110 L200,125 L240,95 L280,100 L320,70 L360,75 L400,55"
                                      fill="none" stroke="#F59E0B" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M0,150 L40,140 L80,155 L120,120 L160,110 L200,125 L240,95 L280,100 L320,70 L360,75 L400,55 L400,200 L0,200 Z"
                                      fill="url(#commodityChartGradient)"/>
                            </svg>
                                </div>
                                <div class="grid grid-cols-3 gap-2 mt-4">
                                    <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                        <div class="text-xs text-gray-400">Open</div>
                                        <div class="text-sm text-white">2,332.10</div>
                                    </div>
                                    <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                        <div class="text-xs text-gray-400">High</div>
                                        <div class="text-sm text-white">2,349.80</div>
                                    </div>
                                    <div class="bg-gray-900 bg-opacity-50 p-2 rounded">
                                        <div class="text-xs text-gray-400">Low</div>
                                        <div class="text-sm text-white">2,328.45</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Live Commodities Widget -->
        <section class="py-16 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-yellow-400 uppercase bg-yellow-900 bg-opacity-30 rounded-full">
                        Real-Time Prices
                    </div>
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Live Commodities Market</span>
                    </h2>
                    <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto">
                        Track live prices for the most traded energy, metals and agricultural commodities.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl blur opacity-20"></div>
                    <div class="relative bg-gray-800 bg-opacity-80 backdrop-blur-sm rounded-xl p-4 border border-gray-700">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                                {
                                    "colorTheme": "dark",
                                    "dateRange": "12M",
                                    "showChart": true,
                                    "locale": "en",
                                    "width": "100%",
                                    "height": "500",
                                    "largeChartUrl": "",
                                    "isTransparent": false,
                                    "showSymbolLogo": true,
                                    "showFloatingTooltip": false,
                                    "plotLineColorGrowing": "rgba(0, 255, 0, 1)",
                                    "plotLineColorFalling": "rgba(255, 0, 0, 1)",
                                    "gridLineColor": "rgba(42, 46, 57, 0.5)",
                                    "scaleFontColor": "rgba(106, 109, 120, 1)",
                                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                    "tabs": [{
                                        "title": "Energy",
                                        "symbols": [{
                                            "s": "NYMEX:CL1!",
                                            "d": "Crude Oil"
                                        }, {
                                            "s": "NYMEX:NG1!",
                                            "d": "Natural Gas"
                                        }, {
                                            "s": "NYMEX:HO1!",
                                            "d": "Heating Oil"
                                        }, {
                                            "s": "NYMEX:RB1!",
                                            "d": "Gasoline"
                                        }]
                                    }, {
                                        "title": "Metals",
                                        "symbols": [{
                                            "s": "COMEX:GC1!",
                                            "d": "Gold"
                                        }, {
                                            "s": "COMEX:SI1!",
                                            "d": "Silver"
                                        }, {
                                            "s": "COMEX:HG1!",
                                            "d": "Copper"
                                        }, {
                                            "s": "NYMEX:PL1!",
                                            "d": "Platinum"
                                        }]
                                    }, {
                                        "title": "Agriculture",
                                        "symbols": [{
                                            "s": "CBOT:ZC1!",
                                            "d": "Corn"
                                        }, {
                                            "s": "CBOT:ZS1!",
                                            "d": "Soybean"
                                        }, {
                                            "s": "CBOT:ZW1!",
                                            "d": "Wheat"
                                        }, {
                                            "s": "ICEUS:KC1!",
                                            "d": "Coffee"
                                        }]
                                    }]
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Commodities Table Section -->
        <section id="commodities-table" class="py-16 bg-gradient-to-b from-gray-900 to-gray-800 relative">
            <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iLjMiPjxwYXRoIGQ9Ik0zNiAzNGgLTJWMjRoMnpNNDAgMjRoLTJ2MTBoMnpNNDQgMjRoLTJ2MTBoMnoiLz48L2c+PC9nPjwvc3ZnPg==')]"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12">
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-yellow-400 uppercase bg-yellow-900 bg-opacity-30 rounded-full">
                        Market Overview
                    </div>
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Commodities - Spreads &amp; Trading Conditions</span>
                    </h2>
                    <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto">
                        Trade energy, metals and agricultural commodities with competitive spreads and flexible trading conditions
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl blur opacity-20"></div>
                    <div class="relative bg-gray-800 bg-opacity-80 backdrop-blur-sm rounded-xl p-6 overflow-hidden border border-gray-700">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Symbol</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Leverage</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Lot Size</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Min Lot Size</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Commission</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-800 divide-y divide-gray-700 text-gray-200">
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="GOLD" href="#">GOLD</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:200</td>
                                        <td class="px-6 py-4 whitespace-nowrap">100 * troy ounce</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="SILVER" href="#">SILVER</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:100</td>
                                        <td class="px-6 py-4 whitespace-nowrap">5000 * troy ounce</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="UKOIL" href="#">UKOIL</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:100</td>
                                        <td class="px-6 py-4 whitespace-nowrap">1000 * barrel</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="USOIL" href="#">USOIL</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:100</td>
                                        <td class="px-6 py-4 whitespace-nowrap">1000 * barrel</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="NATGAS" href="#">NATGAS</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:50</td>
                                        <td class="px-6 py-4 whitespace-nowrap">10000 * MMBtu</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="COPPER" href="#">COPPER</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:100</td>
                                        <td class="px-6 py-4 whitespace-nowrap">25000 * pound</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                    <tr class="hover:bg-gray-700 transition-colors duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-400 hover:text-blue-300" title="PLATINUM" href="#">PLATINUM</a></td>
                                        <td class="px-6 py-4 whitespace-nowrap">1:50</td>
                                        <td class="px-6 py-4 whitespace-nowrap">50 * troy ounce</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0.01</td>
                                        <td class="px-6 py-4 whitespace-nowrap">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Commodities Trading Features Section -->
        <section class="py-16 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-yellow-400 uppercase bg-yellow-900 bg-opacity-30 rounded-full">
                        Key Benefits
                    </div>
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Why Trade Commodities</span>
                    </h2>
                    <p class="mt-4 text-xl text-gray-300 max-w-3xl mx-auto">
                        Discover the advantages of trading global commodities on our platform
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                        <div class="w-12 h-12 bg-yellow-600 bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Portfolio Diversification</h3>
                        <p class="text-gray-300">Commodities often move independently of stocks and bonds, making them an effective way to diversify your portfolio and manage overall risk.</p>
                    </div>

                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                        <div class="w-12 h-12 bg-yellow-600 bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Leverage Your Exposure</h3>
                        <p class="text-gray-300">Trade commodities on margin to gain greater market exposure with a smaller capital outlay, while managing your risk with our advanced tools.</p>
                    </div>

                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm border border-gray-700 rounded-xl p-6 transform transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                        <div class="w-12 h-12 bg-yellow-600 bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Extended Trading Hours</h3>
                        <p class="text-gray-300">Access energy and metals markets for extended hours across different sessions, letting you respond to global supply and demand news as it happens.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trading Advantages Section -->
        <section class="py-16 bg-gradient-to-b from-gray-800 to-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl blur opacity-30"></div>
                        <div class="relative bg-gray-800 bg-opacity-80 backdrop-blur-sm rounded-xl p-6 overflow-hidden border border-gray-700">
                            <img src="{{ asset('primevestmarket/temp/custom/img/commission-scheme-crypt1t1.png') }}" alt="commission-scheme" class="w-full h-auto rounded-lg">

                            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/70 to-transparent flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-yellow-600 bg-opacity-30 mb-4">
                                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                    </div>
                                    <p class="text-white text-lg font-medium">View Market Analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-yellow-400 uppercase bg-yellow-900 bg-opacity-30 rounded-full">
                            Premium Trading Experience
                        </div>
                        <h2 class="text-3xl font-extrabold text-white sm:text-4xl mb-6">
                            <span class="block">Trade what you want,</span>
                            <span class="block">When you want</span>
                        </h2>

                        <p class="text-xl text-gray-300 mb-6">
                            Our relationships with leading tier one financial institutions mean deep liquidity and tighter spreads for commodities traders across energy, metals and agriculture.
                        </p>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                                </div>
                                <p class="ml-3 text-lg text-gray-300">
                                    Trade Forex, Indices, Shares &amp; Commodities
                                </p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                                </div>
                                <p class="ml-3 text-lg text-gray-300">
                                    Access global markets 24 hours / 7 days
                                </p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                                </div>
                                <p class="ml-3 text-lg text-gray-300">
                                    Multilingual customer support
                                </p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                                </div>
                                <p class="ml-3 text-lg text-gray-300">
                                    Trade on the go on our mobile apps
                                </p>
                            </li>
                        </ul>

                        <div class="mt-8">
                            <a href="{{ route('trading-conditions') }}" title="Learn About Trading Commissions" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition duration-300">
                        Trading Conditions
                        <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-yellow-500 to-orange-600">
                    <div class="relative px-6 py-12 sm:py-16 sm:px-12 lg:px-16">
                        <div class="md:ml-auto md:w-1/2 md:pl-10">
                            <div class="text-base max-w-prose mx-auto lg:max-w-none">
                                <span class="text-sm font-semibold text-white uppercase tracking-wider">Start Trading Today</span>
                                <h2 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">Ready to Trade Commodities?</h2>
                            </div>
                            <div class="mt-6 prose prose-indigo prose-lg text-white">
                                <p>Join thousands of traders worldwide who trade energy and metals on our platform. Get started with a free demo account or open a real trading account today.</p>
                            </div>
                            <div class="mt-8 flex space-x-4">
                                <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-orange-600 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                            Create Account
                        </a>
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-800 bg-opacity-60 hover:bg-opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                            Try Demo
                        </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
