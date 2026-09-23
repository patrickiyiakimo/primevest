@extends('layouts.app')

@section('title', 'Forex Majors · PrimeVest Markets')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Forex · Majors</p>
                <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.5rem)">The world's most-traded currency pairs</h1>
                <p class="pv-lead" style="margin:12px 0 0">Trade the big seven pairs with deep liquidity and spreads from 0.1 pips.</p>
            </div>
            <div style="display:flex;gap:10px">
                <a href="{{ route('forex.minors') }}">Minor Pairs</a>
                <a href="{{ route('forex.exotics') }}">Exotic Pairs</a>
            </div>
        </div>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container" style="max-width:980px">
        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            @php
                $pairs = [
                    ['EUR/USD','Euro / US Dollar',1.0872,0.32,1.0891,1.0835],
                    ['GBP/USD','British Pound / US Dollar',1.2718,-0.18,1.2752,1.2671],
                    ['USD/JPY','US Dollar / Japanese Yen',157.42,0.55,157.95,156.80],
                    ['USD/CHF','US Dollar / Swiss Franc',0.8812,0.11,0.8836,0.8769],
                    ['AUD/USD','Australian Dollar / US Dollar',0.6683,0.74,0.6710,0.6642],
                    ['USD/CAD','US Dollar / Canadian Dollar',1.3658,-0.09,1.3692,1.3621],
                    ['NZD/USD','New Zealand Dollar / US Dollar',0.6124,0.41,0.6150,0.6092],
                ];
            @endphp
            <table class="pv-table">
                <thead><tr><th style="padding-left:22px">Pair</th><th>Name</th><th>Bid</th><th>24h %</th><th>High</th><th>Low</th><th></th></tr></thead>
                <tbody>
                    @foreach($pairs as $p)
                    <tr>
                        <td style="padding-left:22px;font-weight:700" class="num">{{ $p[0] }}</td>
                        <td class="pv-mut">{{ $p[1] }}</td>
                        <td class="num" style="font-weight:700">{{ $p[2] }}</td>
                        <td><span class="pill {{ $p[3] >= 0 ? 'pill-up' : 'pill-down' }} num">{{ $p[3] >= 0 ? '+' : '' }}{{ $p[3] }}%</span></td>
                        <td class="num pv-mut">{{ $p[4] }}</td>
                        <td class="num pv-mut">{{ $p[5] }}</td>
                        <td style="text-align:right;padding-right:22px"><a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Trade</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div style="display:flex;justify-content:center;gap:22px;flex-wrap:wrap;margin-top:30px;font-size:.9rem">
            <a href="{{ route('forex.majors') }}" class="pv-chip pv-chip-gold" style="padding:9px 18px">Majors</a>
            <a href="{{ route('forex.minors') }}" class="pv-chip" style="padding:9px 18px">Minors</a>
            <a href="{{ route('forex.exotics') }}" class="pv-chip" style="padding:9px 18px">Exotics</a>
        </div>
    </div>
</section>
@endsection