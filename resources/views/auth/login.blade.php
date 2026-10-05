@extends('layouts.guest')

@section('title', 'Log in · PrimeVest')

@section('content')
<h2 class="pv-title">Welcome back</h2>
<p class="pv-mut pv-sub">Log in to your PrimeVest account.</p>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label class="pv-label" for="email">Email address</label>
    <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" style="margin-bottom:16px">
    @error('email')<div class="pv-err">{{ $message }}</div>@enderror

    <div style="display:flex;justify-content:space-between;align-items:baseline">
        <label class="pv-label" for="password">Password</label>
        <a href="{{ route('password.request') }}" class="pv-link" style="font-size:.82rem">Forgot password?</a>
    </div>
    <input class="pv-input" id="password" type="password" name="password" required autocomplete="current-password">

    <label class="pv-check">
        <input type="checkbox" name="remember">
        <span>Remember me on this device</span>
    </label>

    <button class="wf-btn wf-btn-primary wf-btn-block" type="submit">Log in to my account</button>
</form>

<p class="pv-mut" style="text-align:center;margin:24px 0 0">
    New to PrimeVest? <a href="{{ route('register') }}" class="pv-link">Open a free account</a>
</p>

<div class="pv-flags pv-note">
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/></svg>
        256-bit SSL
    </span>
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        2FA ready
    </span>
    <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L4.5 13H11l-1 9 8.5-11H12l1-9z"/></svg>
        Instant access
    </span>
</div>
@endsection