@extends('layouts.admin')

@section('page-title', 'KYC Submissions')
@section('breadcrumb', 'Review identity verification requests')

@section('admin-content')
@php $userLink = fn($u) => route('admin.kyc.view', $u->id); @endphp

<div class="pa" style="padding:20px">
    <div class="sec-h"><div><h2>Pending Review</h2><p>Documents awaiting compliance review</p></div></div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>User</th><th>Submitted</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @forelse($pendingSubmissions as $u)
            <tr>
                <td><b>{{ $u->name }}</b><div class="muted" style="font-size:.75rem">{{ $u->email }}</div></td>
                <td class="num muted" style="font-size:.8rem">{{ $u->kyc_submitted_at?->format('Y-m-d H:i') }}</td>
                <td><span class="pill pill-y">⏳ Pending</span></td>
                <td style="text-align:right"><a href="{{ $userLink($u) }}" class="btn btn-sm">Review</a></td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;padding:36px" class="muted">No pending submissions 🎉</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>

<div class="grid-2 mt">
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Verified</h2><p>Last 20</p></div></div>
        <table class="tbl">
            <thead><tr><th>User</th><th>Verified on</th></tr></thead>
            <tbody>
                @forelse($verifiedSubmissions as $u)
                <tr><td><b>{{ $u->name }}</b></td><td class="num muted" style="font-size:.8rem">{{ $u->kyc_verified_at?->format('Y-m-d') }}</td></tr>
                @empty
                <tr><td colspan="2" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pa" style="padding:20px">
        <div class="sec-h"><div><h2>Rejected</h2><p>Last 20</p></div></div>
        <table class="tbl">
            <thead><tr><th>User</th><th>Reason</th></tr></thead>
            <tbody>
                @forelse($rejectedSubmissions as $u)
                <tr><td><b>{{ $u->name }}</b></td><td style="font-size:.8rem;color:var(--muted)">{{ $u->kyc_rejection_reason ?? '—' }}</td></tr>
                @empty
                <tr><td colspan="2" style="text-align:center;padding:26px" class="muted">None yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection