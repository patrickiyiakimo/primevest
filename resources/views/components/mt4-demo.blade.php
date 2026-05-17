<!-- MT4 Demo & Live Accounts Section -->
<div class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Content -->
            <div class="text-center lg:text-left">
                <!-- Logo on top -->
                <div class="flex justify-center lg:justify-start mb-6">
                    <img src="{{ asset('images/mt5-logo (1).png') }}" 
                         alt="MT5 Logo" 
                         class="h-16 w-auto">
                </div>
                
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    Free Demo and Live <span class="text-red-600">MT4 Accounts</span>
                </h2>
                
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Instant market access and endless possibilities for trading, analysis and automation. 
                    Metaquotes 5 is an evolution of MT4 with additional features that supercharge your trading.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/register" 
                       class="group inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500">
                        <span>Open an Account</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>            
            </div>
            
            <!-- Right Side - Image -->
            <div class="flex justify-center lg:justify-end relative">
                <div class="relative">
                    <img src="{{ asset('images/mt4-demo-screen (1).jpg') }}" 
                         alt="MT4 Trading Platform Demo Screen" 
                         class=" w-full h-auto  transition-transform duration-500">
                    
                    <!-- Decorative Badge -->
                    <div class="absolute -bottom-4 -left-4 bg-red-600 rounded-lg px-4 py-2 shadow-lg hidden lg:block">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-white text-sm font-semibold">Live Demo Available</span>
                        </div>
                    </div>
                </div>
            </div>
            
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
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>