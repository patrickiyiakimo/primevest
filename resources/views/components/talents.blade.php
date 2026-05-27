<div class="w-full bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Meet Our Investment Experts
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Connect with verified investment professionals ready to help you achieve your financial goals
            </p>
        </div>

        <!-- Desktop Toggle - Vertical border separated -->
        <div class="hidden md:flex justify-center mb-12">
            <div class="inline-flex items-center">
                <button data-category="all" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    All Experts
                </button>
                <button data-category="developers" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Strategists
                </button>
                <button data-category="designers" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Analysts
                </button>
                <button data-category="marketing" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Marketing
                </button>
                <button data-category="consultants" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Consultants
                </button>
                <button data-category="managers" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Managers
                </button>
                <button data-category="sales" class="toggle-btn category-btn px-6 py-2.5 text-base font-medium transition-all duration-300 border-r border-gray-200 last:border-r-0">
                    Sales Experts
                </button>
            </div>
        </div>

        <!-- Mobile Select Dropdown -->
        <div class="md:hidden mb-8">
            <select id="mobileCategorySelect" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="all">All Experts</option>
                <option value="developers">Strategists</option>
                <option value="designers">Analysts</option>
                <option value="marketing">Marketing</option>
                <option value="consultants">Consultants</option>
                <option value="managers">Managers</option>
                <option value="sales">Sales Experts</option>
            </select>
        </div>

        <!-- Desktop Grid Container (4 columns) -->
        <div id="desktopGrid" class="hidden md:grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Dynamic content injected here -->
        </div>

        <!-- Mobile Carousel Container -->
        <div id="mobileCarousel" class="md:hidden relative">
            <div id="carouselTrack" class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth gap-4 pb-8" style="scrollbar-width: none; -ms-overflow-style: none;">
                <!-- Dynamic carousel slides injected here -->
            </div>
            <!-- Dot Indicators -->
            <div id="dotIndicators" class="flex justify-center gap-2 mt-4">
                <!-- Dynamic dots injected here -->
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-12">
            <a href="/discover-talent" class="inline-flex items-center gap-2 px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                Discover 20,000+ More Experts in the PrimeVest Network
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
    // Image mapping for each expert
    const expertImages = [
        "/images/FB_IMG_1758008965260.jpg",
        "/images/FB_IMG_1757815900467 (1).jpg",
        "/images/FB_IMG_1757815849959.jpg",
        "/images/FB_IMG_1758010236426.jpg",
        "/images/FB_IMG_1757815688420.jpg"
    ];

    // Talent Data - Investment focused professionals with images
    const talentData = {
        all: [
            {
                name: "Sarah Chen",
                role: "Verified Expert in Trading",
                title: "Forex & Commodities Strategist",
                expertise: ["Technical Analysis", "Forex Trading", "Risk Management", "Market Psychology"],
                category: "developers",
                image: expertImages[0]
            },
            {
                name: "Marcus Williams",
                role: "Verified Expert in Investment",
                title: "Portfolio Manager",
                expertise: ["Asset Allocation", "Equity Analysis", "Derivatives", "Bloomberg Terminal"],
                category: "developers",
                image: expertImages[1]
            },
            {
                name: "Elena Volkov",
                role: "Verified Expert in Analytics",
                title: "Quantitative Analyst",
                expertise: ["Python", "Machine Learning", "Algorithmic Trading", "Statistical Modeling"],
                category: "developers",
                image: expertImages[2]
            },
            {
                name: "David Kim",
                role: "Verified Expert in UX",
                title: "Investment Platform Designer",
                expertise: ["UI/UX Design", "User Research", "Prototyping", "Design Systems"],
                category: "designers",
                image: expertImages[3]
            },
            {
                name: "Isabella Rossi",
                role: "Verified Expert in Design",
                title: "Financial UI Designer",
                expertise: ["Visual Design", "Interactive Design", "Figma", "User Testing"],
                category: "designers",
                image: expertImages[4]
            },
            {
                name: "Oliver Schmidt",
                role: "Verified Expert in Marketing",
                title: "Growth Marketing Director",
                expertise: ["Digital Strategy", "SEO/SEM", "Content Marketing", "Conversion Optimization"],
                category: "marketing",
                image: expertImages[0]
            },
            {
                name: "Nina Patel",
                role: "Verified Expert in Marketing",
                title: "Brand Strategy Consultant",
                expertise: ["Brand Positioning", "Market Research", "Social Media", "Campaign Management"],
                category: "marketing",
                image: expertImages[1]
            },
            {
                name: "James O'Connor",
                role: "Verified Expert in Consulting",
                title: "Financial Management Consultant",
                expertise: ["M&A Strategy", "Financial Modeling", "Due Diligence", "FP&A"],
                category: "consultants",
                image: expertImages[2]
            },
            {
                name: "Wei Zhang",
                role: "Verified Expert in Consulting",
                title: "Risk Management Consultant",
                expertise: ["Enterprise Risk", "Regulatory Compliance", "Stress Testing", "Basel III"],
                category: "consultants",
                image: expertImages[3]
            },
            {
                name: "Carlos Mendez",
                role: "Verified Expert in Management",
                title: "Project Management Lead",
                expertise: ["Agile Methodology", "Scrum Master", "JIRA", "Stakeholder Management"],
                category: "managers",
                image: expertImages[4]
            },
            {
                name: "Amara Okonkwo",
                role: "Verified Expert in Product",
                title: "Product Manager - Trading Platforms",
                expertise: ["Product Strategy", "Roadmap Planning", "User Stories", "A/B Testing"],
                category: "managers",
                image: expertImages[0]
            },
            {
                name: "Thomas Anderson",
                role: "Verified Expert in Sales",
                title: "Institutional Sales Director",
                expertise: ["Client Acquisition", "Relationship Management", "Negotiation", "CRM"],
                category: "sales",
                image: expertImages[1]
            },
            {
                name: "Sophie Laurent",
                role: "Verified Expert in Sales",
                title: "Business Development Executive",
                expertise: ["Lead Generation", "Sales Strategy", "Partnerships", "Account Management"],
                category: "sales",
                image: expertImages[2]
            }
        ],
        developers: [],
        designers: [],
        marketing: [],
        consultants: [],
        managers: [],
        sales: []
    };

    // Populate category arrays
    talentData.all.forEach(person => {
        if (talentData[person.category]) {
            talentData[person.category].push(person);
        }
    });

    // Function to generate profile card HTML
    function generateProfileCard(profile, showViewProfile = true) {
        return `
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-full">
                <!-- Profile Image Frame -->
                <div class="relative h-64 bg-cover bg-center" style="background-image: url('${profile.image}'); background-position: center;">
                    <div class="absolute inset-0 bg-black/20"></div>
                    <!-- Logo at bottom right -->
                    <div class="absolute bottom-3 right-3">
                        <img src="/images/primevest-logo.png" alt="PrimeVest" class="h-8 w-auto opacity-90">
                    </div>
                    ${showViewProfile ? '<p class="absolute bottom-3 left-3 text-white text-xs font-medium">View full profile →</p>' : ''}
                </div>
                
                <!-- Profile Info -->
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">${profile.name}</h3>
                    <p class="text-red-600 text-sm font-semibold mb-2">${profile.role}</p>
                    <p class="text-gray-700 text-base font-medium mb-3">${profile.title}</p>
                    
                    <!-- Expertise Tags -->
                    <div class="flex flex-wrap gap-2">
                        ${profile.expertise.map(skill => `<span class="text-xs px-2 py-1 bg-gray-100 text-gray-600 rounded-full">${skill}</span>`).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    // Generate CTA card for desktop
    function generateCTACard() {
        return `
            <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl overflow-hidden shadow-lg flex flex-col items-center justify-center text-center p-8 h-full min-h-[450px]">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mb-5">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">20,000+ More Experts</h3>
                <p class="text-red-100 text-sm mb-6">Connect with verified investment professionals worldwide</p>
                <a href="/discover-talent" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white text-red-600 font-semibold rounded-lg hover:bg-red-50 transition-all duration-300">
                    Explore Network
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        `;
    }

    // Render desktop grid (3 profiles + 1 CTA)
    function renderDesktopGrid(profiles) {
        const grid = document.getElementById('desktopGrid');
        if (!grid) return;
        
        const displayProfiles = profiles.slice(0, 3);
        let html = '';
        
        displayProfiles.forEach(profile => {
            html += generateProfileCard(profile, true);
        });
        
        html += generateCTACard();
        grid.innerHTML = html;
    }

    // Render mobile carousel (all profiles as slides)
    function renderMobileCarousel(profiles) {
        const track = document.getElementById('carouselTrack');
        const dotsContainer = document.getElementById('dotIndicators');
        if (!track || !dotsContainer) return;
        
        // Clear existing
        track.innerHTML = '';
        dotsContainer.innerHTML = '';
        
        // Create slides
        profiles.forEach((profile, index) => {
            const slide = document.createElement('div');
            slide.className = 'snap-start shrink-0 w-full';
            slide.style.width = '100%';
            slide.innerHTML = generateProfileCard(profile, false);
            track.appendChild(slide);
        });
        
        // Create dot indicators
        for (let i = 0; i < profiles.length; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-red-600 w-4' : 'bg-gray-300');
            dot.setAttribute('data-index', i);
            dot.addEventListener('click', () => {
                const slideWidth = track.children[0]?.offsetWidth || 0;
                track.scrollTo({ left: slideWidth * i, behavior: 'smooth' });
            });
            dotsContainer.appendChild(dot);
        }
        
        // Update active dot on scroll
        let scrollTimeout;
        track.addEventListener('scroll', () => {
            if (scrollTimeout) clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                const scrollLeft = track.scrollLeft;
                const slideWidth = track.children[0]?.offsetWidth || 0;
                const activeIndex = Math.round(scrollLeft / slideWidth);
                const dots = dotsContainer.querySelectorAll('button');
                dots.forEach((dot, idx) => {
                    if (idx === activeIndex) {
                        dot.classList.add('bg-red-600', 'w-4');
                        dot.classList.remove('bg-gray-300', 'w-2');
                    } else {
                        dot.classList.add('bg-gray-300', 'w-2');
                        dot.classList.remove('bg-red-600', 'w-4');
                    }
                });
            }, 100);
        });
    }

    // Update active toggle button styling
    function updateActiveButton(activeCategory) {
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
            const category = btn.getAttribute('data-category');
            if (category === activeCategory) {
                btn.classList.add('bg-red-50', 'text-red-700', 'font-semibold');
                btn.classList.remove('text-gray-600', 'font-medium');
                btn.style.borderBottom = '2px solid #dc2626';
            } else {
                btn.classList.remove('bg-red-50', 'text-red-700', 'font-semibold');
                btn.classList.add('text-gray-600', 'font-medium');
                btn.style.borderBottom = 'none';
            }
        });
    }

    // Filter and render based on category
    function filterByCategory(category) {
        let profiles = [];
        if (category === 'all') {
            profiles = [...talentData.all];
        } else {
            profiles = [...(talentData[category] || [])];
        }
        
        // Shuffle for variety
        for (let i = profiles.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [profiles[i], profiles[j]] = [profiles[j], profiles[i]];
        }
        
        renderDesktopGrid(profiles);
        renderMobileCarousel(profiles);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        const shuffledAll = [...talentData.all];
        for (let i = shuffledAll.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffledAll[i], shuffledAll[j]] = [shuffledAll[j], shuffledAll[i]];
        }
        
        renderDesktopGrid(shuffledAll);
        renderMobileCarousel(shuffledAll);
        updateActiveButton('all');
        
        // Desktop toggle buttons
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const category = btn.getAttribute('data-category');
                updateActiveButton(category);
                filterByCategory(category);
            });
        });
        
        // Mobile select dropdown
        const mobileSelect = document.getElementById('mobileCategorySelect');
        if (mobileSelect) {
            mobileSelect.addEventListener('change', (e) => {
                const category = e.target.value;
                updateActiveButton(category);
                filterByCategory(category);
            });
        }
    });
</script>

<style>
    /* Toggle button styling - vertical borders only */
    .category-btn {
        transition: all 0.2s ease;
        background: transparent;
    }
    
    .category-btn:hover {
        background-color: #fef2f2;
        color: #dc2626;
    }
    
    /* Hide scrollbar for carousel */
    #carouselTrack::-webkit-scrollbar {
        display: none;
    }
    
    /* Snap scroll for carousel */
    .snap-start {
        scroll-snap-align: start;
    }
    
    .snap-mandatory {
        scroll-snap-type: x mandatory;
    }
    
    /* Dot indicator transitions */
    .dot-transition {
        transition: all 0.3s ease;
    }
</style>