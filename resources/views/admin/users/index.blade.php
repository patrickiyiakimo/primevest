@extends('layouts.admin')

@section('page-title', 'User Management')
@section('breadcrumb', 'Search, review and manage accounts')

@section('admin-content')
<div class="pa" style="padding:20px">
    <div class="sec-h">
        <div><h2>All Users</h2><p>{{ $users->total() }} accounts</p></div>
        <form method="GET" action="{{ route('admin.users') }}" style="display:flex;gap:8px">
            <input class="inp" name="search" value="{{ request('search') }}" placeholder="Search name or email…" style="width:240px">
            <button class="btn btn-ghost">Search</button>
        </form>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Balance</th><th>Total Profits</th><th>KYC</th><th>Admin</th><th>Joined</th><th></th></tr></thead>
        <tbody>
            @forelse($users as $u)
            <tr>
                <td>
                    <div style="display:flex;align-items:center;gap:10px">
                        <div class="side-av" style="width:34px;height:34px;border-radius:9px;display:grid;place-items:center;font-weight:800;font-size:.9rem;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d">{{ substr($u->name,0,1) }}</div>
                        <div><b>{{ $u->name }}</b><div class="muted" style="font-size:.75rem">{{ $u->email }}</div></div>
                    </div>
                </td>
                <td class="num" style="font-weight:700">${{ number_format($u->balance, 2) }}</td>
                <td class="num ok">${{ number_format($u->total_profits ?? 0, 2) }}</td>
                <td>
                    @if($u->kyc_status == 'verified')<span class="pill pill-g">✓ Verified</span>
                    @elseif($u->kyc_status == 'pending')<span class="pill pill-y">⏳ Pending</span>
                    @elseif($u->kyc_status == 'rejected')<span class="pill pill-r">✖ Rejected</span>
                    @else<span class="pill pill-b">○ Not submitted</span>@endif
                </td>
                <td>@if($u->is_admin)<span class="pill pill-y">Admin</span>@else<span class="pill">User</span>@endif</td>
                <td class="num muted" style="font-size:.8rem">{{ $u->created_at->format('Y-m-d') }}</td>
                <td style="text-align:right"><a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-ghost btn-sm">Manage</a></td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;padding:40px" class="muted">No users found.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
    <div class="mt">{{ $users->links() }}</div>
</div>
@endsection