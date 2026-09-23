@extends('layouts.app')

@section('title', 'Account Settings · PrimeVest')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:920px">
        <p class="pv-tag">Account Centre</p>
        <h1 class="pv-h1" style="font-size:clamp(1.9rem,3.4vw,2.6rem)">Settings</h1>
        <p class="pv-lead" style="margin:12px 0 0">Keep your profile and password up to date. Changes apply instantly across the platform.</p>

        <div class="pv-grid pv-grid-2" style="gap:20px;margin-top:40px">
            <div class="pv-panel" style="padding:28px">
                <h2 class="pv-h2" style="font-size:1.3rem">Profile information</h2>
                <form method="POST" action="{{ route('settings.profile.update') }}">
                    @csrf @method('PUT')
                    <label class="pv-label">Full name</label>
                    <input class="pv-input" name="name" placeholder="Your full name" required style="margin-bottom:16px">
                    <label class="pv-label">Email</label>
                    <input class="pv-input" name="email" type="email" placeholder="you@email.com" required style="margin-bottom:16px">
                    <label class="pv-label">Phone <span class="pv-mut">(optional)</span></label>
                    <input class="pv-input" name="phone" placeholder="+1 555 000 1234" style="margin-bottom:22px">
                    <button class="pv-btn pv-btn-block" type="submit">Save Profile</button>
                </form>
            </div>
            <div class="pv-panel" style="padding:28px">
                <h2 class="pv-h2" style="font-size:1.3rem">Security</h2>
                <form method="POST" action="{{ route('settings.password.update') }}">
                    @csrf @method('PUT')
                    <label class="pv-label">Current password</label>
                    <input class="pv-input" name="current_password" type="password" required style="margin-bottom:16px">
                    <label class="pv-label">New password</label>
                    <input class="pv-input" name="password" type="password" required style="margin-bottom:16px">
                    <label class="pv-label">Confirm new password</label>
                    <input class="pv-input" name="password_confirmation" type="password" required style="margin-bottom:22px">
                    <button class="pv-btn pv-btn-gold pv-btn-block" type="submit">Update Password</button>
                </form>
            </div>
        </div>

        <div class="pv-panel" style="padding:24px;margin-top:20px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px">
            <div>
                <b>Prefer the full dashboard?</b>
                <p class="pv-mut" style="margin:4px 0 0;font-size:.86rem">Manage settings alongside deposits, trades and staking.</p>
            </div>
            <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-sm">Open Dashboard →</a>
        </div>
    </div>
</section>
@endsection