@extends('layouts.app')

@section('title', 'Markets & Copy Trading · PrimeVest')

@push('styles')
<style>
    .mk-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px}
    .mk-tabs a{padding:9px 18px;border-radius:999px;border:1px solid var(--line);color:var(--muted);font-size:.87rem;font-weight:600;transition:.2s}
    .mk-tabs a:hover,.mk-tabs a.on{background:rgba(47,123,255,.12);color:var(--acc);border-color:rgba(47,123,255,.4)}
</style>
@endpush

@section('content')
<!-- Markets hero -->
<section class="pv-hero" style="padding-bottom:50px">
    <div class="pv-container" style="position:relative;z-index:1">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Live Markets</p>
                <h1 class="pv-h2" style="font-size:clamp(1.8rem,3.4vw,2.6rem)">Spot &amp; futures crypto markets</h1>
                <p class="pv-lead">Professional charting, real-time order books and institutional-grade execution.</p>
            </div>
            <div style="display:flex;gap:12px">
                <a href="{{ route('register') }}" class="pv-btn">Trade Now</a>
                <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-ghost">Open Dashboard</a>
            </div>
        </div>
        <div class="pv-panel" style="padding:12px;height:430px;overflow:hidden">
            <div id="pvAdvChart" style="height:100%"></div>
        </div>
    </div>
</section>

<!-- Market table -->
<section class="pv-section" style="padding-top:26px" id="spot">
    <div class="pv-container">
        <div style="display:flex;align-items:center;gap:26px;flex-wrap:wrap;margin-bottom:22px">
            <h2 class="pv-h2" style="font-size:1.6rem">Top crypto assets</h2>
            <div class="mk-tabs" style="margin-bottom:0">
                <a href="#spot" class="on">Spot</a>
                <a href="#spot">Futures</a>
                <a href="#spot">Margin</a>
                <a href="#spot">Staking</a>
            </div>
        </div>
        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            <table class="pv-table">
                <thead><tr><th style="padding-left:22px">#</th><th>Asset</th><th>Price</th><th>24h Change</th><th>24h High</th><th>24h Low</th><th>Volume</th><th></th></tr></thead>
                <tbody>
                    @php
                        $coins = [
                            ['btc.png','Bitcoin',67241.80,2.41,67890.00,66322.10,'28.4B'],
                            ['eth.png','Ethereum',3482.15,-0.86,3550.40,3401.00,'17.1B'],
                            ['bch.png','Bitcoin Cash',611.40,1.08,628.90,596.30,'1.02B'],
                            ['doge.png','Dogecoin',0.1524,5.72,0.1598,0.1421,'2.9B'],
                            ['btc.png','Solana',152.34,4.02,158.10,145.60,'6.4B'],
                            ['eth.png','BNB',584.90,1.27,592.40,575.80,'2.2B'],
                            ['bch.png','XRP',0.5841,3.18,0.5920,0.5520,'1.8B'],
                            ['doge.png','Cardano',0.4520,-0.42,0.4631,0.4480,'980M'],
                        ];
                    @endphp
                    @foreach($coins as $i=>$c)
                    <tr>
                        <td class="pv-mut num" style="padding-left:22px">{{ $i+1 }}</td>
                        <td>
                            <div style="display:flex;align-items:center;gap:12px">
                                <img src="{{ asset('/images/'.$c[0]) }}" width="30" height="30" alt="{{ $c[1] }}" style="border-radius:50%">
                                <div><div style="font-weight:700">{{ $c[1] }}</div><div class="pv-mut" style="font-size:.76rem">{{ strtoupper(substr(str_replace(' ','',$c[1]),0,5)) }}</div></div>
                            </div>
                        </td>
                        <td class="num" style="font-weight:700">${{ $c[2] < 1 ? number_format($c[2],4) : number_format($c[2],2) }}</td>
                        <td><span class="pill {{ $c[3] >= 0 ? 'pill-up' : 'pill-down' }} num">{{ $c[3] >= 0 ? '+' : '' }}{{ $c[3] }}%</span></td>
                        <td class="num pv-mut">${{ $c[4] < 1 ? number_format($c[4],4) : number_format($c[4],2) }}</td>
                        <td class="num pv-mut">${{ $c[5] < 1 ? number_format($c[5],4) : number_format($c[5],2) }}</td>
                        <td class="num pv-mut">{{ $c[6] }}</td>
                        <td style="text-align:right;padding-right:22px"><a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Trade</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- Copy trading anchor section -->
<section id="copy-trading" class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:660px;margin:0 auto 18px">
            <p class="pv-tag" style="text-align:center">Copy Trading</p>
            <h2 class="pv-h2">Mirror the moves of crypto's best traders</h2>
            <p class="pv-lead" style="margin:10px auto 0">Instead of building a strategy from scratch, follow verified professionals. Your account automatically mirrors their trades — win when they win.</p>
        </div>

        <div style="display:flex;flex-wrap:wrap;gap:20px;align-items:center;justify-content:center;margin:26px 0 40px">
            <div class="trust-badge">⚡ Automated mirroring</div>
            <div class="trust-badge">🛡 Audited track records</div>
            <div class="trust-badge">✋ Portfolio stop-loss</div>
            <div class="trust-badge">📊 Real-time sync</div>
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
                @if($t[2] == '+186.4%')<span class="pv-chip pv-chip-gold" style="float:right">🔥 #1</span>@endif
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
            <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Become a Copier — It's Free</a>
        </div>
    </div>
</section>

<!-- How copy works -->
<section class="pv-section">
    <div class="pv-container">
        <div style="text-align:center;max-width:620px;margin:0 auto 40px">
            <p class="pv-tag" style="text-align:center">How it works</p>
            <h2 class="pv-h2">Copy trading in three simple steps</h2>
        </div>
        <div class="pv-grid pv-grid-3" style="gap:20px">
            <div class="step-box"><div class="step-num">1</div><h3 style="margin:10px 0">Choose a trader</h3><p class="pv-foot">Compare verified track records, win rates and risk scores. Transparent, audited stats only.</p></div>
            <div class="step-box"><div class="step-num">2</div><h3 style="margin:10px 0">Set your allocation</h3><p class="pv-foot">Decide how much of your balance to mirror — you keep full ownership of your funds.</p></div>
            <div class="step-box"><div class="step-num">3</div><h3 style="margin:10px 0">Earn automatically</h3><p class="pv-foot">Every trade they take is copied to your account in real time. Watch your portfolio grow.</p></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<script>
    window.addEventListener('load',()=>{
        if(typeof TradingView!=='undefined'){
            new TradingView.widget({
                container_id:"pvAdvChart","width":"100%","height":"100%",
                "symbol":"BINANCE:BTCUSDT","interval":"60","timezone":"Etc/UTC","theme":"dark","style":"1",
                "locale":"en","toolbar_bg":"#0c1322","enable_publishing":false,"allow_symbol_change":true,
                "hide_side_toolbar":false,"studies":["Volume@tv-basicstudies","MACD@tv-basicstudies"]
            });
        }
    });
</script>
@endpush