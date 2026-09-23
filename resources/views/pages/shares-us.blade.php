@extends('layouts.app')

@section('title', 'US Shares · PrimeVest Stock Trading')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Shares · United States</p>
                <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.5rem)">Own the giants of Wall Street</h1>
                <p class="pv-lead" style="margin:12px 0 0">Trade fractional shares of America's biggest companies, commission-free on PrimeVest.</p>
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
                    ['AAPL','Apple Inc.',232.45,1.14,'Technology'],
                    ['MSFT','Microsoft Corp.',428.90,0.72,'Technology'],
                    ['NVDA','NVIDIA Corp.',132.66,2.31,'Semiconductors'],
                    ['GOOGL','Alphabet Inc.',174.20,0.48,'Communication'],
                    ['AMZN','Amazon.com Inc.',198.04,'-0.35','Consumer'],
                    ['META','Meta Platforms',602.15,1.92,'Communication'],
                    ['TSLA','Tesla Inc.',248.31,'-1.08','Automotive'],
                    ['JPM','JPMorgan Chase',224.60,0.85,'Financials'],
                ];
            @endphp
            <table class="pv-table">
                <thead><tr><th style="padding-left:22px">Ticker</th><th>Company</th><th>Price</th><th>24h %</th><th>Sector</th><th></th></tr></thead>
                <tbody>
                    @foreach($stocks as $s)
                    <tr>
                        <td style="padding-left:22px;font-weight:700" class="num">{{ $s[0] }}</td>
                        <td>{{ $s[1] }}</td>
                        <td class="num" style="font-weight:700">${{ number_format($s[2],2) }}</td>
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
            <a href="{{ route('shares.us') }}" class="pv-chip pv-chip-gold" style="padding:9px 18px">US Shares</a>
            <a href="{{ route('shares.uk') }}" class="pv-chip" style="padding:9px 18px">UK Shares</a>
        </div>
    </div>
</section>
@endsection