@extends('layouts.admin')

@section('page-title', 'Investments')
@section('breadcrumb', 'All staking positions across the platform')

@section('admin-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Staked</div><div class="val num">${{ number_format($totalInvested, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Active</div><div class="val num" style="color:var(--acc)">{{ $activeInvestments }}</div></div>
    <div class="kpi-card"><div class="lbl">Completed</div><div class="val num">{{ $completedInvestments }}</div></div>
    <div class="kpi-card"><div class="lbl">Returns Paid Out</div><div class="val num ok">${{ number_format($totalReturns, 2) }}</div></div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>All Staking Positions</h2></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Plan</th><th>Stake</th><th>ROI</th><th>Est. Return</th><th>Term</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($investments as $inv)
            <tr>
                <td><b>{{ $inv->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $inv->user->email }}</div></td>
                <td style="font-weight:700">{{ $inv->plan_name }}</td>
                <td class="num">${{ number_format($inv->amount, 2) }}</td>
                <td class="num">{{ $inv->roi }}%</td>
                <td class="num ok" style="font-weight:700">${{ number_format($inv->expected_return, 2) }}</td>
                <td class="num muted" style="font-size:.8rem">{{ $inv->duration_days ?? $inv->duration ?? '' }}d</td>
                <td>
                    @if($inv->status == 'active')<span class="pill pill-b">● Active</span>
                    @elseif($inv->status == 'completed')<span class="pill pill-g">● Completed</span>
                    @else<span class="pill pill-y">{{ ucfirst($inv->status) }}</span>@endif
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:40px" class="muted">No investments yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $investments->links() }}</div>
</div>
@endsection