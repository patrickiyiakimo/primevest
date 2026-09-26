@extends('layouts.dashboard')

@section('page-title', 'Portfolio Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
@php
    $totalBalance = $user->balance + $profits + ($stocksCurrentValue ?? 0);
    $cashAvailable = $user->balance + $profits;

    // One icon pair, reused by every balance toggle on the page.
    $eyeOn = '<svg class="i-on" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>';
    $eyeOff = '<svg class="i-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17.94 17.94A10.1 10.1 0 0112 20c-6.5 0-11-8-11-8a18.5 18.5 0 015.06-5.94M9.9 4.24A9.1 9.1 0 0112 4c6.5 0 11 8 11 8a18.4 18.4 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><path stroke-linecap="round" d="M1 1l22 22"/></svg>';
@endphp

{{-- Applied before any balance is painted so a refresh never flashes the amounts. --}}
<script>
    (function(){
        var h=false;
        try{h=localStorage.getItem('pv-hide-balances')==='1'}catch(e){}
        document.documentElement.classList.toggle('pv-balances-hidden',h);
    })();
</script>

@if($needsFundingOnboarding)
{{-- Dismissal is read before paint so the guide never flashes on repeat visits. --}}
<script>
    (function(){
        var KEY='pv-funding-onb-{{ $user->id }}';
        var d=false;
        try{d=localStorage.getItem(KEY)==='1'}catch(e){}
        document.documentElement.classList.toggle('pv-onb-dismissed',d);
    })();
</script>
@endif

<style>
    .pv-alert{position:fixed;left:50%;bottom:24px;transform:translate(-50%,170%);z-index:960;display:flex;align-items:center;gap:12px;width:min(520px,calc(100vw - 32px));padding:14px 16px;background:var(--panel2);border:1px solid var(--line);border-radius:16px;box-shadow:0 18px 50px rgba(0,0,0,.5);transition:transform .55s cubic-bezier(.22,1,.36,1)}
    .pv-alert.show{transform:translate(-50%,0)}
    .pv-alert-bar{width:4px;align-self:stretch;border-radius:99px;flex-shrink:0}
    .pv-alert-x{background:none;border:none;color:var(--muted);font-size:1.3rem;line-height:1;cursor:pointer;padding:0 2px;flex-shrink:0}
    .pv-alert-x:hover{color:var(--text)}
    .sig-ring{transform:rotate(-90deg)}
    .pv-modal{position:fixed;inset:0;z-index:999;display:none;align-items:center;justify-content:center;padding:16px;background:rgba(3,6,12,.72);backdrop-filter:blur(8px)}
    .pv-modal.open{display:flex}

    /* ===== Balance privacy toggle ===== */
    .pv-eye{display:inline-flex;align-items:center;justify-content:center;width:26px;height:26px;padding:0;margin-left:auto;flex-shrink:0;border-radius:8px;border:1px solid var(--line);background:rgba(255,255,255,.05);color:var(--muted);cursor:pointer;transition:.18s}
    .pv-eye:hover{color:var(--text);background:rgba(255,255,255,.1)}
    .pv-eye:focus-visible{outline:0;border-color:rgba(47,123,255,.55);box-shadow:0 0 0 3px rgba(47,123,255,.13)}
    .pv-eye svg{width:15px;height:15px}
    .pv-eye .i-off{display:none}
    .pv-balances-hidden .pv-eye{color:var(--acc);border-color:rgba(47,123,255,.4);background:rgba(47,123,255,.12)}
    .pv-balances-hidden .pv-eye .i-on{display:none}
    .pv-balances-hidden .pv-eye .i-off{display:block}
    /* Blur keeps the original width, so nothing reflows when toggling. */
    .pv-money{transition:filter .18s ease}
    .pv-balances-hidden .pv-money{filter:blur(7px);pointer-events:none;user-select:none;-webkit-user-select:none}

    /* ===== Portfolio performance ===== */
    .pv-grid-main{display:grid;grid-template-columns:1.7fr 1fr;gap:20px;height:560px}
    /* The chart must always sit in a box with a DEFINITE height, otherwise the
       canvas height:100% falls back to its intrinsic 300x150 and Chart.js's
       responsive observer fights the auto-height parent. */
    .pv-chart-box{flex:1;min-height:260px;position:relative}
    .pv-chart-box canvas{position:absolute!important;inset:0;width:100%!important;height:100%!important;display:block}
    .pv-perf-stats{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px;margin-bottom:18px}
    .pv-perf-stats>div{min-width:0}
    .pv-perf-stats .num{overflow-wrap:anywhere}
    .pv-sec-actions{display:flex;align-items:center;gap:10px;flex-shrink:0}
    .pv-tv-ov{height:590px;border-radius:12px;overflow:hidden}

    @media(max-width:1100px){
        .pv-grid-main{grid-template-columns:1fr;height:auto}
        .pv-chart-box{flex:none;height:300px;min-height:0}
        .pv-quickcol .pv-screener{min-height:420px}
    }
    @media(max-width:760px){
        .pv-perf-stats{grid-template-columns:1fr;gap:12px}
        .pv-tv-ov{height:420px}
    }
    @media(max-width:560px){
        .sec-h{flex-wrap:wrap;row-gap:10px}
        .sec-h h2{font-size:1.05rem}
        .sec-actions{width:100%}
    }

    /* ===== Mobile-only funding prompt =====
       Flat dark dialog, no gradients. Desktop and tablet are untouched. */
    .pv-onb{display:none}

    @media(max-width:768px){
        .pv-onb{display:flex;position:fixed;inset:0;z-index:970;align-items:center;
            justify-content:center;padding:20px;background:rgba(4,7,14,.78);
            backdrop-filter:blur(3px);-webkit-backdrop-filter:blur(3px);
            animation:pv-onb-in .22s ease-out}
        .pv-onb-card{position:relative;width:100%;max-width:320px;padding:26px 22px 22px;
            border-radius:18px;background:#0d1320;border:1px solid rgba(255,255,255,.11);
            box-shadow:0 20px 48px rgba(0,0,0,.6);text-align:center;
            animation:pv-onb-pop .26s cubic-bezier(.22,1,.36,1)}
        .pv-onb-x{position:absolute;top:8px;right:10px;width:28px;height:28px;padding:0;
            border:0;border-radius:8px;background:transparent;color:#6d7a91;
            font-size:1.3rem;line-height:1;cursor:pointer;transition:.18s}
        .pv-onb-x:hover{color:#eef2f9;background:rgba(255,255,255,.08)}
        .pv-onb-title{margin:0 0 8px;font-size:1.06rem;font-weight:700;line-height:1.4;
            letter-spacing:-.01em;color:#f2f6fc}
        .pv-onb-sub{margin:0 0 20px;font-size:.83rem;line-height:1.5;color:#8b97ad}
        .pv-onb-cta{display:block;width:100%;padding:13px;border-radius:12px;
            font-size:.92rem;font-weight:700;text-align:center;text-decoration:none;
            background:var(--acc);color:#03140d;transition:opacity .18s;
            box-shadow:0 10px 26px -12px rgba(47,123,255,.55)}
        .pv-onb-cta:hover{opacity:.9}

        /* An unfunded new account has no use for a 12M chart, a market screener
           or a duplicate deposit button, and on a phone they bury the popup's
           call to action. */
        .pv-dash-needs-funding .pv-onb-hide-sm{display:none}
    }
    @keyframes pv-onb-in{from{opacity:0}to{opacity:1}}
    @keyframes pv-onb-pop{from{opacity:0;transform:translateY(10px) scale(.97)}
        to{opacity:1;transform:none}}
    @media(prefers-reduced-motion:reduce){
        .pv-onb,.pv-onb-card{animation:none}
    }
</style>

<!-- MOBILE-ONLY FUNDING PROMPT -->
@if($needsFundingOnboarding)
{{-- Compact dark dialog. Hidden from 769px up so the desktop dashboard is
     untouched. Deliberately flat: no gradients, no multi-step content. --}}
<div class="pv-onb" data-pv-onb>
    <div class="pv-onb-card" role="dialog" aria-modal="true" aria-labelledby="pv-onb-title">
        <button type="button" class="pv-onb-x" data-pv-onb-close aria-label="Dismiss">&times;</button>
        <h2 class="pv-onb-title" id="pv-onb-title">Fund your account to start trading</h2>
        <p class="pv-onb-sub">Deposit funds to activate your portfolio.</p>
        <a href="{{ route('deposit') }}" class="pv-onb-cta">Deposit Funds</a>
    </div>
</div>
@endif

<!-- KPI CARDS -->
<div class="{{ $needsFundingOnboarding ? 'pv-dash-needs-funding' : '' }}">
<div class="kpi">
    <div class="kpi-card glow pv-shade">
        <div class="lbl">
            <span style="width:8px;height:8px;border-radius:50%;background:var(--acc);box-shadow:0 0 10px var(--acc)"></span>Total Balance
            <button type="button" class="pv-eye" data-pv-eye aria-pressed="false" aria-label="Show or hide balances">{!! $eyeOn !!}{!! $eyeOff !!}</button>
        </div>
        <div class="val num pv-money" style="color:var(--acc)">${{ number_format($totalBalance, 2) }}</div>
        <div class="sub pv-money">Main {{ number_format($user->balance, 2) }} · Profits {{ number_format($profits, 2) }}</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">
            Available Cash
            <button type="button" class="pv-eye" data-pv-eye aria-pressed="false" aria-label="Show or hide balances">{!! $eyeOn !!}{!! $eyeOff !!}</button>
        </div>
        <div class="val num pv-money">${{ number_format($cashAvailable, 2) }}</div>
        <div class="sub">Ready to trade or stake</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">
            Est. Annual Return
            <button type="button" class="pv-eye" data-pv-eye aria-pressed="false" aria-label="Show or hide balances">{!! $eyeOn !!}{!! $eyeOff !!}</button>
        </div>
        <div class="val num pv-money" style="color:var(--gold);white-space:nowrap;overflow:hidden;text-overflow:ellipsis">+{{ number_format($profitPercentage >= 0 ? $profitPercentage : 0, 3) }}%</div>
        <div class="sub">Lifetime return on balance</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">
            Positions
            <button type="button" class="pv-eye" data-pv-eye aria-pressed="false" aria-label="Show or hide balances">{!! $eyeOn !!}{!! $eyeOff !!}</button>
        </div>
        <div class="val num">{{ $stocksCount }}</div>
        <div class="sub">P/L <span class="pv-money {{ ($totalProfitLoss ?? 0) >= 0 ? 'ok' : 'bad' }} num">{{ ($totalProfitLoss ?? 0) >= 0 ? '+' : '' }}${{ number_format($totalProfitLoss ?? 0, 2) }}</span></div>
    </div>
</div>

<!-- SIGNAL STRENGTH -->
<div class="pa pv-shade mt" style="padding:16px 22px;display:flex;align-items:center;gap:18px;flex-wrap:wrap">
    <div style="display:flex;align-items:center;gap:14px">
        <svg class="sig-ring" width="64" height="64" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="42" fill="none" stroke="var(--line)" stroke-width="9"/>
            <circle id="sigRing" cx="50" cy="50" r="42" fill="none" stroke="url(#sigGrad)" stroke-width="9" stroke-linecap="round" stroke-dasharray="263.9" stroke-dashoffset="{{ round(263.9 * (1 - $signal / 100), 1) }}"/>
            <defs><linearGradient id="sigGrad" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#4cc3ff"/><stop offset="100%" stop-color="#2f7bff"/></linearGradient></defs>
        </svg>
        <div style="min-width:125px">
            <div class="muted" style="font-size:.68rem;text-transform:uppercase;letter-spacing:.12em;font-weight:700">Signal Strength</div>
            <div style="font-weight:800;font-size:1.25rem" class="num"><span id="sigPct">{{ $signal }}</span>%</div>
            <div class="muted" style="font-size:.78rem">Level <b class="ok">{{ $signalLevel }}</b></div>
        </div>
    </div>
    <div style="flex:1;min-width:220px;font-size:.88rem">
        @if($signalNext)
            <div style="display:flex;align-items:center;gap:12px">
                <div style="flex:1">
                    <div class="muted" style="margin-bottom:6px">Top up to unlock <b class="ok">{{ $signalNext['level'] }}</b> tier</div>
                    <div style="height:8px;border-radius:99px;background:var(--line);overflow:hidden">
                        <div style="height:100%;width:{{ $signal }}%;background:linear-gradient(90deg,#4cc3ff,#2f7bff);border-radius:99px;transition:width .6s"></div>
                    </div>
                </div>
                <div class="num" style="font-weight:800;font-size:1.1rem;color:var(--acc)">{{ $signal }}/100</div>
            </div>
            <div class="muted" style="font-size:.8rem;margin-top:6px">Deposit <b class="gold num pv-money">${{ number_format(max(0, $signalNext['threshold'] - $spendableBalance)) }}</b> more to reach <b class="ok num">{{ $signalNext['signal'] }}%</b> and enter elite {{ $signalNext['level'] }} trades.</div>
        @else
            <div class="ok" style="font-weight:700">🏆 Maximum signal reached — you have full access to elite trades &amp; staking plans.</div>
        @endif
    </div>
    <button class="btn" onclick="openSignalModal()">⚡ Boost Signal</button>
</div>

<!-- MAIN GRID: chart + quick actions -->
<div class="pv-grid-main mt">
    <!-- Portfolio performance -->
    <div class="pa" style="padding:22px;display:flex;flex-direction:column;min-height:0">
        <div class="sec-h">
            <div><h2>Portfolio Performance</h2><p>Value curve based on your realized activity</p></div>
            <div class="pv-sec-actions">
                <span class="pill pill-g">● Live</span>
                <button type="button" class="pv-eye" data-pv-eye aria-pressed="false" aria-label="Show or hide balances" style="margin-left:0">{!! $eyeOn !!}{!! $eyeOff !!}</button>
            </div>
        </div>
        <div class="pv-perf-stats">
            <div><span class="muted" style="font-size:.75rem">Portfolio value</span><div class="pv-money num" style="font-weight:800">${{ number_format($totalBalance, 2) }}</div></div>
            <div><span class="muted" style="font-size:.75rem">Net P/L</span><div class="pv-money num {{ $netPnl >= 0 ? 'ok' : 'bad' }}" style="font-weight:800">{{ $netPnl >= 0 ? '+' : '' }}${{ number_format($netPnl, 2) }}</div></div>
            <div><span class="muted" style="font-size:.75rem">Last deposit</span><div class="pv-money num" style="font-weight:800">{{ $lastDepositDate ? '$'.number_format($lastDepositAmount,2).' · '.$lastDepositDate : '—' }}</div></div>
        </div>
        <div class="pv-chart-box">
            @if(count($chart))
                <canvas id="growthChart"></canvas>
            @else
                <div class="muted" style="height:100%;display:grid;place-items:center;text-align:center;font-size:.9rem;padding:0 12px">No activity yet — your performance chart will appear here after your first deposit or stake.</div>
            @endif
        </div>
    </div>

    <!-- Quick actions + market screener -->
    <div class="pv-quickcol" style="display:flex;flex-direction:column;gap:20px;min-height:0">
        <div class="pa" style="padding:22px">
            <div class="sec-h"><div><h2>Quick Actions</h2><p>Move your funds in seconds</p></div></div>
            {{-- For a brand new phone user the funding popup is the single call to
                 action, so the duplicate deposit button is dropped here. Scoped to
                 the onboarding state; funded accounts keep it on every device. --}}
            <a href="{{ route('deposit') }}" class="btn btn-block pv-onb-hide-sm" style="width:100%;margin-bottom:10px">⬆ Deposit Funds</a>
            <a href="{{ route('invest') }}" class="btn btn-gold btn-block" style="width:100%;margin-bottom:10px">🔥 Start Staking</a>
            <a href="{{ route('buy-crypto') }}" class="btn btn-ghost btn-block" style="width:100%">⟳ Buy Crypto</a>
        </div>
        <div class="pa pv-card pv-screener pv-onb-hide-sm" style="padding:22px 22px 14px;display:flex;flex-direction:column;flex:1;min-height:0">
            <div class="sec-h" style="margin-bottom:10px"><div><h2>Market Screener</h2><p>Real-time crypto overview</p></div></div>
            <div style="flex:1;min-height:0;border-radius:12px;overflow:hidden">
                <div id="tvScreener" style="height:100%"></div>
            </div>
        </div>
    </div>
</div>

<!-- MARKET OVERVIEW -->
<div class="pa mt pv-onb-hide-sm" style="padding:22px">
    <div class="sec-h" style="margin-bottom:10px"><div><h2>Market Overview</h2><p>Global markets at a glance</p></div></div>
    <div class="pv-tv-ov">
        <div id="tvOverview" style="height:100%"></div>
    </div>
</div>

<!-- RECENT TRANSACTIONS -->
<div class="pa mt pv-onb-hide-sm" style="padding:22px">
    <div class="sec-h">
        <div><h2>Recent Transactions</h2><p>Your latest movements on PrimeVest</p></div>
        <a href="{{ route('deposits-history') }}" class="btn btn-sm btn-ghost">View all</a>
    </div>
    <div style="overflow-x:auto">
    <table class="tbl">
        <thead>
            <tr><th>Date</th><th>Type</th><th>Amount</th><th>Status</th><th>Reference</th></tr>
        </thead>
        <tbody>
            @forelse($transactions ?? [] as $tx)
            <tr>
                <td class="num muted" style="white-space:nowrap">{{ $tx['date'] ?? '' }}</td>
                <td>
                    @if(($tx['type'] ?? '') == 'deposit')<span class="pill pill-g">⬇ Deposit</span>
                    @elseif(($tx['type'] ?? '') == 'withdrawal')<span class="pill pill-r">⬆ Withdrawal</span>
                    @elseif(($tx['type'] ?? '') == 'profit')<span class="pill pill-y">★ Profit</span>
                    @elseif(($tx['type'] ?? '') == 'loss')<span class="pill pill-r">▼ Loss</span>
                    @elseif(($tx['type'] ?? '') == 'loss_reversal')<span class="pill pill-g">↩ Loss Reversed</span>
                    @elseif(($tx['type'] ?? '') == 'investment')<span class="pill pill-b">🔥 Staking</span>
                    @else<span class="pill pill-b">{{ ucfirst($tx['type'] ?? 'Trade') }}</span>
                    @endif
                </td>
                <td class="num {{ in_array(($tx['type'] ?? ''), ['withdrawal', 'loss']) ? 'bad' : 'ok' }}" style="font-weight:700">
                    {{ in_array(($tx['type'] ?? ''), ['withdrawal', 'loss']) ? '-' : '+' }}${{ number_format($tx['amount'] ?? 0, 2) }}
                </td>
                <td><span class="pill pill-g">● {{ ucfirst($tx['status'] ?? 'completed') }}</span></td>
                <td class="num muted" style="font-size:.78rem">{{ $tx['ref'] ?? '—' }}</td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;padding:40px" class="muted">
                No transactions yet — <a href="{{ route('deposit') }}" style="color:var(--acc);font-weight:700">make your first deposit</a> to get started.
            </td></tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    // All eye buttons share one state so any of them toggles every balance.
    (function(){        var KEY='pv-hide-balances';
        function hidden(){
            try{return localStorage.getItem(KEY)==='1'}catch(e){return false}
        }
        function apply(on){
            try{localStorage.setItem(KEY,on?'1':'0')}catch(e){}
            document.documentElement.classList.toggle('pv-balances-hidden',on);
            document.querySelectorAll('[data-pv-eye]').forEach(function(b){
                b.setAttribute('aria-pressed',on?'true':'false');
                b.setAttribute('aria-label',on?'Show balances':'Hide balances');
            });
        }
        // Keep the icons/aria in sync with the class set before paint.
        apply(hidden());
        document.addEventListener('click',function(e){
            var b=e.target.closest&&e.target.closest('[data-pv-eye]');
            if(!b)return;
            e.preventDefault();
            apply(!hidden());
        });
    })();
</script>
@if($needsFundingOnboarding)
<script>
    /* The dialog is the only funding prompt. Dismissal is remembered per account
       so it is shown once rather than on every visit. */
    (function(){
        var KEY='pv-funding-onb-{{ $user->id }}';
        var card=document.querySelector('[data-pv-onb]');
        if(!card)return;

        if(document.documentElement.classList.contains('pv-onb-dismissed')){
            card.style.display='none';
        }

        document.addEventListener('click',function(e){
            var x=e.target.closest&&e.target.closest('[data-pv-onb-close]');
            if(!x)return;
            e.preventDefault();
            document.documentElement.classList.add('pv-onb-dismissed');
            try{localStorage.setItem(KEY,'1')}catch(e){}
            card.style.display='none';
        });
    })();
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    if(typeof pvThemedWidget==='function'){
        pvThemedWidget('tvScreener','https://s3.tradingview.com/external-embedding/embed-widget-screener.js',{
            "width":"100%","height":"100%","defaultColumn":"overview","screener_type":"crypto_mkt",
            "displayCurrency":"USD","locale":"en","isTransparent":true,"showLogo":true
        });
        pvThemedWidget('tvOverview','https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js',{
            "width":"100%","height":"100%","dateRange":"12M","showChart":true,"locale":"en","largeChartUrl":"",
            "isTransparent":true,"showSymbolLogo":true,"showFloatingTooltip":false,
            "plotLineColorGrowing":"rgba(41,98,255,1)","plotLineColorFalling":"rgba(41,98,255,1)",
            "gridLineColor":"rgba(240,243,250,0)","scaleFontColor":"rgba(106,109,120,1)",
            "belowLineFillColorGrowing":"rgba(41,98,255,0.12)","belowLineFillColorFalling":"rgba(41,98,255,0.12)",
            "belowLineFillColorGrowingBottom":"rgba(41,98,255,0)","belowLineFillColorFallingBottom":"rgba(41,98,255,0)",
            "symbolActiveColor":"rgba(41,98,255,0.12)",
            "tabs":[
                {"title":"Crypto","symbols":[
                    {"s":"BINANCE:BTCUSDT","d":"Bitcoin"},
                    {"s":"BINANCE:ETHUSDT","d":"Ethereum"},
                    {"s":"BINANCE:SOLUSDT","d":"Solana"},
                    {"s":"BINANCE:XRPUSDT","d":"XRP"},
                    {"s":"BINANCE:BNBUSDT","d":"BNB"},
                    {"s":"BINANCE:ADAUSDT","d":"Cardano"},
                    {"s":"BINANCE:DOGEUSDT","d":"Dogecoin"},
                    {"s":"BINANCE:LINKUSDT","d":"Chainlink"},
                    {"s":"BINANCE:DOTUSDT","d":"Polkadot"},
                    {"s":"COINBASE:AVAXUSD","d":"Avalanche"}
                ]},
                {"title":"Indices","symbols":[{"s":"TVC:DJI","d":"Dow 30"},{"s":"TVC:SPX","d":"S&P 500"},{"s":"NASDAQ:IXIC","d":"Nasdaq 100"}]},
                {"title":"Forex","symbols":[{"s":"FX:EURUSD","d":"EUR/USD"},{"s":"FX:GBPUSD","d":"GBP/USD"},{"s":"FX:USDJPY","d":"USD/JPY"}]}
            ]
        });
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded',()=>{
        if(typeof Chart==='undefined')return;
        const rows=@json($chart);
        const el=document.getElementById('growthChart');
        if(!el||rows.length<1)return;
        const labels=rows.map(r=>r.d);
        const values=rows.map(r=>r.v);
        const ctx=el.getContext('2d');
        const grad=ctx.createLinearGradient(0,0,0,el.clientHeight||260);
        grad.addColorStop(0,'rgba(47,123,255,.35)');grad.addColorStop(1,'rgba(47,123,255,0)');
        const up=(values[values.length-1]||0)>=(values[0]||0);
        const isLight=document.documentElement.getAttribute('data-theme')==='light';
        const tipBg=isLight?'#ffffff':'#0d1526';
        const tipBorder=isLight?'rgba(10,24,52,.12)':'rgba(255,255,255,.1)';
        const gridCol=isLight?'rgba(10,24,52,.06)':'rgba(255,255,255,.04)';
        const tickCol=isLight?'#5c6b86':'#5a6685';
        new Chart(ctx,{
            type:'line',
            data:{labels,datasets:[{data:values,fill:true,backgroundColor:grad,borderColor:up?'#4cc3ff':'#ff7c85',borderWidth:2.4,tension:.35,pointRadius:0,pointHoverRadius:5}]},
            options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false},tooltip:{backgroundColor:tipBg,borderColor:tipBorder,borderWidth:1,callbacks:{label:(c)=>' $'+c.parsed.y.toLocaleString('en-US',{maximumFractionDigits:2})},titleColor:isLight?'#0b1526':'#eef2f9',bodyColor:isLight?'#0b1526':'#eef2f9'}},scales:{x:{grid:{color:gridCol},ticks:{color:tickCol,font:{size:10}}},y:{grid:{color:gridCol},ticks:{color:tickCol,font:{size:10},callback:(v)=>'$'+v}}}}
        });
    });
</script>
<script>
    const SIG={v:{{ $signal }}};
    const SIG_R=70;
    const SIG_C=(2*Math.PI*SIG_R).toFixed(1);
    function openSignalModal(){
        const modal=document.getElementById('sigModal');
        modal.classList.add('open');
        const ring=document.getElementById('sigModalRing');
        const val=document.getElementById('sigModalVal');
        ring.style.strokeDasharray=SIG_C;
        ring.style.strokeDashoffset=SIG_C;
        val.textContent='0';
        let cur=0;
        const step=Math.max(1,Math.round(SIG.v/40));
        const t=setInterval(()=>{
            cur=Math.min(SIG.v,cur+step);
            val.textContent=cur;
            ring.style.strokeDashoffset=(SIG_C*(1-cur/100)).toFixed(1);
            if(cur>=SIG.v)clearInterval(t);
        },24);
        try{sessionStorage.setItem('pv-sig','1')}catch(e){}
    }
    function closeSignalModal(){document.getElementById('sigModal').classList.remove('open')}
    document.addEventListener('keydown',(e)=>{if(e.key==='Escape')closeSignalModal()});
    document.addEventListener('click',(e)=>{if(e.target&&e.target.id==='sigModal')closeSignalModal()});
    if(SIG.v<100){
        let seen=false;
        try{seen=!!sessionStorage.getItem('pv-sig')}catch(e){}
        if(!seen)setTimeout(openSignalModal,900);
    }
</script>

<!-- SIGNAL MODAL -->
<div id="sigModal" class="pv-modal">
    <div style="width:480px;max-width:100%;background:linear-gradient(160deg,#1a1442 0%,#0d0a1a 40%,#0a0614 100%);border:1px solid rgba(124,58,237,.3);border-radius:24px;padding:32px;position:relative;overflow:hidden;text-align:center;box-shadow:0 24px 64px rgba(0,0,0,.6)">
        <div style="position:absolute;top:-40%;right:-20%;width:200px;height:200px;background:radial-gradient(circle,rgba(124,58,237,.4),transparent 70%);pointer-events:none"></div>
        <div style="position:absolute;bottom:-30%;left:-15%;width:160px;height:160px;background:radial-gradient(circle,rgba(47,123,255,.3),transparent 70%);pointer-events:none"></div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;position:relative;z-index:1">
            <span style="font-size:.65rem;text-transform:uppercase;letter-spacing:.2em;color:#a78bfa">Signal Strength</span>
            <button onclick="closeSignalModal()" style="background:none;border:none;color:rgba(255,255,255,.5);font-size:1.4rem;cursor:pointer;line-height:1">&times;</button>
        </div>

        <!-- Gauge -->
        <div style="position:relative;width:160px;height:160px;margin:0 auto 20px;z-index:1">
            <svg width="160" height="160" viewBox="0 0 160 160" style="transform:rotate(-90deg)">
                <circle cx="80" cy="80" r="70" fill="none" stroke="rgba(255,255,255,.08)" stroke-width="10"/>
                <circle id="sigModalRing" cx="80" cy="80" r="70" fill="none" stroke="url(#sigGrad2)" stroke-width="10" stroke-linecap="round" stroke-dasharray="439.8" stroke-dashoffset="439.8" style="transition:stroke-dashoffset .3s"/>
                <defs><linearGradient id="sigGrad2" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#7c3aed"/><stop offset="50%" stop-color="#2f7bff"/><stop offset="100%" stop-color="#a78bfa"/></linearGradient></defs>
            </svg>
            <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center">
                <span id="sigModalVal" style="font-size:3rem;font-weight:800;color:#fff">0</span>
                <span style="font-size:.65rem;text-transform:uppercase;letter-spacing:.15em;color:rgba(255,255,255,.5)">Percent</span>
            </div>
        </div>

        <!-- Level -->
        <div style="margin-bottom:16px;position:relative;z-index:1">
            <span style="display:inline-block;padding:6px 20px;background:linear-gradient(90deg,#7c3aed,#2f7bff);border-radius:20px;font-size:.8rem;font-weight:600;color:#fff;letter-spacing:.05em">{{ $signalLevel }}</span>
        </div>

        @if($signalNext)
            <p style="font-size:.95rem;color:rgba(255,255,255,.85);margin-bottom:8px;position:relative;z-index:1;line-height:1.6">
                🎯 To unlock <strong style="color:#a78bfa">{{ $signalNext['level'] }}</strong> trading signals, deposit at least <strong style="color:#fff">${{ number_format($signalNext['threshold']) }}</strong>
            </p>
            <p style="font-size:.8rem;color:rgba(255,255,255,.5);margin-bottom:20px;position:relative;z-index:1">
                You're at ${{ number_format($spendableBalance) }} — deposit <strong style="color:#7c3aed">${{ number_format(max(0,$signalNext['threshold']-$spendableBalance)) }}</strong> more to reach {{ $signalNext['signal'] }}% signal
            </p>
        @else
            <p style="font-size:.95rem;color:#a78bfa;margin-bottom:20px;position:relative;z-index:1;font-weight:600">
                🏆 You've reached maximum signal strength! Full access to all trading signals.
            </p>
        @endif

        <!-- Progress -->
        <div style="background:rgba(255,255,255,.08);border-radius:10px;height:8px;overflow:hidden;margin-bottom:24px;position:relative;z-index:1">
            <div style="height:100%;width:{{ $signal }}%;background:linear-gradient(90deg,#7c3aed,#2f7bff);border-radius:10px;transition:width .4s"></div>
        </div>

        <!-- CTAs -->
        <div style="display:flex;gap:12px;position:relative;z-index:1">
            <a href="{{ route('deposit') }}" style="flex:1;padding:14px;background:linear-gradient(90deg,#7c3aed,#2f7bff);border-radius:12px;color:#fff;text-align:center;text-decoration:none;font-weight:600;font-size:.9rem;transition:opacity .2s" onmouseover="this.style.opacity=.85" onmouseout="this.style.opacity=1">💰 Deposit Now</a>
            <a href="{{ route('invest') }}" style="flex:1;padding:14px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:12px;color:#fff;text-align:center;text-decoration:none;font-weight:600;font-size:.9rem;transition:background .2s" onmouseover="this.style.background='rgba(255,255,255,.15)'" onmouseout="this.style.background='rgba(255,255,255,.1)'">📈 View Plans</a>
        </div>
    </div>
</div>
@endsection