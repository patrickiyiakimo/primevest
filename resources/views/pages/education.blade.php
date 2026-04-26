@extends('layouts.app')

@section('title', 'Education')
@section('content')

<!-- Hero Section with Background Image -->
<div class="relative overflow-hidden min-h-[500px] flex items-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
 <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=1920&h=1080&fit=crop" 
             alt="Trading Platform" 
             class="w-full h-full object-cover">
 <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/95 to-gray-900/90 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-red-600/20 via-transparent to-transparent z-10"></div>
    </div>        


    <!-- Hero Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="max-w-3xl">
            <h1 class="text-4xl lg:text-5xl xl:text-5xl font-bold text-white mb-6 leading-tight">
                Build up <span class="text-red-400">Your Skills</span>
            </h1>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                Educate yourself and inform your strategies with robust trading tools.
            </p>
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
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                Trading <span class="text-red-600">Fundamentals</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Understand the core concepts of different trading instruments
            </p>
        </div>

        <!-- Grid Layout for Topics -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Forex Card -->
            <div class="bg-white p-8 border-2 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">💱</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Forex</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Forex is short for foreign exchange. The forex market is a place where currencies are traded. It is the largest and most liquid financial market in the world with an average daily turnover of 6.6 trillion U.S. dollars as of 2019. The basis of the forex market is the fluctuations of exchange rates. Forex traders speculate on the price fluctuations of currency pairs, making money on the difference between buying and selling prices.
                </p>
            </div>

            <!-- CFD Card -->
            <div class="bg-white p-8 border-2 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-14 h-14 bg-purple-50 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">📊</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">CFD</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    A CFD, or Contract for Difference, is a type of financial instrument that allows you to trade on the price movements of stocks, regardless of whether prices are rising or falling. The key advantage of a CFD is the opportunity to speculate on the price movements of an asset (upwards or downwards) without actually owning the underlying asset.
                </p>
            </div>

            <!-- Cryptocurrency Card -->
            <div class="bg-white p-8 border-2 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">₿</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Cryptocurrency</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    A cryptocurrency, crypto currency or crypto is a digital asset designed to work as a medium of exchange wherein individual coin ownership records are stored in a ledger existing in a form of computerized database using strong cryptography to secure transaction records, to control the creation of additional coins, and to verify the transfer of coin ownership.
                </p>
            </div>

            <!-- Digital Options Card -->
            <div class="bg-white p-8 border-2 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center">
                        <span class="text-2xl">🎯</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Digital Options</h3>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Digital Options is a trading instrument that allows you to speculate on the extent of the price change, rather than just on the general price direction. If the price of the underlying asset is to reach the threshold selected by the trader (known as the 'strike price'), the payout may get as high as 900%. However, an unsuccessful trade will result in loss of the investment.
                </p>
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
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                Ultimate <span class="text-red-600">Platform</span>
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                Everything you need for successful trading in one place
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Ultimate Platform Card -->
            <div class="bg-white border border-gray-100 p-6 transition-all duration-300">
                <div class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Ultimate Platform</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    A multichart layout, technical analysis, historical quotes and beyond. Everything you're looking for in a platform — on the device of your choice.
                </p>
            </div>

            <!-- Analysis & Alerts Card -->
            <div class="bg-white border border-gray-100 p-6 transition-all duration-300">
                <div class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Analysis & Alerts</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Get the most out of fundamental and technical analysis with our News Feed and Economic Calendars. More than 100 most widely-used technical indicators.
                </p>
            </div>

            <!-- Demo Account Card -->
            <div class="bg-white border border-gray-100 p-6 transition-all duration-300">
                <div class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Demo Account</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Master your skills with a demo/practice account and educational content. Practice risk-free before trading with real money.
                </p>
            </div>

            <!-- Risk Management Card -->
            <div class="bg-white border border-gray-100 p-6 transition-all duration-300">
                <div class="w-14 h-14 bg-red-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Risk Management</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    With features like Stop Loss/Take Profit, Negative balance protection and Trailing Stop you can manage your losses and profits at the levels predetermined by you.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative py-16 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <!-- Darker green overlay for better text visibility -->
        <div class="absolute inset-0 bg-red-900/85"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1559526324-4b87b5e36e44?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center"></div>
        <!-- Additional dark overlay for depth -->
        <div class="absolute inset-0 bg-black/30"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Learning?</h2>
        <p class="text-red-100 text-lg mb-8 max-w-2xl mx-auto">
            Join our educational programs and become a better trader
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 text-white bg-red-600 font-semibold rounded-full hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl">
            Open an Account
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
</div>

<style>
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Card hover effect */
    .hover\:shadow-xl:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endsection