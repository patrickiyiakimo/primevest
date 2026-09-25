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
    $isVerified = $st === 'verified';
@endphp

<style>
    @if($isVerified)
        /* Confetti overlay: purely decorative, never blocks the page. */
        #pvConfetti{position:fixed;inset:0;z-index:9998;pointer-events:none}
    @endif

    /* Celebratory sheen on the approved card. */
    .pv-kyc-celebrate{position:relative;overflow:hidden;border-color:rgba(47,123,255,.32)}
    .pv-kyc-celebrate::before{content:"";position:absolute;left:-20%;right:-20%;top:-45%;height:75%;
        background:radial-gradient(ellipse at 50% 100%,rgba(47,123,255,.26),rgba(0,180,255,.08) 45%,transparent 72%);
        pointer-events:none}
    .pv-kyc-celebrate>*{position:relative;z-index:1}
    @keyframes pvBadgePop{0%{transform:scale(.55) rotate(-14deg);opacity:0}
        62%{transform:scale(1.09) rotate(3deg);opacity:1}
        100%{transform:scale(1) rotate(0);opacity:1}}
    .pv-kyc-badge{animation:pvBadgePop .68s cubic-bezier(.22,1,.36,1) both}
    @keyframes pvRise{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
    .pv-kyc-rise{animation:pvRise .5s ease both}
    @media(prefers-reduced-motion:reduce){
        .pv-kyc-badge,.pv-kyc-rise{animation:none}
    }
</style>

<div class="pa {{ $isVerified ? 'pv-kyc-celebrate' : '' }}" style="padding:26px;text-align:center">
    <div class="pv-kyc-badge" style="width:74px;height:74px;border-radius:20px;margin:0 auto 18px;display:grid;place-items:center;font-size:2rem;
        background:{{ $isVerified ? 'rgba(47,123,255,.15)' : ($st == 'rejected' ? 'rgba(239,68,68,.15)' : 'rgba(240,185,11,.12)') }}">
        {{ $isVerified ? '✓' : ($st == 'rejected' ? '✖' : '⏳') }}
    </div>
    <h2 style="margin:0 0 8px;font-size:1.4rem">KYC: <span class="num" style="color:var(--acc)">{{ $label }}</span></h2>
    <p class="muted" style="max-width:480px;margin:0 auto 22px">{{ $desc }}</p>

    @if($isVerified)
        <div class="pv-kyc-rise" style="display:inline-flex;align-items:center;gap:9px;padding:9px 16px;border-radius:999px;
            background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.3);color:#4ade80;font-size:.82rem;font-weight:600">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @if($user->kyc_verified_at)
                Verified on {{ $user->kyc_verified_at->format('F j, Y') }}
            @else
                Identity confirmed
            @endif
        </div>
    @else
        <a href="{{ route('kyc.form') }}" class="btn">Submit / Update Documents</a>
    @endif
</div>

<div class="grid-3 mt">
    @php
        $checks = [
            ['Email confirmed','pill-g', true],
            ['Identity verified','pill-g', $isVerified],
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

@section('scripts')
@if($isVerified)
<canvas id="pvConfetti" aria-hidden="true"></canvas>
<script>
(function(){
    var canvas = document.getElementById('pvConfetti');
    if(!canvas || !canvas.getContext) return;

    // One celebration per account, ever.
    var KEY = @json('pv-kyc-celebrated-'.$user->id);
    try{
        if(localStorage.getItem(KEY) === '1'){ canvas.remove(); return; }
        // Flag before animating so a fast reload cannot double-fire.
        localStorage.setItem(KEY,'1');
    }catch(e){}

    if(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches){
        canvas.remove();
        return;
    }

    var COLORS = ['#2f7bff','#00b4ff','#4cc3ff','#f0b90b','#22c55e','#ffffff'];
    var ctx = canvas.getContext('2d');
    var dpr = Math.min(window.devicePixelRatio || 1, 2);
    var parts = [];

    function size(){
        canvas.width  = Math.floor(window.innerWidth  * dpr);
        canvas.height = Math.floor(window.innerHeight * dpr);
        canvas.style.width  = window.innerWidth  + 'px';
        canvas.style.height = window.innerHeight + 'px';
        ctx.setTransform(dpr,0,0,dpr,0,0);
    }
    size();
    window.addEventListener('resize', size);

    function burst(x, y, n, spread, power){
        for(var i=0;i<n;i++){
            var a = -Math.PI/2 + (Math.random()-0.5)*spread;
            var sp = power * (0.55 + Math.random()*0.75);
            parts.push({
                x:x, y:y,
                vx: Math.cos(a)*sp,
                vy: Math.sin(a)*sp,
                w: 5 + Math.random()*6,
                h: 8 + Math.random()*7,
                rot: Math.random()*6.283,
                vr: (Math.random()-0.5)*0.32,
                c: COLORS[(Math.random()*COLORS.length)|0],
                age: 0,
                ttl: 105 + Math.random()*70
            });
        }
    }

    var W = window.innerWidth, H = window.innerHeight;
    burst(W*0.11, H*0.94, 70, 1.05, 15);
    burst(W*0.89, H*0.94, 70, 1.05, 15);
    burst(W*0.50, H*0.44, 55, 2.40, 12);

    var t0 = performance.now(), MAX = 3600;

    function frame(now){
        W = window.innerWidth; H = window.innerHeight;
        ctx.clearRect(0,0,W,H);
        for(var i=parts.length-1;i>=0;i--){
            var p = parts[i];
            p.age++;
            p.vy += 0.26;
            p.vx *= 0.995;
            p.x  += p.vx;
            p.y  += p.vy;
            p.rot += p.vr;
            var k = p.age / p.ttl;
            if(p.y > H + 70 || k >= 1){ parts.splice(i,1); continue; }
            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rot);
            ctx.globalAlpha = k > 0.7 ? (1 - (k - 0.7) / 0.3) : 1;
            ctx.fillStyle = p.c;
            // Squashing the width fakes a ribbon spinning in 3D.
            var sx = Math.abs(Math.cos(p.rot * 1.6));
            if(sx < 0.06) sx = 0.06;
            ctx.fillRect(-p.w*sx/2, -p.h/2, p.w*sx, p.h);
            ctx.restore();
        }
        if(parts.length && now - t0 < MAX){
            requestAnimationFrame(frame);
        }else{
            canvas.remove();
            window.removeEventListener('resize', size);
        }
    }
    requestAnimationFrame(frame);
})();
</script>
@endif
@endsection
