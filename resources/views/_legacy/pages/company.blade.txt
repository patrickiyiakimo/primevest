@extends('layouts.app')

@section('title', 'Company')
@section('content')

<!-- Hero Section - Same Design as Homepage -->
<div class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden bg-white">
    
    <!-- Red Gradient Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-red-500 via-red-200 to-transparent rounded-full opacity-60"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-400 via-red-200 to-transparent rounded-full opacity-60"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-red-50/30 via-transparent to-red-50/30 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center px-3 py-1 bg-red-100 mb-6">
                        <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                        <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">The Advantage</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl md:text-5xl lg:text-4xl xl:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        NO COMMISSIONS. <span class="text-red-600">NO FEES.</span>
                    </h1>
                    <h2 class="text-3xl sm:text-4xl md:text-4xl lg:text-4xl font-bold text-gray-800 mb-6">
                        NO HASSLE. NO BRAINER
                    </h2>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-6 max-w-2xl mx-auto lg:mx-0">
                        We know that hidden fees, surprise costs and unexpected charges can take a good chunk out of your investment.
                    </p>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        With our <span class="text-red-600 font-semibold">VIP Black account</span> you can trade with zero commissions and razor-thin spreads on all markets, resulting in tremendous savings.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register" 
                           class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                            <span>Register Now</span>
                            <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Trust Indicators -->
                    <div class="mt-10 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center lg:justify-start">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Zero Commission</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">No Hidden Fees</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">Razor-Thin Spreads</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-red-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-700 text-sm font-medium">VIP Black Account</span>
                        </div>
                    </div>
                </div>
                
 <!-- Right Side - Real Estate Building Image with Zoom on Hover -->
<div class="flex justify-center lg:justify-end relative">
    <div class="w-full overflow-hidden">
        <!-- Added 'hover:scale-110 transition-transform duration-300' classes for zoom effect -->
        <img src="https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=800&h=600&fit=crop" 
             alt="Premium Real Estate Building" 
             class="w-full h-auto object-cover hover:scale-110 transition-transform duration-300">
    </div>
</div>
                
            </div>
        </div>
    </div>
</div>

<!-- Experience & Innovation Section -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Experience Card -->
            <div class="bg-white p-8 shadow-md border border-gray-100">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">EXPERIENCE</h3>
                <p class="text-gray-600 leading-relaxed">
                    A team with <span class="text-red-600 font-semibold">40+ years experience</span> in providing the most advanced trading solutions for FX and CFDs.
                </p>
            </div>

            <!-- Innovation Card -->
            <div class="bg-white p-8 shadow-md border border-gray-100">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">INNOVATIVE</h3>
                <p class="text-gray-600 leading-relaxed">
                    Power up your trading with innovative products like the <span class="text-red-600 font-semibold">PrimeVest</span>, which lets you undo losing trades if the markets move against you.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Pricing & Foundation Section -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Predictable Pricing Card -->
            <div class="bg-gray-50 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 8h6m-5 0v8m0-8h2m0 0v8m-2 0h4M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">PREDICTABLE PRICING</h3>
                <p class="text-gray-600 leading-relaxed">
                    One low, all-in fee. Know what you're paying at all times with commissions as low as 0 and no fees for transactions or hidden charges.
                </p>
            </div>

            <!-- Robust Foundation Card -->
            <div class="bg-gray-50 p-8 border border-gray-100">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">ROBUST FOUNDATION</h3>
                <p class="text-gray-600 leading-relaxed">
                    All of our products and services are offered on top of a no-compromise approach to a secure, fast and dependable trading environment.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Trading Environment Section -->
<div class="bg-gray-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                AN EXCELLENT TRADING ENVIRONMENT
            </h2>
            <p class="text-xl text-gray-300">
                FOR FX & CFDs
            </p>
            <div class="w-20 h-0.5 bg-red-600 mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Licensed & Regulated -->
            <div class="bg-gray-800 p-6 text-center border border-gray-700">
                <div class="w-16 h-16 bg-red-600/20 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">LICENSED & REGULATED</h3>
                <p class="text-gray-400 text-sm">
                    We also offer negative balance protection, meaning your balance never goes below zero and ensuring a high-standard of consumer protection.
                </p>
            </div>

            <!-- Crypto Deposits -->
            <div class="bg-gray-800 p-6 text-center border border-gray-700">
                <div class="w-16 h-16 bg-red-600/20 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">CRYPTO DEPOSITS</h3>
                <p class="text-gray-400 text-sm">
                    We accept deposits and withdrawals in Bitcoin, Ethereum and other coins.
                </p>
            </div>

            <!-- Responsive Support -->
            <div class="bg-gray-800 p-6 text-center border border-gray-700">
                <div class="w-16 h-16 bg-red-600/20 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m0 5.656l3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">RESPONSIVE SUPPORT</h3>
                <p class="text-gray-400 text-sm">
                    Our dedicated support is quick to help you with any and all questions during trading hours.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Section -->
<div class="bg-white py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>
        <p class="text-xl lg:text-2xl text-gray-700 leading-relaxed mb-6">
            "I'LL BE SAVING THOUSANDS PER MONTH. For someone who trades large volumes, the money I'll save with 0 commissions on VIP Black will make a world of difference to my balance. I'll be saving thousands per month on commissions, hundreds more on tight spreads, all for a simple low fee every month."
        </p>
        <p class="text-lg font-semibold text-gray-900">— Pawel Kaczmarczyk</p>
        <p class="text-sm text-gray-500">VIP Black Client</p>
    </div>
</div>

<!-- Freedom to Trade Section -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                FREEDOM TO TRADE THE
            </h2>
            <h2 class="text-3xl lg:text-4xl font-bold text-red-600 mb-6">
                GLOBAL MARKETS
            </h2>
            <p class="text-xl text-gray-500">
                Every tick of markets around the world at your fingertips.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            
            <!-- Forex -->
            <div class="bg-white p-6 text-center border border-gray-200">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800">FOREX</h3>
                <p class="text-sm text-gray-500 mt-2">Currency majors, minors, crosses and exotics</p>
            </div>

            <!-- Indices -->
            <div class="bg-white p-6 text-center border border-gray-200">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800">INDICES</h3>
                <p class="text-sm text-gray-500 mt-2">Global indices from US, UK, Asia, Australia & Europe</p>
            </div>

            <!-- Shares -->
            <div class="bg-white p-6 text-center border border-gray-200">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800">SHARES</h3>
                <p class="text-sm text-gray-500 mt-2">Trade shares from global markets</p>
            </div>

            <!-- Energies -->
            <div class="bg-white p-6 text-center border border-gray-200">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800">ENERGIES</h3>
                <p class="text-sm text-gray-500 mt-2">Trade oil and gas on futures or spot markets</p>
            </div>

            <!-- Cryptocurrencies -->
            <div class="bg-white p-6 text-center border border-gray-200">
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800">CRYPTOCURRENCIES</h3>
                <p class="text-sm text-gray-500 mt-2">Digital currencies on CFDs like Bitcoin & Ethereum</p>
            </div>
        </div>
    </div>
</div>

<!-- Trading Costs Section -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">TRADING COSTS</h2>
        <p class="text-xl text-gray-500 mb-8 max-w-2xl mx-auto">
            We have subscriptions to suit every trader, with commissions as low as 0 and spreads from 0 pips.
        </p>
        <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-lg hover:shadow-xl">
            Start Trading Today
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
</style>
@endsection