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
        <div class="val num" style="color:var(--gold)">+{{ $profitPercentage >= 0 ? $profitPercentage : 0 }}%</div>
        <div class="sub">Lifetime return on balance</div>
    </div>
    <div class="kpi-card">
        <div class="lbl">Positions</div>
        <div class="val num">{{ $stocksCount }}</div>
        <div class="sub">P/L <span class="{{ ($totalProfitLoss ?? 0) >= 0 ? 'ok' : 'bad' }} num">{{ ($totalProfitLoss ?? 0) >= 0 ? '+' : '' }}${{ number_format($totalProfitLoss ?? 0, 2) }}</span></div>
    </div>
</div>

<!-- MAIN GRID: chart + quick actions -->
<div class="grid-3 mt" style="grid-template-columns:1.7fr 1fr">
    <!-- Portfolio performance -->
    <div class="pa" style="padding:22px">
        <div class="sec-h">
            <div><h2>Portfolio Performance</h2><p>Simulated growth of your invested capital</p></div>
            <span class="pill pill-g">● Live</span>
        </div>
        <div style="display:flex;gap:22px;flex-wrap:wrap;margin-bottom:18px">
            <div><span class="muted" style="font-size:.75rem">Portfolio value</span><div style="font-weight:800" class="num">${{ number_format($totalBalance, 2) }}</div></div>
            <div><span class="muted" style="font-size:.75rem">Growth (30d)</span><div style="font-weight:800" class="num ok">+4.82%</div></div>
            <div><span class="muted" style="font-size:.75rem">Last deposit</span><div style="font-weight:800" class="num">{{ $lastDepositDate ? '$'.number_format($lastDepositAmount,2).' · '.$lastDepositDate : '—' }}</div></div>
        </div>
        <div style="height:250px"><canvas id="growthChart"></canvas></div>
    </div>

    <!-- Quick actions + real market chart -->
    <div style="display:flex;flex-direction:column;gap:20px">
        <div class="pa" style="padding:22px">
            <div class="sec-h"><div><h2>Quick Actions</h2><p>Move your funds in seconds</p></div></div>
            <a href="{{ route('deposit') }}" class="btn btn-block" style="width:100%;margin-bottom:10px">⬆ Deposit Funds</a>
            <a href="{{ route('invest') }}" class="btn btn-gold btn-block" style="width:100%;margin-bottom:10px">🔥 Start Staking</a>
            <a href="{{ route('buy-crypto') }}" class="btn btn-ghost btn-block" style="width:100%">⟳ Buy Crypto</a>
        </div>
        <div class="pa pv-card" style="padding:22px;flex:1">
            <div class="sec-h"><div><h2>Live Market</h2><p>BTC/USD · 1H chart</p></div></div>
            <div style="height:180px;border-radius:12px;overflow:hidden">
                <div class="tradingview-widget-container" style="height:100%">
                    <div id="tvMini" style="height:100%"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        window.addEventListener('load',()=>{
                            if(typeof TradingView!=='undefined'){new TradingView.widget({container_id:"tvMini","width":"100%","height":"100%","symbol":"BITSTAMP:BTCUSD","interval":"60","theme":"dark","style":"1","locale":"en","hide_volume":true,"enable_publishing":false,"allow_symbol_change":true,"hide_side_toolbar":true,"withdateranges":false})}
                        });
                    </script>
                </div>
            </div>
        </div>
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
    document.addEventListener('DOMContentLoaded',()=>{
        if(typeof Chart==='undefined')return;
        const g=(i)=>[Number(document.querySelector('[data-growth-'+i+']')?.dataset?.growth)||30,31,32,30,33,35,34,36,38,37,39,41,42,44];
        const labels=['J','F','M','A','M','J','J','A','S','O','N','D'];
        const base=Math.max(100,({{ $totalBalance }}||100));
        const steps=Array.from({length:12},(_,i)=>{
            const growth = {0:0,1:0.6,2:1.3,3:2.1,4:2.8,5:3.4,6:3.9,7:4.6,8:5.2,9:5.8,10:6.3,11:6.8}[i]??0;
            return Number((base*(1-growth/100)).toFixed(2));
        });
        const ctx=document.getElementById('growthChart').getContext('2d');
        const grad=ctx.createLinearGradient(0,0,0,250);
        grad.addColorStop(0,'rgba(47,123,255,.35)');grad.addColorStop(1,'rgba(47,123,255,0)');
        new Chart(ctx,{
            type:'line',
            data:{labels,datasets:[{data:steps,fill:true,backgroundColor:grad,borderColor:'#4cc3ff',borderWidth:2.4,tension:.4,pointRadius:0,pointHoverRadius:5}]},
            options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false},tooltip:{backgroundColor:'#0d1526',borderColor:'rgba(255,255,255,.1)',borderWidth:1,callbacks:{label:(c)=>' $'+c.parsed.y.toLocaleString('en-US',{maximumFractionDigits:2})}}},scales:{x:{grid:{color:'rgba(255,255,255,.04)'},ticks:{color:'#5a6685',font:{size:10}}},y:{grid:{color:'rgba(255,255,255,.04)'},ticks:{color:'#5a6685',font:{size:10},callback:(v)=>'$'+v}}}}
        });
    });
</script>
@endsection