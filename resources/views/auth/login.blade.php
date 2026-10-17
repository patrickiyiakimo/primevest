<!DOCTYPE html>
<html lang="en" class="dark h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sign in to your PrimevestMarket trading account.">
    <title>Sign In · PrimevestMarket</title>

    <!-- Favicon -->
    <link href="{{ asset('favicon.png') }}" rel="icon" type="image/png">

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'dark');
            document.documentElement.classList.add('dark');
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff', 100: '#e0e7ff', 200: '#c7d2fe', 300: '#a5b4fc',
                            400: '#818cf8', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca',
                            800: '#3730a3', 900: '#312e81',
                        },
                        'glass': 'rgba(255, 255, 255, 0.05)',
                    },
                    backdropBlur: { 'xs': '2px' },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.12/dist/cdn.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <style>
        body { overflow-x: hidden; }
        [x-cloak] { display: none !important; }
        .skiptranslate { display: none !important; }
        body { top: 0 !important; }
    </style>
</head>

<body class="h-full bg-gray-900 font-sans antialiased text-gray-900" x-data="{ darkMode: localStorage.theme === 'dark' || !localStorage.theme }" :class="{ 'dark': darkMode }" x-cloak>

    <!-- Theme Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode)"
            class="relative inline-flex items-center justify-center w-10 h-10 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors duration-150 backdrop-blur-sm" :aria-pressed="darkMode">
            <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 12.728l-.707-.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <div class="relative min-h-screen overflow-hidden">
        <div class="relative z-10">
            <div class="min-h-screen bg-gray-900 relative overflow-hidden">
                <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
                    <div class="w-full max-w-lg">
                        <div class="relative bg-gray-900 border border-gray-700 rounded-3xl p-8 sm:p-10 shadow-2xl">
                            <div class="relative">
                                <!-- Header -->
                                <div class="text-center mb-8">
                                    <div class="flex items-center justify-center mb-6">
                                        <img src="{{ asset('images/logoipsum-409.png') }}" class="relative h-16 w-auto" alt="PrimevestMarket" />
                                    </div>
                                    <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">Welcome Back</h1>
                                    <h2 class="text-lg sm:text-xl font-semibold mb-3">
                                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">PrimevestMarket</span>
                                    </h2>
                                    <p class="text-gray-300 text-sm sm:text-base">Access your trading dashboard</p>

                                    <div class="flex items-center justify-center gap-6 mt-6 text-xs sm:text-sm">
                                        <div class="text-center">
                                            <div class="flex items-center justify-center gap-1 text-green-400 mb-1">
                                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                                <span class="font-medium">Live</span>
                                            </div>
                                            <div class="text-gray-400">24/7 Markets</div>
                                        </div>
                                        <div class="w-px h-10 bg-white/20"></div>
                                        <div class="text-center">
                                            <div class="flex items-center justify-center gap-1 text-blue-400 mb-1">
                                                <i data-lucide="zap" class="w-3 h-3"></i>
                                                <span class="font-medium">Fast</span>
                                            </div>
                                            <div class="text-gray-400">Execution</div>
                                        </div>
                                        <div class="w-px h-10 bg-white/20"></div>
                                        <div class="text-center">
                                            <div class="flex items-center justify-center gap-1 text-cyan-400 mb-1">
                                                <i data-lucide="shield" class="w-3 h-3"></i>
                                                <span class="font-medium">Secure</span>
                                            </div>
                                            <div class="text-gray-400">Platform</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Alerts -->
                                @if (session('status'))
                                    <div class="mb-4 rounded-xl border border-green-500/40 bg-green-500/10 px-4 py-3 text-sm text-green-300">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="mb-4 rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-300 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Login Form -->
                                <form action="{{ route('login') }}" method="post" class="space-y-6">
                                    @csrf

                                    <!-- Email Field -->
                                    <div class="space-y-2">
                                        <label for="email" class="block text-sm font-semibold text-gray-200">Email Address or Username</label>
                                        <div class="relative group">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                                <i data-lucide="mail" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors duration-200"></i>
                                            </div>
                                            <input type="text" name="email" id="email" required class="block w-full rounded-2xl border border-gray-600 bg-gray-900 pl-12 pr-4 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-medium"
                                                placeholder="your.email@example.com" value="{{ old('email') }}" autofocus autocomplete="username">
                                        </div>
                                        @error('email')
                                            <p class="text-sm text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Password Field -->
                                    <div class="space-y-2">
                                        <label for="password" class="block text-sm font-semibold text-gray-200">Password</label>
                                        <div class="relative group" x-data="{ showPassword: false }">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                                                <i data-lucide="lock" class="h-5 w-5 text-gray-400 group-focus-within:text-blue-400 transition-colors duration-200"></i>
                                            </div>
                                            <input type="password" name="password" id="password" required :type="showPassword ? 'text' : 'password'" class="block w-full rounded-2xl border border-gray-600 bg-gray-900 pl-12 pr-12 py-4 text-white placeholder-gray-400 focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 focus:bg-gray-800 transition-all duration-200 text-sm font-medium"
                                                placeholder="Enter your password" autocomplete="current-password">
                                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-blue-400 transition-colors">
                                                <i data-lucide="eye" class="h-5 w-5" x-show="!showPassword"></i>
                                                <i data-lucide="eye-off" class="h-5 w-5" x-show="showPassword" x-cloak></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <p class="text-sm text-red-400">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Remember Me & Forgot Password -->
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center">
                                            <input type="checkbox" name="remember" id="remember" class="h-4 w-4 rounded border-gray-600 bg-gray-900 text-blue-500 focus:ring-2 focus:ring-blue-400/20 transition-colors">
                                            <label for="remember" class="ml-3 text-gray-300 font-medium">Remember me</label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="text-blue-400 hover:text-blue-300 transition-colors underline underline-offset-2">Forgot password?</a>
                                    </div>

                                    <!-- Login Button -->
                                    <div class="mt-8">
                                        <button type="submit" name="btn-login" class="group relative flex w-full justify-center items-center gap-3 rounded-2xl bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 px-6 py-4 text-base font-bold text-white transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-400/50">
                                            <i data-lucide="log-in" class="h-5 w-5"></i>
                                            <span>Access Dashboard</span>
                                            <i data-lucide="arrow-right" class="h-4 w-4 group-hover:translate-x-1 transition-transform"></i>
                                        </button>
                                    </div>
                                </form>

                                <!-- Footer -->
                                <div class="mt-10 text-center space-y-6">
                                    <div class="text-sm">
                                        <span class="text-gray-300">New to trading? </span>
                                        <a href="{{ route('register') }}" class="font-semibold text-blue-400 hover:text-blue-300 transition-colors underline underline-offset-2">Create your account</a>
                                    </div>

                                    <div class="flex items-center justify-center gap-6 py-4 text-xs text-gray-400">
                                        <div class="flex items-center gap-1">
                                            <i data-lucide="shield-check" class="w-3 h-3 text-green-400"></i>
                                            <span>SSL Secured</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <i data-lucide="lock" class="w-3 h-3 text-blue-400"></i>
                                            <span>256-bit Encryption</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <i data-lucide="award" class="w-3 h-3 text-cyan-400"></i>
                                            <span>Regulated</span>
                                        </div>
                                    </div>

                                    <p class="text-xs text-gray-500">&copy; 2026 PrimevestMarket. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language Selector -->
    <div class="gtranslate_wrapper"></div>
    <script>
        window.gtranslateSettings = {
            default_language: "en",
            alt_flags: { "en": "usa" },
            wrapper_selector: ".gtranslate_wrapper",
            flag_style: "3d",
        };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailField = document.getElementById('email');
            if (emailField) emailField.focus();
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
        document.addEventListener('alpine:updated', () => {
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });
    </script>
    @include('partials.smartsupp')
</body>
</html>
