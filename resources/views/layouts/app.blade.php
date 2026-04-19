<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PrimeVest | Investment Broker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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