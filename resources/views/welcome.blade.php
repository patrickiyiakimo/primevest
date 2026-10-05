@extends('layouts.landing')

@section('title', 'PrimeVest | Money works better here')
@section('meta_description', 'PrimeVest makes building wealth easy. Earn 3.55% APY on your uninvested cash and invest in expert-built, automated portfolios of stocks, bonds, and ETFs.')

@php
    $wfImg   = fn ($file) => asset('images/wf/' . $file);
    $stages  = [
        [
            'id'     => 'grow',
            'pill'   => 'Evelyn T. | Client since 2020',
            'title'  => 'Growing your savings',
            'strong' => 'Earn interest on every penny',
            'rest'   => ' of your paycheck.',
            'copy'   => 'Set up automatic deposits, watch every transfer land in one place, and let your balance compound from the day you start.',
        ],
        [
            'id'     => 'build',
            'pill'   => 'Peter &amp; Alex | Clients since 2015 &amp; 2023',
            'title'  => 'Building wealth together',
            'strong' => 'Save, spend and earn as a couple,',
            'rest'   => ' all in one place.',
            'copy'   => 'Joint balances, shared goals and a single dashboard that keeps every dollar of household money visible to both of you.',
        ],
        [
            'id'     => 'manage',
            'pill'   => 'Brad B. | Client since 2015',
            'title'  => 'Managing complex finances',
            'strong' => 'Find a simpler way',
            'rest'   => ' to manage your money.',
            'copy'   => 'Multiple accounts, tax documents and investment reports — consolidated, reconciled and explained in plain language.',
        ],
    ];
    $faqs = [
        [
            'q' => 'Are there any restrictions around the 3.55% APY? Is this a promotional rate?',
            'a' => 'Believe it or not, there\'s no funny business here. There are no minimum (or maximum) balance requirements to earn 3.55% APY from program banks in your Cash Account. Better yet, you can earn an extra 0.75% boost for three months when you refer a friend who signs up for the Cash Account. See promotional interest terms at {{ route("pricing") }} #promotional-terms.',
        ],
        [
            'q' => 'What kind of fees do you charge? Is there a minimum to know about?',
            'a' => 'The Cash Account has no account fees and you can start saving with just $1. We also offer taxable and tax-advantaged automated investing accounts. Here\'s an easy way to compare our investing products: Automated Investing: management fee: 0.25% and minimum to invest: $500, Nasdaq-100 Direct - management fee: 0.12% and minimum to invest: $5,000, S&P 500 Direct - management fee: 0.09% and minimum to invest: $5,000, Stock Investing Account - management fee: $0 commissions and minimum to invest: $1, Automated Bond Ladder - management fee: 0.15% and minimum to invest: $500',
        ],
        [
            'q' => 'How is automated investing at PrimeVest different?',
            'a' => 'Not only were we one of the pioneers of automated investing, we\'re consistently ranked as one of the best options out there. We developed the industry-first automated Tax-Loss Harvesting, and we\'re constantly innovating, using our award-winning software to expand access to a broad range of financial products. Our suite of investing products never veer away from helping our clients focus on what they can control: keeping taxes low, keeping fees low, and staying protected from unnecessary risk. That\'s because we\'ve made it our mission to build products that benefit our clients, not just our bottom line.',
        ],
        [
            'q' => 'What is Tax-Loss Harvesting? And what does that mean for me?',
            'a' => 'Tax-Loss Harvesting is a strategy that can help lower your tax bill. Here\'s how it works: If the price of an investment, say a stock or ETF, falls below the price you paid for it, our software can take advantage of that volatility and sell those shares to harvest the loss, then swap it with a similar security to help keep your portfolio balanced. Because market volatility is just a part of investing, regular dips in the market continue to work as a kind of tax deduction. At tax time, the losses you\'ve collected can offset your capital gains, and you can use any remaining losses to reduce your ordinary income by up to $3,000. Best of all, your harvested losses never expire. Anything you can\'t use in a given year carries forward indefinitely. That\'s good news for you now and in the future. Learn more about Tax-Loss Harvesting at {{ route("education") }} #tax-loss-harvesting',
        ],
        [
            'q' => 'How is the Stock Investing Account different from the Automated Investing Account?',
            'a' => 'Our Automated Investing Account not only personalizes a portfolio for you based on your appetite for risk, it handles everything from rebalancing to finding ways to help you save on your taxes - all for the low, annual fee of just 0.25%. For the Stock Investing Account, it\'s up to you to let us know what stocks you want to trade, when, and how much, but we\'ll still help you understand how that lines up with your investing goals and manage all the trades on your behalf.',
        ],
    ];
@endphp

@section('content')

{{-- ======================================================================
     HERO  ·  data-testid="reusable-hero-module"
     ====================================================================== --}}
<section class="wf-hero" data-testid="reusable-hero-module">
    <div class="wf-circles-wrap" >
        <img class="wf-circles" src="{{ $wfImg('gradient-circles.svg') }}" width="2024" height="850" alt="" loading="eager">
    </div>

    <div class="wf-hero-inner">
        <div class="wf-hero-grid">

            {{-- ---------- copy column ---------- --}}
            <div class="wf-hero-copy">
                <div class="wf-hero-eyebrow">
                    <h1 class="wf-h1">
                        <span class="wf-eyebrow-line">
                            <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M7.689 14.804a.5.5 0 00.282.281l1.487.587a.5.5 0 010 .93l-1.487.587a.5.5 0 00-.282.282l-.587 1.487a.5.5 0 01-.93 0l-.587-1.487a.5.5 0 00-.281-.282l-1.487-.587a.5.5 0 010-.93l1.487-.587a.5.5 0 00.281-.281l.587-1.487a.5.5 0 01.93 0l.587 1.487zm.648-8.798a.279.279 0 00.157.157l.83.328a.279.279 0 010 .518l-.83.328a.279.279 0 00-.157.157l-.328.83a.279.279 0 01-.518 0l-.328-.83a.279.279 0 00-.157-.157l-.83-.328a.279.279 0 010-.518l.83-.328a.279.279 0 00.157-.157l.328-.83a.279.279 0 01.518 0l.328.83zM13.892 5.402a.625.625 0 011.168 0l.666 1.75a5.328 5.328 0 003.074 3.074l1.75.666a.625.625 0 010 1.168l-1.75.666a5.328 5.328 0 00-3.073 3.074l-.667 1.75a.625.625 0 01-1.168 0l-.666-1.75a5.328 5.328 0 00-3.074-3.073l-1.75-.667a.625.625 0 010-1.168l1.75-.666a5.327 5.327 0 003.074-3.074l.666-1.75zm.972 3.385c-.168-.276-.608-.276-.775 0a6.822 6.822 0 01-2.302 2.302c-.277.167-.277.607 0 .774a6.823 6.823 0 012.302 2.302c.167.277.607.277.774 0a6.825 6.825 0 012.302-2.301c.277-.168.277-.608 0-.775a6.824 6.824 0 01-2.301-2.302z"/></svg>
                            Earn up to
                        </span>
                        <span class="text-lg font-bold" data-testid="h1-apy-hero">4.45% APY</span>
                    </h1>
                </div>

                <h2 class="wf-h2-serif" data-testid="hero-apy-description">Better than a bank</h2>

                <div class="wf-hero-features" data-testid="cash-hero-features">
                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M10.233 12.707a1 1 0 000-1.414L8.465 9.525a.75.75 0 011.06-1.06l1.768 1.767a1 1 0 001.414 0l1.768-1.768a.75.75 0 011.06 1.06l-1.767 1.769a1 1 0 000 1.414l1.768 1.768a1 1 0 01-1.06 1.06l-1.769-1.768a1 1 0 00-1.414 0l-1.768 1.768a.749.749 0 11-1.06-1.06l1.768-1.768zM12 21a9 9 0 110-18 9 9 0 010 18zm0-1.5a7.5 7.5 0 100-15 7.5 7.5 0 000 15z"/></svg>
                        </span>
                        <span class="wf-feature-txt">Zero account fees</span>
                    </div>

                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <img src="{{ $wfImg('union-pebble.svg') }}" height="21" width="21" alt="" loading="eager">
                        </span>
                        <span class="wf-feature-txt">
                            Free 24/7 instant withdrawals
                            <button class="wf-info-btn" type="button" aria-label="open instant withdrawal information dialog" data-modal="wf-modal-wd">
                                <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M10.748 10.798h.017c.422 0 .765.343.765.765v2.381a1 1 0 01-1 1h-.285a.745.745 0 000 1.49h4.01a.745.745 0 100-1.49H14a1 1 0 01-1-1v-3.642a1 1 0 00-1-1h-1.252a.748.748 0 000 1.496zm.223-2.927a.965.965 0 00.547.507c.132.05.277.073.435.073.325 0 .583-.09.772-.27a.935.935 0 00.29-.705.913.913 0 00-.29-.699c-.19-.185-.447-.277-.772-.277a1.255 1.255 0 00-.435.073 1.029 1.029 0 00-.33.198.934.934 0 00-.29.705c0 .14.024.272.073.395zM21 12a9 9 0 11-18 0 9 9 0 0118 0zm-1.5 0a7.5 7.5 0 10-15 0 7.5 7.5 0 0015 0z"/></svg>
                            </button>
                        </span>
                    </div>

                    <div class="wf-feature">
                        <span class="wf-feature-ic">
                            <svg viewBox="0 0 24 24" fill="currentColor" role="presentation" aria-hidden="true"><path d="M12 7.25a2.25 2.25 0 110 4.5 2.25 2.25 0 010-4.5zm-.75 2.25a.75.75 0 101.5 0 .75.75 0 00-1.5 0zm-.5 4.5v3a.75.75 0 11-1.5 0v-3a.75.75 0 111.5 0zm3.25-.75a.75.75 0 01.75.75v3a.75.75 0 11-1.5 0v-3a.75.75 0 01.75-.75zM12.49 3.277l8 4.5a1 1 0 01.51.871v2.29a1 1 0 01-1 1h-.313a1 1 0 00-1 1v2.625a1 1 0 001 1H20a1 1 0 011 1v2.438a1 1 0 01-1 1H4a1 1 0 01-1-1v-2.438a1 1 0 011-1h.313a1 1 0 001-1v-2.625a1 1 0 00-1-1H4a1 1 0 01-1-1v-2.29a1 1 0 01.51-.871l8-4.5a1 1 0 01.98 0zm-5.678 8.161v5.625a1 1 0 01-1 1h-.594a.72.72 0 000 1.438h13.564a.719.719 0 000-1.438h-.595a1 1 0 01-1-1v-5.625a1 1 0 011-1h.368a.945.945 0 00.463-1.768L12.49 4.998a.945.945 0 00-.981 0L4.982 8.67a.945.945 0 00.463 1.768h.368a1 1 0 011 1z"/></svg>
                        </span>
                        <span class="wf-feature-txt">Up to $8M in FDIC insurance eligibility through program banks</span>
                    </div>
                </div>

                <!-- <div class="wf-hero-ctas">
                    <a class="wf-btn wf-btn-primary" href="{{ route('register') }}" data-testid="hero-get-started">Get started</a>
                    <a class="wf-btn wf-btn-ghost-dark" href="{{ route('trading') }}" data-testid="hero-learn-more">Learn more</a>
                </div>

                <p class="wf-disclosure" data-testid="hero-rate-disclosure">
                    3.55% Base Annual Percentage Yield (APY) as of 10/01/2026 is provided by program banks and is subject to change. APY Boost is up to a $150,000 balance. See additional terms in the footer.
                </p> -->
            </div>

            {{-- ---------- phone + card composition ---------- --}}
            <div class="wf-hero-visual" data-testid="hero-phone-composition" >
                <div class="wf-hero-card">
                    <img width="267" height="352" alt="A Visa debit card with a PrimeVest logo, partially obscured by a phone." loading="eager" src="{{ $wfImg('debit-card.svg') }}">
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
     DIRECT-DEPOSIT ACCORDION
     ====================================================================== --}}
<div class="wf-container-2024">
    <div class="wf-dd " data-accordion data-testid="direct-deposit-plus-module">
        <button class="wf-dd-trigger" type="button" aria-expanded="false" aria-controls="dd-panel">
            <img src="{{ $wfImg('enclosed-chevron.svg') }}" width="40" height="40" alt="" loading="lazy">
            <span class="wf-dd-texts">
                <h3>Your cash earns 3.55% base APY</h3>
                <p>See how to raise it to 4.45% APY in three easy steps</p>
            </span>
        </button>
        <div class="wf-dd-panel" id="dd-panel">
            <div>
                <div class="wf-dd-steps">
                    <div class="wf-dd-step"><b>1</b><span>Link your bank with Plaid in under two minutes and set up an automated deposit for the day after your paycheck lands.</span></div>
                    <div class="wf-dd-step"><b>2</b><span>Keep a qualifying balance of $25,000 or more in your Cash Account to unlock the +0.75% APY Boost on that balance.</span></div>
                    <div class="wf-dd-step"><b>3</b><span>Refer a friend who also opens a Cash Account and both of you earn the boosted rate for three months.</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ======================================================================
     INVESTING INTRO  ·  data-testid="aia-messaging-investing-intro-module"
     ====================================================================== --}}
<section class="wf-band" style="padding-block:var(--wf-xlarge) var(--wf-xxxlarge)" data-testid="aia-messaging-investing-intro-module">
    <div class="wf-marketing-section" data-marketing>
        <div class="wf-sec-head " >
            <h2 class="wf-h2">
                Turn savings into wealth<br>
                <span class="wf-h2-serif">at one of the best places for long-term investing</span>
            </h2>
            <p class="wf-lede">
                Investing in index funds for the long-term has been shown time and time again to be the most effective way to earn more than even the highest-yield savings accounts. Let us build and manage your portfolio or create your own.
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
                <span class="wf-badge-title">Best Investment Apps</span>
                <span class="wf-badge-year">2026<sup>4</sup></span>
            </div>

            {{-- NerdWallet --}}
            <div class="wf-badge" data-testid="aia-messaging-intro-nerdwallet-badge">
                <span class="wf-badge-laurel"><img src="{{ $wfImg('five-star-laurel.svg') }}" alt="" loading="lazy"></span>
                <span class="wf-badge-logo">
                    <img src="{{ $wfImg('nerdwallet-light.svg') }}" alt="NerdWallet" loading="lazy">
                </span>
                <span class="wf-badge-kicker">Best Robo-advisor,</span>
                <span class="wf-badge-title">Portfolio Options</span>
                <span class="wf-badge-year">2022-26<sup>5</sup></span>
            </div>
        </div>
    </div>
</section>

<hr class="wf-hr" data-marketing style="margin:0">

{{-- ======================================================================
     ACCOUNT CARDS  ·  data-testid="aia-messaging-investing-accounts-module"
     ====================================================================== --}}
<section class="wf-band" style="padding-top:var(--wf-xxxlarge)" data-testid="aia-messaging-investing-accounts-module">
    <div class="wf-marketing-section">
        <div class="wf-acct-grid">

            {{-- ---------- card A · Automated Investing Account ---------- --}}
            <article class="wf-acct-card "  data-testid="automated-investing-account-card">
                <div class="wf-acct-head">
                    <h2 class="wf-h2">Built and managed for you</h2>
                    <p>Designed for investors who prefer to delegate the selection and management of their investments to us.</p>
                </div>

                <div class="wf-acct-visual is-aia">
                    <img class="wf-acct-graph" src="{{ $wfImg('aia-graph.png') }}" width="600" height="300" alt="" loading="lazy">
                    <div class="wf-returns" data-testid="investing-accounts-aia-annual-returns">
                        <b>9.65%</b>
                        <span>annualized returns</span>
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
                        <h3 class="wf-acct-name">Automated Investing Account</h3>
                        <h4 class="wf-acct-tag">Build wealth with globally diversified index investing</h4>
                    </div>

                    <ul class="wf-checklist">
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Designed to maximize long-term, after-tax returns</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Customize to your goals and risk level</span>
                        </li>
                    </ul>

                    <div class="wf-acct-ctas">
                        <a class="wf-btn wf-btn-primary" href="{{ route('register') }}">Get started</a>
                        <a class="wf-btn wf-btn-ghost-light" href="{{ route('trading') }}">Learn more</a>
                    </div>

                    <p class="wf-acct-note" data-testid="investing-accounts-aia-disclosure">
                        The chart in the product image represents actual performance for one-, five-, ten-year and since inception periods through 05/22/2026 for investors in PrimeVest's Classic Automated Investing Account, with a composite risk score of 9 (Ranges 0.5-10). The annualized returns are for the same time periods as of 10/01/2026.
                        <button type="button" data-modal="wf-modal-disc">See full disclosures here</button>
                    </p>

                    <div class="wf-acct-foot">
                        <hr class="wf-hr">
                        <div class="wf-explore">Explore supported account types:</div>
                        <div class="wf-explore-list">
                            <a href="{{ route('trading') }}">Taxable Accounts <small>(Personal, Joint, Trust)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('pricing') }}">Retirement Accounts <small>(Traditional IRA, Roth IRA, SEP)</small>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('education') }}">529 Education Savings Accounts
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- ---------- card B · Stock Investing Account ---------- --}}
            <article class="wf-acct-card "  data-testid="stock-investing-account-card">
                <div class="wf-acct-head">
                    <h2 class="wf-h2">Build your own</h2>
                    <p>Designed for self-directed investors who prefer to select their own investments for each asset class and diversify themselves.</p>
                </div>

                <div class="wf-acct-visual is-sia">
                    <img class="wf-acct-graph" src="{{ $wfImg('aia-graph.png') }}" width="600" height="300" alt="" loading="lazy" style="opacity:.5">
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
                        <h3 class="wf-acct-name">Stock Investing Account</h3>
                        <h4 class="wf-acct-tag">Built for long-term stock and ETF investing</h4>
                    </div>

                    <ul class="wf-checklist">
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Simple by design for intentional investors</span>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.55 18.2l-4.1-4.1a1 1 0 011.4-1.42l2.7 2.68 7.38-7.38a1 1 0 111.42 1.42l-8.08 8.08a1 1 0 01-1.42 0z"/></svg>
                            <span>Zero commissions on trades, start with $1</span>
                        </li>
                    </ul>

                    <div class="wf-acct-ctas">
                        <a class="wf-btn wf-btn-primary" href="{{ route('register') }}">Get started</a>
                        <a class="wf-btn wf-btn-ghost-light" href="{{ route('stock-trading') }}">Learn more</a>
                    </div>

                    <div class="wf-acct-foot">
                        <hr class="wf-hr">
                        <div class="wf-explore">Explore other single asset class products:</div>
                        <div class="wf-explore-list">
                            <a href="{{ route('shares.us') }}">S&amp;P 500 Direct
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('shares.uk') }}">Nasdaq-100 Direct
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                            </a>
                            <a href="{{ route('pricing') }}">Automated Bond Ladder
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
     LIFE STAGES  ·  data-testid="homepage-life-stages-module"
     ====================================================================== --}}
<div class="wf-stages" data-testid="homepage-life-stages-module">
    <div class="wf-marketing-section">
        <div class="wf-sec-head " >
            <h2 class="wf-h2">Make the most of your money, wherever you're at.</h2>
        </div>

        {{-- ---------- mobile: collapsed cards ---------- --}}
        <div class="wf-stages-grid">
            @foreach ($stages as $s)
                <button class="wf-stage-m" type="button" data-stage-m aria-expanded="false">
                    <img class="wf-stage-m-img" width="76" height="74" alt="{{ $s['title'] }}" loading="lazy" src="{{ $wfImg('ls-' . $s['id'] . '.webp') }}">
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
        <div class="wf-stage-d" data-stage-d role="group" aria-label="Life stages" data-testid="expandable-carousel">
            @foreach ($stages as $i => $s)
                <div class="wf-stage-d-card" role="button" tabindex="0"
                     aria-expanded="false"
                     aria-label="Expand {{ $s['title'] }}" data-stage-card data-pill="{{ $i }}">
                    <img width="718" height="650" alt="{{ $s['title'] }}" loading="lazy" src="{{ $wfImg('ls-' . $s['id'] . '-x-640w.webp') }}">
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
        <div class="wf-pills" role="tablist" aria-label="Life stages">
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
     REVIEWS  ·  data-testid="homepage-reviews-module"
     ====================================================================== --}}
<section class="wf-reviews" data-testid="homepage-reviews-module">
    <div class="wf-container-2024">

        {{-- ---------- Forbes quote + testimonial carousel ---------- --}}
        <div class="wf-rev-top">
            <div class="wf-rev-copy " >
                <span class="wf-quote-mark" aria-hidden="true">"</span>
                <h2 class="wf-rev-quote">PrimeVest beats out Fidelity, Schwab and Vanguard when it comes to direct indexing and tax-loss harvesting.</h2>

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
                <h2>Sophisticated investing<br class="wf-br"> <span class="wf-h2-serif">made simple.</span></h2>
                <a class="wf-btn wf-btn-white" href="{{ route('register') }}">Open account</a>
            </div>
        </div>
    </div>
</section>

{{-- ======================================================================
     FAQ  ·  data-testid="homepage-faqs-module"
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
        <h3 id="wf-modal-wd-t">Free 24/7 instant withdrawals</h3>
        <p>Money in your Cash Account is available to withdraw whenever you want — nights, weekends and holidays included. Withdrawals initiated before 3pm ET on a business day typically settle the same day, and the funds are usable immediately.</p>
        <p style="margin-top:10px">Because program banks send funds via ACH, your bank's own posting schedule applies. Instant withdrawals are limited to $5,000 per day, raised to $25,000 for clients with a qualifying direct deposit.</p>
    </div>
</div>

<div class="wf-modal-backdrop" id="wf-modal-disc" data-modal-panel>
    <div class="wf-modal" role="dialog" aria-modal="true" aria-labelledby="wf-modal-disc-t" style="position:relative">
        <button class="wf-modal-close" type="button" aria-label="Close dialog" data-modal-close>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
        </button>
        <h3 id="wf-modal-disc-t">Full disclosures</h3>
        <p>Annualized returns: 1-year 14.74%, 5-year 10.04%, 10-year 10.78%, since inception 9.65% as of 10/01/2026.</p>
        <p style="margin-top:10px">The chart represents actual performance for one-, five-, ten-year and since-inception periods through 05/22/2026 for investors in the Classic Automated Investing Account with a composite risk score of 9 (range 0.5–10).</p>
        <p style="margin-top:10px">3.55% Base APY as of 10/01/2026 is provided by program banks and is subject to change. APY Boost is up to a $150,000 balance.</p>
    </div>
</div>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';

    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ------------------------------------------------------------------
       1. Header dropdowns — click to open, click-away / Esc to close.
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
       6. Life stages — mobile accordion + desktop expanding carousel
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
       never collapse the carousel — toggleStage() collapsed it and this
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