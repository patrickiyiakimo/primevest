@extends('layouts.dashboard')

@section('page-title', 'Deposit History')
@section('breadcrumb', 'A complete record of your deposits')

@section('dashboard-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Deposited</div><div class="val num ok">${{ number_format($totalDeposits ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Last Deposit</div><div class="val num">${{ number_format($lastDepositAmount ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Average Deposit</div><div class="val num">${{ number_format($averageDeposit ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Deposits</div><div class="val num">{{ $deposits->total() }}</div></div>
</div>

<div class="pa mt" style="padding:22px">
    <div class="sec-h"><div><h2>All Deposits</h2><p>Every funding movement on your account</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Date</th><th>Method</th><th>Amount</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($deposits as $d)
            <tr>
                <td class="num muted" style="white-space:nowrap">{{ $d['date'] ?? '' }}</td>
                <td>{{ ucfirst($d['method'] ?? 'Crypto') }}</td>
                <td class="num ok" style="font-weight:700">+${{ number_format($d['amount'] ?? 0, 2) }}</td>
                <td><span class="pill {{ ($d['status'] ?? '') == 'completed' ? 'pill-g' : 'pill-y' }}">● {{ ucfirst($d['status'] ?? '') }}</span></td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:44px" class="muted">No deposits yet. <a href="{{ route('deposit') }}" style="color:var(--acc);font-weight:700">Make your first deposit</a></td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $deposits->links() }}</div>
</div>
@endsection