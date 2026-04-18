<!-- Investment Plans Section -->
<div class="bg-gradient-to-b from-gray-50 to-white py-20 lg:py-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center mb-4">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                Complete Packages for <span class="text-green-600">Every Trader</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Choose the perfect investment plan that matches your financial goals and trading style
            </p>
        </div>

        <!-- Plans Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Basic Plan -->
            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-green-200">
                <!-- Card Top Border Accent -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-green-600"></div>
                
                <!-- Card Content -->
                <div class="p-6">
                    <!-- Minimum Funding Badge -->
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-1 bg-green-50 rounded-full mb-3">
                            <span class="text-green-600 text-xs font-semibold uppercase tracking-wider">Minimum Funding</span>
                        </div>
                        <div class="text-4xl font-bold text-gray-900">$500</div>
                    </div>
                    
                    <!-- Plan Name -->
                    <div class="text-center mb-6 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">Basic Plan</h3>
                        <p class="text-sm text-gray-500 mt-1">Benefit from industry-leading entry prices</p>
                    </div>
                    
                    <!-- Plan Details -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Min. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$500</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Max. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$999</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Return of Investment:</span>
                            <span class="font-bold text-green-600">25%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Referral Bonus:</span>
                            <span class="font-semibold text-gray-900">5%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-semibold text-gray-900">24 Hours</span>
                        </div>
                    </div>
                    
                    <!-- Features -->
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Instant Deposit & Withdrawal
                        </div>
                    </div>
                    
                    <!-- CTA Button -->
                    <a href="{{ route('register') }}">
                        <button class="w-full py-3 bg-white border-2 border-green-600 text-green-600 font-semibold rounded-xl hover:bg-green-600 hover:text-white transition-all duration-300">
                            Open an Account
                        </button>
                    </a>
                </div>
            </div>

            <!-- Standard Plan -->
            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-green-200 transform hover:-translate-y-1">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-green-500 to-green-600"></div>
                
                <!-- Popular Badge -->
                <div class="absolute top-4 right-4">
                    <div class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                        MOST POPULAR
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-1 bg-green-50 rounded-full mb-3">
                            <span class="text-green-600 text-xs font-semibold uppercase tracking-wider">Minimum Funding</span>
                        </div>
                        <div class="text-4xl font-bold text-gray-900">$1,000</div>
                    </div>
                    
                    <div class="text-center mb-6 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">Standard Plan</h3>
                        <p class="text-sm text-gray-500 mt-1">Receive even tighter spreads and commissions</p>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Min. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$1,000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Max. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$9,999</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Return of Investment:</span>
                            <span class="font-bold text-green-600">30%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Referral Bonus:</span>
                            <span class="font-semibold text-gray-900">5%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-semibold text-gray-900">24 Hours</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Instant Deposit & Withdrawal
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}">
                        <button class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg">
                            Open an Account
                        </button>
                    </a>
                </div>
            </div>

            <!-- Silver Plan -->
            <div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-green-200">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-gray-400 to-gray-500"></div>
                
                <div class="p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-1 bg-green-50 rounded-full mb-3">
                            <span class="text-green-600 text-xs font-semibold uppercase tracking-wider">Minimum Funding</span>
                        </div>
                        <div class="text-4xl font-bold text-gray-900">$10,000</div>
                    </div>
                    
                    <div class="text-center mb-6 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">Silver Plan</h3>
                        <p class="text-sm text-gray-500 mt-1">Benefit from industry-leading entry prices</p>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Min. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$10,000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Max. Possible Deposit:</span>
                            <span class="font-semibold text-gray-900">$49,999</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Return of Investment:</span>
                            <span class="font-bold text-green-600">35%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Referral Bonus:</span>
                            <span class="font-semibold text-gray-900">5%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Duration:</span>
                            <span class="font-semibold text-gray-900">24 Hours</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Instant Deposit & Withdrawal
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}">
                        <button class="w-full py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-green-500 hover:text-green-600 transition-all duration-300">
                            Open an Account
                        </button>
                    </a>
                </div>
            </div>

            <!-- Gold Plan -->
            <div class="group relative bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-1">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-500 to-yellow-600"></div>
                
                <!-- Premium Badge -->
                <div class="absolute top-4 right-4">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                        PREMIUM
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="text-center mb-6">
                        <div class="inline-block px-4 py-1 bg-white/10 rounded-full mb-3">
                            <span class="text-yellow-400 text-xs font-semibold uppercase tracking-wider">Minimum Funding</span>
                        </div>
                        <div class="text-4xl font-bold text-white">$50,000</div>
                    </div>
                    
                    <div class="text-center mb-6 pb-4 border-b border-gray-700">
                        <h3 class="text-xl font-bold text-white">Gold Plan</h3>
                        <p class="text-sm text-gray-400 mt-1">Receive even tighter spreads and commissions</p>
                    </div>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Min. Possible Deposit:</span>
                            <span class="font-semibold text-white">$50,000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Max. Possible Deposit:</span>
                            <span class="font-semibold text-white">$100,000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Return of Investment:</span>
                            <span class="font-bold text-yellow-400">40%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Referral Bonus:</span>
                            <span class="font-semibold text-white">5%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Duration:</span>
                            <span class="font-semibold text-white">24 Hours</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-sm text-gray-400">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Instant Deposit & Withdrawal
                        </div>
                    </div>
                    
                    <a href="{{ route('register') }}">
                        <button class="w-full py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white font-semibold rounded-xl hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 shadow-md hover:shadow-lg">
                            Open an Account
                        </button>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Trust Badges -->
        <div class="mt-16 pt-8 border-t border-gray-200">
            <div class="flex flex-wrap justify-center gap-8">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">Regulated & Licensed</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">SSL Secure</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">24/7 Support</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">10+ Years Trusted</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth hover transitions */
    .group:hover {
        transform: translateY(-4px);
    }
    
    /* Gold plan special styling */
    .bg-gradient-to-br.from-gray-900.to-gray-800 {
        background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
    }
</style>
@endsection