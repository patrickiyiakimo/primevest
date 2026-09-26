<nav class="pv-nav" id="pvNavbar">
    <div class="pv-container pv-nav-inner">
        <a href="{{ url('/') }}" class="pv-logo">
            <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="height:38px;width:auto;display:block">
        </a>
        <div class="pv-nav-links" id="pvNav">
            <span class="pv-menu-label">Explore</span>
            <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4L12 22l-9-9V3h10l7.6 7.6a2 2 0 010 2.8z"/><circle cx="7.5" cy="7.5" r="1.2"/></svg></span>
                <span>Pricing</span><span class="pv-menu-chev">›</span>
            </a>
            <a href="{{ route('trading') }}" class="{{ request()->routeIs('trading') ? 'active' : '' }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V5"/><path d="M4 19h16"/><path d="M8 15l4-5 3 3 5-7"/></svg></span>
                <span>Markets</span><span class="pv-menu-chev">›</span>
            </a>
            <a href="{{ route('copy-trading') }}" class="{{ request()->routeIs('copy-trading') ? 'active' : '' }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg></span>
                <span>Copy Trading</span><span class="pv-menu-chev">›</span>
            </a>
            <a href="{{ route('company') }}" class="{{ request()->routeIs('company') ? 'active' : '' }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg></span>
                <span>About</span><span class="pv-menu-chev">›</span>
            </a>
            <a href="{{ route('education') }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6.25c-1.8-1.5-4.2-2-8-2v14c3.8 0 6.2.5 8 2 1.8-1.5 4.2-2 8-2v-14c-3.8 0-6.2.5-8 2z"/><path d="M12 6.25v14"/></svg></span>
                <span>Learn</span><span class="pv-menu-chev">›</span>
            </a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                <span class="pv-menu-ic"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="3"/><path d="M22 7l-10 6L2 7"/></svg></span>
                <span>Contact</span><span class="pv-menu-chev">›</span>
            </a>
            <span class="pv-menu-sep"></span>
            <span class="pv-menu-label">Account</span>
            <div class="pv-menu-auth">
                @auth
                    <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-sm pv-btn-block">Open Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="pv-btn pv-btn-ghost pv-btn-sm pv-btn-block">Log in</a>
                    <a href="{{ route('register') }}" class="pv-btn pv-btn-sm pv-btn-block">Get Started Free</a>
                @endauth
            </div>
        </div>
        <div class="pv-nav-actions">
            @include('partials.theme-btn')
            @auth
                <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-sm pv-btn-hide-sm">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="pv-btn pv-btn-ghost pv-btn-sm pv-btn-hide-sm">Log in</a>
                <a href="{{ route('register') }}" class="pv-btn pv-btn-sm pv-btn-hide-sm">Get Started</a>
            @endauth
        </div>
        <button class="pv-burger" onclick="pvBurger()" aria-label="Menu" aria-expanded="false">
            <span class="pv-burger-box"><span></span><span></span><span></span></span>
        </button>
    </div>
</nav>