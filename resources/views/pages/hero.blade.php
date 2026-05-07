
<!-- Hero Section with Video Loading State -->
<div class="relative min-h-screen sm:min-h-[250px] md:min-h-[500px] lg:min-h-[600px] xl:min-h-[700px] overflow-hidden flex flex-col">
   
    <!-- Loading State (shows while video loads) -->
    <div id="video-loading" class="absolute inset-0 z-20 bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center">
        <div class="text-center">
            <!-- Animated Logo/Text -->
            <div class="relative mb-6">
                <h1 class="text-xl md:text-3xl font-bold tracking-wider">
                    <span class="bg-gradient-to-r from-red-400 via-red-500 to-red-600 bg-clip-text text-transparent animate-pulse">
                        PrimeVest
                    </span>
                </h1>
                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-12 h-0.5 bg-red-500 rounded-full animate-pulse"></div>
            </div>
            
            <!-- Loading Dots -->
            <div class="flex items-center justify-center space-x-2 mt-6">
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                <div class="w-2 h-2 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
            </div>
            
            <!-- Loading Status Text -->
            <!-- <p id="loading-status" class="text-gray-400 text-sm mt-4">Loading video...</p> -->
        </div>
    </div>

    <!-- Video Background (hidden initially) -->
    <div id="video-container" class="absolute inset-0 z-0 opacity-0 transition-opacity duration-700">
        <video id="hero-video" class="w-full h-full object-cover" autoplay loop muted playsinline preload="auto">
            <source src="{{ asset('videos/primevest-video4.mp4') }}" type="video/mp4">
            <!-- Fallback image in case video doesn't load -->
            <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=1920&h=1080&fit=crop" 
                 alt="Trading Background">
        </video>
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-gray-900/80"></div>
    </div>
    
    <!-- Hero Content (hidden until video is ready) -->
    <div id="hero-content" class="relative z-10 flex-1 flex items-center opacity-0 transition-opacity duration-700">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-10 sm:py-12 md:py-16 lg:py-20 w-full">
            <div class="max-w-4xl mx-auto sm:mx-0 text-center sm:text-left">
                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl font-bold text-white mb-5 sm:mb-4 md:mb-6 leading-tight">
                    <span class="bg-gradient-to-r from-red-400 to-red-500 uppercase bg-clip-text text-transparent block">
                       Trade Shares and Forex <br class="hidden sm:hidden md:block">with Financial Thinking
                    </span>
                </h1>
                
                <!-- Description -->
                <p class="text-base sm:text-base md:text-lg lg:text-xl text-gray-200 leading-relaxed sm:leading-relaxed mb-8 sm:mb-8 md:mb-10 max-w-2xl mx-auto sm:mx-0">
                    Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                    Metals, Energies and Shares. Experience the global markets at your fingertips.
                </p>

                <!-- Button -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center sm:justify-start">
                    <a href="/register" 
                       class="group relative inline-flex items-center justify-center px-8 sm:px-8 py-4 sm:py-4 text-base sm:text-lg font-semibold rounded-full text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500">
                        <span>Create Free Account</span>
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="mt-10 sm:mt-10 md:mt-12 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center sm:justify-start">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Regulated Broker</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Zero Commission</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Instant Execution</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span class="text-gray-200 text-sm sm:text-sm">Secure Platform</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Wait for video to be fully ready before showing
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('hero-video');
        const loadingDiv = document.getElementById('video-loading');
        const videoContainer = document.getElementById('video-container');
        const heroContent = document.getElementById('hero-content');
        const loadingStatus = document.getElementById('loading-status');
        
        function showContent() {
            // Fade out loading state
            if (loadingDiv) {
                loadingDiv.style.opacity = '0';
                setTimeout(function() {
                    loadingDiv.style.display = 'none';
                }, 500);
            }
            
            // Show video and hero content with fade in
            if (videoContainer) {
                videoContainer.style.opacity = '1';
            }
            
            if (heroContent) {
                heroContent.style.opacity = '1';
            }
            
            // Ensure video is playing
            if (video) {
                video.play().catch(function(e) {
                    console.log('Video autoplay prevented:', e);
                });
            }
        }
        
        if (video) {
            // Update loading status text
            const updateStatus = (message) => {
                if (loadingStatus) loadingStatus.textContent = message;
            };
            
            updateStatus('Loading video...');
            
            // Check if video is already loaded and ready to play
            if (video.readyState >= 3) { // HAVE_FUTURE_DATA or HAVE_ENOUGH_DATA
                updateStatus('Video ready!');
                showContent();
            }
            
            // When video has enough data to play through
            video.addEventListener('canplaythrough', function() {
                updateStatus('Video ready!');
                setTimeout(showContent, 300); // Small delay for smooth transition
            });
            
            // When video metadata is loaded (fallback)
            video.addEventListener('loadedmetadata', function() {
                if (video.readyState < 3) {
                    updateStatus('Preparing video stream...');
                }
            });
            
            // When video starts playing
            video.addEventListener('playing', function() {
                if (loadingDiv && loadingDiv.style.display !== 'none') {
                    updateStatus('Playing now...');
                    showContent();
                }
            });
            
            // Fallback: force show after 5 seconds regardless
            setTimeout(function() {
                if (loadingDiv && loadingDiv.style.display !== 'none') {
                    updateStatus('Starting now...');
                    showContent();
                }
            }, 5000);
            
        } else {
            // No video element found, hide loading immediately
            if (loadingDiv) loadingDiv.style.display = 'none';
            if (heroContent) heroContent.style.opacity = '1';
        }
    });
</script>

<style>
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }
    .animate-bounce {
        animation: bounce 2s infinite;
    }
    
    /* Prevent any layout shift */
    #video-loading,
    #video-container,
    #hero-content {
        transition: opacity 0.5s ease-in-out;
    }
</style>
