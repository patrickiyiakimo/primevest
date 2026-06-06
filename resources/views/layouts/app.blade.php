<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Primary Meta Tags -->
    <title>PrimeVest | Trusted Investment & Trading Platform</title>
    <meta name="title" content="PrimeVest - Trade Stocks, Forex, Crypto & More">
    <meta name="description" content="Join over 22 million traders worldwide who have trusted PrimeVest. Trade stocks, forex, cryptocurrencies, commodities, and indices with low commissions and tight spreads.">
    <meta name="keywords" content="trading, investment, stocks, forex, crypto, online trading, CFD trading, investment platform">
    <meta name="author" content="PrimeVest">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook / WhatsApp / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="PrimeVest - Join Over 22 Million Traders Worldwide">
    <meta property="og:description" content="Trade stocks, forex, cryptocurrencies, commodities, and indices with low commissions and tight spreads. Start your trading journey today with PrimeVest, the trusted platform for millions of traders worldwide.">
    <meta property="og:image" content="{{ asset('/images/Gemini_Generated_Image_l15menl15menl15m.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="PrimeVest">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="PrimeVest - Join Over 22 Million Traders Worldwide">
    <meta name="twitter:description" content="Trade stocks, forex, cryptocurrencies, commodities, and indices with low commissions and tight spreads. Start your trading journey today.">
    <meta name="twitter:image" content="{{ asset('/images/Gemini_Generated_Image_l15menl15menl15m.png') }}">
    <meta name="twitter:site" content="@primevest">
    <meta name="twitter:creator" content="@primevest">
    
    <!-- Additional SEO Tags -->
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="application-name" content="PrimeVest">
    <meta name="apple-mobile-web-app-title" content="PrimeVest">
    <meta name="theme-color" content="#059669">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     <!-- Plus Jakarta Sans Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

     <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Show navbar on ALL pages EXCEPT dashboard routes -->
        @if(!request()->routeIs('dashboard*') && !request()->routeIs('deposit*') && !request()->routeIs('invest*') && !request()->routeIs('withdraw*') && !request()->routeIs('profile*') && !request()->routeIs('buy-crypto*') && !request()->routeIs('stock-trading*') && !request()->routeIs('card-application*') && !request()->routeIs('deposits-history*') && !request()->routeIs('withdrawals-history*') && !request()->routeIs('earnings-history*') && !request()->routeIs('investments-history*'))
            @include('layouts.navigation')
        @endif
        
        <main class="flex-grow">
            @yield('content')
        </main>
        @include('components.live-notifications')
        <!-- Show footer on ALL pages EXCEPT dashboard routes -->
        @if(!request()->routeIs('dashboard*') && !request()->routeIs('deposit*') && !request()->routeIs('invest*') && !request()->routeIs('withdraw*') && !request()->routeIs('profile*') && !request()->routeIs('buy-crypto*') && !request()->routeIs('stock-trading*') && !request()->routeIs('card-application*') && !request()->routeIs('deposits-history*') && !request()->routeIs('withdrawals-history*') && !request()->routeIs('earnings-history*') && !request()->routeIs('investments-history*'))
        <!-- How It Works Section -->
    @include('components.how-it-works')
   
        @include('layouts.footer')
        @endif
    </div>
</body>
</html>