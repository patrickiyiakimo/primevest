@extends('layouts.dashboard')

@section('page-title', 'Trading Desk')
@section('breadcrumb', 'Equities · Live admin feed')

@section('dashboard-content')
@php
    $BRANDS = [
        'AAPL' => ['i' => 'apple',     'c' => '#454b57'],
        'MSFT' => ['i' => 'microsoft', 'c' => '#1e6fb8'],
        'GOOGL'=> ['i' => 'google',    'c' => '#4285f4'],
        'AMZN' => ['i' => 'amazon',    'c' => '#23303e'],
        'TSLA' => ['i' => 'tesla',     'c' => '#b8231f'],
        'NVDA' => ['i' => 'nvidia',    'c' => '#5c8a00'],
        'META' => ['i' => 'meta',      'c' => '#0668e1'],
        'NFLX' => ['i' => 'netflix',   'c' => '#b40f17'],
    ];
    $br = fn($s) => $BRANDS[$s] ?? ['i' => 'arrow-trend-up', 'c' => '#454b57'];
    $sym = $market['symbol'] ?? 'TSLA';
@endphp

<style>
    .mk-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
    @media(max-width:1240px){.mk-grid{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:560px){.mk-grid{grid-template-columns:1fr}}
    .mk-card{position:relative;cursor:pointer;border:1px solid var(--line);border-radius:12px;padding:14px 15px;background:rgba(255,255,255,.025);transition:border-color .18s,background .18s,transform .18s}
    .mk-card:hover{border-color:rgba(150,165,190,.35);background:rgba(255,255,255,.045);transform:translateY(-1px)}
    .mk-card.on{border-color:rgba(150,165,190,.55);background:rgba(148,163,184,.06);box-shadow:0 0 0 1px rgba(150,165,190,.28)}
    [data-theme="light"] .mk-card{background:rgba(10,24,52,.02)}
    [data-theme="light"] .mk-card:hover{background:rgba(10,24,52,.05)}
    [data-theme="light"] .mk-card.on{background:rgba(10,24,52,.07)}

    /* brand logo tiles */
    .lg{position:relative;width:38px;height:38px;border-radius:10px;display:inline-flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;box-shadow:inset 0 1px 0 rgba(255,255,255,.14)}
    .lg img{position:absolute;inset:0;width:100%;height:100%;object-fit:contain;padding:26%;z-index:2}
    .lg-m{display:inline-flex;align-items:center;justify-content:center;width:100%;height:100%;color:#fff;font-weight:800;font-size:.78rem;letter-spacing:.02em}
    .lg.sm{width:26px;height:26px;border-radius:7px}
    .lg.sm img{padding:22%}
    .lg.sm .lg-m{font-size:.62rem}

    .mk-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:9px}
    .mk-id{display:flex;align-items:center;gap:10px;min-width:0}
    .mk-name{font-weight:600;font-size:.88rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .mk-sym{font-size:.68rem;color:var(--muted);font-weight:600;letter-spacing:.1em}
    .mk-price{font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums;font-weight:600;font-size:1.02rem}
    .mk-spark{display:block;width:100%;height:22px;margin-top:8px}

    /* neutral delta pills */
    .pl{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:999px;font-size:.74rem;font-weight:700;font-family:'JetBrains Mono',monospace}
    .pl.up{color:#2eae82;background:rgba(46,174,130,.1)}
    .pl.dn{color:#e5534b;background:rgba(229,83,75,.1)}
    [data-theme="light"] .pl.up{color:#1f996f;background:rgba(31,153,111,.1)}
    [data-theme="light"] .pl.dn{color:#d84941;background:rgba(216,73,65,.1)}

    .live-tag{display:inline-flex;align-items:center;gap:7px;font-size:.7rem;font-weight:700;color:#2eae82;letter-spacing:.08em;text-transform:uppercase}
    .live-dot{width:6px;height:6px;border-radius:50%;background:#2eae82}

    /* header / stats */
    .hdr-stats{display:flex;align-items:center;gap:7px;flex-wrap:wrap}
    .hdr-stats .st{font-family:'JetBrains Mono',monospace;font-size:.72rem;color:var(--muted);padding:4px 9px;border:1px solid var(--line);border-radius:8px}
    .hdr-stats .st b{color:var(--text);font-weight:600}

    .seg{display:flex;gap:4px;padding:4px;background:rgba(255,255,255,.045);border:1px solid var(--line);border-radius:10px;margin-bottom:18px}
    .seg button{flex:1;background:none;border:0;border-radius:7px;padding:9px 0;font-family:inherit;font-weight:700;font-size:.86rem;color:var(--muted);cursor:pointer;transition:.18s}
    .seg button.on{color:#fff;background:#d84941}
    [data-theme="light"] .seg{background:rgba(10,24,52,.04)}

    /* Was a fixed 320px, which flattened the candles and the volume bars.
       clamp() lets it grow on desktop without swamping a phone. */
    .chart-wrap{position:relative;height:clamp(420px,64vh,700px)}
    @media(max-width:640px){.chart-wrap{height:clamp(320px,54vh,430px)}}
    /* ---- top crypto live chart ---- */
    .cx-tabs{display:flex;flex-wrap:wrap;gap:8px}
    .cx-tab{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:12px;
        border:1px solid var(--line);background:rgba(10,24,52,.02);color:var(--text);
        font-size:.82rem;font-weight:700;cursor:pointer;transition:.2s}
    .cx-tab:hover{border-color:rgba(47,123,255,.45);background:rgba(47,123,255,.07)}
    .cx-tab .cx-d{display:grid;place-items:center;width:26px;height:26px;border-radius:8px;
        background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04121f;font-size:.68rem;font-weight:800;letter-spacing:-.02em}
    .cx-tab.on{border-color:rgba(47,123,255,.6);background:rgba(47,123,255,.13);
        box-shadow:0 0 0 3px rgba(47,123,255,.10)}
    .cx-live{position:absolute;top:44px;right:32px;z-index:3;display:flex;align-items:center;gap:6px;
        padding:5px 11px;border-radius:999px;background:rgba(15,185,129,.12);
        border:1px solid rgba(16,185,129,.35);color:#2eae82;font-size:.68rem;font-weight:800;letter-spacing:.1em}
    .cx-live .live-dot{animation:pulseDot 1.8s ease-in-out infinite}
    @keyframes pulseDot{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(46,174,130,.6)}50%{opacity:.55;box-shadow:0 0 0 5px rgba(46,174,130,0)}}
    .cx-box{position:relative;height:clamp(400px,52vh,560px);border-radius:14px;overflow:hidden;
        border:1px solid var(--line);background:rgba(10,24,52,.02)}
    .cx-fallback{margin:0;padding:20px;color:var(--muted);font-size:.88rem;text-align:center}
    .cx-note{margin:10px 2px 0;color:var(--muted);font-size:.74rem}
    @media(max-width:640px){
        .cx-box{height:clamp(320px,48vh,420px)}
        .cx-live{top:14px;right:16px}
    }
    .chart-wrap canvas{display:block;width:100%!important;height:100%!important}

    .chart-order{display:grid;grid-template-columns:1.8fr 1fr;gap:20px;align-items:start}
    @media(max-width:1100px){.chart-order{grid-template-columns:1fr}}
</style>

<div class="kpi">
    <div class="kpi-card"><div class="lbl">Available Cash</div><div class="val num" id="kCash">${{ number_format($cashAvailable ?? 0, 2) }}</div><div class="sub">Balance + profits</div></div>
    <div class="kpi-card"><div class="lbl">Total Net Worth</div><div class="val num" id="kNet">${{ number_format($totalNetWorth ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Open Positions</div><div class="val num" id="kPos">{{ count($portfolio ?? []) }}</div></div>
    <div class="kpi-card"><div class="lbl">Market Feed</div><div class="live-tag" style="margin-top:9px"><span class="live-dot"></span>Live</div><div class="sub" id="kFeed">Streaming admin prices</div></div>
</div>

<!-- ===== ALL MARKETS WATCHLIST ===== -->
<div class="pa mt" style="padding:18px">
    <div class="sec-h"><div><h2>All Markets</h2><p>Select a security to chart &amp; trade · prices stream from the admin feed</p></div></div>
    <div class="mk-grid" id="marketList">
        @foreach(($market['quotes'] ?? []) as $q)
            @php $b = $br($q['symbol']); @endphp
            <div class="mk-card {{ $sym === $q['symbol'] ? 'on' : '' }}" data-sym="{{ strtolower($q['symbol']) }}" data-symbol="{{ $q['symbol'] }}" onclick="selectStock('{{ $q['symbol'] }}')">
                <div class="mk-top">
                    <div class="mk-id">
                        <span class="lg" style="background:{{ $b['c'] }}">
                            <img src="https://cdn.simpleicons.org/{{ $b['i'] }}/FFFFFF" alt="{{ $q['symbol'] }}" loading="lazy" onerror="this.remove()">
                            <span class="lg-m">{{ substr($q['symbol'],0,1) }}</span>
                        </span>
                        <div style="min-width:0">
                            <div class="mk-name">{{ substr($q['name'],0,18) }}</div>
                            <div class="mk-sym">{{ $q['symbol'] }}</div>
                        </div>
                    </div>
                    <div style="text-align:right">
                        <div class="mk-price" id="mk-p-{{ $q['symbol'] }}">{{ number_format($q['price'],2) }}</div>
                        <div class="pl {{ ($q['change'] ?? 0) >= 0 ? 'up' : 'dn' }}" style="margin-top:2px" id="mk-c-{{ $q['symbol'] }}">{{ ($q['change'] ?? 0) >= 0 ? '+' : '' }}{{ number_format($q['change'] ?? 0,2) }} ({{ ($q['change_percent'] ?? 0) >= 0 ? '+' : '' }}{{ $q['change_percent'] ?? 0 }}%)</div>
                    </div>
                </div>
                <svg class="mk-spark" id="mk-s-{{ $q['symbol'] }}" aria-hidden="true"></svg>
            </div>
        @endforeach
    </div>
</div>

<!-- ===== TOP CRYPTO · LIVE CHART ===== -->
<div class="pa mt" style="padding:18px;position:relative">
    <div class="sec-h">
        <div>
            <h2>Top Crypto Assets</h2>
            <p>Live candlestick chart &middot; real-time TradingView feed</p>
        </div>
        <div class="cx-tabs" id="cxTabs">
            <button type="button" class="cx-tab on" data-cx="BITSTAMP:BTCUSD"><span class="cx-d">BTC</span><span>Bitcoin</span></button>
            <button type="button" class="cx-tab" data-cx="BITSTAMP:ETHUSD"><span class="cx-d">ETH</span><span>Ethereum</span></button>
            <button type="button" class="cx-tab" data-cx="BITSTAMP:SOLUSD"><span class="cx-d">SOL</span><span>Solana</span></button>
            <button type="button" class="cx-tab" data-cx="BINANCE:BNBUSDT"><span class="cx-d">BNB</span><span>BNB</span></button>
        </div>
    </div>
    <div class="cx-live"><span class="live-dot"></span> LIVE</div>
    <!-- Remounted by a MutationObserver below, so the chart follows the site theme. -->
    <div class="cx-box" id="cxChart">
        <noscript><p class="cx-fallback">Enable JavaScript to load the live crypto chart.</p></noscript>
    </div>
    <p class="cx-note">Market data provided by TradingView. Prices are indicative and may be delayed.</p>
</div>

<!-- ===== CHART + ORDER TICKET ===== -->
<div class="chart-order mt">
    <div class="pa" style="padding:18px">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px;flex-wrap:wrap;gap:12px">
            <div style="display:flex;align-items:center;gap:13px">
                @php $sel = $br($sym); @endphp
                <span class="lg" style="background:{{ $sel['c'] }}">
                    <img src="https://cdn.simpleicons.org/{{ $sel['i'] }}/FFFFFF" alt="{{ $sym }}" loading="lazy" onerror="this.remove()">
                    <span class="lg-m">{{ substr($sym,0,1) }}</span>
                </span>
                <div>
                    <div style="font-weight:700;font-size:1rem" id="hdName">{{ $market['quotes'][$sym]['name'] ?? 'Unknown' }} <span style="font-family:'JetBrains Mono',monospace;font-size:.78rem;color:var(--muted);font-weight:500" id="hdSym">{{ $sym }}</span></div>
                    <div style="font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums;font-weight:700;font-size:1.6rem;margin-top:2px" id="curPrice">${{ number_format($market['quotes'][$sym]['price'] ?? 0, 2) }}</div>
                </div>
            </div>
            <div class="hdr-stats">
                <span class="st" id="hdChg"></span>
                <span class="st">O <b id="hdO">{{ number_format($market['quotes'][$sym]['open'] ?? 0,2) }}</b></span>
                <span class="st">H <b id="hdH">{{ number_format($market['quotes'][$sym]['high'] ?? 0,2) }}</b></span>
                <span class="st">L <b id="hdL">{{ number_format($market['quotes'][$sym]['low'] ?? 0,2) }}</b></span>
                <span class="st">V <b id="hdV">{{ $market['quotes'][$sym]['volume'] ?? '—' }}M</b></span>
            </div>
        </div>
        <div class="chart-wrap">
            <canvas id="stockChart"></canvas>
        </div>
    </div>

    <div class="pa" style="padding:18px">
        <div style="font-weight:700;font-size:.9rem;margin-bottom:12px">New Order</div>
        <div class="seg">
            <button type="button" id="btnBuy" class="on" onclick="setSide('buy')">Buy</button>
            <button type="button" id="btnSell" onclick="setSide('sell')">Sell</button>
        </div>
        <form id="orderForm">
            <input type="hidden" name="symbol" value="{{ $sym }}" id="orderSym">
            <input type="hidden" name="order_type" value="market">
            <input type="hidden" name="side" value="buy" id="sideVal">
            <label class="lbl">Quantity (shares)</label>
            <input class="inp num" name="quantity" id="qty" type="number" min="0.01" step="0.01" value="1" style="margin-bottom:12px">
            <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 0">
                <span style="color:var(--muted);font-size:.8rem">Market price</span>
                <b id="tickPrice" style="font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums">${{ number_format($market['quotes'][$sym]['price'] ?? 0, 2) }}</b>
            </div>
            <div style="display:flex;justify-content:space-between;padding:12px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);margin-bottom:16px">
                <span style="color:var(--muted);font-size:.8rem">Estimated cost</span>
                <b id="estCost" style="font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums">${{ number_format($market['quotes'][$sym]['price'] ?? 0, 2) }}</b>
            </div>
            <button type="submit" class="btn btn-red btn-block" id="orderBtn" style="width:100%">Place Buy Order</button>
        </form>
        <div style="color:var(--muted);font-size:.72rem;margin-top:12px;text-align:center">Market order · 0.1% taker fee</div>
    </div>
</div>

<!-- ===== POSITIONS + RECENT TRADES ===== -->
<div class="mt" style="display:grid;gap:20px">
    <div class="pa" style="padding:18px">
        <div class="sec-h"><div><h2>Positions</h2></div></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>Asset</th><th>Qty</th><th>Avg</th><th>Last</th><th>Value</th><th>P/L</th></tr></thead>
            <tbody id="positionsBody">
                @forelse($portfolio ?? [] as $p)
                    @php $pb = $br($p['symbol']); @endphp
                    <tr data-sym="{{ strtolower($p['symbol']) }}" data-symbol="{{ $p['symbol'] }}">
                        <td>
                            <div style="display:flex;align-items:center;gap:9px">
                                <span class="lg sm" style="background:{{ $pb['c'] }}">
                                    <img src="https://cdn.simpleicons.org/{{ $pb['i'] }}/FFFFFF" alt="" loading="lazy" onerror="this.remove()">
                                    <span class="lg-m">{{ substr($p['symbol'],0,1) }}</span>
                                </span>
                                <div>
                                    <div style="font-weight:700;line-height:1.15">{{ $p['symbol'] }}</div>
                                    <div style="font-size:.68rem;color:var(--muted);line-height:1.2">{{ substr($p['company_name'] ?? '',0,20) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="num">{{ rtrim(rtrim(number_format($p['quantity'],4,'.',''),'0'),'.') }}</td>
                        <td class="num" style="color:var(--muted)">{{ number_format($p['average_price'],2) }}</td>
                        <td class="num pos-price" id="pos-p-{{ $p['symbol'] }}">{{ number_format($p['current_price'],2) }}</td>
                        <td class="num pos-value" id="pos-v-{{ $p['symbol'] }}">{{ number_format($p['current_value'],2) }}</td>
                        <td class="num pos-pl {{ $p['profit_loss'] >= 0 ? 'ok' : 'bad' }}" id="pos-pl-{{ $p['symbol'] }}">{{ $p['profit_loss'] >= 0 ? '+' : '' }}{{ number_format($p['profit_loss'],2) }}</td>
                    </tr>
                @empty
                    <tr id="posEmpty"><td colspan="6" style="text-align:center;padding:28px" class="muted">No open positions — select a security above to place your first order.</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
    <div class="pa" style="padding:18px">
        <div class="sec-h"><div><h2>Recent Trades</h2></div></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>Date</th><th>Side</th><th>Asset</th><th>Qty</th><th>Total</th></tr></thead>
            <tbody>
                @forelse($recentTransactions ?? [] as $t)
                <tr>
                    <td style="color:var(--muted);font-family:'JetBrains Mono',monospace;font-size:.76rem">{{ $t->created_at->format('Y-m-d H:i') }}</td>
                    <td><span class="pl {{ $t->type == 'buy' ? 'up' : 'dn' }}">{{ strtoupper($t->type) }}</span></td>
                    <td>{{ $t->symbol }}</td>
                    <td class="num">{{ $t->quantity }}</td>
                    <td class="num" style="font-weight:700">{{ number_format($t->total_amount,2) }}</td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:28px" class="muted">No trades recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
(function(){
    const INIT = @json($market);
    const isL = () => (document.documentElement.getAttribute('data-theme')||'').trim()==='light';
    const fmt = (v,d=2)=>Number(v||0).toLocaleString('en-US',{minimumFractionDigits:d,maximumFractionDigits:d});
    const money = (v)=>'$'+Number(v||0).toLocaleString('en-US',{maximumFractionDigits:2});

    let quotes = INIT.quotes || {};
    let history = INIT.history || {};
    let selected = INIT.symbol || 'TSLA';
    let chart = null;
    let series = [];
    let volumes = [];
    let retry = 0;

    const pal = ()=>({
        /* The line was a washed-out grey in both themes, so the theme toggle
           barely registered. These are the hero blues, so the switch is obvious
           and the chart matches the brand. */
        line: isL() ? '#2f7bff' : '#4cc3ff',
        fill: isL() ? 'rgba(47,123,255,.12)' : 'rgba(76,195,255,.18)',
        grid: isL() ? 'rgba(10,24,52,.05)' : 'rgba(255,255,255,.045)',
        tick: isL() ? '#5c6b86' : '#5a6685',
        bg:  isL() ? '#ffffff' : '#0d1526',
        bd:  isL() ? 'rgba(10,24,52,.12)' : 'rgba(255,255,255,.10)',
        ink: isL() ? '#0b1526' : '#eef2f9',
        spark: isL() ? '#6a7a94' : '#7f8ea8',
        vol: isL() ? 'rgba(10,24,52,.16)' : 'rgba(142,160,189,.26)',
        marker: isL() ? 'rgba(10,24,52,.25)' : 'rgba(148,163,184,.40)',
        tagInk: '#04121f',
    });

    /* ---- sparklines (neutral stroke) ---- */
    function spark(sym){
        const pts=history[sym]||[];
        if(pts.length<2)return;
        const els=document.getElementById('mk-s-'+sym);if(!els)return;
        const W=100,H=22,pad=2;
        const ps=pts.map(p=>p[1]);
        const mn=Math.min(...ps),mx=Math.max(...ps),rg=(mx-mn)||1;
        const step=(W-pad*2)/(ps.length-1);
        const d=ps.map((v,i)=>{
            const x=pad+i*step, y=H-pad-((v-mn)/rg)*(H-pad*2);
            return x.toFixed(1)+','+y.toFixed(1);
        }).join(' ');
        els.innerHTML='<polyline points="'+d+'" fill="none" stroke="'+pal().spark+'" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" opacity=".85"/>';
    }
    function sparkAll(){Object.keys(history).forEach(spark);}
    sparkAll();

    /* ---- watchlist selection ---- */
    window.selectStock=function(sym){
        if(selected===sym)return;
        selected=sym;
        document.querySelectorAll('.mk-card').forEach(c=>c.classList.toggle('on',c.getAttribute('data-symbol')===sym));
        document.querySelectorAll('.seg button').forEach(b=>{});
        document.getElementById('orderSym').value=sym;
        renderHeader();
        seedSeries();
        refreshChart();
        renderOrderPrice();
    };

    function renderHeader(){
        const q=quotes[selected];if(!q)return;
        document.getElementById('hdName').firstChild.textContent=q.name+' ';
        document.getElementById('hdSym').textContent=selected;
        document.getElementById('hdO').textContent=fmt(q.open);
        document.getElementById('hdH').textContent=fmt(q.high);
        document.getElementById('hdL').textContent=fmt(q.low);
        document.getElementById('hdV').textContent=(q.volume??'—')+'M';
        applyChg(document.getElementById('hdChg'),q.change,q.change_percent);
        document.getElementById('curPrice').textContent=money(q.price);
    }
    function applyChg(el,chg,pct){
        if(!el)return;
        const up=(chg??0)>=0;
        const col=up?'#2eae82':'#e5534b';
        el.className='st num';el.style.color=col;
        el.innerHTML='<b style="font-weight:600;color:inherit">'+selected+'</b> · <b style="font-weight:700;color:inherit">'+(up?'+':'')+fmt(chg)+'</b> ('+(up?'+':'')+fmt(pct)+'%)';
    }

    /* ---- chart ---- */
    function randVol(){return Math.round((0.3+Math.random()*2.4)*100)/100;}
    function seedSeries(){
        const pts=history[selected]||[];
        series=pts.map(p=>({t:p[0],y:p[1]}));
        const keep = volumes.length===pts.length ? volumes : null;
        volumes=pts.map((_,i)=>keep?keep[i]:randVol());
        const now=Math.floor(Date.now()/1000);
        if(series.length){
            const last=series[series.length-1];
            if(now-last.t>120){series.push({t:now,y:last.y});volumes.push(randVol());}
            else last.t=now;
        }
    }
    function sizeCanvas(){
        const el=document.getElementById('stockChart');if(!el)return false;
        const wrap=el.parentElement;if(!wrap)return false;
        const r=wrap.getBoundingClientRect();
        if(r.width>4&&r.height>4){el.width=Math.round(r.width);el.height=Math.round(r.height);return true;}
        return false;
    }
    const cpPlugin={
        id:'pvCp',
        afterDatasetsDraw(c){
            const ds=c.data.datasets[1];if(!ds||!ds.data.length)return;
            const last=ds.data[ds.data.length-1];if(last==null)return;
            const y=c.scales.y.getPixelForValue(last);
            const A=c.chartArea;if(y<A.top||y>A.bottom)return;
            const ctx=c.ctx,p=pal();
            ctx.save();
            ctx.strokeStyle=p.marker;ctx.setLineDash([5,4]);ctx.lineWidth=1;
            ctx.beginPath();ctx.moveTo(A.left,y+.5);ctx.lineTo(A.right,y+.5);ctx.stroke();
            ctx.setLineDash([]);
            const label='$'+Number(last).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});
            ctx.font='600 10px JetBrains Mono, monospace';
            const w=ctx.measureText(label).width+12,h=16,x=A.right-w;
            ctx.fillStyle=p.line;
            ctx.beginPath();
            if(ctx.roundRect)ctx.roundRect(x,y-h/2,w,h,4);else ctx.rect(x,y-h/2,w,h);
            ctx.fill();
            ctx.fillStyle=p.tagInk;ctx.textBaseline='middle';ctx.textAlign='center';
            ctx.fillText(label,x+w/2,y+.5);
            ctx.restore();
        }
    };
    function refreshChart(rebuild){
        const el=document.getElementById('stockChart');if(!el)return;
        if(typeof Chart==='undefined'){ if(retry<24){retry++;setTimeout(()=>refreshChart(rebuild),250);} return; }
        sizeCanvas();
        const p=pal();
        if(chart&&!rebuild&&series.length){
            chart.data.labels=series.map(s=>hh(s.t));
            chart.data.datasets[0].data=volumes;
            chart.data.datasets[1].data=series.map(s=>s.y);
            chart.update('none');
            return;
        }
        if(chart){try{chart.destroy()}catch(e){}chart=null;window.__stockChart=null;}
        if(!series.length)return;
        const ctx=el.getContext('2d');
        const grad=ctx.createLinearGradient(0,0,0,el.height||520);
        grad.addColorStop(0,p.fill);grad.addColorStop(1,'rgba(0,0,0,0)');
        try{
            chart=new Chart(ctx,{
                type:'line',
                data:{
                    labels:series.map(s=>hh(s.t)),
                    datasets:[
                        {type:'bar',data:volumes,yAxisID:'y1',backgroundColor:p.vol,barPercentage:.55,categoryPercentage:.85,borderWidth:0,z:1},
                        {data:series.map(s=>s.y),fill:true,backgroundColor:grad,borderColor:p.line,borderWidth:2,tension:.28,pointRadius:0,pointHoverRadius:4,pointHoverBackgroundColor:p.line,z:2}
                    ]
                },
                options:{
                    responsive:true,maintainAspectRatio:false,
                    animation:{duration:220},
                    interaction:{intersect:false,mode:'index'},
                    plugins:{
                        legend:{display:false},
                        tooltip:{
                            filter:(it)=>it.datasetIndex===1,
                            backgroundColor:p.bg,borderColor:p.bd,borderWidth:1,
                            titleColor:p.ink,bodyColor:p.ink,padding:10,
                            callbacks:{
                                title:(it)=>it[0].label+' · '+selected,
                                label:(c)=>'  '+money(c.parsed.y)
                            }
                        }
                    },
                    scales:{
                        x:{grid:{display:false},ticks:{color:p.tick,font:{size:9},maxTicksLimit:8},border:{display:false}},
                        y:{grid:{color:p.grid},ticks:{color:p.tick,font:{size:10},callback:(v)=>'$'+Number(v).toLocaleString('en-US',{maximumFractionDigits:2})},border:{display:false},afterDataLimits:(a)=>{const pad=Math.max(1,(a.max-a.min)*.12);a.min=a.min-pad;a.max=a.max+pad;}},
                        y1:{display:false,grid:{display:false},border:{display:false},stacked:true}
                    },
                    plugins:[cpPlugin]
                }
            });
            if(chart)window.__stockChart=chart;
        }catch(e){console.warn('chart build failed',e);}
    }
    function hh(ts){
        const d=new Date((ts||Math.floor(Date.now()/1000))*1000);
        const p=n=>String(n).padStart(2,'0');
        return p(d.getHours())+':'+p(d.getMinutes());
    }

    /* ---- order ticket ---- */
    function renderOrderPrice(){
        const q=quotes[selected];if(!q)return;
        document.getElementById('tickPrice').textContent=money(q.price);
        updateEst();
    }
    function livePrice(){const q=quotes[selected];return q?q.price:0;}
    function updateEst(){
        document.getElementById('estCost').textContent=money((parseFloat(document.getElementById('qty').value)||0)*livePrice());
    }
    document.getElementById('qty').addEventListener('input',updateEst);

    document.getElementById('orderForm').addEventListener('submit',e=>{
        e.preventDefault();
        const btn=document.getElementById('orderBtn');
        const sym=document.getElementById('orderSym').value, qty=document.getElementById('qty').value;
        const o=btn.textContent;btn.disabled=true;btn.textContent='Placing…';
        const fd=new FormData();fd.append('symbol',sym);fd.append('quantity',qty);fd.append('order_type','market');
        const meta=document.querySelector('meta[name="csrf-token"]');
        fetch(side==='buy' ? '{{ route('stock.buy') }}' : '{{ route('stock.sell') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json','X-CSRF-TOKEN':meta?meta.content:''}})
        .then(r=>r.json()).then(d=>{btn.disabled=false;btn.textContent=o;pvFlash(d.success?'flash-ok':'flash-err',d.message||'Order processed');if(d.success)setTimeout(()=>location.reload(),1200)})
        .catch(()=>{btn.disabled=false;btn.textContent=o;pvFlash('flash-err','Order failed. Please try again.')});
    });

    /* ---- live polling (admin price feed) ---- */
    function applyFeed(d){
        if(!d||!d.quotes)return;
        quotes=d.quotes;
        if(d.history)history=d.history;
        if(d.cash_available!=null)document.getElementById('kCash').textContent=money(d.cash_available);
        if(d.total_net_worth!=null)document.getElementById('kNet').textContent=money(d.total_net_worth);
        if(d.positions)document.getElementById('kPos').textContent=d.positions.length;
        document.getElementById('kFeed').textContent='Updated '+new Date((d.server_time||Math.floor(Date.now()/1000))*1000).toLocaleTimeString();
        Object.keys(d.quotes).forEach(sym=>{
            const q=d.quotes[sym];
            const pc=document.getElementById('mk-p-'+sym);
            if(pc)pc.textContent=fmt(q.price);
            const cc=document.getElementById('mk-c-'+sym);
            if(cc){cc.className='pl '+((q.change??0)>=0?'up':'dn');cc.textContent=(q.change>=0?'+':'')+fmt(q.change)+' ('+(q.change_percent>=0?'+':'')+fmt(q.change_percent)+'%)';}
        });
        if(d.history){
            const symP=selected;
            seedSeries();          // rebuild from live series (ends at current price)
            if(document.getElementById('mk-s-'+symP))sparkAll();
            if(chart)refreshChart();
            renderHeader();
            renderOrderPrice();
        }
        updatePositions(d.positions);
    }
    function updatePositions(pos){
        const tb=document.getElementById('positionsBody');
        if(!tb)return;
        const map={};
        (pos||[]).forEach(p=>map[p.symbol]=p);
        tb.querySelectorAll('tr[data-symbol]').forEach(r=>{
            const sym=r.getAttribute('data-symbol');
            const p=map[sym];
            const pc=document.getElementById('pos-p-'+sym),pv=document.getElementById('pos-v-'+sym),pl=document.getElementById('pos-pl-'+sym);
            if(p&&pc){pc.textContent=fmt(p.current_price);if(pv)pv.textContent=fmt(p.current_value);if(pl){pl.textContent=(p.profit_loss>=0?'+':'')+fmt(p.profit_loss);pl.className='num pos-pl '+(p.profit_loss>=0?'ok':'bad');}}
        });
    }
    const POLL=8000;
    function poll(){
        fetch('{{ route('stock.markets') }}?symbol='+encodeURIComponent(selected),{headers:{'Accept':'application/json'}})
        .then(r=>r.json()).then(d=>applyFeed(d)).catch(()=>{});
    }

    /* ---- live ticks (real-time micro-movement, pinned to admin price) ---- */
    const TICK=2400;
    function liveTick(){
        if(!chart||!series.length)return;
        const q=quotes[selected];if(!q)return;
        const base=Number(q.price)||0;
        const now=Math.floor(Date.now()/1000);
        const last=series[series.length-1];
        if(now>last.t){
            series.push({t:now,y:base});
            volumes.push(randVol());
            if(series.length>280){series=series.slice(-280);volumes=volumes.slice(-280);}
        }else{
            last.y=base;
        }
        const k=Math.min(series.length-2,10);
        for(let i=series.length-1-k;i<series.length-1;i++){
            series[i].y += (base-series[i].y)*0.16 + (Math.random()-0.5)*base*0.0011;
        }
        refreshChart();
    }

    /* ---- init ---- */
    let side='buy';
    window.setSide=function(s){
        side=s;
        document.getElementById('sideVal').value=s;
        document.getElementById('btnBuy').classList.toggle('on',s==='buy');
        document.getElementById('btnSell').classList.toggle('on',s==='sell');
        const b=document.getElementById('orderBtn');
        b.textContent=s==='buy'?'Place Buy Order':'Place Sell Order';
        b.className='btn '+(s==='sell'?'btn-ghost':'btn-red');
    };
    seedSeries();
    renderHeader();
    renderOrderPrice();
    const boot=()=>{sizeCanvas();refreshChart();};
    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',boot);else boot();
    let rsz;window.addEventListener('resize',()=>{clearTimeout(rsz);rsz=setTimeout(()=>{sizeCanvas();if(chart)chart.resize();},180)});
    new MutationObserver(()=>{sparkAll();refreshChart(true);}).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']});
    poll();
    setInterval(poll,POLL);
    setInterval(liveTick,TICK);
    document.addEventListener('visibilitychange',()=>{if(!document.hidden){poll();liveTick();}});
})();
</script>
<script>
/* ---- top crypto live chart (TradingView) ---- */
(function(){
    const SRC='https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js';
    const host=document.getElementById('cxChart');
    const tabs=document.getElementById('cxTabs');
    if(!host)return;
    const isLight=()=>(document.documentElement.getAttribute('data-theme')||'').trim()==='light';
    let active='BITSTAMP:BTCUSD';
    const mount=()=>{
        /* Rebuild from scratch, reading the *current* symbol and theme, so one
           observer serves both the tab switch and the theme toggle. */
        host.innerHTML='';
        const wrap=document.createElement('div');
        wrap.className='tradingview-widget-container';
        wrap.style.height='100%';
        const w=document.createElement('div');
        w.className='tradingview-widget-container__widget';
        w.style.height='100%';
        wrap.appendChild(w);
        const s=document.createElement('script');
        s.type='text/javascript';s.async=true;s.src=SRC;
        s.text=JSON.stringify({
            autosize:true,
            symbol:active,
            interval:'60',
            timezone:'Etc/UTC',
            colorTheme:isLight()?'light':'dark',
            style:'1',
            locale:'en',
            backgroundColor:'rgba(0,0,0,0)',
            gridColor:isLight()?'rgba(10,24,52,.10)':'rgba(255,255,255,.06)',
            hide_top_toolbar:false,
            allow_symbol_change:true,
            withdateranges:true,
            save_image:false,
            calendar:false,
            support_host:'https://www.tradingview.com'
        });
        wrap.appendChild(s);
        host.appendChild(wrap);
    };
    mount();
    if(tabs)tabs.addEventListener('click',(e)=>{
        const btn=e.target.closest('.cx-tab');
        if(!btn)return;
        const sym=btn.dataset.cx;
        if(!sym||sym===active)return;
        active=sym;
        tabs.querySelectorAll('.cx-tab').forEach(t=>t.classList.toggle('on',t===btn));
        mount();
    });
    try{new MutationObserver(mount).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']})}catch(e){}
})();
</script>
@endsection