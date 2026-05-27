<!-- Testimonials Section - PrimeVest -->
<div class="py-20 lg:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <div class="flex items-center space-x-2 bg-red-100 rounded-full px-4 py-2">
                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-red-700 text-sm font-semibold tracking-wide">Client Testimonials</span>
                </div>
            </div>
            
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                What Our Clients Say
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Join thousands of satisfied traders who trust PrimeVest for their investment journey
            </p>
        </div>

        <!-- Testimonials Carousel -->
        <div x-data="{ 
            currentSlide: 0, 
            testimonials: [
                {
                    text: 'PrimeVest runs a quick and reliable system. It feels great to know that I can always trust their support system to come through for me. Their response speed is prompt and the delivery precise to the last detail.',
                    name: 'Rukky Sanders',
                    role: 'Verified Trader',
                    image: '/images/FB_IMG_1757815688420.jpg',
                    rating: 5
                },
                {
                    text: 'I\'m an engineer in Washington DC. When an account manager brought this opportunity to me, I just said casually to invest with $500. My story today is on a premium plan. Truly life-changing!',
                    name: 'Scott Smith',
                    role: 'Premium Plan Investor',
                    image: '/images/FB_IMG_1758010236426.jpg',
                    rating: 5
                },
                {
                    text: 'I have only been a member for a few months and I have already earned a decent amount of money. Finally a real and honest company that does what it says. Thank you so much for this great opportunity!',
                    name: 'Alex Glyson',
                    role: 'Happy Investor',
                    image: '/images/FB_IMG_1757815849959.jpg',
                    rating: 5
                },
                {
                    text: 'The customer service at PrimeVest is exceptional. They guided me through every step of my investment journey. I\'ve seen consistent returns and feel confident in my financial future.',
                    name: 'Sarah Michaels',
                    role: 'Long-term Investor',
                    image: '/images/FB_IMG_1757815900467 (1).jpg',
                    rating: 5
                },
                {
                    text: 'The MT4 platform integration is seamless. I can trade from anywhere, and the withdrawal process is incredibly fast. Best decision I made for my investment portfolio.',
                    name: 'Michael Cornelius',
                    role: 'Active Trader',
                    image: '/images/FB_IMG_1758008965260.jpg',
                    rating: 5
                }
            ], 
            next() { 
                this.currentSlide = (this.currentSlide + 1) % this.testimonials.length 
            }, 
            prev() { 
                this.currentSlide = (this.currentSlide - 1 + this.testimonials.length) % this.testimonials.length 
            } 
        }" class="relative max-w-4xl mx-auto">
            
            <!-- Carousel Container -->
            <div class="overflow-hidden rounded-2xl">
                <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + (currentSlide * 100) + '%)'">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <div class="w-full flex-shrink-0 px-4">
                            <!-- Testimonial Card with Background Image -->
                            <div class="relative overflow-hidden transition-all duration-300 hover:transform hover:-translate-y-2 min-h-[480px] md:min-h-[450px] w-full"
                                 style="background-image: url('{{ asset('images/testimonial card.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                
                                <!-- Semi-transparent overlay for better text readability -->
                                <!-- <div class="absolute inset-0 bg-black/40"></div> -->
                                
                                <div class="relative p-4 sm:p-6 md:p-8 z-10 h-full flex flex-col">
                                    <!-- Quote Icon -->
                                    <div class="mb-4">
                                        <svg class="w-10 h-10 md:w-12 md:h-12 text-red-400 opacity-80" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                    </div>
                                    
                                    <!-- Testimonial Text -->
                                    <p class="text-white text-sm md:text-base leading-relaxed mb-6 line-clamp-8 md:line-clamp-6 flex-grow" x-text="testimonial.text"></p>
                                    
                                    <!-- User Info -->
                                    <div class="flex items-center space-x-3 md:space-x-4 pt-4 border-t border-white/20">
                                        <img :src="testimonial.image" :alt="testimonial.name" class="w-10 h-10 md:w-14 md:h-14 rounded-full object-cover border-2 border-red-500">
                                        <div class="flex-1">
                                            <h4 class="font-bold text-white text-sm md:text-base" x-text="testimonial.name"></h4>
                                            <div class="flex items-center space-x-1 mt-1">
                                                <div class="flex text-yellow-400">
                                                    <template x-for="i in 5">
                                                        <svg class="w-3 h-3 md:w-4 md:h-4 fill-current" viewBox="0 0 24 24">
                                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                        </svg>
                                                    </template>
                                                </div>
                                                <span class="text-xs text-white/70">5.0</span>
                                            </div>
                                            <p class="text-xs md:text-sm text-white/80 font-medium mt-1" x-text="testimonial.role"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <button @click="prev" class="absolute -left-3 md:-left-5 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 md:p-3 shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300 z-20 focus:outline-none">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button @click="next" class="absolute -right-3 md:-right-5 top-1/2 transform -translate-y-1/2 bg-white rounded-full p-2 md:p-3 shadow-lg hover:bg-red-600 hover:text-white transition-all duration-300 z-20 focus:outline-none">
                <svg class="w-4 h-4 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Dots Navigation -->
            <div class="flex justify-center space-x-2 mt-6">
                <template x-for="(testimonial, index) in testimonials" :key="index">
                    <button @click="currentSlide = index" 
                            class="h-2 rounded-full transition-all duration-300 focus:outline-none"
                            :class="currentSlide === index ? 'w-8 bg-red-600' : 'w-2 bg-gray-300'"></button>
                </template>
            </div>
        </div>
    </div>
</div>

<!-- Trust Indicators -->
<div class="mt-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-0 text-center">
            
            <!-- Item 1 - Active Traders -->
            <div class="relative py-6 md:py-8 border-r border-gray-800 last:border-r-0">
                <div class="text-3xl md:text-5xl font-bold text-white mb-1 md:mb-2">
                    <span id="counter1" class="counter" data-target="10000">0</span><span>+</span>
                </div>
                <p class="text-gray-400 text-xs md:text-sm">Active Traders</p>
            </div>
            
            <!-- Item 2 - Client Satisfaction -->
            <div class="relative py-6 md:py-8 border-r border-gray-800 last:border-r-0">
                <div class="text-3xl md:text-5xl font-bold text-white mb-1 md:mb-2">
                    <span id="counter2" class="counter" data-target="98">0</span><span>%</span>
                </div>
                <p class="text-gray-400 text-xs md:text-sm">Client Satisfaction</p>
            </div>
            
            <!-- Item 3 - Countries Served -->
            <div class="relative py-6 md:py-8 border-r border-gray-800 last:border-r-0">
                <div class="text-3xl md:text-5xl font-bold text-white mb-1 md:mb-2">
                    <span id="counter3" class="counter" data-target="150">0</span><span>+</span>
                </div>
                <p class="text-gray-400 text-xs md:text-sm">Countries Served</p>
            </div>
            
            <!-- Item 4 - Support Available -->
            <div class="relative py-6 md:py-8 border-r border-gray-800 last:border-r-0">
                <div class="text-3xl md:text-5xl font-bold text-white mb-1 md:mb-2">
                    <span id="counter4" class="counter" data-target="24">0</span><span>/7</span>
                </div>
                <p class="text-gray-400 text-xs md:text-sm">Support Available</p>
            </div>
            
        </div>
    </div>
</div>



<style>
    /* Selection color */
    ::selection {
        background-color: #10b981;
        color: white;
    }
    
    /* Line clamp for testimonial text */
    .line-clamp-6 {
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-8 {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .line-clamp-8 {
            -webkit-line-clamp: 10;
        }
    }
    
    /* Smooth transition for carousel */
    .transition-transform {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Ensure the card background covers properly on all devices */
    .bg-cover {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<script>
    // Counter animation function
    function animateCounter(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const currentValue = Math.floor(progress * (end - start) + start);
            element.textContent = currentValue;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    
    // Intersection Observer to trigger counters when visible
    const observerOptions = {
        threshold: 0.3,
        rootMargin: "0px"
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = document.querySelectorAll('.counter');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const current = parseInt(counter.textContent);
                    if (current === 0) {
                        animateCounter(counter, 0, target, 2000);
                    }
                });
                // Unobserve after animation starts
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe the trust indicators section
    document.addEventListener('DOMContentLoaded', () => {
        const section = document.querySelector('.bg-black');
        if (section) {
            observer.observe(section);
        }
    });
</script>