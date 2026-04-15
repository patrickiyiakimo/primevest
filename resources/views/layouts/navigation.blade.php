<nav class="bg-gradient-to-r from-black via-gray-900 to-black shadow-2xl border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo & Left Menu -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="text-2xl font-bold bg-green-500 bg-clip-text text-transparent transition-all duration-300">
                        PrimeVest
                    </a>
                </div>
                <!-- Test@1234 -->
                <!-- Main Navigation Links - Hidden when logged in -->
                @guest
                <div class="hidden md:flex md:space-x-6">
                    <a href="/trading" 
                       class="relative text-gray-300 hover:text-white transition-all duration-300 px-3 py-2 text-sm font-medium group">
                        Trading
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/system"
                       class="relative text-gray-300 hover:text-white transition-all duration-300 px-3 py-2 text-sm font-medium group">
                        System
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/company"
                       class="relative text-gray-300 hover:text-white transition-all duration-300 px-3 py-2 text-sm font-medium group">
                        Company
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/education"
                       class="relative text-gray-300 hover:text-white transition-all duration-300 px-3 py-2 text-sm font-medium group">
                        Education
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-green-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                @endguest
            </div>
            
            <!-- Right Side (Auth buttons) -->
            <div class="flex items-center space-x-4">
                @guest
                    <!-- Show when NOT logged in -->
                    <a href="/login" 
                       class="text-gray-300 hover:text-green-500 px-4 py-2 text-sm font-medium transition-all duration-500">
                        Login
                    </a>
                    <a href="/register" 
                       class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-5 py-2 rounded-full text-sm font-medium duration-500 shadow-lg">
                        Get Started
                    </a>
                @else
                    <!-- Show when logged in -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center space-x-3 px-4 py-2 rounded-lg  duration-500 border border-gray-700">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-gray-200 font-medium">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             class="absolute right-0 mt-2 w-56 bg-gray-900 rounded-xl shadow-2xl py-2 z-50 border border-gray-800">
                            <a href="/dashboard" 
                               class="flex items-center space-x-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                            <a href="/profile" 
                               class="flex items-center space-x-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Profile</span>
                            </a>
                            <div class="border-t border-gray-800 my-1"></div>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" 
                                        class="flex items-center space-x-3 w-full px-4 py-2.5 text-sm text-red-400 hover:bg-gray-800 hover:text-red-300 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- Crypto Ticker Bar - Shows immediately after navbar -->
<div class="bg-gray-900 border-b border-gray-800">
        <iframe 
            src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" 
            width="100%" 
            height="36px" 
            scrolling="auto" 
            marginwidth="0" 
            marginheight="0" 
            frameborder="0" 
            border="0" 
            style="border:0;margin:0;padding:0;"
            >
        </iframe>
</div>

<!-- Mobile menu button for responsive design -->
<div x-data="{ mobileMenuOpen: false }" class="md:hidden">
    <button @click="mobileMenuOpen = !mobileMenuOpen" 
            class="fixed top-4 right-4 z-50 p-2 rounded-lg bg-gray-800 text-white focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-x-full"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform -translate-x-full"
         class="fixed inset-0 z-40 bg-black bg-opacity-95 backdrop-blur-lg">
        <div class="flex flex-col h-full pt-20 px-6">
            @guest
                <a href="/trading" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">Trading</a>
                <a href="/system" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">System</a>
                <a href="/company" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">Company</a>
                <a href="/education" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">Education</a>
                <div class="mt-6 space-y-3">
                    <a href="/login" class="block text-center px-4 py-3 text-gray-300 hover:text-white border border-gray-700 rounded-full">Login</a>
                    <a href="/register" class="block text-center px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-full">Sign Up</a>
                </div>
            @else
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-white font-bold text-2xl">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <p class="text-white font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
                </div>
                <a href="/dashboard" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">Dashboard</a>
                <a href="/profile" class="py-4 text-gray-300 hover:text-white text-lg font-medium border-b border-gray-800">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full text-left py-4 text-red-400 hover:text-red-300 text-lg font-medium">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</div>