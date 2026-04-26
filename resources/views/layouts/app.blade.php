<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Investment Broker</title>
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
        
        <!-- Show footer on ALL pages EXCEPT dashboard routes -->
        @if(!request()->routeIs('dashboard*') && !request()->routeIs('deposit*') && !request()->routeIs('invest*') && !request()->routeIs('withdraw*') && !request()->routeIs('profile*') && !request()->routeIs('buy-crypto*') && !request()->routeIs('stock-trading*') && !request()->routeIs('card-application*') && !request()->routeIs('deposits-history*') && !request()->routeIs('withdrawals-history*') && !request()->routeIs('earnings-history*') && !request()->routeIs('investments-history*'))
            @include('layouts.footer')
        @endif
    </div>
</body>
</html>