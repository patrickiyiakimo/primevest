<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">
    @include('partials.theme')
    <title>@yield('title', 'Dashboard') · PrimeVest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --bg:#05070d; --bg2:#070b14; --panel:#0c1322; --panel2:#111b31;
            --line:rgba(255,255,255,.07); --text:#eef2f9; --muted:#94a1b6;
            --acc:#2f7bff; --acc2:#00b4ff; --gold:#f0b90b; --red:#ef4444; --side:240px;
            --rad:16px;
        }
        *{box-sizing:border-box}
        html,body{margin:0;padding:0}
        body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased;line-height:1.55}
        ::selection{background:#2375ff;color:#fff}
        .num{font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums}
        a{color:inherit;text-decoration:none}

        /* ===== Sidebar ===== */
        .side{position:fixed;inset:0 auto 0 0;width:var(--side);background:linear-gradient(180deg,#0a0f1c,#070b14);border-right:1px solid var(--line);z-index:80;display:flex;flex-direction:column;transition:transform .3s}
        .side-logo{display:flex;align-items:center;gap:10px;padding:20px 20px 16px;border-bottom:1px solid var(--line)}
        .side-badge{width:34px;height:34px;border-radius:10px;display:grid;place-items:center;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d;font-weight:800;box-shadow:0 6px 18px -6px rgba(47,123,255,.6)}
        .side-nav{flex:1;overflow-y:auto;padding:14px 12px 20px}
        .side-nav::-webkit-scrollbar{width:4px}.side-nav::-webkit-scrollbar-thumb{background:#1c2740;border-radius:4px}
        .side-sec{font-size:.66rem;text-transform:uppercase;letter-spacing:.14em;color:#5a6685;font-weight:700;padding:14px 12px 8px}
        .side-item{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:11px;color:var(--muted);font-size:.88rem;font-weight:600;margin-bottom:2px;transition:.18s}
        .side-item svg{width:19px;height:19px;flex-shrink:0;opacity:.8}
        .side-item:hover{background:rgba(255,255,255,.05);color:var(--text)}
        .side-item.on{background:linear-gradient(90deg,rgba(47,123,255,.14),rgba(47,123,255,.04));color:var(--acc);box-shadow:inset 2px 0 0 var(--acc)}
        .side-sub{padding-left:34px;font-size:.82rem}
        .side-user{margin:14px 12px;padding:14px;border-radius:13px;background:rgba(255,255,255,.035);border:1px solid var(--line);display:flex;gap:11px;align-items:center}
        .side-av{width:40px;height:40px;border-radius:11px;background:linear-gradient(135deg,var(--acc2),var(--acc));display:grid;place-items:center;font-weight:800;color:#04140d;flex-shrink:0}
        .side-out{margin:0 12px 16px}
        .side-out a{display:flex;align-items:center;justify-content:center;gap:8px;padding:11px;border-radius:11px;border:1px solid var(--line);color:var(--muted);font-size:.85rem;font-weight:600;transition:.2s}
        .side-out a:hover{color:#ff7c85;border-color:rgba(239,68,68,.4)}

        /* ===== Main ===== */
        .main{margin-left:var(--side);min-height:100vh;display:flex;flex-direction:column}
        .topbar{position:sticky;top:0;z-index:70;display:flex;align-items:center;gap:14px;justify-content:space-between;padding:13px 24px;background:rgba(7,11,20,.82);backdrop-filter:blur(16px);border-bottom:1px solid var(--line)}
        .burger{display:none;background:none;border:0;color:var(--text);cursor:pointer}
        .crumb{font-size:.76rem;color:var(--muted);min-width:0}
        .crumb b{color:var(--text);font-size:.82rem}
        /* Long page titles / long names must not squeeze the navbar controls. */
        .pv-topbar-title{min-width:0}
        .pv-topbar-title>div{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        .tsearch{display:flex;align-items:center;gap:9px;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:11px;padding:9px 14px;width:260px}
        .tsearch input{background:none;border:0;outline:0;color:var(--text);font-family:inherit;font-size:.85rem;width:100%}
        .tsearch input::placeholder{color:#5a6685}
        .notif{position:relative;width:40px;height:40px;border-radius:11px;background:rgba(255,255,255,.05);border:1px solid var(--line);display:grid;place-items:center;cursor:pointer}
        .notif .pip{position:absolute;top:8px;right:9px;width:8px;height:8px;border-radius:50%;background:var(--red);box-shadow:0 0 0 3px rgba(239,68,68,.25)}
        .udrop{position:relative}
        .udrop-btn{display:flex;align-items:center;gap:10px;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:11px;padding:6px 12px 6px 6px;cursor:pointer}
        .udrop-av{width:34px;height:34px;border-radius:9px;background:linear-gradient(135deg,var(--acc2),var(--acc));display:grid;place-items:center;font-weight:800;color:#04140d;font-size:.9rem}
        .udrop-menu{position:absolute;right:0;top:calc(100% + 8px);width:230px;background:var(--panel2);border:1px solid var(--line);border-radius:14px;padding:8px;display:none;box-shadow:0 30px 60px -20px rgba(5,10,25,.5)}
        .udrop-menu.open{display:block}
        .udrop-menu a,.udrop-menu button{display:flex;align-items:center;gap:10px;width:100%;padding:10px 12px;border-radius:9px;background:none;border:0;color:var(--muted);font-size:.86rem;font-family:inherit;cursor:pointer;text-align:left}
        .udrop-menu a:hover,.udrop-menu button:hover{background:rgba(255,255,255,.06);color:var(--text)}
        .content{flex:1;padding:26px 24px}
        @media(max-width:1000px){
            .side{transform:translateX(-100%)}
            .side.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:block}
            .tsearch{display:none}
            /* Reclaim navbar room on phones. Profile + Log out stay available
               in the drawer sidebar, so nothing becomes unreachable. */
            .topbar .udrop{display:none}
            .topbar{padding:12px 16px;gap:10px}
            .overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:75;display:none}
            .overlay.show{display:block}
        }

        /* ===== Shared components ===== */
        .pa{background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:var(--rad)}
        .kpi{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        @media(max-width:1100px){.kpi{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:560px){.kpi{grid-template-columns:1fr}}
        .kpi-card{position:relative;overflow:hidden;padding:22px;border-radius:16px;border:1px solid var(--line);background:linear-gradient(180deg,var(--panel2),var(--panel))}
        .kpi-card .lbl{font-size:.75rem;color:var(--muted);font-weight:600;letter-spacing:.04em;text-transform:uppercase;margin-bottom:8px;display:flex;align-items:center;gap:7px;flex-wrap:wrap}
        .kpi-card .val{font-size:1.55rem;font-weight:800;letter-spacing:-.02em;overflow-wrap:anywhere}
        .kpi-card .sub{font-size:.8rem;color:var(--muted);margin-top:6px;overflow-wrap:anywhere}
        .kpi-card.glow::after{content:"";position:absolute;top:-40%;right:-20%;width:200px;height:200px;border-radius:50%;background:radial-gradient(circle,rgba(47,123,255,.18),transparent 70%);pointer-events:none}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#57c8ff 0%,#2f7bff 45%,#1456d1 100%);color:#03140d;font-weight:700;padding:11px 20px;border-radius:11px;border:0;cursor:pointer;font-size:.9rem;font-family:inherit;transition:.22s;box-shadow:0 10px 26px -12px rgba(47,123,255,.55),inset 0 1px 0 rgba(255,255,255,.28)}
        .btn:hover{transform:translateY(-2px)}
        .btn-ghost{background:rgba(255,255,255,.06);color:var(--text);box-shadow:none;border:1px solid var(--line)}
        .btn-ghost:hover{background:rgba(255,255,255,.1)}
        .btn-red{background:linear-gradient(135deg,#ff7c85,var(--red));box-shadow:0 10px 26px -12px rgba(239,68,68,.5);color:#2a0507}
        .btn-gold{background:linear-gradient(135deg,#ffe39d 0%,#ffd257 45%,#f0b90b 100%);color:#241a00;box-shadow:inset 0 1px 0 rgba(255,255,255,.4)}
        .btn-sm{padding:8px 14px;font-size:.82rem}
        .inp{width:100%;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:11px;padding:12px 14px;color:var(--text);font-size:.9rem;outline:none;font-family:inherit;transition:.2s}
        .inp option{background:var(--panel2);color:var(--text)}
        .inp:focus,.inp:focus-visible{border-color:rgba(47,123,255,.55);box-shadow:0 0 0 3px rgba(47,123,255,.13)}
        .lbl{display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:7px}
        .sel{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' fill='none' stroke='%2394a1b6' viewBox='0 0 24 24'%3E%3Cpath stroke-linecap='round' d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 13px center;padding-right:36px}
        .tbl{width:100%;border-collapse:collapse;font-size:.87rem}
        .tbl th{text-align:left;color:var(--muted);font-size:.7rem;text-transform:uppercase;letter-spacing:.07em;padding:12px 14px;border-bottom:1px solid var(--line);background:rgba(255,255,255,.02);white-space:nowrap}
        .tbl td{padding:13px 14px;border-bottom:1px solid rgba(255,255,255,.045)}
        .tbl tbody tr:hover td{background:rgba(255,255,255,.025)}
        .pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:999px;font-size:.74rem;font-weight:700}
        .pill-g{background:rgba(47,123,255,.13);color:var(--acc)}
        .pill-r{background:rgba(239,68,68,.13);color:#ff7c85}
        .pill-y{background:rgba(240,185,11,.12);color:var(--gold)}
        .pill-b{background:rgba(14,165,233,.12);color:#4cc3ff}
        .sec-h{display:flex;align-items:center;justify-content:space-between;gap:14px;margin:0 0 18px;min-width:0}
        .sec-h h2{margin:0;font-size:1.2rem;font-weight:800}
        .sec-h p{margin:2px 0 0;color:var(--muted);font-size:.82rem}
        @media(max-width:560px){
            .content{padding:18px 14px}
            .kpi{gap:12px}
            .kpi-card{padding:18px}
            .kpi-card .val{font-size:1.35rem}
        }
        .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:20px}
        .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
        .grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        @media(max-width:1100px){.grid-2,.grid-3{grid-template-columns:1fr}.grid-4{grid-template-columns:1fr 1fr}}
        @media(max-width:700px){.grid-4{grid-template-columns:1fr}}
        .muted{color:var(--muted)}
        .ok{color:var(--acc)}.bad{color:#ff7c85}.gold{color:var(--gold)}
        .mt{margin-top:20px}.mb{margin-bottom:20px}
        /* Toasts (Toastify) */
        .pv-tv-ok,.pv-tv-err{background:linear-gradient(180deg,var(--panel2),var(--panel))!important;color:var(--text)!important;border:1px solid var(--line)!important;border-left:3px solid var(--acc);border-radius:12px!important;box-shadow:0 18px 50px -12px rgba(5,10,25,.6)!important;font-weight:600!important;font-size:.88rem!important}
        .pv-tv-err{border-left-color:var(--red)}
        /* Plan cards */
        .plan{border:1px solid var(--line);border-radius:16px;padding:22px;background:linear-gradient(180deg,var(--panel2),var(--panel));transition:.25s;position:relative;overflow:hidden}
        .plan:hover{transform:translateY(-4px);border-color:rgba(47,123,255,.4)}
        .plan.hot{border-color:rgba(240,185,11,.45)}
        .plan.hot::before{content:"🔥 Most Popular";position:absolute;top:16px;right:-32px;background:linear-gradient(90deg,var(--gold),#fbd56d);color:#241a00;font-size:.65rem;font-weight:800;padding:5px 34px;transform:rotate(45deg)}
        .plan .roi{font-size:2rem;font-weight:800;letter-spacing:-.02em}
        .plan ul{margin:16px 0 0;padding:0;list-style:none;font-size:.84rem;color:var(--muted)}
        .plan li{margin:7px 0;display:flex;gap:8px;align-items:flex-start}
        .plan li::before{content:"✓";color:var(--acc);font-weight:800}
    </style>
</head>
<body>
<div class="overlay" id="pvOverlay" onclick="pvCloseSide()"></div>

<!-- SIDEBAR -->
<aside class="side" id="pvSide">
    <div class="side-logo">
        <a href="{{ url('/') }}" style="display:flex;align-items:center;gap:10px">
            <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="width:auto;height:30px;display:block">
        </a>
    </div>
    <nav class="side-nav">
        <div class="side-sec">Overview</div>
        <a href="{{ route('dashboard') }}" class="side-item {{ request()->routeIs('dashboard') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>

        <div class="side-sec">Markets</div>
        <a href="{{ route('buy-crypto') }}" class="side-item {{ request()->routeIs('buy-crypto') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Buy Crypto
        </a>
        <a href="{{ route('stock-trading') }}" class="side-item {{ request()->routeIs('stock-trading') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            Trading Desk
        </a>
        <a href="{{ route('copy-traders') }}" class="side-item {{ request()->routeIs('copy-traders') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm1-2a4 4 0 114-4"/></svg>
            Copy Trading
        </a>

        <div class="side-sec">Grow &amp; Move</div>
        <a href="{{ route('invest') }}" class="side-item {{ request()->routeIs('invest') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            Staking Plans
        </a>
        <a href="{{ route('deposit') }}" class="side-item {{ request()->routeIs('deposit') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M12 4v16m8-8H4"/></svg>
            Deposit
        </a>
        <a href="{{ route('withdraw') }}" class="side-item {{ request()->routeIs('withdraw') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M20 12H4"/></svg>
            Withdraw
        </a>

        <div class="side-sec">History</div>
        <a href="{{ route('deposits-history') }}" class="side-item side-sub {{ request()->routeIs('deposits-history') ? 'on' : '' }}">Deposits</a>
        <a href="{{ route('withdrawals-history') }}" class="side-item side-sub {{ request()->routeIs('withdrawals-history') ? 'on' : '' }}">Withdrawals</a>
        <a href="{{ route('earnings-history') }}" class="side-item side-sub {{ request()->routeIs('earnings-history') ? 'on' : '' }}">Earnings</a>
        <a href="{{ route('investments-history') }}" class="side-item side-sub {{ request()->routeIs('investments-history') ? 'on' : '' }}">Staking History</a>
        <a href="{{ route('stock.history') }}" class="side-item side-sub {{ request()->routeIs('stock.history') ? 'on' : '' }}">Trading History</a>

        <div class="side-sec">Account</div>
        <a href="{{ route('kyc.status') }}" class="side-item {{ request()->routeIs('kyc.status', 'kyc.form') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.6-2.6A11.95 11.95 0 0112 21 11.95 11.95 0 012.4 15.4 11.95 11.95 0 0112 3a11.95 11.95 0 019.6 6.4z"/></svg>
            Verification (KYC)
        </a>
        <a href="{{ route('card-application') }}" class="side-item {{ request()->routeIs('card-application') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            PrimeVest Card
        </a>
        <a href="{{ route('profile') }}" class="side-item {{ request()->routeIs('profile') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Profile
        </a>
    </nav>

    <div class="side-user">
        <div class="side-av">{{ substr(Auth::user()->name, 0, 1) }}</div>
        <div style="min-width:0">
            <div style="font-weight:700;font-size:.88rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ Auth::user()->name }}</div>
            <div style="font-size:.72rem;color:var(--muted)">Verified Investor</div>
        </div>
    </div>
    <div class="side-out">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('pv-logout-form').submit();">↪&nbsp; Log out</a>
        <form id="pv-logout-form" method="POST" action="{{ route('logout') }}" style="display:none">@csrf</form>
    </div>
</aside>

<!-- MAIN -->
<div class="main">
    <header class="topbar">
        <div style="display:flex;align-items:center;gap:14px;min-width:0">
            <button class="burger" onclick="pvOpenSide()" aria-label="Menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div class="pv-topbar-title">
                <div style="font-weight:800;font-size:1.05rem">@yield('page-title', 'Overview')</div>
                <div class="crumb">@yield('breadcrumb', 'Dashboard')</div>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:12px">
            <div class="tsearch">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#5a6685" stroke-width="2"><circle cx="11" cy="11" r="7"/><path stroke-linecap="round" d="M21 21l-4.3-4.3"/></svg>
                <input type="text" placeholder="Search market (BTC, ETH…)" id="pvSearch">
            </div>
            <a href="{{ route('deposit') }}" class="btn btn-sm">+ Deposit</a>
            @include('partials.theme-btn')
            <div class="udrop">
                <button class="udrop-btn" onclick="pvDrop(event)">
                    <div class="udrop-av">{{ substr(Auth::user()->name, 0, 1) }}</div>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="udrop-menu" id="pvDropMenu">
                    <div style="padding:10px 12px;border-bottom:1px solid var(--line);margin-bottom:6px">
                        <div style="font-weight:700;font-size:.88rem">{{ Auth::user()->name }}</div>
                        <div style="font-size:.75rem;color:var(--muted)">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="{{ route('dashboard') }}">📊 Dashboard</a>
                    <a href="{{ route('profile') }}">👤 Profile</a>
                    <a href="{{ route('deposits-history') }}">🕘 Transactions</a>
                    <a href="{{ route('kyc.status') }}">🛡 Verification</a>
                    <div style="border-top:1px solid var(--line);margin:6px 0"></div>
                    <button onclick="document.getElementById('pv-logout-form').submit();">↪ Log out</button>
                </div>
            </div>
        </div>
    </header>

    <main class="content">
        @if (session('success'))
            <script>document.addEventListener('DOMContentLoaded',()=>pvFlash('flash-ok',{!! json_encode(session('success')) !!}))</script>
        @endif
        @if (session('error'))
            <script>document.addEventListener('DOMContentLoaded',()=>pvFlash('flash-err',{!! json_encode(session('error')) !!}))</script>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>document.addEventListener('DOMContentLoaded',()=>pvFlash('flash-err',{!! json_encode($error) !!}))</script>
            @endforeach
        @endif
        @yield('dashboard-content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>
<script>
    function pvOpenSide(){document.getElementById('pvSide').classList.add('open');document.getElementById('pvOverlay').classList.add('show')}
    function pvCloseSide(){document.getElementById('pvSide').classList.remove('open');document.getElementById('pvOverlay').classList.remove('show')}
    function pvDrop(e){e.stopPropagation();document.getElementById('pvDropMenu').classList.toggle('open')}
    document.addEventListener('click',function(e){const m=document.getElementById('pvDropMenu');if(m&&m.classList.contains('open')&&!e.target.closest('.udrop'))m.classList.remove('open')});
    function pvAjax(form,btn){
        const fd=new FormData(form);
        const meta=document.querySelector('meta[name="csrf-token"]');
        const o=btn?btn.textContent:'';if(btn){btn.disabled=true;btn.textContent='Processing…'}
        const done=(ok,msg)=>{if(btn){btn.disabled=false;btn.textContent=o}pvFlash(ok?'flash-ok':'flash-err',msg||(ok?'Done':'Request failed'));if(ok&&form.dataset.reload)setTimeout(()=>location.reload(),900)};
        fetch(form.action,{method:'POST',body:fd,headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json','X-CSRF-TOKEN':meta?meta.content:''}})
        .then(r=>r.text().then(t=>{let d=null;try{d=JSON.parse(t)}catch(e){}return{status:r.status,text:r.statusText,d}}))
        .then(({status,text,d})=>{
            if(!d)return done(false,'Server error ('+status+' '+text+'). Please try again.');
            done(!!d.success,d.message);
        })
        .catch(()=>done(false,'Network error. Please try again.'));
    }
    function pvFlash(kind,msg){
        if(typeof Toastify==='undefined')return;
        Toastify({
            text:String(msg),
            duration:3000,
            gravity:'top',
            position:'right',
            stopOnFocus:true,
            newestOnTop:true,
            className:kind==='flash-ok'?'pv-tv-ok':'pv-tv-err',
            onClick:function(){this.toast.remove()}
        }).showToast();
    }
    // Mounts a TradingView external-embedding widget that follows the app theme.
    function pvThemedWidget(hostId,src,cfg){
        function th(){try{return document.documentElement.getAttribute('data-theme')==='light'?'light':'dark'}catch(e){return 'dark'}}
        function mount(){
            const host=document.getElementById(hostId);if(!host)return;
            host.innerHTML='';
            const wrap=document.createElement('div');wrap.className='tradingview-widget-container';
            const w=document.createElement('div');w.className='tradingview-widget-container__widget';
            wrap.appendChild(w);
            const s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=src;
            const c=Object.assign({},cfg);c.colorTheme=th();s.text=JSON.stringify(c);
            wrap.appendChild(s);
            host.appendChild(wrap);
        }
        mount();
        try{new MutationObserver(mount).observe(document.documentElement,{attributes:true,attributeFilter:['data-theme']})}catch(e){}
    }
    // search filters rows with data-sym
    const q=document.getElementById('pvSearch');
    if(q)q.addEventListener('input',()=>{const v=q.value.toLowerCase();document.querySelectorAll('[data-sym]').forEach(r=>{r.style.display=r.dataset.sym.includes(v)?'':'none'})});
</script>
@yield('scripts')
</body>
</html>