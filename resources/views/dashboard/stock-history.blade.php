@extends('layouts.dashboard')

@section('page-title', 'Stock Trading History')
@section('breadcrumb', 'View your stock transactions and portfolio')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Portfolio Summary -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white border-l-4 border-green-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total Invested</p>
            <p class="text-2xl font-bold text-gray-900">${{ number_format($totalInvested ?? 0, 2) }}</p>
        </div>
        
        <div class="bg-white border-l-4 border-blue-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Current Value</p>
            <p class="text-2xl font-bold text-blue-600">${{ number_format($totalCurrentValue ?? 0, 2) }}</p>
        </div>
        
        <div class="bg-white border-l-4 border-purple-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total P/L</p>
            @php
                $totalPL = $totalProfitLoss ?? 0;
                $totalPLPercentage = ($totalInvested ?? 0) > 0 ? ($totalPL / ($totalInvested ?? 1)) * 100 : 0;
            @endphp
            <p class="text-2xl font-bold {{ $totalPL >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $totalPL >= 0 ? '+' : '' }}${{ number_format($totalPL, 2) }}
                <span class="text-sm ml-2">
                    ({{ $totalPLPercentage >= 0 ? '+' : '' }}{{ number_format($totalPLPercentage, 2) }}%)
                </span>
            </p>
        </div>
        
        <div class="bg-white border-l-4 border-yellow-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Holdings</p>
            <p class="text-2xl font-bold text-yellow-600">{{ is_array($portfolioData) ? count($portfolioData) : 0 }}</p>
        </div>
    </div>

    <!-- Current Portfolio -->
    @if(is_array($portfolioData) && count($portfolioData) > 0)
    <div class="bg-white border border-gray-200 shadow-sm">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-900">Your Portfolio</h2>
            <p class="text-xs text-gray-500 mt-1">Real-time values based on current market prices</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Symbol</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Company</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Quantity</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Avg Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Current Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Current Value</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">P/L</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Return %</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($portfolioData as $holding)
                    @php
                        $plValue = $holding['profit_loss'] ?? 0;
                        $plPercentage = $holding['profit_loss_percent'] ?? 0;
                        $priceChangePercent = $holding['price_change_percent'] ?? 0;
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-bold text-gray-900">{{ $holding['symbol'] }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $holding['company_name'] }}</td>
                        <td class="px-4 py-3 text-right text-gray-900">{{ number_format($holding['quantity'], 4) }}</td>
                        <td class="px-4 py-3 text-right text-gray-900">${{ number_format($holding['average_price'], 2) }}</td>
                        <td class="px-4 py-3 text-right">
                            <span class="font-semibold text-green-600">${{ number_format($holding['current_price'], 2) }}</span>
                            <br>
                            <span class="text-xs {{ $priceChangePercent >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                {{ $priceChangePercent >= 0 ? '↑' : '↓' }} {{ number_format(abs($priceChangePercent), 2) }}%
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right font-semibold text-blue-600">${{ number_format($holding['current_value'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-semibold {{ $plValue >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $plValue >= 0 ? '+' : '' }}${{ number_format($plValue, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <span class="font-semibold {{ $plPercentage >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $plPercentage >= 0 ? '+' : '' }}{{ number_format($plPercentage, 2) }}%
                            </span>
                            <div class="w-full bg-gray-200 h-1 mt-1">
                                @php
                                    $barWidth = min(abs($plPercentage), 20);
                                    $barColor = $plPercentage >= 0 ? 'bg-green-500' : 'bg-red-500';
                                @endphp
                                <div class="{{ $barColor }} h-1" style="width: {{ $barWidth }}%"></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100 border-t border-gray-200">
                    @php
                        $totalPortfolioPL = $totalProfitLoss ?? 0;
                        $totalPortfolioPLPercent = ($totalInvested ?? 0) > 0 ? ($totalPortfolioPL / ($totalInvested ?? 1)) * 100 : 0;
                    @endphp
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-right font-bold text-gray-900">Portfolio Totals:</td>
                        <td class="px-4 py-3 text-right font-bold text-blue-600">${{ number_format($totalCurrentValue ?? 0, 2) }}</td>
                        <td class="px-4 py-3 text-right font-bold {{ $totalPortfolioPL >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $totalPortfolioPL >= 0 ? '+' : '' }}${{ number_format($totalPortfolioPL, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right font-bold {{ $totalPortfolioPLPercent >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $totalPortfolioPLPercent >= 0 ? '+' : '' }}{{ number_format($totalPortfolioPLPercent, 2) }}%
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @else
    <div class="bg-white border border-gray-200 text-center py-12">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        <p class="text-gray-500">You don't have any stocks in your portfolio yet.</p>
        <a href="{{ route('stock-trading') }}" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white hover:bg-green-700 transition">Start Trading</a>
    </div>
    @endif

    <!-- Transaction History -->
    <div class="bg-white border border-gray-200 shadow-sm">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-900">Transaction History</h2>
            <p class="text-xs text-gray-500 mt-1">Complete record of your buy and sell orders</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date & Time</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Symbol</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Company</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Quantity</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Price/Share</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Total</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Order Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($transactions as $transaction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $transaction->created_at->format('M d, Y H:i:s') }}</td>
                        <td class="px-4 py-3">
                            @if($transaction->type == 'buy')
                                <span class="inline-flex px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">BUY</span>
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold bg-red-100 text-red-700">SELL</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 font-bold text-gray-900">{{ $transaction->symbol }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $transaction->company_name }}</td>
                        <td class="px-4 py-3 text-right text-sm text-gray-900">{{ number_format($transaction->quantity, 4) }}</td>
                        <td class="px-4 py-3 text-right text-sm text-gray-900">${{ number_format($transaction->price_per_share, 2) }}</td>
                        <td class="px-4 py-3 text-right text-sm font-semibold {{ $transaction->type == 'buy' ? 'text-red-600' : 'text-green-600' }}">
                            {{ $transaction->type == 'buy' ? '-' : '+' }}${{ number_format($transaction->total_amount, 2) }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-500 capitalize">{{ $transaction->order_type }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">Completed</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            <p>No transactions yet. Start trading stocks!</p>
                            <a href="{{ route('stock-trading') }}" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white hover:bg-green-700 transition">Start Trading</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(method_exists($transactions, 'hasPages') && $transactions->hasPages())
        <div class="border-t border-gray-200 px-6 py-4 bg-gray-50">
            {{ $transactions->links() }}
        </div>
        @endif
    </div>
</div>

<style>
    .bg-white, .border, button, a {
        border-radius: 0 !important;
    }
    * {
        border-radius: 0 !important;
    }
    
    /* Progress bar animation */
    .bg-green-500, .bg-red-500 {
        transition: width 0.5s ease;
    }
</style>
@endsection