@extends('layouts.app')

@section('title', 'Forex Exotics · PrimeVest Markets')

@section('content')
<section class="pv-hero">
    <div class="pv-container" style="position:relative;z-index:1;max-width:980px">
        <p class="pv-tag">Forex · Exotics</p>
        <h1 class="pv-h1" style="font-size:clamp(1.8rem,3.2vw,2.5rem)">Emerging-market pairs</h1>
        <p class="pv-lead" style="margin:12px 0 0">Higher volatility meets higher reward. Trade with PrimeVest's institutional spreads.</p>
    </div>
</section>

<section class="pv-section" style="padding-top:0">
    <div class="pv-container" style="max-width:980px">
        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            @php
                $pairs = [
                    ['USD/TRY','34.21',1.12,'34.60','33.90'],
                    ['USD/ZAR','18.44','-0.32','18.61','18.35'],
                    ['USD/MXN','17.19',0.08,'17.28','17.09'],
                    ['USD/PLN','4.0162',0.17,'4.0320','3.9985'],
                    ['USD/HKD','7.8104',0.01,'7.8132','7.8066'],
                    ['USD/SGD','1.3491','-0.21','1.3528','1.3459'],
                    ['EUR/TRY','40.98',1.47,'41.42','40.52'],
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
            <a href="{{ route('forex.minors') }}" class="pv-chip" style="padding:9px 18px">Minors</a>
            <a href="{{ route('forex.exotics') }}" class="pv-chip pv-chip-gold" style="padding:9px 18px">Exotics</a>
        </div>
    </div>
</section>
@endsection