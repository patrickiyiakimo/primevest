@extends('layouts.guest')

@section('title', 'Reset Password · PrimeVest')

@section('content')
<h2 style="margin:0 0 6px;font-size:1.5rem;font-weight:800;letter-spacing:-.01em">Reset your password</h2>
<p class="pv-mut" style="margin:0 0 24px">We'll email you a secure link to set a new password.</p>

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label class="pv-label" for="email">Email address</label>
    <input class="pv-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
    @error('email')<div class="pv-err">{{ $message }}</div>@enderror
    <button class="pv-btn pv-btn-block" type="submit" style="margin-top:22px">Email Password Reset Link</button>
</form>

<p class="pv-mut" style="text-align:center;margin:22px 0 0">
    Remembered it? <a href="{{ route('login') }}" class="pv-link">Back to login</a>
</p>
@endsection