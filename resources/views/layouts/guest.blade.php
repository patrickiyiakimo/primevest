<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @include('partials.theme')
    <title>@yield('title', 'PrimeVest')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --bg:#05070d; --bg2:#070b14; --panel:#0c1322; --panel2:#111b31;
            --line:rgba(255,255,255,.07); --text:#eef2f9; --muted:#94a1b6;
            --acc:#2f7bff; --acc2:#00b4ff; --gold:#f0b90b; --red:#ef4444; --rad:16px;
        }
        *{box-sizing:border-box}
        body{margin:0;min-height:100vh;display:flex;flex-direction:column;background:var(--bg);color:var(--text);font-family:'Plus Jakarta Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased}
        .auth-topbar{position:fixed;top:0;left:0;right:0;z-index:20;height:58px;display:flex;align-items:center;justify-content:space-between;padding:0 26px}
        .auth-back{display:inline-flex;align-items:center;gap:10px;color:rgba(220,230,245,.75);font-size:.88rem;font-weight:600;text-decoration:none;transition:.2s}
        .auth-back img{height:22px;width:auto;border-radius:6px;display:block}
        .auth-back:hover{color:#fff}
        .auth-shell{display:flex;min-height:100vh}
        .auth-left{display:flex;flex:1 1 50%;flex-direction:column;justify-content:space-between;gap:40px;padding:88px 60px 52px;position:relative;overflow:hidden;color:#dce6f5;background:
            radial-gradient(700px 480px at 12% 0%,rgba(47,123,255,.26),transparent 55%),
            radial-gradient(620px 440px at 100% 100%,rgba(0,180,255,.17),transparent 55%),
            linear-gradient(160deg,#060b18 0%,#0a1733 46%,#0d2650 100%)}
        .auth-left::after{content:"";position:absolute;inset:0;background:
            linear-gradient(rgba(255,255,255,.035) 1px,transparent 1px),
            linear-gradient(90deg,rgba(255,255,255,.035) 1px,transparent 1px);
            background-size:44px 44px;pointer-events:none}
        .auth-left>*{position:relative;z-index:1}
        .auth-brand{display:flex;align-items:center;gap:13px;font-weight:800;font-size:1.35rem;color:#fff;letter-spacing:-.01em}
        .auth-brand img{height:36px;width:auto;border-radius:8px;display:block}
        .auth-mid{display:grid;gap:36px}
        .auth-hero h1{margin:0 0 14px;font-size:2.05rem;line-height:1.2;letter-spacing:-.02em;color:#fff;max-width:440px}
        .auth-hero p{margin:0;font-size:.98rem;line-height:1.65;color:rgba(220,230,245,.72);max-width:430px}
        .auth-feats{list-style:none;margin:0;padding:0;display:grid;gap:15px}
        .auth-feats li{display:flex;align-items:center;gap:12px;font-size:.95rem;color:#dce6f5}
        .auth-feats .ico{display:grid;place-items:center;width:30px;height:30px;border-radius:9px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1);flex-shrink:0;font-size:.85rem}
        .auth-stats{display:flex;gap:36px}
        .auth-stats div{display:flex;flex-direction:column;gap:3px}
        .auth-stats b{font-size:1.4rem;color:#fff;font-weight:800;letter-spacing:-.01em}
        .auth-stats span{font-size:.72rem;color:rgba(220,230,245,.62);text-transform:uppercase;letter-spacing:.12em}
        .auth-right{flex:1 1 50%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:26px;padding:86px 18px 40px;background:var(--bg)}
        ::selection{background:#2375ff;color:#fff}
        .pv-container{width:100%;max-width:440px}
        .pv-logo{display:flex;align-items:center;justify-content:center;gap:10px;font-weight:800;font-size:1.25rem}
        .pv-logo-badge{width:38px;height:38px;border-radius:11px;display:grid;place-items:center;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04121f;font-weight:800;font-size:1.15rem;box-shadow:0 8px 22px -8px rgba(47,123,255,.7),inset 0 1px 0 rgba(255,255,255,.3)}
        .pv-card{width:100%;max-width:440px;background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:20px;padding:34px;box-shadow:0 40px 80px -40px rgba(0,0,0,.8)}
        .pv-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#57c8ff 0%,#2f7bff 45%,#1456d1 100%);color:#03140d;font-weight:700;padding:13px 22px;border-radius:12px;border:0;cursor:pointer;font-size:.95rem;transition:.25s;box-shadow:0 10px 30px -12px rgba(47,123,255,.6),inset 0 1px 0 rgba(255,255,255,.28)}
        .pv-btn:hover{transform:translateY(-2px)}
        .pv-btn-block{width:100%;margin-top:6px}
        .pv-btn-ghost{background:rgba(255,255,255,.06);color:var(--text);box-shadow:none;border:1px solid var(--line)}
        .pv-input{width:100%;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:12px;padding:13px 15px;color:var(--text);font-size:.95rem;outline:none;transition:.2s;font-family:inherit}
        .pv-input::placeholder{color:var(--muted);opacity:.7}
        .pv-input:focus{border-color:rgba(47,123,255,.55);box-shadow:0 0 0 3px rgba(47,123,255,.14)}
        .pv-label{display:block;font-size:.83rem;font-weight:600;color:var(--muted);margin:0 0 7px}
        .pv-err{color:#ff8089;font-size:.85rem;margin-top:6px}
        .pv-mut{color:var(--muted);font-size:.92rem}
        .pv-link{color:var(--acc);font-weight:600}
        .pv-foot{text-align:center;color:var(--muted);font-size:.82rem}
        [data-theme="light"] .pv-card{box-shadow:0 24px 60px -30px rgba(10,24,52,.22)}
        [data-theme="light"] .pv-input{background:rgba(10,24,52,.05)}
        [data-theme="light"] .pv-input:focus{background:#fff}
        @media(max-width:899px){
            .auth-shell{flex-direction:column}
            .auth-left{flex:0 0 auto;padding:72px 24px 26px;gap:18px}
            .auth-mid{gap:16px}
            .auth-hero h1{max-width:none}
            .auth-hero p,.auth-feats,.auth-stats{display:none}
            .auth-right{padding:34px 18px 40px}
        }
    </style>
</head>
<body>
    <div class="auth-topbar">
        <a href="{{ url('/') }}" class="auth-back">
            <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest">
            <span>Back to PrimeVest</span>
        </a>
        @include('partials.theme-btn')
    </div>

    <div class="auth-shell">
        <aside class="auth-left">
            <div class="auth-brand">
                <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest">
                <span>PrimeVest</span>
            </div>
            <div class="auth-mid">
                <div class="auth-hero">
                    <h1>Trade, stake &amp; grow your crypto wealth.</h1>
                    <p>PrimeVest is your all-in-one secure platform to buy crypto, stake for passive income and track every market in real time.</p>
                </div>
                <ul class="auth-feats">
                    <li><span class="ico">⚡</span> Instant deposits &amp; withdrawals</li>
                    <li><span class="ico">🔥</span> Stake crypto up to 9% APY</li>
                    <li><span class="ico">🛡️</span> Bank-grade 256-bit encryption</li>
                    <li><span class="ico">📈</span> Live markets &amp; smart signals</li>
                </ul>
            </div>
            <div class="auth-stats">
                <div><b class="num">$2.4B+</b><span>Traded</span></div>
                <div><b class="num">120K+</b><span>Investors</span></div>
                <div><b class="num">9%</b><span>Max APY</span></div>
            </div>
        </aside>

        <main class="auth-right">
            <div class="pv-container">
                <a href="{{ url('/') }}" class="pv-logo" style="text-decoration:none;color:inherit;margin-bottom:24px">
                    <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="width:auto;height:44px;display:block">
                </a>
                <div class="pv-card">
                    @if (session('status'))
                        <div style="background:rgba(47,123,255,.1);border:1px solid rgba(47,123,255,.3);color:var(--acc);padding:12px 14px;border-radius:10px;font-size:.88rem;margin-bottom:18px">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
                        <div style="background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.3);color:#ff8089;padding:12px 14px;border-radius:10px;font-size:.88rem;margin-bottom:18px">
                            @foreach ($errors->all() as $error)<div>- {{ $error }}</div>@endforeach
                        </div>
                    @endif
                    @yield('content')
                </div>
                <p class="pv-foot" style="margin-top:24px">Protected by 256-bit encryption · 2-Factor Auth available<br>&copy; 2023 PrimeVest. All rights reserved.</p>
            </div>
        </main>
    </div>
</body>
</html>