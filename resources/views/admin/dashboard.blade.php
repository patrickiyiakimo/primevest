@extends('layouts.admin')

@section('page-title', 'Admin Overview')
@section('breadcrumb', 'Global platform performance')

@section('admin-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Total Users</div><div class="val num">{{ number_format($totalUsers) }}</div><div class="sub">{{ $recentUsers->count() > 0 ? 'Active community' : 'No users yet' }}</div></div>
    <div class="kpi-card"><div class="lbl">Total Balance</div><div class="val num" style="color:var(--acc)">${{ number_format($totalBalance, 2) }}</div><div class="sub">Sum of all user balances</div></div>
    <div class="kpi-card"><div class="lbl">Total Deposits</div><div class="val num">${{ number_format($totalDepositsAmount, 2) }}</div><div class="sub">Completed deposits</div></div>
    <div class="kpi-card"><div class="lbl">Pending Deposits</div><div class="val num" style="color:var(--gold)">{{ $pendingDepositsCount }}</div><div class="sub"><a href="{{ route('admin.deposits') }}">Review now →</a></div></div>
</div>

<div class="grid-2 mt">
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Pending Deposit Approvals</h2><p>Latest requests awaiting review</p></div><a href="{{ route('admin.deposits') }}" class="btn btn-ghost btn-sm">View all</a></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>User</th><th>Amount</th><th>Method</th><th></th></tr></thead>
            <tbody>
                @forelse($pendingDeposits as $d)
                <tr>
                    <td><b>{{ $d->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $d->user->email }}</div></td>
                    <td class="num" style="font-weight:700">${{ number_format($d->amount, 2) }}</td>
                    <td><span class="pill pill-b">{{ strtoupper($d->method) }}</span></td>
                    <td style="text-align:right">
                        <form action="{{ route('admin.deposits.approve', $d->id) }}" method="POST" style="display:inline">@csrf
                            <button class="btn btn-sm">Approve</button></form>
                        <form action="{{ route('admin.deposits.reject', $d->id) }}" method="POST" style="display:inline">@csrf
                            <button class="btn btn-red btn-sm">Reject</button></form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;padding:30px" class="muted">No pending deposits 🎉</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>KYC Pipeline</h2><p>Verification requests by status</p></div><a href="{{ route('admin.kyc.index') }}" class="btn btn-ghost btn-sm">Manage KYC</a></div>
        <div class="kpi" style="grid-template-columns:2fr 2fr;gap:12px">
            <div class="kpi-card" style="padding:16px"><div class="lbl">⏳ Pending</div><div class="val num" style="color:var(--gold);font-size:1.3rem">{{ $pendingKYC }}</div></div>
            <div class="kpi-card" style="padding:16px"><div class="lbl">✓ Verified</div><div class="val num" style="color:var(--acc);font-size:1.3rem">{{ $verifiedKYC }}</div></div>
            <div class="kpi-card" style="padding:16px"><div class="lbl">✖ Rejected</div><div class="val num" style="color:var(--red);font-size:1.3rem">{{ $rejectedKYC }}</div></div>
            <div class="kpi-card" style="padding:16px"><div class="lbl">○ Not submitted</div><div class="val num" style="font-size:1.3rem">{{ $notSubmittedKYC }}</div></div>
        </div>
        <div style="margin-top:16px;border-top:1px solid var(--line);padding-top:14px">
            <div class="sec-h" style="margin-bottom:10px"><div><h2 style="font-size:1rem">Latest submissions</h2></div></div>
            @forelse($pendingKYCSumbissions as $u)
            <div style="display:flex;align-items:center;justify-content:space-between;padding:9px 0;border-bottom:1px solid rgba(255,255,255,.05)">
                <div><b>{{ $u->name }}</b><div class="muted" style="font-size:.76rem">{{ $u->email }}</div></div>
                <a href="{{ route('admin.kyc.view', $u->id) }}" class="btn btn-ghost btn-sm">Review</a>
            </div>
            @empty
            <p class="muted" style="text-align:center;margin:6px 0">No pending KYC submissions.</p>
            @endforelse
        </div>
    </div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Recently Registered Users</h2></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Name</th><th>Email</th><th>Country</th><th>Balance</th><th>Status</th><th>Joined</th><th></th></tr></thead>
        <tbody>
            @foreach($recentUsers->take(20) as $u)
            <tr>
                <td style="font-weight:600">{{ $u->name }}</td>
                <td class="muted">{{ $u->email }}</td>
                <td>{{ $u->country ?: '—' }}</td>
                <td class="num">${{ number_format($u->balance, 2) }}</td>
                <td>
                    @if($u->is_active)<span class="pill pill-g">Active</span>@else<span class="pill pill-r">Disabled</span>@endif
                </td>
                <td class="num muted" style="font-size:.8rem">{{ $u->created_at->format('Y-m-d') }}</td>
                <td style="text-align:right">
                    <div style="display:flex;gap:6px;justify-content:flex-end">
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-ghost btn-sm">Manage</a>
                        @unless($u->is_admin)
                        <form method="POST" action="{{ route('admin.users.toggle-status', $u->id) }}" style="display:inline">
                            @csrf
                            <button class="btn btn-ghost btn-sm" title="{{ $u->is_active ? 'Disable account' : 'Enable account' }}">{{ $u->is_active ? 'Disable' : 'Enable' }}</button>
                        </form>
                        <form method="POST" action="{{ route('admin.users.destroy', $u->id) }}" style="display:inline" onsubmit="return confirm('Permanently delete {{ $u->name }}\'s account and all related data? This cannot be undone.');">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        @endunless
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection