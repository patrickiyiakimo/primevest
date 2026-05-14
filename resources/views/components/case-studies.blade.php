<!-- Hero Section - Same Design as Homepage -->
<!-- <div class="relative min-h-[400px] sm:min-h-[450px] md:min-h-[500px] overflow-hidden bg-white"> -->
    
    <!-- Section Header -->
<div class="text-center mb-5">
    <div class="inline-flex items-center justify-center mb-4">
        <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
        </div>
    </div>
    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
        Real Results from <span class="text-red-600">Real Traders</span>
    </h2>
    <p class="text-gray-500 text-lg max-w-2xl mx-auto">
        Success stories from our community of traders who achieved their financial goals with PrimeVest
    </p>
</div>
<!-- </div> -->

<!-- Case Studies Interactive Grid -->
<div class="py-10 lg:py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div x-data="{ 
            activeCase: null,
            caseStudies: [
                { 
                    id: 'beginner', 
                    title: 'Beginner Success', 
                    subtitle: 'Turning $1,000 into $4,500 in 3 Months',
                    roi: '+350% ROI',
                    image: '/images/beginners-success.jpg', 
                    description: 'A beginner trader used our risk management strategies and daily analysis to steadily grow their account while minimizing losses.',
                    fullDescription: 'This case study follows a complete novice trader who started with just $1,000. With no prior trading experience, they were skeptical about their ability to succeed in the financial markets. Our dedicated mentorship program and comprehensive educational resources provided them with the foundation they needed. Within three months, they achieved an impressive 350% return on investment by following our risk management protocols and daily market analysis. Their success demonstrates that with the right guidance and tools, anyone can achieve remarkable results in trading.',
                    keyPoints: [
                        'Started with $1,000 capital',
                        'No prior trading experience',
                        'Used daily market analysis reports',
                        'Followed strict risk management rules',
                        'Achieved 350% ROI in 90 days'
                    ],
                    ctaText: 'Start Your Journey',
                    ctaLink: '/register'
                },
                { 
                    id: 'automated', 
                    title: 'Automated Trading', 
                    subtitle: 'Consistent Monthly Profits with Low Risk',
                    roi: '6-8% Monthly ROI',
                    image: '/images/automated-trading.jpg', 
                    description: 'A corporate client implemented our automated trading solutions, achieving a stable 6–8% monthly ROI with minimal manual intervention.',
                    fullDescription: 'A mid-sized corporate client approached us seeking to generate consistent returns without dedicating extensive time to manual trading. We implemented our proprietary automated trading algorithms, which utilize advanced machine learning models to identify high-probability trades. The system operates 24/5, executing trades based on pre-defined parameters and risk thresholds. The result was a stable 6-8% monthly return with significantly reduced emotional bias and human error.',
                    keyPoints: [
                        'Fully automated trading system',
                        '24/5 market monitoring',
                        'Machine learning algorithms',
                        'Risk-controlled parameters',
                        '6-8% consistent monthly returns'
                    ],
                    ctaText: 'Explore Automation',
                    ctaLink: '/register'
                },
                { 
                    id: 'portfolio', 
                    title: 'Portfolio Recovery', 
                    subtitle: 'Recovering from Market Losses',
                    roi: '+40% Recovery',
                    image: '/images/portfolio-recovery.jpg', 
                    description: 'An investor who faced a 40% portfolio drawdown regained profitability in 5 months using our custom recovery plan.',
                    fullDescription: 'After suffering significant losses during a market downturn, this experienced investor had lost confidence in their trading abilities. Our team conducted a thorough analysis of their portfolio, identifying the root causes of their drawdown. We developed a customized recovery plan that included position sizing adjustments, diversification strategies, and a disciplined approach to trade management. Over five months, not only did they recover their 40% loss, but they also achieved additional gains.',
                    keyPoints: [
                        '40% portfolio drawdown recovered',
                        'Custom recovery strategy',
                        'Position sizing adjustments',
                        'Diversification implementation',
                        '5-month recovery period'
                    ],
                    ctaText: 'Recover Your Portfolio',
                    ctaLink: '/register'
                },
                { 
                    id: 'risk', 
                    title: 'Risk Management', 
                    subtitle: 'Diversifying for Stability',
                    roi: '-35% Volatility',
                    image: '/images/risk-management.jpg', 
                    description: 'We helped a client shift from trading only major forex pairs to a diversified portfolio including commodities and indices, reducing volatility by 35%.',
                    fullDescription: 'This client was exclusively trading major forex pairs, exposing their portfolio to significant currency risk and correlated movements. Our risk assessment team recommended a strategic diversification across multiple asset classes including commodities, indices, and select equities. By implementing our suggested allocation model and incorporating hedging strategies, the client achieved a 35% reduction in overall portfolio volatility while maintaining competitive returns. This case demonstrates the power of proper asset allocation.',
                    keyPoints: [
                        'Previously only traded forex',
                        'Added commodities and indices',
                        'Hedging strategies implemented',
                        '35% volatility reduction',
                        'Improved risk-adjusted returns'
                    ],
                    ctaText: 'Manage Your Risk',
                    ctaLink: '/register'
                },
                { 
                    id: 'advanced', 
                    title: 'Advanced Strategies', 
                    subtitle: 'Scaling Up a Winning Strategy',
                    roi: '+100% Account Growth',
                    image: '/images/advanced-strategies.jpg', 
                    description: 'An experienced trader doubled their account size in 6 months by optimizing their entry/exit rules with our expert guidance.',
                    fullDescription: 'This experienced trader had a profitable strategy but was struggling to scale up effectively. Our expert advisors worked closely with them to analyze their trading patterns and optimize their entry and exit rules. We introduced advanced technical indicators, backtesting methodologies, and position scaling techniques. The result was a complete transformation of their trading approach, leading to a doubling of their account size over six months while maintaining their original risk parameters.',
                    keyPoints: [
                        'Existing profitable strategy',
                        'Entry/exit optimization',
                        'Backtesting validation',
                        'Position scaling techniques',
                        '100% account growth'
                    ],
                    ctaText: 'Advance Your Trading',
                    ctaLink: '/register'
                },
                { 
                    id: 'mentorship', 
                    title: 'Mentorship Program', 
                    subtitle: 'From Demo to Real Profits',
                    roi: '+$2,000 Profit',
                    image: '/images/mentorship-program.jpg', 
                    description: 'A new trader moved from a practice account to real trading, reaching $2,000 profit in their first 60 days with our mentorship program.',
                    fullDescription: 'This complete beginner spent several months trading on a demo account with inconsistent results. After enrolling in our comprehensive mentorship program, they received one-on-one coaching, structured learning modules, and daily feedback on their trades. The structured guidance helped them transition to live trading with confidence. Within 60 days of trading real capital, they achieved $2,000 in profits while strictly adhering to their risk management plan. Their success story proves that proper education and mentorship are invaluable.',
                    keyPoints: [
                        'Started on demo account',
                        'One-on-one coaching sessions',
                        'Structured learning path',
                        'Daily trade feedback',
                        '$2,000 profit in 60 days'
                    ],
                    ctaText: 'Join Mentorship',
                    ctaLink: '/register'
                }
            ],
            openCase(id) {
                this.activeCase = id;
                document.body.classList.add('modal-open');
            },
            closeCase() {
                this.activeCase = null;
                document.body.classList.remove('modal-open');
            }
        }" class="relative">
            
            <!-- Case Studies Grid - 3 columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="(caseStudy, index) in caseStudies" :key="caseStudy.id">
                    <div>
                        <!-- Card Container - Collapsed State -->
                        <div x-show="activeCase !== caseStudy.id" 
                             class="relative overflow-hidden cursor-pointer group h-[380px] transition-all duration-500 border border-gray-200 bg-white"
                             :class="{ 'opacity-40 scale-95': activeCase !== null && activeCase !== caseStudy.id, 'opacity-100 scale-100': activeCase === null || activeCase === caseStudy.id }"
                             @click="openCase(caseStudy.id)">
                            
                            <!-- Image -->
                            <div class="h-48 overflow-hidden">
                                <img :src="caseStudy.image" :alt="caseStudy.title" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            
                            <!-- Content -->
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-xl font-bold text-gray-800" x-text="caseStudy.title"></h3>
                                    <span class="text-red-600 font-bold text-sm" x-text="caseStudy.roi"></span>
                                </div>
                                <p class="text-gray-600 text-sm font-medium mb-2" x-text="caseStudy.subtitle"></p>
                                <p class="text-gray-500 text-sm leading-relaxed" x-text="caseStudy.description"></p>
                                <div class="mt-4 flex justify-end mb-8">
                                    <div class="w-10 h-10 bg-green-600 flex items-center justify-center shadow-lg hover:bg-green-700 transition-all duration-300 cursor-pointer">
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
            
            <!-- Expanded Case Study Modal - Slide-out Panel -->
            <div x-show="activeCase !== null" 
                 x-transition:enter="transition-all duration-300 ease-out"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="fixed inset-0 z-50"
                 style="display: none;">
                
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black/60" @click="closeCase()"></div>
                
                <!-- Slide-out Panel -->
                <div x-show="activeCase !== null"
                     x-transition:enter="transition-all duration-500 ease-out"
                     x-transition:enter-start="transform translate-x-full"
                     x-transition:enter-end="transform translate-x-0"
                     x-transition:leave="transition-all duration-300 ease-in"
                     x-transition:leave-start="transform translate-x-0"
                     x-transition:leave-end="transform translate-x-full"
                     class="absolute right-0 top-0 w-full lg:w-[650px] h-full bg-white shadow-2xl overflow-y-auto"
                     style="overflow-y: auto !important;">
                    
                    <template x-for="caseStudy in caseStudies" :key="caseStudy.id">
                        <div x-show="activeCase === caseStudy.id" class="relative">
                            <!-- Close Button -->
                            <button @click="closeCase()" class="sticky top-6 right-6 z-10 w-10 h-10 bg-red-600 flex items-center justify-center text-white hover:bg-red-700 transition shadow-lg float-right mr-6 mt-6">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            
                            <!-- Hero Image -->
                            <div class="relative h-72 overflow-hidden clear-both">
                                <img :src="caseStudy.image" :alt="caseStudy.title" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <div class="absolute bottom-6 left-6">
                                    <div>
                                        <h2 class="text-3xl font-bold text-white" x-text="caseStudy.title"></h2>
                                        <p class="text-red-300 text-sm mt-1 font-semibold" x-text="caseStudy.roi"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content Body -->
                            <div class="p-8">
                                <!-- Subtitle -->
                                <div class="mb-6">
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2" x-text="caseStudy.subtitle"></h3>
                                    <div class="w-12 h-0.5 bg-red-600"></div>
                                </div>
                                
                                <!-- Full Description -->
                                <div class="mb-8">
                                    <p class="text-gray-600 leading-relaxed" x-text="caseStudy.fullDescription"></p>
                                </div>
                                
                                <!-- Key Points -->
                                <div class="mb-8">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        Key Takeaways
                                    </h3>
                                    <div class="space-y-3">
                                        <template x-for="(point, idx) in caseStudy.keyPoints" :key="idx">
                                            <div class="flex items-start gap-3 p-3 bg-gray-50 hover:bg-red-50 transition-colors duration-200">
                                                <div class="w-5 h-5 bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                                    <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-gray-600 text-sm leading-relaxed" x-text="point"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                
                                <!-- CTA Section -->
                                <div class="mt-8 p-6 bg-gradient-to-r from-red-50 to-red-100">
                                    <div class="flex items-start gap-3">
                                        <div class="w-12 h-12 bg-red-600 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800 mb-1">Ready to achieve similar results?</h4>
                                            <p class="text-sm text-gray-600">Open an account today and start your journey toward financial success.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CTA Buttons -->
                                <div class="flex flex-col sm:flex-row gap-3 mt-6">
                                    <a :href="caseStudy.ctaLink" class="flex-1 text-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-md hover:shadow-lg">
                                        <span x-text="caseStudy.ctaText"></span>
                                        <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <button @click="closeCase()" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold transition-all duration-300">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- Bottom Carousel Navigation -->
            <div x-show="activeCase !== null" 
                 x-transition:enter="transition-all duration-300"
                 x-transition:enter-start="opacity-0 transform translateY(20)"
                 x-transition:enter-end="opacity-100 transform translateY(0)"
                 class="fixed bottom-8 left-1/2 transform -translate-x-1/2 z-50 flex gap-3 bg-white px-4 py-2 shadow-xl border border-gray-200"
                 style="display: none;">
                <template x-for="caseStudy in caseStudies" :key="caseStudy.id">
                    <button @click="openCase(caseStudy.id)" 
                            class="px-4 py-2 text-sm font-medium transition-all duration-300"
                            :class="activeCase === caseStudy.id ? 'bg-red-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'">
                        <span x-text="caseStudy.title"></span>
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-16 lg:py-20 bg-gray-50 border-t border-gray-200">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
            Ready to Write Your Own Success Story?
        </h2>
        <p class="text-gray-500 text-lg mb-8">
            Join thousands of successful traders who achieved their financial goals with PrimeVest
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/register" class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-lg hover:shadow-xl">
                Start Trading Today
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
    
    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden !important;
        position: fixed;
        width: 100%;
        height: 100%;
    }
    
    /* Scrollbar for expanded card */
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