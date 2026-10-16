@extends('layouts.dashboard')

@section('page-title', 'Trading Desk')
@section('breadcrumb', 'Equities · Live admin feed')

@section('dashboard-content')
<style>
    .live-tag{display:inline-flex;align-items:center;gap:7px;font-size:.7rem;font-weight:700;color:#2eae82;letter-spacing:.08em;text-transform:uppercase}
    .live-dot{width:6px;height:6px;border-radius:50%;background:#2eae82}

    /* ---- top crypto live chart ---- */
    .cx-tabs{display:flex;flex-wrap:wrap;gap:8px}
    .cx-tab{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:12px;
        border:1px solid var(--line);background:rgba(10,24,52,.02);color:var(--text);
        font-size:.82rem;font-weight:700;cursor:pointer;transition:.2s}
    .cx-tab:hover{border-color:rgba(59,130,246,.5);background:rgba(59,130,246,.07)}
    .cx-tab .cx-d{display:grid;place-items:center;width:26px;height:26px;border-radius:8px;
        background:linear-gradient(135deg,var(--acc2),var(--acc));color:#0b1120;font-size:.68rem;font-weight:800;letter-spacing:-.02em}
    .cx-tab.on{border-color:rgba(59,130,246,.6);background:rgba(59,130,246,.13);
        box-shadow:0 0 0 3px rgba(59,130,246,.10)}
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
</style>

<!-- ===== LIVE CHART ===== -->
<div class="pa mt" style="padding:18px;position:relative">
    <div class="sec-h">
        <div>
            <h2>Live Chart</h2>
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
        <noscript><p class="cx-fallback">Enable JavaScript to load the live chart.</p></noscript>
    </div>
    <p class="cx-note">Market data provided by TradingView. Prices are indicative and may be delayed.</p>
</div>
@endsection

@section('scripts')
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
