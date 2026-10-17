<!DOCTYPE html>
<html lang="en" data-theme="light">
@php
    $tpl = 'assets/dashboard/html/ltr/vertical-menu';
    $pvUser = Auth::user();
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Member Dashboard') · PrimevestMarket</title>

    {{-- Template stylesheets (exact copies of the reference dashboard) --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset($tpl.'/vendor/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset($tpl.'/vendor/waves/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset($tpl.'/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">

    {{-- PrimevestMarket compatibility layer: keeps every existing dashboard page
         styled correctly on top of the light template. --}}
    <style>
        :root{
            --bg:#f2f3f8; --bg2:#eef1f6; --panel:#ffffff; --panel2:#ffffff;
            --line:#eff0f6; --text:#282a3c; --muted:#74788d;
            --acc:#123754; --acc2:#1c4b73; --acc3:#10b981;
            --gold:#f59e0b; --red:#e50202; --rad:8px;
        }
        *{box-sizing:border-box}
        body{background:var(--bg);color:var(--text);font-family:"Poppins",sans-serif;-webkit-font-smoothing:antialiased}
        ::selection{background:var(--acc);color:#fff}
        a{color:inherit}
        .num{font-variant-numeric:tabular-nums lining-nums;font-feature-settings:'tnum' 1,'lnum' 1;letter-spacing:-.01em}
        .muted{color:var(--muted)}
        .ok{color:#0a9d63}.bad{color:var(--red)}.gold{color:#b0770b}
        .mt{margin-top:20px}.mb{margin-bottom:20px}
        .text-success{color:#0a9d63!important}

        /* Panels / cards */
        .pa{background:var(--panel);border:1px solid var(--line);border-radius:var(--rad);box-shadow:0 10px 30px 0 rgba(82,63,105,.06)}
        .pv-card{background:var(--panel);border:1px solid var(--line);border-radius:var(--rad)}
        .pv-shade{background:linear-gradient(140deg,#eef4fb,#f8fbff)!important;border:1px solid var(--line)}

        /* KPI */
        .kpi{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        .kpi-card{position:relative;overflow:hidden;padding:22px;border-radius:var(--rad);border:1px solid var(--line);background:var(--panel);box-shadow:0 10px 30px 0 rgba(82,63,105,.06)}
        .kpi-card .lbl{font-size:.75rem;color:var(--muted);font-weight:600;letter-spacing:.04em;text-transform:uppercase;margin-bottom:8px;display:flex;align-items:center;gap:7px;flex-wrap:wrap}
        .kpi-card .val{font-size:1.9rem;font-weight:700;letter-spacing:-.015em;line-height:1.15;overflow-wrap:anywhere;font-variant-numeric:tabular-nums lining-nums}
        .kpi-card .sub{font-size:.8rem;color:var(--muted);margin-top:6px;overflow-wrap:anywhere}

        /* Buttons (guarded so template .btn-success/.btn-danger in the wallet card are untouched) */
        .btn:not(.btn-success):not(.btn-danger):not(.btn-primary):not(.btn-secondary){
            display:inline-flex;align-items:center;justify-content:center;gap:8px;
            background:linear-gradient(135deg,#123754 0%,#1c4b73 100%);color:#fff;font-weight:600;
            padding:11px 20px;border-radius:10px;border:0;cursor:pointer;font-size:.9rem;font-family:inherit;
            transition:.2s;box-shadow:0 10px 24px -12px rgba(18,55,84,.55)
        }
        .btn:not(.btn-success):not(.btn-danger):not(.btn-primary):not(.btn-secondary):hover{transform:translateY(-1px)}
        .btn-ghost{background:#eef1f6!important;color:var(--text)!important;box-shadow:none!important;border:1px solid var(--line)!important}
        .btn-red{background:linear-gradient(135deg,#f87171,var(--red))!important;color:#fff!important;box-shadow:none!important}
        .btn-gold{background:linear-gradient(135deg,#ffd257 0%,#f59e0b 60%)!important;color:#241a00!important;box-shadow:none!important}
        .btn-sm{padding:8px 14px;font-size:.82rem}
        .btn-block{width:100%}

        /* Forms */
        .inp{width:100%;background:#f6f8fb;border:1px solid var(--line);border-radius:10px;padding:12px 14px;color:var(--text);font-size:.9rem;outline:none;font-family:inherit;transition:.2s}
        .inp option{background:#fff;color:var(--text)}
        .inp:focus,.inp:focus-visible{border-color:rgba(18,55,84,.5);box-shadow:0 0 0 3px rgba(18,55,84,.12)}
        .lbl{display:block;font-size:.8rem;font-weight:600;color:var(--muted);margin-bottom:7px}
        .sel{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' fill='none' stroke='%2374788d' viewBox='0 0 24 24'%3E%3Cpath stroke-linecap='round' d='M6 9l6 6 6-6'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 13px center;padding-right:36px}

        /* Tables */
        .tbl{width:100%;border-collapse:collapse;font-size:.87rem}
        .tbl th{text-align:left;color:var(--muted);font-size:.7rem;text-transform:uppercase;letter-spacing:.07em;padding:12px 14px;border-bottom:1px solid var(--line);background:#f7f9fc;white-space:nowrap}
        .tbl td{padding:13px 14px;border-bottom:1px solid var(--line)}
        .tbl tbody tr:hover td{background:#f7f9fc}
        .pill{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:999px;font-size:.74rem;font-weight:700}
        .pill-g{background:rgba(18,55,84,.10);color:var(--acc)}
        .pill-r{background:rgba(229,2,2,.10);color:var(--red)}
        .pill-y{background:rgba(245,158,11,.14);color:#b0770b}
        .pill-b{background:rgba(14,165,233,.14);color:#0284c7}

        /* Section headers */
        .sec-h{display:flex;align-items:center;justify-content:space-between;gap:14px;margin:0 0 18px;min-width:0}
        .sec-h h2{margin:0;font-size:1.2rem;font-weight:700;color:var(--text)}
        .sec-h p{margin:2px 0 0;color:var(--muted);font-size:.82rem}

        /* Grids */
        .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:20px}
        .grid-3{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
        .grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}

        /* Plans */
        .plan{border:1px solid var(--line);border-radius:var(--rad);padding:22px;background:var(--panel);transition:.25s;position:relative;overflow:hidden}
        .plan:hover{transform:translateY(-4px);border-color:rgba(18,55,84,.35)}
        .plan.hot{border-color:rgba(245,158,11,.45)}
        .plan.hot::before{content:"🔥 Most Popular";position:absolute;top:16px;right:-32px;background:linear-gradient(90deg,#f59e0b,#ffd257);color:#241a00;font-size:.65rem;font-weight:800;padding:5px 34px;transform:rotate(45deg)}
        .plan .roi{font-size:2rem;font-weight:800;letter-spacing:-.02em;color:var(--acc)}
        .plan ul{margin:16px 0 0;padding:0;list-style:none;font-size:.84rem;color:var(--muted)}
        .plan li{margin:7px 0;display:flex;gap:8px;align-items:flex-start}
        .plan li::before{content:"✓";color:var(--acc);font-weight:800}

        /* Toasts (Toastify) */
        .pv-tv-ok,.pv-tv-err{background:#ffffff!important;color:var(--text)!important;border:1px solid var(--line)!important;border-left:3px solid var(--acc);border-radius:12px!important;box-shadow:0 18px 50px -12px rgba(5,10,25,.25)!important;font-weight:600!important;font-size:.88rem!important}
        .pv-tv-err{border-left-color:var(--red)}

        /* Balance privacy toggle used by legacy views */
        .pv-eye{display:inline-flex;align-items:center;justify-content:center;width:26px;height:26px;padding:0;margin-left:auto;flex-shrink:0;border-radius:8px;border:1px solid var(--line);background:#f6f8fb;color:var(--muted);cursor:pointer;transition:.18s}
        .pv-eye svg{width:15px;height:15px}
        .pv-eye .i-off{display:none}
        .pv-balances-hidden .pv-eye .i-on{display:none}
        .pv-balances-hidden .pv-eye .i-off{display:block}
        .pv-money{transition:filter .18s ease}
        .pv-balances-hidden .pv-money{filter:blur(7px);pointer-events:none;user-select:none;-webkit-user-select:none}
        .sig-ring{transform:rotate(-90deg)}

        /* Target: wallet buttons stretched full width */
        .acc_balance .btn-group{width:100%}
        .acc_balance .btn-group .btn{flex:1}
        .card-profile__info{list-style:none;padding:0;margin:0}
        .card-profile__info li{display:flex;align-items:center;margin-bottom:10px}
        .profile-avatar{width:60px;height:60px;border-radius:50%;background:#123754;color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:24px;font-weight:600;margin-right:15px;flex-shrink:0}

        @media(max-width:1100px){.kpi{grid-template-columns:repeat(2,1fr)}.grid-2,.grid-3{grid-template-columns:1fr}.grid-4{grid-template-columns:1fr 1fr}}
        @media(max-width:700px){.kpi{grid-template-columns:1fr}.grid-4{grid-template-columns:1fr}}
        /* Allow wide tables to scroll horizontally on small screens */
        @media(max-width:768px){.tbl{min-width:600px}.tbl td{white-space:nowrap}}
        /* Fallback if the template JS never fires: never leave the page hidden. */
        #main-wrapper.pv-force{opacity:1!important}
    </style>
</head>

<body>

    <!-- Preloader (identical to the reference template) -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <!-- Header -->
        <div class="header dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                            <a class="navbar-brand" href="{{ route('dashboard') }}">
                                <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimevestMarket" style="height:32px;width:auto">
                            </a>

                            <div class="header-right d-flex my-2 align-items-center">
                                <div class="language">
                                    <div class="dropdown"></div>
                                </div>
                                <div class="dashboard_log">
                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="mdi mdi-account"></i></span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="user-email">
                                                <div class="user">
                                                    <i class="thumb"><i class="mdi mdi-account"></i></i>
                                                    <div class="user-info">
                                                        <h6>{{ $pvUser->name }}</h6>
                                                        <span>{{ $pvUser->email }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="user-balance">
                                                <div class="available">
                                                    <p>Available</p>
                                                    <span>{{ number_format((float) $pvUser->balance, 2) }} USD</span>
                                                </div>
                                                <div class="total">
                                                    <p>Total Profits</p>
                                                    <span>{{ number_format((float) ($pvUser->total_profits ?? 0), 2) }} USD</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('profile') }}" class="dropdown-item">
                                                <i class="mdi mdi-account"></i> Profile
                                            </a>
                                            <a href="{{ route('deposits-history') }}" class="dropdown-item">
                                                <i class="mdi mdi-history"></i> History
                                            </a>
                                            <a href="{{ route('kyc.status') }}" class="dropdown-item">
                                                <i class="mdi mdi-account-check"></i> KYC Verification
                                            </a>
                                            @if($pvUser->is_admin)
                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                                <i class="mdi mdi-shield-account"></i> Admin Console
                                            </a>
                                            @endif
                                            <a href="#" onclick="event.preventDefault();document.getElementById('pv-logout-form').submit();" class="dropdown-item logout">
                                                <i class="mdi mdi-logout"></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="menu">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" data-toggle="tooltip" data-placement="right" title="Dashboard">
                            <span><i class="mdi mdi-view-dashboard"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('deposit') }}" data-toggle="tooltip" data-placement="right" title="Deposit">
                            <span><i class="mdi mdi-face-profile"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('buy-crypto') }}" data-toggle="tooltip" data-placement="right" title="Buy Crypto">
                            <span><i class="mdi mdi-tumblr-reblog"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('stock-trading') }}" data-toggle="tooltip" data-placement="right" title="Stock Trading">
                            <span><i class="mdi mdi-monitor-multiple"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('deposits-history') }}" data-toggle="tooltip" data-placement="right" title="Transactions">
                            <span><i class="mdi mdi-database"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kyc.status') }}" data-toggle="tooltip" data-placement="right" title="KYC Verification">
                            <span><i class="mdi mdi-account-check"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" data-toggle="tooltip" data-placement="right" title="Profile">
                            <span><i class="mdi mdi-account"></i></span>
                        </a>
                    </li>
                    @if($pvUser->is_admin)
                    <li>
                        <a href="{{ route('admin.dashboard') }}" data-toggle="tooltip" data-placement="right" title="Admin Console">
                            <span><i class="mdi mdi-shield-account" style="color:var(--gold)"></i></span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="#" onclick="event.preventDefault();document.getElementById('pv-logout-form').submit();" data-toggle="tooltip" data-placement="right" title="Logout">
                            <span><i class="mdi mdi-power"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="pv-logout-form" method="POST" action="{{ route('logout') }}" style="display:none">@csrf</form>

        <!-- Page title -->
        <div class="page-title dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-content">
                            <p>Welcome Back, <span>{{ $pvUser->name }}</span></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <ul class="text-right breadcrumbs list-unstyle">
                            <li class="active"><a href="#">{{ $__env->yieldContent('page-title') ?: 'Dashboard' }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-body">
            <div class="container">
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
            </div>
        </div>

        <!-- Footer -->
        <div class="footer dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-12">
                        <div class="copyright">
                            <p>© Copyright {{ date('Y') }} <a href="{{ url('/') }}">PrimevestMarket</a> All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="footer-social">
                            <ul>
                                <div id="google_translate_element"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                                    }
                                </script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Template scripts (exact copies) -->
    <script src="{{ asset($tpl.'/js/global.js') }}"></script>
    <script src="{{ asset($tpl.'/vendor/waves/waves.min.js') }}"></script>
    <script src="{{ asset($tpl.'/js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.js"></script>
    <script>
        // Never leave the shell hidden if the template's load handler is missed.
        window.addEventListener('load', function () {
            var w = document.getElementById('main-wrapper');
            if (w) w.classList.add('show', 'pv-force');
            var p = document.getElementById('preloader');
            if (p && window.jQuery) { jQuery('#preloader').fadeOut(300); }
            else if (p) { p.style.display = 'none'; }
        });
        setTimeout(function () {
            var w = document.getElementById('main-wrapper');
            if (w) w.classList.add('show', 'pv-force');
            var p = document.getElementById('preloader');
            if (p && p.style.display !== 'none') p.style.display = 'none';
        }, 2500);

        function pvFlash(kind, msg) {
            if (typeof Toastify === 'undefined') return;
            Toastify({
                text: String(msg),
                duration: 3000,
                gravity: 'top',
                position: 'right',
                stopOnFocus: true,
                newestOnTop: true,
                className: kind === 'flash-ok' ? 'pv-tv-ok' : 'pv-tv-err',
                onClick: function () { this.toast.remove() }
            }).showToast();
        }
        function pvAjax(form, btn) {
            const fd = new FormData(form);
            const meta = document.querySelector('meta[name="csrf-token"]');
            const o = btn ? btn.textContent : '';
            if (btn) { btn.disabled = true; btn.textContent = 'Processing…' }
            const done = (ok, msg) => { if (btn) { btn.disabled = false; btn.textContent = o } pvFlash(ok ? 'flash-ok' : 'flash-err', msg || (ok ? 'Done' : 'Request failed')); if (ok && form.dataset.reload) setTimeout(() => location.reload(), 900) };
            fetch(form.action, { method: 'POST', body: fd, headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json', 'X-CSRF-TOKEN': meta ? meta.content : '' } })
                .then(r => r.text().then(t => { let d = null; try { d = JSON.parse(t) } catch (e) { } return { status: r.status, text: r.statusText, d } }))
                .then(({ status, text, d }) => {
                    if (!d) return done(false, 'Server error (' + status + ' ' + text + '). Please try again.');
                    done(!!d.success, d.message);
                })
                .catch(() => done(false, 'Network error. Please try again.'));
        }
        // Mounts a TradingView external-embedding widget that follows the app theme.
        function pvThemedWidget(hostId, src, cfg) {
            function th() { try { return document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light' } catch (e) { return 'light' } }
            function mount() {
                const host = document.getElementById(hostId); if (!host) return;
                host.innerHTML = '';
                const wrap = document.createElement('div'); wrap.className = 'tradingview-widget-container';
                const w = document.createElement('div'); w.className = 'tradingview-widget-container__widget';
                wrap.appendChild(w);
                const s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = src;
                const c = Object.assign({}, cfg); c.colorTheme = th(); s.text = JSON.stringify(c);
                wrap.appendChild(s);
                host.appendChild(wrap);
            }
            mount();
        }
        // search filters rows with data-sym (legacy macro-markets tables)
        const pvq = document.getElementById('pvSearch');
        if (pvq) pvq.addEventListener('input', () => { const v = pvq.value.toLowerCase(); document.querySelectorAll('[data-sym]').forEach(r => { r.style.display = r.dataset.sym.includes(v) ? '' : 'none' }) });
    </script>
    @yield('scripts')
    @include('partials.smartsupp')
</body>

</html>
