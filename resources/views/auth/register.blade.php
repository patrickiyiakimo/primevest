@extends('layouts.guest')

@section('title', 'Create Account · PrimeVest')

@section('content')
<h2 class="pv-title">Create your account</h2>
<p class="pv-mut pv-sub">Start investing in under a minute.</p>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
        <div>
            <label class="pv-label" for="name">Full name</label>
            <input class="pv-input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
        </div>
        <div>
            <label class="pv-label" for="email">Email address</label>
            <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
    </div>

    <label class="pv-label" for="password" style="margin-top:16px">Password</label>
    <input class="pv-input" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 characters">

    <label class="pv-label" for="password_confirmation" style="margin-top:16px">Confirm password</label>
    <input class="pv-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:16px">
        <div>
            <label class="pv-label" for="phone">Phone (optional)</label>
            <input class="pv-input" id="phone" type="text" name="phone" value="{{ old('phone') }}" autocomplete="tel">
        </div>
        <div>
            <label class="pv-label" for="country">Country (optional)</label>
            <input class="pv-input" id="country" type="text" name="country" value="{{ old('country') }}">
        </div>
    </div>

    <label class="pv-label" for="referral_code" style="margin-top:16px">Referral code (optional)</label>
    <input class="pv-input" id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') ?? ($ref ?? '') }}">

    <label class="pv-check">
        <input type="checkbox" name="terms" required>
        <span>I agree to the <a href="{{ route('privacy.policy') }}" class="pv-link">Terms &amp; Privacy Policy</a> and understand the risks involved in investing.</span>
    </label>

    <button class="wf-btn wf-btn-primary wf-btn-block" type="submit">Open my free account</button>
</form>

<p class="pv-mut" style="text-align:center;margin:22px 0 0">
    Already have an account? <a href="{{ route('login') }}" class="pv-link">Log in</a>
</p>

<div class="pv-flags pv-note">
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 12v10H4V12"/><path d="M2 7h20v5H2z"/><path d="M12 22V7"/><path d="M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"/></svg>
        $100 demo balance
    </span>
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
        256-bit SSL
    </span>
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L4.5 13H11l-1 9 8.5-11H12l1-9z"/></svg>
        Instant access
    </span>
</div>
@endsection