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
        <!-- I want the navbar not to show when I login to my dashboard but I want it to show again when I go back to the homepage -->
        @if (!Auth::check())
            @include('layouts.navbar')
        @endif
        
        <main class="flex-grow">
            @yield('content')
        </main>
        <!-- I want the footer not to show when I login to my dashboard -->
        @if (!Auth::check())
            @include('layouts.footer')
        @endif
    </div>
</body>
</html>