@extends('layouts.admin')

@section('page-title', 'Card Applications')
@section('breadcrumb', 'Review PrimeVest card requests')

@section('admin-content')
<div class="kpi">
    <div class="kpi-card"><div class="lbl">Pending</div><div class="val num" style="color:var(--gold)">{{ $totalPending }}</div></div>
    <div class="kpi-card"><div class="lbl">Approved</div><div class="val num ok">{{ $approvedApplications->count() }}</div></div>
    <div class="kpi-card"><div class="lbl">Rejected</div><div class="val num bad">{{ $rejectedApplications->count() }}</div></div>
    <div class="kpi-card"><div class="lbl">Total Requests</div><div class="val num">{{ $pendingApplications->count() + $approvedApplications->count() + $rejectedApplications->count() }}</div></div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Pending Applications</h2></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Card</th><th>Tier</th><th>Address</th><th>Phone</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($pendingApplications as $a)
            <tr>
                <td><b>{{ $a->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $a->user->email }}</div></td>
                <td><span class="pill pill-b">{{ ucfirst($a->card_type) }}</span></td>
                <td><span class="pill {{ $a->card_tier == 'platinum' ? 'pill-y' : 'pill-g' }}">{{ ucfirst($a->card_tier) }}</span></td>
                <td style="max-width:180px;font-size:.8rem;color:var(--muted)">{{ $a->delivery_address }}</td>
                <td class="muted" style="font-size:.8rem">{{ $a->phone }}</td>
                <td class="num muted" style="font-size:.8rem">{{ $a->created_at->format('Y-m-d') }}</td>
                <td style="white-space:nowrap">
                    <form action="{{ route('admin.card-applications.approve', $a->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-sm">✓ Approve</button></form>
                    <form action="{{ route('admin.card-applications.reject', $a->id) }}" method="POST" style="display:inline">@csrf
                        <input type="hidden" name="admin_notes" value="Declined by admin">
                        <button class="btn btn-red btn-sm">✖ Reject</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:36px" class="muted">No pending card applications 🎉</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="grid-2 mt">
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Approved</h2><p>Last 20</p></div></div>
        <table class="tbl">
            <thead><tr><th>User</th><th>Card</th><th>Approved</th></tr></thead>
            <tbody>
                @forelse($approvedApplications as $a)
                <tr><td><b>{{ $a->user->name }}</b></td><td><span class="pill pill-g">● {{ ucfirst($a->card_type) }} {{ ucfirst($a->card_tier) }}</span></td><td class="num muted" style="font-size:.8rem">{{ $a->approved_at?->format('Y-m-d') }}</td></tr>
                @empty
                <tr><td colspan="3" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Rejected</h2><p>Last 20</p></div></div>
        <table class="tbl">
            <thead><tr><th>User</th><th>Card</th><th>Reason</th></tr></thead>
            <tbody>
                @forelse($rejectedApplications as $a)
                <tr><td><b>{{ $a->user->name }}</b></td><td><span class="pill pill-r">✖ {{ ucfirst($a->card_type) }}</span></td><td style="font-size:.8rem;color:var(--muted)">{{ $a->admin_notes ?? 'Declined' }}</td></tr>
                @empty
                <tr><td colspan="3" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection