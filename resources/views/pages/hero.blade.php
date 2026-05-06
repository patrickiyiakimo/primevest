<!-- Hero Section with Carousel Background -->
<div class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden">
    
    <!-- Carousel Container -->
    <div x-data="{ currentSlide: 0, slides: [0, 1, 2, 3] }" 
         x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 6000)"
         class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
        
        <!-- Slide 1 - Financial Trading / New York Skyline -->
        <div x-show="currentSlide === 0" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=1920&h=1080&fit=crop');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
            <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-4xl font-bold text-white mb-6 leading-tight">
                            Trade Shares and Forex <br>with <span class="text-red-500">Financial Thinking</span>
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 max-w-2xl">
                            Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                            Metals, Energies and Shares. Experience the global markets at your fingertips.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/register" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                                Create Free Account
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="mt-10 flex flex-wrap gap-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Regulated Broker</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Zero Commission</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Instant Execution</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Secure Platform</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 2 - Institutional Trading / London Financial District -->
        <div x-show="currentSlide === 1" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('https://images.pexels.com/photos/3738836/pexels-photo-3738836.jpeg?w=1920&h=1080&fit=crop');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
            <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-4xl font-bold text-white mb-6 leading-tight">
                            The Competitive Edge for <span class="text-red-500">Institutions</span>
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 max-w-2xl">
                            Institutions gain a competitive edge with PrimeVest's financial strength, advanced technology, 
                            and execution quality, empowering hedge funds, advisors, and broker-dealers to grow globally.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/register" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                                Get Started
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="mt-10 flex flex-wrap gap-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">FCA Regulated</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Client Fund Protection</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Advanced Technology</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 3 - Forecast Trading / Hong Kong Skyline -->
        <div x-show="currentSlide === 2" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('https://images.pexels.com/photos/351283/pexels-photo-351283.jpeg?w=1920&h=1080&fit=crop');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
            <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-4xl font-bold text-white mb-6 leading-tight">
                            Trade Your Predictions on <span class="text-red-500">Economic & Climate Events</span>
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 max-w-2xl">
                            Use Forecast Contracts to trade your opinion on yes-or-no questions. 
                            Earn 3.14% APY on your investment with interest-like incentive coupons.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/forecast-trader" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="mt-10 flex flex-wrap gap-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Earn 3.14% APY</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">$3 New Account Bonus</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Exchange-Listed Contracts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide 4 - 24/7 Trading / Singapore Skyline -->
        <div x-show="currentSlide === 3" 
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('https://images.pexels.com/photos/2614818/pexels-photo-2614818.jpeg?w=1920&h=1080&fit=crop');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
            <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
                <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
                    <div class="max-w-3xl">
                        <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-4xl font-bold text-white mb-6 leading-tight">
                            Trade US Stocks, ETFs, and <span class="text-red-500">Bonds Around the Clock</span>
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 max-w-2xl">
                            React immediately to market-moving news and trade over 10,000 US Stocks and ETFs, 
                            US Equity Index futures and options, US Treasuries, and global bonds.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="/trading" class="inline-flex items-center justify-center px-8 py-4 text-base font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                                Start Trading
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="mt-10 flex flex-wrap gap-6">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">10,000+ Instruments</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">24/7 Trading</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                <span class="text-gray-200 text-sm">Competitive Commissions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Carousel Indicators -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex space-x-3">
            <button @click="currentSlide = 0" 
                    :class="{'bg-red-600 w-8': currentSlide === 0, 'bg-white/50 w-3': currentSlide !== 0}"
                    class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="currentSlide = 1" 
                    :class="{'bg-red-600 w-8': currentSlide === 1, 'bg-white/50 w-3': currentSlide !== 1}"
                    class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="currentSlide = 2" 
                    :class="{'bg-red-600 w-8': currentSlide === 2, 'bg-white/50 w-3': currentSlide !== 2}"
                    class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="currentSlide = 3" 
                    :class="{'bg-red-600 w-8': currentSlide === 3, 'bg-white/50 w-3': currentSlide !== 3}"
                    class="h-2 rounded-full transition-all duration-300"></button>
        </div>
        
        <!-- Previous/Next Navigation Buttons -->
        <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length" 
                class="absolute left-4 top-1/2 transform -translate-y-1/2 z-20 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="currentSlide = (currentSlide + 1) % slides.length" 
                class="absolute right-4 top-1/2 transform -translate-y-1/2 z-20 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition-all duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Prevent layout shift */
    [x-cloak] {
        display: none;
    }
</style>

<!-- Include Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>