@extends('layouts.dashboard')

@section('page-title', 'Stock Trading')
@section('breadcrumb', 'Trade stocks with real-time market data')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="border-l-4 border-green-600 shadow-md p-6 bg-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-600 flex items-center justify-center">
                    <span class="text-white font-bold text-lg" id="stockSymbol">{{ $stock['symbol'] }}</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900" id="stockName">{{ $stock['name'] }}</h1>
                    <p class="text-gray-500 mt-1">NASDAQ: <span id="stockSymbolDisplay">{{ $stock['symbol'] }}</span> • USA</p>
                </div>
            </div>
            <div class="bg-green-50 border border-green-200 px-5 py-2.5">
                <div class="text-right">
                    <span class="text-green-600 text-sm font-semibold">💰 Available Balance: $<span id="userBalance">{{ number_format($spendableBalance ?? Auth::user()->balance, 2) }}</span></span>
                    @if(($spendableBalance ?? Auth::user()->balance) != Auth::user()->balance)
                        <div class="text-xs text-gray-500 mt-1">
                            Main: ${{ number_format(Auth::user()->balance, 2) }} + Profits
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Chart Area -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-900"><span id="chartSymbol">{{ $stock['symbol'] }}</span> Stock Chart</h2>
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <!-- Timeframe Buttons -->
                            <div class="flex items-center gap-1">
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="1">1m</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="5">5m</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="15">15m</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="30">30m</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-green-600 text-white transition" data-interval="60">1h</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="D">1D</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="W">1W</button>
                                <button class="timeframe-btn px-2 py-1 text-xs bg-gray-100 text-gray-700 hover:bg-green-600 hover:text-white transition" data-interval="M">1M</button>
                            </div>
                            <select id="stockSelector" class="px-3 py-1 border border-gray-200 text-sm">
                                <option value="TSLA" {{ $stock['symbol'] == 'TSLA' ? 'selected' : '' }}>TSLA - Tesla</option>
                                <option value="AAPL" {{ $stock['symbol'] == 'AAPL' ? 'selected' : '' }}>AAPL - Apple</option>
                                <option value="MSFT" {{ $stock['symbol'] == 'MSFT' ? 'selected' : '' }}>MSFT - Microsoft</option>
                                <option value="GOOGL" {{ $stock['symbol'] == 'GOOGL' ? 'selected' : '' }}>GOOGL - Google</option>
                                <option value="AMZN" {{ $stock['symbol'] == 'AMZN' ? 'selected' : '' }}>AMZN - Amazon</option>
                                <option value="NVDA" {{ $stock['symbol'] == 'NVDA' ? 'selected' : '' }}>NVDA - NVIDIA</option>
                                <option value="META" {{ $stock['symbol'] == 'META' ? 'selected' : '' }}>META - Meta</option>
                                <option value="NFLX" {{ $stock['symbol'] == 'NFLX' ? 'selected' : '' }}>NFLX - Netflix</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <!-- TradingView Widget Container -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_chart" style="height: 550px; width: 100%;"></div>
                        <div class="tradingview-widget-copyright text-xs text-gray-400 text-center mt-2">
                            <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank" class="hover:text-green-600">Chart data by TradingView</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar - Stock Info & Trading -->
        <div class="space-y-6">
            <!-- Stock Information Card -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Stock Information</h2>
                </div>
                <div class="p-6 space-y-4" id="stockInfo">
                    <div class="flex justify-between pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Current Price</span>
                        <span class="font-bold text-green-600 text-xl" id="infoPrice">${{ number_format($stock['price'], 2) }}</span>
                    </div>
                    <div class="flex justify-between pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Open</span>
                        <span class="font-semibold text-gray-900" id="infoOpen">${{ number_format($stock['open'], 2) }}</span>
                    </div>
                    <div class="flex justify-between pb-3 border-b border-gray-100">
                        <span class="text-gray-600">High</span>
                        <span class="font-semibold text-gray-900" id="infoHigh">${{ number_format($stock['high'], 2) }}</span>
                    </div>
                    <div class="flex justify-between pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Low</span>
                        <span class="font-semibold text-gray-900" id="infoLow">${{ number_format($stock['low'], 2) }}</span>
                    </div>
                    <div class="flex justify-between pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Volume</span>
                        <span class="font-semibold text-gray-900" id="infoVolume">{{ $stock['volume'] }}M</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Market Cap</span>
                        <span class="font-semibold text-gray-900" id="infoMarketCap">{{ $stock['market_cap'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Trade Card -->
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900">Quick Trade</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <button id="buyBtn" class="py-2 bg-green-600 hover:bg-green-700 text-white font-semibold transition">Buy</button>
                        <button id="sellBtn" class="py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition">Sell</button>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Quantity (Shares)</label>
                        <input type="number" id="quantity" step="0.01" placeholder="Enter number of shares" class="w-full px-4 py-3 border-2 border-gray-200 focus:border-green-500">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Order Type</label>
                        <select id="orderType" class="w-full px-4 py-3 border-2 border-gray-200 focus:border-green-500">
                            <option value="market">Market Order</option>
                            <option value="limit">Limit Order</option>
                            <option value="stop">Stop Order</option>
                        </select>
                    </div>
                    
                    <div class="bg-gray-50 p-4 mb-4 border border-gray-200">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-gray-600">Estimated Cost</span>
                            <span class="font-bold text-gray-900" id="estimatedCost">$0.00</span>
                        </div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-gray-600">Main Balance</span>
                            <span class="font-bold text-blue-600">$<span id="mainBalance">{{ number_format(Auth::user()->balance, 2) }}</span></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Available (Inc. Profits)</span>
                            <span class="font-bold text-green-600">$<span id="balanceDisplay">{{ number_format($spendableBalance ?? Auth::user()->balance, 2) }}</span></span>
                        </div>
                    </div>

                    <!-- Warning message when using profits -->
                    <div id="profitWarning" class="hidden bg-yellow-50 border-l-4 border-yellow-400 p-3 mb-4">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 text-yellow-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <p class="text-xs text-yellow-700">This purchase will use funds from your profits since your main balance is insufficient.</p>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<!-- TradingView Script -->
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>

<script>
// Toast Notification System
class Toast {
    constructor() {
        this.container = document.getElementById('toastContainer');
        if (!this.container) {
            this.container = document.createElement('div');
            this.container.id = 'toastContainer';
            document.body.appendChild(this.container);
        }
    }
    
    show(message, type = 'success', duration = 4000) {
        const toast = document.createElement('div');
        const colors = { success: 'bg-green-600', error: 'bg-red-600', warning: 'bg-yellow-600', info: 'bg-blue-600' };
        const icons = { success: '✓', error: '✗', warning: '⚠', info: 'ℹ' };
        
        toast.className = `${colors[type]} text-white px-5 py-3 shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
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
let tvWidget = null;
let currentInterval = '60';
let currentStock = { 
    symbol: '{{ $stock['symbol'] }}', 
    price: parseFloat({{ $stock['price'] }}), 
    name: '{{ $stock['name'] }}' 
};
let spendableBalance = parseFloat({{ $spendableBalance ?? Auth::user()->balance }});
let mainBalance = parseFloat({{ Auth::user()->balance }});

// Function to fetch spendable balance from server
async function fetchSpendableBalance() {
    try {
        const response = await fetch('/user/balance');
        const data = await response.json();
        if (data.success) {
            spendableBalance = parseFloat(data.balance);
            document.getElementById('userBalance').innerText = spendableBalance.toFixed(2);
            document.getElementById('balanceDisplay').innerText = spendableBalance.toFixed(2);
            
            // Also update main balance if returned
            if (data.main_balance) {
                mainBalance = parseFloat(data.main_balance);
                document.getElementById('mainBalance').innerText = mainBalance.toFixed(2);
            }
            return spendableBalance;
        }
    } catch (error) {
        console.error('Error fetching balance:', error);
    }
    return spendableBalance;
}

// Initialize TradingView Widget
function initTradingView(symbol, interval) {
    const container = document.getElementById('tradingview_chart');
    if (!container) return;
    
    container.innerHTML = '';
    
    const intervalMap = { '1': '1', '5': '5', '15': '15', '30': '30', '60': '60', 'D': 'D', 'W': 'W', 'M': 'M' };
    const tvInterval = intervalMap[interval] || '60';
    
    tvWidget = new TradingView.widget({
        "width": "100%",
        "height": 550,
        "symbol": `NASDAQ:${symbol}`,
        "interval": tvInterval,
        "timezone": "Etc/UTC",
        "theme": "light",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "container_id": "tradingview_chart",
        "hide_top_toolbar": false,
        "hide_legend": false,
        "save_image": false,
        "studies": ["MASimple@tv-basicstudies", "RSI@tv-basicstudies", "MACD@tv-basicstudies"],
        "show_popup_button": true,
        "popup_width": "1000",
        "popup_height": "650",
        "loading_screen": { "backgroundColor": "#f7f9fc" }
    });
}

function updateChart(symbol) {
    if (tvWidget) {
        try {
            tvWidget.setSymbol(`NASDAQ:${symbol}`);
        } catch (e) {
            initTradingView(symbol, currentInterval);
        }
    } else {
        initTradingView(symbol, currentInterval);
    }
}

function updateInterval(interval) {
    currentInterval = interval;
    if (tvWidget) {
        try {
            const intervalMap = { '1': '1', '5': '5', '15': '15', '30': '30', '60': '60', 'D': 'D', 'W': 'W', 'M': 'M' };
            tvWidget.setInterval(intervalMap[interval]);
        } catch (e) {
            const symbol = document.getElementById('stockSelector')?.value || 'TSLA';
            initTradingView(symbol, interval);
        }
    }
}

// Timeframe buttons
document.querySelectorAll('.timeframe-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.timeframe-btn').forEach(b => {
            b.classList.remove('bg-green-600', 'text-white');
            b.classList.add('bg-gray-100', 'text-gray-700');
        });
        this.classList.remove('bg-gray-100', 'text-gray-700');
        this.classList.add('bg-green-600', 'text-white');
        
        const interval = this.getAttribute('data-interval');
        if (interval) updateInterval(interval);
    });
});

// Update estimated cost and show warning if using profits
function updateEstimatedCost() {
    const quantity = parseFloat(document.getElementById('quantity')?.value) || 0;
    const estimatedCost = quantity * currentStock.price;
    const estimatedSpan = document.getElementById('estimatedCost');
    const profitWarning = document.getElementById('profitWarning');
    
    if (estimatedSpan) {
        estimatedSpan.innerText = `$${estimatedCost.toFixed(2)}`;
        
        if (estimatedCost > spendableBalance) {
            estimatedSpan.classList.add('text-red-600');
            estimatedSpan.classList.remove('text-gray-900');
        } else {
            estimatedSpan.classList.remove('text-red-600');
            estimatedSpan.classList.add('text-gray-900');
        }
        
        // Show warning if estimated cost exceeds main balance (will use profits)
        if (profitWarning) {
            if (estimatedCost > mainBalance && estimatedCost <= spendableBalance && estimatedCost > 0) {
                profitWarning.classList.remove('hidden');
            } else {
                profitWarning.classList.add('hidden');
            }
        }
    }
}

document.getElementById('quantity')?.addEventListener('input', updateEstimatedCost);

// Stock selector
document.getElementById('stockSelector')?.addEventListener('change', async function() {
    const symbol = this.value;
    updateChart(symbol);
    
    try {
        const response = await fetch(`/stock/quote?symbol=${symbol}`);
        const data = await response.json();
        
        if (data.success) {
            currentStock = {
                symbol: data.stock.symbol,
                price: parseFloat(data.stock.price),
                name: data.stock.name,
                open: data.stock.open,
                high: data.stock.high,
                low: data.stock.low,
                volume: data.stock.volume,
                market_cap: data.stock.market_cap
            };
            document.getElementById('stockSymbol').innerText = currentStock.symbol;
            document.getElementById('stockName').innerText = currentStock.name;
            document.getElementById('stockSymbolDisplay').innerText = currentStock.symbol;
            document.getElementById('chartSymbol').innerText = currentStock.symbol;
            document.getElementById('infoPrice').innerHTML = `$${currentStock.price.toFixed(2)}`;
            document.getElementById('infoOpen').innerHTML = `$${currentStock.open.toFixed(2)}`;
            document.getElementById('infoHigh').innerHTML = `$${currentStock.high.toFixed(2)}`;
            document.getElementById('infoLow').innerHTML = `$${currentStock.low.toFixed(2)}`;
            document.getElementById('infoVolume').innerHTML = `${currentStock.volume}M`;
            document.getElementById('infoMarketCap').innerHTML = currentStock.market_cap;
            updateEstimatedCost();
        }
    } catch (error) {
        console.error('Error fetching stock data:', error);
    }
});

// Buy order - WITH SPENDABLE BALANCE
document.getElementById('buyBtn')?.addEventListener('click', async function() {
    const quantity = document.getElementById('quantity')?.value;
    if (!quantity || quantity <= 0) {
        toast.warning('Please enter a valid quantity');
        return;
    }
    
    const estimatedCost = parseFloat(quantity) * currentStock.price;
    if (estimatedCost > spendableBalance) {
        toast.error(`Insufficient funds! Required: $${estimatedCost.toFixed(2)}, Available: $${spendableBalance.toFixed(2)}`);
        return;
    }
    
    const orderType = document.getElementById('orderType')?.value;
    
    // Disable button to prevent double submission
    const buyBtn = document.getElementById('buyBtn');
    buyBtn.disabled = true;
    buyBtn.innerText = 'Processing...';
    
    try {
        const response = await fetch('{{ route("stock.buy") }}', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ 
                symbol: currentStock.symbol, 
                quantity: parseFloat(quantity), 
                order_type: orderType 
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            spendableBalance = parseFloat(data.new_spendable_balance || data.new_balance);
            mainBalance = parseFloat(data.new_balance);
            document.getElementById('userBalance').innerText = spendableBalance.toFixed(2);
            document.getElementById('balanceDisplay').innerText = spendableBalance.toFixed(2);
            document.getElementById('mainBalance').innerText = mainBalance.toFixed(2);
            
            let message = data.message;
            if (data.deducted_from_profits && data.deducted_from_profits > 0) {
                message += ` ($${data.deducted_from_profits.toFixed(2)} from profits)`;
            }
            toast.success(message);
            document.getElementById('quantity').value = '';
            updateEstimatedCost();
            
            // Reload page after 2 seconds to show updated portfolio
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            toast.error(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        toast.error('Transaction failed. Please try again.');
    } finally {
        buyBtn.disabled = false;
        buyBtn.innerText = 'Buy';
    }
});

// Sell order
document.getElementById('sellBtn')?.addEventListener('click', async function() {
    const quantity = document.getElementById('quantity')?.value;
    if (!quantity || quantity <= 0) {
        toast.warning('Please enter a valid quantity');
        return;
    }
    
    const orderType = document.getElementById('orderType')?.value;
    
    // Disable button to prevent double submission
    const sellBtn = document.getElementById('sellBtn');
    sellBtn.disabled = true;
    sellBtn.innerText = 'Processing...';
    
    try {
        const response = await fetch('{{ route("stock.sell") }}', {
            method: 'POST',
            headers: { 
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ 
                symbol: currentStock.symbol, 
                quantity: parseFloat(quantity), 
                order_type: orderType 
            })
        });
        
        const data = await response.json();
        
        if (data.success) {
            spendableBalance = parseFloat(data.new_spendable_balance || data.new_balance);
            mainBalance = parseFloat(data.new_balance);
            document.getElementById('userBalance').innerText = spendableBalance.toFixed(2);
            document.getElementById('balanceDisplay').innerText = spendableBalance.toFixed(2);
            document.getElementById('mainBalance').innerText = mainBalance.toFixed(2);
            toast.success(data.message);
            document.getElementById('quantity').value = '';
            updateEstimatedCost();
            
            // Reload page after 2 seconds to show updated portfolio
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            toast.error(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        toast.error('Transaction failed. Please try again.');
    } finally {
        sellBtn.disabled = false;
        sellBtn.innerText = 'Sell';
    }
});

// Initialize
document.addEventListener('DOMContentLoaded', async function() {
    await fetchSpendableBalance();
    const initialSymbol = document.getElementById('stockSelector')?.value || 'TSLA';
    initTradingView(initialSymbol, currentInterval);
    updateEstimatedCost();
});
</script>

<style>
    .bg-white, .border, button, a, .toast {
        border-radius: 0 !important;
    }
    * {
        border-radius: 0 !important;
    }
    input:focus, select:focus {
        outline: none;
    }
    .transition {
        transition: all 0.3s ease;
    }
</style>
@endsection