@extends('layouts.guest')

@section('title', 'Log in · PrimeVest')

@section('content')
<h2 style="margin:0 0 6px;font-size:1.5rem;font-weight:800;letter-spacing:-.01em">Welcome back</h2>
<p class="pv-mut" style="margin:0 0 24px">Log in to your crypto portfolio.</p>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label class="pv-label" for="email">Email address</label>
    <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" style="margin-bottom:16px">
    @error('email')<div class="pv-err">{{ $message }}</div>@enderror

    <div style="display:flex;justify-content:space-between;align-items:baseline">
        <label class="pv-label" for="password">Password</label>
        <a href="{{ route('password.request') }}" class="pv-link" style="font-size:.8rem">Forgot password?</a>
    </div>
    <input class="pv-input" id="password" type="password" name="password" required autocomplete="current-password">

    <label style="display:flex;align-items:center;gap:9px;margin:16px 0 22px;color:var(--muted);font-size:.88rem;cursor:pointer">
        <input type="checkbox" name="remember" style="accent-color:var(--acc);width:16px;height:16px"> Remember me on this device
    </label>

    <button class="pv-btn pv-btn-block" type="submit">Log in to My Account</button>
</form>

<p class="pv-mut" style="text-align:center;margin:24px 0 0">
    New to PrimeVest? <a href="{{ route('register') }}" class="pv-link">Create a free account</a>
</p>
<div style="display:flex;justify-content:center;gap:22px;margin-top:18px;color:var(--muted);font-size:.75rem">
    <span>🔒 256-bit SSL</span><span>🛡 2FA ready</span><span>⚡ Instant access</span>
</div>
@endsection