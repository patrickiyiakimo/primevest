<!-- How It Works Section - PrimeVest -->
<div class="relative py-20 lg:py-28 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/background-image-2.webp') }}');"></div>
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-black/70"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <!-- <div class="inline-block mb-4">
                <span class="bg-red-100 text-red-700 text-sm font-semibold px-4 py-2 rounded-full">Simple Process</span>
            </div> -->
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Trade with Confidence
            </h2>
            <p class="text-gray-300 text-lg max-w-2xl mx-auto">
                Get started in three easy steps and join thousands of successful traders
            </p>
        </div>

        <!-- Steps Container -->
        <div class="relative">
            <!-- Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-0">
                
                <!-- Step 1 - Register -->
                <div class="relative text-center px-6 md:px-8">
                    <!-- Vertical Border (Desktop only) -->
                    <div class="hidden md:block absolute right-0 top-1/2 transform -translate-y-1/2 w-px h-32 bg-white/20"></div>
                    
                    <!-- Step Number -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 text-white text-2xl font-bold rounded-full mb-6 shadow-lg">
                        1
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-3">Register</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Fill in your personal details in our secure online application.
                    </p>
                </div>

                <!-- Step 2 - Deposit -->
                <div class="relative text-center px-6 md:px-8">
                    <!-- Vertical Border (Desktop only) -->
                    <div class="hidden md:block absolute right-0 top-1/2 transform -translate-y-1/2 w-px h-32 bg-white/20"></div>
                    
                    <!-- Step Number -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 text-white text-2xl font-bold rounded-full mb-6 shadow-lg">
                        2
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-3">Deposit</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Make a deposit via debit card, wire transfer or crypto.
                    </p>
                </div>

                <!-- Step 3 - Trading -->
                <div class="relative text-center px-6 md:px-8">
                    <!-- Step Number -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-600 to-red-700 text-white text-2xl font-bold rounded-full mb-6 shadow-lg">
                        3
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-3">Start Trading</h3>
                    <p class="text-gray-300 leading-relaxed">
                        Once approved, you can trade on desktop and mobile instantly.
                    </p>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                <span>Get Started Now</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    /* Selection color */
    ::selection {
        background-color: #ef4444;
        color: white;
    }
    
    /* Remove the last vertical border on desktop */
    @media (min-width: 768px) {
        .grid > div:last-child .absolute {
            display: none;
        }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .text-4xl {
            font-size: 2rem;
        }
        
        .w-16 {
            width: 4rem;
            height: 4rem;
        }
    }
    
    /* Optional: Add subtle animation to the numbers */
    .inline-flex {
        transition: transform 0.3s ease;
    }
    
    .inline-flex:hover {
        transform: scale(1.05);
    }
</style>