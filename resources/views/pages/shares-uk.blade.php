@extends('layouts.app')

@section('page-title', 'UK Stocks & Shares')
@section('meta-description', 'Trade top UK stocks including HSBC, BP, Unilever, GlaxoSmithKline, and more. Access the London Stock Exchange with competitive commissions and powerful trading platforms.')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-16 lg:py-24 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="none" stroke="white" stroke-width="0.5"/>
            <path d="M10,50 L30,30 L50,50 L70,30 L90,50" fill="none" stroke="white" stroke-width="1"/>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 pt-20">
                UK Stocks & Shares
            </h1>
            <p class="text-gray-300 text-lg lg:text-xl max-w-3xl mx-auto">
                Trade the UK's most valuable companies on the London Stock Exchange (LSE) with competitive commissions
            </p>
            <div class="mt-8">
                <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                    Start Trading UK Stocks
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- UK Market Indices Widget -->
<div class=" bg-gray-900">
    <div class="mx-auto ">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    {"proName": "FTSE:UKX", "title": "FTSE 100"},
                    {"proName": "LSE:HSBA", "title": "HSBC"},
                    {"proName": "LSE:BP", "title": "BP"},
                    {"proName": "LSE:ULVR", "title": "Unilever"},
                    {"proName": "LSE:GSK", "title": "GSK"},
                    {"proName": "LSE:SHEL", "title": "Shell"},
                    {"proName": "LSE:RIO", "title": "Rio Tinto"},
                    {"proName": "LSE:AZN", "title": "AstraZeneca"}
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": true,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
    </div>
</div>

<!-- Featured UK Stocks Section -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Most Traded UK Stocks
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Access the UK's most valuable companies with competitive pricing
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- HSBC Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/HSBC_Logo.svg" alt="HSBC" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">HSBC Holdings</h3>
                            <p class="text-gray-400 text-xs">HSBA | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+1.45%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£112B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">5.8%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">7.2</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade HSBA</a>
                </div>
            </div>
            
            <!-- BP Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/BP_Helios_logo.svg" alt="BP" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">BP p.l.c.</h3>
                            <p class="text-gray-400 text-xs">BP | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+0.87%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£88B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">4.9%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">8.5</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade BP</a>
                </div>
            </div>
            
            <!-- Unilever Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Unilever_logo.svg" alt="Unilever" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">Unilever plc</h3>
                            <p class="text-gray-400 text-xs">ULVR | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+0.34%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£94B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">3.2%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">19.6</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade ULVR</a>
                </div>
            </div>
            
            <!-- Shell Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Shell_logo.svg" alt="Shell" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">Shell plc</h3>
                            <p class="text-gray-400 text-xs">SHEL | LSE</p>
                        </div>
                    </div>
                    <span class="text-red-400 text-sm font-semibold">-0.67%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£190B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">3.6%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">6.8</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade SHEL</a>
                </div>
            </div>
        </div>
        
        <!-- Second Row of Featured Stocks -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <!-- AstraZeneca Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/AstraZeneca_logo.svg" alt="AstraZeneca" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">AstraZeneca</h3>
                            <p class="text-gray-400 text-xs">AZN | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+1.23%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£170B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">2.1%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">32.4</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade AZN</a>
                </div>
            </div>
            
            <!-- Rio Tinto Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Rio_Tinto_logo.svg" alt="Rio Tinto" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">Rio Tinto</h3>
                            <p class="text-gray-400 text-xs">RIO | LSE</p>
                        </div>
                    </div>
                    <span class="text-red-400 text-sm font-semibold">-0.45%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£96B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">6.5%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">7.8</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade RIO</a>
                </div>
            </div>
            
            <!-- GSK Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/GSK_Logo.svg" alt="GSK" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">GSK plc</h3>
                            <p class="text-gray-400 text-xs">GSK | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+0.56%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£55B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">4.1%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">10.5</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade GSK</a>
                </div>
            </div>
            
            <!-- British American Tobacco Stock Card -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/06/British_American_Tobacco_logo.svg" alt="BAT" class="w-10 h-10">
                        <div>
                            <h3 class="text-white font-bold">British American Tobacco</h3>
                            <p class="text-gray-400 text-xs">BATS | LSE</p>
                        </div>
                    </div>
                    <span class="text-green-400 text-sm font-semibold">+0.23%</span>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Market Cap</span>
                        <span class="text-gray-800 font-semibold">£62B</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-sm">Dividend Yield</span>
                        <span class="text-gray-800 font-semibold">8.2%</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-500 text-sm">P/E Ratio</span>
                        <span class="text-gray-800 font-semibold">6.5</span>
                    </div>
                    <a href="/register" class="block text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">Trade BATS</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- UK Stocks Complete Table -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-white">Top UK Stocks Available for Trading</h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Company</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Symbol</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Exchange</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Commission</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Min Spread</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Trading Hours</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/HSBC_Logo.svg" alt="HSBC" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">HSBC Holdings</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">HSBA</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/BP_Helios_logo.svg" alt="BP" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">BP p.l.c.</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">BP</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Unilever_logo.svg" alt="Unilever" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">Unilever plc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">ULVR</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Shell_logo.svg" alt="Shell" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">Shell plc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">SHEL</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/14/AstraZeneca_logo.svg" alt="AstraZeneca" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">AstraZeneca</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">AZN</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                         </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Rio_Tinto_logo.svg" alt="Rio Tinto" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">Rio Tinto</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">RIO</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                         </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/GSK_Logo.svg" alt="GSK" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">GSK plc</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">GSK</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
                         </tr>
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/25/British_American_Tobacco.svg" alt="BAT" class="w-6 h-6">
                                    <span class="font-bold text-gray-800">British American Tobacco</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-mono text-gray-600">BATS</td>
                            <td class="px-6 py-4 text-sm text-gray-600">LSE</td>
                            <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">£0</td>
                            <td class="px-6 py-4 text-right text-sm text-gray-600">0.05%</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500">08:00-16:30 GMT</td>
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
                        <strong>Trading Information:</strong> UK stock market hours are Monday to Friday, 08:00 - 16:30 GMT. 
                        FTSE 100 index hours are 08:00 - 16:30 GMT. Zero commission on UK stocks with no hidden fees.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- UK Market Sectors -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Key UK Market Sectors
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Diversify your portfolio across all major UK industries
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Banking & Financials -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Banking</h3>
            </div>
            
            <!-- Energy -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Energy</h3>
            </div>
            
            <!-- Consumer Goods -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Consumer Goods</h3>
            </div>
            
            <!-- Healthcare -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Healthcare</h3>
            </div>
            
            <!-- Mining -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Mining</h3>
            </div>
            
            <!-- Telecommunications -->
            <div class="bg-white rounded-xl p-4 text-center hover:shadow-lg transition-all duration-300">
                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 text-sm">Telecom</h3>
            </div>
        </div>
    </div>
</div>

<!-- FTSE 100 Index Info -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    About the FTSE 100 Index
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    The FTSE 100 Index (Financial Times Stock Exchange 100 Index) is a share index of the 100 companies 
                    listed on the London Stock Exchange with the highest market capitalization. It is one of the most 
                    widely used stock market indices and is seen as a barometer of the UK economy.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-600">Launched on January 3, 1984</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-600">Reviewed quarterly (March, June, September, December)</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-600">Market cap weighted index</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="text-gray-600">Represents approximately 80% of the UK's market capitalization</span>
                    </li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 text-center">
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js" async>
                    {
                        "symbol": "FTSE:UKX",
                        "width": "100%",
                        "locale": "en",
                        "colorTheme": "light",
                        "isTransparent": false
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Why Trade UK Stocks Section -->
<div class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade UK Stocks with PrimeVest?
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Experience unparalleled access to the UK's premier stock market
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Reason 1 -->
            <div class="text-center p-6 bg-white rounded-2xl shadow-sm">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">£0 Commission</h3>
                <p class="text-gray-500 text-sm">Trade UK stocks with zero commission and no hidden fees</p>
            </div>
            
            <!-- Reason 2 -->
            <div class="text-center p-6 bg-white rounded-2xl shadow-sm">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Fractional Shares</h3>
                <p class="text-gray-500 text-sm">Invest from as little as £10 with fractional share trading</p>
            </div>
            
            <!-- Reason 3 -->
            <div class="text-center p-6 bg-white rounded-2xl shadow-sm">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Fast Execution</h3>
                <p class="text-gray-500 text-sm">Lightning-fast order execution in milliseconds</p>
            </div>
            
            <!-- Reason 4 -->
            <div class="text-center p-6 bg-white rounded-2xl shadow-sm">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Regulated Broker</h3>
                <p class="text-gray-500 text-sm">Fully regulated with client fund protection up to £85,000</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 lg:py-20 bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
            Ready to Trade UK Stocks?
        </h2>
        <p class="text-gray-300 text-lg mb-8">
            Open your account today and start investing in the UK's leading companies
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