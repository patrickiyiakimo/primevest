<!-- Features Section -->
<div class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade With PrimeVest
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Experience trading with a trusted partner
            </p>
        </div>
        
        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Feature 1: Competitive Pricing -->
            <div class="group text-center hover:transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative">
                    <!-- Icon -->
                    <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/pricing-svg.svg') }}" alt="Competitive Pricing" class="w-14 h-14">
                    </div>
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-red-500/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Competitive Pricing</h3>
                <p class="text-gray-500 leading-relaxed">
                    Trade with low commissions and tight spreads on all major instruments
                </p>
            </div>
            
            <!-- Feature 2: Global Markets -->
            <div class="group text-center hover:transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative">
                    <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/global-svg.svg') }}" alt="Global Markets" class="w-14 h-14">
                    </div>
                    <div class="absolute inset-0 bg-red-500/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Global Markets</h3>
                <p class="text-gray-500 leading-relaxed">
                    Access over 2,100 markets across Forex, Indices, Commodities and more
                </p>
            </div>
            
            <!-- Feature 3: Premier Support -->
            <div class="group text-center hover:transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative">
                    <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/premier-svg.svg') }}" alt="Premier Support" class="w-14 h-14">
                    </div>
                    <div class="absolute inset-0 bg-red-500/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Premier Support</h3>
                <p class="text-gray-500 leading-relaxed">
                    24/7 multilingual customer support ready to assist you anytime
                </p>
            </div>
            
            <!-- Feature 4: Financial Strength -->
            <div class="group text-center hover:transform hover:-translate-y-2 transition-all duration-300">
                <div class="relative">
                    <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/strength-svg.svg') }}" alt="Financial Strength" class="w-14 h-14">
                    </div>
                    <div class="absolute inset-0 bg-red-500/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Financial Strength</h3>
                <p class="text-gray-500 leading-relaxed">
                    Regulated broker with strong capital position and client fund protection
                </p>
            </div>
            
        </div>
        
        <!-- CTA Button at bottom of features -->
        <div class="text-center mt-12">
            <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-full transition-all duration-500 shadow-lg hover:shadow-xl">
                Start Trading Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    /* Smooth hover transitions */
    .group:hover {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>