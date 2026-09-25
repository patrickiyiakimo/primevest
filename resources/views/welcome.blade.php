@extends('layouts.app')

@section('title', 'PrimeVest | Trusted Crypto Investment Platform')

@push('styles')
<style>
    .hero-badge{display:inline-flex;align-items:center;gap:8px;padding:7px 15px;border-radius:999px;background:rgba(47,123,255,.1);border:1px solid rgba(47,123,255,.28);color:var(--acc);font-size:.82rem;font-weight:600;margin-bottom:22px}
    .hero-badge .dot{width:7px;height:7px;border-radius:50%;background:var(--acc);box-shadow:0 0 0 0 rgba(47,123,255,.7);animation:pulse 2s infinite}
    @keyframes pulse{0%{box-shadow:0 0 0 0 rgba(47,123,255,.6)}70%{box-shadow:0 0 0 10px rgba(47,123,255,0)}100%{box-shadow:0 0 0 0 rgba(47,123,255,0)}}
    .hero-actions{display:flex;flex-wrap:wrap;gap:14px;margin-top:34px}
    .hero-note{display:flex;flex-direction:column;gap:6px;color:var(--muted);font-size:.84rem;margin-top:30px}
    .hero-note b{color:var(--text)}
    .hero-trust{display:flex;gap:26px;margin-top:26px;color:var(--muted);font-size:.82rem}
    .hero-trust span{display:inline-flex;align-items:center;gap:7px}
    .hero-card{border-radius:24px;overflow:hidden;background:linear-gradient(180deg,#0d1526,#0a0f1c);border:1px solid var(--line);box-shadow:0 60px 120px -60px rgba(0,0,0,.9)}
    .pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:999px;font-size:.8rem;font-weight:700}
    .pill-up{background:rgba(47,123,255,.14);color:var(--acc)}
    .pill-down{background:rgba(239,68,68,.14);color:#ff7c85}
    .market-row{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    @media(max-width:880px){.market-row{grid-template-columns:repeat(2,1fr)}}
    .tips li{margin:8px 0;color:var(--muted);font-size:.95rem}
    .tips li b{color:var(--text)}
    .copy-chip{display:flex;align-items:center;gap:10px;padding:18px;border-radius:13px;background:rgba(255,255,255,.035);border:1px solid var(--line);transition:.3s}
    @media(max-width:900px){.ct-cards,.wh-cards{grid-template-columns:1fr!important}}
    .trader-av{width:44px;height:44px;border-radius:50%;display:grid;place-items:center;font-weight:800;color:#fff;font-size:1rem;flex-shrink:0}
    .trust-badge{padding:14px 22px;border-radius:14px;background:rgba(255,255,255,.03);border:1px solid var(--line);font-size:.9rem;color:var(--muted);display:flex;align-items:center;gap:10px}
    .step-box{padding:26px;border-radius:16px;background:rgba(255,255,255,.035);border:1px solid var(--line);text-align:center;height:100%}
    .step-num{width:40px;height:40px;border-radius:12px;margin:0 auto 14px;display:grid;place-items:center;font-weight:800;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d}
    /* ---- hero rotating rubik's cube ---- */
    .cube-stage{position:relative;height:430px;display:flex;align-items:center;justify-content:center;perspective:1100px;overflow:hidden}
    .cube-glow{position:absolute;left:50%;top:50%;width:540px;height:540px;transform:translate(-50%,-50%);background:radial-gradient(circle,rgba(47,123,255,.20),rgba(124,58,237,.12) 45%,transparent 72%);z-index:0}
    .cube{position:relative;width:230px;height:230px;transform-style:preserve-3d;animation:cubespin 22s linear infinite;z-index:1;filter:drop-shadow(0 30px 50px rgba(0,0,0,.55))}
    .cube-face{position:absolute;inset:0;display:grid;grid-template-columns:repeat(3,1fr);grid-template-rows:repeat(3,1fr);gap:4px;padding:7px;background:#0c1322;border-radius:9px;box-shadow:inset 0 0 0 1px rgba(255,255,255,.09)}
    .cube-face span{display:block;border-radius:3px;box-shadow:inset 0 2px 6px rgba(0,0,0,.3)}
    .cell-front span{background:#2f7bff}.cell-back span{background:#f0b90b}.cell-left span{background:#7c3aed}
    .cell-right span{background:#1fd594}.cell-top span{background:#4cc3ff}.cell-bottom span{background:#ff5c6e}
    .cube-front{transform:translateZ(115px)}
    .cube-back{transform:rotateY(180deg) translateZ(115px)}
    .cube-left{transform:rotateY(-90deg) translateZ(115px)}
    .cube-right{transform:rotateY(90deg) translateZ(115px)}
    .cube-top{transform:rotateX(90deg) translateZ(115px)}
    .cube-bottom{transform:rotateX(-90deg) translateZ(115px)}
    @keyframes cubespin{0%{transform:rotateX(-20deg) rotateY(0deg)}100%{transform:rotateX(-20deg) rotateY(360deg)}}
    @media(max-width:520px){.cube-stage{height:340px}.cube{width:190px;height:190px}.cube-front{transform:translateZ(95px)}.cube-back{transform:rotateY(180deg) translateZ(95px)}.cube-left{transform:rotateY(-90deg) translateZ(95px)}.cube-right{transform:rotateY(90deg) translateZ(95px)}.cube-top{transform:rotateX(90deg) translateZ(95px)}.cube-bottom{transform:rotateX(-90deg) translateZ(95px)}}
    /* ---- hero background chart ---- */
    .hero-bgchart{position:absolute;inset:0;width:100%;height:100%;z-index:0;pointer-events:none}
    .hero-bgchart .bg-area{fill:url(#bgArea)}
    .hero-bgchart .bg-path{fill:none;stroke:url(#bgLine);stroke-width:2.2;opacity:.8}
    .hero-bgchart .bg-dash{stroke:#4cc3ff;stroke-dasharray:6 9;opacity:.5}
    /* ---- awards strip ---- */
    .pv-awards{position:relative;z-index:1;border-bottom:1px solid var(--line);background:var(--bg2);padding:12px 0}
    .pv-awards-in{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:14px}
    .pv-awards-label{font-size:.62rem;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);font-weight:800;text-align:center}
    .pv-awards-row{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:16px}
    .pv-awards img{height:24px;max-width:110px;object-fit:contain;opacity:.85;filter:grayscale(.55) brightness(1.05);transition:.3s}
    .pv-awards img:hover{opacity:1;filter:grayscale(0)}
    @media(max-width:600px){.pv-awards-in{flex-direction:column;gap:8px;text-align:center}.pv-awards img{height:20px}}
    /* ---- as seen on press strip ---- */
    .pv-media{position:relative;z-index:1;border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:var(--bg2);padding:22px 0}
    .pv-media-label{font-size:.66rem;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);font-weight:700;text-align:center;margin-bottom:18px}
    .pv-media-row{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:34px}
    .pv-media img{height:26px;max-width:150px;object-fit:contain;filter:brightness(0) invert(1);opacity:.75;transition:.25s}
    .pv-media img:hover{opacity:1;transform:translateY(-2px)}
    [data-theme="light"] .pv-media img{filter:grayscale(.45) brightness(1.1);opacity:.75}
    [data-theme="light"] .pv-media img:hover{filter:none;opacity:1}
    @media(max-width:600px){.pv-media{padding:18px 0}.pv-media-row{gap:20px}.pv-media img{height:20px;max-width:120px}}
    /* ---- verified trader badge ---- */
    .pv-verif{display:inline-flex;align-items:center;justify-content:center;flex-shrink:0;margin-left:7px;position:relative;vertical-align:middle}
    .pv-verif svg{display:block;width:18px;height:18px;filter:drop-shadow(0 2px 3px rgba(29,107,240,.45))}
    .pv-verif circle{fill:url(#pvTickGrad)}
    .pv-verif path{fill:none;stroke:#fff;stroke-width:2.3;stroke-linecap:round;stroke-linejoin:round}
    .pv-verif:hover .pv-vtip{opacity:1;transform:translate(-50%,2px);pointer-events:auto}
    .pv-vtip{position:absolute;bottom:calc(100% + 9px);left:50%;transform:translate(-50%,4px);width:210px;max-width:calc(100vw - 32px);background:#0a1020;border:1px solid var(--line);border-radius:10px;padding:10px 12px;font-size:.72rem;line-height:1.5;color:var(--muted);text-align:left;opacity:0;pointer-events:none;transition:.2s;z-index:20;box-shadow:0 16px 36px -14px rgba(0,0,0,.85);font-weight:500;white-space:normal}
    .pv-vtip b{color:var(--text)}
    .pv-verif .pv-vtip-emit{content:"";position:absolute;bottom:calc(100% + 2px);left:50%;transform:translateX(-50%);border:7px solid transparent;border-top-color:var(--line)}
    /* ---- wealth section ---- */
    .feat-stat{padding:20px 24px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--line);text-align:center}
    .feat-stat b{display:block;font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,#57c8ff,#2f7bff);-webkit-background-clip:text;background-clip:text;color:transparent}
    .feat-stat span{color:var(--muted);font-size:.8rem}
    .pv-emoji{font-size:110px;line-height:1;display:block;filter:drop-shadow(0 10px 20px rgba(0,0,0,.25))}
    /* ---- academy video ---- */
    .aca-shell{display:grid;grid-template-columns:1.05fr 1fr;gap:34px;align-items:center}
    @media(max-width:900px){.aca-shell{grid-template-columns:1fr}}
    .vid-frame{position:relative;border-radius:18px;overflow:hidden;border:1px solid var(--line);background:#0a0f1c;box-shadow:0 40px 90px -50px rgba(0,0,0,.9)}
    .vid-frame iframe{display:block;width:100%;aspect-ratio:16/9;border:0}
    /* ---- testimonials ---- */
    .t-track{display:flex;flex-wrap:wrap;justify-content:center;gap:22px}
    .t-card{padding:26px;flex:0 1 345px;border-radius:0!important}
    .t-stars{color:var(--gold);letter-spacing:2px}
    .t-av{width:120px;height:120px;border-radius:50%;object-fit:cover;flex-shrink:0;border:3px solid rgba(47,123,255,.35);display:block}
    .t-nav{display:none;justify-content:center;gap:10px;margin-top:24px}
    .t-nav button{width:42px;height:42px;border-radius:0;border:1px solid var(--line);background:transparent;color:var(--text);cursor:pointer;font-size:1.05rem;line-height:1;transition:.2s;font-family:inherit}
    .t-nav button:hover{background:rgba(47,123,255,.12);border-color:rgba(47,123,255,.4)}
    .t-dots{display:none;justify-content:center;gap:8px;margin-top:16px}
    .t-dots button{width:8px;height:8px;border-radius:50%;border:0;padding:0;background:var(--line);cursor:pointer;transition:.2s}
    .t-dots button.on{background:var(--acc);transform:scale(1.25)}
    @media(min-width:901px){.t-nav,.t-dots{display:none}}
    @media(max-width:900px){
        .t-track{flex-wrap:nowrap;justify-content:flex-start;gap:16px;overflow-x:auto;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;scrollbar-width:none;margin:0 -20px;padding:0 20px}
        .t-track::-webkit-scrollbar{display:none}
        .t-card{flex:0 0 86%;scroll-snap-align:center;padding:24px}
        .t-nav{display:flex}
        .t-dots{display:flex}
    }
</style>
@endpush

@section('content')
<!-- ===== HERO ===== -->
<section class="pv-hero">
    <!-- Background chart layer (gradient + grid kept via .pv-hero::before) -->
    <svg class="hero-bgchart" style="position:absolute;inset:0;width:100%;height:100%;z-index:0;pointer-events:none" viewBox="0 0 1440 560" preserveAspectRatio="none" aria-hidden="true">
        <defs>
            <linearGradient id="bgLine" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#2f7bff"/><stop offset=".55" stop-color="#4cc3ff"/><stop offset="1" stop-color="#f0b90b"/>
            </linearGradient>
            <linearGradient id="bgArea" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0" stop-color="#2f7bff" stop-opacity=".2"/><stop offset="1" stop-color="#2f7bff" stop-opacity="0"/>
            </linearGradient>
            <linearGradient id="bgMask" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#05070d"/><stop offset=".2" stop-color="transparent"/><stop offset=".75" stop-color="transparent"/><stop offset="1" stop-color="#05070d"/>
            </linearGradient>
            <mask id="bgFade"><rect width="100%" height="100%" fill="url(#bgMask)"/></mask>
        </defs>
        <g mask="url(#bgFade)">
            <path class="bg-area" d="M0,350 C130,360 210,305 310,245 C430,170 490,215 590,150 C700,75 770,140 870,118 C965,98 1020,195 1120,162 C1240,122 1330,58 1440,38 L1440,540 L0,540 Z"/>
            <path class="bg-path" d="M0,350 C130,360 210,305 310,245 C430,170 490,215 590,150 C700,75 770,140 870,118 C965,98 1020,195 1120,162 C1240,122 1330,58 1440,38"/>
            <path class="bg-path bg-dash" d="M0,300 C150,310 260,248 370,190 C480,130 570,185 670,112 C770,42 850,112 960,82 C1080,50 1160,150 1290,112 C1360,92 1405,42 1440,30"/>
            <circle cx="1440" cy="38" r="4" fill="#f0b90b" opacity=".85"/>
        </g>
    </svg>
    <div class="pv-container" style="position:relative;z-index:1">
        <div class="pv-grid pv-grid-2" style="align-items:center;gap:46px">
            <div>
                <!-- <div class="hero-badge"><span class="dot"></span> Institutional-grade crypto investing for everyone</div> -->
                <h1 class="pv-h1">Trade, stake &amp; grow your <span style="background:linear-gradient(120deg,#2f7bff,#4cc3ff);-webkit-background-clip:text;background-clip:text;color:transparent">digital assets</span> with a platform you can trust.</h1>
                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="pv-btn pv-btn-lg mr-5">Start Trading Free</a>
                    <a href="{{ route('trading') }}#copy-trading" class="pv-btn pv-btn-ghost pv-btn-lg">Explore Copy Trading</a>
                </div>
            </div>

            <!-- Rotating Rubik's cube visual -->
            <div class="hero-card">
                <div class="cube-stage">
                    <div class="cube-glow"></div>
                    <div class="cube">
                        <div class="cube-face cube-front cell-front">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                        <div class="cube-face cube-back cell-back">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                        <div class="cube-face cube-left cell-left">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                        <div class="cube-face cube-right cell-right">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                        <div class="cube-face cube-top cell-top">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                        <div class="cube-face cube-bottom cell-bottom">@for($i=0;$i<9;$i++)<span></span>@endfor</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== AWARDS & RECOGNITION ===== -->
<!-- <section class="pv-awards">
    <div class="pv-container">
        <div class="pv-awards-in">
            <div class="pv-awards-label">Awards &amp; Recognition</div>
            <div class="pv-awards-row">
                <img src="{{ asset('/images/award-2024-investopedia-best-for-advanced-traders.png') }}" alt="Investopedia 2024 — Best for Advanced Traders" title="Investopedia 2024 — Best for Advanced Traders">
                <img src="{{ asset('/images/awards-2026-stockbrokers-professionaltrading.svg') }}" alt="StockBrokers.com 2026 — Professional Trading" title="StockBrokers.com 2026 — Professional Trading">
                <img src="{{ asset('/images/best-online-broker-2026-badges.png') }}" alt="Best Online Broker 2026" title="Best Online Broker 2026">
                <img src="{{ asset('/images/in-wave-award.svg') }}" alt="In-Wave Top Rated Award" title="In-Wave Top Rated Award">
                <img src="{{ asset('/images/INV_broker-advanced_vt-green.svg') }}" alt="Advanced Trading Broker 2026" title="Advanced Trading Broker 2026">
            </div>
        </div>
    </div>
</section> -->

<!-- ===== AS SEEN ON ===== -->
<section class="pv-media">
    <div class="pv-container">
        <div class="pv-media-label">As seen on</div>
        <div class="pv-media-row">
            <img src="{{ asset('images/cnbc.svg') }}" alt="CNBC" title="Featured on CNBC">
            <img src="{{ asset('images/bloomberg.svg') }}" alt="Bloomberg" title="Featured on Bloomberg">
            <img src="{{ asset('images/reuters.svg') }}" alt="Reuters" title="Featured on Reuters">
            <img src="{{ asset('images/theguardian.svg') }}" alt="The Guardian" title="Featured in The Guardian">
        </div>
    </div>
</section>

<!-- ===== LIVE MARKETS (TradingView Ticker Tape) ===== -->
<section class="ticker" style="border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:var(--bg2);position:relative;z-index:1">
    <div id="pvTvTape" style="min-height:44px"><div style="color:var(--muted);font-size:.8rem;padding:14px 20px">Loading live market…</div></div>
    <script>
        (function(){
            var hostSel='#pvTvTape';
            function theme(){try{return document.documentElement.getAttribute('data-theme')==='light'?'light':'dark'}catch(e){return 'dark'}}
            function mount(){
                var host=document.querySelector(hostSel);
                if(!host)return;
                host.innerHTML='';
                var cfg={
                    "symbols":[
                        {"proName":"BITSTAMP:BTCUSD","title":"Bitcoin"},
                        {"proName":"BITSTAMP:ETHUSD","title":"Ethereum"},
                        {"proName":"BINANCE:SOLUSDT","title":"Solana"},
                        {"proName":"BINANCE:BNBUSDT","title":"BNB"},
                        {"proName":"BITFINEX:XRPUSD","title":"XRP"},
                        {"proName":"COINBASE:ADAUSD","title":"Cardano"},
                        {"proName":"COINBASE:DOTUSD","title":"Polkadot"},
                        {"proName":"BINANCE:LINKUSDT","title":"Chainlink"}
                    ],
                    "showSymbolLogo":true,
                    "isTransparent":true,
                    "displayMode":"adaptive",
                    "colorTheme":theme(),
                    "locale":"en"
                };
                var wrap=document.createElement('div');
                wrap.className='tradingview-widget-container';
                var w=document.createElement('div');
                w.className='tradingview-widget-container__widget';
                wrap.appendChild(w);
                var s=document.createElement('script');
                s.type='text/javascript';
                s.async=true;
                s.src='https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js';
                s.text=JSON.stringify(cfg);
                wrap.appendChild(s);
                host.appendChild(wrap);
            }
            mount();
            try{
                new MutationObserver(mount).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']});
            }catch(e){}
        })();
    </script>
</section>

<!-- ===== STATS ===== -->
<section class="pv-section" style="padding-top:64px">
    <div class="pv-container">
        <div class="pv-stats">
            <div class="pv-stat"><span class="num" style="font-weight:800;font-size:1.7rem">$2.4B+</span><span>Assets under management</span></div>
            <div class="pv-stat"><span class="num" style="font-weight:800;font-size:1.7rem">480K+</span><span>Investors in 190 countries</span></div>
            <div class="pv-stat"><span class="num" style="font-weight:800;font-size:1.7rem">24/7</span><span>Live market &amp; support coverage</span></div>
            <div class="pv-stat"><span class="num" style="font-weight:800;font-size:1.7rem">9.7/10</span><span>Average investor rating</span></div>
        </div>
    </div>
</section>

<!-- ===== MARKETS ===== -->
<section class="pv-section" id="markets" style="padding-top:52px">
    <div class="pv-container">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:30px">
            <div>
                <p class="pv-tag">Spot Markets</p>
                <h2 class="pv-h2">Top cryptocurrencies by market cap</h2>
                <p class="pv-lead">Real-time prices, accessible 24/7 across spot, futures and staking.</p>
            </div>
            <a href="{{ route('register') }}" class="pv-btn pv-btn-ghost pv-btn-sm">See all markets →</a>
        </div>

        <div class="pv-panel" style="padding:22px">
            <div id="pvCryptoScreener" style="height:480px"></div>
        </div>
    </div>
</section>

<script>
    (function(){
        function theme(){try{return document.documentElement.getAttribute('data-theme')==='light'?'light':'dark'}catch(e){return 'dark'}}
        function mount(){
            var host=document.getElementById('pvCryptoScreener');
            if(!host)return;
            host.innerHTML='';
            var cfg={
                "width":"100%","height":"100%",
                "defaultColumn":"overview",
                "screener_type":"crypto_mkt",
                "displayCurrency":"USD",
                "colorTheme":theme(),
                "locale":"en",
                "isTransparent":true,
                "showLogo":true
            };
            var wrap=document.createElement('div');
            wrap.className='tradingview-widget-container';
            var w=document.createElement('div');
            w.className='tradingview-widget-container__widget';
            wrap.appendChild(w);
            var s=document.createElement('script');
            s.type='text/javascript';
            s.async=true;
            s.src='https://s3.tradingview.com/external-embedding/embed-widget-screener.js';
            s.text=JSON.stringify(cfg);
            wrap.appendChild(s);
            host.appendChild(wrap);
        }
        mount();
        try{
            new MutationObserver(mount).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']});
        }catch(e){}
    })();
</script>

<!-- ===== COPY TRADING ===== -->
<section class="pv-section" id="copy-trading" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 44px">
            <p class="pv-tag" style="text-align:center">Copy Trading</p>
            <h2 class="pv-h2">Follow the winners. Mirror their trades.</h2>
            <p class="pv-lead" style="margin:10px auto 0">Every trader on PrimeVest is <strong style="color:var(--text)">vetted and verified</strong> — audited track records, years of live experience and transparent risk scores. One click mirrors their positions.</p>
        </div>

        <div class="pv-grid pv-grid-3 cards ct-cards" style="margin-bottom:30px">
            @php
                $traders = [
                    ['SK','CryptoMatrix','+186.4%','3yr ROI','128,402','24.1%','#7c3aed', 1],
                    ['LN','LunaBulls','+143.9%','2yr ROI','94,118','19.7%','#0ea5e9', 2],
                    ['AS','SatoshiEdge','+119.2%','18mo ROI','76,541','22.4%','#f59e0b', 3],
                ];
            @endphp
            @foreach($traders as $t)
            <div class="pv-panel pv-card" style="padding:24px">
                @if($t[6] == 1)<span class="pv-chip pv-chip-gold" style="float:right">🔥 Top Trader</span>@endif
                <div style="display:flex;align-items:center;gap:14px">
                    <div class="trader-av" style="background:{{ $t[5] }}">{{ $t[0] }}</div>
                    <div style="flex:1;min-width:0">
                        <div style="font-weight:700;display:flex;align-items:center;min-width:0">
                            <span style="min-width:0;overflow-wrap:anywhere">{{ $t[1] }}</span>
                            <span class="pv-verif">
                                <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                                    <defs>
                                        <linearGradient id="pvTickGrad" x1="0" y1="0" x2="1" y2="1">
                                            <stop offset="0%" stop-color="#57c8ff"/><stop offset="100%" stop-color="#1d6bf0"/>
                                        </linearGradient>
                                    </defs>
                                    <circle cx="12" cy="12" r="11"/>
                                    <path d="M7.5 12.5l2.9 2.9 6-6.3"/>
                                </svg>
                                <span class="pv-vtip"><b>Verified Professional</b><br>Passed PrimeVest's identity, risk and track-record review. {{ $t[3] }} of live trading experience with audited results.<span class="pv-vtip-emit"></span></span>
                            </span>
                        </div>
                        <div style="display:flex;align-items:center;gap:8px;margin-top:4px;flex-wrap:wrap">
                            <span class="pv-chip" style="font-size:.68rem;padding:2px 9px">✔ Vetted</span>
                            <span class="pv-mut" style="font-size:.8rem">Copy traders: <b>{{ $t[4] }}</b></span>
                        </div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;margin:20px 0;padding:14px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
                    <div><div style="font-weight:800" class="pv-acc num">+{{ $t[2] }}</div><div class="pv-mut" style="font-size:.75rem">{{ $t[3] }}</div></div>
                    <div style="text-align:right"><div style="font-weight:800" class="num">{{ $t[5] }}</div><div class="pv-mut" style="font-size:.75rem">Win rate</div></div>
                </div>
                <a href="{{ route('register') }}" class="pv-btn pv-btn-block pv-btn-sm">Copy this trader</a>
            </div>
            @endforeach
        </div>

        <div class="pv-grid pv-grid-3 cards ct-cards" style="gap:16px">
            <div class="copy-chip"><div class="pv-icon">⚡</div><div><b>One-click mirroring</b><br><span class="pv-foot">Your portfolio mirrors theirs automatically.</span></div></div>
            <div class="copy-chip"><div class="pv-icon">🛡</div><div><b>Verified performance</b><br><span class="pv-foot">Track record audited and live.</span></div></div>
            <div class="copy-chip"><div class="pv-icon">✋</div><div><b>Stop-loss control</b><br><span class="pv-foot">Set limits to protect your capital.</span></div></div>
        </div>
    </div>
</section>

<!-- ===== CRYPTO ACADEMY / WHAT IS BITCOIN ===== -->
<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div class="aca-shell">
            <div class="vid-frame">
                <iframe src="https://www.youtube.com/embed/bBC-nXj3Ng4" title="What is Bitcoin? — explained simply" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe>
            </div>
            <div>
                <p class="pv-tag" style="text-align:left">Crypto Academy</p>
                <h2 class="pv-h2" style="margin-bottom:12px">What is Bitcoin? Learn before you invest.</h2>
                <p class="pv-foot" style="font-size:.95rem;line-height:1.7;color:var(--muted)">New to crypto? This quick, beginner-friendly explainer walks through how Bitcoin works, why it has value and how you can begin investing safely on PrimeVest.</p>
                <ul style="list-style:none;padding:0;margin:22px 0;display:grid;gap:11px">
                    <li style="display:flex;gap:10px;align-items:flex-start;color:var(--muted);font-size:.92rem"><span style="color:var(--acc);font-weight:800">✓</span> How Bitcoin's blockchain keeps a secure, public ledger</li>
                    <li style="display:flex;gap:10px;align-items:flex-start;color:var(--muted);font-size:.92rem"><span style="color:var(--acc);font-weight:800">✓</span> Why supply is capped at 21&nbsp;million — the case for long-term value</li>
                    <li style="display:flex;gap:10px;align-items:flex-start;color:var(--muted);font-size:.92rem"><span style="color:var(--acc);font-weight:800">✓</span> How to buy your first Bitcoin in minutes with a bank card</li>
                </ul>
                <a href="{{ route('register') }}" class="pv-btn">Start learning with a $100 demo</a>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURES ===== -->
<section class="pv-section">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 48px">
            <p class="pv-tag" style="text-align:center">Why PrimeVest</p>
            <h2 class="pv-h2">Everything you need to build wealth in crypto</h2>
            <p class="pv-lead" style="margin:10px auto 0">One platform for trading, staking, copying experts and learning — engineered to help your portfolio compound over time.</p>
        </div>

        <div class="pv-grid pv-grid-3 cards wh-cards">
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">📈</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Pro Trading Charts</h3>
                <p class="pv-foot" style="line-height:1.7">Candlestick charts with 100+ indicators, drawing tools and live order books — powered by TradingView.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">🏦</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">High-Yield Staking</h3>
                <p class="pv-foot" style="line-height:1.7">Earn up to 18% APY by staking stablecoins like USDT and USDC — rewards paid daily, right into your balance.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">🔒</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Cold Storage Security</h3>
                <p class="pv-foot" style="line-height:1.7">98% of funds held in audited cold wallets, with 2FA, withdrawal whitelists and an insured hot wallet.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">⚡</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Instant Withdrawals</h3>
                <p class="pv-foot" style="line-height:1.7">Request funds anytime — most crypto withdrawals land in your wallet in under 10 minutes, 24/7.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">👥</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Copy Trading Elite</h3>
                <p class="pv-foot" style="line-height:1.7">Automatically mirror the strategies of verified professionals — audited results, zero guesswork, real growth.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-emoji">🎓</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Crypto Academy</h3>
                <p class="pv-foot" style="line-height:1.7">Guides, webinars and market analysis to help beginners and pros sharpen their edge.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== HOW IT WORKS ===== -->
<section class="pv-section" style="padding-top:0">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 44px">
            <p class="pv-tag" style="text-align:center">Getting Started</p>
            <h2 class="pv-h2">From zero to crypto investor in 3 steps</h2>
        </div>
        <div class="pv-grid pv-grid-3" style="gap:20px">
            <div class="step-box"><div class="step-num">1</div><h3 style="margin:8px 0;font-size:1.05rem">Create your account</h3><p class="pv-foot">Sign up in under a minute with just an email. Verify your identity once to unlock full limits.</p></div>
            <div class="step-box"><div class="step-num">2</div><h3 style="margin:8px 0;font-size:1.05rem">Fund with crypto or cards</h3><p class="pv-foot">Deposit BTC, ETH, USDT or use a card. Your balance is available for trading instantly.</p></div>
            <div class="step-box"><div class="step-num">3</div><h3 style="margin:8px 0;font-size:1.05rem">Buy, stake or copy traders</h3><p class="pv-foot">Trade the markets, stake for passive yield, or copy a top trader — your money works 24/7.</p></div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section class="pv-section" style="background:var(--bg2);border-top:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 44px">
            <p class="pv-tag" style="text-align:center">Investor Stories</p>
            <h2 class="pv-h2">Trusted by investors worldwide</h2>
        </div>
        <div class="t-wrap">
            <div class="t-track" id="tTrack">
                <div class="pv-panel pv-card t-card">
                    <div class="t-stars">★★★★★</div>
                    <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"I started with my demo balance, learned staking, then went live. My USDT stake pays me daily and I can see every single return on the dashboard. Superb transparency."</p>
                    <div style="display:flex;align-items:center;gap:12px"><img class="t-av" src="{{ asset('images/mike.jpg') }}" alt="Mike"><div><b>Mike O.</b><div class="pv-mut" style="font-size:.8rem">Accra, Ghana · Investor since 2025</div></div></div>
                </div>
                <div class="pv-panel pv-card t-card">
                    <div class="t-stars">★★★★★</div>
                    <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"The copy trading feature is a game-changer. I'm mirroring two traders and up 11% in my first two months without lifting a finger. Withdrawals are genuinely fast."</p>
                    <div style="display:flex;align-items:center;gap:12px"><img class="t-av" src="{{ asset('images/claudia.jpg') }}" alt="Claudia"><div><b>Claudia S.</b><div class="pv-mut" style="font-size:.8rem">Berlin, Germany · Copy trader</div></div></div>
                </div>
                <div class="pv-panel pv-card t-card">
                    <div class="t-stars">★★★★★</div>
                    <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"I've been on 4 other platforms and none felt this secure. 2FA, whitelisted addresses, and real customer support that actually answers. This is how crypto platforms should be."</p>
                    <div style="display:flex;align-items:center;gap:12px"><img class="t-av" src="{{ asset('images/jenny.jpg') }}" alt="Jenny"><div><b>Jenny T.</b><div class="pv-mut" style="font-size:.8rem">Austin, USA · Staking investor</div></div></div>
                </div>
                <div class="pv-panel pv-card t-card">
                    <div class="t-stars">★★★★★</div>
                    <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"The dashboard is clarity. Live P&L, transparent fees, and my staking rewards land like clockwork every single day. PrimeVest rebuilt my trust in crypto investing."</p>
                    <div style="display:flex;align-items:center;gap:12px"><img class="t-av" src="{{ asset('images/malcome.jpg') }}" alt="Malcome"><div><b>Malcome W.</b><div class="pv-mut" style="font-size:.8rem">Wealth investor</div></div></div>
                </div>
                <div class="pv-panel pv-card t-card">
                    <div class="t-stars">★★★★★</div>
                    <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"I'm a long-term holder and wanted a platform that finally takes security seriously. Cold-storage custody, verified traders, honest support — this is the one I recommend to friends."</p>
                    <div style="display:flex;align-items:center;gap:12px"><img class="t-av" src="{{ asset('images/crian.jpg') }}" alt="Crian"><div><b>Crian D.</b><div class="pv-mut" style="font-size:.8rem">Dublin, Ireland · Long-term holder</div></div></div>
                </div>
            </div>
            <div class="t-nav"><button type="button" aria-label="Previous" onclick="tSlide(-1)">‹</button><button type="button" aria-label="Next" onclick="tSlide(1)">›</button></div>
            <div class="t-dots" id="tDots"></div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="pv-section" style="padding-bottom:0">
    <div class="pv-container">
        <div class="pv-panel" style="position:relative;overflow:hidden;padding:64px 28px;text-align:center">
            <div style="position:absolute;inset:0;background:radial-gradient(600px 300px at 50% 0%,rgba(47,123,255,.16),transparent 60%)"></div>
            <div style="position:relative;z-index:1">
                <h2 class="pv-h2" style="max-width:560px;margin:0 auto">Your crypto wealth journey starts today</h2>
                <p class="pv-lead" style="margin:14px auto 30px">Join 480,000+ investors already growing their digital assets with PrimeVest.</p>
                <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
                    <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Create Free Account</a>
                    <a href="{{ route('trading') }}" class="pv-btn pv-btn-ghost pv-btn-lg">Explore the Markets</a>
                </div>
                <div class="pv-foot" style="margin-top:24px">No hidden fees · Cancel anytime · Backed by 24/7 support</div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    (function(){
        var track=document.getElementById('tTrack');
        if(!track)return;
        var cards=track.querySelectorAll('.t-card');
        var dots=[];
        var dotWrap=document.getElementById('tDots');
        for(var i=0;i<cards.length;i++){
            (function(idx){
                var b=document.createElement('button');
                b.type='button';
                b.setAttribute('aria-label','Go to testimonial '+(idx+1));
                if(idx===0)b.className='on';
                b.addEventListener('click',function(){tGo(idx);});
                dotWrap.appendChild(b);
                dots.push(b);
            })(i);
        }
        function cardStep(){return cards[0].offsetWidth+16;}
        function currentIndex(){
            var pos=track.scrollLeft;
            var step=cardStep();
            if(step<=0)return 0;
            return Math.round(pos/step);
        }
        function syncDots(){
            var c=currentIndex();
            for(var i=0;i<dots.length;i++)dots[i].className=(i===c)?'on':'';
        }
        var ticking=false;
        track.addEventListener('scroll',function(){
            if(!ticking){requestAnimationFrame(function(){syncDots();ticking=false;});ticking=true;}
        });
        var tTouchStart=track.scrollLeft;
        track.addEventListener('touchstart',function(){tTouchStart=track.scrollLeft;});
        track.addEventListener('touchend',function(){tGo(currentIndex());});
        function tGo(i){
            if(i<0)i=0;
            if(i>=cards.length)i=cards.length-1;
            track.scrollTo({left:i*cardStep(),behavior:'smooth'});
            syncDots();
        }
        window.tSlide=function(dir){
            var i=currentIndex();
            if(dir>0&&i>=cards.length-1)return;
            if(dir<0&&i<=0)return;
            tGo(i+dir);
        };
    })();
</script>
@endpush