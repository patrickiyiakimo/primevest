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
        .auth-bg{position:fixed;inset:0;z-index:0;background:
            radial-gradient(560px 360px at 12% 0%,rgba(47,123,255,.13),transparent 60%),
            radial-gradient(620px 420px at 95% 15%,rgba(14,165,233,.12),transparent 60%),
            linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),
            linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);
            background-size:auto,auto,46px 46px,46px 46px}
        .auth-wrap{position:relative;z-index:1;display:flex;flex-direction:column;flex:1;align-items:center;justify-content:center;padding:32px 18px}
        .pv-logo{display:flex;align-items:center;gap:10px;font-weight:800;font-size:1.25rem;margin-bottom:26px}
        .pv-logo-badge{width:38px;height:38px;border-radius:11px;display:grid;place-items:center;background:linear-gradient(135deg,var(--acc2),var(--acc));color:#04121f;font-weight:800;font-size:1.15rem;box-shadow:0 8px 22px -8px rgba(47,123,255,.7),inset 0 1px 0 rgba(255,255,255,.3)}
        .pv-card{width:100%;max-width:440px;background:linear-gradient(180deg,var(--panel2),var(--panel));border:1px solid var(--line);border-radius:20px;padding:34px;box-shadow:0 40px 80px -40px rgba(0,0,0,.8)}
        ::selection{background:rgba(47,123,255,.35)}
        .pv-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#57c8ff 0%,#2f7bff 45%,#1456d1 100%);color:#03140d;font-weight:700;padding:13px 22px;border-radius:12px;border:0;cursor:pointer;font-size:.95rem;transition:.25s;box-shadow:0 10px 30px -12px rgba(47,123,255,.6),inset 0 1px 0 rgba(255,255,255,.28)}
        .pv-btn:hover{transform:translateY(-2px)}
        .pv-btn-block{width:100%;margin-top:6px}
        .pv-btn-ghost{background:rgba(255,255,255,.06);color:var(--text);box-shadow:none;border:1px solid var(--line)}
        .pv-input{width:100%;background:rgba(255,255,255,.05);border:1px solid var(--line);border-radius:12px;padding:13px 15px;color:#fff;font-size:.95rem;outline:none;transition:.2s;font-family:inherit}
        .pv-input:focus{border-color:rgba(47,123,255,.55);box-shadow:0 0 0 3px rgba(47,123,255,.14)}
        .pv-label{display:block;font-size:.83rem;font-weight:600;color:var(--muted);margin:0 0 7px}
        .pv-err{color:#ff8089;font-size:.85rem;margin-top:6px}
        .pv-mut{color:var(--muted);font-size:.92rem}
        .pv-link{color:var(--acc);font-weight:600}
        .pv-ticker{position:relative;z-index:1;height:40px;display:flex;align-items:center;justify-content:center}
        .pv-foot{position:relative;z-index:1;text-align:center;color:var(--muted);font-size:.82rem;padding:22px}
    </style>
</head>
<body>
    <div class="auth-bg"></div>
    <div class="pv-ticker">
        <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;gap:8px;color:var(--muted);font-size:.85rem">
            <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest" style="width:auto;height:24px;display:block;border-radius:6px">
            Back to <span class="pv-link">PrimeVest</span>
        </a>
        @include('partials.theme-btn')
    </div>
    <div class="auth-wrap">
        <a href="{{ url('/') }}" class="pv-logo">
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
        <p class="pv-foot">Protected by 256-bit encryption · 2-Factor Auth available<br>&copy; {{ date('Y') }} PrimeVest. All rights reserved.</p>
    </div>
</body>
</html>