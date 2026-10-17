<!DOCTYPE html>
<html lang="en" class="dark">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com/"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        accent: '#6366F1',
                        warning: '#F59E0B',
                        danger: '#EF4444',
                        dark: {
                            100: '#374151',
                            200: '#1F2937',
                            300: '#111827',
                            400: '#0F172A',
                            500: '#0B1120',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.15.12/dist/cdn.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        /* Alpine.js x-cloak directive */
        
        [x-cloak] {
            display: none !important;
        }
        /* Custom scrollbar for dark mode */
        
         ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
         ::-webkit-scrollbar-track {
            background: #1F2937;
        }
        
         ::-webkit-scrollbar-thumb {
            background: #4B5563;
            border-radius: 4px;
        }
        
         ::-webkit-scrollbar-thumb:hover {
            background: #6B7280;
        }
        /* Form elements styling */
        
        .form-input {
            @apply bg-dark-100 border-0 rounded-lg px-4 py-3 text-gray-100 font-medium focus: ring-2 focus: ring-primary focus: outline-none transition-all duration-200;
        }
        
        .form-select {
            @apply bg-dark-100 border-0 rounded-lg px-4 py-3 text-gray-100 font-medium focus: ring-2 focus: ring-primary focus: outline-none transition-all duration-200;
        }
        
        .btn-primary {
            @apply bg-primary hover: bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-200;
        }
        
        .btn-secondary {
            @apply bg-dark-100 hover: bg-dark-200 text-white font-bold py-3 px-6 rounded-lg transition-all duration-200;
        }
        /* Navbar and mobile menu animations */
        
        .navbar-dropdown {
            @apply transition-all duration-300 ease-in-out transform origin-top;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
        /* Light mode overrides */
        
        html:not(.dark) {
            @apply bg-gray-100 text-gray-900;
        }
        
        html:not(.dark) body {
            @apply bg-gray-100 text-gray-900;
        }
        
        html:not(.dark) .bg-dark-400 {
            @apply bg-white;
        }
        
        html:not(.dark) .bg-dark-300 {
            @apply bg-gray-50;
        }
        
        html:not(.dark) .border-gray-800 {
            @apply border-gray-200;
        }
        
        html:not(.dark) .text-gray-200,
        html:not(.dark) .text-gray-300,
        html:not(.dark) .text-gray-400 {
            @apply text-gray-700;
        }
        
        html:not(.dark) .hover\:bg-dark-200:hover,
        html:not(.dark) .hover\:bg-gray-700:hover {
            @apply hover: bg-gray-200;
        }
        
        html:not(.dark) .bg-dark-500 {
            @apply bg-gray-100;
        }
    </style>

    <title>@yield('title', 'PrimevestMarket | CFD Trading - Trading on Stocks, Gold, Oil, Indices')</title>
    <link rel="manifest" href="{{ route('home') }}">
    <meta name="theme-color" content="#111827">
    <meta property="og:site_name" content="PrimevestMarket">
    <meta property="og:description" content="CFD Trading with PrimevestMarket. Trading on Stocks, Gold, Oil, Indices with ultra-fast execution &amp; spreads from 0.0 pips. News, articles and training materials for experienced and novice traders.">
    <meta name="description" content="CFD Trading with PrimevestMarket. Trading on Stocks, Gold, Oil, Indices with ultra-fast execution &amp; spreads from 0.0 pips. News, articles and training materials for experienced and novice traders.">
    <meta name="keywords" content="forex, CFDs, CFD, Bitcoin trading, crypto trading, online trading, Forex trading, Oil trading, Gold trading, trading indexes, shares trading, commodities trading, trading platform, Cryptocurrencies day trading">
    <meta property="og:type" content="website">
    <meta property="og:title" content="PrimevestMarket | Trade, Invest &amp; Grow Your Crypto">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logoipsum-409.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('images/logoipsum-409.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="285">
    <meta property="og:image:alt" content="PrimevestMarket">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PrimevestMarket | Trade, Invest &amp; Grow Your Crypto">
    <meta name="twitter:description" content="CFD Trading with PrimevestMarket. Trade, invest and grow your digital assets with confidence.">
    <meta name="twitter:image" content="{{ asset('images/logoipsum-409.png') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Preload key assets -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- jQuery (required for some components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript utilities -->
    <script>
        // Utility function for mobile menu
        document.addEventListener('alpine:init', () => {
            Alpine.store('navigation', {
                open: false,
                toggle() {
                    this.open = !this.open;
                },
                close() {
                    this.open = false;
                }
            });

            // Theme toggler
            Alpine.store('darkMode', {
                on: true,
                toggle() {
                    this.on = !this.on;
                    if (this.on) {
                        document.documentElement.classList.add('dark');
                        document.body.classList.add('bg-gray-900');
                        document.body.classList.remove('bg-gray-100');
                    } else {
                        document.documentElement.classList.remove('dark');
                        document.body.classList.remove('bg-gray-900');
                        document.body.classList.add('bg-gray-100');
                    }
                    localStorage.setItem('darkMode', this.on ? 'dark' : 'light');
                }
            });
        });

        // Initialize theme from local storage
        document.addEventListener('DOMContentLoaded', () => {
            const theme = localStorage.getItem('darkMode');
            if (theme === 'light') {
                document.documentElement.classList.remove('dark');
                document.body.classList.remove('bg-gray-900');
                document.body.classList.add('bg-gray-100');
                if (window.Alpine) {
                    Alpine.store('darkMode').on = false;
                }
            }
        });
    </script>
</head>

<body class="antialiased text-gray-200 bg-gray-900 font-sans min-h-screen flex flex-col">
    <!-- Accessibility Skip Link -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:bg-blue-700 focus:text-white focus:fixed focus:px-4 focus:py-2 focus:top-2 focus:left-2 focus:z-50">
        Skip to main content
    </a>




















    <!-- Header -->
        @include('primevestmarket.partials.header')

    @include('primevestmarket.partials.ticker')

    <main id="main-content" class="flex-grow">
        @yield('content')
    </main>

    @include('primevestmarket.partials.footer')
