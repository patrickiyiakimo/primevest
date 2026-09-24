@extends('layouts.dashboard')

@section('page-title', 'Portfolio Overview')
@section('breadcrumb', 'Welcome back, ' . Auth::user()->name)

@section('dashboard-content')
@php
    $totalBalance = $user->balance + $profits + ($stocksCurrentValue ?? 0);
    $cashAvailable = $user->balance + $profits;
@endphp

<!-- KPI CARDS -->
<div class="kpi">
    <div class="kpi-card glow" style="background:linear-gradient(140deg,#0d1d2e,#0c1322)">
        <div class="lbl"><span style="width:8px;height:8px;border-radius:50%;background:var(--acc);box-shadow:0 0 10px var(--acc)"></span>Total Balance</div>
        <div class="val num" style="color:var(--acc)">${{ number_format($totalBalance, 2) }}</div>
        <div class="sub">Main {{ number_format($user->balance, 2) }} · Profits {{ number_format($profits, 2) }}</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">Available Cash</div>
        <div class="val num">${{ number_format($cashAvailable, 2) }}</div>
        <div class="sub">Ready to trade or stake</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">Est. Annual Return</div>
        <div class="val num" style="color:var(--gold);white-space:nowrap;overflow:hidden;text-overflow:ellipsis">+{{ number_format($profitPercentage >= 0 ? $profitPercentage : 0, 3) }}%</div>
        <div class="sub">Lifetime return on balance</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">Positions</div>
        <div class="val num">{{ $stocksCount }}</div>
        <div class="sub">P/L <span class="{{ ($totalProfitLoss ?? 0) >= 0 ? 'ok' : 'bad' }} num">{{ ($totalProfitLoss ?? 0) >= 0 ? '+' : '' }}${{ number_format($totalProfitLoss ?? 0, 2) }}</span></div>
    </div>
</div>

<!-- MAIN GRID: chart + quick actions -->
<div class="grid-3 mt" style="grid-template-columns:1.7fr 1fr;height:560px">
    <!-- Portfolio performance -->
    <div class="pa" style="padding:22px;display:flex;flex-direction:column;min-height:0">
        <div class="sec-h">
            <div><h2>Portfolio Performance</h2><p>Value curve based on your realized activity</p></div>
            <span class="pill pill-g">● Live</span>
        </div>
        <div style="display:flex;gap:22px;flex-wrap:wrap;margin-bottom:18px">
            <div><span class="muted" style="font-size:.75rem">Portfolio value</span><div style="font-weight:800" class="num">${{ number_format($totalBalance, 2) }}</div></div>
            <div><span class="muted" style="font-size:.75rem">Net P/L</span><div style="font-weight:800" class="num {{ $netPnl >= 0 ? 'ok' : 'bad' }}">{{ $netPnl >= 0 ? '+' : '' }}${{ number_format($netPnl, 2) }}</div></div>
            <div><span class="muted" style="font-size:.75rem">Last deposit</span><div style="font-weight:800" class="num">{{ $lastDepositDate ? '$'.number_format($lastDepositAmount,2).' · '.$lastDepositDate : '—' }}</div></div>
        </div>
        <div style="flex:1;min-height:0;position:relative">
            @if(count($chart))
                <canvas id="growthChart" style="height:100%;width:100%"></canvas>
            @else
                <div class="muted" style="height:100%;display:grid;place-items:center;text-align:center;font-size:.9rem">No activity yet — your performance chart will appear here after your first deposit or stake.</div>
            @endif
        </div>
    </div>

    <!-- Quick actions + market screener -->
    <div style="display:flex;flex-direction:column;gap:20px;min-height:0">
        <div class="pa" style="padding:22px">
            <div class="sec-h"><div><h2>Quick Actions</h2><p>Move your funds in seconds</p></div></div>
            <a href="{{ route('deposit') }}" class="btn btn-block" style="width:100%;margin-bottom:10px">⬆ Deposit Funds</a>
            <a href="{{ route('invest') }}" class="btn btn-gold btn-block" style="width:100%;margin-bottom:10px">🔥 Start Staking</a>
            <a href="{{ route('buy-crypto') }}" class="btn btn-ghost btn-block" style="width:100%">⟳ Buy Crypto</a>
        </div>
        <div class="pa pv-card" style="padding:22px 22px 14px;display:flex;flex-direction:column;flex:1;min-height:0">
            <div class="sec-h" style="margin-bottom:10px"><div><h2>Market Screener</h2><p>Real-time crypto overview</p></div></div>
            <div style="flex:1;min-height:0;border-radius:12px;overflow:hidden">
                <div id="tvScreener" style="height:100%"></div>
            </div>
        </div>
    </div>
</div>

<!-- MARKET OVERVIEW -->
<div class="pa mt" style="padding:22px">
    <div class="sec-h" style="margin-bottom:10px"><div><h2>Market Overview</h2><p>Global markets at a glance</p></div></div>
    <div style="height:590px;border-radius:12px;overflow:hidden">
        <div id="tvOverview" style="height:100%"></div>
    </div>
</div>

<!-- GROWTH STRIP -->
<div class="pa mt" style="padding:18px 22px;display:flex;flex-wrap:wrap;align-items:center;gap:22px">
    <div style="font-weight:800">⚡ Staking highlights</div>
    <div class="muted" style="font-size:.88rem">USDT Flexible — <b class="gold">9% APY</b> · BTC Staking — <b class="gold">6.75% APY</b> · ETH 2.0 — <b class="gold">5.2% APY</b></div>
    <a href="{{ route('invest') }}" class="btn btn-sm btn-ghost" style="margin-left:auto">View all plans</a>
</div>

<!-- COPY TRADING TEASER -->
<div class="pa mt" style="padding:22px">
    <div class="sec-h">
        <div><h2>Top Copy Traders</h2><p>Mirror proven strategies automatically</p></div>
        <a href="{{ route('trading') }}#copy-trading" class="btn btn-sm btn-ghost">See all traders</a>
    </div>
    <div class="grid-3">
        @php
            $traders = [
                ['SK','CryptoMatrix','+186.4%','3yr','128,402','#7c3aed'],
                ['LN','LunaBulls','+143.9%','2yr','94,118','#0ea5e9'],
                ['AS','SatoshiEdge','+119.2%','18mo','76,541','#f59e0b'],
            ];
        @endphp
        @foreach($traders as $t)
        <div style="display:flex;align-items:center;gap:12px;padding:14px;border-radius:13px;background:rgba(255,255,255,.035);border:1px solid var(--line)">
            <div style="width:42px;height:42px;border-radius:50%;background:{{ $t[5] }};display:grid;place-items:center;font-weight:800">{{ $t[0] }}</div>
            <div style="flex:1;min-width:0">
                <div style="font-weight:700;font-size:.9rem">{{ $t[1] }}</div>
                <div class="muted" style="font-size:.75rem">{{ $t[4] }} copiers</div>
            </div>
            <div style="text-align:right"><div class="num" style="font-weight:800;color:var(--acc)">+{{ $t[2] }}</div><div class="muted" style="font-size:.7rem">{{ $t[3] }} ROI</div></div>
        </div>
        @endforeach
    </div>
</div>

<!-- RECENT TRANSACTIONS -->
<div class="pa mt" style="padding:22px">
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
                    @elseif(($tx['type'] ?? '') == 'investment')<span class="pill pill-b">🔥 Staking</span>
                    @else<span class="pill pill-b">{{ ucfirst($tx['type'] ?? 'Trade') }}</span>
                    @endif
                </td>
                <td class="num {{ in_array(($tx['type'] ?? ''), ['withdrawal']) ? 'bad' : 'ok' }}" style="font-weight:700">
                    {{ in_array(($tx['type'] ?? ''), ['withdrawal']) ? '-' : '+' }}${{ number_format($tx['amount'] ?? 0, 2) }}
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
@endsection

@section('scripts')
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
        new Chart(ctx,{
            type:'line',
            data:{labels,datasets:[{data:values,fill:true,backgroundColor:grad,borderColor:up?'#4cc3ff':'#ff7c85',borderWidth:2.4,tension:.35,pointRadius:0,pointHoverRadius:5}]},
            options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false},tooltip:{backgroundColor:'#0d1526',borderColor:'rgba(255,255,255,.1)',borderWidth:1,callbacks:{label:(c)=>' $'+c.parsed.y.toLocaleString('en-US',{maximumFractionDigits:2})}}},scales:{x:{grid:{color:'rgba(255,255,255,.04)'},ticks:{color:'#5a6685',font:{size:10}}},y:{grid:{color:'rgba(255,255,255,.04)'},ticks:{color:'#5a6685',font:{size:10},callback:(v)=>'$'+v}}}}
        });
    });
</script>
@endsection