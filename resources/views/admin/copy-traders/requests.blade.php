@extends('layouts.admin')

@section('page-title', 'Copy Trading Requests')
@section('breadcrumb', 'Users who applied to copy a specific trader')

@section('admin-content')
<div class="pa" style="padding:20px">
    <div class="sec-h"><div><h2>Copy Requests</h2><p>{{ $requests->count() }} total</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Trader</th><th>Amount</th><th>Status</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($requests as $r)
            <tr>
                <td><b>{{ $r->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $r->user->email }}</div></td>
                <td style="font-weight:700">{{ $r->copyTrader?->display_name ?? '—' }}</td>
                <td class="num">${{ number_format($r->amount, 2) }}</td>
                <td>
                    @if($r->status == 'pending')<span class="pill pill-y">⏳ Pending</span>
                    @elseif($r->status == 'approved')<span class="pill pill-g">✓ Approved</span>
                    @else<span class="pill pill-r">✖ Rejected</span>@endif
                </td>
                <td class="num muted" style="font-size:.8rem">{{ $r->created_at->format('Y-m-d H:i') }}</td>
                <td style="white-space:nowrap">
                    @if($r->status == 'pending')
                    <form action="{{ route('admin.admin.copy-trading-requests.approve', $r->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-sm">✓ Approve</button></form>
                    <form action="{{ route('admin.admin.copy-trading-requests.reject', $r->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-red btn-sm">✖ Reject</button></form>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:44px" class="muted">No copy trading requests yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection