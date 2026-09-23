@extends('layouts.admin')

@section('page-title', 'KYC Review')
@section('breadcrumb', $user->name)

@section('admin-content')
<div class="grid-2">
    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Applicant</h2></div></div>
        <div style="display:flex;gap:14px;align-items:center;margin-bottom:18px">
            <div class="side-av" style="width:50px;height:50px;border-radius:14px;display:grid;place-items:center;font-weight:800;font-size:1.2rem">{{ substr($user->name,0,1) }}</div>
            <div>
                <div style="font-weight:800;font-size:1.1rem">{{ $user->name }}</div>
                <div class="muted" style="font-size:.82rem">{{ $user->email }} · {{ $user->phone ?? 'no phone' }}</div>
            </div>
        </div>
        <div class="kpi" style="grid-template-columns:1fr 1fr;gap:12px">
            <div class="kpi-card" style="padding:16px"><div class="lbl">Balance</div><div class="val num" style="font-size:1.15rem">${{ number_format($user->balance,2) }}</div></div>
            <div class="kpi-card" style="padding:16px"><div class="lbl">Joined</div><div class="val num" style="font-size:1.05rem">{{ $user->created_at->format('M d, Y') }}</div></div>
        </div>

        <div style="margin-top:20px;padding:16px;border:1px solid var(--line);border-radius:14px;background:rgba(255,255,255,.03)">
            <div class="sec-h" style="margin-bottom:12px"><div><h2 style="font-size:1rem">Documents</h2></div></div>
            <div style="display:flex;gap:10px;flex-wrap:wrap">
                @if($user->kyc_document_front)
                <a class="btn btn-ghost btn-sm" href="{{ route('admin.kyc.download', [$user->id, 'front']) }}">⬇ Front document</a>
                @else
                <span class="pill pill-y">No front doc</span>
                @endif
                @if($user->kyc_document_back)
                <a class="btn btn-ghost btn-sm" href="{{ route('admin.kyc.download', [$user->id, 'back']) }}">⬇ Back document</a>
                @else
                <span class="pill pill-y">No back doc</span>
                @endif
            </div>
        </div>
    </div>

    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Decision</h2><p>Approve or reject this verification</p></div></div>
        <form action="{{ route('admin.kyc.approve', $user->id) }}" method="POST" style="margin-bottom:12px">@csrf
            <button class="btn btn-block">✓ Approve &amp; Verify User</button>
        </form>
        <form action="{{ route('admin.kyc.reject', $user->id) }}" method="POST">
            @csrf
            <label class="lbl">Rejection reason</label>
            <textarea class="inp" name="rejection_reason" rows="3" placeholder="Explain why the documents were rejected…" required style="margin-bottom:12px"></textarea>
            <button class="btn btn-red btn-block">✖ Reject Submission</button>
        </form>
        <p class="muted mt" style="font-size:.8rem;margin-bottom:0">💡 Both actions notify the applicant by email with the outcome.</p>
    </div>
</div>
@endsection