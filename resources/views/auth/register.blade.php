@extends('layouts.guest')

@section('title', 'Create Account · PrimeVest')

@section('content')
<h2 style="margin:0 0 6px;font-size:1.5rem;font-weight:800;letter-spacing:-.01em">Create your account</h2>
<p class="pv-mut" style="margin:0 0 24px">Start investing in crypto in under a minute.</p>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
        <div>
            <label class="pv-label" for="name">Full name</label>
            <input class="pv-input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div>
            <label class="pv-label" for="email">Email address</label>
            <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
    </div>
    <label class="pv-label" for="password" style="margin-top:14px">Password</label>
    <input class="pv-input" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimum 8 characters">
    <label class="pv-label" for="password_confirmation" style="margin-top:14px">Confirm password</label>
    <input class="pv-input" id="password_confirmation" type="password" name="password_confirmation" required>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:14px">
        <div>
            <label class="pv-label" for="phone">Phone (optional)</label>
            <input class="pv-input" id="phone" type="text" name="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <label class="pv-label" for="country">Country (optional)</label>
            <input class="pv-input" id="country" type="text" name="country" value="{{ old('country') }}">
        </div>
    </div>

    <label class="pv-label" for="referral_code" style="margin-top:14px">Referral code (optional)</label>
    <input class="pv-input" id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') ?? ($ref ?? '') }}">

    <label style="display:flex;align-items:flex-start;gap:9px;margin:18px 0 20px;color:var(--muted);font-size:.8rem;cursor:pointer">
        <input type="checkbox" name="terms" required style="accent-color:var(--acc);width:15px;height:15px;margin-top:2px">
        <span>I agree to the <a href="{{ route('privacy.policy') }}" class="pv-link">Terms &amp; Privacy Policy</a> and understand the risks of crypto investing.</span>
    </label>

    <button class="pv-btn pv-btn-block" type="submit">Create Free Account</button>
</form>

<p class="pv-mut" style="text-align:center;margin:22px 0 0">
    Already have an account? <a href="{{ route('login') }}" class="pv-link">Log in</a>
</p>
<div style="margin-top:18px;padding-top:16px;border-top:1px solid var(--line);display:flex;justify-content:center;gap:22px;color:var(--muted);font-size:.75rem">
    <span>🎁 $100 demo balance</span><span>🔒 256-bit SSL</span><span>⚡ Instant access</span>
</div>
@endsection