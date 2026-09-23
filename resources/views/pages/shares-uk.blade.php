@extends('layouts.app')

@section('title', 'UK Shares · PrimeVest Stock Trading')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Shares · United Kingdom</p>
                <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.5rem)">Blue chips of the FTSE</h1>
                <p class="pv-lead" style="margin:12px 0 0">Invest in the UK's most established companies — energy, banking and industry.</p>
            </div>
            <div style="display:flex;gap:10px">
                <a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Open Account</a>
            </div>
        </div>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container" style="max-width:980px">
        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            @php
                $stocks = [
                    ['SHEL','Shell plc',27.84,0.64,'Energy'],
                    ['HSBA','HSBC Holdings',6.71,0.90,'Banking'],
                    ['BP.','BP plc',4.12,'-0.48','Energy'],
                    ['ULVR','Unilever plc',46.20,0.31,'Consumer'],
                    ['BARC','Barclays plc',2.60,1.17,'Banking'],
                    ['VOD','Vodafone Group',0.72,0.85,'Telecoms'],
                    ['GSK','GSK plc',14.55,'-0.22','Pharma'],
                    ['NGG','National Grid',9.41,0.53,'Utilities'],
                ];
            @endphp
            <table class="pv-table">
                <thead><tr><th style="padding-left:22px">Ticker</th><th>Company</th><th>Price (£)</th><th>24h %</th><th>Sector</th><th></th></tr></thead>
                <tbody>
                    @foreach($stocks as $s)
                    <tr>
                        <td style="padding-left:22px;font-weight:700" class="num">{{ $s[0] }}</td>
                        <td>{{ $s[1] }}</td>
                        <td class="num" style="font-weight:700">£{{ number_format($s[2],2) }}</td>
                        <td><span class="pill {{ str_starts_with((string)$s[3],'-') ? 'pill-down' : 'pill-up' }} num">{{ $s[3] }}%</span></td>
                        <td class="pv-mut">{{ $s[4] }}</td>
                        <td style="text-align:right;padding-right:22px"><a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Trade</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div style="display:flex;justify-content:center;gap:22px;margin-top:30px;font-size:.9rem">
            <a href="{{ route('shares.us') }}" class="pv-chip" style="padding:9px 18px">US Shares</a>
            <a href="{{ route('shares.uk') }}" class="pv-chip pv-chip-gold" style="padding:9px 18px">UK Shares</a>
        </div>
    </div>
</section>
@endsection