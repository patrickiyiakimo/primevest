@extends('layouts.app')

@section('title', 'Real Estate Investment · PrimeVest')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:1020px;text-align:center">
        <p class="pv-tag" style="text-align:center">Tokenised Real Estate</p>
        <h1 class="pv-h1">Own property, without the headaches</h1>
        <p class="pv-lead" style="margin:16px auto 0">Invest in income-generating commercial and residential real estate from as little as $100. No mortgages, no management, no paperwork.</p>
        <div class="pv-stats" style="margin-top:40px">
            <div class="pv-stat"><b class="num" style="color:var(--acc)">11.4%</b><span>Average annual yield</span></div>
            <div class="pv-stat"><b class="num">$780M</b><span>Managed property</span></div>
            <div class="pv-stat"><b class="num">30+</b><span>Active funds</span></div>
            <div class="pv-stat"><b class="num">Quarterly</b><span>Income distribution</span></div>
        </div>
    </div>
</section>

@php
    $props = [
        ['id'=>1,'Manhattan Office Portfolio','Commercial · New York, USA','$50,000,000','8.2%','$100','#7c3aed'],
        ['id'=>2,'Dubai Marina Residences','Residential · Dubai, UAE','$24,000,000','9.6%','$100','#0ea5e9'],
        ['id'=>3,'Berlin Mixed-Use Campus','Mixed · Berlin, DE','$31,500,000','7.9%','$250','#f59e0b'],
        ['id'=>4,'Austin Tech Lofts','Residential · Texas, USA','$18,200,000','10.4%','$100','#10b981'],
        ['id'=>5,'London Grade-A Offices','Commercial · London, UK','$44,000,000','8.8%','$250','#3b82f6'],
        ['id'=>6,'Singapore Logistics Hub','Industrial · Singapore','$27,800,000','12.1%','$100','#ef4444'],
    ];
@endphp
<section class="pv-section" style="padding-top:0">
    <div class="pv-container">
        <div style="display:flex;align-items:end;justify-content:space-between;flex-wrap:wrap;gap:14px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Open for investment</p>
                <h2 class="pv-h2" style="font-size:1.7rem">Featured property funds</h2>
            </div>
            <p class="pv-mut" style="margin:0">Prices shown are total fund valuation</p>
        </div>
        <div class="pv-grid pv-grid-3" style="gap:18px">
            @foreach($props as $p)
            <a href="{{ route('real-estate.show', $p['id']) }}" class="pv-panel pv-card" style="padding:0;overflow:hidden;display:flex;flex-direction:column">
                <div style="height:150px;background:linear-gradient(140deg,{{ $p[5] }}33,{{ $p[5] }}11);display:grid;place-items:center;font-size:2.2rem">🏢</div>
                <div style="padding:20px;flex:1;display:flex;flex-direction:column;justify-content:space-between">
                    <div>
                        <h3 style="margin:0 0 6px;font-size:1.02rem">{{ $p[0] }}</h3>
                        <p class="pv-mut" style="margin:0 0 16px;font-size:.85rem">{{ $p[1] }}</p>
                    </div>
                    <div>
                        <div style="display:flex;justify-content:space-between;padding:8px 0;border-top:1px solid var(--line)"><span class="pv-mut" style="font-size:.8rem">Fund size</span><b class="num">${{ $p[2] }}</b></div>
                        <div style="display:flex;justify-content:space-between;padding:8px 0;border-top:1px solid var(--line)"><span class="pv-mut" style="font-size:.8rem">Est. yield</span><b class="num" style="color:var(--acc)">{{ $p[3] }}</b></div>
                        <div style="display:flex;justify-content:space-between;padding:8px 0;border-top:1px solid var(--line)"><span class="pv-mut" style="font-size:.8rem">Min entry</span><b class="num">${{ $p[4] }}</b></div>
                        <div class="pv-btn pv-btn-block pv-btn-sm mt10" style="margin-top:12px">View Fund</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection