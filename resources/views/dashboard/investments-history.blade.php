@extends('layouts.dashboard')

@section('page-title', 'Staking History')
@section('breadcrumb', 'Your active and completed staking positions')

@section('dashboard-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Staked</div><div class="val num">${{ number_format($totalInvested ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Active</div><div class="val num" style="color:var(--acc)">{{ $activeInvestments ?? 0 }}</div></div>
    <div class="kpi-card"><div class="lbl">Completed</div><div class="val num">{{ $completedInvestments ?? 0 }}</div></div>
    <div class="kpi-card"><div class="lbl">Total Returns</div><div class="val num ok">+${{ number_format($totalReturns ?? 0, 2) }}</div></div>
</div>

<div class="pa mt" style="padding:22px">
    <div class="sec-h"><div><h2>Staking Positions</h2><p>Every plan you've staked on PrimeVest</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Plan</th><th>Stake</th><th>ROI %</th><th>Est. Return</th><th>Start</th><th>End</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($investments as $inv)
            @php $st=$inv->status; @endphp
            <tr>
                <td style="font-weight:700">{{ $inv->plan_name }}</td>
                <td class="num">${{ number_format($inv->amount, 2) }}</td>
                <td class="num">{{ $inv->roi }}%</td>
                <td class="num ok" style="font-weight:700">${{ number_format($inv->expected_return, 2) }}</td>
                <td class="num muted" style="font-size:.8rem">{{ \Carbon\Carbon::parse($inv->start_date)->format('Y-m-d') }}</td>
                <td class="num muted" style="font-size:.8rem">{{ \Carbon\Carbon::parse($inv->end_date)->format('Y-m-d') }}</td>
                <td>
                    @if($st == 'active')<span class="pill pill-b">● Active</span>
                    @elseif($st == 'completed')<span class="pill pill-g">● Completed</span>
                    @else<span class="pill pill-y">● {{ ucfirst($st) }}</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:44px" class="muted">No staking positions yet. <a href="{{ route('invest') }}" style="color:var(--acc);font-weight:700">Explore staking plans</a></td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $investments->links() }}</div>
</div>
@endsection