<nav x-data="{ 
    mobileMenuOpen: false, 
    activeDropdown: null 
}" x-init="$nextTick(() => { mobileMenuOpen = false })" class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    
    <!-- Top Market Ticker Slider -->
    <div class="bg-blue-600 py-2 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-4">
                <div class="flex-1 text-center overflow-hidden">
                    <div x-data="{ 
                        messages: [
                            '🇺🇸 S&P 500 at all-time high | 📈 +1.2% today',
                            '🇪🇺 ECB maintains interest rates | EUR/USD steady at 1.0892',
                            '🇯🇵 Bank of Japan holds policy | USD/JPY trades at 148.50',
                            '🛢️ Crude oil rallies to $85 per barrel | Energy sector gains',
                            '💰 Gold hits $2,400 | Safe-haven demand increases'
                        ],
                        currentIndex: 0
                    }" 
                    x-init="setInterval(() => { currentIndex = (currentIndex + 1) % messages.length }, 4000)"
                    class="whitespace-nowrap">
                        <div class="inline-flex items-center gap-4 text-white text-sm">
                            <span class="font-semibold">MARKET UPDATE:</span>
                            <span x-text="messages[currentIndex]" class="font-medium"></span>
                        </div>
                    </div>
                </div>
               <a href="https://www.tradingview.com/markets/" target="_blank" rel="noopener noreferrer" class="flex-shrink-0 px-4 py-1.5 bg-blue-700 hover:bg-blue-800 text-white text-xs font-semibold rounded-full transition-all duration-300 border border-blue-500">
    View Market →
</a>
            </div>
        </div>
    </div>
    
    <!-- Main Navbar -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center gap-2">
                        <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-8 w-auto"/>
                        <span class="text-xl font-bold text-gray-800">PrimeVest</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-6">
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'trading' ? null : 'trading'" 
                                class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1 focus:outline-none">
                            Trading
                            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'trading' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'trading'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translateY(-10px)"
                             x-transition:enter-end="opacity-100 transform translateY(0)"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translateY(0)"
                             x-transition:leave-end="opacity-0 transform -translateY(-10px)"
                             class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-30"
                             style="display: none;">
                            <a href="/forex/majors" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Forex Trading</a>
                            <a href="/shares/us" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Shares Trading</a>
                            <a href="/cfd/indices" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">CFD Trading</a>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'company' ? null : 'company'" 
                                class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1 focus:outline-none">
                            Company
                            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'company'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translateY(-10px)"
                             x-transition:enter-end="opacity-100 transform translateY(0)"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translateY(0)"
                             x-transition:leave-end="opacity-0 transform -translateY(-10px)"
                             class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-30"
                             style="display: none;">
                            <a href="/company" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">About Us</a>
                            <a href="/awards" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Awards</a>
                            <a href="/careers" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Careers</a>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'education' ? null : 'education'" 
                                class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1 focus:outline-none">
                            Education
                            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'education' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'education'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translateY(-10px)"
                             x-transition:enter-end="opacity-100 transform translateY(0)"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translateY(0)"
                             x-transition:leave-end="opacity-0 transform -translateY(-10px)"
                             class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-30"
                             style="display: none;">
                            <a href="/academy/beginners" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Trading Academy</a>
                            <a href="/webinars/live" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Webinars</a>
                            <a href="/resources/ebooks" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Resources</a>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <button @click="activeDropdown = activeDropdown === 'contact' ? null : 'contact'" 
                                class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1 focus:outline-none">
                            Contact
                            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': activeDropdown === 'contact' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="activeDropdown === 'contact'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translateY(-10px)"
                             x-transition:enter-end="opacity-100 transform translateY(0)"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translateY(0)"
                             x-transition:leave-end="opacity-0 transform -translateY(-10px)"
                             class="absolute left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-30"
                             style="display: none;">
                            <a href="/contact" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Contact Us</a>
                            <a href="mailto:support@primevest.com" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Email Support</a>
                            <a href="tel:+1-800-PRIMEVEST" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">24/7 Helpline</a>
                        </div>
                    </div>
                </div>
                
                <!-- Desktop Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="/login" class="text-gray-600 hover:text-red-600 transition-all duration-300 text-sm font-medium">Login</a>
                        <a href="/register" class="px-5 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white text-sm font-medium rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                            Get Started
                        </a>
                    @else
                        <div class="relative" x-data="{ dropdownOpen: false }">
                            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-md">
                                    <span class="text-white text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-700 text-sm font-medium hidden lg:inline-block">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl py-2 border border-gray-100">
                                <div class="px-4 py-3 border-b border-gray-100 mb-2">
                                    <p class="text-gray-800 text-sm font-semibold">{{ Auth::user()->name }}</p>
                                    <p class="text-gray-400 text-xs">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Dashboard</a>
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Profile</a>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:text-red-600 hover:bg-gray-50 transition">Settings</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-500 hover:text-red-600 hover:bg-gray-50 transition">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-600 hover:text-red-600 focus:outline-none transition-colors duration-300">
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
    
    <!-- Mobile Menu Panel -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0 transform -translateY(-10px)" 
         x-transition:enter-end="opacity-100 transform translateY(0)" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100 transform translateY(0)" 
         x-transition:leave-end="opacity-0 transform -translateY(-10px)" 
         class="md:hidden bg-white border-t border-gray-100 max-h-[85vh] overflow-y-auto shadow-lg"
         style="display: none;">
        
        <div class="px-4 py-4 space-y-2">
            @guest
                <!-- Trading Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Trading</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/forex/majors" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Forex Trading</a>
                        <a href="/shares/us" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Shares Trading</a>
                        <a href="/cfd/indices" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">CFD Trading</a>
                    </div>
                </div>
                
                <!-- Company Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Company</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/company" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">About Us</a>
                        <a href="/awards" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Awards</a>
                        <a href="/careers" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Careers</a>
                    </div>
                </div>
                
                <!-- Education Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Education</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/academy/beginners" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Trading Academy</a>
                        <a href="/webinars/live" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Webinars</a>
                        <a href="/resources/ebooks" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Resources</a>
                    </div>
                </div>
                
                <!-- Contact Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Contact</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/contact" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Contact Us</a>
                        <a href="mailto:support@primevest.com" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Email Support</a>
                    </div>
                </div>
                
                <!-- Mobile Auth Buttons -->
                <div class="pt-6 space-y-3">
                    <a href="/login" class="block text-center py-3 text-gray-700 hover:text-red-600 transition-all duration-300 border border-gray-300 rounded-full">Login</a>
                    <a href="/register" class="block text-center py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-full transition-all duration-300 shadow-md">Get Started</a>
                </div>
                
            @else
                <!-- User Profile Section -->
                <div class="text-center py-6 border-b border-gray-100 mb-2">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center mx-auto mb-3 shadow-md">
                        <span class="text-white text-2xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <p class="text-gray-800 font-semibold text-lg">{{ Auth::user()->name }}</p>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
                    <div class="mt-3 inline-flex items-center px-3 py-1 bg-green-100 rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-green-600 text-xs">Active</span>
                    </div>
                </div>
                
                <!-- Trading Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Trading</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/forex/majors" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Forex Trading</a>
                        <a href="/shares/us" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Shares Trading</a>
                        <a href="/cfd/indices" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">CFD Trading</a>
                    </div>
                </div>
                
                <!-- Company Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Company</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/company" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">About Us</a>
                        <a href="/awards" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Awards</a>
                        <a href="/careers" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Careers</a>
                    </div>
                </div>
                
                <!-- Education Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Education</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/academy/beginners" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Trading Academy</a>
                        <a href="/webinars/live" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Webinars</a>
                        <a href="/resources/ebooks" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Resources</a>
                    </div>
                </div>
                
                <!-- Contact Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">
                        <span class="text-sm font-medium">Contact</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/contact" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Contact Us</a>
                        <a href="mailto:support@primevest.com" class="block py-2 text-sm text-gray-500 hover:text-red-600 transition">Email Support</a>
                    </div>
                </div>
                
                <!-- Dashboard Link -->
                <a href="/dashboard" class="block py-3 text-gray-700 hover:text-red-600 transition-colors duration-300 border-b border-gray-100">Dashboard</a>
                
                <!-- Logout Button -->
                <form method="POST" action="/logout" class="pt-4">
                    @csrf
                    <button type="submit" class="block w-full text-center py-3 text-red-500 hover:text-red-600 transition-all duration-300 border border-red-300 rounded-full bg-red-50 hover:bg-red-100">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<style>
    /* Prevent FOUC - hide content until Alpine is ready */
    [x-cloak] {
        display: none !important;
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Custom transition for mobile dropdowns */
    .x-collapse {
        transition: all 0.3s ease-out !important;
    }
    
    /* Focus outline removal */
    button:focus {
        outline: none;
    }
</style>

<!-- Include Alpine.js with Collapse plugin -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>