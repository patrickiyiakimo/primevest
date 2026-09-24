<nav class="pv-nav">
    <div class="pv-container pv-nav-inner">
        <a href="{{ url('/') }}" class="pv-logo">
            <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="height:38px;width:auto;display:block">
        </a>
        <div class="pv-nav-links" id="pvNav">
            <a href="{{ url('/') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a>
            <a href="{{ route('trading') }}" class="{{ request()->routeIs('trading') ? 'active' : '' }}">Markets</a>
            <a href="{{ route('trading') }}#copy-trading">Copy Trading</a>
            <a href="{{ route('company') }}" class="{{ request()->routeIs('company') ? 'active' : '' }}">About</a>
            <a href="{{ route('education') }}">Learn</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <div style="display:flex;align-items:center;gap:10px">
            @include('partials.theme-btn')
            @auth
                <a href="{{ route('dashboard') }}" class="pv-btn pv-btn-sm">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="pv-btn pv-btn-ghost pv-btn-sm">Log in</a>
                <a href="{{ route('register') }}" class="pv-btn pv-btn-sm">Get Started</a>
            @endauth
        </div>
        <button class="pv-burger" onclick="pvBurger()" aria-label="Menu">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </div>
</nav>