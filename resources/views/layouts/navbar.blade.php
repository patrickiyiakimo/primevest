<nav x-data="{ 
    mobileMenuOpen: false, 
    activeDropdown: null, 
    dropdownTimeout: null,
    activeMobileDropdown: null 
}" x-init="$nextTick(() => { mobileMenuOpen = false })" class="fixed top-0 left-0 right-0 z-50 bg-black backdrop-blur-md border-b border-white/10">
    
    <!-- Main Navbar -->
    <div class="relative z-50 bg-black backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center text-2xl font-bold text-white hover:text-red-700 transition-colors duration-300">
                        <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-10 w-auto"/>
                        <span class="ml-2">PrimeVest</span>
                    </a>
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
                                <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-md">
                                    <span class="text-white text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="text-gray-200 text-sm font-medium hidden lg:inline-block">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-56 bg-gray-900/95 backdrop-blur-md rounded-xl shadow-2xl py-2 border border-gray-700">
                                <div class="px-4 py-3 border-b border-gray-700 mb-2">
                                    <p class="text-white text-sm font-semibold">{{ Auth::user()->name }}</p>
                                    <p class="text-gray-400 text-xs">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-gray-800/50 transition-colors duration-200">Dashboard</a>
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-gray-800/50 transition-colors duration-200">Profile</a>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-gray-800/50 transition-colors duration-200">Settings</a>
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
    </div>
    
    <!-- Desktop Navigation Links - Below with white background -->
    <div class="hidden md:block bg-white border-b border-gray-200 relative z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-8 py-3">
                <!-- Trading Dropdown -->
                <div class="relative" 
                     @mouseenter="clearTimeout(dropdownTimeout); activeDropdown = 'trading'" 
                     @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)">
                    <a href="/trading" class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium  py-2 flex items-center gap-1">
                        Trading
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'trading' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Company Dropdown -->
                <div class="relative" 
                     @mouseenter="clearTimeout(dropdownTimeout); activeDropdown = 'company'" 
                     @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)">
                    <a href="/company" class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1">
                        Company
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Education Dropdown -->
                <div class="relative" 
                     @mouseenter="clearTimeout(dropdownTimeout); activeDropdown = 'education'" 
                     @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)">
                    <a href="/education" class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium py-2 flex items-center gap-1">
                        Education
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'education' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Contact Dropdown -->
                <div class="relative" 
                     @mouseenter="clearTimeout(dropdownTimeout); activeDropdown = 'contact'" 
                     @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)">
                    <a href="/contact" class="text-gray-700 hover:text-red-600 transition-all duration-300 text-sm font-medium  py-2 flex items-center gap-1">
                        Contact
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'contact' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DESKTOP FULL SCREEN DROPDOWNS WITH CTA -->
    
    <!-- Trading Full Screen Dropdown -->
    <div x-show="activeDropdown === 'trading'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translateY(-10px)"
         x-transition:enter-end="opacity-100 transform translateY(0)"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translateY(0)"
         x-transition:leave-end="opacity-0 transform -translateY(-10px)"
         @mouseenter="clearTimeout(dropdownTimeout)"
         @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)"
         class="fixed top-[97px] left-0 right-0 bg-white shadow-2xl z-30 overflow-y-auto"
         style="display: none; min-height: calc(100vh - 97px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Forex Trading</h3>
                            <ul class="space-y-2">
                                <li><a href="/forex/majors" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Major Pairs</a></li>
                                <li><a href="/forex/minors" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Minor Pairs</a></li>
                                <li><a href="/forex/exotics" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Exotic Pairs</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Shares Trading</h3>
                            <ul class="space-y-2">
                                <li><a href="/shares/us" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">US Stocks</a></li>
                                <li><a href="/shares/uk" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">UK Stocks</a></li>
                                <li><a href="/shares/europe" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">European Stocks</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">CFD Trading</h3>
                            <ul class="space-y-2">
                                <li><a href="/cfd/indices" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Indices</a></li>
                                <li><a href="/cfd/commodities" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Commodities</a></li>
                                <li><a href="/cfd/crypto" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Cryptocurrencies</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- CTA Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Start Trading Today</h3>
                    <p class="text-gray-600 text-sm mb-4">Open an account and start trading with competitive spreads</p>
                    <a href="/register" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                        Open Trading Account
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Company Full Screen Dropdown -->
    <div x-show="activeDropdown === 'company'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translateY(-10px)"
         x-transition:enter-end="opacity-100 transform translateY(0)"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translateY(0)"
         x-transition:leave-end="opacity-0 transform -translateY(-10px)"
         @mouseenter="clearTimeout(dropdownTimeout)"
         @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)"
         class="fixed top-[97px] left-0 right-0 bg-white shadow-2xl z-30 overflow-y-auto"
         style="display: none; min-height: calc(100vh - 97px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">About Us</h3>
                            <ul class="space-y-2">
                                <li><a href="/company/overview" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Company Overview</a></li>
                                <li><a href="/company/mission" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Mission & Values</a></li>
                                <li><a href="/company/leadership" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Leadership Team</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Legal</h3>
                            <ul class="space-y-2">
                                <li><a href="/privacy-policy" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Privacy Policy</a></li>
                                <li><a href="/terms" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Terms & Conditions</a></li>
                                <li><a href="/compliance" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Compliance</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Regulation</h3>
                            <ul class="space-y-2">
                                <li><a href="/regulation/fca" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">FCA Regulation</a></li>
                                <li><a href="/regulation/cysec" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">CySEC Regulation</a></li>
                                <li><a href="/regulation/client-funds" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Client Fund Security</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Careers</h3>
                            <ul class="space-y-2">
                                <li><a href="/careers" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Join Our Team</a></li>
                                <li><a href="/careers/openings" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Open Positions</a></li>
                                <li><a href="/careers/culture" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Company Culture</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- CTA Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Join Our Team</h3>
                    <p class="text-gray-600 text-sm mb-4">Explore career opportunities at PrimeVest</p>
                    <a href="/careers" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                        View Open Positions
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Education Full Screen Dropdown -->
    <div x-show="activeDropdown === 'education'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translateY(-10px)"
         x-transition:enter-end="opacity-100 transform translateY(0)"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translateY(0)"
         x-transition:leave-end="opacity-0 transform -translateY(-10px)"
         @mouseenter="clearTimeout(dropdownTimeout)"
         @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)"
         class="fixed top-[97px] left-0 right-0 bg-white shadow-2xl z-30 overflow-y-auto"
         style="display: none; min-height: calc(100vh - 97px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Trading Academy</h3>
                            <ul class="space-y-2">
                                <li><a href="/academy/beginners" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Beginners Course</a></li>
                                <li><a href="/academy/intermediate" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Intermediate Course</a></li>
                                <li><a href="/academy/advanced" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Advanced Course</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Webinars</h3>
                            <ul class="space-y-2">
                                <li><a href="/webinars/live" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Live Webinars</a></li>
                                <li><a href="/webinars/recorded" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Recorded Sessions</a></li>
                                <li><a href="/webinars/upcoming" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Upcoming Events</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Resources</h3>
                            <ul class="space-y-2">
                                <li><a href="/resources/ebooks" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">E-books & Guides</a></li>
                                <li><a href="/resources/videos" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Video Tutorials</a></li>
                                <li><a href="/resources/glossary" class="block text-gray-600 hover:text-red-600 hover:bg-gray-50 border-l-2 border-transparent hover:border-red-500 pl-3 py-1.5 transition-all duration-200">Trading Glossary</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- CTA Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Start Learning Today</h3>
                    <p class="text-gray-600 text-sm mb-4">Access free trading courses and webinars</p>
                    <a href="/education" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                        Explore Learning Hub
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Contact Full Screen Dropdown -->
    <div x-show="activeDropdown === 'contact'" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translateY(-10px)"
         x-transition:enter-end="opacity-100 transform translateY(0)"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translateY(0)"
         x-transition:leave-end="opacity-0 transform -translateY(-10px)"
         @mouseenter="clearTimeout(dropdownTimeout)"
         @mouseleave="dropdownTimeout = setTimeout(() => { activeDropdown = null }, 150)"
         class="fixed top-[97px] left-0 right-0 bg-white shadow-2xl z-30 overflow-y-auto"
         style="display: none; min-height: calc(100vh - 97px);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Get In Touch</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-800">Email Us</p>
                                        <a href="mailto:support@primevest.com" class="text-gray-600 hover:text-red-600 transition">support@primevest.com</a>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-800">Call Us</p>
                                        <a href="tel:+1-800-PRIMEVEST" class="text-gray-600 hover:text-red-600 transition">+1-800-PRIMEVEST</a>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-semibold text-gray-800">Visit Us</p>
                                        <p class="text-gray-600">123 Financial District, New York, NY 10005</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Support Hours</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li>Monday - Friday: 24/7</li>
                                <li>Saturday: 24/7</li>
                                <li>Sunday: 24/7</li>
                            </ul>
                            <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                                <p class="text-sm text-gray-600">Our multilingual support team is available around the clock to assist you with any questions.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CTA Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636L16.95 7.05m0 0a7 7 0 11-9.9 9.9 7 7 0 019.9-9.9zM12 12v.01M9 9h.01M15 9h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Need Help?</h3>
                    <p class="text-gray-600 text-sm mb-4">Our support team is ready to assist you 24/7</p>
                    <a href="/contact" class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                        Contact Support
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MOBILE MENU PANEL WITH ANIMATIONS (Same as before - keeping it clean) -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0 transform -translateY(-20px)" 
         x-transition:enter-end="opacity-100 transform translateY(0)" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100 transform translateY(0)" 
         x-transition:leave-end="opacity-0 transform -translateY(-20px)" 
         class="md:hidden bg-black/95 backdrop-blur-md border-t border-white/10 max-h-[85vh] overflow-y-auto"
         style="display: none;">
        
        <div class="px-4 py-4 space-y-2">
            @guest
                <!-- Trading Mobile Dropdown with Animation -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Trading</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/forex/majors" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Major Pairs</a>
                        <a href="/forex/minors" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Minor Pairs</a>
                        <a href="/shares/us" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">US Stocks</a>
                        <a href="/cfd/indices" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Indices</a>
                    </div>
                </div>
                
                <!-- Company Mobile Dropdown with Animation -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Company</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/company/overview" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Company Overview</a>
                        <a href="/company/mission" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Mission & Values</a>
                        <a href="/company/leadership" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Leadership Team</a>
                        <a href="/careers" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Careers</a>
                    </div>
                </div>
                
                <!-- Education Mobile Dropdown with Animation -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Education</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/academy/beginners" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Beginners Course</a>
                        <a href="/academy/intermediate" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Intermediate Course</a>
                        <a href="/webinars/live" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Live Webinars</a>
                        <a href="/resources/ebooks" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">E-books & Guides</a>
                    </div>
                </div>
                
                <!-- Contact Mobile Dropdown with Animation -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Contact</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="mailto:support@primevest.com" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Email Support</a>
                        <a href="tel:+1-800-PRIMEVEST" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Call Us</a>
                        <div class="py-2 text-sm text-gray-500">24/7 Support Available</div>
                    </div>
                </div>
                
                <!-- Mobile Auth Buttons -->
                <div class="pt-6 space-y-3">
                    <a href="/login" class="block text-center py-3 text-gray-200 hover:text-white transition-all duration-300 border border-white/20 rounded-full hover:bg-white/10">Login</a>
                    <a href="/register" class="block text-center py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-full transition-all duration-300 shadow-lg">Get Started</a>
                </div>
                
            @else
                <!-- User Profile Section (Mobile) -->
                <div class="text-center py-6 border-b border-white/10 mb-2">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center mx-auto mb-3 shadow-xl">
                        <span class="text-white text-2xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <p class="text-white font-semibold text-lg">{{ Auth::user()->name }}</p>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
                    <div class="mt-3 inline-flex items-center px-3 py-1 bg-green-500/20 rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-green-400 text-xs">Active</span>
                    </div>
                </div>
                
                <!-- Trading Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3.5 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Trading</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/forex/majors" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Forex Trading</a>
                        <a href="/shares/us" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Shares Trading</a>
                        <a href="/cfd/indices" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">CFD Trading</a>
                    </div>
                </div>
                
                <!-- Company Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3.5 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Company</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/company/overview" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">About Us</a>
                        <a href="/privacy-policy" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Privacy Policy</a>
                        <a href="/careers" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Careers</a>
                    </div>
                </div>
                
                <!-- Education Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3.5 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Education</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="/academy/beginners" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Trading Academy</a>
                        <a href="/webinars/live" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Webinars</a>
                        <a href="/resources/ebooks" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Resources</a>
                    </div>
                </div>
                
                <!-- Contact Mobile Dropdown -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between py-3.5 text-gray-200 hover:text-red-700 transition-colors duration-300 border-b border-white/10">
                        <span class="text-sm font-medium">Contact</span>
                        <svg class="w-4 h-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse.duration.300ms class="pl-4 mt-2 space-y-2 overflow-hidden">
                        <a href="mailto:support@primevest.com" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">Email Support</a>
                        <a href="tel:+1-800-PRIMEVEST" class="block py-2 text-sm text-gray-400 hover:text-red-400 transition transform translate-x-0 hover:translate-x-1 duration-200">24/7 Helpline</a>
                    </div>
                </div>
                
                <!-- Dashboard Link -->
                <a href="/dashboard" class="block py-3.5 text-gray-200 hover:text-red-700 transition-all duration-300 border-b border-white/10 hover:pl-2">Dashboard</a>
                
                <!-- Logout Button -->
                <form method="POST" action="/logout" class="pt-4">
                    @csrf
                    <button type="submit" class="block w-full text-center py-3 text-red-400 hover:text-red-300 transition-all duration-300 border border-red-500/30 rounded-full bg-red-500/10 hover:bg-red-500/20">Logout</button>
                </form>
            @endguest
        </div>
    </div>
    
</nav>






<!-- Hero Section with Video Loading State -->
<div class="relative min-h-screen sm:min-h-[250px] md:min-h-[500px] lg:min-h-[600px] xl:min-h-[700px] overflow-hidden flex flex-col">
   
    <!-- Loading State (shows while video loads) -->
    <div id="video-loading" class="absolute inset-0 z-20 bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center">
        <div class="text-center">
            <!-- Animated Logo/Text -->
            <div class="relative mb-6">
                <h1 class="text-xl md:text-3xl font-bold tracking-wider">
                    <span class="bg-gradient-to-r from-red-400 via-red-500 to-red-600 bg-clip-text text-transparent animate-pulse">
                        PrimeVest
                    </span>
                </h1>
                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-red-500 rounded-full animate-pulse"></div>
            </div>
            
            <!-- Loading Dots -->
            <div class="flex items-center justify-center space-x-2 mt-6">
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
            
            <!-- Loading Status Text -->
            <!-- <p id="loading-status" class="text-gray-400 text-sm mt-4">Loading video...</p> -->
        </div>
    </div>

    <!-- Video Background (hidden initially) -->
    <div id="video-container" class="absolute inset-0 z-0 opacity-0 transition-opacity duration-700">
        <video id="hero-video" class="w-full h-full object-cover" autoplay loop muted playsinline preload="auto">
            <source src="{{ asset('videos/primevest-video4.mp4') }}" type="video/mp4">
            <!-- Fallback image in case video doesn't load -->
            <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=1920&h=1080&fit=crop" 
                 alt="Trading Background">
        </video>
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-gray-900/80"></div>
    </div>
    
    <!-- Hero Content (hidden until video is ready) -->
    <div id="hero-content" class="relative z-10 flex-1 flex items-center opacity-0 transition-opacity duration-700">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-16 lg:py-20 w-full">
            <div class="max-w-4xl mx-auto sm:mx-0 text-center sm:text-left">
                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl font-bold text-white mb-5 sm:mb-4 md:mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-red-400 to-red-500 uppercase bg-clip-text text-transparent block">
                       Trade Shares and Forex <br class="hidden sm:hidden md:block">with Financial Thinking
                    </span>
                </h1>
                
                <!-- Description -->
                <p class="text-base sm:text-base md:text-lg lg:text-xl text-gray-200 leading-relaxed sm:leading-relaxed mb-8 sm:mb-8 md:mb-10 max-w-2xl mx-auto sm:mx-0">
                    Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                    Metals, Energies and Shares. Experience the global markets at your fingertips.
                </p>

                <!-- Button -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center sm:justify-start">
                    <a href="/register" 
                       class="group relative inline-flex items-center justify-center px-8 sm:px-8 py-4 sm:py-4 text-base sm:text-lg font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500">
                        <span>Create Free Account</span>
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="mt-10 sm:mt-10 md:mt-12 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center sm:justify-start">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Regulated Broker</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Zero Commission</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Instant Execution</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Secure Platform</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Wait for video to be fully ready before showing
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('hero-video');
        const loadingDiv = document.getElementById('video-loading');
        const videoContainer = document.getElementById('video-container');
        const heroContent = document.getElementById('hero-content');
        const loadingStatus = document.getElementById('loading-status');
        
        function showContent() {
            // Fade out loading state
            if (loadingDiv) {
                loadingDiv.style.opacity = '0';
                setTimeout(function() {
                    loadingDiv.style.display = 'none';
                }, 500);
            }
            
            // Show video and hero content with fade in
            if (videoContainer) {
                videoContainer.style.opacity = '1';
            }
            
            if (heroContent) {
                heroContent.style.opacity = '1';
            }
            
            // Ensure video is playing
            if (video) {
                video.play().catch(function(e) {
                    console.log('Video autoplay prevented:', e);
                });
            }
        }
        
        if (video) {
            // Update loading status text
            const updateStatus = (message) => {
                if (loadingStatus) loadingStatus.textContent = message;
            };
            
            updateStatus('Loading video...');
            
            // Check if video is already loaded and ready to play
            if (video.readyState >= 3) { // HAVE_FUTURE_DATA or HAVE_ENOUGH_DATA
                updateStatus('Video ready!');
                showContent();
            }
            
            // When video has enough data to play through
            video.addEventListener('canplaythrough', function() {
                updateStatus('Video ready!');
                setTimeout(showContent, 300); // Small delay for smooth transition
            });
            
            // When video metadata is loaded (fallback)
            video.addEventListener('loadedmetadata', function() {
                if (video.readyState < 3) {
                    updateStatus('Preparing video stream...');
                }
            });
            
            // When video starts playing
            video.addEventListener('playing', function() {
                if (loadingDiv && loadingDiv.style.display !== 'none') {
                    updateStatus('Playing now...');
                    showContent();
                }
            });
            
            // Fallback: force show after 5 seconds regardless
            setTimeout(function() {
                if (loadingDiv && loadingDiv.style.display !== 'none') {
                    updateStatus('Starting now...');
                    showContent();
                }
            }, 5000);
            
        } else {
            // No video element found, hide loading immediately
            if (loadingDiv) loadingDiv.style.display = 'none';
            if (heroContent) heroContent.style.opacity = '1';
        }
    });
</script>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }
    .animate-bounce {
        animation: bounce 2s infinite;
    }
    
    /* Prevent any layout shift */
    #video-loading,
    #video-container,
    #hero-content {
        transition: opacity 0.5s ease-in-out;
    }
</style>