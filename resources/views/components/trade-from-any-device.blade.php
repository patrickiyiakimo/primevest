<!-- Trade From Any Device Section -->
<div class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side - Content -->
            <div class="text-center lg:text-left">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    Trade From <span class="text-red-600">Any Device</span>
                </h2>
                
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Access the markets anytime, anywhere with our powerful trading platforms. 
                    Available on all major devices for seamless trading experience.
                </p>
                
                <!-- Device Icons Row -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-8 mb-10">
                    <!-- Android -->
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-md flex items-center justify-center group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Android_robot.svg" 
                                 alt="Android" 
                                 class="w-10 h-10">
                        </div>
                        <span class="text-sm text-gray-600 mt-2 font-medium">Android</span>
                    </div>
                    
                    <!-- iOS -->
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-md flex items-center justify-center group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" 
                                 alt="iOS" 
                                 class="w-8 h-8">
                        </div>
                        <span class="text-sm text-gray-600 mt-2 font-medium">iOS</span>
                    </div>
                    
                    <!-- Windows -->
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-md flex items-center justify-center group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Windows_logo_-_2012_derivative.svg" 
                                 alt="Windows" 
                                 class="w-8 h-8">
                        </div>
                        <span class="text-sm text-gray-600 mt-2 font-medium">Windows</span>
                    </div>
                </div>
                
                <!-- Crypto Deposit Section -->
                <div class="bg-white rounded-2xl p-6 border border-gray-200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Deposit with Crypto</h3>
                            <p class="text-sm text-gray-500">We accept crypto deposits</p>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 text-sm leading-relaxed mb-5">
                        Deposit, withdraw and hold your balance in Bitcoin, Ethereum and other major cryptocurrencies.
                    </p>
                    
                    <a href="/register" class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition-all duration-300 shadow-md hover:shadow-lg w-full sm:w-auto">
                        Get Started
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Mockup Image -->
            <div class="flex justify-center lg:justify-end">
                <div class="relative">
                    <img src="{{ asset('images/in-wave-mockup-5 (1).png') }}" 
                         alt="Trading Platform Mockup" 
                         class="w-full h-auto rounded-2xl shadow-2xl hover:scale-105 transition-transform duration-500">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -top-4 -right-4 bg-green-500 rounded-full px-4 py-2 shadow-lg animate-pulse">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-white rounded-full"></div>
                            <span class="text-white text-xs font-semibold">Live Trading</span>
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
    
    /* Scale animation on hover */
    .hover\:scale-110:hover {
        transform: scale(1.1);
    }
    
    .hover\:scale-105:hover {
        transform: scale(1.05);
    }
    
    /* Pulse animation for badge */
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: scale(1);
        }
        50% {
            opacity: 0.9;
            transform: scale(1.05);
        }
    }
    .animate-pulse {
        animation: pulse 2s ease-in-out infinite;
    }
</style>