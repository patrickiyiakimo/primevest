@extends('layouts.dashboard')

@section('page-title', 'Stock Trading')
@section('breadcrumb', 'Trade stocks with real-time market data')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">
                            <!-- This should show the stock symbol i am currently viewing -->
                             <!-- eg stock-trading?symbol=AMZN -->
                            {{ request()->get('symbol') ?? 'TSLA' }}

                        </span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">
                            {{ request()->get('symbol') ? strtoupper(request()->get('symbol')) : 'Tesla, Inc.' }}
                        </h1>
                        <p class="text-gray-300 mt-1">NASDAQ: {{ request()->get('symbol') ?? 'TSLA' }} • USA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
        <!-- Main Chart Area -->
        <div class="lg:col-span-2 space-y-6">
            <!-- TradingView Chart -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-900">TSLA Stock Chart</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200 transition">1D</button>
                            <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200 transition">1W</button>
                            <button class="px-3 py-1 text-xs bg-green-600 text-white rounded-lg hover:bg-green-700 transition">1M</button>
                            <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200 transition">3M</button>
                            <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200 transition">1Y</button>
                            <button class="px-3 py-1 text-xs bg-gray-100 rounded-lg hover:bg-gray-200 transition">ALL</button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <!-- TradingView Widget -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_chart" style="height: 500px; width: 100%;"></div>
                        <div class="tradingview-widget-copyright text-xs text-gray-400 text-center mt-2">
                            <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank" class="hover:text-green-600">Track all markets on TradingView</a>
                        </div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "width": "100%",
                                "height": 500,
                                "symbol": "NASDAQ:TSLA",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_chart"
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar - Stock Info & Trading -->
        <!-- <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Stock Information</h2>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Open</span>
                        <span class="font-semibold text-gray-900">$242.50</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">High</span>
                        <span class="font-semibold text-gray-900">$249.80</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Low</span>
                        <span class="font-semibold text-gray-900">$241.20</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Previous Close</span>
                        <span class="font-semibold text-gray-900">$242.80</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Volume</span>
                        <span class="font-semibold text-gray-900">45.2M</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Market Cap</span>
                        <span class="font-semibold text-gray-900">$789.4B</span>
                    </div>
                </div>
            </div> -->

            <!-- Quick Trade Card -->
            <!-- <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Quick Trade</h2>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <button class="py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-300">
                            Buy
                        </button>
                        <button class="py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300">
                            Sell
                        </button>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Quantity</label>
                        <input type="number" placeholder="Enter shares" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Order Type</label>
                        <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option>Market Order</option>
                            <option>Limit Order</option>
                            <option>Stop Order</option>
                        </select>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-gray-600">Estimated Cost</span>
                            <span class="font-bold text-gray-900">$0.00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Available Balance</span>
                            <span class="font-bold text-green-600">${{ number_format(Auth::user()->balance, 2) }}</span>
                        </div>
                    </div>
                    
                    <button class="w-full py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl transition-all duration-300">
                        Place Order
                    </button>
                </div>
            </div> -->

            <!-- Company Info Card -->
            <!-- <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">About Tesla</h2>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Tesla, Inc. designs, develops, manufactures, and sells electric vehicles, 
                        energy generation and storage systems in the United States, China, and internationally. 
                        The company operates in two segments, Automotive and Energy Generation and Storage.
                    </p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">Electric Vehicles</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">Clean Energy</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">NASDAQ 100</span>
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">S&P 500</span>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<script>
    // Toast Notification System
    class Toast {
        constructor() {
            this.container = document.getElementById('toastContainer');
        }
        
        show(message, type = 'success', duration = 4000) {
            const toast = document.createElement('div');
            const colors = {
                success: 'bg-green-600',
                error: 'bg-red-600',
                warning: 'bg-yellow-600',
                info: 'bg-blue-600'
            };
            const icons = {
                success: '✓',
                error: '✗',
                warning: '⚠',
                info: 'ℹ'
            };
            
            toast.className = `${colors[type]} text-white px-5 py-3 rounded-xl shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 4000) { this.show(message, 'success', duration); }
        error(message, duration = 4000) { this.show(message, 'error', duration); }
        warning(message, duration = 4000) { this.show(message, 'warning', duration); }
        info(message, duration = 4000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    
    // Chart timeframe buttons
    document.querySelectorAll('.px-3.py-1.text-xs').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.px-3.py-1.text-xs').forEach(b => {
                b.classList.remove('bg-green-600', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-green-600', 'text-white');
            toast.info(`Chart timeframe changed to ${this.innerText}`);
        });
    });
    
    // Buy/Sell buttons
    document.querySelectorAll('.grid.grid-cols-2.gap-3 button').forEach(btn => {
        btn.addEventListener('click', function() {
            toast.success(`${this.innerText} order would be placed here`);
        });
    });
    
    // Place Order button
    document.querySelector('.w-full.py-3.bg-gradient-to-r')?.addEventListener('click', function() {
        toast.warning('Trading functionality coming soon!');
    });
</script>

<style>
    .tradingview-widget-container {
        position: relative;
    }
</style>
@endsection