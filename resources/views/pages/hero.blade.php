<!-- Hero Section -->
<section id="pv-hero" class="relative min-h-[520px] md:min-h-[75vh] lg:min-h-screen overflow-hidden bg-slate-950">

    <!-- Background Video Layer -->
    <div class="absolute inset-0" aria-hidden="true">
        <img src="/images/cryp-bg.webp" alt="" class="absolute inset-0 w-full h-full object-cover" loading="eager">

        <video class="pv-video pv-video-realestate absolute inset-0 w-full h-full object-cover"
               autoplay muted loop playsinline preload="auto" disablepictureinpicture
               poster="/images/cryp-bg.webp">
            <source src="{{ asset('videos/skyscraper-tower.mp4') }}" type="video/mp4" media="(min-width: 768px)">
            <source src="{{ asset('videos/skyscraper-tower-mobile.mp4') }}" type="video/mp4">
        </video>

        <div class="pv-bloom absolute inset-0" aria-hidden="true"></div>

        <video class="pv-video pv-video-trading absolute inset-0 w-full h-full object-cover"
               autoplay muted loop playsinline preload="auto" disablepictureinpicture>
            <source src="https://cdn.pixabay.com/video/2022/07/02/122881-726547787_large.mp4" type="video/mp4" media="(min-width: 768px)">
            <source src="https://cdn.pixabay.com/video/2022/07/02/122881-726547787_medium.mp4" type="video/mp4">
        </video>

        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/90 via-slate-950/60 to-slate-950/85"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-red-950/40 via-transparent to-red-600/15"></div>
        <div class="pv-vignette absolute inset-0" aria-hidden="true"></div>

        <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 34px 34px;"></div>

        <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-slate-950 to-transparent"></div>
        <div class="absolute bottom-0 inset-x-0 h-28 bg-gradient-to-b from-transparent to-slate-950"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 position-left flex min-h-[520px] md:min-h-[75vh] lg:min-h-screen items-center">
        <div class="max-w-4xl w-full px-5 sm:px-6 lg:px-8 pt-32 lg:pt-36 pb-20 text-left">

            <!-- <div class="animate-fade-up inline-flex items-center gap-2.5 rounded-full border border-white/10 bg-white/10 backdrop-blur px-4 py-1.5 shadow-[0_2px_12px_rgba(0,0,0,0.25)]">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-70"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                </span>
                <span class="text-xs font-semibold text-white/80 tracking-wide">Trusted by 22M+ investors worldwide</span>
            </div> -->

            <h1 class="animate-fade-up hero-delay-1 mt-6 text-[2.6rem] leading-[1.08] sm:text-5xl sm:leading-[1.08] xl:text-6xl font-extrabold tracking-tight text-white">
                Discover a smarter way to
                <span class="bg-gradient-to-r from-red-400 via-rose-300 to-amber-300 bg-clip-text text-transparent">build wealth</span>.
            </h1>

            <p class="animate-fade-up hero-delay-2 mt-6 text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl">
                From real estate to crypto, indices to forex — pick your asset, invest, and start
                earning from day one on our hassle-free, all-in-one platform.
            </p>

            <div class="animate-fade-up hero-delay-3 mt-9 flex flex-col sm:flex-row gap-4 justify-start items-start">
                <a href="/register"
                   class="group inline-flex items-center justify-center px-9 py-4 text-base font-bold text-white rounded-full bg-gradient-to-r from-red-600 via-red-500 to-rose-500 bg-[length:150%_auto] hover:bg-right transition-[background-position] duration-500 shadow-xl shadow-red-600/30 hover:shadow-2xl hover:shadow-red-600/40 hover:-translate-y-0.5">
                    <span>Create Free Account</span>
                    <svg class="w-5 h-5 ml-2.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="/real-estate"
                   class="group inline-flex items-center justify-center px-9 py-4 text-base font-bold text-white rounded-full border border-white/20 bg-white/5 backdrop-blur hover:bg-white/10 transition-all duration-300 hover:-translate-y-0.5">
                    <span>Explore Real Estate</span>
                    <svg class="w-5 h-5 ml-2.5 transition-transform duration-300 group-hover:translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10.5V13h18v-2.5l-1.5-8.5h-1L18 10H6L4.5 2H3.5L2 10.5z"></path>
                    </svg>
                </a>
            </div>

            <p class="animate-fade-up hero-delay-4 mt-7 text-sm text-slate-400 bg-white/5 border border-white/10 inline-flex items-center gap-2 rounded-full px-4 py-1.5">
                Stocks
                <span class="w-1 h-1 rounded-full bg-slate-500"></span>
                Forex
                <span class="w-1 h-1 rounded-full bg-slate-500"></span>
                Crypto
                <span class="w-1 h-1 rounded-full bg-slate-500"></span>
                Real Estate
            </p>
        </div>
    </div>
</section>

<style>
    /* Luxury entrance animations */
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-up {
        animation: fadeUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) both;
    }
    .hero-delay-1 { animation-delay: 0.12s; }
    .hero-delay-2 { animation-delay: 0.24s; }
    .hero-delay-3 { animation-delay: 0.36s; }
    .hero-delay-4 { animation-delay: 0.48s; }
    .hero-delay-5 { animation-delay: 0.60s; }

    /* Background video grading — unified filmic look across both clips */
    .pv-video {
        filter: saturate(1.15) contrast(1.08) brightness(0.92);
        will-change: transform, opacity;
    }

    /* Real estate / skyscraper layer — slow cinematic push-in */
    .pv-video-realestate {
        animation: pv-kenburns-in 26s ease-in-out infinite;
    }
    @keyframes pv-kenburns-in {
        from { transform: scale(1.02); }
        to   { transform: scale(1.13); }
    }

    /* Trading layer — counter-glide zoom, eases over the skyscrapers, then yields back */
    .pv-video-trading {
        opacity: 0;
        animation: pv-trading-cycle 20s ease-in-out infinite,
                   pv-kenburns-out 20s ease-in-out infinite;
    }
    @keyframes pv-kenburns-out {
        from { transform: scale(1.13); }
        to   { transform: scale(1.02); }
    }
    @keyframes pv-trading-cycle {
        0%, 28%   { opacity: 0; }
        38%       { opacity: 0.85; }
        44%, 56%  { opacity: 1; }
        64%       { opacity: 0.85; }
        74%, 100% { opacity: 0; }
    }

    /* Heat bloom — the glow that "ignites" as the trading world takes over */
    .pv-bloom {
        background: radial-gradient(ellipse at 50% 62%, rgba(244, 63, 94, 0.30), rgba(251, 191, 36, 0.10) 38%, transparent 68%);
        opacity: 0;
        animation: pv-bloom-cycle 20s ease-in-out infinite;
        pointer-events: none;
    }
    @keyframes pv-bloom-cycle {
        0%, 30%   { opacity: 0; }
        42%       { opacity: 1; }
        58%       { opacity: 1; }
        72%, 100% { opacity: 0; }
    }

    /* Cinematic vignette for depth */
    .pv-vignette {
        background: radial-gradient(ellipse at center, transparent 52%, rgba(2, 6, 23, 0.55) 100%);
        pointer-events: none;
    }

    .pv-scroll-cue { animation: pv-cue-fade 3s ease-in-out infinite; }
    @keyframes pv-cue-fade {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    @media (prefers-reduced-motion: reduce) {
        .pv-video-realestate, .pv-video-trading { animation: none; transform: none; }
        .pv-video-trading { opacity: 0; }
        .pv-bloom { animation: none; opacity: 0; }
        .pv-scroll-cue { animation: none; }
        .animate-fade-up, .animate-bounce { animation-duration: 0.01s; }
    }
</style>

<script>
    (function () {
        var hero = document.getElementById('pv-hero');
        if (!hero) return;
        var videos = hero.querySelectorAll('video');
        var io = new IntersectionObserver(function (entries) {
            if (entries[0].isIntersecting) {
                videos.forEach(function (v) { v.play().catch(function () {}); });
            } else {
                videos.forEach(function (v) { v.pause(); });
            }
        }, { threshold: 0.1 });
        io.observe(hero);
    })();
</script>