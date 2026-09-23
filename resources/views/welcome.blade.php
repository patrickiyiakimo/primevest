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
</style>
@endsection

@section('content')
<!-- ===== HERO ===== -->
<section class="pv-hero">
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

            <!-- Live price card -->
            <div class="hero-card">
                <div style="padding:18px 20px 0">
                    <div class="hero-tab">
                        <span class="on" data-sym="BTCUSD" data-price="67241.80" data-chg="+2.41">BTC</span>
                        <span data-sym="ETHUSD" data-price="3482.15" data-chg="-0.86">ETH</span>
                        <span data-sym="SOLUSD" data-price="152.34" data-chg="+4.02">SOL</span>
                        <span data-sym="BNBUSD" data-price="584.90" data-chg="+1.27">BNB</span>
                        <span data-sym="XRPUSD" data-price="0.5841" data-chg="+3.18">XRP</span>
                    </div>
                </div>
                <div style="padding:18px 20px">
                    <div class="price-row">
                        <div>
                            <div style="display:flex;align-items:center;gap:8px">
                                <img src="{{ asset('/images/btc.png') }}" alt="BTC" width="26" height="26" style="border-radius:50%">
                                <span style="font-weight:700">Bitcoin</span>
                                <span class="pv-mut" style="font-size:.82rem">BTC/USD</span>
                            </div>
                            <div class="price-num num" id="heroPrice">$67,241.80</div>
                            <div style="display:flex;align-items:center;gap:8px;margin-top:6px">
                                <span class="pill pill-up num" id="heroChg">▲ +2.41%</span>
                                <span class="pv-mut" style="font-size:.8rem">24h: $66,322 – $67,890</span>
                            </div>
                        </div>
                        <div style="display:flex;gap:8px">
                            <button class="pv-btn pv-btn-sm" onclick="location.href='{{ route('register') }}'">Buy</button>
                            <button class="pv-btn pv-btn-ghost pv-btn-sm" onclick="location.href='{{ route('trading') }}'">Chart</button>
                        </div>
                    </div>
                    <!-- Chart -->
                    <div style="margin-top:18px;height:200px;position:relative" id="miniChart"></div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line)">
                    <div style="padding:14px 20px;border-right:1px solid var(--line)">
                        <div class="pv-mut" style="font-size:.75rem">24h Volume</div>
                        <div style="font-weight:700" class="num">$28.4B</div>
                    </div>
                    <div style="padding:14px 20px">
                        <div class="pv-mut" style="font-size:.75rem">Market Cap</div>
                        <div style="font-weight:700" class="num">$1.33T</div>
                    </div>
                </div>
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
            <p class="pv-lead" style="margin:10px auto 0">Choose a verified crypto trader and automatically copy their positions with your own capital. One click, zero hassle.</p>
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
                    <div>
                        <div style="font-weight:700">{{ $t[1] }}</div>
                        <div class="pv-mut" style="font-size:.8rem">Copy traders: <b>{{ $t[4] }}</b></div>
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

<!-- ===== FEATURES ===== -->
<section class="pv-section">
    <div class="pv-container">
        <div style="text-align:center;max-width:640px;margin:0 auto 44px">
            <p class="pv-tag" style="text-align:center">Why PrimeVest</p>
            <h2 class="pv-h2">Everything you need to build wealth in crypto</h2>
        </div>
        <div class="pv-grid pv-grid-3 cards">
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(14,165,233,.12);color:#4cc3ff">📈</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Pro Trading Charts</h3>
                <p class="pv-foot" style="line-height:1.7">Candlestick charts with 100+ indicators, drawing tools and live order books — powered by TradingView.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(240,185,11,.12);color:var(--gold)">🏦</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">High-Yield Staking</h3>
                <p class="pv-foot" style="line-height:1.7">Earn up to 18% APY by staking stablecoins like USDT and USDC — rewards paid daily, right into your balance.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(168,85,247,.12);color:#c084fc">🔒</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Cold Storage Security</h3>
                <p class="pv-foot" style="line-height:1.7">98% of funds held in audited cold wallets, with 2FA, withdrawal whitelists and an insured hot wallet.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(24,216,147,.12)">⚡</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Instant Withdrawals</h3>
                <p class="pv-foot" style="line-height:1.7">Request funds anytime — most crypto withdrawals land in your wallet in under 10 minutes, 24/7.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(239,68,68,.12);color:#ff7c85">👥</div>
                <h3 style="margin:18px 0 8px;font-size:1.12rem">Copy Trading</h3>
                <p class="pv-foot" style="line-height:1.7">Automatically copy the strategies of proven professionals and grow alongside the best in the market.</p>
            </div>
            <div class="pv-panel pv-card" style="padding:28px">
                <div class="pv-icon" style="background:rgba(14,165,233,.12);color:#4cc3ff">🎓</div>
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
    // Hero chart sparkline (pure SVG, no deps)
    const syms = {
        BTCUSD:[67241.8,67200,67140,67180,67260,67340,67280,67210,67290,67360,67420,67380,67290,67241.8,2.41],
        ETHUSD:[3482.15,3488,3470,3455,3440,3468,3475,3480,3472,3458,3440,3462,3478,3482.15,-0.86],
        SOLUSD:[152.34,151,149.8,150.4,151.8,153,154.2,153.6,152.4,153.2,154.4,155.1,154.2,152.34,4.02],
        BNBUSD:[584.9,585,583,584.5,586,585.4,584,583.4,585.2,586.8,587,584.6,583.9,584.9,1.27],
        XRPUSD:[0.5841,0.58,0.581,0.583,0.586,0.588,0.585,0.582,0.584,0.587,0.589,0.586,0.583,0.5841,3.18]
    };
    function drawChart(key){
        const d = syms[key]; const pts = d.slice(0,14); const chg = d[14];
        const w=560,h=200,pad=6;
        const min=Math.min(...pts),max=Math.max(...pts);
        const coords=pts.map((p,i)=>{const x=(i/(pts.length-1))*w;const y=h-((p-min)/(max-min))*(h-pad*2)-pad;return [x,y]});
        const up = chg>=0; const col = up?'#18d893':'#ef4444';
        let path = coords.map((c,i)=>(i?'L':'M')+c[0].toFixed(1)+' '+c[1].toFixed(1)).join(' ');
        const area = path + ` L${w} ${h} L0 ${h} Z`;
        const grad = document.getElementById('miniChart').querySelector('defs linearGradient');
        document.getElementById('miniChart').innerHTML = `
            <svg width="100%" height="200" viewBox="0 0 ${w} ${h}" preserveAspectRatio="none">
                <defs><linearGradient id="g1" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="${col}" stop-opacity=".35"/><stop offset="1" stop-color="${col}" stop-opacity="0"/></linearGradient></defs>
                <path d="${area}" fill="url(#g1)"/>
                <path d="${path}" fill="none" stroke="${col}" stroke-width="2.4"/>
                ${coords.at(-1)[1]>20?`<circle cx="${coords.at(-1)[0]}" cy="${coords.at(-1)[1]}" r="4.5" fill="${col}"/>`:''}
            </svg>`;
    }
    document.querySelectorAll('.hero-tab span').forEach(el=>{
        el.addEventListener('click',()=>{
            document.querySelector('.hero-tab span.on').classList.remove('on');
            el.classList.add('on');
            const k=el.dataset.sym, price=parseFloat(el.dataset.price), chg=parseFloat(el.dataset.chg);
            document.getElementById('heroPrice').textContent='$'+price.toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:4});
            document.getElementById('heroChg').innerHTML=(chg>=0?'▲ +':'▼ ')+Math.abs(chg)+'%';
            document.getElementById('heroChg').className='pill '+(chg>=0?'pill-up':'pill-down')+' num';
            drawChart(k);
        });
    });
    drawChart('BTCUSD');
</script>
@endsection