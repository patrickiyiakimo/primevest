<div id="why-trade-section"
     x-data="featureSection()"
     class="relative py-20 lg:py-28 overflow-hidden bg-[#070b14] text-white">

    <div class="pv-blob pv-blob-1" aria-hidden="true"></div>
    <div class="pv-blob pv-blob-2" aria-hidden="true"></div>
    <div class="pv-blob pv-blob-3" aria-hidden="true"></div>
    <div class="absolute inset-0 pv-grid-overlay" aria-hidden="true"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="reveal text-center mb-12 lg:mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>
                <span class="pv-kicker text-xs font-semibold text-white/70">The PrimeVest Advantage</span>
            </div>

            <h2 class="mt-5 text-4xl lg:text-6xl font-extrabold tracking-tight">
                Why Trade With <span class="pv-gradient-text">PrimeVest</span>
            </h2>
            <p class="mt-4 text-white/60 text-base lg:text-lg max-w-2xl mx-auto">
                Experience trading with a trusted partner. Every tool, every market, every second — engineered for people who take it seriously.
            </p>

            <div class="mx-auto mt-6 h-px w-24 bg-gradient-to-r from-transparent via-red-500/70 to-transparent"></div>
        </div>

        <div x-ref="track"
             class="flex gap-5 px-1 pb-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide lg:grid lg:grid-cols-3 lg:overflow-visible lg:px-0 lg:pb-0 lg:gap-6">

            <template x-for="(feature, i) in features" :key="feature.id">
                <div class="pv-card pv-border reveal relative shrink-0 w-[84vw] max-w-[24rem] snap-center h-[26rem] lg:w-auto lg:max-w-none lg:h-[26rem] rounded-3xl overflow-hidden cursor-pointer bg-gray-900 group"
                     :class="{ 'pv-dim': isDimmed(feature.id) }"
                     :style="{ transitionDelay: (i * 0.12) + 's' }"
                     x-init="initTilt($el)"
                     role="button"
                     tabindex="0"
                     :aria-label="'Explore ' + feature.title"
                     @click="openFeature(feature.id)"
                     @keydown.enter="openFeature(feature.id)">

                    <div class="pv-bg absolute inset-0 bg-cover bg-center"
                         :style="'background-image:url(' + feature.image + ')'"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#070b14] via-[#070b14]/72 to-[#070b14]/15"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/25 to-transparent"></div>
                    <div class="pv-spot absolute inset-0"></div>

                    <div class="absolute top-5 left-6 flex items-center gap-3 z-10">
                        <span class="pv-number text-4xl font-extrabold text-white/15" x-text="feature.num"></span>
                        <span class="h-px w-8 bg-white/20"></span>
                    </div>

                    <div class="absolute top-5 right-6 z-10 rounded-full px-3 py-1 text-[11px] font-semibold text-white/70 bg-white/10 border border-white/10 backdrop-blur">
                        <span x-text="feature.tag"></span>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 p-6 lg:p-7 z-10">
                        <div class="w-13 h-13 lg:w-14 lg:h-14 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg shadow-red-900/50 mb-4">
                            <img :src="'/images/' + feature.icon" :alt="feature.title" class="w-7 h-7 lg:w-8 lg:h-8">
                        </div>

                        <h3 class="text-2xl font-bold" x-text="feature.title"></h3>
                        <p class="mt-2 text-white/70 text-sm leading-relaxed" x-text="feature.shortDesc"></p>

                        <div class="mt-5">
                            <div class="w-12 h-12 lg:w-11 lg:h-11 pv-cta-inner rounded-full bg-gradient-to-r from-red-500 to-red-600 flex items-center justify-center text-white transition-all duration-500 overflow-hidden group-hover:bg-gradient-to-r group-hover:from-red-600 group-hover:to-red-700 group-hover:shadow-lg group-hover:shadow-red-900/50">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="pv-cta-text text-sm font-semibold whitespace-nowrap">Explore</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div class="lg:hidden flex items-center justify-center gap-4 mt-6">
            <button @click="go(-1)" aria-label="Previous feature"
                    class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white/70 hover:bg-white/10 hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <div class="flex items-center gap-2">
                <template x-for="(feature, i) in features" :key="feature.id">
                    <button class="pv-dot"
                            :class="i === current ? 'pv-dot-active' : ''"
                            :aria-label="'Go to ' + feature.title"
                            @click="current = i; lastInteract = Date.now(); seq++">
                        <span class="pv-bar" x-show="i === current" :key="'bar-' + i + '-' + seq">
                            <span class="pv-bar-fill"></span>
                        </span>
                    </button>
                </template>
            </div>

            <button @click="go(1)" aria-label="Next feature"
                    class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white/70 hover:bg-white/10 hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <div class="hidden lg:block text-center mt-12">
            <span class="text-white/30 text-sm tracking-wide">Tap a card to go deeper</span>
        </div>
    </div>

    <div x-show="openId !== null"
         class="fixed inset-0 z-[80]"
         style="display: none;"
         role="dialog"
         aria-modal="true"
         aria-label="Feature details">

        <div x-transition.opacity class="absolute inset-0 bg-black/75 backdrop-blur-sm" @click="closeFeature()"></div>

        <div x-ref="sheet"
             x-transition:enter="transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)]"
             x-transition:enter-start="translate-y-full lg:translate-y-0 lg:translate-x-full"
             x-transition:enter-end="translate-y-0 lg:translate-x-0"
             x-transition:leave="transition-all duration-300 ease-in"
             x-transition:leave-start="translate-y-0 lg:translate-x-0"
             x-transition:leave-end="translate-y-full lg:translate-y-0 lg:translate-x-full"
             class="fixed bottom-0 left-0 right-0 h-[92dvh] w-full rounded-t-3xl lg:rounded-none lg:inset-y-0 lg:left-auto lg:right-0 lg:h-auto lg:w-[640px] flex flex-col overflow-hidden bg-[#0b1220] border-t lg:border-t-0 lg:border-l border-white/10 shadow-2xl z-[81]">

            <div x-ref="sheetHandle" class="lg:hidden h-11 shrink-0 flex items-center justify-center cursor-grab active:cursor-grabbing">
                <div class="w-10 h-1.5 rounded-full bg-white/20"></div>
            </div>

            <div class="relative flex-1 overflow-hidden">
                <template x-for="feature in features" :key="feature.id">
                    <div x-show="isOpen(feature.id)"
                         class="absolute inset-0 overflow-y-auto pv-scroll">

                        <button @click="closeFeature()" aria-label="Close"
                                class="absolute top-4 right-4 z-30 w-10 h-10 rounded-full bg-white/10 border border-white/15 text-white flex items-center justify-center hover:bg-white/20 hover:rotate-90 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <div class="pv-content" :class="{ 'pv-open': isOpen(feature.id) }">
                            <div class="pv-item relative h-56 lg:h-72 overflow-hidden">
                                <img :src="feature.image" :alt="feature.title" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0b1220] via-[#0b1220]/40 to-transparent"></div>
                                <div class="absolute bottom-5 left-6 flex items-end gap-4">
                                    <div class="w-16 h-16 shrink-0 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-xl shadow-red-900/40">
                                        <img :src="'/images/' + feature.icon" :alt="feature.title" class="w-9 h-9">
                                    </div>
                                    <div>
                                        <span class="text-xs font-bold text-red-400 tracking-widest" x-text="feature.num"></span>
                                        <h2 class="text-2xl lg:text-3xl font-extrabold leading-tight" x-text="feature.title"></h2>
                                        <p class="text-white/70 text-sm" x-text="feature.shortDesc"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 lg:p-7 pt-4">
                                <div class="pv-item grid grid-cols-3 gap-3 pv-stats">
                                    <template x-for="(stat, si) in feature.stats" :key="si">
                                        <div class="rounded-2xl bg-white/5 border border-white/10 p-3 lg:p-4 text-center">
                                            <div class="text-lg lg:text-2xl font-extrabold tabular-nums"
                                                 :data-count="stat.value"
                                                 :data-prefix="stat.prefix || ''"
                                                 :data-suffix="stat.suffix || ''"
                                                 :data-decimals="stat.decimals || 0"
                                                 :style="'transition-delay:' + (0.2 + si * 0.08) + 's'">0</div>
                                            <div class="mt-1 text-[10px] lg:text-[11px] text-white/50" x-text="stat.label"></div>
                                        </div>
                                    </template>
                                </div>

                                <div class="mt-7">
                                    <h4 class="pv-item text-white/40 uppercase text-[11px] tracking-[0.2em] mb-4 font-semibold" :style="'transition-delay:0.2s'">Key Benefits</h4>
                                    <div class="space-y-2.5">
                                        <template x-for="(benefit, bi) in feature.benefits" :key="bi">
                                            <div class="pv-item flex items-start gap-3 p-3.5 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-red-500/50 hover:bg-red-500/[0.06] transition-colors duration-300"
                                                 :style="'transition-delay:' + (0.3 + bi * 0.07) + 's'">
                                                <div class="mt-0.5 w-5 h-5 shrink-0 rounded-full bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-[#06251c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-white/80 leading-relaxed" x-text="benefit"></p>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <div class="pv-item mt-8 flex flex-col sm:flex-row gap-3" :style="'transition-delay:0.45s'">
                                    <a :href="feature.ctaLink"
                                       class="flex-1 text-center px-6 py-3.5 bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-red-900/40 hover:shadow-red-900/60 hover:-translate-y-0.5">
                                        <span x-text="feature.ctaText"></span>
                                        <svg class="w-4 h-4 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <button @click="closeFeature()"
                                            class="px-6 py-3.5 rounded-2xl bg-white/5 border border-white/10 text-white/70 font-semibold hover:bg-white/10 hover:text-white transition-all duration-300">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <div class="relative text-center mt-14 lg:mt-16">
        <a href="/register"
           class="inline-flex items-center gap-2 px-9 py-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold rounded-2xl transition-all duration-500 shadow-xl shadow-red-900/50 hover:shadow-red-900/70 hover:-translate-y-0.5">
            Start Trading Now
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
        </a>
    </div>

    <script>
        function featureSection() {
            return {
                features: [
                    {
                        id: 'pricing',
                        num: '01',
                        title: 'Competitive Pricing',
                        shortDesc: 'Trade with low commissions and tight spreads',
                        tag: 'Low Cost',
                        image: '/images/mentorship-program.jpg',
                        icon: 'pricing-svg.svg',
                        stats: [
                            { value: 0.00, decimals: 2, prefix: '$', suffix: '', label: 'Commission on CFDs' },
                            { value: 24, suffix: '/7', label: 'Free money moves' },
                            { value: 100, suffix: '%', label: 'Withdrawals on demand' }
                        ],
                        benefits: [
                            'Earn industry-leading APY on every dollar in your account',
                            'Move money for free 24/7 with no transfer fees',
                            'Stress less with instant withdrawals to eligible external accounts',
                            'Access your cash quickly whenever you need it',
                            'Bucket money for savings goals to stay on track',
                            "Add an investing account when you're ready to grow your wealth"
                        ],
                        ctaText: 'Start Trading',
                        ctaLink: '/register'
                    },
                    {
                        id: 'global',
                        num: '02',
                        title: 'Global Markets',
                        shortDesc: 'Access over 2,100 markets worldwide',
                        tag: '2,100+ Assets',
                        image: 'https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=800&h=600&fit=crop',
                        icon: 'global-svg.svg',
                        stats: [
                            { value: 2100, suffix: '+', label: 'Markets worldwide' },
                            { value: 24, suffix: '/5', label: 'Financial centers live' },
                            { value: 70, suffix: '+', label: 'Currencies & CFDs' }
                        ],
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
                        num: '03',
                        title: 'Premier Support',
                        shortDesc: '24/7 expert support whenever you need it',
                        tag: '24/7 Human',
                        image: '/images/ultimate-insurance.jpg',
                        icon: 'premier-svg.svg',
                        stats: [
                            { value: 2, suffix: ' min', label: 'Avg. response time' },
                            { value: 24, suffix: '/7', label: 'Live expert team' },
                            { value: 20, suffix: '+', label: 'Languages spoken' }
                        ],
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
                openId: null,
                current: 0,
                seq: 0,
                sheetInited: false,
                lastInteract: 0,
                autoplayLocked: false,
                autoplayTimer: null,
                reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
                desktop: window.matchMedia('(min-width: 1024px)').matches,

                init() {
                    this.startAutoplay();
                    this.$watch('current', () => this.scrollToCurrent());

                    window.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') this.closeFeature();
                    });

                    const section = this.$el;
                    const io = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                section.classList.add('in-view');
                                io.disconnect();
                            }
                        });
                    }, { threshold: 0.15 });
                    io.observe(section);

                    const track = this.$refs.track;
                    track.addEventListener('scroll', () => {
                        if (this.autoplayLocked) return;
                        const card = track.children[0];
                        if (!card) return;
                        const step = card.offsetWidth + 20;
                        const idx = Math.round(track.scrollLeft / step);
                        if (idx !== this.current) this.current = idx;
                        this.lastInteract = Date.now();
                    }, { passive: true });
                },

                startAutoplay() {
                    clearInterval(this.autoplayTimer);
                    if (this.desktop || this.reducedMotion) return;
                    this.autoplayTimer = setInterval(() => {
                        if (this.openId !== null) return;
                        if (Date.now() - this.lastInteract < 6000) return;
                        this.seq++;
                        this.current = (this.current + 1) % this.features.length;
                    }, 4200);
                },

                scrollToCurrent() {
                    if (this.desktop) return;
                    const track = this.$refs.track;
                    const card = track && track.children[this.current];
                    if (!track || !card) return;
                    const target = Math.max(0, card.offsetLeft - (track.clientWidth - card.offsetWidth) / 2);
                    this.autoplayLocked = true;
                    track.scrollTo({ left: target, behavior: 'smooth' });
                    setTimeout(() => { this.autoplayLocked = false; }, 600);
                },

                go(delta) {
                    this.lastInteract = Date.now();
                    this.seq++;
                    this.current = (this.current + delta + this.features.length) % this.features.length;
                },

                openFeature(id) {
                    this.openId = id;
                    document.documentElement.classList.add('overflow-hidden');
                    document.body.classList.add('overflow-hidden');
                    this.$nextTick(() => {
                        this.animateStats();
                        this.initSheet();
                    });
                },

                closeFeature() {
                    this.openId = null;
                    document.documentElement.classList.remove('overflow-hidden');
                    document.body.classList.remove('overflow-hidden');
                },

                isOpen(id) { return this.openId === id; },
                isDimmed(id) { return this.openId !== null && this.openId !== id; },

                animateStats() {
                    document.querySelectorAll('.pv-stats [data-count]').forEach((el) => {
                        const target = parseFloat(el.dataset.count);
                        const prefix = el.dataset.prefix || '';
                        const suffix = el.dataset.suffix || '';
                        const decimals = parseInt(el.dataset.decimals || 0, 10);
                        const duration = 1000;
                        const start = performance.now();
                        const step = (now) => {
                            const p = Math.min((now - start) / duration, 1);
                            const eased = 1 - Math.pow(1 - p, 3);
                            el.textContent = prefix + (target * eased).toLocaleString(undefined, {
                                minimumFractionDigits: decimals,
                                maximumFractionDigits: decimals
                            }) + suffix;
                            if (p < 1) requestAnimationFrame(step);
                        };
                        requestAnimationFrame(step);
                    });
                },

                initTilt(el) {
                    if (this.reducedMotion) return;
                    const fine = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
                    if (!fine) return;

                    const max = 8;
                    let raf = null;

                    const update = (e) => {
                        const rect = el.getBoundingClientRect();
                        const px = (e.clientX - rect.left) / rect.width;
                        const py = (e.clientY - rect.top) / rect.height;
                        el.style.transform = 'perspective(1100px) rotateX(' + ((0.5 - py) * max).toFixed(1) + 'deg) rotateY(' + ((px - 0.5) * max).toFixed(1) + 'deg) translateY(-6px)';
                        el.style.setProperty('--mx', (px * 100) + '%');
                        el.style.setProperty('--my', (py * 100) + '%');
                    };

                    el.addEventListener('pointerenter', (e) => update(e));
                    el.addEventListener('pointermove', (e) => {
                        if (raf) cancelAnimationFrame(raf);
                        raf = requestAnimationFrame(() => update(e));
                    });
                    el.addEventListener('pointerleave', () => {
                        if (raf) cancelAnimationFrame(raf);
                        el.style.transform = '';
                    });
                },

                initSheet() {
                    if (this.desktop || this.reducedMotion || this.sheetInited) return;
                    this.sheetInited = true;
                    const handle = this.$refs.sheetHandle;
                    const sheet = this.$refs.sheet;
                    if (!handle || !sheet) return;

                    const drag = { y: 0, t: 0, dragging: false };

                    const onStart = (e) => {
                        drag.y = e.touches[0].clientY;
                        drag.t = Date.now();
                        drag.dragging = true;
                    };

                    const onMove = (e) => {
                        if (!drag.dragging) return;
                        const dy = e.touches[0].clientY - drag.y;
                        if (dy > 0) {
                            e.preventDefault();
                            sheet.style.transform = 'translateY(' + Math.min(dy, sheet.offsetHeight * 0.45) + 'px)';
                        }
                    };

                    const onEnd = (e) => {
                        if (!drag.dragging) return;
                        drag.dragging = false;
                        const dy = e.changedTouches[0].clientY - drag.y;
                        const dt = Date.now() - drag.t;
                        sheet.style.transform = '';
                        if (dy > 120 || (dt < 250 && dy > 60)) this.closeFeature();
                    };

                    handle.addEventListener('touchstart', onStart, { passive: true });
                    handle.addEventListener('touchmove', onMove, { passive: false });
                    handle.addEventListener('touchend', onEnd);
                }
            };
        }
    </script>

    <style>
        @property --angle { syntax: "<angle>"; initial-value: 0deg; inherits: false; }

        .pv-kicker { letter-spacing: 0.18em; }

        .pv-gradient-text {
            background: linear-gradient(90deg, #f87171, #fb7185, #fbbf24, #f87171);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: pv-hue 6s linear infinite;
        }
        @keyframes pv-hue { to { background-position: 200% center; } }

        .pv-blob { position: absolute; border-radius: 9999px; filter: blur(80px); will-change: transform; pointer-events: none; }
        .pv-blob-1 { width: 42rem; height: 42rem; top: -14rem; left: -14rem; background: radial-gradient(circle at center, rgba(239, 68, 68, 0.45), transparent 60%); animation: pv-drift-1 18s ease-in-out infinite; }
        .pv-blob-2 { width: 36rem; height: 36rem; top: 18%; right: -16rem; background: radial-gradient(circle at center, rgba(244, 63, 94, 0.35), transparent 60%); animation: pv-drift-2 22s ease-in-out infinite; }
        .pv-blob-3 { width: 30rem; height: 30rem; bottom: -10rem; left: 30%; background: radial-gradient(circle at center, rgba(251, 113, 133, 0.25), transparent 60%); animation: pv-drift-3 26s ease-in-out infinite; }
        @keyframes pv-drift-1 { 0%, 100% { transform: translate(0, 0) scale(1); } 50% { transform: translate(6rem, 4rem) scale(1.15); } }
        @keyframes pv-drift-2 { 0%, 100% { transform: translate(0, 0) scale(1); } 50% { transform: translate(-5rem, 3rem) scale(0.92); } }
        @keyframes pv-drift-3 { 0%, 100% { transform: translate(0, 0) scale(1); } 50% { transform: translate(4rem, -3rem) scale(1.1); } }

        .pv-grid-overlay {
            background-image: linear-gradient(rgba(255, 255, 255, 0.035) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(255, 255, 255, 0.035) 1px, transparent 1px);
            background-size: 56px 56px;
            -webkit-mask-image: radial-gradient(circle at 50% 0%, black, transparent 78%);
            mask-image: radial-gradient(circle at 50% 0%, black, transparent 78%);
        }

        .reveal, .pv-item { opacity: 0; }
        .reveal {
            transform: translateY(36px) scale(0.98);
            filter: blur(4px);
            transition: opacity 0.9s ease, transform 0.9s cubic-bezier(0.16, 1, 0.3, 1), filter 0.9s ease;
        }
        #why-trade-section.in-view .reveal { opacity: 1; transform: none; filter: none; }

        .pv-card { transition: transform 0.5s cubic-bezier(0.32, 0.72, 0, 1), box-shadow 0.5s ease, opacity 0.4s ease; will-change: transform; }
        .pv-card:hover { box-shadow: 0 24px 80px -24px rgba(239, 68, 68, 0.45); }
        .pv-card.pv-dim { opacity: 0.35; }

        .pv-spot {
            background: radial-gradient(560px circle at var(--mx, 50%) var(--my, 50%), rgba(255, 255, 255, 0.14), transparent 45%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }
        .pv-card:hover .pv-spot { opacity: 1; }

        .pv-border::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            z-index: 1;
            background: conic-gradient(from var(--angle, 0deg), transparent 0%, rgba(248, 113, 113, 0.8) 10%, transparent 22%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }
        .pv-border:hover::before { opacity: 1; animation: pv-rotate 5s linear infinite; }
        @keyframes pv-rotate { to { --angle: 360deg; } }

        .pv-bg { transform: scale(1.08); transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1); }
        .pv-card:hover .pv-bg { transform: scale(1.16); }

        .pv-cta-text { opacity: 0; width: 0; margin: 0; }
        .pv-card:hover .pv-cta-inner { padding-left: 1.25rem; width: auto; min-width: 3rem; }
        .pv-card:hover .pv-cta-text { opacity: 1; width: auto; margin-left: 0.5rem; }

        .pv-dot { width: 0.5rem; height: 0.5rem; border-radius: 9999px; background: rgba(255, 255, 255, 0.25); transition: all 0.35s ease; display: flex; align-items: center; justify-content: center; }
        .pv-dot-active { width: 1.75rem; background: rgba(239, 68, 68, 0.35); }
        .pv-bar { display: block; width: 100%; height: 100%; border-radius: 9999px; overflow: hidden; }
        .pv-bar-fill {
            display: block;
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #ef4444, #f97316);
            transform-origin: left center;
            animation: pv-autofill 4.2s linear forwards;
        }
        @keyframes pv-autofill { from { transform: scaleX(0); } to { transform: scaleX(1); } }

        .pv-content .pv-item {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.7s ease, transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .pv-content.pv-open .pv-item { opacity: 1; transform: none; }

        .pv-scroll { scrollbar-width: thin; scrollbar-color: rgba(239, 68, 68, 0.5) transparent; }
        .pv-scroll::-webkit-scrollbar { width: 6px; }
        .pv-scroll::-webkit-scrollbar-track { background: transparent; }
        .pv-scroll::-webkit-scrollbar-thumb { background: rgba(239, 68, 68, 0.5); border-radius: 3px; }

        .scrollbar-hide { scrollbar-width: none; -ms-overflow-style: none; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }

        .w-13 { width: 3.25rem; }
        .h-13 { height: 3.25rem; }

        .tabular-nums { font-variant-numeric: tabular-nums; }

        @media (prefers-reduced-motion: reduce) {
            .reveal, .pv-item { opacity: 1 !important; transform: none !important; filter: none !important; transition: none !important; }
            .pv-blob, .pv-gradient-text, .pv-bar-fill, .pv-border::before { animation: none !important; }
            .pv-bg, .pv-card { transition: none !important; transform: none !important; }
        }
    </style>

    <noscript>
        <style>
            #why-trade-section .reveal { opacity: 1; transform: none; filter: none; }
        </style>
    </noscript>
</div>