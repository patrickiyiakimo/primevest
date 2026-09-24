<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.theme')
    <title>@yield('title', 'Admin') · PrimeVest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --bg:#05070d; --bg2:#070b14; --panel:#0c1322; --panel2:#111b31;
            --line:rgba(255,255,255,.07); --text:#eef2f9; --muted:#94a1b6;
            --acc:#18d893; --acc2:#00e3a5; --gold:#f0b90b; --red:#ef4444; --side:250px;
        }
        *{box-sizing:border-box}
        html,body{margin:0;padding:0}
        body{background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased;line-height:1.55}
        ::selection{background:rgba(24,216,147,.35)}
        .num{font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums}
        a{color:inherit;text-decoration:none}

        .side{position:fixed;inset:0 auto 0 0;width:var(--side);background:linear-gradient(180deg,#0a0f1c,#070b14);border-right:1px solid var(--line);z-index:80;display:flex;flex-direction:column;transition:transform .3s}
        .side-logo{display:flex;align-items:center;gap:10px;padding:20px 20px 16px;border-bottom:1px solid var(--line)}
        .side-badge{width:34px;height:34px;border-radius:10px;display:grid;place-items:center;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04140d;font-weight:800;box-shadow:0 6px 18px -6px rgba(24,216,147,.6)}
        .side-nav{flex:1;overflow-y:auto;padding:14px 12px 20px}
        .side-nav::-webkit-scrollbar{width:4px}.side-nav::-webkit-scrollbar-thumb{background:#1c2740;border-radius:4px}
        .side-sec{font-size:.66rem;text-transform:uppercase;letter-spacing:.14em;color:#5a6685;font-weight:700;padding:14px 12px 8px}
        .side-item{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:11px;color:var(--muted);font-size:.88rem;font-weight:600;margin-bottom:2px;transition:.18s}
        .side-item svg{width:19px;height:19px;flex-shrink:0;opacity:.8}
        .side-item:hover{background:rgba(255,255,255,.05);color:#fff}
        .side-item.on{background:linear-gradient(90deg,rgba(24,216,147,.14),rgba(24,216,147,.04));color:var(--acc);box-shadow:inset 2px 0 0 var(--acc)}
        .side-sub{padding-left:34px;font-size:.85rem}
        .side-user{margin:14px 12px;padding:14px;border-radius:13px;background:rgba(255,255,255,.035);border:1px solid var(--line);display:flex;gap:11px;align-items:center}
        .side-av{width:40px;height:40px;border-radius:11px;background:linear-gradient(135deg,#fbd56d,var(--gold));display:grid;place-items:center;font-weight:800;color:#241a00;flex-shrink:0}
        .side-out{margin:0 12px 16px}
        .side-out a{display:flex;align-items:center;justify-content:center;gap:8px;padding:11px;border-radius:11px;border:1px solid var(--line);color:var(--muted);font-size:.85rem;font-weight:600;transition:.2s}
        .side-out a:hover{color:#ff7c85;border-color:rgba(239,68,68,.4)}

        .main{margin-left:var(--side);min-height:100vh;display:flex;flex-direction:column}
        .topbar{position:sticky;top:0;z-index:70;display:flex;align-items:center;gap:14px;justify-content:space-between;padding:13px 24px;background:rgba(7,11,20,.82);backdrop-filter:blur(16px);border-bottom:1px solid var(--line)}
        .burger{display:none;background:none;border:0;color:#fff;cursor:pointer}
        .crumb{font-size:.76rem;color:var(--muted)}
        .crumb b{color:#fff;font-size:.82rem}
        .content{flex:1;padding:26px 24px}
        @media(max-width:1000px){
            .side{transform:translateX(-100%)}
            .side.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:block}
            .overlay{position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:75;display:none}
            .overlay.show{display:block}
        }

        /* Shared components (reused across admin pages) */
        .pa{background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:16px}
        .kpi{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        @media(max-width:1100px){.kpi{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:560px){.kpi{grid-template-columns:1fr}}
        .kpi-card{padding:22px;border-radius:16px;border:1px solid var(--line);background:linear-gradient(180deg,var(--panel2),var(--panel))}
        .kpi-card .lbl{font-size:.75rem;color:var(--muted);font-weight:600;letter-spacing:.04em;text-transform:uppercase;margin-bottom:8px}
        .kpi-card .val{font-size:1.5rem;font-weight:800;letter-spacing:-.02em}
        .kpi-card .sub{font-size:.8rem;color:var(--muted);margin-top:6px}
        .btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#2df0a9 0%,#14d594 45%,#0b9d70 100%);color:#03140d;font-weight:700;padding:10px 18px;border-radius:11px;border:0;cursor:pointer;font-size:.88rem;font-family:inherit;transition:.22s;box-shadow:0 10px 26px -12px rgba(24,216,147,.55),inset 0 1px 0 rgba(255,255,255,.28)}
        .btn:hover{transform:translateY(-2px)}
        .btn-ghost{background:rgba(255,255,255,.06);color:var(--text);box-shadow:none;border:1px solid var(--line)}
        .btn-ghost:hover{background:rgba(255,255,255,.1)}
        .btn-red{background:linear-gradient(135deg,#ff7c85,var(--red));box-shadow:0 10px 26px -12px rgba(239,68,68,.5);color:#2a0507}
        .btn-gold{background:linear-gradient(135deg,#ffe39d 0%,#ffd257 45%,#f0b90b 100%);color:#241a00;box-shadow:inset 0 1px 0 rgba(255,255,255,.4)}
        .btn-sm{padding:7px 12px;font-size:.8rem}
        .inp{width:100%;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:11px;padding:11px 13px;color:#fff;font-size:.9rem;outline:none;font-family:inherit;transition:.2s}
        .inp:focus{border-color:rgba(24,216,147,.55);box-shadow:0 0 0 3px rgba(24,216,147,.13)}
        .lbl{display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:7px}
        .tbl{width:100%;border-collapse:collapse;font-size:.86rem}
        .tbl th{text-align:left;color:var(--muted);font-size:.7rem;text-transform:uppercase;letter-spacing:.07em;padding:12px 14px;border-bottom:1px solid var(--line);background:rgba(255,255,255,.02);white-space:nowrap}
        .tbl td{padding:13px 14px;border-bottom:1px solid rgba(255,255,255,.045);vertical-align:middle}
        .tbl tbody tr:hover td{background:rgba(255,255,255,.025)}
        .pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:999px;font-size:.74rem;font-weight:700}
        .pill-g{background:rgba(24,216,147,.13);color:var(--acc)}
        .pill-r{background:rgba(239,68,68,.13);color:#ff7c85}
        .pill-y{background:rgba(240,185,11,.12);color:var(--gold)}
        .pill-b{background:rgba(14,165,233,.12);color:#4cc3ff}
        .sec-h{display:flex;align-items:center;justify-content:space-between;gap:14px;margin:0 0 18px;flex-wrap:wrap}
        .sec-h h2{margin:0;font-size:1.15rem;font-weight:800}
        .sec-h p{margin:2px 0 0;color:var(--muted);font-size:.82rem}
        .muted{color:var(--muted)}
        .ok{color:var(--acc)}.bad{color:#ff7c85}.gold{color:var(--gold)}
        .mt{margin-top:20px}.mb{margin-bottom:20px}
        .flash{display:none}
        .flash.show{display:flex;align-items:flex-start;gap:10px;padding:13px 16px;border-radius:12px;margin-bottom:18px;font-size:.88rem;animation:in .3s}
        @keyframes in{from{opacity:0;transform:translateY(-6px)}to{opacity:1;transform:none}}
        .flash-ok{background:rgba(24,216,147,.1);border:1px solid rgba(24,216,147,.32);color:var(--acc)}
        .flash-err{background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.32);color:#ff7c85}
        .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:20px}
        @media(max-width:900px){.grid-2{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="overlay" id="pvOverlay" onclick="pvCloseSide()"></div>

<aside class="side" id="pvSide">
    <div class="side-logo">
        <a href="{{ route('admin.dashboard') }}" style="display:flex;align-items:center;gap:10px">
            <span class="side-badge">P</span>
            <span style="font-weight:800;font-size:1.1rem">Prime<span style="color:var(--gold)">Vest</span><span class="pill pill-y" style="margin-left:6px">ADMIN</span></span>
        </a>
    </div>
    <nav class="side-nav">
        <div class="side-sec">Overview</div>
        <a href="{{ route('admin.dashboard') }}" class="side-item {{ request()->routeIs('admin.dashboard') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Dashboard
        </a>
        <a href="{{ route('admin.users') }}" class="side-item {{ request()->routeIs('admin.users*') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm1-2a4 4 0 114-4"/></svg>
            Users
        </a>

        <div class="side-sec">Money</div>
        <a href="{{ route('admin.deposits') }}" class="side-item {{ request()->routeIs('admin.deposits') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M12 4v16m8-8H4"/></svg>
            Deposits
        </a>
        <a href="{{ route('admin.withdrawals') }}" class="side-item {{ request()->routeIs('admin.withdrawals') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M20 12H4"/></svg>
            Withdrawals
        </a>
        <a href="{{ route('admin.investments') }}" class="side-item {{ request()->routeIs('admin.investments') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            Investments
        </a>
        <a href="{{ route('admin.card-applications') }}" class="side-item {{ request()->routeIs('admin.card-applications') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            Card Applications
        </a>

        <div class="side-sec">Compliance</div>
        <a href="{{ route('admin.kyc.index') }}" class="side-item {{ request()->routeIs('admin.kyc.*') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.6-2.6A11.95 11.95 0 0112 21 11.95 11.95 0 012.4 15.4 11.95 11.95 0 0112 3a11.95 11.95 0 019.6 6.4z"/></svg>
            KYC Submissions
        </a>

        <div class="side-sec">Markets</div>
        <a href="{{ route('admin.stock.prices') }}" class="side-item {{ request()->routeIs('admin.stock.prices') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            Stock Prices
        </a>
        <a href="{{ route('admin.stock.portfolio') }}" class="side-item side-sub">User Portfolios</a>
        <a href="{{ route('admin.stock.transactions') }}" class="side-item side-sub">Stock Transactions</a>

        <div class="side-sec">Copy Trading</div>
        <a href="{{ route('admin.copy-traders.index') }}" class="side-item {{ request()->routeIs('admin.copy-traders.*') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm1-2a4 4 0 114-4"/></svg>
            Copy Traders
        </a>
        <a href="{{ route('admin.admin.copy-trading-requests') }}" class="side-item {{ request()->routeIs('admin.admin.copy-trading-requests') ? 'on' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Copy Requests
        </a>
    </nav>

    <div class="side-user">
        <div class="side-av">{{ substr(Auth::user()->name, 0, 1) }}</div>
        <div style="min-width:0">
            <div style="font-weight:700;font-size:.88rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ Auth::user()->name }}</div>
            <div style="font-size:.72rem;color:var(--gold)">Administrator</div>
        </div>
    </div>
    <div class="side-out">
        <a href="{{ route('dashboard') }}">👁 View Dashboard</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('pv-logout-form').submit();" style="margin-top:8px">↪&nbsp; Log out</a>
        <form id="pv-logout-form" method="POST" action="{{ route('logout') }}" style="display:none">@csrf</form>
    </div>
</aside>

<div class="main">
    <header class="topbar">
        <div style="display:flex;align-items:center;gap:14px">
            <button class="burger" onclick="pvOpenSide()" aria-label="Menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <div>
                <div style="font-weight:800;font-size:1.05rem">@yield('page-title', 'Admin Overview')</div>
                <div class="crumb">@yield('breadcrumb', 'Administration')</div>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:10px;font-size:.82rem" class="muted">
            @include('partials.theme-btn')
            <a href="{{ url('/') }}" class="btn btn-ghost btn-sm">← Back to site</a>
        </div>
    </header>

    <main class="content">
        @if (session('success'))
            <div class="flash show flash-ok">✔ {{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="flash show flash-err">✖ {{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="flash show flash-err">
                @foreach ($errors->all() as $error)<div>✖ {{ $error }}</div>@endforeach
            </div>
        @endif
        @yield('admin-content')
    </main>
</div>

<script>
    function pvOpenSide(){document.getElementById('pvSide').classList.add('open');document.getElementById('pvOverlay').classList.add('show')}
    function pvCloseSide(){document.getElementById('pvSide').classList.remove('open');document.getElementById('pvOverlay').classList.remove('show')}
    function pvConfirm(fid,msg){if(confirm(msg||'Are you sure?')){document.getElementById(fid).submit()}}
</script>
@stack('scripts')
</body>
</html>