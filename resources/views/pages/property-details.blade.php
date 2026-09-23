@extends('layouts.app')

@section('title', 'Fund Overview · PrimeVest Real Estate')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <a href="{{ route('real-estate') }}" class="pv-chip" style="margin-bottom:18px">← All property funds</a>
        <div style="display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:20px">
            <div>
                <p class="pv-tag">Property Fund #{{ $id }}</p>
                <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.6rem)">Manhattan Office Portfolio</h1>
                <p class="pv-lead" style="margin:12px 0 0">A premium commercial asset in one of the world's strongest office markets.</p>
            </div>
            <span class="pv-chip pv-chip-gold" style="font-size:.9rem;padding:10px 18px">Open for investment</span>
        </div>

        <div class="pv-grid pv-grid-4" style="gap:16px;margin-top:38px">
            <div class="pv-stat"><b class="num" style="color:var(--acc)">8.2%</b><span>Est. yearly yield</span></div>
            <div class="pv-stat"><b class="num">$50M</b><span>Fund size</span></div>
            <div class="pv-stat"><b class="num">$100</b><span>Minimum entry</span></div>
            <div class="pv-stat"><b class="num">5 yrs</b><span>Investment term</span></div>
        </div>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container pv-grid pv-grid-2" style="gap:22px">
        <div class="pv-panel" style="padding:28px">
            <h2 class="pv-h2" style="font-size:1.4rem">Fund summary</h2>
            <p class="pv-mut" style="line-height:1.8">The Manhattan Office Portfolio owns a 26-storey Grade-A office building in Midtown Manhattan, leased to long-term corporate tenants on 92% occupancy. Income from rents is distributed to token holders quarterly.</p>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-top:20px">
                <div><div class="pv-mut" style="font-size:.8rem">Occupancy</div><b>92%</b></div>
                <div><div class="pv-mut" style="font-size:.8rem">Net rentable area</div><b>412,000 ft²</b></div>
                <div><div class="pv-mut" style="font-size:.8rem">Tenant grade</div><b>Corporates (NSE 100)</b></div>
                <div><div class="pv-mut" style="font-size:.8rem">Next distribution</div><b>Quarter 4</b></div>
            </div>
            <a href="{{ route('register') }}" class="pv-btn pv-btn-block mt-30" style="margin-top:26px">Invest in this Fund →</a>
        </div>
        <div class="pv-panel" style="padding:28px">
            <h2 class="pv-h2" style="font-size:1.4rem">Why tokenised real estate?</h2>
            <div style="display:flex;gap:14px;align-items:flex-start;margin-bottom:16px"><div class="pv-icon">🏢</div><div><b>Fractional ownership</b><div class="pv-foot" style="margin-top:4px">Own real property from $100 instead of millions — liquidity without the mortgage.</div></div></div>
            <div style="display:flex;gap:14px;align-items:flex-start;margin-bottom:16px"><div class="pv-icon">📈</div><div><b>Passive income</b><div class="pv-foot" style="margin-top:4px">Rental income distributed directly to your account every quarter.</div></div></div>
            <div style="display:flex;gap:14px;align-items:flex-start"><div class="pv-icon">🛡</div><div><b>Managed for you</b><div class="pv-foot" style="margin-top:4px">Professional asset managers handle tenants, maintenance and compliance.</div></div></div>
        </div>
    </div>
</section>
@endsection