@extends('layouts.admin')

@section('page-title', 'Withdrawal Management')
@section('breadcrumb', 'Review payout requests')

@section('admin-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Pending Requests</div><div class="val num" style="color:var(--gold)">{{ $pendingWithdrawals->count() }}</div></div>
    <div class="kpi-card"><div class="lbl">Pending Amount</div><div class="val num">${{ number_format($totalPending, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Approved Amount</div><div class="val num ok">${{ number_format($totalApproved, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Rejected</div><div class="val num bad">{{ $rejectedWithdrawals->count() }}</div></div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Pending Withdrawals</h2><p>Funds ready to be released</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Amount</th><th>Method</th><th>Wallet / Network</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($pendingWithdrawals as $w)
            <tr>
                <td><b>{{ $w->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $w->user->email }}</div></td>
                <td class="num" style="font-weight:700">${{ number_format($w->amount, 2) }}</td>
                <td><span class="pill pill-b">{{ strtoupper($w->method) }}</span></td>
                <td style="max-width:180px"><span class="num" style="font-size:.75rem;color:var(--muted);word-break:break-all">{{ $w->wallet_address }}</span><div class="muted" style="font-size:.72rem">{{ $w->network }}</div></td>
                <td class="num muted" style="font-size:.8rem">{{ $w->created_at->format('Y-m-d H:i') }}</td>
                <td style="white-space:nowrap">
                    <form action="{{ route('admin.withdrawals.approve', $w->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-sm">✓ Pay Out</button></form>
                    <form action="{{ route('admin.withdrawals.reject', $w->id) }}" method="POST" style="display:inline">@csrf
                        <input class="inp" type="hidden" name="admin_notes" value="Declined by compliance">
                        <button class="btn btn-red btn-sm">✖ Reject</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:36px" class="muted">No pending withdrawals 🎉</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="grid-2 mt">
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Approved</h2><p>Last 20 payouts</p></div></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>User</th><th>Amount</th><th>Method</th><th>Date</th></tr></thead>
            <tbody>
                @forelse($approvedWithdrawals as $w)
                <tr>
                    <td><b>{{ $w->user->name }}</b></td>
                    <td class="num bad" style="font-weight:700">-${{ number_format($w->amount, 2) }}</td>
                    <td><span class="pill pill-g">● {{ strtoupper($w->method) }}</span></td>
                    <td class="num muted" style="font-size:.8rem">{{ $w->approved_at?->format('Y-m-d H:i') }}</td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Rejected</h2><p>Recent declines</p></div></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>User</th><th>Amount</th><th>Reason</th></tr></thead>
            <tbody>
                @forelse($rejectedWithdrawals as $w)
                <tr>
                    <td><b>{{ $w->user->name }}</b></td>
                    <td class="num" style="font-weight:700">${{ number_format($w->amount, 2) }}</td>
                    <td style="font-size:.8rem;color:var(--muted)">{{ $w->admin_notes ?? 'Declined' }}</td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection