<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <title>@yield('title', 'PrimeVest | Money works better here')</title>
    <meta name="description" content="@yield('meta_description', 'PrimeVest makes building wealth easy. Earn 3.55% APY on your uninvested cash and invest in expert-built, automated portfolios of stocks, bonds, and ETFs.')">
    <meta name="theme-color" content="#230b59">
    <meta name="format-detection" content="telephone=no, date=no, email=no, address=no">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'PrimeVest | Money works better here')">
    <meta property="og:description" content="@yield('meta_description', 'PrimeVest makes building wealth easy.')">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@PrimeVest">

    <link rel="canonical" href="{{ url()->current() }}">

    @vite(['resources/css/landing.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,300;0,400;1,300;1,400&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">

    @stack('styles')
</head>
<body>
<div class="wf-shell">

    {{-- ============================================================
         Continuous top gradient: promo banner + header
         ============================================================ --}}
    <div class="wf-top">

        {{-- ---------- promo banner ---------- --}}
        <div class="wf-banner wf-container-2024" data-testid="home-lending-banner">
            <div class="wf-banner-card">
                <div class="wf-banner-copy">
                    The easier way to get a low mortgage rate.
                    <span>Self-serve home loans with zero sales pressure.</span>
                </div>
                <a href="{{ route('real-estate') }}" class="wf-banner-link">
                    Learn more
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="M13 6l6 6-6 6"/></svg>
                </a>
                <img class="wf-banner-photo" width="595" height="94" alt="" loading="eager" src="{{ asset('images/wf/banner-photo-small.png') }}">
            </div>
        </div>

        {{-- ---------- header ---------- --}}
        <div class="wf-header wf-container-2024" data-testid="header">
            <div class="wf-header-inner">

                <a class="wf-logo" href="{{ url('/') }}" aria-label="PrimeVest home">
                    <span class="wf-logo-lockup">
                        <img class="wf-logo-mark" src="{{ asset('images/logoipsum-409.png') }}" width="32" height="26" alt="PrimeVest" loading="eager">
                        <b>PrimeVest</b>
                    </span>
                </a>

                <nav class="wf-nav" aria-label="Main">
                    {{-- plain link --}}
                    <div class="wf-nav-item">
                        <a class="wf-nav-link" href="{{ route('trading') }}" data-testid="desktop-markets-header-link">Markets</a>
                    </div>

                    {{-- dropdown: Invest --}}
                    <div class="wf-nav-item" data-dropdown>
                        <button class="wf-nav-btn" aria-expanded="false" aria-haspopup="true" aria-controls="header-tab-invest-menu">
                            Invest
                            <svg fill="none" viewBox="0 0 9 6" aria-hidden="true"><path d="M.47 1.624A.754.754 0 111.58.602l2.552 2.772a.5.5 0 00.736 0L7.42.602a.754.754 0 111.11 1.022L5.236 5.201a1 1 0 01-1.472 0L.47 1.624z" fill="currentColor" fill-rule="evenodd"/></svg>
                        </button>
                        <div class="wf-menu" id="header-tab-invest-menu" role="menu">
                            <div class="wf-menu-group">
                                <span class="wf-menu-label">Invest</span>
                                <a class="wf-menu-link" href="{{ route('copy-trading') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 00-3-3.87"/></svg></span>
                                    <span><b>Copy Trading</b><span>Mirror vetted professional traders automatically.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('dashboard') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
                                    <span><b>Staking Plans</b><span>Earn yield on stablecoins, paid daily.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('real-estate') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 21v-6h6v6"/></svg></span>
                                    <span><b>Real Estate</b><span>Fractional property portfolios.</span></span>
                                </a>
                            </div>
                            <div class="wf-menu-group">
                                <span class="wf-menu-label">Accounts</span>
                                <a class="wf-menu-link" href="{{ route('register') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6"/><path d="M22 11h-6"/></svg></span>
                                    <span><b>Automated Investing Account</b><span>We select, rebalance and optimise for you.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('buy-crypto') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="13" rx="3"/><path d="M2 10h20"/><path d="M6 15h4"/></svg></span>
                                    <span><b>PrimeVest Card</b><span>Spend your balance anywhere.</span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- dropdown: Trade --}}
                    <div class="wf-nav-item" data-dropdown>
                        <button class="wf-nav-btn" aria-expanded="false" aria-haspopup="true" aria-controls="header-tab-borrow-menu">
                            Trade
                            <svg fill="none" viewBox="0 0 9 6" aria-hidden="true"><path d="M.47 1.624A.754.754 0 111.58.602l2.552 2.772a.5.5 0 00.736 0L7.42.602a.754.754 0 111.11 1.022L5.236 5.201a1 1 0 01-1.472 0L.47 1.624z" fill="currentColor" fill-rule="evenodd"/></svg>
                        </button>
                        <div class="wf-menu" id="header-tab-borrow-menu" role="menu">
                            <div class="wf-menu-group">
                                <span class="wf-menu-label">Trading desks</span>
                                <a class="wf-menu-link" href="{{ route('trading') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V5"/><path d="M4 19h16"/><path d="M8 15l4-5 3 3 5-7"/></svg></span>
                                    <span><b>Crypto Trading Desk</b><span>Spot, futures and margin.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('shares.us') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l5-5 4 3 8-8"/><path d="M14 7h6v6"/></svg></span>
                                    <span><b>US Equities</b><span>Trade listed US stocks.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('shares.uk') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l5-5 4 3 8-8"/><path d="M14 7h6v6"/></svg></span>
                                    <span><b>UK Equities</b><span>Trade listed UK stocks.</span></span>
                                </a>
                            </div>
                            <div class="wf-menu-group">
                                <span class="wf-menu-label">FX</span>
                                <a class="wf-menu-link" href="{{ route('forex.majors') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18"/><path d="M12 3a15 15 0 010 18"/><path d="M12 3a15 15 0 000 18"/><path d="M6 7h12"/><path d="M6 17h12"/></svg></span>
                                    <span><b>Major pairs</b><span>The eight most-traded currencies.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('forex.minors') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18"/><path d="M12 3a15 15 0 010 18"/><path d="M12 3a15 15 0 000 18"/></svg></span>
                                    <span><b>Minor pairs &amp; exotics</b><span>Full cross-rate coverage.</span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- dropdown: Learn --}}
                    <div class="wf-nav-item" data-dropdown>
                        <button class="wf-nav-btn" aria-expanded="false" aria-haspopup="true" aria-controls="header-tab-learn-menu">
                            Learn
                            <svg fill="none" viewBox="0 0 9 6" aria-hidden="true"><path d="M.47 1.624A.754.754 0 111.58.602l2.552 2.772a.5.5 0 00.736 0L7.42.602a.754.754 0 111.11 1.022L5.236 5.201a1 1 0 01-1.472 0L.47 1.624z" fill="currentColor" fill-rule="evenodd"/></svg>
                        </button>
                        <div class="wf-menu" id="header-tab-learn-menu" role="menu">
                            <div class="wf-menu-group">
                                <span class="wf-menu-label">Resources</span>
                                <a class="wf-menu-link" href="{{ route('education') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.25c-1.8-1.5-4.2-2-8-2v14c3.8 0 6.2.5 8 2 1.8-1.5 4.2-2 8-2v-14c-3.8 0-6.2.5-8 2z"/><path d="M12 6.25v14"/></svg></span>
                                    <span><b>Crypto Academy</b><span>Beginner explainers and market analysis.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('pricing') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></span>
                                    <span><b>Pricing</b><span>Every fee, spelled out.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('company') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg></span>
                                    <span><b>About PrimeVest</b><span>Who we are and how we operate.</span></span>
                                </a>
                                <a class="wf-menu-link" href="{{ route('contact') }}" role="menuitem">
                                    <span class="wf-menu-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M22 7l-10 6L2 7"/></svg></span>
                                    <span><b>Contact</b><span>Talk to a human, any day.</span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="wf-header-actions">
                    @auth
                        <a class="wf-btn wf-btn-white" href="{{ route('dashboard') }}" data-testid="logged-out-header-login">Dashboard</a>
                    @else
                        <a class="wf-btn wf-btn-ghost-dark" href="{{ route('login') }}" data-testid="logged-out-header-login">Log in</a>
                        <a class="wf-btn wf-btn-white" href="{{ route('register') }}" data-testid="logged-out-header-signup">Get started</a>
                    @endauth
                </div>

                {{-- hamburger (mobile / tablet) --}}
                <button class="wf-burger" type="button" aria-label="Open navigation menu" aria-expanded="false" data-drawer-open>
                    <span class="wf-burger-box"><span></span><span></span><span></span></span>
                </button>
            </div>
        </div>
    </div>

    {{-- ---------- page ---------- --}}
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- ---------- mobile drawer ---------- --}}
    <div class="wf-drawer-backdrop" data-drawer-close tabindex="-1"></div>
    <aside class="wf-drawer" aria-label="Navigation menu" aria-hidden="true">
        <div class="wf-drawer-head">
            <span class="wf-logo-lockup on-light">
                <img class="wf-logo-mark" src="{{ asset('images/logoipsum-409.png') }}" width="28" height="22" alt="PrimeVest">
                <b>PrimeVest</b>
            </span>
            <button class="wf-drawer-close" type="button" aria-label="Close navigation menu" data-drawer-close>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6L6 18"/><path d="M6 6l12 12"/></svg>
            </button>
        </div>

        <nav class="wf-drawer-nav">
            <a class="wf-drawer-link" href="{{ route('trading') }}">Markets</a>

            <a class="wf-drawer-link" href="{{ route('copy-trading') }}">Invest</a>
            <div class="wf-drawer-sub">
                <a href="{{ route('copy-trading') }}">Copy Trading</a>
                <a href="{{ route('dashboard') }}">Staking Plans</a>
                <a href="{{ route('real-estate') }}">Real Estate</a>
                <a href="{{ route('register') }}">Automated Investing Account</a>
                <a href="{{ route('buy-crypto') }}">PrimeVest Card</a>
            </div>

            <a class="wf-drawer-link" href="{{ route('trading') }}">Trade</a>
            <div class="wf-drawer-sub">
                <a href="{{ route('trading') }}">Crypto Trading Desk</a>
                <a href="{{ route('shares.us') }}">US Equities</a>
                <a href="{{ route('shares.uk') }}">UK Equities</a>
                <a href="{{ route('forex.majors') }}">Major pairs</a>
                <a href="{{ route('forex.minors') }}">Minor pairs &amp; exotics</a>
            </div>

            <a class="wf-drawer-link" href="{{ route('education') }}">Learn</a>
            <div class="wf-drawer-sub">
                <a href="{{ route('education') }}">Crypto Academy</a>
                <a href="{{ route('pricing') }}">Pricing</a>
                <a href="{{ route('company') }}">About PrimeVest</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </nav>

        <div class="wf-drawer-foot">
            @auth
                <a class="wf-btn wf-btn-primary" href="{{ route('dashboard') }}" style="width:100%">Open Dashboard</a>
            @else
                <a class="wf-btn wf-btn-primary" href="{{ route('register') }}" style="width:100%">Get started</a>
                <a class="wf-btn wf-btn-ghost-light" href="{{ route('login') }}" style="width:100%">Log in</a>
            @endauth
        </div>
    </aside>

    {{-- ---------- toast viewport ---------- --}}
    <div class="wf-toast-region" role="region" aria-label="Notifications" tabindex="-1" data-toast-viewport></div>

</div>

@stack('scripts')
@include('partials.jivo')
</body>
</html>