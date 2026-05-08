@extends('layouts.dashboard')

@section('page-title', 'Dashboard Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
<div class="space-y-6">
 
    <!-- Stats Cards - Premium Red Gradient Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">

    <!-- MAIN BALANCE -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#3b0000] via-[#8b0000] to-[#1a0000] p-[1px] shadow-[0_10px_40px_rgba(139,0,0,0.35)] group hover:scale-[1.02] transition duration-500">
        <div class="relative h-full rounded-3xl bg-gradient-to-br from-[#1a1a1a]/95 to-[#2b0000]/95 backdrop-blur-xl overflow-hidden">

            <!-- Glow -->
            <div class="absolute -top-20 -right-20 w-56 h-56 bg-red-500/20 blur-3xl rounded-full"></div>

            <!-- Grid Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff_1px,transparent_1px),linear-gradient(to_bottom,#ffffff_1px,transparent_1px)] bg-[size:40px_40px]"></div>
            </div>

            <!-- Top -->
            <div class="relative flex items-start justify-between p-7">
                <div>
                    <p class="text-red-200/70 uppercase text-xs tracking-[0.3em] font-medium">
                        Main Balance
                    </p>

                    <h1 class="mt-4 text-4xl font-bold text-white tracking-tight">
                        ${{ number_format($user->balance, 2) }}
                    </h1>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-400 to-red-700 flex items-center justify-center shadow-lg shadow-red-900/40">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 10h18M7 15h2m4 0h4M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z"/>
                    </svg>
                </div>
            </div>

            <!-- Middle -->
            <div class="px-7">
                <div class="flex items-center gap-3">
                    <div class="h-2 w-2 rounded-full bg-red-400 animate-pulse"></div>
                    <span class="text-sm text-red-100/70">
                        Premium Investment Account
                    </span>
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-white/10 pt-6">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Account Holder
                        </p>
                        <p class="mt-1 text-white font-semibold tracking-wide">
                            {{ strtoupper($user->name) }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Status
                        </p>
                        <p class="mt-1 text-emerald-400 font-semibold">
                            Active
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Accent -->
            <div class="mt-8 h-1 w-full bg-gradient-to-r from-red-700 via-red-400 to-red-700"></div>
        </div>
    </div>



    <!-- PROFITS -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#5a0000] via-[#b91c1c] to-[#240000] p-[1px] shadow-[0_10px_40px_rgba(220,38,38,0.35)] group hover:scale-[1.02] transition duration-500">
        <div class="relative h-full rounded-3xl bg-gradient-to-br from-[#1b1b1b]/95 to-[#2d0000]/95 overflow-hidden">

            <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-red-500/20 blur-3xl rounded-full"></div>

            <!-- Chart Lines -->
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" viewBox="0 0 100 100">
                    <path d="M0 80 L20 60 L40 68 L60 38 L80 50 L100 20"
                        stroke="white"
                        stroke-width="1.5"
                        fill="none"/>
                </svg>
            </div>

            <div class="relative flex items-start justify-between p-7">
                <div>
                    <p class="text-red-200/70 uppercase text-xs tracking-[0.3em] font-medium">
                        Total Profits
                    </p>

                    <h1 class="mt-4 text-4xl font-bold text-white tracking-tight">
                        ${{ number_format($profits, 2) }}
                    </h1>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-700 flex items-center justify-center shadow-lg shadow-emerald-900/40">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M13 7h8m0 0v8m0-8L10 18l-4-4-6 6"/>
                    </svg>
                </div>
            </div>

            <div class="px-7">
                <div class="flex items-center gap-3">
                    <div class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></div>
                    <span class="text-sm text-red-100/70">
                        Portfolio Performing Strongly
                    </span>
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-white/10 pt-6">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Investor
                        </p>
                        <p class="mt-1 text-white font-semibold tracking-wide">
                            {{ strtoupper($user->name) }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Growth
                        </p>
                        <p class="mt-1 text-emerald-400 font-semibold">
                            +18.4%
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 h-1 w-full bg-gradient-to-r from-emerald-700 via-emerald-400 to-emerald-700"></div>
        </div>
    </div>



    <!-- LAST DEPOSIT -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#2a0000] via-[#991b1b] to-[#140000] p-[1px] shadow-[0_10px_40px_rgba(239,68,68,0.30)] group hover:scale-[1.02] transition duration-500">
        <div class="relative h-full rounded-3xl bg-gradient-to-br from-[#181818]/95 to-[#290000]/95 overflow-hidden">

            <div class="absolute top-0 right-0 w-64 h-64 bg-red-500/10 blur-3xl rounded-full"></div>

            <div class="relative flex items-start justify-between p-7">
                <div>
                    <p class="text-red-200/70 uppercase text-xs tracking-[0.3em] font-medium">
                        Last Deposit
                    </p>

                    <h1 class="mt-4 text-4xl font-bold text-white tracking-tight">
                        ${{ number_format($lastDepositAmount ?? 0, 2) }}
                    </h1>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-300 to-yellow-600 flex items-center justify-center shadow-lg shadow-yellow-900/40">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
            </div>

            <div class="px-7">
                <div class="flex items-center gap-3">
                    <div class="h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></div>
                    <span class="text-sm text-red-100/70">
                        Funds Added Successfully
                    </span>
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-white/10 pt-6">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Depositor
                        </p>
                        <p class="mt-1 text-white font-semibold tracking-wide">
                            {{ strtoupper($user->name) }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Method
                        </p>
                        <p class="mt-1 text-white font-semibold">
                            Bank Transfer
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 h-1 w-full bg-gradient-to-r from-yellow-700 via-yellow-400 to-yellow-700"></div>
        </div>
    </div>



    <!-- LAST WITHDRAWAL -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#400000] via-[#dc2626] to-[#180000] p-[1px] shadow-[0_10px_40px_rgba(220,38,38,0.30)] group hover:scale-[1.02] transition duration-500">
        <div class="relative h-full rounded-3xl bg-gradient-to-br from-[#181818]/95 to-[#240000]/95 overflow-hidden">

            <div class="absolute bottom-0 left-0 w-64 h-64 bg-red-600/10 blur-3xl rounded-full"></div>

            <div class="relative flex items-start justify-between p-7">
                <div>
                    <p class="text-red-200/70 uppercase text-xs tracking-[0.3em] font-medium">
                        Last Withdrawal
                    </p>

                    <h1 class="mt-4 text-4xl font-bold text-white tracking-tight">
                        ${{ number_format($lastWithdrawalAmount ?? 0, 2) }}
                    </h1>

                    @if(isset($lastWithdrawalDate))
                        <p class="mt-2 text-sm text-red-200/60">
                            {{ $lastWithdrawalDate }}
                        </p>
                    @endif
                </div>

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-400 to-rose-700 flex items-center justify-center shadow-lg shadow-rose-900/40">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M17 17H7m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
            </div>

            <div class="px-7">
                <div class="flex items-center gap-3">
                    <div class="h-2 w-2 rounded-full bg-rose-400 animate-pulse"></div>
                    <span class="text-sm text-red-100/70">
                        Withdrawal Processed
                    </span>
                </div>

                <div class="mt-8 flex items-center justify-between border-t border-white/10 pt-6">
                    <div>
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Beneficiary
                        </p>
                        <p class="mt-1 text-white font-semibold tracking-wide">
                            {{ strtoupper($user->name) }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-red-200/60">
                            Status
                        </p>
                        <p class="mt-1 text-emerald-400 font-semibold">
                            Completed
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 h-1 w-full bg-gradient-to-r from-rose-700 via-rose-400 to-rose-700"></div>
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