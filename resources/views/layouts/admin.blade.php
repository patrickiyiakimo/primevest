<!DOCTYPE html>
<html lang="en" data-theme="light">
@php
    $tpl = 'assets/dashboard/html/ltr/vertical-menu';
    $pvAdmin = Auth::user();
    $pvNav = [
        ['Dashboard',        'admin.dashboard',                              'mdi-view-dashboard',   'admin.dashboard'],
        ['Users',            'admin.users',                                 'mdi-account-multiple', 'admin.users*'],
        ['Deposits',         'admin.deposits',                              'mdi-square-inc-cash',  'admin.deposits'],
        ['Withdrawals',      'admin.withdrawals',                           'mdi-cash',             'admin.withdrawals'],
        ['Investments',      'admin.investments',                           'mdi-chart-line',       'admin.investments'],
        ['Wallet Addresses', 'admin.wallet-addresses.index',                'mdi-wallet',           'admin.wallet-addresses*'],
        ['Card Applications','admin.card-applications',                     'mdi-credit-card',      'admin.card-applications'],
        ['KYC',              'admin.kyc.index',                             'mdi-account-check',    'admin.kyc.*'],
        ['Stock Prices',     'admin.stock.prices',                          'mdi-chart-bar',        'admin.stock.prices'],
        ['Portfolios',       'admin.stock.portfolio',                       'mdi-briefcase',        'admin.stock.portfolio'],
        ['Trades',           'admin.stock.transactions',                    'mdi-swap-horizontal',  'admin.stock.transactions'],
        ['Copy Traders',     'admin.copy-traders.index',                    'mdi-account-star',     'admin.copy-traders.*'],
        ['Copy Requests',    'admin.admin.copy-trading-requests',           'mdi-timer-sand',       'admin.admin.copy-trading-requests'],
    ];
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') · PrimevestMarket</title>

    {{-- Template stylesheets (same shell as the member dashboard) --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset($tpl.'/vendor/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset($tpl.'/vendor/waves/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset($tpl.'/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0/src/toastify.min.css">

    {{-- PrimevestMarket compatibility layer: same tokens as the member dashboard so
         admin pages built on .kpi/.pa/.tbl/.btn/.inp/.pill render identically. --}}
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

        /* Buttons */
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
        .chk{display:inline-flex;align-items:center;gap:8px;font-size:.85rem;color:var(--text);cursor:pointer}

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
        .sec-h{display:flex;align-items:center;justify-content:space-between;gap:14px;margin:0 0 18px;min-width:0;flex-wrap:wrap}
        .sec-h h2{margin:0;font-size:1.2rem;font-weight:700;color:var(--text)}
        .sec-h p{margin:2px 0 0;color:var(--muted);font-size:.82rem}

        /* Grids */
        .grid-2{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:20px}
        .grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px}
        .grid-4{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px}
        .grid-2>*,.grid-3>*,.grid-4>*{min-width:0}

        /* Toasts (Toastify) */
        .pv-tv-ok,.pv-tv-err{background:#ffffff!important;color:var(--text)!important;border:1px solid var(--line)!important;border-left:3px solid var(--acc);border-radius:12px!important;box-shadow:0 18px 50px -12px rgba(5,10,25,.25)!important;font-weight:600!important;font-size:.88rem!important}
        .pv-tv-err{border-left-color:var(--red)}

        /* Admin rail identity */
        .admin-badge{display:inline-block;margin:10px auto 0;padding:3px 10px;border-radius:999px;background:rgba(18,55,84,.10);color:var(--acc);font-size:.66rem;font-weight:800;letter-spacing:.08em}
        .card-profile__info{list-style:none;padding:0;margin:0}
        .card-profile__info li{display:flex;align-items:center;margin-bottom:10px}

        @media(max-width:1100px){.kpi{grid-template-columns:repeat(2,1fr)}.grid-2,.grid-3{grid-template-columns:minmax(0,1fr)}.grid-4{grid-template-columns:minmax(0,1fr) minmax(0,1fr)}}
        @media(max-width:700px){.kpi{grid-template-columns:1fr}.grid-4{grid-template-columns:1fr}}
        /* Allow wide tables to scroll horizontally on small screens */
        @media(max-width:768px){.tbl{min-width:600px}.tbl td{white-space:nowrap}}
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
                            <a class="navbar-brand" href="{{ route('admin.dashboard') }}" style="display:flex;align-items:center;gap:10px">
                                <img src="{{ asset('images/logoipsum-409.png') }}" alt="PrimevestMarket" style="height:32px;width:auto">
                                <span class="pill pill-y">ADMIN</span>
                            </a>

                            <div class="header-right d-flex my-2 align-items-center">
                                <div class="dashboard_log">
                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="mdi mdi-shield"></i></span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="user-email">
                                                <div class="user">
                                                    <i class="thumb"><i class="mdi mdi-shield"></i></i>
                                                    <div class="user-info">
                                                        <h6>{{ $pvAdmin->name }}</h6>
                                                        <span>{{ $pvAdmin->email }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                                <i class="mdi mdi-view-dashboard"></i> Admin Overview
                                            </a>
                                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                                <i class="mdi mdi-account"></i> View Site
                                            </a>
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
                    @foreach($pvNav as [$label, $routeName, $icon, $activePattern])
                        <li>
                            <a href="{{ route($routeName) }}" class="{{ request()->routeIs($activePattern) ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="{{ $label }}">
                                <span><i class="mdi {{ $icon }}"></i></span>
                            </a>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('dashboard') }}" data-toggle="tooltip" data-placement="right" title="View Site">
                            <span><i class="mdi mdi-eye"></i></span>
                        </a>
                    </li>
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
                            <p>Admin Console — <span>{{ $pvAdmin->name }}</span></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <ul class="text-right breadcrumbs list-unstyle">
                            <li class="active"><a href="#">{{ $__env->yieldContent('page-title') ?: 'Admin' }}</a></li>
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
                @yield('admin-content')
            </div>
        </div>

        <!-- Footer -->
        <div class="footer dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-12">
                        <div class="copyright">
                            <p>© Copyright {{ date('Y') }} <a href="{{ url('/') }}">PrimevestMarket</a> · Admin Console</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="footer-social text-right">
                            <span class="muted" style="font-size:.8rem">Signed in as {{ $pvAdmin->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Template scripts (same as dashboard) -->
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
        function pvConfirm(fid, msg) {
            if (confirm(msg || 'Are you sure?')) { document.getElementById(fid).submit(); }
        }
    </script>
    @stack('scripts')
</body>
</html>
