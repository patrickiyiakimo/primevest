<nav class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 shadow-2xl border-b border-slate-700 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2 group">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center shadow-lg transform transition-transform group-hover:scale-110">
                        <span class="text-white font-bold text-xl">P</span>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                        PrimeVest
                    </span>
                </a>
            </div>
            
            <!-- Main Navigation Links - Desktop -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="/trading" 
                   class="relative px-4 py-2 text-gray-300 hover:text-white transition-all duration-300 group">
                    <span>Trading</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/system"
                   class="relative px-4 py-2 text-gray-300 hover:text-white transition-all duration-300 group">
                    <span>System</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/company"
                   class="relative px-4 py-2 text-gray-300 hover:text-white transition-all duration-300 group">
                    <span>Company</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="/education"
                   class="relative px-4 py-2 text-gray-300 hover:text-white transition-all duration-300 group">
                    <span>Education</span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
            
            <!-- Auth Buttons - Desktop -->
            <div class="hidden md:flex md:items-center md:space-x-3">
                @guest
                    <a href="/login" 
                       class="px-5 py-2 text-gray-300 hover:text-white transition-all duration-300 rounded-lg hover:bg-slate-700">
                        Login
                    </a>
                    <a href="/register"
                       class="px-5 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-xl">
                        Get Started
                    </a>
                @else
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center space-x-3 px-4 py-2 rounded-lg bg-slate-700 hover:bg-slate-600 transition-all duration-300 group">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center">
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
                             class="absolute right-0 mt-2 w-56 bg-slate-800 rounded-xl shadow-2xl py-2 z-50 border border-slate-700">
                            <a href="/dashboard" 
                               class="flex items-center space-x-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                            <a href="/profile" 
                               class="flex items-center space-x-3 px-4 py-2.5 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Profile</span>
                            </a>
                            <div class="border-t border-slate-700 my-1"></div>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" 
                                        class="flex items-center space-x-3 w-full px-4 py-2.5 text-sm text-red-400 hover:bg-slate-700 hover:text-red-300 transition-all duration-200">
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

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="text-gray-300 hover:text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="md:hidden bg-slate-800 border-t border-slate-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/trading" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">Trading</a>
            <a href="/system" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">System</a>
            <a href="/company" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">Company</a>
            <a href="/education" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">Education</a>
            
            @guest
                <div class="pt-4 space-y-2">
                    <a href="/login" class="block px-3 py-2 text-center rounded-lg text-gray-300 hover:text-white hover:bg-slate-700">Login</a>
                    <a href="/register" class="block px-3 py-2 text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold">Get Started</a>
                </div>
            @else
                <div class="pt-4 border-t border-slate-700">
                    <div class="px-3 py-2 text-gray-300">Welcome, {{ Auth::user()->name }}</div>
                    <a href="/dashboard" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">Dashboard</a>
                    <a href="/profile" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-slate-700">Profile</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 rounded-md text-base font-medium text-red-400 hover:text-red-300 hover:bg-slate-700">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>

<!-- Add this to your layout file's head section or main app.blade.php -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            mobileMenuOpen: false
        }))
    })
</script>