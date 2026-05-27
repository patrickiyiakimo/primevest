<div class="w-full min-h-screen relative overflow-hidden" style="background: linear-gradient(135deg, #2a0a0a 0%, #4a0a0a 50%, #2a0a0a 100%);">
    
    <!-- Faded Background Logo Watermark -->
    <div class="absolute inset-0 flex items-center justify-center opacity-[0.06] pointer-events-none">
        <div class="flex flex-col items-center gap-4">
            <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-56 w-auto">
            <span class="text-8xl font-bold text-white tracking-wider">PrimeVest</span>
        </div>
    </div>

    <!-- Main Content - Two Column Layout: Left = Trust + FAQ, Right = Bold PrimeVest Card -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            <!-- LEFT SIDE - Trust Content + FAQ (Smaller, compact) -->
            <div>
              
                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-4xl font-bold text-white leading-tight mb-5">
                    Trusted. Proven.
                    
                    <span class="relative inline-block">
                        Top-Rated.
                    </span>
                    <br>Here's Why.
                </h1>
                
                <p class="text-white/70 text-base leading-relaxed mb-8 max-w-md">
                    PrimeVest has been recognized as the most reliable investment platform, 
                    trusted by over 500,000 active traders globally.
                </p>

                <!-- Mini Stats Row -->
                <div class="flex flex-wrap gap-6 mb-8">
                    <div>
                        <div class="text-2xl font-bold text-white">500k+</div>
                        <div class="text-white/50 text-xs">Active Traders</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">$50B+</div>
                        <div class="text-white/50 text-xs">Trading Volume</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-white">4.9/5</div>
                        <div class="text-white/50 text-xs">Trustpilot</div>
                    </div>
                </div>

                <!-- FAQ SECTION - Compact on Left -->
                <div class="mt-8">
                    <h3 class="text-white font-semibold text-lg mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Frequently Asked Questions
                    </h3>
                    
                    <div class="space-y-3" x-data="{ openFAQ: null }">
                        <!-- FAQ 1 -->
                        <div class="bg-white/5 hover:bg-white/10 rounded-lg overflow-hidden border border-white/10 transition-all duration-200">
                            <button @click="openFAQ = openFAQ === 1 ? null : 1" class="w-full text-left px-4 py-3 flex items-center justify-between">
                                <span class="text-sm font-medium text-white">Is PrimeVest regulated?</span>
                                <svg class="w-4 h-4 text-white/60 transition-transform duration-300" :class="{'rotate-180': openFAQ === 1}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFAQ === 1" x-collapse class="px-4 pb-3">
                                <p class="text-white/50 text-xs leading-relaxed">Yes, fully regulated by FCA, CySEC, and ASIC with client fund segregation.</p>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="bg-white/5 hover:bg-white/10 rounded-lg overflow-hidden border border-white/10 transition-all duration-200">
                            <button @click="openFAQ = openFAQ === 2 ? null : 2" class="w-full text-left px-4 py-3 flex items-center justify-between">
                                <span class="text-sm font-medium text-white">Minimum deposit?</span>
                                <svg class="w-4 h-4 text-white/60 transition-transform duration-300" :class="{'rotate-180': openFAQ === 2}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFAQ === 2" x-collapse class="px-4 pb-3">
                                <p class="text-white/50 text-xs leading-relaxed">Just $100 for a Standard account with zero commission on shares.</p>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="bg-white/5 hover:bg-white/10 rounded-lg overflow-hidden border border-white/10 transition-all duration-200">
                            <button @click="openFAQ = openFAQ === 3 ? null : 3" class="w-full text-left px-4 py-3 flex items-center justify-between">
                                <span class="text-sm font-medium text-white">Trading instruments?</span>
                                <svg class="w-4 h-4 text-white/60 transition-transform duration-300" :class="{'rotate-180': openFAQ === 3}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFAQ === 3" x-collapse class="px-4 pb-3">
                                <p class="text-white/50 text-xs leading-relaxed">2,000+ instruments: Forex, Indices, Commodities, Shares, Crypto, ETFs.</p>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="bg-white/5 hover:bg-white/10 rounded-lg overflow-hidden border border-white/10 transition-all duration-200">
                            <button @click="openFAQ = openFAQ === 4 ? null : 4" class="w-full text-left px-4 py-3 flex items-center justify-between">
                                <span class="text-sm font-medium text-white">Demo account available?</span>
                                <svg class="w-4 h-4 text-white/60 transition-transform duration-300" :class="{'rotate-180': openFAQ === 4}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFAQ === 4" x-collapse class="px-4 pb-3">
                                <p class="text-white/50 text-xs leading-relaxed">Free unlimited demo with $100k virtual funds, real-time data.</p>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="bg-white/5 hover:bg-white/10 rounded-lg overflow-hidden border border-white/10 transition-all duration-200">
                            <button @click="openFAQ = openFAQ === 5 ? null : 5" class="w-full text-left px-4 py-3 flex items-center justify-between">
                                <span class="text-sm font-medium text-white">Security measures?</span>
                                <svg class="w-4 h-4 text-white/60 transition-transform duration-300" :class="{'rotate-180': openFAQ === 5}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="openFAQ === 5" x-collapse class="px-4 pb-3">
                                <p class="text-white/50 text-xs leading-relaxed">Segregated accounts, SSL encryption, 2FA, negative balance protection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE - Glass Card with Logo visible -->
            <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 lg:p-8 border border-white/20 shadow-2xl">
                
                <!-- Prominent PrimeVest Logo & Name with extra dominance -->
                <div class="flex flex-col items-center text-center mb-10">
                    <div class="bg-white/15 rounded-full p-6 mb-5">
                        <img src="/images/primevest-logo.png" alt="PrimeVest Logo" class="h-20 w-auto">
                    </div>
                    <span class="text-4xl lg:text-5xl font-black text-white tracking-tight">PrimeVest</span>
                    <div class="w-24 h-1 bg-red-500 mt-4 rounded-full"></div>
                    <p class="text-red-400 text-sm mt-4 font-semibold uppercase tracking-wide">#1 Rated Investment Platform 2026</p>
                </div>

                <!-- Ranking Highlight -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-red-500/25 rounded-full mb-5">
                        <span class="text-xs font-bold text-red-300 uppercase tracking-wider">Official Ranking</span>
                    </div>
                    <div class="flex items-center justify-center gap-4 mb-3">
                        <span class="text-6xl font-black text-white">#1</span>
                        <span class="text-white/40 text-base">out of 50+</span>
                    </div>
                    <p class="text-white/60 text-sm">Top Rated Investment Platform by Financial Times & Investment Trends Survey 2026</p>
                </div>

                <!-- Competitor Comparison List - PrimeVest significantly bolder with larger padding -->
                <div class="space-y-3 mb-0">
                    <!-- PrimeVest - Bolder, larger padding, dominant styling, no SVG icon -->
                    <div class="flex items-center justify-between py-4 px-4 bg-red-600/30 rounded-xl border border-red-500/40">
                        <div class="flex items-center gap-2">
                            <span class="text-white font-extrabold text-base tracking-wide">PrimeVest</span>
                        </div>
                        <span class="text-white text-sm font-bold tracking-wide">4.9 ★★★★★</span>
                    </div>
                    
                    <!-- Other companies - normal styling -->
                    <div class="flex items-center justify-between py-2.5 border-b border-white/10">
                        <div class="flex items-center gap-2">
                            <span class="text-white/50 text-sm">eToro</span>
                        </div>
                        <span class="text-white/40 text-sm">4.6 ★★★★½</span>
                    </div>
                    <div class="flex items-center justify-between py-2.5 border-b border-white/10">
                        <div class="flex items-center gap-2">
                            <span class="text-white/50 text-sm">Interactive Brokers</span>
                        </div>
                        <span class="text-white/40 text-sm">4.5 ★★★★½</span>
                    </div>
                    <div class="flex items-center justify-between py-2.5 border-b border-white/10">
                        <div class="flex items-center gap-2">
                            <span class="text-white/50 text-sm">TD Ameritrade</span>
                        </div>
                        <span class="text-white/40 text-sm">4.4 ★★★★</span>
                    </div>
                    <div class="flex items-center justify-between py-2.5">
                        <div class="flex items-center gap-2">
                            <span class="text-white/50 text-sm">Fidelity</span>
                        </div>
                        <span class="text-white/40 text-sm">4.3 ★★★★</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js for FAQ Accordion -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
    /* Smooth FAQ transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* FAQ collapse animation */
    .faq-answer {
        overflow: hidden;
    }
</style>