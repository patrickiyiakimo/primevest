@extends('layouts.dashboard')

@section('page-title', 'Profile & Referrals')
@section('breadcrumb', 'Manage your personal details')

@section('dashboard-content')
<div class="grid-2">
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Profile Information</h2><p>Keep your details up to date</p></div></div>
        <form method="POST" action="{{ route('profile.update') }}">
            @method('PUT') @csrf
            <label class="lbl">Full name</label>
            <input class="inp" name="name" value="{{ old('name', $user->name) }}" style="margin-bottom:14px" required>
            <label class="lbl">Email</label>
            <input class="inp" name="email" type="email" value="{{ old('email', $user->email) }}" style="margin-bottom:14px" required>
            <div class="grid-2" style="grid-template-columns:1fr 1fr">
                <div>
                    <label class="lbl">Phone</label>
                    <input class="inp" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
                </div>
                <div>
                    <label class="lbl">Country</label>
                    <input class="inp" name="country" value="{{ old('country', $user->country ?? '') }}">
                </div>
            </div>
            <button class="btn mt" type="submit">Save Changes</button>
        </form>
    </div>

    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Change Password</h2><p>Use a strong, unique password</p></div></div>
        <form method="POST" action="{{ route('profile.password') }}">
            @method('PUT') @csrf
            <label class="lbl">Current password</label>
            <input class="inp" name="current_password" type="password" required style="margin-bottom:14px">
            <label class="lbl">New password</label>
            <input class="inp" name="password" type="password" required style="margin-bottom:14px">
            <label class="lbl">Confirm new password</label>
            <input class="inp" name="password_confirmation" type="password" required style="margin-bottom:18px">
            <button class="btn btn-gold" type="submit">Update Password</button>
        </form>
    </div>
</div>

<div class="pa mt" style="padding:24px">
    <div class="sec-h">
        <div><h2>My Referrals</h2><p>Invite friends and earn with the PrimeVest referral program</p></div>
        <button class="btn btn-sm btn-ghost" onclick="navigator.clipboard.writeText('{{ url('/register?ref='.$user->referral_code ?? '') }}').then(()=>pvFlash('flash-ok','Referral link copied'))">Copy referral link</button>
    </div>
    <div class="pa" style="padding:16px 20px;display:flex;align-items:center;gap:14px;margin-bottom:18px;background:linear-gradient(140deg,#0d1d2e,#0c1322)">
        <div style="font-weight:800">🔗 Your referral code</div>
        <code class="num" style="background:rgba(255,255,255,.06);padding:8px 14px;border-radius:9px;border:1px solid var(--line)">{{ $user->referral_code }}</code>
        <span class="muted" style="font-size:.82rem">Earn <b class="gold">5% of every deposit</b> a referred friend makes.</span>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead><tr><th>Name</th><th>Email</th><th>Joined</th></tr></thead>
        <tbody>
            @forelse($affiliates as $af)
            <tr>
                <td style="font-weight:600">{{ $af->name }}</td>
                <td class="muted">{{ $af->email }}</td>
                <td class="num muted">{{ $af->created_at->format('Y-m-d') }}</td>
            </tr>
            @empty
            <tr><td colspan="3" style="text-align:center;padding:34px" class="muted">No referrals yet — share your link and start earning.</td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection