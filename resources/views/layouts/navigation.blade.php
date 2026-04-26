<nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 z-50 bg-black backdrop-blur-md border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-white hover:text-red-700 transition-colors duration-300">
                    PrimeVest
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                @guest
                    <a href="/trading" class="text-gray-200 hover:text-red-700 transition-all duration-300 text-sm font-medium">Trading</a>
                    <a href="/company" class="text-gray-200 hover:text-red-700 transition-all duration-300 text-sm font-medium">Company</a>
                    <a href="/education" class="text-gray-200 hover:text-red-700 transition-all duration-300 text-sm font-medium">Education</a>
                    <a href="/contact" class="text-gray-200 hover:text-red-700 transition-all duration-300 text-sm font-medium">Contact</a>

                    @endguest
            </div>
            
            <!-- Desktop Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @guest
                    <a href="/login" class="text-gray-200 hover:text-red-700 transition-all duration-300 text-sm font-medium">Login</a>
                    <a href="/register" class="px-5 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-medium rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                        Get Started
                    </a>
                @else
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-gray-200 text-sm font-medium">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-gray-900/90 backdrop-blur-md rounded-xl shadow-2xl py-2 border border-gray-700">
                            <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-gray-800/50 transition-colors duration-200">Dashboard</a>
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-gray-800/50 transition-colors duration-200">Profile</a>
                            <div class="border-t border-gray-700 my-1"></div>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:text-red-300 hover:bg-gray-800/50 transition-colors duration-200">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-200 hover:text-red-700 focus:outline-none transition-colors duration-300">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu Panel -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translateY(-10px)" x-transition:enter-end="opacity-100 transform translateY(0)" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translateY(0)" x-transition:leave-end="opacity-0 transform -translateY(-10px)" class="md:hidden bg-black/95 backdrop-blur-md border-t border-white/10 max-h-[80vh] overflow-y-auto">
        <div class="px-4 py-4 space-y-3">
            @guest
                <a href="/trading" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Trading</a>
                <a href="/company" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Company</a>
                <a href="/education" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Education</a>
                <a href="/contact" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Contact</a>
                <div class="pt-4 space-y-3">
                    <a href="/login" class="block text-center py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border border-white/20 rounded-full">Login</a>
                    <a href="/register" class="block text-center py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-full transition-all duration-300">Get Started</a>
                </div>
            @else
                <div class="text-center py-4 border-b border-white/10">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-2">
                        <span class="text-white text-xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <p class="text-white font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
                </div>
                <a href="/dashboard" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Dashboard</a>
                <a href="/profile" class="block py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="block w-full text-left py-3 text-red-400 hover:text-red-300 transition-colors duration-300">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<!-- Crypto Ticker - Clean and simple -->
<div>
    <iframe 
        src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" 
        width="100%" 
        height="45px" 
        scrolling="auto" 
        marginwidth="0" 
        marginheight="0" 
        frameborder="0" 
        border="0" 
        style="border:0;margin:0;padding:0;display:block; margin-top: 4rem;">
    </iframe>
</div>

<style>
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Backdrop blur for glass morphism */
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
    }
    
    /* Custom scrollbar for mobile menu */
    .overflow-y-auto::-webkit-scrollbar {
        width: 4px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-track {
        background: #1f2937;
    }
    
    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #4b5563;
        border-radius: 4px;
    }
</style>