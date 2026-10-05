@extends('layouts.guest')

@section('title', 'Reset Password · PrimeVest')

@section('content')
<h2 class="pv-title">Reset your password</h2>
<p class="pv-mut pv-sub">We'll email you a secure link to set a new password.</p>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label class="pv-label" for="email">Email address</label>
    <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">
    @error('email')<div class="pv-err">{{ $message }}</div>@enderror
    <button class="wf-btn wf-btn-primary wf-btn-block" type="submit" style="margin-top:22px">Email password reset link</button>
</form>

<p class="pv-mut" style="text-align:center;margin:22px 0 0">
    Remembered it? <a href="{{ route('login') }}" class="pv-link">Back to login</a>
</p>
@endsection