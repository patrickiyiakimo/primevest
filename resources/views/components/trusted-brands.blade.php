<!-- Trusted Brands Section - Left Label + Right Sliding Logos -->
<div class="w-full py-12 md:py-16 bg-white border-y border-gray-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        
        <!-- Desktop: Two Column Layout (Label Left, Logos Right) -->
        <div class="hidden md:flex items-center justify-between gap-8 lg:gap-12">
            
            <!-- Left Side - Heading -->
            <div class="flex-shrink-0">
                <p class="text-sm sm:text-base font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                    Trusted by leading brands & startups
                </p>
            </div>
            
            <!-- Right Side - Brand Logos (static grid on desktop) -->
            <div class="flex flex-wrap justify-end items-center gap-8 lg:gap-12">
                
                <!-- Token Market -->
                <div class="flex-shrink-0">
                    <img src="/images/token market.png" alt="Token Market" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
                <!-- ICO Watchlist -->
                <div class="flex-shrink-0">
                    <img src="/images/icowatchlist.png" alt="ICO Watchlist" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
                <!-- ICO Rating -->
                <div class="flex-shrink-0">
                    <img src="/images/icorating.png" alt="ICO Rating" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
                <!-- ICO Alert -->
                <div class="flex-shrink-0">
                    <img src="/images/icoalert.png" alt="ICO Alert" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
                <!-- Coin Market Alert -->
                <div class="flex-shrink-0">
                    <img src="/images/coinmarketalert.png" alt="Coin Market Alert" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
                <!-- Coin Clarity -->
                <div class="flex-shrink-0">
                    <img src="/images/coin clarity.png" alt="Coin Clarity" class="h-8 sm:h-10 md:h-10 lg:h-11 w-auto">
                </div>
                
            </div>
        </div>
        
        <!-- Mobile: Sliding horizontal scroll (no carousel, native scroll) -->
        <div class="md:hidden">
            <!-- Mobile Heading - Centered above sliding logos -->
            <div class="text-center mb-6">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    Trusted by leading brands & startups
                </p>
            </div>
            
            <!-- Sliding Logos Container - Horizontal scroll with professional styling -->
            <div class="overflow-x-auto overflow-y-hidden pb-4 -mx-5 px-5 scrollbar-thin scroll-smooth" style="scrollbar-width: thin;">
                <div class="flex items-center gap-8 min-w-max">
                    
                    <!-- Token Market -->
                    <div class="flex-shrink-0">
                        <img src="/images/token market.png" alt="Token Market" class="h-9 w-auto">
                    </div>
                    
                    <!-- ICO Watchlist -->
                    <div class="flex-shrink-0">
                        <img src="/images/icowatchlist.png" alt="ICO Watchlist" class="h-9 w-auto">
                    </div>
                    
                    <!-- ICO Rating -->
                    <div class="flex-shrink-0">
                        <img src="/images/icorating.png" alt="ICO Rating" class="h-9 w-auto">
                    </div>
                    
                    <!-- ICO Alert -->
                    <div class="flex-shrink-0">
                        <img src="/images/icoalert.png" alt="ICO Alert" class="h-9 w-auto">
                    </div>
                    
                    <!-- Coin Market Alert -->
                    <div class="flex-shrink-0">
                        <img src="/images/coinmarketalert.png" alt="Coin Market Alert" class="h-9 w-auto">
                    </div>
                    
                    <!-- Coin Clarity -->
                    <div class="flex-shrink-0">
                        <img src="/images/coin clarity.png" alt="Coin Clarity" class="h-9 w-auto">
                    </div>
                    
                </div>
            </div>
            
            <!-- Subtle Gradient Fade Indicators on Mobile Edges (optional, adds professional touch) -->
            <div class="relative">
                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-8 h-full bg-gradient-to-r from-white to-transparent pointer-events-none"></div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 w-8 h-full bg-gradient-to-l from-white to-transparent pointer-events-none"></div>
            </div>
        </div>
        
    </div>
</div>

<style>
    /* Custom scrollbar styling for webkit browsers (Chrome, Safari, Edge) */
    .overflow-x-auto::-webkit-scrollbar {
        height: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
    
    /* Smooth scrolling for the sliding container */
    .overflow-x-auto {
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }
    
    /* Prevent horizontal scrollbar from disrupting layout */
    .min-w-max {
        min-width: max-content;
    }
</style>

<!-- Optional: Simple JavaScript for enhanced scroll hint (purely visual, no carousel) -->
<script>
    (function() {
        // This adds a subtle visual hint that logos are scrollable on mobile
        // No carousel functionality - just a one-time subtle pulse on the scroll container
        const scrollContainer = document.querySelector('.md\\:hidden .overflow-x-auto');
        if (scrollContainer && window.innerWidth < 768) {
            // Check if content overflows (is scrollable)
            if (scrollContainer.scrollWidth > scrollContainer.clientWidth) {
                // Add a subtle class to indicate scrollability (optional)
                scrollContainer.style.cursor = 'grab';
                
                // Optional: Very subtle fade animation on load to hint scrolling
                const gradientLeft = document.querySelector('.md\\:hidden .absolute.left-0');
                const gradientRight = document.querySelector('.md\\:hidden .absolute.right-0');
                if (gradientLeft && gradientRight) {
                    gradientLeft.style.opacity = '0.6';
                    gradientRight.style.opacity = '0.6';
                    setTimeout(() => {
                        gradientLeft.style.transition = 'opacity 1s';
                        gradientRight.style.transition = 'opacity 1s';
                        gradientLeft.style.opacity = '0.3';
                        gradientRight.style.opacity = '0.3';
                    }, 1500);
                }
            }
        }
    })();
</script>