@extends('layouts.app')

@section('title', 'Company')
@section('content')

<!-- Hero Section with Background Image -->
<div class="relative overflow-hidden min-h-[500px] pl-10 flex">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=1920&h=800&fit=crop" 
             alt="Trading Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/95 to-gray-900/90 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-red-600/20 via-transparent to-transparent z-10"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-20 px-4 sm:px-6 lg:px-8 py-20">
        <div class="">
            <div class="inline-flex px-3 py-1 rounded-full bg-red-500/20 border border-red-500/30 mb-6">
                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                <span class="text-red-400 text-xs font-semibold uppercase tracking-wider">The Advantage</span>
            </div>
            <h1 class="text-4xl lg:text-4xl font-bold text-white mb-4 leading-tight">
                NO COMMISSIONS. <span class="text-red-400">NO FEES.</span>
            </h1>
            <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6">
                NO HASSLE. NO BRAINER
            </h2>
            <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                We know that hidden fees, surprise costs and unexpected <br> charges can take a good chunk out of your investment.
            </p>
            <p class="text-lg text-gray-300 mb-8">
                With our <span class="text-red-400 font-semibold">VIP Black account</span> you can trade with zero commissions and razor-thin <br>spreads on all markets, resulting in tremendous savings.
            </p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                Register Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Experience & Innovation Section - Navy Blue -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            
            <!-- Experience Card -->
            <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-500/20 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-3">EXPERIENCE</h3>
                <p class="text-gray-600 leading-relaxed">
                    A team with <span class="text-red-400 font-semibold">40+ years experience</span> in providing the most advanced trading solutions for FX and CFDs.
                </p>
            </div>

            <!-- Innovation Card -->
            <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-500/20 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-600 mb-3">INNOVATIVE</h3>
                <p class="text-gray-600 leading-relaxed">
                    Power up your trading with innovative products like the <span class="text-red-400 font-semibold">PrimeVest</span>, which lets you undo losing trades if the markets move against you.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Pricing & Foundation Section - White -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            
            <!-- Predictable Pricing Card -->
            <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:shadow-xl">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 8h6m-5 0v8m0-8h2m0 0v8m-2 0h4M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">PREDICTABLE PRICING</h3>
                <p class="text-gray-600 leading-relaxed">
                    One low, all-in fee. Know what you're paying at all times with commissions as low as 0 and no fees for transactions or hidden charges.
                </p>
            </div>

            <!-- Robust Foundation Card -->
            <div class="bg-gray-50 rounded-2xl p-8 transition-all duration-300 hover:shadow-xl">
                <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">ROBUST FOUNDATION</h3>
                <p class="text-gray-600 leading-relaxed">
                    All of our products and services are offered on top of a no-compromise approach to a secure, fast and dependable trading environment.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Trading Environment Section - Navy Blue -->
<div class="bg-navy-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                AN EXCELLENT TRADING ENVIRONMENT
            </h2>
            <p class="text-xl text-gray-300">
                FOR FX & CFDs
            </p>
            <div class="w-20 h-1 bg-red-500 mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Licensed & Regulated -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
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
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
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
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
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

<!-- Testimonial Section - White -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </div>
            <p class="text-xl lg:text-2xl text-gray-700 italic leading-relaxed mb-6">
                "I'LL BE SAVING THOUSANDS PER MONTH. For someone who trades large volumes, the money I'll save with 0 commissions on VIP Black will make a world of difference to my balance. I'll be saving thousands per month on commissions, hundreds more on tight spreads, all for a simple low fee every month."
            </p>
            <p class="text-lg font-semibold text-gray-900">— Pawel Kaczmarczyk</p>
            <p class="text-sm text-gray-500">VIP Black Client</p>
        </div>
    </div>
</div>

<!-- Freedom to Trade Section - Navy Blue -->
<div class="bg-navy-900 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-5xl font-bold text-white mb-4">
                FREEDOM TO TRADE THE
            </h2>
            <h2 class="text-3xl lg:text-5xl font-bold text-red-400 mb-6">
                GLOBAL MARKETS
            </h2>
            <p class="text-xl text-gray-300">
                Every tick of markets around the world at your fingertips.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            
            <!-- Forex -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-xl">💱</span>
                </div>
                <h3 class="font-bold text-white">FOREX</h3>
                <p class="text-xs text-gray-400 mt-2">Currency majors, minors, crosses and exotics</p>
            </div>

            <!-- Indices -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-xl">📊</span>
                </div>
                <h3 class="font-bold text-white">INDICES</h3>
                <p class="text-xs text-gray-400 mt-2">Global indices from US, UK, Asia, Australia & Europe</p>
            </div>

            <!-- Shares -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-xl">🏢</span>
                </div>
                <h3 class="font-bold text-white">SHARES</h3>
                <p class="text-xs text-gray-400 mt-2">Trade shares from global markets</p>
            </div>

            <!-- Energies -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-xl">⚡</span>
                </div>
                <h3 class="font-bold text-white">ENERGIES</h3>
                <p class="text-xs text-gray-400 mt-2">Trade oil and gas on futures or spot markets</p>
            </div>

            <!-- Cryptocurrencies -->
            <div class="p-6 text-center transition-all duration-300 hover:transform hover:-translate-y-1">
                <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                    <span class="text-xl">₿</span>
                </div>
                <h3 class="font-bold text-white">CRYPTOCURRENCIES</h3>
                <p class="text-xs text-gray-400 mt-2">Digital currencies on CFDs like Bitcoin & Ethereum</p>
            </div>
        </div>
    </div>
</div>

<!-- Trading Costs Section - White -->
<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">TRADING COSTS</h2>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            We have subscriptions to suit every trader, with commissions as low as 0 and spreads from 0 pips.
        </p>
        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
            Start Trading Today
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>
</div>

<style>
    .bg-navy-900 {
        background-color: #0a192f;
    }
    .bg-navy-800 {
        background-color: #0f2b3d;
    }
    .text-navy-900 {
        color: #0a192f;
    }
</style>
@endsection