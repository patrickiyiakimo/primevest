@extends('layouts.admin')

@section('page-title', 'Deposit Management')
@section('breadcrumb', 'Approve or reject funding requests')

@section('admin-content')
@php $dstatus = fn($s) => in_array($s,['pending','blocked','flagged']) ? 'pill-y' : ($s == 'approved' ? 'pill-g' : 'pill-r'); @endphp

<div class="pa" style="padding:20px">
    <div class="sec-h"><div><h2>Pending Deposits</h2><p>Awaiting confirmation of payment</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Amount</th><th>Method</th><th>Transaction ID</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($pendingDeposits as $d)
            <tr>
                <td><b>{{ $d->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $d->user->email }}</div></td>
                <td class="num" style="font-weight:700">${{ number_format($d->amount, 2) }}</td>
                <td><span class="pill pill-b">{{ strtoupper($d->method) }}</span></td>
                <td class="num muted" style="font-size:.78rem">{{ $d->transaction_id ?? '—' }}</td>
                <td class="num muted" style="font-size:.8rem">{{ $d->created_at->format('Y-m-d H:i') }}</td>
                <td style="white-space:nowrap">
                    <form action="{{ route('admin.deposits.approve', $d->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-sm">✓ Approve</button></form>
                    <form action="{{ route('admin.deposits.reject', $d->id) }}" method="POST" style="display:inline">@csrf
                        <button class="btn btn-red btn-sm">✖ Reject</button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;padding:36px" class="muted">No pending deposits 🎉</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="pa mt" style="padding:20px">
    <div class="sec-h"><div><h2>Approved Deposits</h2><p>Last 20 confirmed deposits</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Amount</th><th>Method</th><th>Status</th><th>Approved</th></tr></thead>
        <tbody>
            @forelse($approvedDeposits as $d)
            <tr>
                <td><b>{{ $d->user->name }}</b><div class="muted" style="font-size:.75rem">{{ $d->user->email }}</div></td>
                <td class="num" style="font-weight:700">${{ number_format($d->amount, 2) }}</td>
                <td><span class="pill pill-b">{{ strtoupper($d->method) }}</span></td>
                <td><span class="pill pill-g">● Approved</span></td>
                <td class="num muted" style="font-size:.8rem">{{ $d->approved_at?->format('Y-m-d H:i') }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:30px" class="muted">No approved deposits yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection