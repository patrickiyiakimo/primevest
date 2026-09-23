@extends('layouts.dashboard')

@section('page-title', 'Verification Status')
@section('breadcrumb', 'Account security & compliance')

@section('dashboard-content')
@php
    $st = $user->kyc_status ?? 'not_submitted';
    $statusMap = [
        'not_submitted' => ['Not Submitted','Please complete your identity verification to unlock full limits.', 'pill-y'],
        'pending' => ['Under Review','Your documents are being reviewed. This usually takes 24–48 hours.', 'pill-b'],
        'verified' => ['Verified','Your identity has been verified. All limits are unlocked. Thank you!', 'pill-g'],
        'rejected' => ['Rejected','Your submission was declined. Please re-submit valid documents.', 'pill-r'],
    ];
    [$label,$desc,$pill] = $statusMap[$st] ?? $statusMap['not_submitted'];
@endphp

<div class="pa" style="padding:26px;text-align:center">
    <div style="width:74px;height:74px;border-radius:20px;margin:0 auto 18px;display:grid;place-items:center;font-size:2rem;
        background:{{ in_array($st,['verified']) ? 'rgba(24,216,147,.15)' : (in_array($st,['rejected']) ? 'rgba(239,68,68,.15)' : 'rgba(240,185,11,.12)') }}">
        {{ $st == 'verified' ? '✓' : ($st == 'rejected' ? '✖' : '⏳') }}
    </div>
    <h2 style="margin:0 0 8px;font-size:1.4rem">KYC: <span class="num" style="color:var(--acc)">{{ $label }}</span></h2>
    <p class="muted" style="max-width:480px;margin:0 auto 22px">{{ $desc }}</p>
    @if($st != 'verified')
        <a href="{{ route('kyc.form') }}" class="btn">Submit / Update Documents</a>
    @endif
</div>

<div class="grid-3 mt">
    @php
        $checks = [
            ['Email confirmed','pill-g', true],
            ['Identity verified','pill-g', $st == 'verified'],
            ['Withdrawal enabled','pill-g', true],
            ['2FA available','pill-y', false],
            ['Wallet whitelisting','pill-g', true],
            ['Trade history','pill-g', true],
        ];
    @endphp
    @foreach($checks as $c)
    <div class="pa" style="padding:18px;display:flex;align-items:center;justify-content:space-between">
        <span>{{ $c[0] }}</span><span class="pill {{ $c[2] ? 'pill-g' : 'pill-y' }}">{{ $c[2] ? '● Active' : '○ Optional' }}</span>
    </div>
    @endforeach
</div>
@endsection