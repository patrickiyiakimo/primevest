@extends('layouts.admin')

@section('page-title', 'User Portfolios')
@section('breadcrumb', 'Stock holdings across all accounts')

@section('admin-content')
@forelse($portfolioData as $p)
@php $u=$p['user']; @endphp
<div class="pa mb" style="padding:20px">
    <div class="sec-h">
        <div><h2>{{ $u?->name ?? 'Deleted user' }}</h2><p class="muted">{{ $u?->email }}</p></div>
        <div style="display:flex;gap:14px;flex-wrap:wrap">
            <span class="pill pill-b">Invested: <b class="num">${{ number_format($p['total_invested'],2) }}</b></span>
            <span class="pill pill-g">Value: <b class="num">${{ number_format($p['total_current_value'],2) }}</b></span>
            <span class="pill {{ $p['total_profit_loss'] >= 0 ? 'pill-g' : 'pill-r' }}">P/L: <b class="num">{{ $p['total_profit_loss'] >= 0 ? '+' : '' }}${{ number_format($p['total_profit_loss'],2) }}</b></span>
        </div>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Symbol</th><th>Company</th><th>Qty</th><th>Avg</th><th>Current</th><th>Value</th><th>P/L</th></tr></thead>
        <tbody>
            @foreach($p['holdings'] as $h)
            <tr>
                <td class="num" style="font-weight:800">{{ $h['symbol'] }}</td>
                <td class="muted">{{ $h['company_name'] }}</td>
                <td class="num">{{ $h['quantity'] }}</td>
                <td class="num">${{ number_format($h['avg_price'],2) }}</td>
                <td class="num">${{ number_format($h['current_price'],2) }}</td>
                <td class="num" style="font-weight:700">${{ number_format($h['current_value'],2) }}</td>
                <td class="num {{ $h['profit_loss'] >= 0 ? 'ok' : 'bad' }}">{{ $h['profit_loss'] >= 0 ? '+' : '' }}${{ number_format($h['profit_loss'],2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@empty
<div class="pa muted" style="padding:44px;text-align:center">No user portfolios yet. Holdings appear once users trade.</div>
@endforelse
@endsection