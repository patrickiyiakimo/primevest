<header class="bg-gray-900 border-b border-gray-800 relative z-50">
        <!-- Top Navigation Bar -->
        <div x-data="{ mobileMenuOpen: false }" class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img class="h-8 w-auto" src="{{ asset('images/logoipsum-409.png') }}" alt="PrimevestMarket">
                        </a>
                    </div>

                    <!-- Main Navigation - Desktop -->
                    <nav class="hidden md:flex space-x-8">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="group inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-200 hover:text-white focus:outline-none">
                            <span>Trading</span>
                            <svg class="ml-2 h-4 w-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-dark-300 ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                                <a href="{{ route('cryptocurrencies') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Cryptocurrencies</a>
                                <a href="{{ route('forex') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Forex</a>
                                <a href="{{ route('shares') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Shares</a>
                                <a href="{{ route('indices') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Indices</a>
                                <a href="{{ route('etfs') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">ETFs</a>
                            </div>
                        </div>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="group inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-200 hover:text-white focus:outline-none">
                            <span>System</span>
                            <svg class="ml-2 h-4 w-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-dark-300 ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                                <a href="{{ route('trade') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Trade</a>
                                <a href="{{ route('copy') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Copy Trading</a>
                                <a href="{{ route('automate') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Automated Trading</a>
                            </div>
                        </div>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="group inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-200 hover:text-white focus:outline-none">
                            <span>Company</span>
                            <svg class="ml-2 h-4 w-4 text-gray-400 group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-dark-300 ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                                <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">About Us</a>
                                <a href="{{ route('why-us') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Why Us</a>
                                <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">FAQ</a>
                                <a href="{{ route('regulation') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">Legal & Regulation</a>
                            </div>
                        </div>

                        <a href="{{ route('for-traders') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-200 hover:text-white">Education</a>
                        <a href="{{ route('contacts') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-200 hover:text-white">Contact</a>
                    </nav>

                    <!-- Right Navigation -->
                    <div class="hidden md:flex items-center">
                        <div class="flex space-x-1 mr-4">
                            <a href="#" class="text-gray-400 hover:text-gray-200 p-1" aria-label="Desktop Version">
                                <i class="fas fa-desktop"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-200 p-1" aria-label="Windows App">
                                <i class="fab fa-windows"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-200 p-1" aria-label="Android App">
                                <i class="fab fa-android"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-200 p-1" aria-label="iOS App">
                                <i class="fab fa-apple"></i>
                            </a>
                        </div>

                        <!-- Language Selector (Desktop) -->


                        <!-- Dark/Light Mode Toggle -->
                        <!--<button-->
                        <!--    x-data-->
                        <!--    @click="$store.darkMode.toggle()"-->
                        <!--    class="p-2 text-gray-400 hover:text-gray-200 mr-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-600"-->
                        <!--    aria-label="Toggle dark/light mode"-->
                        <!-->-->
                        <!--    <i x-show="$store.darkMode.on" class="fas fa-sun"></i>-->
                        <!--    <i x-show="!$store.darkMode.on" class="fas fa-moon"></i>-->
                        <!--</button>-->

                        <div class="flex items-center space-x-4">
                            @auth
                            <div class="relative" x-data="{ userMenuOpen: false }">
                                <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" type="button" class="flex items-center space-x-2 text-gray-200 hover:text-white focus:outline-none">
                                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-600 text-white">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span class="text-sm font-medium max-w-32 truncate">{{ auth()->user()->name }}</span>
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="userMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-1" class="absolute right-0 mt-2 w-52 rounded-md shadow-lg py-1 bg-dark-300 ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">
                                        <i class="fas fa-tachometer-alt mr-2 w-4 text-gray-400"></i> Dashboard
                                    </a>
                                    <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-200 hover:bg-dark-200">
                                        <i class="fas fa-user mr-2 w-4 text-gray-400"></i> Profile
                                    </a>
                                    <div class="border-t border-gray-700 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-400 hover:bg-dark-200 text-left">
                                            <i class="fas fa-sign-out-alt mr-2 w-4"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @else
                            <a href="{{ route('login') }}" class="text-gray-200 hover:text-white flex items-center">
                                <i class="fas fa-lock mr-1"></i>
                                <span>Log in</span>
                            </a>
                            <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            Sign up
                        </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Mobile menu button and theme toggle -->
                    <div class="flex md:hidden items-center space-x-2">
                        <!-- Mobile Theme Toggle -->
                        <!--<button-->
                        <!--    x-data-->
                        <!--    @click="$store.darkMode.toggle()"-->
                        <!--    class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"-->
                        <!--    aria-label="Toggle dark/light mode"-->
                        <!-->-->
                        <!--    <i x-show="$store.darkMode.on" class="fas fa-sun text-lg"></i>-->
                        <!--    <i x-show="!$store.darkMode.on" class="fas fa-moon text-lg"></i>-->
                        <!--</button>-->

                        <!-- Mobile Menu Toggle -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu"
                            aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" class="md:hidden" id="mobile-menu" style="display: none;">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Mobile Navigation -->
                    <div x-data="{ open: false }" class="py-1">
                        <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">
                        <span>Trading</span>
                        <svg class="h-4 w-4 text-gray-400" :class="{'transform rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                        <div x-show="open" class="pl-4">
                            <a href="{{ route('cryptocurrencies') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Cryptocurrencies</a>
                            <a href="{{ route('forex') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Forex</a>
                            <a href="{{ route('shares') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Shares</a>
                            <a href="{{ route('indices') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Indices</a>
                            <a href="{{ route('etfs') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">ETFs</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="py-1">
                        <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">
                        <span>System</span>
                        <svg class="h-4 w-4 text-gray-400" :class="{'transform rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                        <div x-show="open" class="pl-4">
                            <a href="{{ route('trade') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Trade</a>
                            <a href="{{ route('copy') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Copy Trading</a>
                            <a href="{{ route('automate') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Automated Trading</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="py-1">
                        <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">
                        <span>Company</span>
                        <svg class="h-4 w-4 text-gray-400" :class="{'transform rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                        <div x-show="open" class="pl-4">
                            <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">About Us</a>
                            <a href="{{ route('why-us') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Why Us</a>
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">FAQ</a>
                            <a href="{{ route('regulation') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Legal & Regulation</a>
                        </div>
                    </div>

                    <a href="{{ route('for-traders') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Education</a>
                    <a href="{{ route('contacts') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Contact</a>

                    <!-- Language Selector (Mobile) -->

                    <div class="pt-4 pb-3 border-t border-gray-700">
                        @auth
                        <div class="px-4 space-y-1">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-blue-600 text-white">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded-md text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <i class="fas fa-tachometer-alt mr-2 w-4 text-gray-400"></i> Dashboard
                            </a>
                            <a href="{{ route('profile') }}" class="flex items-center px-3 py-2 rounded-md text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                <i class="fas fa-user mr-2 w-4 text-gray-400"></i> Profile
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-3 py-2 rounded-md text-sm text-red-400 hover:bg-gray-700 text-left">
                                    <i class="fas fa-sign-out-alt mr-2 w-4"></i> Logout
                                </button>
                            </form>
                        </div>
                        @else
                        <div class="flex items-center justify-between px-4">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    <i class="fas fa-lock mr-1"></i> Log in
                                </a>
                                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                Sign up
                            </a>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>