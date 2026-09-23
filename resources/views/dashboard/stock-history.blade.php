@extends('layouts.dashboard')

@section('page-title', 'Trading History')
@section('breadcrumb', 'All executed trades on the desk')

@section('dashboard-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Invested</div><div class="val num">${{ number_format($totalInvested ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Current Value</div><div class="val num">${{ number_format($totalCurrentValue ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Realised / Unrealised P/L</div><div class="val num {{ ($totalProfitLoss ?? 0) >= 0 ? 'ok' : 'bad' }}">{{ ($totalProfitLoss ?? 0) >= 0 ? '+' : '' }}${{ number_format($totalProfitLoss ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Available Cash</div><div class="val num ok">${{ number_format($cashAvailable ?? 0, 2) }}</div></div>
</div>

<div class="pa mt" style="padding:22px">
    <div class="sec-h"><div><h2>Executed Trades</h2></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Date</th><th>Side</th><th>Asset</th><th>Qty</th><th>Price</th><th>Total</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($transactions as $t)
            <tr>
                <td class="num muted" style="font-size:.82rem">{{ $t->created_at->format('Y-m-d H:i') }}</td>
                <td><span class="pill {{ $t->type == 'buy' ? 'pill-g' : 'pill-r' }}">{{ strtoupper($t->type) }}</span></td>
                <td style="font-weight:700">{{ $t->symbol }}</td>
                <td class="num">{{ $t->quantity }}</td>
                <td class="num">${{ number_format($t->price_per_share,2) }}</td>
                <td class="num" style="font-weight:700">${{ number_format($t->total_amount,2) }}</td>
                <td><span class="pill pill-g">● {{ ucfirst($t->status) }}</span></td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:44px" class="muted">No trades yet. <a href="{{ route('stock-trading') }}" style="color:var(--acc);font-weight:700">Visit the Trading Desk</a></td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $transactions->links() }}</div>
</div>
@endsection