@extends('layouts.dashboard')

@section('page-title', 'Dashboard')

@section('dashboard-content')
@php
    $user = Auth::user();
    $referralLink = url('/register') . '?referral=' . ($user->referral_code ?: $user->email);
@endphp

<div class="row">

    <!-- Quick action tabs -->
    <div class="col-xl-12">
        <div class="card sub-menu">
            <div class="card-body">
                <ul class="d-flex">
                    <li class="nav-item">
                        <a href="{{ route('deposit') }}" class="nav-link">
                            <i class="mdi mdi-heart"></i>
                            <span>Deposit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('withdraw') }}" class="nav-link">
                            <i class="mdi mdi-pentagon"></i>
                            <span>Withdraw</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invest') }}" class="nav-link">
                            <i class="mdi mdi-diamond"></i>
                            <span>Invest</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Profile card -->
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card profile_card">
            <div class="card-body">
                <div class="media">
                    <span class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    <div class="media-body">
                        <span>Hello</span>
                        <h4 class="mb-2">{{ $user->name }}</h4>
                        @if($user->phone)
                        <p class="mb-1"> <span><i class="fa fa-phone mr-2 text-primary"></i></span>{{ $user->phone }}</p>
                        @endif
                        <p class="mb-1"> <span><i class="fa fa-envelope mr-2 text-primary"></i></span>
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <ul class="card-profile__info">
                    <li>
                        <h5 class="mr-4">Country</h5>
                        <span class="text-muted">{{ $user->country ?: '—' }}</span>
                    </li>
                    <li>
                        <h5 class="mr-4">Status</h5>
                        <span class="text-success">{{ $user->kyc_verified_at ?? false ? 'Verified' : 'Active' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Wallet card -->
    <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card acc_balance">
            <div class="card-header">
                <h4 class="card-title">Wallet</h4>
            </div>
            <div class="card-body">
                <span>Available BTC</span>
                <h3> 0 BTC</h3>

                <div class="d-flex justify-content-between my-3">
                    <div>
                        <p class="mb-1">Minimum Deposit</p>
                        <h4>300 USD</h4>
                    </div>
                    <div>
                        <p class="mb-1">Minimum Withdrawal</p>
                        <h4>1,000 USD</h4>
                    </div>
                </div>

                <div class="btn-group mb-3">
                    <button class="btn btn-success" onclick="location.href='{{ route('deposit') }}';">Deposit</button>
                    <button class="btn btn-danger" onclick="location.href='{{ route('withdraw') }}';">Withdraw</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Market ticker -->
    <div class="col-xl-12">
        <div class="tradingview-widget-container mb-4">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
            "symbols": [
                { "proName": "FOREXCOM:SPXUSD", "title": "S&P 500" },
                { "proName": "FOREXCOM:NSXUSD", "title": "Nasdaq 100" },
                { "proName": "FX_IDC:EURUSD", "title": "EUR/USD" },
                { "proName": "BITSTAMP:BTCUSD", "title": "BTC/USD" },
                { "proName": "BITSTAMP:ETHUSD", "title": "ETH/USD" }
            ],
            "showSymbolLogo": true,
            "colorTheme": "light",
            "isTransparent": false,
            "displayMode": "regular",
            "locale": "en"
            }
            </script>
        </div>
    </div>

    <!-- Stat cards -->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="card text-center pt-2">
                    <div class="card-body">
                        <p class="mb-1">BALANCE</p>
                        <h4>$ {{ number_format((float) $user->balance, 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="card text-center pt-2">
                    <div class="card-body">
                        <p class="mb-1">PROFITS</p>
                        <h4>$ {{ number_format((float) ($profits ?? 0), 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="card text-center pt-2">
                    <div class="card-body">
                        <p class="mb-1">LAST DEPOSIT</p>
                        <h4>$ {{ number_format((float) ($lastDepositAmount ?? 0), 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                <div class="card text-center pt-2">
                    <div class="card-body">
                        <p class="mb-1">LAST WITHDRAWAL</p>
                        <h4>$ {{ number_format((float) ($lastWithdrawalAmount ?? 0), 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Market overview -->
    <div class="col-xl-12">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text"></span></a></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
            {
            "colorTheme": "light",
            "dateRange": "12M",
            "showChart": true,
            "locale": "en",
            "largeChartUrl": "",
            "isTransparent": false,
            "showSymbolLogo": true,
            "showFloatingTooltip": false,
            "width": "100%",
            "height": "660",
            "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
            "plotLineColorFalling": "rgba(41, 98, 255, 1)",
            "gridLineColor": "rgba(240, 243, 250, 0)",
            "scaleFontColor": "rgba(106, 109, 120, 1)",
            "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
            "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
            "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
            "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
            "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
            "tabs": [
                {
                "title": "Indices",
                "symbols": [
                    { "s": "FOREXCOM:SPXUSD", "d": "S&P 500" },
                    { "s": "FOREXCOM:NSXUSD", "d": "US 100" },
                    { "s": "FOREXCOM:DJI", "d": "Dow 30" },
                    { "s": "INDEX:NKY", "d": "Nikkei 225" },
                    { "s": "INDEX:DEU40", "d": "DAX Index" },
                    { "s": "FOREXCOM:UKXGBP", "d": "UK 100" }
                ],
                "originalTitle": "Indices"
                },
                {
                "title": "Futures",
                "symbols": [
                    { "s": "CME_MINI:ES1!", "d": "S&P 500" },
                    { "s": "CME:6E1!", "d": "Euro" },
                    { "s": "COMEX:GC1!", "d": "Gold" },
                    { "s": "NYMEX:CL1!", "d": "WTI Crude Oil" },
                    { "s": "NYMEX:NG1!", "d": "Gas" },
                    { "s": "CBOT:ZC1!", "d": "Corn" }
                ],
                "originalTitle": "Futures"
                },
                {
                "title": "Bonds",
                "symbols": [
                    { "s": "CBOT:ZB1!", "d": "T-Bond" },
                    { "s": "CBOT:UB1!", "d": "Ultra T-Bond" },
                    { "s": "EUREX:FGBL1!", "d": "Euro Bund" },
                    { "s": "EUREX:FBTP1!", "d": "Euro BTP" },
                    { "s": "EUREX:FGBM1!", "d": "Euro BOBL" }
                ],
                "originalTitle": "Bonds"
                },
                {
                "title": "Forex",
                "symbols": [
                    { "s": "FX:EURUSD", "d": "EUR to USD" },
                    { "s": "FX:GBPUSD", "d": "GBP to USD" },
                    { "s": "FX:USDJPY", "d": "USD to JPY" },
                    { "s": "FX:USDCHF", "d": "USD to CHF" },
                    { "s": "FX:AUDUSD", "d": "AUD to USD" },
                    { "s": "FX:USDCAD", "d": "USD to CAD" }
                ],
                "originalTitle": "Forex"
                }
            ]
            }
            </script>
        </div>
    </div>

    <!-- Affiliate Program -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Affiliate Program</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6">
                        <h5>Affiliate Link</h5>
                        <p>Copy and paste this link to send to friends or use in your articles. When
                            users sign up using this link, your account will be credited with a 3% referral
                            bonus.</p>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <h5>Share your link</h5>
                        <form action="#" onsubmit="return false;">
                            <div class="input-group">
                                <input type="text" class="form-control" id="pvReferral" readonly
                                    value="{{ $referralLink }}">
                                <div class="input-group-append">
                                    <button type="button" class="input-group-text bg-primary text-white" onclick="pvCopyReferral()">Copy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    function pvCopyReferral() {
        var el = document.getElementById('pvReferral');
        if (!el) return;
        el.select();
        el.setSelectionRange(0, 99999);
        var done = function () { if (typeof pvFlash === 'function') pvFlash('flash-ok', 'Affiliate link copied'); };
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(el.value).then(done).catch(function () {
                try { document.execCommand('copy'); done(); } catch (e) { }
            });
        } else {
            try { document.execCommand('copy'); done(); } catch (e) { }
        }
    }
</script>
@endsection
