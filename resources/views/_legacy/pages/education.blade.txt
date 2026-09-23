@extends('layouts.app')

@section('title', 'Education')
@section('content')

<!-- Hero Section - Same Design as Homepage -->
<div class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden bg-white">
    
    <!-- Red Gradient Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Top right red gradient -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-red-500 via-red-200 to-transparent rounded-full opacity-60"></div>
        <!-- Bottom left red gradient -->
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-400 via-red-200 to-transparent rounded-full opacity-60"></div>
        <!-- Center subtle red glow -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-red-50/30 via-transparent to-red-50/30 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <!-- Main Heading -->
                    <h1 class="text-4xl sm:text-5xl md:text-4xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        Build up <span class="text-red-600">Your Skills</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Educate yourself and inform your strategies with robust trading tools. 
                        Learn from experts and master the art of trading.
                    </p>

                    <!-- Button -->
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register" 
                           class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                            <span>Start Learning Now</span>
                            <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="mt-10 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center lg:justify-start">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Expert Instructors</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Certified Courses</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Lifetime Access</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Learn Anytime</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Image -->
                <div class="flex justify-center lg:justify-end relative">
                    <div class="w-full rounded-xl overflow-hidden ">
                        <img src="https://images.pexels.com/photos/3183183/pexels-photo-3183183.jpeg?w=800&h=600&fit=crop" 
                             alt="Trading Education" 
                             class="w-full h-auto object-cover">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Educational Topics Section -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 mb-4">
                <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Learn & Grow</span>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                Trading <span class="text-red-600">Fundamentals</span>
            </h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Understand the core concepts of different trading instruments
            </p>
        </div>

        <!-- Grid Layout for Topics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Forex Card -->
            <div class="bg-white p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Forex</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Forex is short for foreign exchange. The forex market is a place where currencies are traded. It is the largest and most liquid financial market in the world with an average daily turnover of 6.6 trillion U.S. dollars as of 2019. The basis of the forex market is the fluctuations of exchange rates. Forex traders speculate on the price fluctuations of currency pairs, making money on the difference between buying and selling prices.
                </p>
                <div class="mt-4">
                    <a href="/learn/forex" class="text-red-600 hover:text-red-700 text-sm font-semibold inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- CFD Card -->
            <div class="bg-white p-8 border border-gray-100  hover:shadow-xl transition-all duration-300">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">CFD</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    A CFD, or Contract for Difference, is a type of financial instrument that allows you to trade on the price movements of stocks, regardless of whether prices are rising or falling. The key advantage of a CFD is the opportunity to speculate on the price movements of an asset (upwards or downwards) without actually owning the underlying asset.
                </p>
                <div class="mt-4">
                    <a href="/learn/cfd" class="text-red-600 hover:text-red-700 text-sm font-semibold inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Cryptocurrency Card -->
            <div class="bg-white p-8 border border-gray-100  hover:shadow-xl transition-all duration-300">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Cryptocurrency</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    A cryptocurrency, crypto currency or crypto is a digital asset designed to work as a medium of exchange wherein individual coin ownership records are stored in a ledger existing in a form of computerized database using strong cryptography to secure transaction records, to control the creation of additional coins, and to verify the transfer of coin ownership.
                </p>
                <div class="mt-4">
                    <a href="/learn/crypto" class="text-red-600 hover:text-red-700 text-sm font-semibold inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Digital Options Card -->
            <div class="bg-white p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Digital Options</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Digital Options is a trading instrument that allows you to speculate on the extent of the price change, rather than just on the general price direction. If the price of the underlying asset is to reach the threshold selected by the trader (known as the 'strike price'), the payout may get as high as 900%. However, an unsuccessful trade will result in loss of the investment.
                </p>
                <div class="mt-4">
                    <a href="/learn/options" class="text-red-600 hover:text-red-700 text-sm font-semibold inline-flex items-center">
                        Learn More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ultimate Platform Features Section -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 mb-4">
                <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">Platform Features</span>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                Ultimate <span class="text-red-600">Platform</span>
            </h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                Everything you need for successful trading in one place
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Ultimate Platform Card -->
            <div class="bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Ultimate Platform</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    A multichart layout, technical analysis, historical quotes and beyond. Everything you're looking for in a platform — on the device of your choice.
                </p>
            </div>

            <!-- Analysis & Alerts Card -->
            <div class="bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Analysis & Alerts</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Get the most out of fundamental and technical analysis with our News Feed and Economic Calendars. More than 100 most widely-used technical indicators.
                </p>
            </div>

            <!-- Demo Account Card -->
            <div class="bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Demo Account</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Master your skills with a demo/practice account and educational content. Practice risk-free before trading with real money.
                </p>
            </div>

            <!-- Risk Management Card -->
            <div class="bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Risk Management</h3>
                <p class="text-gray-500 text-sm leading-relaxed">
                    With features like Stop Loss/Take Profit, Negative balance protection and Trailing Stop you can manage your losses and profits at the levels predetermined by you.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative py-20 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-red-900/90"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black/20"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Learning?</h2>
        <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">
            Join our educational programs and become a better trader
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                Open an Account
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="/courses" class="inline-flex items-center px-8 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold transition-all duration-300 border border-white/30">
                View All Courses
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Hover effect for button icon */
    .group-hover\:translate-x-1:hover {
        transform: translateX(4px);
    }
    
    /* Custom blur utilities */
    .blur-3xl {
        filter: blur(64px);
    }
    
    .blur-2xl {
        filter: blur(40px);
    }
    
    /* Card hover effect */
    .hover\:shadow-xl:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endsection