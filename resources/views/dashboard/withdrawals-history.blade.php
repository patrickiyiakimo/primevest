@extends('layouts.dashboard')

@section('page-title', 'Withdrawal History')
@section('breadcrumb', 'Track your withdrawals')

@section('dashboard-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Withdrawn</div><div class="val num bad">${{ number_format($totalWithdrawals ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Last Withdrawal</div><div class="val num">${{ number_format($lastWithdrawalAmount ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Average</div><div class="val num">${{ number_format($averageWithdrawal ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Pending Requests</div><div class="val num" style="color:var(--gold)">{{ $pendingCount ?? 0 }}</div></div>
</div>

<div class="pa mt" style="padding:22px">
    <div class="sec-h"><div><h2>Approved Withdrawals</h2><p>Funds successfully moved to your wallet</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Date</th><th>Method</th><th>Wallet / Network</th><th>Amount</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($withdrawals as $w)
            <tr>
                <td class="num muted" style="white-space:nowrap">{{ $w->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $w->method }}</td>
                <td><span class="num" style="font-size:.78rem;color:var(--muted)">{{ substr($w->wallet_address ?? '',0,14) }}… · {{ $w->network }}</span></td>
                <td class="num bad" style="font-weight:700">-${{ number_format($w->amount, 2) }}</td>
                <td><span class="pill pill-g">● Approved</span></td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:44px" class="muted">No withdrawals yet. <a href="{{ route('withdraw') }}" style="color:var(--acc);font-weight:700">Request one</a></td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $withdrawals->links() }}</div>
</div>
@endsection