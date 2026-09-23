<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PrimeVest | Trade & Invest in Crypto')</title>
    <meta name="description" content="PrimeVest — a trusted crypto investment platform. Trade, stake and grow your digital assets with confidence, copy elite traders and track the markets in real time.">
    <meta name="theme-color" content="#05070d">
    <meta property="og:title" content="PrimeVest | Trade & Invest in Crypto">
    <meta property="og:description" content="A trusted crypto investment platform. Trade, stake and grow your digital assets with confidence.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --bg:#05070d; --bg2:#070b14; --panel:#0c1322; --panel2:#111b31;
            --line:rgba(255,255,255,.07); --text:#eef2f9; --muted:#94a1b6;
            --acc:#18d893; --acc2:#00e3a5; --gold:#f0b90b; --red:#ef4444;
            --rad:16px;
        }
        *{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{margin:0;background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased;line-height:1.6}
        img{max-width:100%}
        a{color:inherit;text-decoration:none}
        .mono{font-family:'JetBrains Mono',monospace}
        .num{font-family:'JetBrains Mono',monospace;font-variant-numeric:tabular-nums}
        .pv-container{max-width:1180px;margin-inline:auto;padding-inline:22px}
        .pv-panel{background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:var(--rad)}
        .pv-panel-soft{background:rgba(255,255,255,.03);border:1px solid var(--line);border-radius:var(--rad)}
        .pv-acc{color:var(--acc)}
        .pv-mut{color:var(--muted)}
        .pv-gold{color:var(--gold)}
        .pv-h{background:linear-gradient(90deg,#fff,#8c9bb5);-webkit-background-clip:text;background-clip:text;color:transparent}
        /* Buttons */
        .pv-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#2df0a9 0%,#14d594 45%,#0b9d70 100%);color:#03140d;font-weight:700;padding:12px 22px;border-radius:12px;border:0;cursor:pointer;font-size:.95rem;transition:.25s;box-shadow:0 10px 30px -12px rgba(24,216,147,.6),inset 0 1px 0 rgba(255,255,255,.28)}
        .pv-btn:hover{transform:translateY(-2px);box-shadow:0 16px 36px -12px rgba(24,216,147,.75),inset 0 1px 0 rgba(255,255,255,.3)}
        .pv-btn-gold{background:linear-gradient(135deg,#ffe39d 0%,#ffd257 45%,#f0b90b 100%);color:#241a00;box-shadow:0 10px 30px -12px rgba(240,185,11,.55),inset 0 1px 0 rgba(255,255,255,.4)}
        .pv-btn-ghost{background:rgba(255,255,255,.06);color:var(--text);box-shadow:none;border:1px solid var(--line)}
        .pv-btn-ghost:hover{background:rgba(255,255,255,.1);box-shadow:none}
        .pv-btn-sm{padding:9px 16px;font-size:.85rem;border-radius:10px}
        .pv-btn-lg{padding:15px 30px;font-size:1.05rem}
        .pv-btn-block{width:100%}
        /* Badges & chips */
        .pv-chip{display:inline-flex;align-items:center;gap:6px;padding:5px 12px;border-radius:999px;background:rgba(24,216,147,.12);color:var(--acc);font-size:.78rem;font-weight:600;border:1px solid rgba(24,216,147,.25)}
        .pv-chip-red{background:rgba(239,68,68,.1);color:#ff7c85;border:1px solid rgba(239,68,68,.25)}
        .pv-chip-gold{background:rgba(240,185,11,.1);color:var(--gold);border:1px solid rgba(240,185,11,.25)}
        .pv-chip-blue{background:rgba(14,165,233,.1);color:#41b8ff;border:1px solid rgba(14,165,233,.25)}
        .pill{display:inline-flex;align-items:center;gap:6px;padding:4px 10px;border-radius:999px;font-size:.78rem;font-weight:700;white-space:nowrap}
        .pill-up{background:rgba(24,216,147,.12);color:var(--acc);border:1px solid rgba(24,216,147,.3)}
        .pill-down{background:rgba(239,68,68,.1);color:#ff7c85;border:1px solid rgba(239,68,68,.3)}
        .step-num{width:52px;height:52px;border-radius:14px;background:linear-gradient(135deg,#2df0a9,#0b9d70);border:0;display:grid;place-items:center;font-weight:800;font-size:1.2rem;color:#03140d;box-shadow:0 8px 20px -8px rgba(24,216,147,.5),inset 0 1px 0 rgba(255,255,255,.3)}
        .step-box{padding:26px;border-radius:16px;background:rgba(255,255,255,.03);border:1px solid var(--line)}
        /* Headings */
        .pv-h1{font-size:clamp(2.1rem,4.6vw,3.6rem);font-weight:800;line-height:1.12;letter-spacing:-.02em;margin:0}
        .pv-h2{font-size:clamp(1.6rem,3vw,2.4rem);font-weight:800;line-height:1.15;letter-spacing:-.02em;margin:0 0 8px}
        .pv-lead{color:var(--muted);font-size:1.08rem;max-width:600px;margin:14px 0 0}
        .pv-section{padding:88px 0}
        /* Nav */
        .pv-nav{position:sticky;top:0;z-index:60;backdrop-filter:blur(18px);background:rgba(5,7,13,.72);border-bottom:1px solid var(--line)}
        .pv-nav-inner{display:flex;align-items:center;justify-content:space-between;height:70px}
        .pv-logo{display:flex;align-items:center;gap:10px;font-weight:800;font-size:1.2rem}
        .pv-logo-badge{width:34px;height:34px;border-radius:10px;display:grid;place-items:center;background:linear-gradient(135deg,#2df0a9,#0b9d70);color:#03140d;font-weight:800;font-size:1.05rem;box-shadow:0 6px 18px -6px rgba(24,216,147,.6),inset 0 1px 0 rgba(255,255,255,.3)}
        .pv-nav-links{display:flex;align-items:center;gap:26px;font-size:.92rem;font-weight:600}
        .pv-nav-links a{color:var(--muted);transition:.2s}
        .pv-nav-links a:hover,.pv-nav-links a.active{color:#fff}
        .pv-burger{display:none;background:none;border:0;color:#fff;cursor:pointer}
        @media(max-width:920px){.pv-nav-links{display:none;position:absolute;top:70px;left:0;right:0;background:#070b14;flex-direction:column;padding:20px;gap:16px;border-bottom:1px solid var(--line)}.pv-nav-links.open{display:flex}.pv-burger{display:block}}
        /* Hero */
        .pv-hero{position:relative;overflow:hidden;padding:110px 0 90px}
        .pv-hero::before{content:"";position:absolute;inset:0;background:
            radial-gradient(600px 380px at 18% 8%,rgba(24,216,147,.16),transparent 60%),
            radial-gradient(700px 420px at 85% 0%,rgba(14,165,233,.14),transparent 60%),
            radial-gradient(500px 320px at 60% 100%,rgba(240,185,11,.07),transparent 60%),
            linear-gradient(rgba(255,255,255,.025) 1px,transparent 1px),
            linear-gradient(90deg,rgba(255,255,255,.025) 1px,transparent 1px);
            background-size:auto,auto,auto,52px 52px,52px 52px;pointer-events:none}
        .pv-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        @media(max-width:900px){.pv-stats{grid-template-columns:repeat(2,1fr)}}
        .pv-stat{padding:22px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--line)}
        .pv-stat b{font-size:1.5rem;font-weight:800;display:block}
        .pv-stat span{color:var(--muted);font-size:.82rem}
        /* Grid helpers */
        .pv-grid{display:grid;gap:22px}
        .pv-grid-2{grid-template-columns:1fr 1fr}
        .pv-grid-3{grid-template-columns:repeat(3,1fr)}
        .pv-grid-4{grid-template-columns:repeat(4,1fr)}
        @media(max-width:900px){.pv-grid-2,.pv-grid-3,.pv-grid-4{grid-template-columns:1fr}.pv-grid-3.cards,.pv-grid-4.cards{grid-template-columns:1fr 1fr}}
        /* Tables */
        .pv-table{width:100%;border-collapse:collapse;font-size:.9rem}
        .pv-table th{text-align:left;color:var(--muted);font-size:.76rem;text-transform:uppercase;letter-spacing:.06em;padding:12px 16px;border-bottom:1px solid var(--line);background:rgba(255,255,255,.02)}
        .pv-table td{padding:14px 16px;border-bottom:1px solid rgba(255,255,255,.045)}
        .pv-table tr:hover td{background:rgba(255,255,255,.025)}
        /* Form controls */
        .pv-input{width:100%;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:12px;padding:13px 15px;color:#fff;font-size:.95rem;outline:none;transition:.2s;font-family:inherit}
        .pv-input:focus{border-color:rgba(24,216,147,.55);box-shadow:0 0 0 3px rgba(24,216,147,.14)}
        .pv-label{display:block;font-size:.83rem;font-weight:600;color:var(--muted);margin-bottom:7px}
        .pv-select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' fill='none' stroke='%2394a1b6' viewBox='0 0 24 24'%3E%3Cpath stroke-linecap='round' d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;padding-right:38px}
        /* Misc */
        .pv-divider{height:1px;background:var(--line);border:0}
        .pv-tag{font-size:.72rem;letter-spacing:.12em;text-transform:uppercase;color:var(--acc);font-weight:700;margin:0 0 12px}
        .pv-foot{color:var(--muted);font-size:.82rem}
        .ticker{position:relative;z-index:1}
        ::selection{background:rgba(24,216,147,.35)}
        .pv-card{transition:.3s}
        .pv-card:hover{transform:translateY(-4px);border-color:rgba(24,216,147,.35);box-shadow:0 24px 48px -24px rgba(0,0,0,.6)}
        .pv-icon{width:46px;height:46px;border-radius:12px;display:grid;place-items:center;background:rgba(24,216,147,.12);color:var(--acc);font-size:1.25rem}
    </style>
    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script>
        function pvBurger(){document.querySelector('.pv-nav-links').classList.toggle('open')}
    </script>
    @stack('scripts')
</body>
</html>