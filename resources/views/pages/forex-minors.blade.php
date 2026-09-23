@extends('layouts.app')

@section('title', 'Forex Minors · PrimeVest Markets')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <p class="pv-tag">Forex · Minors</p>
        <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.5rem)">Cross currency pairs</h1>
        <p class="pv-lead" style="margin:12px 0 0">Pairs that skip the US Dollar for unique spread and trend opportunities.</p>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container" style="max-width:980px">
        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            @php
                $pairs = [
                    ['EUR/GBP','0.8554',0.13,'0.8571','0.8529'],
                    ['EUR/JPY','171.20',0.62,'171.88','170.45'],
                    ['GBP/JPY','200.19',0.74,'200.96','198.70'],
                    ['CHF/JPY','178.42',0.44,'179.02','177.61'],
                    ['EUR/CHF','0.9687','-0.26','0.9713','0.9659'],
                    ['GBP/AUD','1.9035',0.28,'1.9081','1.8957'],
                    ['EUR/CAD','1.4841','-0.11','1.4873','1.4802'],
                ];
            @endphp
            <table class="pv-table">
                <thead><tr><th style="padding-left:22px">Pair</th><th>Bid</th><th>24h %</th><th>High</th><th>Low</th><th></th></tr></thead>
                <tbody>
                    @foreach($pairs as $p)
                    <tr>
                        <td style="padding-left:22px;font-weight:700" class="num">{{ $p[0] }}</td>
                        <td class="num" style="font-weight:700">{{ $p[1] }}</td>
                        <td><span class="pill {{ str_starts_with($p[2],'-') ? 'pill-down' : 'pill-up' }} num">{{ $p[2] }}%</span></td>
                        <td class="num pv-mut">{{ $p[3] }}</td>
                        <td class="num pv-mut">{{ $p[4] }}</td>
                        <td style="text-align:right;padding-right:22px"><a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Trade</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div style="display:flex;justify-content:center;gap:22px;flex-wrap:wrap;margin-top:30px;font-size:.9rem">
            <a href="{{ route('forex.majors') }}" class="pv-chip" style="padding:9px 18px">Majors</a>
            <a href="{{ route('forex.minors') }}" class="pv-chip pv-chip-gold" style="padding:9px 18px">Minors</a>
            <a href="{{ route('forex.exotics') }}" class="pv-chip" style="padding:9px 18px">Exotics</a>
        </div>
    </div>
</section>
@endsection