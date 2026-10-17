@extends('layouts.dashboard')

@section('page-title', 'Buy Crypto')
@section('breadcrumb')
    <a href="{{ route('dashboard') }}" style="color:inherit;text-decoration:none">← Back</a>
@endsection

@section('dashboard-content')
@php
    $platforms = [
        [
            'id' => 'robinhood', 'name' => 'Robinhood', 'domain' => 'robinhood.com',
            'url' => 'https://robinhood.com/crypto', 'color' => '#00c805', 'badge' => 'Popular',
            'tagline' => 'Commission-free crypto trading',
            'desc' => 'Robinhood lets you buy and sell popular cryptocurrencies with zero commission and no account minimums. Perfect for beginners who want a clean, simple app experience.',
            'fee' => '0% commission', 'coins' => 'BTC, ETH, DOGE & more', 'best' => 'First-time buyers',
        ],
        [
            'id' => 'coinbase', 'name' => 'Coinbase', 'domain' => 'coinbase.com',
            'url' => 'https://www.coinbase.com/buy', 'color' => '#0052ff', 'badge' => 'Trusted',
            'tagline' => 'The most trusted crypto exchange',
            'desc' => 'Coinbase is one of the largest and most regulated exchanges, offering a huge selection of assets, strong security, and an easy buy flow for newcomers and pros alike.',
            'fee' => 'Low spread', 'coins' => '200+ assets', 'best' => 'Security & choice',
        ],
        [
            'id' => 'binance', 'name' => 'Binance', 'domain' => 'binance.com',
            'url' => 'https://www.binance.com/en/buy-crypto', 'color' => '#f0b90b', 'badge' => null,
            'tagline' => 'World\'s largest crypto exchange',
            'desc' => 'Binance gives you access to hundreds of coins with some of the lowest fees in the market, plus advanced tools, staking and peer-to-peer trading options.',
            'fee' => 'From 0.1%', 'coins' => '350+ assets', 'best' => 'Low fees',
        ],
        [
            'id' => 'kraken', 'name' => 'Kraken', 'domain' => 'kraken.com',
            'url' => 'https://www.kraken.com/', 'color' => '#5741d9', 'badge' => null,
            'tagline' => 'Secure exchange built for traders',
            'desc' => 'Kraken is known for its robust security, transparent pricing and reliable uptime. A great choice if you want a serious exchange with strong customer support.',
            'fee' => 'From 0.16%', 'coins' => '200+ assets', 'best' => 'Active traders',
        ],
        [
            'id' => 'etoro', 'name' => 'eToro', 'domain' => 'etoro.com',
            'url' => 'https://www.etoro.com/crypto/', 'color' => '#4bbf56', 'badge' => null,
            'tagline' => 'Social investing platform',
            'desc' => 'eToro combines crypto with stocks and ETFs, and lets you copy the portfolios of top traders. Ideal if you want a single platform for multiple asset classes.',
            'fee' => '1% spread', 'coins' => '70+ assets', 'best' => 'Social & copy investing',
        ],
        [
            'id' => 'cryptocom', 'name' => 'Crypto.com', 'domain' => 'crypto.com',
            'url' => 'https://crypto.com/', 'color' => '#1199fa', 'badge' => null,
            'tagline' => 'A full crypto ecosystem',
            'desc' => 'Crypto.com offers buying, staking, a card and an app in one place. Competitive fees and cashback rewards make it appealing for everyday crypto users.',
            'fee' => 'Low fees', 'coins' => '350+ assets', 'best' => 'All-in-one app',
        ],
        [
            'id' => 'webull', 'name' => 'Webull', 'domain' => 'webull.com',
            'url' => 'https://www.webull.com/', 'color' => '#2f6bff', 'badge' => null,
            'tagline' => 'Advanced trading, no commission',
            'desc' => 'Webull provides powerful charting tools, real-time data and commission-free crypto and stock trading — a solid pick if you like detailed market analysis.',
            'fee' => '0% commission', 'coins' => 'Popular assets', 'best' => 'Charting & analysis',
        ],
        [
            'id' => 'paypal', 'name' => 'PayPal', 'domain' => 'paypal.com',
            'url' => 'https://www.paypal.com/', 'color' => '#003087', 'badge' => 'Easy',
            'tagline' => 'Buy crypto with your PayPal balance',
            'desc' => 'PayPal lets you buy, hold and sell a selection of cryptocurrencies directly inside your existing account — the simplest option if you already use PayPal.',
            'fee' => 'Spread applies', 'coins' => 'BTC, ETH, LTC, SOL', 'best' => 'Existing users',
        ],
    ];
@endphp

<style>
    .pv-tabs{display:flex;gap:8px;overflow-x:auto;padding-bottom:2px;margin-bottom:20px;border-bottom:1px solid var(--line);scrollbar-width:thin}
    .pv-tab{display:inline-flex;align-items:center;gap:8px;padding:10px 16px;border:1px solid transparent;border-bottom:none;border-radius:11px 11px 0 0;background:transparent;color:var(--muted);font-weight:700;font-size:.88rem;cursor:pointer;white-space:nowrap;font-family:inherit;transition:.18s;margin-bottom:-1px}
    .pv-tab:hover{color:var(--text);background:rgba(255,255,255,.04)}
    .pv-tab.on{color:var(--text);background:rgba(59,130,246,.12);border-color:var(--line);border-bottom:1px solid var(--panel2)}
    .pv-tab.on::after{content:'';position:absolute;left:14px;right:14px;bottom:-1px;height:2px;background:var(--acc);border-radius:2px}
    .pv-tab{position:relative}
    .pv-tab-dot{width:8px;height:8px;border-radius:50%;display:inline-block;flex-shrink:0}
    .pv-panel{display:none}
    .pv-panel.on{display:block;animation:pvfade .25s ease}
    @keyframes pvfade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}
    .pv-plat{border:1px solid var(--line);border-radius:16px;padding:22px;background:linear-gradient(180deg,var(--panel2),var(--panel))}
    .pv-plat-head{display:flex;align-items:center;gap:14px;margin-bottom:16px}
    .pv-plat-logo{position:relative;width:54px;height:54px;border-radius:14px;display:grid;place-items:center;font-weight:800;font-size:1.35rem;overflow:hidden;flex-shrink:0}
    .pv-plat-logo img{position:absolute;width:30px;height:30px;object-fit:contain}
    .pv-fact{padding:12px 13px;border:1px solid var(--line);border-radius:11px;background:rgba(255,255,255,.025)}
    @media(max-width:640px){.pv-facts{grid-template-columns:1fr 1fr !important}}
</style>

<div class="pa" style="padding:26px">
    <div class="sec-h">
        <div>
            <h2>Buy Crypto</h2>
            <p>Choose a trusted platform to purchase cryptocurrency, then fund your PrimevestMarket account</p>
        </div>
    </div>

    <div class="pv-tabs" role="tablist">
        @foreach($platforms as $i => $p)
        <button type="button" class="pv-tab {{ $i === 0 ? 'on' : '' }}" data-tab="{{ $p['id'] }}" onclick="pvTab('{{ $p['id'] }}')">
            <span class="pv-tab-dot" style="background:{{ $p['color'] }}"></span>{{ $p['name'] }}
        </button>
        @endforeach
    </div>

    @foreach($platforms as $i => $p)
    <div class="pv-panel {{ $i === 0 ? 'on' : '' }}" id="tab-{{ $p['id'] }}">
        <div class="pv-plat">
            <div class="pv-plat-head">
                <span class="pv-plat-logo" style="background:{{ $p['color'] }}1f;color:{{ $p['color'] }}">
                    <b>{{ strtoupper(substr($p['name'], 0, 1)) }}</b>
                    <img src="https://www.google.com/s2/favicons?domain={{ $p['domain'] }}&sz=64" alt="{{ $p['name'] }}" loading="lazy" onerror="this.style.display='none'">
                </span>
                <div style="min-width:0">
                    <div style="font-weight:800;font-size:1.15rem;display:flex;align-items:center;gap:8px;flex-wrap:wrap">
                        {{ $p['name'] }}
                        @if(!empty($p['badge']))<span class="pill pill-g">{{ $p['badge'] }}</span>@endif
                    </div>
                    <div class="muted" style="font-size:.85rem">{{ $p['tagline'] }}</div>
                </div>
            </div>

            <p class="muted" style="font-size:.9rem;line-height:1.7;margin:0 0 16px">{{ $p['desc'] }}</p>

            <div class="pv-facts" style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:18px">
                <div class="pv-fact"><div class="lbl">Fees</div><div style="font-weight:700;font-size:.9rem">{{ $p['fee'] }}</div></div>
                <div class="pv-fact"><div class="lbl">Coins</div><div style="font-weight:700;font-size:.9rem">{{ $p['coins'] }}</div></div>
                <div class="pv-fact"><div class="lbl">Best for</div><div style="font-weight:700;font-size:.9rem">{{ $p['best'] }}</div></div>
            </div>

            <a href="{{ $p['url'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-block">Buy crypto on {{ $p['name'] }} →</a>
        </div>
    </div>
    @endforeach

    <p class="muted" style="font-size:.78rem;line-height:1.7;margin:18px 4px 0">
        PrimevestMarket does not process these purchases directly. You buy crypto on your chosen platform,
        then deposit it into your PrimevestMarket wallet to start investing. Always confirm you are on the
        official website before entering any details.
    </p>
</div>
@endsection

@section('scripts')
<script>
    function pvTab(id){
        document.querySelectorAll('.pv-tab').forEach(function(b){ b.classList.toggle('on', b.dataset.tab === id); });
        document.querySelectorAll('.pv-panel').forEach(function(p){ p.classList.toggle('on', p.id === 'tab-' + id); });
    }
</script>
@endsection
