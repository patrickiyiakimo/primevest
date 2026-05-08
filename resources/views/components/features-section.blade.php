<!-- Features Section -->
<div class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                Why Trade With PrimeVest
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Experience trading with a trusted partner
            </p>
        </div>
        
        <!-- Interactive Features Grid - 3 columns on laptop -->
        <div x-data="{ 
            activeFeature: null,
            features: [
                { 
                    id: 'pricing', 
                    title: 'Competitive Pricing', 
                    shortDesc: 'Trade with low commissions and tight spreads',
                    image: '/images/mentorship-program.jpg', 
                    icon: 'pricing-svg.svg',
                    benefits: [
                        'Earn industry-leading APY on every dollar in your account',
                        'Move money for free 24/7 with no transfer fees',
                        'Stress less with instant withdrawals to eligible external accounts',
                        'Access your cash quickly whenever you need it',
                        'Bucket money for savings goals to stay on track',
                        'Add an investing account when you\'re ready to grow your wealth'
                    ],
                    ctaText: 'Start Trading',
                    ctaLink: '/register'
                },
                { 
                    id: 'global', 
                    title: 'Global Markets', 
                    shortDesc: 'Access over 2,100 markets worldwide',
                    image: 'https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=800&h=600&fit=crop', 
                    icon: 'global-svg.svg',
                    benefits: [
                        'Trade across Forex, Indices, Commodities and more',
                        'Diversify your portfolio with international exposure',
                        'Access S&P 500, FTSE 100, Nikkei 225 and emerging markets',
                        'Develop a truly global investment strategy',
                        'Trade 24/5 with access to all major financial centers',
                        'Multi-currency accounts for seamless international trading'
                    ],
                    ctaText: 'Explore Markets',
                    ctaLink: '/markets'
                },
                { 
                    id: 'support', 
                    title: 'Premier Support', 
                    shortDesc: '24/7 expert support whenever you need it',
                    image: '/images/ultimate-insurance.jpg', 
                    icon: 'premier-svg.svg',
                    benefits: [
                        '24/7 multilingual customer support via live chat, email, and phone',
                        'Expert assistance with account setup and platform navigation',
                        'Dedicated account managers for premium clients',
                        'Technical support available around the clock',
                        'Fast response times with average under 2 minutes',
                        'Comprehensive knowledge base and video tutorials'
                    ],
                    ctaText: 'Contact Support',
                    ctaLink: '/contact'
                }
            ],
            setActive(id) { 
                if (this.activeFeature === id) {
                    this.activeFeature = null;
                    document.body.style.overflow = '';
                } else {
                    this.activeFeature = id;
                    document.body.style.overflow = 'hidden';
                }
            }
        }" class="relative">
            
            <!-- Features Grid - 3 columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="(feature, index) in features" :key="feature.id">
                    <div>
                        <!-- Card Container - Collapsed State -->
                        <div x-show="activeFeature !== feature.id" 
                             class="relative overflow-hidden rounded-xl cursor-pointer group h-[320px] transition-all duration-500"
                             :class="{ 'opacity-40 scale-95': activeFeature !== null && activeFeature !== feature.id, 'opacity-100 scale-100': activeFeature === null || activeFeature === feature.id }"
                             @click="setActive(feature.id)">
                            
                            <!-- Background Image -->
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105"
                                 :style="'background-image: url(' + feature.image + ');'">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/60 to-black/40"></div>
                            </div>
                            
                            <!-- Content Overlay -->
                            <div class="relative p-6 flex flex-col h-full justify-end">
                                
                                <!-- Icon & Title Row -->
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center shadow-lg">
                                        <img :src="'/images/' + feature.icon" :alt="feature.title" class="w-7 h-7">
                                    </div>
                                    <h3 class="text-xl font-bold text-white" x-text="feature.title"></h3>
                                </div>
                                
                                <!-- Brief Description -->
                                <p class="text-white/80 text-sm mb-4 leading-relaxed" x-text="feature.shortDesc"></p>
                                
                                <!-- Arrow Indicator -->
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-white/60 text-xs">Click to explore</span>
                                    <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:bg-red-700 transition-all duration-300">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            
            <!-- Expanded Card Modal - Fixed position overlay -->
            <div x-show="activeFeature !== null" 
                 x-transition:enter="transition-all duration-300 ease-out"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="fixed inset-0 z-50"
                 style="display: none;">
                
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black/60" @click="setActive(null)"></div>
                
                <!-- Slide-out Panel - Scrollable -->
                <div x-show="activeFeature !== null"
                     x-transition:enter="transition-all duration-500 ease-out"
                     x-transition:enter-start="transform translate-x-full"
                     x-transition:enter-end="transform translate-x-0"
                     x-transition:leave="transition-all duration-300 ease-in"
                     x-transition:leave-start="transform translate-x-0"
                     x-transition:leave-end="transform translate-x-full"
                     class="absolute right-0 top-0 w-full lg:w-[600px] h-full bg-white shadow-2xl overflow-y-auto"
                     style="overflow-y: auto !important;">
                    
                    <template x-for="feature in features" :key="feature.id">
                        <div x-show="activeFeature === feature.id" class="relative">
                            <!-- Close Button -->
                            <button @click="setActive(null)" class="sticky top-6 right-6 z-10 w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700 transition shadow-lg float-right mr-6 mt-6">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            
                            <!-- Hero Image -->
                            <div class="relative h-64 overflow-hidden clear-both">
                                <img :src="feature.image" :alt="feature.title" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <div class="absolute bottom-6 left-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-16 h-16 bg-red-600 rounded-xl flex items-center justify-center shadow-xl">
                                            <img :src="'/images/' + feature.icon" :alt="feature.title" class="w-9 h-9">
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-white" x-text="feature.title"></h2>
                                            <p class="text-white/80 text-sm" x-text="feature.shortDesc"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Body -->
                            <div class="p-8">
                                <!-- Benefits List -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        Key Benefits
                                    </h3>
                                    <div class="space-y-3">
                                        <template x-for="(benefit, idx) in feature.benefits" :key="idx">
                                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl hover:bg-red-50 transition-colors duration-200">
                                                <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-gray-600 text-sm leading-relaxed" x-text="benefit"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                
                                <!-- Additional Feature Highlight -->
                                <div class="mb-8 p-5 bg-gradient-to-r from-red-50 to-red-100 rounded-xl">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Ready to get started?</h4>
                                            <p class="text-sm text-gray-600">Open an account in minutes and start trading with confidence.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CTA Buttons -->
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a :href="feature.ctaLink" class="flex-1 text-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                                        <span x-text="feature.ctaText"></span>
                                        <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <button @click="setActive(null)" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- Bottom Carousel Navigation -->
            <div x-show="activeFeature !== null" 
                 x-transition:enter="transition-all duration-300"
                 x-transition:enter-start="opacity-0 transform translateY(20)"
                 x-transition:enter-end="opacity-100 transform translateY(0)"
                 class="fixed bottom-8 left-1/2 transform -translate-x-1/2 z-50 flex gap-3 bg-white rounded-full px-4 py-2 shadow-xl border border-gray-200"
                 style="display: none;">
                <template x-for="feature in features" :key="feature.id">
                    <button @click="setActive(feature.id)" 
                            class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-300"
                            :class="activeFeature === feature.id ? 'bg-red-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'">
                        <span x-text="feature.title"></span>
                    </button>
                </template>
            </div>
        </div>
        
        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-lg hover:shadow-xl">
                Start Trading Now
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
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
    
    /* Scrollbar for expanded card - ensure scrolling works */
    .overflow-y-auto {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
    }
    
    .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    /* Sticky close button */
    .sticky {
        position: sticky;
    }
</style>