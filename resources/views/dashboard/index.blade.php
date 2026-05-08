@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 
    <!-- Stats Cards - Premium Red Gradient Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-7 mt-10">

    <!-- MAIN BALANCE -->
    <div class="relative overflow-hidden rounded-[28px] border border-white/10 bg-[#111111] shadow-[0_10px_30px_rgba(0,0,0,0.35)] transition duration-300 hover:-translate-y-1">

        <!-- Top Accent -->
        <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-[#7f1d1d] via-red-600 to-[#450a0a]"></div>

        <div class="p-7">

            <!-- Header -->
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-zinc-400 font-medium">
                        Main Balance
                    </p>

                    <h2 class="mt-5 text-[42px] leading-none font-semibold text-white">
                        ${{ number_format($user->balance, 2) }}
                    </h2>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-600/10 border border-red-500/20">
                    <svg class="h-6 w-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                            d="M3 10h18M7 15h2m4 0h4M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                    </svg>
                </div>
            </div>

            <!-- Divider -->
            <div class="mt-8 border-t border-white/5"></div>

            <!-- Footer -->
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Account Holder
                    </p>

                    <p class="mt-2 text-sm font-medium tracking-wide text-white">
                        {{ strtoupper($user->name) }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Account Type
                    </p>

                    <p class="mt-2 text-sm font-medium text-white">
                        Premium
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- PROFITS -->
    <div class="relative overflow-hidden rounded-[28px] border border-white/10 bg-[#111111] shadow-[0_10px_30px_rgba(0,0,0,0.35)] transition duration-300 hover:-translate-y-1">

        <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-emerald-800 via-emerald-500 to-emerald-900"></div>

        <div class="p-7">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-zinc-400 font-medium">
                        Total Profits
                    </p>

                    <h2 class="mt-5 text-[42px] leading-none font-semibold text-white">
                        ${{ number_format($profits, 2) }}
                    </h2>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-600/10 border border-emerald-500/20">
                    <svg class="h-6 w-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                            d="M13 7h8m0 0v8m0-8L10 18l-4-4-6 6"/>
                    </svg>
                </div>
            </div>

            <div class="mt-8 border-t border-white/5"></div>

            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Investor
                    </p>

                    <p class="mt-2 text-sm font-medium tracking-wide text-white">
                        {{ strtoupper($user->name) }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Performance
                    </p>

                    <p class="mt-2 text-sm font-medium text-emerald-500">
                        Positive
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- LAST DEPOSIT -->
    <div class="relative overflow-hidden rounded-[28px] border border-white/10 bg-[#111111] shadow-[0_10px_30px_rgba(0,0,0,0.35)] transition duration-300 hover:-translate-y-1">

        <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-amber-700 via-amber-400 to-amber-800"></div>

        <div class="p-7">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-zinc-400 font-medium">
                        Last Deposit
                    </p>

                    <h2 class="mt-5 text-[42px] leading-none font-semibold text-white">
                        ${{ number_format($lastDepositAmount ?? 0, 2) }}
                    </h2>
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-500/10 border border-amber-500/20">
                    <svg class="h-6 w-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                            d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
            </div>

            <div class="mt-8 border-t border-white/5"></div>

            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Depositor
                    </p>

                    <p class="mt-2 text-sm font-medium tracking-wide text-white">
                        {{ strtoupper($user->name) }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Status
                    </p>

                    <p class="mt-2 text-sm font-medium text-white">
                        Successful
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- LAST WITHDRAWAL -->
    <div class="relative overflow-hidden rounded-[28px] border border-white/10 bg-[#111111] shadow-[0_10px_30px_rgba(0,0,0,0.35)] transition duration-300 hover:-translate-y-1">

        <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-[#7f1d1d] via-rose-500 to-[#881337]"></div>

        <div class="p-7">

            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-zinc-400 font-medium">
                        Last Withdrawal
                    </p>

                    <h2 class="mt-5 text-[42px] leading-none font-semibold text-white">
                        ${{ number_format($lastWithdrawalAmount ?? 0, 2) }}
                    </h2>

                    @if(isset($lastWithdrawalDate))
                        <p class="mt-3 text-sm text-zinc-500">
                            {{ $lastWithdrawalDate }}
                        </p>
                    @endif
                </div>

                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-500/10 border border-rose-500/20">
                    <svg class="h-6 w-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                            d="M17 17H7m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
            </div>

            <div class="mt-8 border-t border-white/5"></div>

            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Beneficiary
                    </p>

                    <p class="mt-2 text-sm font-medium tracking-wide text-white">
                        {{ strtoupper($user->name) }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-[10px] uppercase tracking-[0.2em] text-zinc-500">
                        Status
                    </p>

                    <p class="mt-2 text-sm font-medium text-white">
                        Completed
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

    <!-- TradingView Widgets Container -->
    <div>
        <div class="tradingview-widget-container" style="height:45px;">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/?utm_campaign=ticker-tape-logo&utm_medium=widget&utm_source=bitxprofits.net" rel="noopener noreferrer" target="_blank">
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    { "proName": "BITSTAMP:BTCUSD", "title": "Bitcoin" },
                    { "proName": "BITSTAMP:ETHUSD", "title": "Ethereum" },
                    { "proName": "BINANCE:SOLUSD", "title": "Solana" },
                    { "proName": "FX:EURUSD", "title": "EUR/USD" },
                    { "proName": "TVC:GOLD", "title": "Gold" },
                    { "proName": "NASDAQ:NDX", "title": "Nasdaq 100" }
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
    </div>

    <!-- News & Chart Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- TradingView News Widget -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white">Market News & Analysis</h2>
                        <p class="text-sm text-red-200">Real-time financial news from TradingView</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-xs text-red-200">Live Updates</span>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js" async>
                    {
                        "feedMode": "market",
                        "market": "forex",
                        "colorTheme": "light",
                        "isTransparent": false,
                        "displayMode": "regular",
                        "width": "100%",
                        "height": 400,
                        "locale": "en"
                    }
                    </script>
                </div>
            </div>
        </div>

        <!-- Live Trading Chart -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-white">Live Trading Chart</h2>
                        <p class="text-sm text-red-200">Real-time market data</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="changeSymbol('FX:EURUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">EUR/USD</button>
                        <button onclick="changeSymbol('FX:GBPUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">GBP/USD</button>
                        <button onclick="changeSymbol('BITSTAMP:BTCUSD')" class="px-3 py-1 text-xs bg-white/20 text-white rounded hover:bg-white/30 transition">BTC/USD</button>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <div class="tradingview-widget-container">
                    <div id="tradingview_chart" style="height: 500px; width: 100%;"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        let widget = null;
                        
                        function loadWidget(symbol) {
                            if (widget) {
                                const container = document.getElementById('tradingview_chart');
                                if (container) container.innerHTML = '';
                            }
                            widget = new TradingView.widget({
                                "width": "100%",
                                "height": 500,
                                "symbol": symbol,
                                "interval": "60",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_chart"
                            });
                        }
                        
                        function changeSymbol(symbol) {
                            loadWidget(symbol);
                        }
                        
                        document.addEventListener('DOMContentLoaded', function() {
                            loadWidget('FX:EURUSD');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History -->
    <div class="bg-white rounded-2xl my-10 shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Transaction History</h2>
                    <p class="text-sm text-red-200">All your deposits, withdrawals, and earnings</p>
                </div>
                <a href="{{ route('deposits-history') }}" class="text-red-200 hover:text-white text-sm font-semibold transition">View All →</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reference</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions ?? [] as $index => $transaction)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction['date'] ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if(($transaction['type'] ?? '') == 'deposit')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Deposit
                                </span>
                            @elseif(($transaction['type'] ?? '') == 'withdrawal')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                    Withdrawal
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    Profit
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-semibold {{ (($transaction['type'] ?? '') == 'withdrawal') ? 'text-red-600' : 'text-green-600' }}">
                            {{ (($transaction['type'] ?? '') == 'withdrawal') ? '-' : '+' }}${{ number_format($transaction['amount'] ?? 0, 2) }}
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1"></span>
                                Completed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $transaction['ref'] ?? 'N/A' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p class="text-sm font-medium">No transactions yet</p>
                            <p class="text-xs mt-1">Your transaction history will appear here</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <div class="tradingview-widget-container" style="height:45px;">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <a href="https://www.tradingview.com/?utm_campaign=ticker-tape-logo&utm_medium=widget&utm_source=bitxprofits.net" rel="noopener noreferrer" target="_blank">
                </a>
            </div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                { "proName": "BITSTAMP:BTCUSD", "title": "Bitcoin" },
                { "proName": "BITSTAMP:ETHUSD", "title": "Ethereum" },
                { "proName": "BINANCE:SOLUSD", "title": "Solana" },
                { "proName": "FX:EURUSD", "title": "EUR/USD" },
                { "proName": "TVC:GOLD", "title": "Gold" },
                { "proName": "NASDAQ:NDX", "title": "Nasdaq 100" }
                ],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": false,
                "displayMode": "adaptive",
                "locale": "en"
            }
            </script>
        </div>
    </div>
</div>

<style>
    @keyframes ping {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .animate-ping {
        animation: ping 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection