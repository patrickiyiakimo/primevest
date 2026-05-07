<!-- Global Opportunities Section -->
<div class="w-full py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Two Column Layout -->
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
            
            <!-- Left Side - Text Content -->
            <div class="flex-1">
                <!-- Title -->
                <h2 class="text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-600 mb-5 leading-tight">
                    Discover a World of <span class="text-red-600">Opportunities</span>
                </h2>
                
                <!-- Description -->
                <p class="text-gray-500 text-base lg:text-lg leading-relaxed mb-8">
                    Invest globally in stocks, options, futures, currencies, bonds and funds from a single unified platform. 
                    Fund your account in multiple currencies and trade assets denominated in multiple currencies. 
                    Access market data 24 hours a day and six days a week.
                </p>
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <!-- Stat 1 -->
                    <div class="text-center lg:text-left">
                        <div class="text-3xl lg:text-4xl font-bold text-red-600 mb-1">170<span class="text-gray-400 text-xl">+</span></div>
                        <p class="text-gray-400 text-sm uppercase tracking-wide">Markets</p>
                    </div>
                    
                    <!-- Stat 2 -->
                    <div class="text-center lg:text-left">
                        <div class="text-3xl lg:text-4xl font-bold text-red-600 mb-1">40<span class="text-gray-400 text-xl">+</span></div>
                        <p class="text-gray-400 text-sm uppercase tracking-wide">Countries</p>
                    </div>
                    
                    <!-- Stat 3 -->
                    <div class="text-center lg:text-left">
                        <div class="text-3xl lg:text-4xl font-bold text-red-600 mb-1">29<span class="text-gray-400 text-xl">+</span></div>
                        <p class="text-gray-400 text-sm uppercase tracking-wide">Currencies</p>
                    </div>
                </div>
                
                <!-- Disclaimer -->
                <p class="text-gray-400 text-xs italic mb-6">
                    Graphic is for illustrative purposes only and should not be relied upon for investment decisions.
                </p>
                
                <!-- Market Status -->
                <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-gray-200">
                    <span class="text-gray-500 text-sm font-medium">Map Locations</span>
                    <div class="flex flex-wrap gap-4">
                        <span class="inline-flex items-center gap-2 text-sm">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                            </span>
                            <span class="text-gray-600">NYSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                        <span class="inline-flex items-center gap-2 text-sm">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                            </span>
                            <span class="text-gray-600">LSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                        <span class="inline-flex items-center gap-2 text-sm">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                            </span>
                            <span class="text-gray-600">HKSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Map Image with Location Dots -->
            <div class="flex-1 relative">
                <div class="relative">
                    <!-- Map Image -->
                    <img src="{{ asset('images/map-solo-2245664933.png') }}" 
                         alt="Global Markets Map" 
                         class="w-full h-auto">
                    
                    <!-- Blinking Location Dots on Map -->
                    <!-- New York (NYSE) -->
                    <div class="absolute" style="top: 28%; left: 18%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-4 w-4">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-4 w-4 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                New York (NYSE)
                            </div>
                        </div>
                    </div>
                    
                    <!-- London (LSE) -->
                    <div class="absolute" style="top: 30%; left: 42%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-3.5 w-3.5">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75" style="animation-delay: 0.5s;"></span>
                                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                London (LSE)
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hong Kong (HKSE) -->
                    <div class="absolute" style="top: 45%; left: 82%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-3.5 w-3.5">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75" style="animation-delay: 1s;"></span>
                                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Hong Kong (HKSE)
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tokyo (TSE) - Additional market -->
                    <div class="absolute" style="top: 35%; left: 72%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-3 w-3">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75" style="animation-delay: 1.5s;"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Tokyo (TSE)
                            </div>
                        </div>
                    </div>
                    
                    <!-- Frankfurt (FSE) - Additional market -->
                    <div class="absolute" style="top: 32%; left: 48%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-3 w-3">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75" style="animation-delay: 2s;"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Frankfurt (FSE)
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sydney (ASX) - Additional market -->
                    <div class="absolute" style="top: 60%; left: 87%;">
                        <div class="relative">
                            <span class="absolute inline-flex h-3 w-3">
                                <span class="animate-pulse absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75" style="animation-delay: 2.5s;"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500"></span>
                            </span>
                            <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                Sydney (ASX)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<style>
    /* Hover effects for stats */
    .text-red-600 {
        transition: all 0.3s ease;
    }
    
    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .stats-container {
            justify-content: center;
        }
    }
    
    /* Pulse animation for location dots */
    @keyframes ping {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.5;
            transform: scale(1.2);
        }
    }
    
    .animate-ping {
        animation: ping 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    /* Different animation delays for each dot */
    .dot-delay-1 { animation-delay: 0s; }
    .dot-delay-2 { animation-delay: 0.5s; }
    .dot-delay-3 { animation-delay: 1s; }
    .dot-delay-4 { animation-delay: 1.5s; }
    .dot-delay-5 { animation-delay: 2s; }
    .dot-delay-6 { animation-delay: 2.5s; }
</style>