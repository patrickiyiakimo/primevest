<!-- Hero Section with Background Image -->
<div class="relative min-h-screen overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="/images/cryp-bg.webp" 
             alt="Trading Background" 
             class="w-full h-full object-cover">
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/80"></div>
        <!-- Green gradient accent -->
        <div class="absolute inset-0 bg-gradient-to-t from-green-600/20 via-transparent to-transparent"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-3 py-20 lg:py-20">
        <div class="">
            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-5xl lg:text-4xl xl:text-4xl font-bold text-white mb-6 leading-tight">
                COPY TRADING ON
                <span class="bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent block mt-2">
                    CRYPTOCURRENCY, STOCKS, FOREX,<br>
                    INDICES, SHARE CFDs & MORE..
                </span>
            </h1>
            
            <!-- Description -->
            <p class="text-base sm:text-lg lg:text-xl text-gray-300 mb-8 leading-relaxed">
                Trade CFDs on a wide range of instruments, including popular FX pairs,<br> Futures, Indices, 
                Metals, Energies and Shares. Experience <br>the global markets at your fingertips.
            </p>

            <!-- Add a condition for this create free account such that it only shows to unauthenticated users -->
            @if (!Auth::check())
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/register" 
                       class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold rounded-full text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 transition-all duration-500 shadow-2xl">
                        <span>Create Free Account</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
            
            <!-- Trust Indicators -->
            <div class="mt-12 flex flex-wrap gap-6 justify-center lg:justify-start">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="text-gray-300 text-sm">Regulated Broker</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-gray-300 text-sm">Zero Commission</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="text-gray-300 text-sm">Instant Execution</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Test@1234 -->
<!-- Chinenyenwa02% -->