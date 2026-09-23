@extends('layouts.guest')

@section('title', 'Set New Password · PrimeVest')

@section('content')
<h2 style="margin:0 0 6px;font-size:1.5rem;font-weight:800;letter-spacing:-.01em">Set a new password</h2>
<p class="pv-mut" style="margin:0 0 24px">Choose a strong password you haven't used before.</p>

<form method="POST" action="{{ route('password.store') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <label class="pv-label" for="email">Email address</label>
    <input class="pv-input" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required>
    @error('email')<div class="pv-err">{{ $message }}</div>@enderror
    <label class="pv-label" for="password" style="margin-top:16px">New password</label>
    <input class="pv-input" id="password" type="password" name="password" required autofocus autocomplete="new-password" placeholder="Minimum 8 characters">
    @error('password')<div class="pv-err">{{ $message }}</div>@enderror
    <label class="pv-label" for="password_confirmation" style="margin-top:16px">Confirm new password</label>
    <input class="pv-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
    <button class="pv-btn pv-btn-block" type="submit" style="margin-top:22px">Reset Password</button>
</form>
@endsection