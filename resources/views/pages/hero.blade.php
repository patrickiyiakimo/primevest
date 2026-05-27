<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>PrimeVest | Trade Shares and Forex</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, sans-serif;
            background-color: #ffffff;
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
        
        /* Hover effect for button icon */
        .group-hover\:translate-x-1:hover {
            transform: translateX(4px);
        }
        
        /* Custom blur utilities */
        .blur-3xl {
            filter: blur(64px);
        }
        
        .blur-2xl {
            filter: blur(40px);
        }

        /* Video background styling - FIXED to ensure visibility */
        .hero-video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: 0;
        }

        /* Dark overlay to ensure text readability while maintaining video visibility */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* Ensure content is above video */
        .hero-content-wrapper {
            position: relative;
            z-index: 2;
        }

        /* For better text contrast on video background */
        .hero-section h1,
        .hero-section .text-gray-900 {
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .hero-section .text-red-600 {
            color: #ff4d4d;
            text-shadow: 0 1px 4px rgba(0,0,0,0.2);
        }

        .hero-section .text-gray-600 {
            color: #f0f0f0;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        /* Adjust gradient backgrounds to blend with video */
        .hero-section .gradient-bg-element {
            opacity: 0.3;
            mix-blend-mode: overlay;
        }
    </style>
</head>
<body>

<!-- Hero Section with Video Background -->
<div class="relative min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] overflow-hidden bg-black hero-section">
    
    <!-- BACKGROUND VIDEO - Fixed with multiple source attempts and proper attributes -->
    <video class="hero-video-background" autoplay loop muted playsinline disableRemotePlayback>
        <source src="/videos/primevest-video4.mp4" type="video/mp4">
        <!-- Additional fallback in case of naming issue -->
        <source src="/videos/primevest-video4.webm" type="video/webm">
        <!-- Fallback text if video fails to load -->
        Your browser does not support the video tag.
    </video>
    
    <!-- Dark overlay for text contrast -->
    <div class="hero-overlay"></div>
    
    <!-- Red Gradient Background Elements (subtle blending with video) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Top right red gradient -->
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-red-500 via-red-400 to-transparent rounded-full opacity-30 gradient-bg-element"></div>
        <!-- Bottom left red gradient -->
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-tr from-red-500 via-red-300 to-transparent rounded-full opacity-30 gradient-bg-element"></div>
        <!-- Center subtle red glow -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-r from-red-500/15 via-transparent to-red-500/15 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-screen sm:min-h-[500px] md:min-h-[600px] lg:min-h-[700px] hero-content-wrapper">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <!-- Main Heading -->
                    <h1 class="text-4xl sm:text-5xl md:text-4xl lg:text-4xl xl:text-5xl font-bold mb-6 leading-tight pt-20 lg:pt-0 text-white">
                        Trade Shares and Forex <br>with <span class="text-red-500">Financial Thinking</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-base sm:text-lg md:text-xl text-gray-200 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Trade CFDs on a wide range of instruments, including popular FX pairs, Futures, Indices, 
                        Metals, Energies and Shares. Experience the global markets at your fingertips.
                    </p>

                    <!-- Button -->
                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="/register" 
                           class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl rounded-lg">
                            <span>Create Free Account</span>
                            <svg class="w-5 h-5 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Right Side - TradingView Widget
                <div class="flex justify-center lg:justify-end relative">
                    <div class="w-full rounded-xl overflow-hidden shadow-2xl">
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                            {
                                "width": "100%",
                                "height": 500,
                                "title": "Market Overview",
                                "titleColor": "#1f2937",
                                "colorTheme": "dark",
                                "locale": "en",
                                "trendLineColor": "#b91c1c",
                                "isTransparent": false,
                                "showVolume": false,
                                "showChart": true,
                                "tabs": [
                                    {
                                        "title": "Forex",
                                        "symbols": [
                                            {"s": "FX:EURUSD", "d": "EUR/USD"},
                                            {"s": "FX:GBPUSD", "d": "GBP/USD"},
                                            {"s": "FX:USDJPY", "d": "USD/JPY"},
                                            {"s": "FX:AUDUSD", "d": "AUD/USD"},
                                            {"s": "FX:USDCAD", "d": "USD/CAD"}
                                        ]
                                    },
                                    {
                                        "title": "Indices",
                                        "symbols": [
                                            {"s": "SP:SPX", "d": "S&P 500"},
                                            {"s": "NASDAQ:IXIC", "d": "Nasdaq"},
                                            {"s": "DJI:DJI", "d": "Dow Jones"},
                                            {"s": "FTSE:UKX", "d": "FTSE 100"},
                                            {"s": "HSI:HSI", "d": "Hang Seng"}
                                        ]
                                    },
                                    {
                                        "title": "Commodities",
                                        "symbols": [
                                            {"s": "TVC:GOLD", "d": "Gold"},
                                            {"s": "TVC:SILVER", "d": "Silver"},
                                            {"s": "NYMEX:CL1!", "d": "Crude Oil"},
                                            {"s": "TVC:USOIL", "d": "WTI Oil"}
                                        ]
                                    },
                                    {
                                        "title": "Crypto",
                                        "symbols": [
                                            {"s": "BINANCE:BTCUSDT", "d": "Bitcoin"},
                                            {"s": "BINANCE:ETHUSDT", "d": "Ethereum"},
                                            {"s": "BINANCE:SOLUSDT", "d": "Solana"},
                                            {"s": "BINANCE:BNBUSDT", "d": "BNB"}
                                        ]
                                    }
                                ]
                            }
                            </script>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </div>
</div>

<!-- Robust script to ensure video background works properly -->
<script>
    (function() {
        // Get video element
        const video = document.querySelector('.hero-video-background');
        
        // Function to attempt video playback with retries
        function attemptVideoPlay(videoElement, retries = 3) {
            if (!videoElement) return;
            
            // Set video volume to 0 to be safe (muted already, but double-check)
            videoElement.volume = 0;
            videoElement.muted = true;
            
            // Ensure video plays
            const playPromise = videoElement.play();
            
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log("Video autoplay error:", error);
                    if (retries > 0) {
                        console.log(`Retrying... (${retries} attempts left)`);
                        setTimeout(() => attemptVideoPlay(videoElement, retries - 1), 1000);
                    } else {
                        // If video fails completely, try to reload the source
                        console.log("Attempting to reload video source...");
                        const videoSrc = videoElement.querySelector('source');
                        if (videoSrc && videoSrc.src) {
                            const srcBackup = videoSrc.src;
                            videoElement.load();
                            videoElement.play().catch(e => console.log("Still failed:", e));
                        }
                    }
                });
            }
        }
        
        // Also handle visibility changes (pause when not visible to save resources, resume when visible)
        function handleVisibilityChange() {
            if (document.hidden) {
                if (video && !video.paused) {
                    video.pause();
                }
            } else {
                if (video && video.paused && video.readyState >= 2) {
                    attemptVideoPlay(video);
                }
            }
        }
        
        // Wait for page load to ensure DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            if (video) {
                // Preload metadata
                video.preload = 'auto';
                
                // Load the video
                video.load();
                
                // Attempt playback after a short delay to ensure DOM ready
                setTimeout(() => {
                    attemptVideoPlay(video);
                }, 100);
                
                // Handle loop manually to ensure it works
                video.addEventListener('ended', function() {
                    video.currentTime = 0;
                    attemptVideoPlay(video);
                });
                
                // Handle errors
                video.addEventListener('error', function(e) {
                    console.error("Video error:", e);
                    // Try to reload if error occurs
                    video.load();
                    setTimeout(() => attemptVideoPlay(video), 500);
                });
                
                // Handle canplay event to ensure video is ready
                video.addEventListener('canplay', function() {
                    if (video.paused) {
                        attemptVideoPlay(video);
                    }
                });
            } else {
                console.warn("Video element not found. Make sure the video file exists at: primevest-video4.mp4");
                // Provide visual feedback for debugging - show message in console only, no UI elements
            }
            
            // Add visibility change listener
            document.addEventListener('visibilitychange', handleVisibilityChange);
        });
        
        // Fallback: also try on window load
        window.addEventListener('load', function() {
            if (video && video.paused && video.readyState >= 2) {
                attemptVideoPlay(video);
            }
        });
        
        // Add click anywhere on document to help with autoplay restrictions on some browsers
        // This is a one-time helper for browsers that block autoplay until user interaction
        let autoplayHelperFired = false;
        function globalAutoplayHelper() {
            if (!autoplayHelperFired && video && video.paused) {
                console.log("User interaction detected - attempting video playback");
                attemptVideoPlay(video);
                autoplayHelperFired = true;
            }
        }
        
        // Only add the helper if the video is not playing after 2 seconds
        setTimeout(() => {
            if (video && video.paused) {
                document.addEventListener('click', globalAutoplayHelper, { once: true });
                document.addEventListener('touchstart', globalAutoplayHelper, { once: true });
            }
        }, 2000);
    })();
</script>

<style>
    /* Additional refinements for video overlay and text readability */
    .hero-section {
        position: relative;
    }
    
    /* Make sure the TradingView widget stands out against the video background */
    .tradingview-widget-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.3);
    }
    
    /* Smooth button hover effect */
    .group-hover\:translate-x-1:hover {
        transform: translateX(4px);
    }
    
    /* Custom blur utilities */
    .blur-3xl {
        filter: blur(64px);
    }
    
    .blur-2xl {
        filter: blur(40px);
    }
    
    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .hero-section h1 {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 640px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-section .text-base.sm\:text-lg {
            font-size: 1rem;
        }
    }
    
    /* Ensure video covers entire section even during resize */
    .hero-video-background {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Fallback background color while video loads - visible until video plays */
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
        z-index: -1;
    }
    
    /* Make gradient elements non-interactive */
    .gradient-bg-element {
        pointer-events: none;
    }
    
    /* Improve text readability on video */
    .hero-section .text-gray-200 {
        color: rgba(255, 255, 255, 0.9);
    }
    
    /* Ensure video container fills properly */
    .hero-section .absolute.inset-0 {
        position: absolute;
    }
    
    /* Fix for any z-index issues */
    .hero-video-background,
    .hero-overlay {
        position: absolute;
    }
</style>

</body>
</html>