@extends('layouts.app')

@section('title', 'Pricing · PrimeVest')

@push('styles')
<style>
    .pr-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;align-items:stretch}
    @media(max-width:1080px){.pr-grid{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:620px){.pr-grid{grid-template-columns:1fr}}

    .pr-card{position:relative;display:flex;flex-direction:column;padding:26px 24px 24px;
        border-radius:20px;border:1px solid var(--line);background:var(--panel);
        transition:transform .28s cubic-bezier(.4,0,.2,1),border-color .28s,box-shadow .28s}
    .pr-card:hover{transform:translateY(-5px);border-color:rgba(47,123,255,.4);
        box-shadow:0 28px 56px -28px rgba(0,0,0,.6)}
    /* featured tier */
    .pr-card.is-top{border-color:rgba(47,123,255,.5);
        background:linear-gradient(180deg,rgba(47,123,255,.10),var(--panel) 42%);
        box-shadow:0 24px 60px -30px rgba(47,123,255,.55)}
    .pr-flag{position:absolute;top:-12px;left:50%;transform:translateX(-50%);
        padding:5px 14px;border-radius:999px;font-size:.68rem;font-weight:800;letter-spacing:.11em;
        text-transform:uppercase;white-space:nowrap;
        background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04121f}

    .pr-eyebrow{font-size:.66rem;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:var(--muted)}
    .pr-amount{display:flex;align-items:baseline;gap:4px;margin:6px 0 2px}
    .pr-amount .cur{font-size:1.15rem;font-weight:700;color:var(--muted)}
    .pr-amount .val{font-size:2.5rem;font-weight:800;line-height:1;letter-spacing:-.025em;
        font-variant-numeric:tabular-nums;
        background:linear-gradient(135deg,var(--acc2),var(--acc));
        -webkit-background-clip:text;background-clip:text;color:transparent}
    .pr-name{font-size:1.06rem;font-weight:800;margin-top:12px;letter-spacing:-.01em}
    .pr-desc{color:var(--muted);font-size:.86rem;line-height:1.55;margin-top:6px;min-height:42px}

    .pr-feats{list-style:none;margin:20px 0 0;padding:18px 0 0;border-top:1px solid var(--line);
        display:flex;flex-direction:column;gap:11px;flex:1}
    .pr-feats li{display:flex;align-items:flex-start;gap:10px;font-size:.85rem;line-height:1.45}
    .pr-feats .k{color:var(--muted);flex:1}
    .pr-feats .v{font-weight:700;text-align:right;font-variant-numeric:tabular-nums;white-space:nowrap}
    .pr-feats .v.hi{color:var(--acc)}
    .pr-feats .v.gold{color:var(--gold)}
    .pr-tick{flex-shrink:0;width:17px;height:17px;margin-top:1px;border-radius:50%;
        display:grid;place-items:center;background:rgba(47,123,255,.14);color:var(--acc);font-size:.6rem;font-weight:800}

    .pr-cta{margin-top:22px}
    .pr-note{margin:34px auto 0;max-width:760px;text-align:center;color:var(--muted);font-size:.78rem;line-height:1.6}
    [data-theme="light"] .pr-card.is-top{background:linear-gradient(180deg,rgba(47,123,255,.12),var(--panel) 42%)}
    [data-theme="light"] .pr-tick{background:rgba(47,123,255,.16)}
</style>
@endpush

@section('content')
<!-- Hero -->
<section class="pv-hero" style="padding-bottom:52px">
    <div class="pv-container" style="position:relative;z-index:1">
        <div style="max-width:760px">
            <p class="pv-tag">Pricing</p>
            <h1 class="pv-h1" style="font-size:clamp(1.9rem,3.8vw,3rem)">Account plans that scale with your capital</h1>
            <p class="pv-lead">Choose the tier that matches your deposit. Every plan includes instant funding and withdrawal, a referral bonus, and round-the-clock execution.</p>
        </div>
    </div>
</section>

<!-- Plans -->
<section class="pv-section" style="padding-top:0">
    <div class="pv-container">
        <div class="pr-grid">
            @php
                /* amounts are stored without the currency symbol so the template
                   controls exactly where "$" is rendered */
                $plans = [
                    ['Basic',    '500',    '500',    '999',     '25%', 'Benefit from industry-leading entry prices',    false],
                    ['Standard', '1,000',  '1,000',  '9,999',   '30%', 'Receive even tighter spreads and commissions', true],
                    ['Silver',   '10,000', '10,000', '49,999',  '35%', 'Benefit from industry-leading entry prices',    false],
                    ['Gold',     '50,000', '50,000', '100,000', '40%', 'Receive even tighter spreads and commissions', false],
                ];
            @endphp

            @foreach($plans as $p)
            <div class="pr-card {{ $p[6] ? 'is-top' : '' }}">
                @if($p[6])<span class="pr-flag">Most popular</span>@endif

                <div class="pr-eyebrow">Minimum funding</div>
                <div class="pr-amount">
                    <span class="cur">$</span><span class="val">{{ $p[1] }}</span>
                </div>                <div class="pr-name">{{ $p[0] }} plan</div>
                <p class="pr-desc">{{ $p[5] }}</p>

                <ul class="pr-feats">
                    <li><span class="pr-tick">&check;</span><span class="k">Min. possible deposit</span><span class="v">${{ $p[2] }}</span></li>
                    <li><span class="pr-tick">&check;</span><span class="k">Max. possible deposit</span><span class="v">${{ $p[3] }}</span></li>
                    <li><span class="pr-tick">&check;</span><span class="k">Return on investment</span><span class="v hi">{{ $p[4] }}</span></li>
                    <li><span class="pr-tick">&check;</span><span class="k">Referral bonus</span><span class="v gold">5%</span></li>
                    <li><span class="pr-tick">&check;</span><span class="k">Duration</span><span class="v">24 hours</span></li>
                    <li><span class="pr-tick">&check;</span><span class="k">Instant deposit &amp; withdrawal</span><span class="v">&check;</span></li>
                </ul>

                <div class="pr-cta">
                    <a href="{{ route('register') }}" class="pv-btn pv-btn-block {{ $p[6] ? '' : 'pv-btn-ghost' }}">Open an Account</a>
                </div>
            </div>
            @endforeach
        </div>

        <p class="pr-note">
            Returns shown are target figures for the plan duration and are not guaranteed. Trading involves
            risk and you can lose some or all of your deposited funds. Minimum funding is required before
            live execution begins.
        </p>
    </div>
</section>

<!-- CTA -->
<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line)">
    <div class="pv-container" style="text-align:center">
        <h2 class="pv-h2">Not sure which tier fits?</h2>
        <p class="pv-lead" style="margin:12px auto 26px">Open a free account first and upgrade your plan whenever your capital grows.</p>
        <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Create Free Account</a>
    </div>
</section>
@endsection
