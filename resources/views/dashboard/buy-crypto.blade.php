@extends('layouts.dashboard')

@section('page-title', 'Buy Crypto')
@section('breadcrumb', 'Purchase digital assets instantly')

@section('dashboard-content')
<div class="grid-2">
    <!-- Converter -->
    <div class="pa" style="padding:24px">
        <div class="sec-h"><div><h2>Quick Buy Converter</h2><p>Estimate your purchase before depositing</p></div></div>
        <label class="lbl">You spend (USD)</label>
        <div style="display:flex;gap:10px;margin-bottom:16px">
            <input class="inp num" id="spend" type="number" min="10" value="500" step="0.01">
            <span class="btn btn-ghost" style="pointer-events:none">USD</span>
        </div>
        <label class="lbl">You receive</label>
        <div style="display:flex;gap:10px;align-items:center">
            <input class="inp num" id="receive" type="text" readonly>
            <div style="position:relative">
                <select class="inp sel" id="coin" style="min-width:120px">
                    <option value="97.04" data-sym="BTC">BTC</option>
                    <option value="3111.42" data-sym="ETH">ETH</option>
                    <option value="152.34" data-sym="SOL">SOL</option>
                    <option value="0.3021" data-sym="XRP">XRP</option>
                    <option value="584.90" data-sym="BNB">BNB</option>
                    <option value="1.000" data-sym="USDT">USDT</option>
                </select>
            </div>
        </div>
        <div class="muted" style="font-size:.78rem;margin-top:8px">Rate updates every 30s · estimated only</div>
        <button class="btn btn-block mt" onclick="pvFlash('flash-ok','Please deposit funds first, then your purchase is executed instantly.')">Buy Now &gt;</button>
        <a href="{{ route('deposit') }}" class="btn btn-ghost btn-block" style="margin-top:10px">Fund your wallet first</a>
    </div>

    <!-- Live rates -->
    <div class="pa" style="padding:24px">
        <div class="sec-h">
            <div><h2>Live Crypto Rates</h2><p>Top assets on PrimeVest</p></div>
            <span class="pill pill-g">● Live</span>
        </div>
        <div style="overflow-x:auto">
        <table class="tbl">
            <thead><tr><th>Asset</th><th>Price</th><th>24h</th><th></th></tr></thead>
            <tbody>
                @php
                    $live = [
                        ['btc.png','Bitcoin','BTC',97241.80,2.41],
                        ['eth.png','Ethereum','ETH',3111.42,-0.86],
                        ['bch.png','Bitcoin Cash','BCH',381.20,1.08],
                        ['doge.png','Dogecoin','DOGE',0.1524,5.72],
                    ];
                @endphp
                @foreach($live as $c)
                <tr>
                    <td><div style="display:flex;align-items:center;gap:10px"><img src="{{ asset('/images/'.$c[0]) }}" width="26" height="26" alt="{{ $c[1] }}" style="border-radius:50%"><b>{{ $c[1] }}</b></div></td>
                    <td class="num" style="font-weight:700">${{ $c[3] < 1 ? number_format($c[3],4) : number_format($c[3],2) }}</td>
                    <td><span class="pill {{ $c[4] >= 0 ? 'pill-g' : 'pill-r' }} num">{{ $c[4] >= 0 ? '+' : '' }}{{ $c[4] }}%</span></td>
                    <td><button class="btn btn-sm btn-ghost" onclick="buyCoin('{{ $c[2] }}')">Buy</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<div class="pa pv-shade mt" style="padding:22px">
    <div style="display:flex;flex-wrap:wrap;gap:24px;align-items:center">
        <div style="flex:1;min-width:220px">
            <div style="font-weight:800;font-size:1.1rem">Why buy on PrimeVest?</div>
            <div class="muted" style="font-size:.84rem">Transparent spread, institutionally-vetted assets, and a clean audit trail on every order.</div>
        </div>
        <div class="num" style="display:flex;gap:26px">
            <div><div class="muted" style="font-size:.72rem">Spread</div><div style="font-weight:800" class="ok">0.10%</div></div>
            <div><div class="muted" style="font-size:.72rem">Settlement</div><div style="font-weight:800" class="ok">&lt;10 min</div></div>
            <div><div class="muted" style="font-size:.72rem">Assets</div><div style="font-weight:800">200+</div></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const opts=document.getElementById('coin');
    function conv(){
        const amt=parseFloat(document.getElementById('spend').value)||0;
        const rate=parseFloat(opts.value)||1;
        document.getElementById('receive').value=(amt/rate).toLocaleString('en-US',{maximumFractionDigits:8});
    }
    document.getElementById('spend').addEventListener('input',conv);
    opts.addEventListener('change',conv);
    function buyCoin(sym){const o=Array.from(opts.options);const hit=o.find(o=>o.dataset.sym===sym);if(hit)opts.value=hit.value;conv();pvFlash('flash-ok',sym+' selected in converter');}
    conv();
</script>
@endsection