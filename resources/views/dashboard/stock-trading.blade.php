@extends('layouts.dashboard')

@section('page-title', 'Trading Desk')
@section('breadcrumb', 'Crypto & asset trading on PrimeVest')

@section('dashboard-content')
@php $sym = $stock['symbol'] ?? 'TSLA'; @endphp

<div class="kpi">
    <div class="kpi-card"><div class="lbl">Available Cash</div><div class="val num ok">${{ number_format($cashAvailable ?? 0, 2) }}</div><div class="sub">Balance + profits</div></div>
    <div class="kpi-card"><div class="lbl">Total Net Worth</div><div class="val num">${{ number_format($totalNetWorth ?? 0, 2) }}</div></div>
    <div class="kpi-card"><div class="lbl">Open Positions</div><div class="val num">{{ count($portfolio ?? []) }}</div></div>
    <div class="kpi-card"><div class="lbl">Selected Asset</div><div class="val num" style="font-size:1.25rem">{{ $stock['name'] ?? $sym }}</div></div>
</div>

<div class="grid-2 mt" style="grid-template-columns:1.7fr 1fr">
    <!-- Chart + asset info -->
    <div class="pa" style="padding:18px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;flex-wrap:wrap;gap:12px">
            <div style="display:flex;align-items:center;gap:12px">
                <div class="side-badge" style="width:40px;height:40px;font-size:.9rem">{{ substr($sym,0,2) }}</div>
                <div>
                    <div style="font-weight:800">{{ $stock['name'] ?? $sym }} <span class="num muted" style="font-size:.8rem">{{ $sym }}</span></div>
                    <div class="num" style="font-weight:700;font-size:1.25rem" id="curPrice">${{ number_format($stock['price'] ?? 0, 2) }}</div>
                </div>
            </div>
            <div style="display:flex;gap:8px;flex-wrap:wrap">
                <span class="pill pill-b">Vol {{ $stock['volume'] ?? '—' }}M</span>
                <span class="pill pill-y">Cap {{ $stock['market_cap'] ?? '—' }}</span>
                <span class="pill {{ ($stock['price'] ?? $stock['open'] ??0) >= ($stock['open'] ??0) ? 'pill-g':'pill-r' }} num">24h {{ (($stock['price'] ?? 0) - ($stock['open'] ?? 0)) >= 0 ? '+' : '' }}{{ number_format((($stock['price'] ?? 0) - ($stock['open'] ?? 0)), 2) }}</span>
            </div>
        </div>
        <div style="height:360px;border-radius:12px;overflow:hidden">
            <div id="tvChart" style="height:100%"></div>
        </div>
    </div>

    <!-- Order ticket -->
    <div class="pa" style="padding:18px">
        <div style="display:flex;gap:6px;padding:6px;background:rgba(255,255,255,.05);border-radius:12px;margin-bottom:18px">
            <button class="btn btn-red btn-sm" style="flex:1" onclick="setSide('buy')" id="btnBuy">Buy</button>
            <button class="btn btn-ghost btn-sm" style="flex:1" onclick="setSide('sell')" id="btnSell">Sell</button>
        </div>
        <form id="orderForm">
            <input type="hidden" name="symbol" value="{{ $sym }}">
            <input type="hidden" name="order_type" value="market">
            <input type="hidden" name="side" value="buy" id="sideVal">
            <label class="lbl">Quantity (shares)</label>
            <input class="inp num" name="quantity" id="qty" type="number" min="0.01" step="0.01" value="1" style="margin-bottom:12px">
            <div style="display:flex;justify-content:space-between;padding:12px 0;border-top:1px solid var(--line);border-bottom:1px solid var(--line);margin-bottom:16px" class="num">
                <span class="muted">Est. cost @ market</span>
                <b id="estCost" style="color:var(--acc)">${{ number_format($stock['price'] ?? 0, 2) }}</b>
            </div>
            <button type="submit" class="btn btn-block" id="orderBtn">Place Buy Order</button>
        </form>
        <div class="muted" style="font-size:.76rem;margin-top:10px;text-align:center">Fees: 0.1% taker · Orders execute instantly on market depth</div>
    </div>
</div>

<!-- Portfolio + recent -->
<div class="grid-2 mt" style="grid-template-columns:1fr 1fr">
    <div class="pa" style="padding:18px">
        <div class="sec-h"><div><h2>My Positions</h2></div></div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>Asset</th><th>Qty</th><th>Avg</th><th>Current</th><th>Value</th><th>P/L</th></tr></thead>
            <tbody>
                @forelse($portfolio ?? [] as $p)
                <tr>
                    <td style="font-weight:700">{{ $p['symbol'] }}</td>
                    <td class="num">{{ $p['quantity'] }}</td>
                    <td class="num muted">${{ number_format($p['average_price'],2) }}</td>
                    <td class="num">${{ number_format($p['current_price'],2) }}</td>
                    <td class="num">${{ number_format($p['current_value'],2) }}</td>
                    <td class="num {{ $p['profit_loss'] >= 0 ? 'ok' : 'bad' }}">{{ $p['profit_loss'] >= 0 ? '+' : '' }}${{ number_format($p['profit_loss'],2) }}</td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;padding:30px" class="muted">No open positions yet — place your first trade.</td></tr>
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
                    <td class="num muted" style="font-size:.8rem">{{ $t->created_at->format('Y-m-d H:i') }}</td>
                    <td><span class="pill {{ $t->type == 'buy' ? 'pill-g' : 'pill-r' }}">{{ strtoupper($t->type) }}</span></td>
                    <td>{{ $t->symbol }}</td>
                    <td class="num">{{ $t->quantity }}</td>
                    <td class="num" style="font-weight:700">${{ number_format($t->total_amount,2) }}</td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center;padding:30px" class="muted">No trades recorded yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<script>
    let side='buy';
    function setSide(s){
        side=s;
        document.getElementById('sideVal').value=s;
        document.getElementById('btnBuy').className='btn btn-sm btn-'+(s==='buy'?'red':'ghost');document.getElementById('btnBuy').style.flex='1';
        document.getElementById('btnSell').className='btn btn-sm btn-'+(s==='sell'?'red':'ghost');document.getElementById('btnSell').style.flex='1';
        const b=document.getElementById('orderBtn');b.textContent= s==='buy'?'Place Buy Order':'Place Sell Order';
        b.className='btn btn-block'+(s==='sell'?' btn-red':'');
    }
    (function(){
        const price={{ $stock['price'] ?? 0 }};
        const q=document.getElementById('qty');
        const up=()=>{document.getElementById('estCost').textContent='$'+( (parseFloat(q.value)||0)*price ).toLocaleString('en-US',{maximumFractionDigits:2})};
        q.addEventListener('input',up);
        document.getElementById('orderForm').addEventListener('submit',e=>{
            e.preventDefault();
            const f=e.target,btn=document.getElementById('orderBtn');
            const sym=f.querySelector('[name=symbol]').value, qty=q.value;
            const o=btn.textContent;btn.disabled=true;btn.textContent='Placing…';
            const fd=new FormData();fd.append('symbol',sym);fd.append('quantity',qty);fd.append('order_type','market');
            fetch(side==='buy' ? '{{ route('stock.buy') }}' : '{{ route('stock.sell') }}',{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'}})
            .then(r=>r.json()).then(d=>{btn.disabled=false;btn.textContent=o;pvFlash(d.success?'flash-ok':'flash-err',d.message||'Order processed');if(d.success)setTimeout(()=>location.reload(),1200)})
            .catch(()=>{btn.disabled=false;btn.textContent=o;pvFlash('flash-err','Order failed. Please try again.')});
        });
        up();
    })();
    window.addEventListener('load',()=>{
        if(typeof TradingView!=='undefined'){
            new TradingView.widget({
                container_id:"tvChart","width":"100%","height":"100%",
                "symbol":"{{ $sym ? 'NASDAQ:'.$sym : 'BITSTAMP:BTCUSD' }}",
                "interval":"60","theme":"dark","style":"1","locale":"en",
                "hide_side_toolbar":false,"hide_volume":false,"enable_publishing":false,"allow_symbol_change":true,"withdateranges":true
            });
        }
    });
</script>
@endsection