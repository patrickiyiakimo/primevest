@extends('layouts.app')

@section('title', 'Copy Trading · PrimeVest')

@section('content')
<!-- Hero -->
<section class="pv-hero" style="padding-bottom:56px">
    <div class="pv-container" style="position:relative;z-index:1">
        <div style="max-width:720px">
            <p class="pv-tag">Copy Trading</p>
            <h1 class="pv-h1" style="font-size:clamp(1.9rem,3.8vw,2.9rem)">Mirror the moves of crypto's best traders</h1>
            <p class="pv-lead">Instead of building a strategy from scratch, follow verified professionals. Your account automatically mirrors their trades &mdash; win when they win.</p>
            <div class="hero-actions">
                <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Start Copying Free</a>
                <a href="#how-it-works" class="pv-btn pv-btn-ghost pv-btn-lg">How it works</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust badges + trader cards -->
<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:660px;margin:0 auto 18px">
            <h2 class="pv-h2">Verified traders, audited track records</h2>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:20px;align-items:center;justify-content:center;margin:26px 0 40px">
            <div class="trust-badge">&#9889; Automated mirroring</div>
            <div class="trust-badge">&#128737; Audited track records</div>
            <div class="trust-badge">&#9997; Portfolio stop-loss</div>
            <div class="trust-badge">&#128202; Real-time sync</div>
        </div>

        <div class="pv-grid pv-grid-3 cards">
            @php
                $traders = [
                    ['SK','CryptoMatrix','+186.4%','3-year ROI','128,402','24.1%','#7c3aed','+41.2% YTD'],
                    ['LN','LunaBulls','+143.9%','2-year ROI','94,118','19.7%','#0ea5e9','+26.8% YTD'],
                    ['AS','SatoshiEdge','+119.2%','18-mo ROI','76,541','22.4%','#f59e0b','+18.3% YTD'],
                    ['JT','RektProof','+98.5%','2-year ROI','61,204','26.0%','#ef4444','+15.1% YTD'],
                    ['MK','OrbitQuant','+87.1%','1-year ROI','49,877','28.9%','#10b981','+12.4% YTD'],
                    ['PL','PhoenixAlgo','+76.9%','1-year ROI','38,115','31.2%','#38bdf8','+9.8% YTD'],
                ];
            @endphp
            @foreach($traders as $t)
            <div class="pv-panel pv-card" style="padding:22px">
                @if($t[2] == '+186.4%')<span class="pv-chip pv-chip-gold" style="float:right">&#128293; #1</span>@endif
                <div style="display:flex;align-items:center;gap:13px">
                    <div style="width:46px;height:46px;border-radius:50%;background:{{ $t[6] }};display:grid;place-items:center;font-weight:800;color:#fff">{{ $t[0] }}</div>
                    <div>
                        <div style="font-weight:700">{{ $t[1] }}</div>
                        <div class="pv-mut" style="font-size:.78rem">{{ $t[4] }} copiers</div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;margin:16px 0;padding:12px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
                    <div><div class="num" style="font-weight:800;color:var(--acc)">{{ $t[2] }}</div><div class="pv-mut" style="font-size:.72rem">{{ $t[3] }}</div></div>
                    <div><div class="num" style="font-weight:800">{{ $t[5] }}</div><div class="pv-mut" style="font-size:.72rem">Win rate</div></div>
                    <div><div class="num" style="font-weight:800;color:var(--gold)">{{ $t[7] }}</div><div class="pv-mut" style="font-size:.72rem">YTD</div></div>
                </div>
                <a href="{{ route('register') }}" class="pv-btn pv-btn-block pv-btn-sm">Start Copying</a>
            </div>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:40px">
            <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Become a Copier &mdash; It's Free</a>
        </div>
    </div>
</section>

<!-- How copy works -->
<section class="pv-section" id="how-it-works">
    <div class="pv-container">
        <div style="text-align:center;max-width:620px;margin:0 auto 40px">
            <p class="pv-tag" style="text-align:center">How it works</p>
            <h2 class="pv-h2">Copy trading in three simple steps</h2>
        </div>
        <div class="pv-grid pv-grid-3" style="gap:20px">
            <div class="step-box"><div class="step-num">1</div><h3 style="margin:10px 0">Choose a trader</h3><p class="pv-foot">Compare verified track records, win rates and risk scores. Transparent, audited stats only.</p></div>
            <div class="step-box"><div class="step-num">2</div><h3 style="margin:10px 0">Set your allocation</h3><p class="pv-foot">Decide how much of your balance to mirror &mdash; you keep full ownership of your funds.</p></div>
            <div class="step-box"><div class="step-num">3</div><h3 style="margin:10px 0">Earn automatically</h3><p class="pv-foot">Every trade they take is copied to your account in real time. Watch your portfolio grow.</p></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line)">
    <div class="pv-container" style="text-align:center">
        <h2 class="pv-h2">Ready to let proven traders do the work?</h2>
        <p class="pv-lead" style="margin:12px auto 26px">Open a free account and start copying in minutes. You stay in control of every allocation.</p>
        <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Create Free Account</a>
    </div>
</section>
@endsection
