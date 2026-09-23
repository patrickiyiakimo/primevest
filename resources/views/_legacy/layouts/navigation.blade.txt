<nav x-data="{ 
    mobileMenuOpen: false, 
    activeDropdown: null,
    userMenuOpen: false
}" x-init="$nextTick(() => { mobileMenuOpen = false })" @keydown.escape.window="mobileMenuOpen = false; activeDropdown = null; userMenuOpen = false" @click.outside="activeDropdown = null; userMenuOpen = false" class="fixed top-0 left-0 right-0 z-50">
    
    <!-- Top Utility Ribbon -->
    <div class="bg-slate-900 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="hidden md:flex items-center justify-between h-9">
                <div class="flex items-center gap-6">
                    <a href="mailto:support@primevest.com" class="flex items-center gap-1.5 text-xs text-slate-400 hover:text-white transition-colors duration-300">
                        <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        support@primevest.com
                    </a>
                    <a href="tel:+1-800-PRIMEVEST" class="flex items-center gap-1.5 text-xs text-slate-400 hover:text-white transition-colors duration-300">
                        <svg class="w-3.5 h-3.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        +1-800-PRIMEVEST
                    </a>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></span>
                        Live Markets
                    </span>
                    <span class="text-slate-600 mx-1">|</span>
                    @guest
                        <a href="/login" class="hover:text-white transition-colors duration-300 font-medium">Client Login</a>
                        <span class="text-slate-600 mx-1">|</span>
                        <a href="/register" class="text-red-400 hover:text-red-300 transition-colors duration-300 font-medium">Open Account</a>
                    @else
                        <a href="/dashboard" class="hover:text-white transition-colors duration-300 font-medium">My Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <div class="bg-white/90 backdrop-blur-xl border-b border-gray-100 shadow-[0_1px_3px_rgba(0,0,0,0.04),0_8px_24px_-12px_rgba(0,0,0,0.12)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[72px]">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center gap-2.5 group">
                        <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-9 w-auto transition-transform duration-300 group-hover:scale-105"/>
                        <span class="text-xl font-extrabold tracking-tight text-gray-900">
                            Prime<span class="text-red-600">Vest</span>
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center gap-1">
                    <!-- Trading Dropdown -->
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'trading' ? null : 'trading'" 
                                :class="activeDropdown === 'trading' ? 'text-red-600' : 'text-gray-700 hover:text-red-600'"
                                class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 focus:outline-none">
                            Trading
                            <svg class="w-3 h-3 opacity-60 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'trading' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'trading'" 
                             @click.stop
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                             class="absolute left-0 top-full pt-3 z-30"
                             style="display: none;">
                            <div class="w-60 bg-white rounded-2xl shadow-2xl shadow-gray-900/10 ring-1 ring-gray-900/5 p-2 overflow-hidden">
                                <div class="absolute top-0 left-6 w-8 h-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-b-full"></div>
                                <a href="/forex/majors" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Forex Trading
                                </a>
                                <a href="/shares/us" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Shares Trading
                                </a>
                                <a href="/cfd/indices" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    CFD Trading
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Company Dropdown -->
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'company' ? null : 'company'" 
                                :class="activeDropdown === 'company' ? 'text-red-600' : 'text-gray-700 hover:text-red-600'"
                                class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 focus:outline-none">
                            Company
                            <svg class="w-3 h-3 opacity-60 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'company'" 
                             @click.stop
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                             class="absolute left-0 top-full pt-3 z-30"
                             style="display: none;">
                            <div class="w-60 bg-white rounded-2xl shadow-2xl shadow-gray-900/10 ring-1 ring-gray-900/5 p-2 overflow-hidden">
                                <div class="absolute top-0 left-6 w-8 h-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-b-full"></div>
                                <a href="/company" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    About Us
                                </a>
                                <a href="/awards" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Awards
                                </a>
                                <a href="/careers" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Careers
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Real Estate -->
                    <a href="/real-estate" class="px-4 py-2.5 rounded-lg text-sm font-semibold text-gray-700 hover:text-red-600 transition-all duration-200 group relative">
                        Real Estate
                        <span class="absolute left-4 bottom-1.5 w-0 h-0.5 bg-red-600 rounded-full transition-all duration-300 group-hover:w-12"></span>
                    </a>
                    
                    <!-- Education Dropdown -->
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'education' ? null : 'education'" 
                                :class="activeDropdown === 'education' ? 'text-red-600' : 'text-gray-700 hover:text-red-600'"
                                class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 focus:outline-none">
                            Education
                            <svg class="w-3 h-3 opacity-60 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'education' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'education'" 
                             @click.stop
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                             class="absolute left-0 top-full pt-3 z-30"
                             style="display: none;">
                            <div class="w-60 bg-white rounded-2xl shadow-2xl shadow-gray-900/10 ring-1 ring-gray-900/5 p-2 overflow-hidden">
                                <div class="absolute top-0 left-6 w-8 h-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-b-full"></div>
                                <a href="/academy/beginners" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Trading Academy
                                </a>
                                <a href="/webinars/live" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Webinars
                                </a>
                                <a href="/resources/ebooks" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Resources
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Dropdown -->
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'contact' ? null : 'contact'" 
                                :class="activeDropdown === 'contact' ? 'text-red-600' : 'text-gray-700 hover:text-red-600'"
                                class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-all duration-200 flex items-center gap-1.5 focus:outline-none">
                            Contact
                            <svg class="w-3 h-3 opacity-60 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'contact' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'contact'" 
                             @click.stop
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                             x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                             class="absolute left-0 top-full pt-3 z-30"
                             style="display: none;">
                            <div class="w-60 bg-white rounded-2xl shadow-2xl shadow-gray-900/10 ring-1 ring-gray-900/5 p-2 overflow-hidden">
                                <div class="absolute top-0 left-6 w-8 h-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-b-full"></div>
                                <a href="/contact" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Contact Us
                                </a>
                                <a href="mailto:support@primevest.com" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    Email Support
                                </a>
                                <a href="tel:+1-800-PRIMEVEST" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 transition-transform duration-200 group-hover:scale-150"></span>
                                    24/7 Helpline
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Desktop Auth Buttons -->
                <div class="hidden lg:flex items-center gap-3">
                    @guest
                        <a href="/login" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-red-600 transition-colors duration-200 relative group">
                            Login
                            <span class="absolute left-4 bottom-1 w-0 h-0.5 bg-red-600 rounded-full transition-all duration-300 group-hover:w-8"></span>
                        </a>
                        <a href="/register" class="group relative inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-red-600 to-red-500 text-white text-sm font-bold transition-all duration-300 shadow-lg shadow-red-600/25 hover:shadow-xl hover:shadow-red-600/35 hover:-translate-y-0.5">
                            Get Started
                            <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    @else
                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-2.5 rounded-full py-1.5 pl-1.5 pr-3 border border-gray-200 hover:border-red-300 bg-white hover:bg-red-50/50 transition-all duration-200 focus:outline-none">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center shadow-md shadow-red-600/20">
                                    <span class="text-white text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-700 text-sm font-semibold hidden xl:inline-block">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="dropdownOpen" @click.stop x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                                 class="absolute right-0 top-full pt-3 z-30" style="display: none;">
                                <div class="w-64 bg-white rounded-2xl shadow-2xl shadow-gray-900/10 ring-1 ring-gray-900/5 overflow-hidden">
                                    <div class="px-4 py-4 bg-gradient-to-r from-red-600 to-red-500">
                                        <p class="text-white text-sm font-bold">{{ Auth::user()->name }}</p>
                                        <p class="text-red-100 text-xs mt-0.5 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="p-2">
                                        <a href="/dashboard" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">Dashboard</a>
                                        <a href="/profile" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">Profile</a>
                                        <a href="/settings" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm text-gray-700 hover:text-red-600 hover:bg-red-50 transition-all duration-150">Settings</a>
                                        <div class="h-px bg-gray-100 my-1.5"></div>
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button type="submit" class="w-full text-left px-3.5 py-2.5 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 transition-all duration-150">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-700 hover:text-red-600 hover:bg-red-50 focus:outline-none transition-colors duration-200">
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
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div x-show="mobileMenuOpen" x-cloak @click="mobileMenuOpen = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="lg:hidden fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40"
         style="display: none;"></div>
    
    <!-- Mobile Menu Drawer -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-full"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-full"
         class="lg:hidden fixed top-0 right-0 bottom-0 w-[320px] max-w-[85vw] bg-white shadow-2xl shadow-gray-900/20 z-50 flex flex-col"
         style="display: none;">
        
        <!-- Drawer Header -->
        <div class="flex items-center justify-between px-5 h-16 border-b border-gray-100 flex-shrink-0">
            <div class="flex items-center gap-2.5">
                <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-8 w-auto"/>
                <span class="text-lg font-extrabold tracking-tight text-gray-900">
                    Prime<span class="text-red-600">Vest</span>
                </span>
            </div>
            <button @click="mobileMenuOpen = false" class="w-9 h-9 flex items-center justify-center rounded-lg text-gray-500 hover:text-red-600 hover:bg-red-50 transition-colors duration-200">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="flex-1 overflow-y-auto px-5 py-5 space-y-1.5">
            
            @if (auth()->user())
                <!-- User Profile Section -->
                <div class="rounded-2xl bg-gradient-to-br from-red-600 to-red-500 p-5 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-white/15 rounded-full flex items-center justify-center ring-2 ring-white/30">
                            <span class="text-white text-xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-white font-bold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-red-100 text-xs truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="mt-3 inline-flex items-center px-2.5 py-1 bg-white/15 rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-white text-[11px] font-semibold">Active Account</span>
                    </div>
                </div>
            @endif
            
            <!-- Trading Mobile Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-3 px-3 rounded-xl text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                    <span class="text-sm font-semibold">Trading</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms class="pl-4 overflow-hidden">
                    <div class="ml-3 border-l-2 border-red-100 pl-3 py-1 space-y-1">
                        <a href="/forex/majors" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Forex Trading</a>
                        <a href="/shares/us" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Shares Trading</a>
                        <a href="/cfd/indices" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">CFD Trading</a>
                    </div>
                </div>
            </div>
            
            <!-- Company Mobile Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-3 px-3 rounded-xl text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                    <span class="text-sm font-semibold">Company</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms class="pl-4 overflow-hidden">
                    <div class="ml-3 border-l-2 border-red-100 pl-3 py-1 space-y-1">
                        <a href="/company" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">About Us</a>
                        <a href="/awards" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Awards</a>
                        <a href="/careers" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Careers</a>
                    </div>
                </div>
            </div>

            <a href="/real-estate" class="block py-3 px-3 rounded-xl text-sm font-semibold text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">Real Estate</a>
            
            <!-- Education Mobile Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-3 px-3 rounded-xl text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                    <span class="text-sm font-semibold">Education</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms class="pl-4 overflow-hidden">
                    <div class="ml-3 border-l-2 border-red-100 pl-3 py-1 space-y-1">
                        <a href="/academy/beginners" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Trading Academy</a>
                        <a href="/webinars/live" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Webinars</a>
                        <a href="/resources/ebooks" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Resources</a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Mobile Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center justify-between py-3 px-3 rounded-xl text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">
                    <span class="text-sm font-semibold">Contact</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="open" x-collapse.duration.300ms class="pl-4 overflow-hidden">
                    <div class="ml-3 border-l-2 border-red-100 pl-3 py-1 space-y-1">
                        <a href="/contact" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Contact Us</a>
                        <a href="mailto:support@primevest.com" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">Email Support</a>
                        <a href="tel:+1-800-PRIMEVEST" class="block py-2 px-3 text-sm text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition">24/7 Helpline</a>
                    </div>
                </div>
            </div>
            
            @guest
                <!-- Mobile Auth Buttons -->
                <div class="pt-5 mt-3 border-t border-gray-100 space-y-3">
                    <a href="/login" class="block text-center py-3 rounded-full text-sm font-semibold text-gray-700 hover:text-red-600 border border-gray-300 hover:border-red-300 transition-all duration-300">Login</a>
                    <a href="/register" class="block text-center py-3 rounded-full bg-gradient-to-r from-red-600 to-red-500 text-white text-sm font-bold shadow-lg shadow-red-600/25 hover:shadow-xl hover:shadow-red-600/35 transition-all duration-300">Get Started</a>
                </div>
            @else
                <!-- Logged In Links -->
                <div class="pt-5 mt-3 border-t border-gray-100 space-y-1">
                    <a href="/dashboard" class="block py-3 px-3 rounded-xl text-sm font-semibold text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">Dashboard</a>
                    <a href="/profile" class="block py-3 px-3 rounded-xl text-sm font-semibold text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">Profile</a>
                    <a href="/settings" class="block py-3 px-3 rounded-xl text-sm font-semibold text-gray-800 hover:text-red-600 hover:bg-red-50 transition-all duration-200">Settings</a>
                    <form method="POST" action="/logout" class="pt-3">
                        @csrf
                        <button type="submit" class="block w-full text-center py-3 rounded-full text-sm font-bold text-red-600 border border-red-200 bg-red-50 hover:bg-red-100 transition-all duration-300">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
        
        <!-- Drawer Footer -->
        <div class="px-5 py-4 border-t border-gray-100 bg-gray-50 flex-shrink-0">
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span>© {{ date('Y') }} PrimeVest</span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></span>
                    Markets Live
                </span>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Prevent FOUC - hide content until Alpine is ready */
    [x-cloak] {
        display: none !important;
    }
    
    /* Custom transition for mobile dropdowns */
    .x-collapse {
        transition: all 0.3s ease-out !important;
    }
    
    /* Focus outline removal */
    button:focus {
        outline: none;
    }
    
    /* Custom scrollbar for mobile drawer */
    .flex-1::-webkit-scrollbar {
        width: 4px;
    }
    .flex-1::-webkit-scrollbar-track {
        background: transparent;
    }
    .flex-1::-webkit-scrollbar-thumb {
        background-color: #e2e8f0;
        border-radius: 4px;
    }
</style>

<!-- Include Alpine.js with Collapse plugin -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>