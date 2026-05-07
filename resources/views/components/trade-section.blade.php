<div class="w-full py-5 px-5 bg-white">
    <div class="max-w-7xl mx-auto">
        <!-- Two column layout centered -->
        <div class="flex items-center justify-center gap-14 flex-wrap md:flex-nowrap">
            <!-- Left side - Text Content -->
            <div class="flex-1 min-w-[300px]">
                <h2 class="text-4xl md:text-5xl font-bold leading-tight mb-6 text-gray-900">
                    Trade with low commissions and tight spreads
                </h2>
                <p class="text-lg leading-relaxed text-gray-400 mb-8">
                    With PrimeVest you get a transparent pricing structure and a secure 
                    and regulated trading environment. As an active trader you can also 
                    qualify for lower fees and extra benefits.
                </p>
                <a href="/register" class="inline-block px-8 py-3.5 bg-red-700 text-white font-semibold rounded-full hover:bg-red-800 transition-all duration-300">
                    See our Packages
                </a>
            </div>

            <!-- Right side - Image with overlay -->
            <div class="flex-1 min-w-[300px] text-center md:text-right relative">
                {{-- Video disabled - using image instead --}}
                {{-- <video class="rounded-xl  w-full h-auto" autoplay loop muted playsinline>
                    <source src="{{ asset('videos/laptop-video.mp4') }}" type="video/mp4">
                </video> --}}
                
                <!-- Image -->
                <img src="{{ asset('/images/laptop-bg.png') }}" alt="Trading Illustration" class="rounded-xl w-full h-auto">
                
                <!-- Overlay text to cover any logo -->
                <!-- <div class="absolute bottom-2 right-1 bg-gray-100/90 backdrop-blur-sm px-3 py-1.5 rounded-md text-xs text-gray-500 font-medium">
                    PrimeVest
                </div> -->
            </div>
        </div>
    </div>
</div>