@extends('layouts.app')

@section('title', 'Markets & Copy Trading · PrimeVest')

@push('styles')
<style>
    .mk-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:20px}
    .mk-tabs a{padding:9px 18px;border-radius:999px;border:1px solid var(--line);color:var(--muted);font-size:.87rem;font-weight:600;transition:.2s}
    .mk-tabs a:hover,.mk-tabs a.on{background:rgba(47,123,255,.12);color:var(--acc);border-color:rgba(47,123,255,.4)}
    /* live chart */
    @media(max-width:640px){
        .pv-panel.tv-chart-panel{height:clamp(340px,52vh,460px)!important}
    }
    .tv-live-badge{position:absolute;top:22px;left:22px;z-index:4;display:flex;align-items:center;gap:6px;
        padding:5px 11px;border-radius:999px;background:rgba(15,185,129,.14);
        border:1px solid rgba(16,185,129,.4);color:#2eae82;font-size:.68rem;font-weight:800;letter-spacing:.1em;
        pointer-events:none}
    .tv-live-badge span{width:6px;height:6px;border-radius:50%;background:#2eae82;animation:tvPulse 1.8s ease-in-out infinite}
    @keyframes tvPulse{0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(46,174,130,.6)}50%{opacity:.55;box-shadow:0 0 0 5px rgba(46,174,130,0)}}
    /* top crypto rows drive the live chart */
    /* live ticker tape + per-asset overview cards, both real TradingView data */
    .tv-tape{height:64px;overflow:hidden;border-radius:14px;border:1px solid var(--line);
        background:rgba(10,24,52,.02);margin-bottom:18px}
    .tv-assets{height:clamp(520px,58vh,760px);overflow:hidden;border-radius:14px;
        border:1px solid var(--line);background:rgba(10,24,52,.02)}
    @media(max-width:640px){
        .tv-tape{height:58px}
        .tv-assets{height:clamp(460px,52vh,620px)}
    }
    .tv-widget-loading{display:flex;align-items:center;justify-content:center;height:100%;
        color:var(--muted);font-size:.9rem}
    .tv-hint{display:inline-flex;align-items:center;gap:6px;margin-left:auto;font-size:.76rem;color:var(--muted)}
    .tv-panel-loading{display:flex;align-items:center;justify-content:center;height:100%;color:var(--muted);font-size:.9rem}
    [data-theme="light"] .tv-live-badge{background:rgba(15,185,129,.18)}
    /* market type tabs */
    .tv-market-tabs{display:flex;flex-wrap:wrap;gap:8px;margin:0 0 14px}
    .tv-market-tab{padding:9px 20px;border-radius:999px;border:1px solid var(--line);
        background:rgba(10,24,52,.02);color:var(--muted);font-size:.87rem;font-weight:600;
        cursor:pointer;transition:.2s;font-family:inherit}
    .tv-market-tab:hover{border-color:rgba(47,123,255,.45);color:var(--acc);background:rgba(47,123,255,.07)}
    .tv-market-tab.is-on{background:rgba(47,123,255,.13);color:var(--acc);border-color:rgba(47,123,255,.45)}
    .tv-market-tab:focus-visible{outline:2px solid var(--acc);outline-offset:2px}
    .tv-market-label{position:absolute;top:22px;right:22px;z-index:4;pointer-events:none;
        padding:5px 12px;border-radius:999px;background:rgba(10,24,52,.55);border:1px solid var(--line);
        color:#eef2f9;font-size:.72rem;font-weight:700;letter-spacing:.02em}
    [data-theme="light"] .tv-market-label{background:rgba(255,255,255,.85);color:var(--text)}
    .tv-attr{margin:10px 2px 0;color:var(--muted);font-size:.74rem}
</style>
@endpush

@section('content')
<!-- Markets hero -->
<section class="pv-hero" style="padding-bottom:50px">
    <div class="pv-container" style="position:relative;z-index:1">
        <div style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:26px">
            <div>
                <p class="pv-tag">Live Markets</p>
                <h1 class="pv-h2" style="font-size:clamp(1.8rem,3.4vw,2.6rem)">Spot &amp; futures crypto markets</h1>
                <p class="pv-lead">Professional charting, real-time order books and institutional-grade execution.</p>
            </div>
            <div style="display:flex;gap:12px">
                {{-- A signed-in user has no business on the register page, so the
                     CTA points at the real trade screen for them instead. --}}
                @guest
                    <a href="{{ route('register') }}" class="pv-btn">Trade Now</a>
                    <a href="{{ route('login') }}" class="pv-btn pv-btn-ghost">Log in</a>
                @else
                    <a href="{{ route('stock-trading') }}" class="pv-btn">Trade Now</a>
                    <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-ghost">Open Dashboard</a>
                @endguest
            </div>
        </div>
<!-- Market type switcher. Each tab loads a real TradingView feed. -->
<div class="tv-market-tabs" role="tablist" aria-label="Market type">
    <button type="button" class="tv-market-tab is-on" role="tab" aria-selected="true" data-mv="spot" data-tv="BITSTAMP:BTCUSD" data-mv-label="Spot &middot; Bitcoin">Spot</button>
    <button type="button" class="tv-market-tab" role="tab" aria-selected="false" data-mv="futures" data-tv="BINANCE:BTCUSDT.P" data-mv-label="Perpetual futures &middot; Bitcoin">Futures</button>
    <button type="button" class="tv-market-tab" role="tab" aria-selected="false" data-mv="margin" data-tv="BINANCE:BTCUSDT" data-mv-label="Margin &middot; Bitcoin">Margin</button>
    <button type="button" class="tv-market-tab" role="tab" aria-selected="false" data-mv="staking" data-tv="BITSTAMP:ETHUSD" data-mv-label="Staking &middot; Ethereum">Staking</button>
</div>
<div class="pv-panel tv-chart-panel" style="padding:12px;height:clamp(480px,64vh,760px);overflow:hidden;position:relative">
    <div class="tv-live-badge"><span></span> LIVE</div>
    <div class="tv-market-label" id="tvMarketLabel">Spot &middot; Bitcoin</div>
    <div id="pvAdvChart" style="height:100%"></div>
</div>
    </div>
</section>

<!-- Market table -->
<section class="pv-section" style="padding-top:26px" id="spot">
    <div class="pv-container">
        <div style="display:flex;align-items:center;gap:26px;flex-wrap:wrap;margin-bottom:22px">
            <h2 class="pv-h2" style="font-size:1.6rem">Top crypto assets</h2>
            <span class="tv-hint">Live prices &amp; charts streamed by TradingView</span>
        </div>

        <!-- Live ticker tape. Every price here is real; nothing is hardcoded. -->
        <div class="tv-tape" id="tvTape">
            <div class="tv-widget-loading">Loading live prices&hellip;</div>
        </div>

        <!-- Per-asset cards: live price, 24h change and an area spark chart. -->
        <div class="tv-assets" id="tvAssets">
            <div class="tv-widget-loading">Loading live asset data&hellip;</div>
        </div>

        <p class="tv-attr">Market data provided by TradingView. Prices are indicative and may be delayed.</p>
    </div>
</section>
@endsection


@push('scripts')
<script>
/* Real TradingView Advanced Chart embed (the widget behind
   tradingview.com/chart/?symbol=BITSTAMP%3ABTCUSD). */
(function(){
    var SRC='https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js';
    var host=document.getElementById('pvAdvChart');
    if(!host)return;

    var isLight=function(){
        return (document.documentElement.getAttribute('data-theme')||'').trim()==='light';
    };
    var symbol='BITSTAMP:BTCUSD';

    /* The embed is an iframe script with no live theme setter, so the only way
       to follow the site theme is to rebuild it from an empty container. */
    function mount(){
        var light=isLight();
        host.innerHTML='';
        host.dataset.guarded='';
        var wrap=document.createElement('div');
        wrap.className='tradingview-widget-container';
        wrap.style.height='100%';
        wrap.style.width='100%';
        var w=document.createElement('div');
        w.className='tradingview-widget-container__widget';
        w.style.height='100%';
        wrap.appendChild(w);
        var s=document.createElement('script');
        s.type='text/javascript';
        s.async=true;
        s.src=SRC;
        s.text=JSON.stringify({
            autosize:true,
            symbol:symbol,
            interval:'60',
            timezone:'Etc/UTC',
            colorTheme:light?'light':'dark',
            style:'1',
            locale:'en',
            backgroundColor:'rgba(0,0,0,0)',
            gridColor:light?'rgba(10,24,52,.10)':'rgba(255,255,255,.06)',
            hide_top_toolbar:false,
            hide_legend:false,
            allow_symbol_change:true,
            withdateranges:true,
            save_image:false,
            calendar:false,
            studies:['Volume@tv-basicstudies','MACD@tv-basicstudies'],
            support_host:'https://www.tradingview.com'
        });
        wrap.appendChild(s);
        host.appendChild(wrap);
        guard(host,0);
    }

    mount();

    /* Market type tabs each load a real feed. */
    var tabs=document.querySelectorAll('.tv-market-tab');
    var label=document.getElementById('tvMarketLabel');
    Array.prototype.forEach.call(tabs,function(t){
        t.addEventListener('click',function(){
            var s=t.getAttribute('data-tv');
            if(!s||s===symbol)return;
            symbol=s;
            Array.prototype.forEach.call(tabs,function(x){
                var on=(x===t);
                x.classList.toggle('is-on',on);
                x.setAttribute('aria-selected',on?'true':'false');
            });
            if(label)label.innerHTML=t.getAttribute('data-mv-label')||'';
            host.innerHTML='<div class="tv-panel-loading">Loading live '+s+' chart&hellip;</div>';
            mount();
        });
    });

    /* Top crypto assets: real TradingView data, no hardcoded prices.
       ASSETS is symbol metadata only (id + display name) so the widget owns
       every number it renders. */
    var ASSETS=[
        {s:'BITSTAMP:BTCUSD',d:'Bitcoin'},
        {s:'BITSTAMP:ETHUSD',d:'Ethereum'},
        {s:'BITSTAMP:SOLUSD',d:'Solana'},
        {s:'BINANCE:BNBUSDT',d:'BNB'},
        {s:'BITSTAMP:XRPUSD',d:'XRP'},
        {s:'BITSTAMP:ADAUSD',d:'Cardano'},
        {s:'BITSTAMP:DOGEUSD',d:'Dogecoin'},
        {s:'BITSTAMP:BCHUSD',d:'Bitcoin Cash'}
    ];

    /* Builds one TradingView embed into a host element.
       `heightPx` must be a NUMBER: the symbol-overview widget ignores
       percentage heights and autosize, so passing '100%' left it rendering at
       zero height inside an empty bordered box. */
    function embed(hostId,src,cfg,heightPx){
        var el=document.getElementById(hostId);
        if(!el)return;
        var h=heightPx||Math.max(240,Math.round(el.getBoundingClientRect().height));
        el.innerHTML='';
        /* reset so a later remount can be guarded again */
        el.dataset.guarded='';
        var wrap=document.createElement('div');
        wrap.className='tradingview-widget-container';
        wrap.style.width='100%';
        wrap.style.height=h+'px';
        var w=document.createElement('div');
        w.className='tradingview-widget-container__widget';
        w.style.width='100%';
        w.style.height=h+'px';
        wrap.appendChild(w);
        var s=document.createElement('script');
        s.type='text/javascript';
        s.async=true;
        s.src=src;
        s.text=JSON.stringify(cfg);
        wrap.appendChild(s);
        el.appendChild(wrap);
        guard(el,h);
    }

    /* If the third-party script is blocked or slow, replace the empty frame with
       a message rather than leaving a blank bordered box on the page. */
    function guard(el,h){
        setTimeout(function(){
            if(el.querySelector('iframe'))return;
            if(el.dataset.guarded==='1')return;
            el.dataset.guarded='1';
            el.innerHTML='<div class="tv-widget-loading" style="height:'+h+'px;flex-direction:column;gap:10px;padding:20px;text-align:center">'
                +'<div>Live market data is temporarily unavailable.</div>'
                +'<div style="font-size:.8rem;opacity:.75">This feed loads from TradingView and may be blocked by your network or ad blocker.</div>'
                +'</div>';
        },6000);
    }

    function mountAssets(){
        var light=isLight();
        var theme=light?'light':'dark';

        embed('tvTape','https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js',{
            symbols:ASSETS,
            showSymbolLogo:true,
            displayMode:'adaptive',
            locale:'en',
            colorTheme:theme,
            isTransparent:true,
            width:'100%',
            support_host:'https://www.tradingview.com'
        },64);

        var assetsEl=document.getElementById('tvAssets');
        var assetsH=Math.max(360,Math.round((assetsEl?assetsEl.getBoundingClientRect().height:0)));
        embed('tvAssets','https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js',{
            symbols:ASSETS,
            showChart:true,
            chartType:'area',
            width:'100%',
            /* number, not a percentage: this widget has no autosize */
            height:assetsH,
            locale:'en',
            colorTheme:theme,
            isTransparent:true,
            showVolume:true,
            showPriceChange:true,
            support_host:'https://www.tradingview.com'
        },assetsH);
    }

    mountAssets();

    /* The symbol-overview widget bakes in a pixel height, so it has to be
       rebuilt when the container is resized (the height is a clamp()). */
    var rt;
    window.addEventListener('resize',function(){
        clearTimeout(rt);
        rt=setTimeout(function(){ if(host) mount(); mountAssets(); },220);
    });

    var lastLight=isLight();
    try{
        new MutationObserver(function(){
            if(isLight()!==lastLight){lastLight=isLight();mount();mountAssets();}
        }).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']});
    }catch(e){}
})();
</script>
@endpush
