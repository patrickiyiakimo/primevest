@extends('layouts.admin')

@section('page-title', 'Stock Transactions')
@section('breadcrumb', 'All trades executed on the platform')

@section('admin-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Trades</div><div class="val num">{{ number_format($totalTransactions) }}</div></div>
    <div class="kpi-card"><div class="lbl">Buy Volume</div><div class="val num ok">${{ number_format($totalBuyVolume, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Sell Volume</div><div class="val num bad">${{ number_format($totalSellVolume, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Net Flow</div><div class="val num {{ ($totalBuyVolume-$totalSellVolume) >= 0 ? 'ok' : 'bad' }}">${{ number_format($totalBuyVolume-$totalSellVolume, 2) }}</div></div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Recent Trades</h2></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Date</th><th>User</th><th>Side</th><th>Symbol</th><th>Qty</th><th>Price</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($transactions as $t)
            <tr>
                <td class="num muted" style="font-size:.8rem;white-space:nowrap">{{ $t->created_at->format('Y-m-d H:i') }}</td>
                <td><b>{{ $t->user->name }}</b></td>
                <td><span class="pill {{ $t->type == 'buy' ? 'pill-g' : 'pill-r' }}">{{ strtoupper($t->type) }}</span></td>
                <td class="num" style="font-weight:800">{{ $t->symbol }}</td>
                <td class="num">{{ $t->quantity }}</td>
                <td class="num">${{ number_format($t->price_per_share,2) }}</td>
                <td class="num" style="font-weight:700">${{ number_format($t->total_amount,2) }}</td>
                <td><span class="pill pill-g">● {{ ucfirst($t->status) }}</span></td>
            </tr>
            @empty
            <tr><td colspan="8" style="text-align:center;padding:40px" class="muted">No trades yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $transactions->links() }}</div>
</div>
@endsection