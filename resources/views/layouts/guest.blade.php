<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta name="theme-color" content="#230b59">
    @include('partials.theme')
    <title>@yield('title', 'PrimeVest')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,300;0,400;1,300;1,400&display=swap" rel="stylesheet">
    <style>
        /* ============================================================
           PrimeVest auth pages — Wealthfront palette.
           Mirrors resources/css/landing.css tokens so the login /
           signup screens read as the same product as the landing page:
           eggplant → blurple gradient brand panel, ghost page surface,
           white card, blurple primary button, lavender/blurple ghosts.
           ============================================================ */
        :root{
            --eggplant:#230b59; --eggplant-deep:#190742; --plum:#301066;
            --blurple:#4b18bf; --blurple-lift:#6a2ee0;
            --pebble:#f0f0f2; --ghost:#f7f7f8; --surface:#ffffff;
            --boulder:#d2d2d6; --quartz:#6b6b76; --lavender:#d5cff0;
            --light-neptune:#e9ecfc;
            --divider:#e4e4e8;
            --content-primary:#16161a; --content-secondary:#5c5c66;
            --danger:#b3261e; --danger-bg:#fdf2f1; --danger-line:#f5cfcb;

            /* theme-driven surface + text roles (defaults = Wealthfront light) */
            --card:#ffffff;
            --card-border:#e4e4e8;
            --accent:#4b18bf;
            --accent-hover:#6a2ee0;

            /* semantic aliases consumed by the shared .pv-* components */
            --bg:#f7f7f8; --line:#e4e4e8;
            --text:#16161a; --muted:#5c5c66;
            --acc:#4b18bf; --acc2:#6a2ee0; --gold:#f0b90b; --red:#b3261e;
            --r-md:6px; --r-lg:10px; --r-2xl:18px;
            --brand-gradient:linear-gradient(90deg,#230b59 20%,#4b18bf 120%);
        }

        /* partials/theme.blade.php hooks the same :root[data-theme="light"] name
           with a navy palette. These blocks come later in source order, so at
           equal specificity they win and keep the auth screens on Wealthfront's
           eggplants/blurples in BOTH themes. */
        :root[data-theme="light"]{
            --bg:#f7f7f8; --line:#e4e4e8;
            --text:#16161a; --muted:#5c5c66;
            --acc:#4b18bf; --acc2:#6a2ee0; --gold:#f0b90b; --red:#b3261e;
            --card:#ffffff; --card-border:#e4e4e8;
            --accent:#4b18bf; --accent-hover:#6a2ee0;
            --surface:#ffffff; --divider:#e4e4e8;
            --content-primary:#16161a; --content-secondary:#5c5c66;
            --danger:#b3261e; --danger-bg:#fdf2f1; --danger-line:#f5cfcb;
        }

        :root[data-theme="dark"]{
            --bg:#10062a; --line:rgba(240,240,242,.18);
            --text:#f0f0f2; --muted:#a9a3bd;
            --acc:#a98bff; --acc2:#6a2ee0; --gold:#f0b90b; --red:#ff8a80;
            --card:#1c0e42; --card-border:rgba(240,240,242,.18);
            --accent:#a98bff; --accent-hover:#8f6dff;
            --surface:#1c0e42; --divider:rgba(240,240,242,.18);
            --content-primary:#f0f0f2; --content-secondary:#a9a3bd;
            --danger:#ff8a80; --danger-bg:#2b1220; --danger-line:#5a2440;
        }

        *{box-sizing:border-box}
        body{
            margin:0;min-height:100vh;display:flex;flex-direction:column;
            background:var(--bg);color:var(--text);
            font-family:'Plus Jakarta Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased;
        }

        /* ---------- top bar ----------
           The bar is fixed and spans the viewport, so its left half renders over
           the dark brand gradient and its right half over the light form panel.
           Each control therefore has to be styled for the side it sits on —
           a single "page background" colour left the back link and the theme
           toggle dark-on-dark. */
        .auth-topbar{
            position:fixed;top:0;left:0;right:0;z-index:20;height:60px;
            display:flex;align-items:center;justify-content:space-between;padding:0 26px;
        }
        .auth-back{
            display:inline-flex;align-items:center;gap:10px;
            color:rgba(240,240,242,.8);font-size:.9rem;font-weight:600;
            text-decoration:none;transition:.2s;
        }
        .auth-back img{height:22px;width:auto;display:block}
        .auth-back:hover{color:#fff}
        /* The mark ships electric-blue on transparent; knock it to solid white
           for the dark gradient, exactly like the landing header wordmark. */
        .auth-back img,
        .auth-brand img{filter:brightness(0) invert(1)}

        /* ---------- split shell ---------- */
        .auth-shell{display:flex;min-height:100vh}

        /* brand panel — the same continuous gradient as the landing header.
           `align-self:flex-start` + a viewport height + `position:sticky` stop
           the panel stretching to match the form. The signup card is far taller
           than the login card, so with the default `align-items:stretch` and
           `justify-content:space-between` the three blocks (brand / hero /
           stats) were smeared over a huge empty column — the "massive spacing".
           Now it is exactly one viewport tall and sticks while the form
           scrolls. */
        .auth-left{
            display:flex;flex:1 1 50%;flex-direction:column;justify-content:center;gap:28px;
            padding:88px 56px 48px;position:sticky;top:0;align-self:flex-start;
            height:100vh;height:100svh;overflow:hidden;
            color:var(--pebble);background:var(--brand-gradient);
        }
        .auth-circles{
            position:absolute;width:2024px;height:850px;min-width:2024px;
            bottom:-220px;right:-900px;pointer-events:none;
        }
        .auth-left::after{
            content:"";position:absolute;inset:0;pointer-events:none;
            background:linear-gradient(rgba(240,240,242,.03) 1px,transparent 1px),
                       linear-gradient(90deg,rgba(240,240,242,.03) 1px,transparent 1px);
            background-size:44px 44px;
        }
        /* Lift the real content above the circles + grid overlay.
           `.auth-circles` is excluded: it must stay `position:absolute`, and
           this rule used to override it to `position:relative`, putting the
           850px decorative image into the flex flow and inflating the panel
           (which is what produced the huge left-hand gap on signup). */
        .auth-left>:not(.auth-circles){position:relative;z-index:1}
        .auth-circles{z-index:0}
        .auth-brand{display:flex;align-items:center;gap:12px;font-weight:800;font-size:1.3rem;color:#fff;letter-spacing:-.02em}
        .auth-brand img{height:34px;width:auto;display:block}

        .auth-mid{display:grid;gap:36px}
        .auth-hero h1{
            margin:0 0 14px;font-size:2.05rem;line-height:1.18;letter-spacing:-.025em;
            color:#fff;max-width:440px;font-weight:700;
        }
        .auth-hero h1 em{
            font-family:'Playfair Display',Georgia,serif;font-style:italic;font-weight:300;
            letter-spacing:-.03em;
        }
        .auth-hero p{
            margin:0;font-size:1rem;line-height:1.6;color:rgba(240,240,242,.78);max-width:430px;
        }

        .auth-feats{list-style:none;margin:0;padding:0;display:grid;gap:15px}
        .auth-feats li{display:flex;align-items:center;gap:12px;font-size:.95rem;color:rgba(240,240,242,.9)}
        .auth-feats .ico{
            display:grid;place-items:center;width:32px;height:32px;border-radius:9px;flex-shrink:0;
            background:rgba(240,240,242,.14);border:1px solid rgba(240,240,242,.2);
        }
        .auth-feats .ico svg{width:16px;height:16px}

        .auth-stats{display:flex;gap:40px}
        .auth-stats div{display:flex;flex-direction:column;gap:3px}
        .auth-stats b{font-size:1.45rem;color:#fff;font-weight:700;letter-spacing:-.02em}
        .auth-stats span{
            font-size:.7rem;color:rgba(240,240,242,.62);
            text-transform:uppercase;letter-spacing:.13em;
        }

        /* form side */
        .auth-right{
            flex:1 1 50%;display:flex;flex-direction:column;align-items:center;justify-content:center;
            gap:26px;padding:88px 18px 40px;background:var(--bg);
        }

        ::selection{background:var(--blurple);color:#fff}

        .pv-container{width:100%;max-width:420px}
        .pv-logo{display:flex;align-items:center;justify-content:center;gap:10px;font-weight:800;font-size:1.25rem}
        .pv-logo img{height:44px;width:auto;display:block}

        .pv-card{
            width:100%;max-width:420px;background:var(--card);
            border:1px solid var(--card-border);border-radius:var(--r-2xl);
            padding:34px;box-shadow:0 34px 70px -44px rgba(35,11,89,.42);
        }
        [data-theme="dark"] .pv-card{box-shadow:0 34px 70px -40px rgba(0,0,0,.7)}
        .pv-title{
            margin:0 0 6px;font-size:1.5rem;font-weight:700;letter-spacing:-.025em;
            color:var(--text);
        }
        .pv-sub{margin:0 0 24px}

        /* ---------- buttons: same shapes as the landing page ---------- */
        .wf-btn{
            display:inline-flex;align-items:center;justify-content:center;gap:8px;
            border-radius:var(--r-md);font-weight:500;font-size:1rem;line-height:1.5;
            padding:12px 20px;white-space:nowrap;cursor:pointer;
            text-decoration:none;border:1px solid transparent;
            transition:background-color .22s ease,border-color .22s ease,color .22s ease,transform .22s ease;
        }
        .wf-btn-primary{background:var(--blurple);color:#fff}
        .wf-btn-primary:hover{background:var(--blurple-lift)}
        .wf-btn-ghost-light{border-color:var(--blurple);color:var(--blurple)}
        .wf-btn-ghost-light:hover{background:rgba(75,24,191,.07)}
        .wf-btn-ghost-dark{border-color:var(--lavender);color:var(--lavender)}
        .wf-btn-ghost-dark:hover{background:rgba(213,207,240,.12)}
        .wf-btn-block{width:100%}

        /* legacy alias kept for any view still using .pv-btn */
        .pv-btn{
            display:inline-flex;align-items:center;justify-content:center;gap:8px;
            background:var(--blurple);color:#fff;font-weight:500;
            padding:12px 20px;border-radius:var(--r-md);border:1px solid transparent;
            cursor:pointer;font-size:1rem;
            transition:background-color .22s ease,transform .22s ease;
        }
        .pv-btn:hover{background:var(--blurple-lift)}
        .pv-btn-block{width:100%}
        .pv-btn-ghost{background:transparent;color:var(--blurple);border-color:var(--blurple)}
        .pv-btn-ghost:hover{background:rgba(75,24,191,.07)}

        /* ---------- form fields ---------- */
        .pv-input{
            width:100%;background:var(--card);border:1px solid var(--divider);
            border-radius:var(--r-md);padding:12px 14px;
            color:var(--text);font-size:.98rem;font-family:inherit;outline:none;
            transition:border-color .2s ease,box-shadow .2s ease;
        }
        .pv-input::placeholder{color:var(--muted);opacity:.75}
        .pv-input:focus{
            border-color:var(--accent);
            box-shadow:0 0 0 3px rgba(75,24,191,.16);
        }
        .pv-label{
            display:block;font-size:.85rem;font-weight:600;
            color:var(--muted);margin:0 0 7px;
        }
        .pv-check{
            display:flex;align-items:flex-start;gap:9px;margin:16px 0 22px;
            color:var(--muted);font-size:.85rem;cursor:pointer;line-height:1.45;
        }
        .pv-check input{accent-color:var(--accent);width:16px;height:16px;margin-top:2px;flex-shrink:0}

        /* ---------- feedback ---------- */
        .pv-err{
            color:var(--danger);font-size:.85rem;margin-top:6px;
            background:var(--danger-bg);border:1px solid var(--danger-line);
            border-radius:8px;padding:8px 10px;
        }
        .pv-mut{color:var(--muted);font-size:.92rem}
        .pv-link{color:var(--accent);font-weight:500;text-decoration:underline;text-underline-offset:2px}
        .pv-link:hover{color:var(--accent-hover)}
        .pv-foot{text-align:center;color:var(--muted);font-size:.8rem}
        .pv-flags{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;color:var(--muted);font-size:.78rem}
        .pv-flags span{display:inline-flex;align-items:center;gap:6px}
        .pv-flags svg{width:13px;height:13px;flex-shrink:0}
        .pv-note{
            margin:18px 0 0;padding-top:16px;border-top:1px solid var(--line);
        }

        .auth-alert{
            padding:12px 14px;border-radius:var(--r-md);font-size:.88rem;margin-bottom:18px;
        }
        .auth-alert.is-ok{
            background:rgba(75,24,191,.08);border:1px solid rgba(75,24,191,.28);
            color:var(--accent-hover);
        }
        [data-theme="dark"] .auth-alert.is-ok{color:#c3b0ff}
        .auth-alert.is-err{background:var(--danger-bg);border:1px solid var(--danger-line);color:var(--danger)}

        /* keep the shared theme toggle on-brand */
        [data-theme="light"] .pv-theme-btn{background:rgba(35,11,89,.04);color:var(--text)}
        .pv-theme-btn:hover{border-color:var(--accent)}
        /* ≥900px the toggle is over the light form panel; below that the
           stacked brand panel is behind it, so it needs the inverse treatment. */
        @media(min-width:900px){
            .auth-topbar .pv-theme-btn{
                background:rgba(35,11,89,.05);border-color:var(--line);color:var(--text);
            }
            [data-theme="dark"] .auth-topbar .pv-theme-btn{background:rgba(240,240,242,.08)}
            .auth-topbar .pv-theme-btn:hover{border-color:var(--accent)}
        }
        @media(max-width:899px){
            .auth-topbar .pv-theme-btn{
                background:rgba(240,240,242,.14);border-color:rgba(240,240,242,.32);color:#fff;
            }
            .auth-topbar .pv-theme-btn:hover{background:rgba(240,240,242,.24);border-color:rgba(240,240,242,.6)}
        }

        @media(max-width:899px){
            .auth-shell{flex-direction:column}
            /* Stacked layout: the panel flows normally again, so drop the
               viewport height / stickiness set for the desktop split. */
            .auth-left{
                flex:0 0 auto;padding:74px 24px 28px;gap:18px;
                position:relative;align-self:auto;height:auto;
            }
            .auth-mid{gap:16px}
            .auth-hero h1{max-width:none}
            .auth-hero p,.auth-feats,.auth-stats{display:none}
            .auth-right{padding:36px 18px 40px}
            /* Phones showed the brand three times: the "Back to PrimeVest" link,
               the brand panel, and the large logo above the form. Keep only the
               brand panel so the logo and wordmark read once, cleanly. */
            .auth-back{display:none}
            .auth-right .pv-logo{display:none}
            /* space-between with one child would pull the theme toggle left. */
            .auth-topbar{justify-content:flex-end}
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
            <img class="auth-circles" src="{{ asset('images/wf/gradient-circles.svg') }}" width="2024" height="850" alt="" aria-hidden="true">

            <div class="auth-brand">
                <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest">
                <span>PrimeVest</span>
            </div>

            <div class="auth-mid">
                <div class="auth-hero">
                    <h1>Investing that works <em>better</em> for you.</h1>
                    <p>Earn a competitive rate on your cash and put it to work in expert-built, automated portfolios — all from one account.</p>
                </div>

                <ul class="auth-feats">
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l5-5 4 3 8-8"/><path d="M14 7h6v6"/></svg></span>
                        Automated portfolios built around your goals
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></span>
                        Daily rebalancing and tax-loss harvesting
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="13" rx="3"/><path d="M2 10h20"/></svg></span>
                        FDIC-insurance eligibility up to $8M
                    </li>
                    <li>
                        <span class="ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
                        Bank-grade encryption and two-factor auth
                    </li>
                </ul>
            </div>

            <div class="auth-stats">
                <div><b>1.5M+</b><span>Funded clients</span></div>
                <div><b>$100B+</b><span>Total assets</span></div>
                <div><b>4.8</b><span>App Store rating</span></div>
            </div>
        </aside>

        <main class="auth-right">
            <div class="pv-container">
                <a href="{{ url('/') }}" class="pv-logo" style="text-decoration:none;color:inherit;margin-bottom:24px">
                    <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimeVest">
                </a>

                <div class="pv-card">
                    @if (session('status'))
                        <div class="auth-alert is-ok">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="auth-alert is-err">
                            @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                        </div>
                    @endif

                    @yield('content')
                </div>

                <p class="pv-foot" style="margin-top:24px">
                    Protected by 256-bit encryption &middot; 2-Factor Authentication available<br>
                    &copy; {{ date('Y') }} PrimeVest. All rights reserved.
                </p>
            </div>
        </main>
    </div>
    @include('partials.jivo')
</body>
</html>