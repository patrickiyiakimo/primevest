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
                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                            <span class="text-gray-600">NYSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                        <span class="inline-flex items-center gap-2 text-sm">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                            <span class="text-gray-600">LSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                        <span class="inline-flex items-center gap-2 text-sm">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            <span class="text-gray-600">HKSE :</span>
                            <span class="text-red-600 font-medium">Closed</span>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Image -->
            <div class="flex-1">
                <img src="{{ asset('images/map-solo-2245664933.png') }}" 
                     alt="Global Markets Map" 
                     class="w-full h-auto">
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
</style>