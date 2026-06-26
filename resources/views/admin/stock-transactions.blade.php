@extends('admin.layouts.admin')

@section('page-title', 'Stock Transactions')
@section('breadcrumb', 'View all stock buy/sell transactions')

@section('admin-content')
<div class="bg-white border border-gray-200 shadow-sm">
    <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">All Stock Transactions</h2>
                <p class="text-sm text-gray-500 mt-1">View all users' stock trading activities</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500">Total Buy Volume: <span class="font-bold text-green-600">${{ number_format($totalBuyVolume ?? 0, 2) }}</span></p>
                <p class="text-sm text-gray-500">Total Sell Volume: <span class="font-bold text-red-600">${{ number_format($totalSellVolume ?? 0, 2) }}</span></p>
            </div>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Type</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Symbol</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Company</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Quantity</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Price/Share</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Order Type</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-500">{{ $transaction->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-4 py-3">
                        <div>
                            <div class="font-medium text-gray-900">{{ $transaction->user->name ?? 'Unknown' }}</div>
                            <div class="text-xs text-gray-500">{{ $transaction->user->email ?? 'No email' }}</div>
                        </div>
                    </td>
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
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-12 text-center text-gray-500">
                        No transactions yet. Users need to trade stocks to see transactions here.
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

<style>
    .bg-white, .border, button, a {
        border-radius: 0 !important;
    }
    * {
        border-radius: 0 !important;
    }
</style>
@endsection