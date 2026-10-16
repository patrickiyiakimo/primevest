@extends('layouts.dashboard')

@section('page-title', 'Earnings History')
@section('breadcrumb', 'All rewards and profits credited to your account')

@section('dashboard-content')
@include('dashboard.partials.transaction-tabs')

<div class="pa mt" style="padding:22px">
    <div class="sec-h"><div><h2>Profit &amp; Reward History</h2><p>Auto-credited staking rewards and trading profits</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Date</th><th>Source</th><th>Amount</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($earnings as $e)
            <tr>
                <td class="num muted" style="white-space:nowrap">{{ $e->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $e->description ?? 'Staking reward' }}</td>
                <td class="num ok" style="font-weight:700">+${{ number_format($e->amount, 2) }}</td>
                <td><span class="pill pill-g">● Credited</span></td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:44px" class="muted">No earnings yet. <a href="{{ route('invest') }}" style="color:var(--acc);font-weight:700">Start staking</a> to earn daily rewards.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $earnings->links() }}</div>
</div>
@endsection