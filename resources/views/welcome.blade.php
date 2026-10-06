@extends('layouts.landing')

@section('title', 'PrimeVest | Trade crypto, stocks &amp; indices')
@section('meta_description', 'PrimeVest is a crypto-first investment platform. Buy 250+ coins 24/7, trade commission-free US and UK stocks, and track the S&P 500, Nasdaq-100 and FTSE 100 from a single account.')

@php
    $wfImg   = fn ($file) => asset('images/wf/' . $file);

    /* ---------------------------------------------------------------
       Markets carousel â€” each card expands to show trading detail.
       --------------------------------------------------------------- */
    $stages = [
        [
            'id'     => 'crypto',
            'pill'   => 'BTC/USD &middot; 24/7 market',
            'title'  => 'Crypto',
            'strong' => 'Trade 250+ coins around the clock,',
            'rest'   => ' with no market close.',
            'copy'   => 'Buy, sell and hold Bitcoin, Ethereum and 250+ altcoins from one wallet. Spot, futures and margin desks stay open every minute of every day â€” no weekend gaps, no settlement delay. Funds sit in multi-sig cold storage with published proof-of-reserves, and on-chain deposits credit in seconds.',
            'chart'  => ['symbol' => 'BTC/USD', 'name' => 'Bitcoin', 'price' => '$68,412.90', 'change' => '+4.82%', 'up' => true, 'accent' => '#22d3a5', 'style' => 'candles', 'seed' => 91],
        ],
        [
            'id'     => 'stocks',
            'pill'   => 'AAPL &middot; NVDA &middot; TSLA',
            'title'  => 'Stocks',
            'strong' => 'Fractional shares from $1,',
            'rest'   => ' commission-free.',
            'copy'   => 'Trade listed US and UK equities with $0 commissions, extended-hours access and level-2 depth. Build a position from a single share, queue limit, stop and trailing orders, then reinvest dividends automatically the moment they settle.',
            'chart'  => ['symbol' => 'NVDA', 'name' => 'NVIDIA Corp', 'price' => '$236.41', 'change' => '+1.24%', 'up' => true, 'accent' => '#4f8cff', 'style' => 'area', 'seed' => 17],
        ],
        [
            'id'     => 'indices',
            'pill'   => 'S&amp;P 500 &middot; Nasdaq-100 &middot; FTSE',
            'title'  => 'Indices',
            'strong' => 'Own the whole market',
            'rest'   => ' in a single ticket.',
            'copy'   => 'Track the S&P 500, Nasdaq-100, Dow Jones and FTSE 100 through one position. Index exposure spreads your risk across hundreds of constituents at once, so a single weak earnings print never gets to decide your week.',
            'chart'  => ['symbol' => 'SPX', 'name' => 'S&P 500', 'price' => '5,842.17', 'change' => '+0.63%', 'up' => true, 'accent' => '#a98bff', 'style' => 'area', 'seed' => 43],
        ],
        [
            'id'     => 'forex',
            'pill'   => 'EUR/USD &middot; GBP/JPY &middot; 70+ pairs',
            'title'  => 'Forex',
            'strong' => '70+ currency pairs',
            'rest'   => ' on institutional liquidity.',
            'copy'   => 'Majors, minors and exotics priced off aggregated bank liquidity with tight variable spreads. Leverage up to 1:500, negative-balance protection as standard, and economic-calendar alerts pushed to your phone before the candle even forms.',
            'chart'  => ['symbol' => 'EUR/USD', 'name' => 'Euro / US Dollar', 'price' => '1.0874', 'change' => '-0.21%', 'up' => false, 'accent' => '#f6465d', 'style' => 'area', 'seed' => 58],
        ],
        [
            'id'     => 'commodities',
            'pill'   => 'XAU/USD &middot; Brent &middot; Nat gas',
            'title'  => 'Commodities',
            'strong' => 'Trade gold, oil and gas',
            'rest'   => ' as a real hedge.',
            'copy'   => 'Go long or short on precious metals, crude oil, natural gas and agricultural futures. Commodities have historically moved against equities, which makes them a practical hedge when risk appetite turns and your equity book is having a bad week.',
            'chart'  => ['symbol' => 'XAU/USD', 'name' => 'Gold Spot', 'price' => '$2,684.50', 'change' => '+0.94%', 'up' => true, 'accent' => '#f0b90b', 'style' => 'area', 'seed' => 73],
        ],
    ];

    $faqs = [
        [
            'q' => 'What can I actually trade on PrimeVest?',
            'a' => 'Everything runs from one funded account. 250+ crypto assets including Bitcoin, Ethereum and Solana; listed US and UK equities with $0 commission; 30+ indices such as the S&P 500, Nasdaq-100 and FTSE 100; 70+ forex pairs; and commodities covering gold, silver, crude oil and natural gas. You can hold all of them side by side and rebalance between them without leaving the dashboard.',
        ],
        [
            'q' => 'Does the crypto desk really stay open 24/7?',
            'a' => 'Yes. Crypto markets do not close, so neither does ours â€” spot, futures and margin trading run every minute of every day, weekends and holidays included. That also means prices can move while you sleep. Set price alerts, use stop and take-profit orders, and enable two-factor authentication before you fund the account.',
        ],
        [
            'q' => 'How are my coins and shares kept safe?',
            'a' => 'Client crypto is held in multi-signature cold storage, segregated from company funds, with balances published as proof-of-reserves you can verify from your dashboard. Equities and cash sit with regulated custodians under SIPC-style protection. Withdrawals require a confirmed second factor, and large withdrawals sit behind a short manual review window.',
        ],
        [
            'q' => 'What does it cost to trade here?',
            'a' => 'US and UK stock trades are $0 commission. Crypto spot carries a flat 0.20% taker fee that steps down to 0.06% as your 30-day volume grows. Forex and indices are charged as a spread only â€” no overnight platform fee, no inactivity fee, no custody fee on balances under $50,000. The full schedule lives on our pricing page.',
        ],
        [
            'q' => 'How fast are deposits and withdrawals?',
            'a' => 'Card and bank deposits land instantly for first-time funding and within one business day after that. Crypto withdrawals are broadcast to the network the moment they clear review, typically inside a minute. There is no withdrawal cap on verified accounts beyond the daily review threshold shown in your settings.',
        ],
    ];
@endphp

@section('content')

{{-- ======================================================================
     HERO  Â·  data-testid="reusable-hero-module"
     ====================================================================== --}}
<section class="wf-hero" data-testid="reusable-hero-module">
    <video class="wf-hero-bg" poster="{{ asset('videos/hero-trading-poster.jpg') }}"
           autoplay muted loop playsinline preload="auto"
           aria-hidden="true" tabindex="-1" data-testid="hero-background-video">
        <source src="{{ asset('videos/hero-trading.mp4') }}" type="video/mp4">
    </video>
    <div class="wf-hero-scrim" aria-hidden="true"></div>

    <div class="wf-circles-wrap" >
        <img class="wf-circles" src="{{ $wfImg('gradient-circles.svg') }}" width="2024" height="850" alt="" loading="eager">
    </div>

    <div class="wf-hero-inner">
        <div class="wf-hero-grid">

            {{-- ---------- copy column ---------- --}}
            <div class="wf-hero-copy">
                <div class="wf-hero-eyebrow">
                    <h1 class="text-5xl">
                        <span class="wf-eyebrow-line">
                            <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M7.689 14.804a.5.5 0 00.282.281l1.487.587a.5.5 0 010 .93l-1.487.587a.5.5 0 00-.282.282l-.587 1.487a.5.5 0 01-.93 0l-.587-1.487a.5.5 0 00-.281-.282l-1.487-.587a.5.5 0 010-.93l1.487-.587a.5.5 0 00.281-.281l.587-1.487a.5.5 0 01.93 0l.587 1.487zm.648-8.798a.279.279 0 00.157.157l.83.328a.279.279 0 010 .518l-.83.328a.279.279 0 00-.157.157l-.328.83a.279.279 0 01-.518 0l-.328-.83a.279.279 0 00-.157-.157l-.83-.328a.279.279 0 010-.518l.83-.328a.279.279 0 00.157-.157l.328-.83a.279.279 0 01.518 0l.328.83zM13.892 5.402a.625.625 0 011.168 0l.666 1.75a5.328 5.328 0 003.074 3.074l1.75.666a.625.625 0 010 1.168l-1.75.666a5.328 5.328 0 00-3.073 3.074l-.667 1.75a.625.625 0 01-1.168 0l-.666-1.75a5.328 5.328 0 00-3.074-3.073l-1.75-.667a.625.625 0 010-1.168l1.75-.666a5.327 5.327 0 003.074-3.074l.666-1.75zm.972 3.385c-.168-.276-.608-.276-.775 0a6.822 6.822 0 01-2.302 2.302c-.277.167-.277.607 0 .774a6.823 6.823 0 012.302 2.302c.167.277.607.277.774 0a6.825 6.825 0 012.302-2.301c.277-.168.277-.608 0-.775a6.824 6.824 0 01-2.301-2.302z"/></svg>
                            24/7 markets &middot; 250+ assets
                        </span>
                        <span class="text-5xl" data-testid="h1-apy-hero">Crypto.<br>Stocks.<br>Indices.</span>
                    </h1>
                </div>

                <h2 class="wf-h2-serif" data-testid="hero-apy-description">All from one account.</h2>

                <div class="wf-hero-features" data-testid="cash-hero-features">
                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M10.233 12.707a1 1 0 000-1.414L8.465 9.525a.75.75 0 011.06-1.06l1.768 1.767a1 1 0 001.414 0l1.768-1.768a.75.75 0 011.06 1.06l-1.767 1.769a1 1 0 000 1.414l1.768 1.768a1 1 0 01-1.06 1.06l-1.769-1.768a1 1 0 00-1.414 0l-1.768 1.768a.749.749 0 11-1.06-1.06l1.768-1.768zM12 21a9 9 0 110-18 9 9 0 010 18zm0-1.5a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/></svg>
                        </span>
                        <span class="wf-feature-txt">$0 commission on US &amp; UK stocks</span>
                    </div>

                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <img src="{{ $wfImg('union-pebble.svg') }}" height="21" width="21" alt="" loading="eager">
                        </span>
                        <span class="wf-feature-txt">
                            24/7 instant crypto withdrawals
                            <button class="wf-info-btn" type="button" aria-label="open instant withdrawal information dialog" data-modal="wf-modal-wd">
                                <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M10.748 10.798h.017c.422 0 .765.343.765.765v2.381a1 1 0 01-1 1h-.285a.745.745 0 000 1.49h4.01a.745.745 0 100-1.49H14a1 1 0 01-1-1v-3.642a1 1 0 00-1-1h-1.252a.748.748 0 000 1.496zm.223-2.927a.965.965 0 00.547.507c.132.05.277.073.435.073.325 0 .583-.09.772-.27a.935.935 0 00.29-.705.913.913 0 00-.29-.699c-.19-.185-.447-.277-.772-.277a1.255 1.255 0 00-.435.073 1.029 1.029 0 00-.33.198.934.934 0 00-.29.705c0 .14.024.272.073.395zM21 12a9 9 0 11-18 0 9 9 0 0118 0zm-1.5 0a7.5 7.5 0 10-15 0 7.5 7.5 0 0015 0z"/></svg>
                            </button>
                        </span>
                    </div>

                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" role="presentation" aria-hidden="true"><path d="M12 3l7.5 3v5.2c0 4.5-3.1 8.5-7.5 9.6-4.4-1.1-7.5-5.1-7.5-9.6V6L12 3z"/><path d="M9.3 12.1l1.9 1.9 3.6-3.7"/></svg>
                        </span>
                        <span class="wf-feature-txt">Multi-sig cold storage &amp; published proof-of-reserves</span>
                    </div>
                </div>

                <div class="wf-hero-ctas">
                    <a class="wf-btn wf-btn-primary" href="{{ route('register') }}" data-testid="hero-get-started">Start trading</a>
                    <a class="wf-btn wf-btn-ghost-dark" href="{{ route('trading') }}" data-testid="hero-learn-more">Explore markets</a>
                </div>

                <!-- <p class="wf-disclosure" data-testid="hero-rate-disclosure">
                    Crypto assets are volatile and unregulated in some jurisdictions. Capital is at risk and returns are not guaranteed.
                    Trading in stocks, indices, forex and commodities involves leverage and can result in losses exceeding your deposit.
                    See additional terms in the footer.
                </p> -->
            </div>

            {{-- ---------- live market panel ---------- --}}
            <div class="wf-hero-visual" data-testid="hero-phone-composition" >
                <div class="wf-hero-card">
                    <div class="wf-mkt-card">
                        <!-- <div class="wf-mkt-head">
                            <span class="wf-mkt-pair">
                                <span class="wf-mkt-dot" aria-hidden="true"></span>
                                BTC/USD
                            </span>
                            <span class="wf-mkt-tag">Bitcoin</span>
                        </div> -->
                        <!-- <div class="wf-mkt-price">$68,412.90</div> -->
                        <!-- <div class="wf-mkt-chg is-up">+4.82% <span>24h</span></div> -->
                        <!-- <div class="wf-mkt-chart" aria-hidden="true">
                            @include('partials.chart', ['seed' => 91, 'style' => 'candles', 'symbol' => null, 'price' => null, 'change' => null, 'up' => true, 'accent' => '#22d3a5', 'tone' => '#0d1330', 'wide' => true])
                        </div> -->
                        <!-- <div class="wf-mkt-foot">
                            <span>24h vol <b>$41.2B</b></span>
                            <span>High <b>$69,088</b></span>
                        </div> -->
                    </div>

                    <!-- <div class="wf-mkt-chip">
                        <span class="wf-mkt-chip-sym">ETH</span>
                        <span class="wf-mkt-chip-val">$3,417.06</span>
                        <span class="wf-mkt-chip-chg is-up">+2.14%</span>
                    </div> -->
                </div>
                <div class="wf-hero-phone">
                    <picture>
                        <source type="image/webp"
                            srcset="{{ $wfImg('hero-phone-640w.webp') }} 640w,
                                    {{ $wfImg('hero-phone-750w.webp') }} 750w,
                                    {{ $wfImg('hero-phone-828w.webp') }} 828w,
                                    {{ $wfImg('hero-phone-1080w.webp') }} 1080w,
                                    {{ $wfImg('hero-phone-1200w.webp') }} 1200w"
                            sizes="(min-width: 1536px) 700px, (min-width: 1280px) 620px, 45vw">
                        <img width="1434" height="1666" alt="" loading="eager" src="{{ $wfImg('hero-phone.png') }}">
                    </picture>
                </div>
            </div>
        </div>

        {{-- ---------- accolades bar ---------- --}}
        <!-- <div class="wf-accolades-bar" data-testid="accolades-bar" > -->
            <!-- <div class="wf-accolades"> -->

                <!-- <div class="wf-accolades-item">
                    <img src="{{ $wfImg('bankrate-dark.svg') }}" alt="Bankrate" loading="lazy">
                    <span>Best Cash Management Account, 2023-25<sup>1</sup></span>
                </div>

                <div class="wf-accolades-item is-sm-hide">
                    <b>1.5M+</b>
                    <span>Funded clients<sup>2</sup></span>
                </div>

                <div class="wf-accolades-item is-sm-hide">
                    <b>$100B+</b>
                    <span>In total assets<sup>2</sup></span>
                </div> -->

                <!-- <div class="wf-accolades-item">
                    <span class="wf-stars" aria-hidden="true">
                        <svg viewBox="0 0 21 21" fill="currentColor"><path d="M21 5.3l-7.6-1.1L10.4 0 7.4 4.2 0 5.3l5.4 5.2L4.1 18.1 10.4 14l6.3 4.1-1.4-7.6L21 5.3z"/></svg>
                    </span>
                    <b>4.8</b>
                    <span>Apple App Store<sup>3</sup></span>
                </div>

                <div class="wf-accolades-item">
                    <span class="wf-stars" aria-hidden="true">
                        <svg viewBox="0 0 21 21" fill="currentColor"><path d="M21 5.3l-7.6-1.1L10.4 0 7.4 4.2 0 5.3l5.4 5.2L4.1 18.1 10.4 14l6.3 4.1-1.4-7.6L21 5.3z"/></svg>
                    </span>
                    <b>4.9</b>
                    <span>Google Play Store<sup>3</sup></span>
                </div> -->
            <!-- </div> -->
        <!-- </div> -->
    </div>
</section>

{{-- ======================================================================
     LIVE MARKET TICKER
     ====================================================================== --}}
@php
    $quotes = [
        ['s' => 'BTC',    'n' => 'Bitcoin',      'p' => '$68,412.90', 'c' => '+4.82%', 'up' => true],
        ['s' => 'ETH',    'n' => 'Ethereum',     'p' => '$3,417.06',  'c' => '+2.14%', 'up' => true],
        ['s' => 'SOL',    'n' => 'Solana',       'p' => '$186.24',    'c' => '+6.71%', 'up' => true],
        ['s' => 'BNB',    'n' => 'BNB',          'p' => '$604.18',    'c' => '-0.84%', 'up' => false],
        ['s' => 'XRP',    'n' => 'XRP',          'p' => '$0.6142',    'c' => '+1.09%', 'up' => true],
        ['s' => 'SPX',    'n' => 'S&P 500',      'p' => '5,842.17',   'c' => '+0.63%', 'up' => true],
        ['s' => 'NDX',    'n' => 'Nasdaq 100',   'p' => '20,411.62',  'c' => '+0.91%', 'up' => true],
        ['s' => 'AAPL',   'n' => 'Apple',        'p' => '$236.41',    'c' => '+1.24%', 'up' => true],
        ['s' => 'NVDA',   'n' => 'NVIDIA',       'p' => '$186.52',    'c' => '+3.08%', 'up' => true],
        ['s' => 'EURUSD', 'n' => 'Euro / Dollar','p' => '1.0874',     'c' => '-0.21%', 'up' => false],
        ['s' => 'XAU',    'n' => 'Gold Spot',    'p' => '$2,684.50',  'c' => '+0.94%', 'up' => true],
        ['s' => 'UKOIL',  'n' => 'Brent Crude',  'p' => '$78.32',     'c' => '-1.12%', 'up' => false],
    ];
@endphp
<!-- <div class="wf-ticker" data-testid="market-ticker" aria-label="Live market prices">
    <div class="wf-ticker-track">
        @foreach (array_merge($quotes, $quotes) as $q)
            <span class="wf-tick {{ $q['up'] ? 'is-up' : 'is-down' }}">
                <b>{{ $q['s'] }}</b>
                <span class="wf-tick-n">{{ $q['n'] }}</span>
                <span class="wf-tick-p" style="font-variant-numeric:tabular-nums">{{ $q['p'] }}</span>
                <span class="wf-tick-c">{{ $q['c'] }}</span>
            </span>
        @endforeach
    </div>
</div> -->

{{-- ======================================================================
     INVESTING INTRO  Â·  data-testid="aia-messaging-investing-intro-module"
     ====================================================================== --}}
<section class="wf-band" style="padding-block:var(--wf-xlarge) var(--wf-xxxlarge)" data-testid="aia-messaging-investing-intro-module">
    <div class="wf-marketing-section" data-marketing>
        <div class="wf-sec-head " >
            <h2 class="wf-h2">
                One account,<br>
                <span class="wf-h2-serif">every market that matters.</span>
            </h2>
            <p class="wf-lede">
                Crypto, equities, indices, forex and commodities â€” priced live, settled instantly. Buy Bitcoin at 3am, trim your S&amp;P 500 position before the bell, or mirror a professional trader while you sleep. It all sits in a single balance you can move in seconds.
            </p>
        </div>

        <div class="wf-badge-row " >
            {{-- Bankrate --}}
            <div class="wf-badge" data-testid="aia-messaging-intro-bankrate-badge">
                <span class="wf-badge-laurel"><img src="{{ $wfImg('bankrate-laurel.svg') }}" alt="" loading="lazy"></span>
                <span class="wf-badge-logo">
                    <img src="{{ $wfImg('bankrate-dark.svg') }}" alt="Bankrate" loading="lazy">
                </span>
                <span class="wf-badge-kicker">recommends</span>
                <span class="wf-badge-title">Best Crypto Exchanges</span>
                <span class="wf-badge-year">2026<sup>4</sup></span>
            </div>

            {{-- NerdWallet --}}
            <div class="wf-badge" data-testid="aia-messaging-intro-nerdwallet-badge">
                <span class="wf-badge-laurel"><img src="{{ $wfImg('five-star-laurel.svg') }}" alt="" loading="lazy"></span>
                <span class="wf-badge-logo">
                    <img src="{{ $wfImg('nerdwallet-light.svg') }}" alt="NerdWallet" loading="lazy">
                </span>
                <span class="wf-badge-kicker">Best for,</span>
                <span class="wf-badge-title">Active Traders</span>
                <span class="wf-badge-year">2022-26<sup>5</sup></span>
            </div>
        </div>
    </div>
</section>

<hr class="wf-hr" data-marketing style="margin:0">

{{-- ======================================================================
     ACCOUNT CARDS  Â·  data-testid="aia-messaging-investing-accounts-module"
     ====================================================================== --}}
<section class="wf-band" style="padding-top:var(--wf-xxxlarge)" data-testid="aia-messaging-investing-accounts-module">
    <div class="wf-marketing-section">
        <div class="wf-acct-grid">

            {{-- ---------- card A Â· Automated Investing Account ---------- --}}
            <article class="wf-acct-card "  data-testid="automated-investing-account-card">
                <div class="wf-acct-head">
                    <h2 class="wf-h2">Built and managed for you</h2>
                    <p>Designed for investors who want a diversified crypto portfolio, rebalanced automatically, without watching charts all day.</p>
                </div>

                <div class="wf-acct-visual is-aia">
                    <div class="wf-acct-chart" aria-hidden="true">
                        @include('partials.chart', ['seed' => 27, 'style' => 'area', 'symbol' => null, 'price' => null, 'change' => null, 'up' => true, 'accent' => '#22d3a5', 'tone' => '#0d1330', 'wide' => false])
                    </div>
                    <div class="wf-returns" data-testid="investing-accounts-aia-annual-returns">
                        <b>+96.4%</b>
                        <span>12-month portfolio return</span>
                    </div>
                    <picture class="wf-acct-phone">
                        <source type="image/webp"
                            srcset="{{ $wfImg('screen-aia-640w.webp') }} 640w,
                                    {{ $wfImg('screen-aia-750w.webp') }} 750w,
                                    {{ $wfImg('screen-aia-828w.webp') }} 828w,
                                    {{ $wfImg('screen-aia-1080w.webp') }} 1080w"
                            sizes="400px">
                        <img src="{{ $wfImg('screen-aia.png') }}" width="1134" height="1400" alt="automated investing account mobile dashboard" loading="lazy">
                    </picture>
                </div>

                <div class="wf-acct-body">
                    <div>
                        <h3 class="wf-acct-name">Managed Crypto Portfolio</h3>
                        <h4 class="wf-acct-tag">Automated allocation across BTC, ETH and 250+ assets</h4>
                    </div>

                    <ul class="wf-checklist">
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Rebalanced automatically as the market moves</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Risk-scored from conservative to aggressive</span>
                        </li>
                    </ul>

                    <div class="wf-acct-ctas">
                        <a class="wf-btn wf-btn-primary" href="{{ route('register') }}">Get started</a>
                        <a class="wf-btn wf-btn-ghost-light" href="{{ route('trading') }}">Learn more</a>
                    </div>

                    <p class="wf-acct-note" data-testid="investing-accounts-aia-disclosure">
                        The chart shown is illustrative of portfolio behaviour and does not represent the return of any individual client account. Figures are shown before fees and are not a projection of future performance. Crypto assets are volatile and can lose value in full.
                        <button type="button" data-modal="wf-modal-disc">See full disclosures here</button>
                    </p>

                    <div class="wf-acct-foot">
                        <hr class="wf-hr">
                        <div class="wf-explore">Explore managed products:</div>
                        <div class="wf-explore-list">
                            <a href="{{ route('trading') }}">Crypto Trading Desk <small>(Spot, futures, margin)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('copy-trading') }}">Copy Trading <small>(Mirror pro traders)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('register') }}">Staking Plans <small>(Stablecoin yield, paid daily)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- ---------- card B Â· Stock Investing Account ---------- --}}
            <article class="wf-acct-card "  data-testid="stock-investing-account-card">
                <div class="wf-acct-head">
                    <h2 class="wf-h2">Trade it yourself</h2>
                    <p>Designed for self-directed traders who want direct control over every crypto, stock and index position they open.</p>
                </div>

                <div class="wf-acct-visual is-sia">
                    <div class="wf-acct-chart" aria-hidden="true">
                        @include('partials.chart', ['seed' => 64, 'style' => 'candles', 'symbol' => null, 'price' => null, 'change' => null, 'up' => false, 'accent' => '#4f8cff', 'tone' => '#111b31', 'wide' => false])
                    </div>
                    <picture class="wf-acct-phone">
                        <source type="image/webp"
                            srcset="{{ $wfImg('screen-sia-640w.webp') }} 640w,
                                    {{ $wfImg('screen-sia-750w.webp') }} 750w,
                                    {{ $wfImg('screen-sia-828w.webp') }} 828w,
                                    {{ $wfImg('screen-sia-1080w.webp') }} 1080w"
                            sizes="400px">
                        <img src="{{ $wfImg('screen-sia.png') }}" width="1134" height="1400" alt="stock investing account mobile browse" loading="lazy">
                    </picture>
                </div>

                <div class="wf-acct-body">
                    <div>
                        <h3 class="wf-acct-name">Spot &amp; Margin Trading</h3>
                        <h4 class="wf-acct-tag">Crypto, stocks, indices, forex &amp; commodities</h4>
                    </div>

                    <ul class="wf-checklist">
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>$0 commission on stocks, 0.20% taker fee on crypto</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Start from $1 with fractional shares and satoshis</span>
                        </li>
                    </ul>

                    <div class="wf-acct-ctas">
                        <a class="wf-btn wf-btn-primary" href="{{ route('register') }}">Get started</a>
                        <a class="wf-btn wf-btn-ghost-light" href="{{ route('stock-trading') }}">Learn more</a>
                    </div>

                    <div class="wf-acct-foot">
                        <hr class="wf-hr">
                        <div class="wf-explore">Explore single-asset desks:</div>
                        <div class="wf-explore-list">
                            <a href="{{ route('shares.us') }}">US Equities <small>(NYSE, Nasdaq, fractional)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('shares.uk') }}">UK Equities <small>(LSE, FTSE constituents)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('forex.majors') }}">Forex &amp; Commodities <small>(70+ pairs, gold, oil)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>

{{-- ======================================================================
     LIFE STAGES  Â·  data-testid="homepage-life-stages-module"
     ====================================================================== --}}
<div class="wf-stages" data-testid="homepage-life-stages-module">
    <div class="wf-marketing-section">
        <div class="wf-sec-head " >
            <h2 class="wf-h2">Pick your market,<br> <span class="wf-h2-serif">trade it in seconds.</span></h2>
        </div>

        {{-- ---------- mobile: collapsed cards ---------- --}}
        <div class="wf-stages-grid">
            @foreach ($stages as $s)
                <button class="wf-stage-m" type="button" data-stage-m aria-expanded="false">
                    <span class="wf-stage-m-viz" aria-hidden="true">
                        @include('partials.chart', $s['chart'] + ['tone' => '#0a0f1e', 'wide' => true])
                    </span>
                    <span class="wf-stage-m-body">
                        <span class="wf-stage-m-head">
                            <h3>{{ $s['title'] }}</h3>
                            <span class="wf-arrow-chip" data-testid="arrow-right-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </span>
                        </span>
                        <p><b>{{ $s['strong'] }}</b>{{ $s['rest'] }}</p>
                    </span>
                    <span class="wf-stage-m-detail">{{ $s['copy'] }}</span>
                </button>
            @endforeach
        </div>

        {{-- ---------- desktop: expanding carousel ---------- --}}
        <div class="wf-stage-d" data-stage-d role="group" aria-label="Markets" data-testid="expandable-carousel">
            @foreach ($stages as $i => $s)
                <div class="wf-stage-d-card" role="button" tabindex="0"
                     aria-expanded="false"
                     aria-label="Expand {{ $s['title'] }}" data-stage-card data-pill="{{ $i }}">
                    <span class="wf-stage-viz" aria-hidden="true">
                        @include('partials.chart', $s['chart'] + ['tone' => '#0a0f1e', 'wide' => true])
                    </span>
                    <div class="wf-stage-d-inner">
                        <span class="wf-stage-d-pill">{!! $s['pill'] !!}</span>
                        <div>
                            <h3>{{ $s['title'] }}</h3>
                            <div class="wf-stage-d-cta">
                                <p><b>{{ $s['strong'] }}</b>{{ $s['rest'] }}</p>
                                <span class="wf-arrow-chip" data-testid="arrow-right-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                                </span>
                            </div>
                            <p class="wf-stage-d-detail">{{ $s['copy'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ---------- carousel pills ---------- --}}
        <div class="wf-pills" role="tablist" aria-label="Markets">
            @foreach ($stages as $i => $s)
                <button class="wf-pill {{ $i === 0 ? 'is-active' : '' }}" role="tab" type="button"
                        id="expandable-carousel-tab-{{ $i }}" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        aria-controls="expandable-carousel-tabpanel" tabindex="{{ $i === 0 ? '0' : '-1' }}"
                        aria-label="View {{ $s['title'] }}" data-pill="{{ $i }}"></button>
            @endforeach
        </div>
    </div>
</div>

{{-- ======================================================================
     REVIEWS  Â·  data-testid="homepage-reviews-module"
     ====================================================================== --}}
<section class="wf-reviews" data-testid="homepage-reviews-module">
    <div class="wf-container-2024">

        {{-- ---------- Forbes quote + testimonial carousel ---------- --}}
        <div class="wf-rev-top">
            <div class="wf-rev-copy " >
                <span class="wf-quote-mark" aria-hidden="true">"</span>
                <h2 class="wf-rev-quote">PrimeVest has quietly become one of the most complete trading destinations for retail investors — crypto, equities and indices under a single roof.</h2>

                <img class="wf-rev-forbes" src="{{ $wfImg('forbes-logo-white.png') }}" width="1945" height="475" alt="Forbes" loading="lazy">

                <p class="wf-rev-fine">
                    <b><a href="#">Read the article<sup>6</sup></a></b><br>
                    From Forbes, July 26, 2025. 2025 Forbes Media LLC. All rights reserved. Used under license.<br>
                    Forbes and the author are not clients of PrimeVest and no compensation was provided for the article.
                </p>
            </div>

            <div class="wf-carousel " data-testid="review-carousel"  data-carousel>
                <div class="wf-carousel-slide is-active" data-slide>
                    <picture>
                        <source type="image/webp"
                            srcset="{{ $wfImg('reviews-1-640w.webp') }} 640w,
                                    {{ $wfImg('reviews-1-750w.webp') }} 750w,
                                    {{ $wfImg('reviews-1-828w.webp') }} 828w,
                                    {{ $wfImg('reviews-1-1080w.webp') }} 1080w,
                                    {{ $wfImg('reviews-1-1200w.webp') }} 1200w"
                            sizes="(min-width: 1280px) 684px, 100vw">
                        <img width="1368" height="726" alt="client testimonials" data-testid="testimonial-image-0" loading="lazy" src="{{ $wfImg('reviews-1.png') }}">
                    </picture>
                </div>
            </div>
        </div>

        {{-- ---------- accolades tiles ---------- --}}
        <div class="wf-rev-accolades" data-testid="reviews-accolades">
            <div class="wf-rev-tiles">
                <div class="wf-rev-tile">
                    <b>1.5M+</b>
                    <span>Trusted by 1.5M+ clients</span>
                </div>
                <div class="wf-rev-tile">
                    <b>$100B+</b>
                    <span>$100B+ in client funds</span>
                </div>
                <div class="wf-rev-tile is-xl">
                    <b>14+ years</b>
                    <span>Simplifying finances since 2011</span>
                </div>
                <div class="wf-rev-tile is-xl">
                    <b>WLTH</b>
                    <span>Traded on the NASDAQ<sup>r</sup></span>
                </div>
            </div>
        </div>

        {{-- ---------- fine print ---------- --}}
        <div class="wf-rev-fineprint">
            <p>The testimonials above are by clients of PrimeVest Advisers and PrimeVest Brokerage. No compensation was provided. These testimonials may not be representative of other clients' experience. Past performance is no guarantee of success.</p>
            <p>The mention of WLTH is for informational purposes only and should not be construed as investment advice, a solicitation, offer, or recommendation to buy or sell any security. Please visit our investor relations page for more information.</p>
        </div>

        {{-- ---------- CTA band ---------- --}}
        <div class="wf-cta-band">
            <div class="wf-circles-wrap" style="opacity:.5" aria-hidden="true">
                <img class="wf-circles" src="{{ $wfImg('gradient-circles.svg') }}" width="2024" height="850" alt="" loading="lazy">
            </div>
            <div class="wf-cta-band-inner">
                <h2>Sophisticated trading<br class="wf-br"> <span class="wf-h2-serif">made simple.</span></h2>
                <a class="wf-btn wf-btn-white" href="{{ route('register') }}">Open account</a>
            </div>
        </div>
    </div>
</section>

{{-- ======================================================================
     FAQ  Â·  data-testid="homepage-faqs-module"
     ====================================================================== --}}
<div class="wf-faq" data-testid="homepage-faqs-module">
    <section class="wf-faq-inner" data-testid="faq-module">
        <div class="wf-faq-intro">
            <h2 class="wf-h2" data-testid="faq-header">Questions? 5 things to know in 5 minutes or less.</h2>
            <p>
                To learn more about PrimeVest, read our <a href="{{ route('education') }}">whitepapers</a>
                or visit the <a href="{{ route('contact') }}" target="_blank" rel="noopener noreferrer">help center</a>.
            </p>
        </div>

        <div class="wf-faq-list">
            @foreach ($faqs as $i => $f)
                <div class="wf-faq-item {{ $i === 0 ? 'is-open' : '' }}" data-accordion>
                    <button class="wf-faq-q" type="button" aria-expanded="{{ $i === 0 ? 'true' : 'false' }}">
                        <span>{{ $f['q'] }}</span>
                        <img src="{{ $wfImg('chevron.svg') }}" width="37" height="18" alt="" loading="lazy">
                    </button>
                    <div class="wf-faq-a">
                        <div><p>{{ $f['a'] }}</p></div>
                    </div>
                </div>
            @endforeach
            <div class="wf-faq-spacer" aria-hidden="true"></div>
        </div>
    </section>
</div>

{{-- ======================================================================
     MODALS
     ====================================================================== --}}
<div class="wf-modal-backdrop" id="wf-modal-wd" data-modal-panel>
    <div class="wf-modal" role="dialog" aria-modal="true" aria-labelledby="wf-modal-wd-t" style="position:relative">
        <button class="wf-modal-close" type="button" aria-label="Close dialog" data-modal-close>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
        </button>
        <h3 id="wf-modal-wd-t">Free 24/7 instant crypto withdrawals</h3>
        <p>Withdraw Bitcoin, Ethereum and every other supported asset whenever you want — nights, weekends and holidays included. Requests clear review and broadcast to the network in under a minute, and you can track the transaction hash from your dashboard the whole way.</p>
        <p style="margin-top:10px">Fiat withdrawals settle by ACH or SEPA, so your bank's own posting schedule applies. Crypto withdrawals are unlimited on verified accounts beyond the daily review threshold shown in settings.</p>
    </div>
</div>

<div class="wf-modal-backdrop" id="wf-modal-disc" data-modal-panel>
    <div class="wf-modal" role="dialog" aria-modal="true" aria-labelledby="wf-modal-disc-t" style="position:relative">
        <button class="wf-modal-close" type="button" aria-label="Close dialog" data-modal-close>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
        </button>
        <h3 id="wf-modal-disc-t">Full disclosures</h3>
        <p>Returns shown on this page are illustrative only. They do not represent the performance of any individual client account, are shown before fees, and are not a projection of future results.</p>
        <p style="margin-top:10px">Crypto assets are volatile and can lose value in full. Leverage amplifies both gains and losses and can result in losses exceeding your initial deposit. Trading in stocks, indices, forex and commodities may not be suitable for all investors.</p>
        <p style="margin-top:10px">Fees are as published on our pricing page as of 10/01/2026 and are subject to change. PrimeVest is not a bank; balances are held with regulated custodians.</p>
    </div>
</div>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ------------------------------------------------------------------
       1. Header dropdowns â€” click to open, click-away / Esc to close.
       ------------------------------------------------------------------ */
    var ddItems = Array.prototype.slice.call(document.querySelectorAll('[data-dropdown]'));

    function closeAllDropdowns(except) {
        ddItems.forEach(function (item) {
            if (item === except) return;
            item.classList.remove('is-open');
            var btn = item.querySelector('.wf-nav-btn');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        });
    }

    ddItems.forEach(function (item) {
        var btn = item.querySelector('.wf-nav-btn');
        if (!btn) return;
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = item.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            closeAllDropdowns(item);
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('[data-dropdown]')) closeAllDropdowns(null);
    });

    /* ------------------------------------------------------------------
       2. Mobile drawer
       ------------------------------------------------------------------ */
    var drawer = document.querySelector('.wf-drawer');
    var drawerBackdrop = document.querySelector('.wf-drawer-backdrop');
    var drawerTrigger = document.querySelector('[data-drawer-open]');

    function setDrawer(open) {
        if (!drawer) return;
        drawer.classList.toggle('is-open', open);
        drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
        if (drawerBackdrop) drawerBackdrop.classList.toggle('is-open', open);
        if (drawerTrigger) {
            drawerTrigger.classList.toggle('is-open', open);
            drawerTrigger.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
        document.body.style.overflow = open ? 'hidden' : '';
    }

    if (drawerTrigger) {
        drawerTrigger.addEventListener('click', function () {
            setDrawer(!drawer.classList.contains('is-open'));
        });
    }

    Array.prototype.forEach.call(document.querySelectorAll('[data-drawer-close]'), function (el) {
        el.addEventListener('click', function () { setDrawer(false); });
    });

    /* ------------------------------------------------------------------
       3. Accordions (direct-deposit + FAQ)
       ------------------------------------------------------------------ */
    Array.prototype.forEach.call(document.querySelectorAll('[data-accordion]'), function (root) {
        var trigger = root.querySelector('.wf-dd-trigger, .wf-faq-q');
        if (!trigger) return;
        trigger.addEventListener('click', function () {
            var open = root.classList.toggle('is-open');
            trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });

    /* ------------------------------------------------------------------
       4. Modals
       ------------------------------------------------------------------ */
    var lastFocus = null;

    function openModal(id) {
        var panel = document.getElementById(id);
        if (!panel) return;
        lastFocus = document.activeElement;
        panel.classList.add('is-open');
        document.body.style.overflow = 'hidden';
        var f = panel.querySelector('[data-modal-close]');
        if (f) f.focus();
    }

    function closeModal(panel) {
        if (!panel) return;
        panel.classList.remove('is-open');
        if (!document.querySelector('.wf-modal-backdrop.is-open')) document.body.style.overflow = '';
        if (lastFocus && lastFocus.focus) lastFocus.focus();
    }

    Array.prototype.forEach.call(document.querySelectorAll('[data-modal]'), function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            openModal(btn.getAttribute('data-modal'));
        });
    });

    Array.prototype.forEach.call(document.querySelectorAll('[data-modal-panel]'), function (panel) {
        panel.addEventListener('click', function (e) {
            if (e.target === panel || e.target.closest('[data-modal-close]')) closeModal(panel);
        });
    });

    /* ------------------------------------------------------------------
       5. Toasts
       ------------------------------------------------------------------ */
    var viewport = document.querySelector('[data-toast-viewport]');

    function toast(message) {
        if (!viewport) return;
        var el = document.createElement('div');
        el.className = 'wf-toast';
        el.setAttribute('role', 'status');
        el.innerHTML =
            '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>' +
            '<span></span><button type="button" aria-label="Dismiss">&times;</button>';
        el.querySelector('span').textContent = message;
        viewport.appendChild(el);
        requestAnimationFrame(function () { el.classList.add('is-open'); });

        var timer = setTimeout(function () { kill(); }, 5200);
        function kill() {
            clearTimeout(timer);
            el.classList.remove('is-open');
            setTimeout(function () { if (el.parentNode) el.parentNode.removeChild(el); }, 300);
        }
        el.querySelector('button').addEventListener('click', kill);
    }
    window.wfToast = toast;

    var news = document.querySelector('[data-newsletter]');
    if (news) {
        news.addEventListener('submit', function (e) {
            e.preventDefault();
            toast('You are on the list. Market insights land every Friday.');
            news.reset();
        });
    }

    /* ------------------------------------------------------------------
       6. Life stages â€” mobile accordion + desktop expanding carousel
       ------------------------------------------------------------------ */
    Array.prototype.forEach.call(document.querySelectorAll('[data-stage-m]'), function (card) {
        card.addEventListener('click', function () {
            var open = card.classList.toggle('is-open');
            card.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });

    var stageRow = document.querySelector('[data-stage-d]');
    var stageCards = Array.prototype.slice.call(document.querySelectorAll('[data-stage-card]'));
    var stageTitles = stageCards.map(function (card) {
        var h3 = card.querySelector('h3');
        return h3 ? h3.textContent.trim() : '';
    });
    var pillsWrap = document.querySelector('.wf-pills');
    /* Scope to .wf-pill: the cards also carry a data-pill attribute, and
       selecting on that alone attached a second click handler to every card
       that force-re-expanded it. That is why clicking the open card could
       never collapse the carousel â€” toggleStage() collapsed it and this
       listener immediately expanded it again. */
    var pills = Array.prototype.slice.call(document.querySelectorAll('.wf-pill[data-pill]'));
    var stageOpen = false;

    /* Collapsed, the three cards are equal portrait tiles and the pills stay
       hidden (matching wealthfront). `open` promotes one card to a wide panel
       with the copy beside the image, while its peers stay visible and
       clickable so another card can be chosen in place. Clicking the promoted
       card again (its arrow chip turns into a close) collapses back down. */
    function activateStage(index, open) {
        stageOpen = open;
        if (stageRow) stageRow.classList.toggle('is-expanded', open);
        if (pillsWrap) pillsWrap.classList.toggle('is-visible', open);

        stageCards.forEach(function (card, i) {
            var on = i === index;
            card.classList.toggle('is-active', on);
            card.setAttribute('aria-expanded', on && open ? 'true' : 'false');
            /* Say Collapse while this card is the open one, so the way back
               out is announced rather than only implied by the X chip. */
            card.setAttribute('aria-label', (on && open ? 'Collapse ' : 'Expand ') + stageTitles[i]);
        });
        pills.forEach(function (pill) {
            var on = parseInt(pill.getAttribute('data-pill'), 10) === index;
            pill.classList.toggle('is-active', on);
            if (pill.hasAttribute('role')) {
                pill.setAttribute('aria-selected', on ? 'true' : 'false');
                pill.setAttribute('tabindex', on ? '0' : '-1');
            }
        });
    }

    function toggleStage(index) {
        activateStage(index, !(stageOpen && stageCards[index].classList.contains('is-active')));
    }

    stageCards.forEach(function (card, i) {
        card.addEventListener('click', function () { toggleStage(i); });
        card.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleStage(i); }
            if (e.key === 'ArrowRight') { e.preventDefault(); activateStage((i + 1) % stageCards.length, true); }
            if (e.key === 'ArrowLeft')  { e.preventDefault(); activateStage((i - 1 + stageCards.length) % stageCards.length, true); }
        });
    });

    pills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            activateStage(parseInt(pill.getAttribute('data-pill'), 10), true);
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && stageOpen) {
            activateStage(stageCards.findIndex(function (c) { return c.classList.contains('is-active'); }), false);
        }
    });

    /* Start collapsed with the pills hidden; card 0 is only the keyboard seed. */
    if (stageCards.length) activateStage(0, false);

    /* ------------------------------------------------------------------
       7. Testimonial carousel
       ------------------------------------------------------------------ */
    var carousel = document.querySelector('[data-carousel]');
    if (carousel) {
        var slides = Array.prototype.slice.call(carousel.querySelectorAll('[data-slide]'));
        if (slides.length > 1) {
            var dotsWrap = document.createElement('div');
            dotsWrap.className = 'wf-carousel-dots';
            carousel.appendChild(dotsWrap);

            var dots = slides.map(function (_, i) {
                var b = document.createElement('button');
                b.type = 'button';
                b.setAttribute('aria-label', 'View testimonial ' + (i + 1));
                b.addEventListener('click', function () { go(i); restart(); });
                dotsWrap.appendChild(b);
                return b;
            });

            var idx = 0;
            var timer = null;

            function go(i) {
                idx = (i + slides.length) % slides.length;
                slides.forEach(function (s, n) { s.classList.toggle('is-active', n === idx); });
                dots.forEach(function (d, n) { d.classList.toggle('is-active', n === idx); });
            }

            function restart() {
                if (reduce) return;
                clearInterval(timer);
                timer = setInterval(function () { go(idx + 1); }, 6500);
            }

            go(0);
            restart();

            var x0 = null;
            carousel.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; }, { passive: true });
            carousel.addEventListener('touchend', function (e) {
                if (x0 === null) return;
                var dx = e.changedTouches[0].clientX - x0;
                if (Math.abs(dx) > 40) go(idx + (dx < 0 ? 1 : -1));
                x0 = null;
            });
        }
    }

    /* ------------------------------------------------------------------
       8. Esc closes everything
       ------------------------------------------------------------------ */
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        closeAllDropdowns(null);
        setDrawer(false);
        var open = document.querySelector('.wf-modal-backdrop.is-open');
        if (open) closeModal(open);
    });
})();
</script>
@endpush