@extends('layouts.app')

@section('title', 'PrimeVest | Trusted Crypto Investment Platform')

@section('styles')
<style>
    .hero-badge{display:inline-flex;align-items:center;gap:8px;padding:7px 15px;border-radius:999px;background:rgba(24,216,147,.1);border:1px solid rgba(24,216,147,.28);color:var(--acc);font-size:.82rem;font-weight:600;margin-bottom:22px}
    .hero-badge .dot{width:7px;height:7px;border-radius:50%;background:var(--acc);box-shadow:0 0 0 0 rgba(24,216,147,.7);animation:pulse 2s infinite}
    @keyframes pulse{0%{box-shadow:0 0 0 0 rgba(24,216,147,.6)}70%{box-shadow:0 0 0 10px rgba(24,216,147,0)}100%{box-shadow:0 0 0 0 rgba(24,216,147,0)}}
    .hero-actions{display:flex;flex-wrap:wrap;gap:14px;margin-top:34px}
    .hero-note{display:flex;flex-direction:column;gap:6px;color:var(--muted);font-size:.84rem;margin-top:30px}
    .hero-note b{color:var(--text)}
    .hero-trust{display:flex;gap:26px;margin-top:26px;color:var(--muted);font-size:.82rem}
    .hero-trust span{display:inline-flex;align-items:center;gap:7px}
    .hero-card{border-radius:24px;overflow:hidden;background:linear-gradient(180deg,#0d1526,#0a0f1c);border:1px solid var(--line);box-shadow:0 60px 120px -60px rgba(0,0,0,.9)}
    .hero-tab{display:flex;gap:6px;padding:8px;background:rgba(255,255,255,.04);border-radius:12px;border:1px solid var(--line)}
    .hero-tab span{flex:1;text-align:center;padding:9px 0;border-radius:9px;font-size:.85rem;font-weight:600;color:var(--muted);cursor:pointer;transition:.2s}
    .hero-tab span.on{background:rgba(24,216,147,.14);color:var(--acc);box-shadow:inset 0 0 0 1px rgba(24,216,147,.3)}
    .price-row{display:flex;align-items:flex-end;justify-content:space-between;gap:14px}
    .price-num{font-size:clamp(1.6rem,3vw,2.4rem);font-weight:800;letter-spacing:-.02em}
    .pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:999px;font-size:.8rem;font-weight:700}
    .pill-up{background:rgba(24,216,147,.14);color:var(--acc)}
    .pill-down{background:rgba(239,68,68,.14);color:#ff7c85}
    .market-row{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    @media(max-width:880px){.market-row{grid-template-columns:repeat(2,1fr)}}
    .tips li{margin:8px 0;color:var(--muted);font-size:.95rem}
    .tips li b{color:var(--text)}
    .copy-chip{display:flex;align-items:center;gap:10px;padding:18px;border-radius:13px;background:rgba(255,255,255,.035);border:1px solid var(--line);transition:.3s}
    .trader-av{width:44px;height:44px;border-radius:50%;display:grid;place-items:center;font-weight:800;color:#fff;font-size:1rem;flex-shrink:0}
    .trust-badge{padding:14px 22px;border-radius:14px;background:rgba(255,255,255,.03);border:1px solid var(--line);font-size:.9rem;color:var(--muted);display:flex;align-items:center;gap:10px}
    .step-box{padding:26px;border-radius:16px;background:rgba(255,255,255,.035);border:1px solid var(--line);text-align:center;height:100%}
    .step-num{width:40px;height:40px;border-radius:12px;margin:0 auto 14px;display:grid;place-items:center;font-weight:800;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d}
    /* ---- premium hero chart card ---- */
    .hero-top{display:flex;align-items:center;justify-content:space-between;gap:12px}
    .hero-live{display:inline-flex;align-items:center;gap:7px;padding:5px 11px;border-radius:999px;background:rgba(24,216,147,.1);border:1px solid rgba(24,216,147,.3);color:var(--acc);font-size:.7rem;font-weight:800;letter-spacing:.1em}
    .hero-live i{width:6px;height:6px;border-radius:50%;background:var(--acc);animation:lp 1.4s infinite}
    @keyframes lp{0%{opacity:1;box-shadow:0 0 0 0 rgba(24,216,147,.55)}70%{opacity:.45;box-shadow:0 0 0 7px rgba(24,216,147,0)}100%{opacity:1}}
    .range-tab{display:flex;gap:4px;padding:5px;background:rgba(255,255,255,.04);border-radius:10px;border:1px solid var(--line)}
    .range-tab span{padding:5px 11px;border-radius:7px;font-size:.74rem;font-weight:700;color:var(--muted);cursor:pointer;transition:.2s}
    .range-tab span.on{background:rgba(24,216,147,.15);color:var(--acc);box-shadow:inset 0 0 0 1px rgba(24,216,147,.3)}
    .lg{display:inline-flex;align-items:center;gap:6px;font-size:.7rem;font-weight:600;color:var(--muted)}
    .lg i{width:14px;height:2px;border-radius:2px}
    .chart-wrap{position:relative;margin:14px 20px 0}
    .chart-wrap svg{display:block;width:100%;height:auto;background:rgba(255,255,255,.012);border:1px solid rgba(255,255,255,.05);border-radius:12px}
    .ch-xhair{position:absolute;top:0;bottom:26px;width:1px;background:rgba(255,255,255,.3);display:none;pointer-events:none}
    .chart-tip{position:absolute;padding:8px 11px;border-radius:10px;background:#0a1020;border:1px solid var(--line);box-shadow:0 14px 34px -12px rgba(0,0,0,.85);font-size:.72rem;line-height:1.5;pointer-events:none;display:none;z-index:5;min-width:132px}
    .chart-tip .t-t{color:var(--muted);font-size:.68rem;font-weight:600;letter-spacing:.05em}
    .chart-tip .t-ohlc{display:grid;grid-template-columns:auto auto;gap:1px 14px;font-family:'JetBrains Mono',monospace;font-weight:600;margin-top:5px}
    .hero-stat{display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid var(--line);margin-top:14px}
    .hero-stat .cell{padding:13px 14px}
    .hero-stat .cell+.cell{border-left:1px solid var(--line)}
    @media(max-width:520px){.hero-stat{grid-template-columns:1fr 1fr}.hero-stat .cell:nth-child(3){border-left:0}}
    /* ---- hero background chart ---- */
    .hero-bgchart{position:absolute;inset:0;width:100%;height:100%;z-index:0;pointer-events:none}
    .hero-bgchart .bg-area{fill:url(#bgArea)}
    .hero-bgchart .bg-path{fill:none;stroke:url(#bgLine);stroke-width:2.2;opacity:.8}
    .hero-bgchart .bg-dash{stroke:#4cc3ff;stroke-dasharray:6 9;opacity:.5}
    /* ---- awards strip ---- */
    .pv-awards{position:relative;z-index:1;border-bottom:1px solid var(--line);background:var(--bg2);padding:26px 0}
    .pv-awards-in{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:28px}
    .pv-awards-label{font-size:.72rem;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);font-weight:800;text-align:center}
    .pv-awards-row{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:24px}
    .pv-awards img{height:54px;max-width:200px;object-fit:contain;opacity:.85;filter:grayscale(.55) brightness(1.05);transition:.3s}
    .pv-awards img:hover{opacity:1;filter:grayscale(0)}
    @media(max-width:600px){.pv-awards-in{flex-direction:column;gap:16px;text-align:center}.pv-awards img{height:42px}}
    /* ---- verified trader badge ---- */
    .pv-verif{display:inline-flex;align-items:center;justify-content:center;vertical-align:middle;margin-left:6px;position:relative}
    .pv-verif svg{display:block;width:17px;height:17px}
    .pv-verif:hover .pv-vtip{opacity:1;transform:translate(-50%,2px);pointer-events:auto}
    .pv-vtip{position:absolute;bottom:calc(100% + 9px);left:50%;transform:translate(-50%,4px);width:210px;background:#0a1020;border:1px solid var(--line);border-radius:10px;padding:10px 12px;font-size:.72rem;line-height:1.5;color:var(--muted);text-align:left;opacity:0;pointer-events:none;transition:.2s;z-index:20;box-shadow:0 16px 36px -14px rgba(0,0,0,.85);font-weight:500;white-space:normal}
    .pv-vtip b{color:var(--text)}
    .pv-verif .pv-vtip-emit{content:"";position:absolute;bottom:calc(100% + 2px);left:50%;transform:translateX(-50%);border:7px solid transparent;border-top-color:var(--line)}
    /* ---- wealth section ---- */
    .feat-stat{padding:20px 24px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--line);text-align:center}
    .feat-stat b{display:block;font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,#2df0a9,#18d893);-webkit-background-clip:text;background-clip:text;color:transparent}
    .feat-stat span{color:var(--muted);font-size:.8rem}
    .pv-icon-grad{width:50px;height:50px;border-radius:14px;display:grid;place-items:center;font-size:1.35rem;background:linear-gradient(135deg,rgba(45,240,169,.22),rgba(16,197,139,.08));border:1px solid rgba(45,240,169,.3)}
    /* ---- academy video ---- */
    .aca-shell{display:grid;grid-template-columns:1.05fr 1fr;gap:34px;align-items:center}
    @media(max-width:900px){.aca-shell{grid-template-columns:1fr}}
    .vid-frame{position:relative;border-radius:18px;overflow:hidden;border:1px solid var(--line);background:#0a0f1c;box-shadow:0 40px 90px -50px rgba(0,0,0,.9)}
    .vid-frame iframe{display:block;width:100%;aspect-ratio:16/9;border:0}
</style>
@endsection

@section('content')
<!-- ===== HERO ===== -->
<section class="pv-hero">
    <!-- Background chart layer (gradient + grid kept via .pv-hero::before) -->
    <svg class="hero-bgchart" viewBox="0 0 1440 560" preserveAspectRatio="none" aria-hidden="true">
        <defs>
            <linearGradient id="bgLine" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#18d893"/><stop offset=".55" stop-color="#4cc3ff"/><stop offset="1" stop-color="#f0b90b"/>
            </linearGradient>
            <linearGradient id="bgArea" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0" stop-color="#18d893" stop-opacity=".2"/><stop offset="1" stop-color="#18d893" stop-opacity="0"/>
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
                <div class="hero-badge"><span class="dot"></span> Institutional-grade crypto investing for everyone</div>
                <h1 class="pv-h1">Trade, stake &amp; grow your <span style="background:linear-gradient(120deg,#18d893,#4cc3ff);-webkit-background-clip:text;background-clip:text;color:transparent">digital assets</span> with a platform you can trust.</h1>
                <p class="pv-lead">Buy and sell 200+ cryptocurrencies, stake for passive income, and mirror the trades of proven experts. Bank-grade security, transparent fees and lightning-fast execution.</p>
                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="pv-btn pv-btn-lg">Start Trading Free</a>
                    <a href="{{ route('trading') }}#copy-trading" class="pv-btn pv-btn-ghost pv-btn-lg">Explore Copy Trading</a>
                </div>
                <div class="hero-trust">
                    <span>◆ 480K+ investors</span>
                    <span>◆ $2.4B+ assets secured</span>
                    <span>◆ 99.9% uptime</span>
                </div>
                <div class="hero-note">
                    <span><b>New here?</b> Get a <b style="color:var(--gold)">$100 demo balance</b> to practise trading risk-free.</span>
                </div>
            </div>

            <!-- Live trading chart -->
            <div class="hero-card">
                <div style="padding:16px 20px 10px">
                    <div class="hero-top">
                        <div class="hero-tab">
                            <span class="on" data-sym="BTCUSD">BTC</span>
                            <span data-sym="ETHUSD">ETH</span>
                            <span data-sym="SOLUSD">SOL</span>
                            <span data-sym="BNBUSD">BNB</span>
                            <span data-sym="XRPUSD">XRP</span>
                        </div>
                        <span class="hero-live"><i></i>LIVE</span>
                    </div>
                </div>
                <div style="padding:8px 20px 0">
                    <div class="price-row" style="align-items:flex-start">
                        <div>
                            <div style="display:flex;align-items:center;gap:9px">
                                <img id="cIcon" src="{{ asset('/images/btc.png') }}" alt="BTC" width="26" height="26" style="border-radius:50%">
                                <b id="cName">Bitcoin</b>
                                <span class="pv-mut" id="cPair" style="font-size:.8rem">BTC/USD</span>
                            </div>
                            <div class="price-num num" id="heroPrice">$67,241.80</div>
                            <div style="display:flex;align-items:center;gap:12px;margin-top:5px">
                                <span class="pill pill-up num" id="heroChg">▲ +2.41%</span>
                                <span class="lg"><i style="background:var(--gold)"></i>MA7</span>
                            </div>
                        </div>
                        <div class="range-tab" id="rangeTabs">
                            <span data-range="h1">1H</span><span data-range="h4">4H</span><span class="on" data-range="d1">1D</span><span data-range="w1">1W</span>
                        </div>
                    </div>
                </div>
                <div class="chart-wrap" id="chartBox">
                    <svg id="candles" viewBox="0 0 560 250"></svg>
                    <div class="ch-xhair" id="chX"></div>
                    <div class="chart-tip" id="chTip"></div>
                </div>
                <div class="hero-stat">
                    <div class="cell"><div class="pv-mut" style="font-size:.68rem;letter-spacing:.05em">24H HIGH</div><div class="num" id="sHigh" style="font-weight:700;font-size:.88rem">$67,890</div></div>
                    <div class="cell"><div class="pv-mut" style="font-size:.68rem;letter-spacing:.05em">24H LOW</div><div class="num" id="sLow" style="font-weight:700;font-size:.88rem">$66,322</div></div>
                    <div class="cell"><div class="pv-mut" style="font-size:.68rem;letter-spacing:.05em">VOLUME</div><div class="num" id="sVol" style="font-weight:700;font-size:.88rem">$28.4B</div></div>
                    <div class="cell"><div class="pv-mut" style="font-size:.68rem;letter-spacing:.05em">MARKET CAP</div><div class="num" id="sMc" style="font-weight:700;font-size:.88rem">$1.33T</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== AWARDS & RECOGNITION ===== -->
<section class="pv-awards">
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
</section>

<!-- ===== LIVE TICKER ===== -->
<section class="ticker" style="border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:var(--bg2);position:relative;z-index:1">
    <div style="overflow:hidden">
        <div class="pv-container" style="padding:12px 22px;overflow:hidden">
            <div style="display:flex;gap:34px;white-space:nowrap;align-items:center;overflow-x:auto;scrollbar-width:none" id="tickerRow">
                <span class="pv-mut" style="font-weight:700;letter-spacing:.1em;font-size:.75rem;text-transform:uppercase">Live Markets</span>
                <span style="font-weight:600" class="num">BTC <span class="pv-acc">$67,241.80</span> <span class="pill pill-up" style="font-size:.72rem">+2.41%</span></span>
                <span style="font-weight:600" class="num">ETH <span style="color:var(--muted)">$3,482.15</span> <span class="pill pill-down" style="font-size:.72rem">-0.86%</span></span>
                <span style="font-weight:600" class="num">SOL <span class="pv-acc">$152.34</span> <span class="pill pill-up" style="font-size:.72rem">+4.02%</span></span>
                <span style="font-weight:600" class="num">BNB <span class="pv-acc">$584.90</span> <span class="pill pill-up" style="font-size:.72rem">+1.27%</span></span>
                <span style="font-weight:600" class="num">XRP <span class="pv-acc">$0.5841</span> <span class="pill pill-up" style="font-size:.72rem">+3.18%</span></span>
                <span style="font-weight:600" class="num">ADA <span style="color:var(--muted)">$0.4520</span> <span class="pill pill-down" style="font-size:.72rem">-0.42%</span></span>
                <span style="font-weight:600" class="num">DOT <span class="pv-acc">$6.182</span> <span class="pill pill-up" style="font-size:.72rem">+1.84%</span></span>
                <span style="font-weight:600" class="num">LINK <span class="pv-acc">$13.27</span> <span class="pill pill-up" style="font-size:.72rem">+2.95%</span></span>
            </div>
        </div>
    </div>
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

        <div class="pv-panel" style="padding:6px;overflow:hidden">
            <div style="overflow-x:auto">
            <table class="pv-table">
                <thead>
                    <tr>
                        <th style="padding-left:22px">Asset</th><th>Price</th><th>24h Change</th><th>Market Cap</th><th>Volume (24h)</th><th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $coins = [
                            ['btc.png','Bitcoin','BTC',67418.20,2.41,'$1.33T','$28.4B'],
                            ['eth.png','Ethereum','ETH',3484.15,-0.86,'$419B','$17.1B'],
                            ['bch.png','Bitcoin Cash','BCH',611.40,1.08,'$12.1B','$1.02B'],
                            ['doge.png','Dogecoin','DOGE',0.1524,5.72,'$22.3B','$2.9B'],
                        ];
                    @endphp
                    @foreach($coins as $c)
                    <tr>
                        <td style="padding-left:22px">
                            <div style="display:flex;align-items:center;gap:12px">
                                <img src="{{ asset('/images/'.$c[0]) }}" alt="{{ $c[1] }}" width="30" height="30" style="border-radius:50%">
                                <div><div style="font-weight:700">{{ $c[1] }}</div><div class="pv-mut" style="font-size:.78rem">{{ $c[2] }}</div></div>
                            </div>
                        </td>
                        <td class="num" style="font-weight:700">${{ number_format($c[3], $c[3] < 1 ? 4 : 2) }}</td>
                        <td><span class="pill {{ $c[4] >= 0 ? 'pill-up' : 'pill-down' }} num">{{ $c[4] >= 0 ? '+' : '' }}{{ $c[4] }}%</span></td>
                        <td class="num pv-mut">{{ $c[5] }}</td>
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

<!-- ===== COPY TRADING ===== -->
<section class="pv-section" id="copy-trading" style="background:var(--bg2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 44px">
            <p class="pv-tag" style="text-align:center">Copy Trading</p>
            <h2 class="pv-h2">Follow the winners. Mirror their trades.</h2>
            <p class="pv-lead" style="margin:10px auto 0">Every trader on PrimeVest is <strong style="color:var(--text)">vetted and verified</strong> — audited track records, years of live experience and transparent risk scores. One click mirrors their positions.</p>
        </div>

        <div class="pv-grid pv-grid-3 cards" style="margin-bottom:30px">
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
                    <div style="flex:1">
                        <div style="font-weight:700;display:flex;align-items:center">{{ $t[1] }}
                            <span class="pv-verif">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2l8 3v6c0 5-3.4 8.6-8 11-4.6-2.4-8-6-8-11V5l8-3z" fill="#18d893" opacity=".18"/>
                                    <path d="M12 2l8 3v6c0 5-3.4 8.6-8 11-4.6-2.4-8-6-8-11V5l8-3z" stroke="#18d893" stroke-width="1.6"/>
                                    <path d="M8.4 12.1l2.4 2.4 4.8-5" stroke="#18d893" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
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

        <div class="pv-grid pv-grid-3 cards" style="gap:16px">
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

        <div class="pv-stats" style="margin-bottom:34px">
            <div class="feat-stat"><b>18%</b><span>Max staking APY</span></div>
            <div class="feat-stat"><b>200+</b><span>Crypto assets</span></div>
            <div class="feat-stat"><b>&lt;10 min</b><span>Withdrawal speed</span></div>
            <div class="feat-stat"><b>99.9%</b><span>Platform uptime</span></div>
        </div>

        <div class="pv-grid pv-grid-3 cards">
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad">📈</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Pro Trading Charts</h3>
                <p class="pv-foot" style="line-height:1.7">Candlestick charts with 100+ indicators, drawing tools and live order books — powered by TradingView.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad" style="border-color:rgba(240,185,11,.35);background:linear-gradient(135deg,rgba(240,185,11,.2),rgba(240,185,11,.05))">🏦</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">High-Yield Staking</h3>
                <p class="pv-foot" style="line-height:1.7">Earn up to 18% APY by staking stablecoins like USDT and USDC — rewards paid daily, right into your balance.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad" style="border-color:rgba(168,85,247,.35);background:linear-gradient(135deg,rgba(168,85,247,.2),rgba(168,85,247,.05))">🔒</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Cold Storage Security</h3>
                <p class="pv-foot" style="line-height:1.7">98% of funds held in audited cold wallets, with 2FA, withdrawal whitelists and an insured hot wallet.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad">⚡</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Instant Withdrawals</h3>
                <p class="pv-foot" style="line-height:1.7">Request funds anytime — most crypto withdrawals land in your wallet in under 10 minutes, 24/7.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad">👥</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Copy Trading Elite</h3>
                <p class="pv-foot" style="line-height:1.7">Automatically mirror the strategies of verified professionals — audited results, zero guesswork, real growth.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon-grad" style="border-color:rgba(14,165,233,.35);background:linear-gradient(135deg,rgba(14,165,233,.2),rgba(14,165,233,.05))">🎓</div>
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
        <div class="pv-grid pv-grid-3 cards">
            <div class="pv-panel pv-card" style="padding:26px">
                <div style="color:var(--gold);letter-spacing:2px">★★★★★</div>
                <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"I started with my demo balance, learned staking, then went live. My USDT stake pays me daily and I can see every single return on the dashboard. Superb transparency."</p>
                <div style="display:flex;align-items:center;gap:12px"><div class="trader-av" style="background:#7c3aed;width:38px;height:38px;font-size:.9rem">KT</div><div><b>Kofi T.</b><div class="pv-mut" style="font-size:.8rem">Accra, Ghana · Investor since 2025</div></div></div>
            </div>
            <div class="pv-panel pv-card" style="padding:26px">
                <div style="color:var(--gold);letter-spacing:2px">★★★★★</div>
                <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"The copy trading feature is a game-changer. I'm mirroring two traders and up 11% in my first two months without lifting a finger. Withdrawals are genuinely fast."</p>
                <div style="display:flex;align-items:center;gap:12px"><div class="trader-av" style="background:#0ea5e9;width:38px;height:38px;font-size:.9rem">JD</div><div><b>Jessica M.</b><div class="pv-mut" style="font-size:.8rem">London, UK · Copy trader</div></div></div>
            </div>
            <div class="pv-panel pv-card" style="padding:26px">
                <div style="color:var(--gold);letter-spacing:2px">★★★★★</div>
                <p style="margin:14px 0;line-height:1.7;font-size:.95rem">"I've been on 4 other platforms and none felt this secure. 2FA, whitelisted addresses, and real customer support that actually answers. This is how crypto platforms should be."</p>
                <div style="display:flex;align-items:center;gap:12px"><div class="trader-av" style="background:#f59e0b;width:38px;height:38px;font-size:.9rem">AR</div><div><b>Adaeze R.</b><div class="pv-mut" style="font-size:.8rem">Lagos, Nigeria · Staking investor</div></div></div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="pv-section" style="padding-bottom:0">
    <div class="pv-container">
        <div class="pv-panel" style="position:relative;overflow:hidden;padding:64px 28px;text-align:center">
            <div style="position:absolute;inset:0;background:radial-gradient(600px 300px at 50% 0%,rgba(24,216,147,.16),transparent 60%)"></div>
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

@section('scripts')
<script>
    // ---- Premium hero chart (pure SVG, no deps) ----
    const UP='#1fd594', DN='#ff5c6e';
    const SPEC={
        BTCUSD:[67241.80,0.0011,0.0045,'$1.33T'],
        ETHUSD:[3482.15,0.0006,0.0038,'$419B'],
        SOLUSD:[152.34,0.0022,0.0065,'$68B'],
        BNBUSD:[584.90,0.0009,0.0032,'$86B'],
        XRPUSD:[0.5841,0.0028,0.0075,'$33B']
    };
    const INFO={
        BTCUSD:{name:'Bitcoin',pair:'BTC/USD',icon:'btc.png',vol:'$28.4B'},
        ETHUSD:{name:'Ethereum',pair:'ETH/USD',icon:'eth.png',vol:'$17.1B'},
        SOLUSD:{name:'Solana',pair:'SOL/USD',icon:'sol.png',vol:'$6.2B'},
        BNBUSD:{name:'BNB',pair:'BNB/USD',icon:'bnb.png',vol:'$3.1B'},
        XRPUSD:{name:'XRP',pair:'XRP/USD',icon:'xrp.png',vol:'$2.4B'}
    };
    const RCOUNT={h1:26,h4:24,d1:26,w1:22};
    const mulberry=s=>{let a=s|0;return()=>{a=a+0x6D2B79F5|0;let t=Math.imul(a^a>>>15,1|a);t=t+Math.imul(t^t>>>7,61|t)^t;return((t^t>>>14)>>>0)/4294967296}};
    const series=(sym,range)=>{
        const [base,trend,vol]=SPEC[sym];
        const n=RCOUNT[range];
        const rnd=mulberry(sym.length*13+({h1:1,h4:2,d1:3,w1:4}[range])*97);
        let price=base*(1-n*trend*(range==='w1'?0.8:0.4));
        const out=[];
        for(let i=0;i<n;i++){
            const o=price, dr=trend*base;
            const c=o+dr+(rnd()-0.5)*vol*base*2.2;
            let h=Math.max(o,c)+rnd()*vol*base*(0.35+rnd()*0.65);
            let l=Math.min(o,c)-rnd()*vol*base*(0.35+rnd()*0.65);
            h=Math.max(h,l+vol*base*0.04); l=Math.min(l,h-vol*base*0.04);
            const v=3000+rnd()*9000;
            out.push([o,h,l,c,Math.round(v)]);
            price=c;
        }
        return out;
    };
    const now=new Date();
    const step={h1:10*60000,h4:60*60000,d1:360*60000,w1:24*3600000};
    const tlabel=(range,i,n)=>{
        const t=new Date(now.getTime()-(n-1-i)*step[range]);
        return range==='w1'
            ? t.toLocaleDateString('en-US',{month:'short',day:'numeric'})
            : t.toLocaleTimeString('en-US',{hour:'2-digit',minute:'2-digit',hour12:false});
    };
    const fmtP=(p,base)=>p>=1000?p.toLocaleString('en-US',{maximumFractionDigits:0}):p>=10?p.toFixed(2):p.toFixed(4);
    const fmtV=v=>v>=1e12?('$'+(v/1e12).toFixed(2)+'T'):v>=1e9?('$'+(v/1e9).toFixed(2)+'B'):('$'+(v/1e6).toFixed(1)+'M');

    const W=560,H=250,padL=8,padR=56,padT=8,padB=26,volH=42;
    const plotW=W-padL-padR, bottom=H-padB, botTop=H-padB-volH;

    const state={sym:'BTCUSD',range:'d1',data:[],labels:[],min:0,max:0,n:0};

    function draw(){
        const {sym,range}=state;
        const d=series(sym,range); state.data=d; state.n=d.length;
        state.labels=Array.from({length:d.length},(_,i)=>tlabel(range,i,d.length));
        let lo=Infinity,hi=-Infinity;
        d.forEach(c=>{lo=Math.min(lo,c[1],c[2]);hi=Math.max(hi,c[1],c[2])});
        const pad=(hi-lo)*0.06; lo-=pad;hi+=pad;
        state.min=lo;state.max=hi;
        const n=d.length, xw=plotW/(n-1);
        const xs=i=>padL+i*xw;
        const y=p=>botTop-((p-lo)/(hi-lo))*(botTop-padT);
        const vMax=Math.max(...d.map(c=>c[4]));
        const yv=v=>H-padB-(v/vMax)*volH;
        const bw=Math.max(Math.min(xw*0.55,13),2);
        let s=`<g>`;
        for(let k=0;k<=4;k++){
            const yy=botTop+(botTop-padT)*k/4, val=hi-(hi-lo)*k/4, x=padL;
            s+=`<line x1="${x}" y1="${yy.toFixed(1)}" x2="${W-padR}" y2="${yy.toFixed(1)}" stroke="rgba(255,255,255,.05)"/>`;
            s+=`<text x="${W-padR+6}" y="${(yy+3).toFixed(1)}" fill="rgba(148,161,182,.75)" font-size="9" font-family="JetBrains Mono,monospace">${fmtP(val)}</text>`;
        }
        [0,(n-1)/3,(n-1)*2/3,n-1].forEach(i=>{
            i=Math.round(i); const xx=xs(i);
            s+=`<line x1="${xx.toFixed(1)}" y1="${padT}" x2="${xx.toFixed(1)}" y2="${bottom}" stroke="rgba(255,255,255,.05)"/>`;
            s+=`<text x="${(xx-9).toFixed(1)}" y="${H-10}" fill="rgba(148,161,182,.6)" font-size="9">${state.labels[i]}</text>`;
        });
        s+=`</g>`;
        d.forEach((c,i)=>{
            const cx=xs(i), up=c[4]>=0; const col=Math.abs(c[3]-c[0])<1e-9?UP:(c[3]>=c[0]?UP:DN);
            s+=`<line x1="${cx.toFixed(1)}" y1="${y(c[1]).toFixed(1)}" x2="${cx.toFixed(1)}" y2="${y(c[2]).toFixed(1)}" stroke="${col}" stroke-width="1"/>`;
            const yo=y(c[0]), yc=y(c[3]);
            const top=Math.min(yo,yc), hgt=Math.max(Math.abs(yo-yc),1.4);
            s+=`<rect x="${(cx-bw/2).toFixed(1)}" y="${top.toFixed(1)}" width="${bw.toFixed(1)}" height="${hgt.toFixed(1)}" rx="1" fill="${col}"/>`;
            const vh=yv(c[4]);
            s+=`<rect x="${(cx-bw*0.9/2).toFixed(1)}" y="${vh.toFixed(1)}" width="${(bw*0.9).toFixed(1)}" height="${(H-padB-vh).toFixed(1)}" fill="${col}" opacity=".4"/>`;
        });
        const closes=d.map(c=>c[3]);
        const ma=[];
        for(let i=6;i<n;i++){
            const a=closes.slice(i-6,i+1).reduce((x,v)=>(x+=v),0)/7;
            ma.push([xs(i),y(a)]);
        }
        if(ma.length>1){
            const p=ma.map((m,k)=>(k?'L':'M')+m[0].toFixed(1)+' '+m[1].toFixed(1)).join(' ');
            s+=`<path d="${p}" fill="none" stroke="#f0b90b" stroke-width="1.3" opacity=".9"/>`;
        }
        document.getElementById('candles').innerHTML=s;
        updateHeader();
    }

    function updateHeader(){
        const {sym,range,data,min,max}=state;
        const li=INFO[sym], base=SPEC[sym][0];
        const icon=document.getElementById('cIcon');
        icon.src="{{ asset('/images/') }}"+li.icon;
        icon.onerror=()=>{icon.src='data:image/svg+xml,'+encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"><circle cx="13" cy="13" r="13" fill="#0c1322"/><circle cx="13" cy="13" r="12" fill="none" stroke="rgba(24,216,147,.6)"/><text x="13" y="17" font-size="11" font-family="Arial" font-weight="bold" text-anchor="middle" fill="#18d893">'+li.pair.slice(0,3)+'</text></svg>')};
        document.getElementById('cName').textContent=li.name;
        document.getElementById('cPair').textContent=li.pair;
        document.getElementById('heroPrice').textContent='$'+fmtP(data[data.length-1][3],base);
        const chg=(data[data.length-1][3]-data[0][0])/data[0][0]*100;
        const hc=document.getElementById('heroChg');
        hc.innerHTML=(chg>=0?'▲ +':'▼ ')+Math.abs(chg).toFixed(2)+'%';
        hc.className='pill '+(chg>=0?'pill-up':'pill-down')+' num';
        const hhi=-Infinity,llo=Infinity;
        data.forEach(c=>{if(c[1]>hhi)hhi=c[1];if(c[2]<llo)llo=c[2]});
        const dp=base<1?4:base<10?2:0;
        document.getElementById('sHigh').textContent='$'+hhi.toLocaleString('en-US',{maximumFractionDigits:dp});
        document.getElementById('sLow').textContent='$'+llo.toLocaleString('en-US',{maximumFractionDigits:dp});
        document.getElementById('sVol').textContent=li.vol;
        document.getElementById('sMc').textContent=SPEC[sym][3];
    }

    function drawCross(i, px){
        const c=state.data[i];
        const col=Math.abs(c[3]-c[0])<1e-9?UP:(c[3]>=c[0]?UP:DN);
        const dp=SPEC[state.sym][0]<1?4:SPEC[state.sym][0]<10?2:0;
        const f=p=>'$'+p.toLocaleString('en-US',{maximumFractionDigits:dp});
        const tip=document.getElementById('chTip');
        tip.style.display='block';
        tip.innerHTML=`<div class="t-t">${state.labels[i]} · ${INFO[state.sym].pair}</div><div class="t-ohlc"><span>Open</span><b style="color:${col}">${f(c[0])}</b><span>High</span><b class="num">${f(c[1])}</b><span>Low</span><b class="num">${f(c[2])}</b><span>Close</span><b class="num">${f(c[3])}</b></div>`;
        const box=document.getElementById('chartBox').getBoundingClientRect();
        const scale=W/box.width;
        const xpx=px/scale;
        document.getElementById('chX').style.left=xpx+'px';
        document.getElementById('chX').style.display='block';
        const tw=tip.offsetWidth, bw=box.width;
        tip.style.top='14px';
        tip.style.left=Math.min(Math.max(xpx+12,8),bw-tw-8)+'px';
    }

    const boxEl=document.getElementById('chartBox');
    boxEl.addEventListener('mousemove',e=>{
        const r=boxEl.getBoundingClientRect();
        const x=e.clientX-r.left, scale=W/r.width, xv=x*scale;
        const n=state.n, xw=plotW/(n-1);
        let i=Math.round((xv-padL)/xw);
        i=Math.max(0,Math.min(n-1,i));
        drawCross(i,x);
    });
    boxEl.addEventListener('mouseleave',()=>{
        document.getElementById('chTip').style.display='none';
        document.getElementById('chX').style.display='none';
    });

    document.querySelectorAll('.hero-tab span').forEach(el=>{
        el.addEventListener('click',()=>{
            document.querySelector('.hero-tab span.on').classList.remove('on');
            el.classList.add('on');
            state.sym=el.dataset.sym;
            draw();
        });
    });
    document.querySelectorAll('#rangeTabs span').forEach(el=>{
        el.addEventListener('click',()=>{
            document.querySelector('#rangeTabs span.on').classList.remove('on');
            el.classList.add('on');
            state.range=el.dataset.range;
            draw();
        });
    });

    draw();
</script>
@endsection