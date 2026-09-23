@extends('layouts.admin')

@section('page-title', 'Manage User')
@section('breadcrumb', $user->name)

@section('admin-content')
<div class="grid-2">
    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Account Overview</h2></div></div>
        <div style="display:flex;gap:14px;align-items:center;margin-bottom:20px">
            <div class="side-av" style="width:52px;height:52px;border-radius:14px;display:grid;place-items:center;font-weight:800;font-size:1.2rem;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d">{{ substr($user->name,0,1) }}</div>
            <div>
                <div style="font-weight:800;font-size:1.1rem">{{ $user->name }}</div>
                <div class="muted" style="font-size:.82rem">{{ $user->email }} · {{ $user->phone ?? 'no phone' }}</div>
            </div>
        </div>
        <div class="kpi" style="grid-template-columns:1fr 1fr;gap:12px">
            <div class="kpi-card" style="padding:18px"><div class="lbl">Balance</div><div class="val num" style="font-size:1.25rem">${{ number_format($user->balance, 2) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">Total Profits</div><div class="val num ok" style="font-size:1.25rem">${{ number_format($user->total_profits ?? 0, 2) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">KYC Status</div><div class="val" style="font-size:1.05rem">{{ ucwords(str_replace('_',' ',$user->kyc_status ?? 'not_submitted')) }}</div></div>
            <div class="kpi-card" style="padding:18px"><div class="lbl">Joined</div><div class="val num" style="font-size:1.05rem">{{ $user->created_at->format('M d, Y') }}</div></div>
        </div>
        <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap">
            @if(($user->kyc_status ?? '') == 'pending')
            <a href="{{ route('admin.kyc.view', $user->id) }}" class="btn btn-sm">Review KYC</a>
            @endif
            <a href="{{ route('admin.users') }}" class="btn btn-ghost btn-sm">← All users</a>
        </div>
    </div>

    <div class="pa" style="padding:22px">
        <div class="sec-h"><div><h2>Balance Adjustment</h2><p>Credit, debit or add profit</p></div></div>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf @method('PUT')
            <label class="lbl">Transaction type</label>
            <select class="inp sel" name="transaction_type" style="margin-bottom:14px">
                <option value="credit">Credit (+) — add to balance</option>
                <option value="debit">Debit (-) — deduct from balance</option>
                <option value="profit">Profit — add to total profits</option>
            </select>
            <label class="lbl">Amount (USD)</label>
            <input class="inp num" name="amount" type="number" min="0.01" step="0.01" required style="margin-bottom:14px">
            <label class="lbl">Description <span class="muted">(optional)</span></label>
            <input class="inp" name="description" placeholder="e.g. Manual credit for referral bonus" style="margin-bottom:18px">
            <button class="btn btn-block">Apply Adjustment</button>
        </form>
        <p class="muted mt" style="font-size:.8rem;margin-bottom:0">💡 The user is notified by email. Debits above the current balance are rejected automatically.</p>
    </div>
</div>
@endsection