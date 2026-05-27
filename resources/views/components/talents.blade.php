<div class="w-full bg-white py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Meet Talent in Our Network
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">
                Connect with verified investment professionals ready to help you achieve your financial goals
            </p>
        </div>

        <!-- Desktop Toggle - Gradient from right (red) to left (white) -->
        <div class="hidden md:flex justify-center mb-12">
            <div class="inline-flex rounded-full overflow-hidden shadow-md">
                <button data-category="all" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    All Experts
                </button>
                <button data-category="developers" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Developers
                </button>
                <button data-category="designers" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Designers
                </button>
                <button data-category="marketing" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Marketing Experts
                </button>
                <button data-category="consultants" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Consultants
                </button>
                <button data-category="managers" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Project Managers
                </button>
                <button data-category="sales" class="toggle-btn category-btn px-8 py-3 text-base font-semibold transition-all duration-300 bg-white text-gray-900" style="background: linear-gradient(90deg, #ffffff 0%, #ffffff 50%, #ef4444 100%); background-size: 200% 100%; background-position: 100% 0;">
                    Sales Experts
                </button>
            </div>
        </div>

        <!-- Mobile Select Dropdown -->
        <div class="md:hidden mb-8">
            <select id="mobileCategorySelect" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 font-medium focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="all">All Experts</option>
                <option value="developers">Developers</option>
                <option value="designers">Designers</option>
                <option value="marketing">Marketing Experts</option>
                <option value="consultants">Management Consultants</option>
                <option value="managers">Project Managers</option>
                <option value="sales">Sales Experts</option>
            </select>
        </div>

        <!-- Talent Grid Container - 4 columns (3 profiles + 1 CTA) -->
        <div id="talentGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Dynamic content will be injected here -->
        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-12">
            <a href="/discover-talent" class="inline-flex items-center gap-2 px-8 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                Discover 20,000+ More Talent in the PrimeVest Network
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<script>
    // Talent Data - Investment focused professionals
    const talentData = {
        all: [
            {
                name: "Sarah Chen",
                role: "Verified Expert in Trading",
                title: "Forex & Commodities Strategist",
                expertise: ["Technical Analysis", "Forex Trading", "Risk Management", "Market Psychology"],
                previouslyAt: "JP Morgan",
                image: "/images/sarah-chen.jpg",
                category: "developers"
            },
            {
                name: "Marcus Williams",
                role: "Verified Expert in Investment",
                title: "Portfolio Manager",
                expertise: ["Asset Allocation", "Equity Analysis", "Derivatives", "Bloomberg Terminal"],
                previouslyAt: "Goldman Sachs",
                image: "/images/marcus-williams.jpg",
                category: "developers"
            },
            {
                name: "Elena Volkov",
                role: "Verified Expert in Analytics",
                title: "Quantitative Analyst",
                expertise: ["Python", "Machine Learning", "Algorithmic Trading", "Statistical Modeling"],
                previouslyAt: "Citadel",
                image: "/images/elena-volkov.jpg",
                category: "developers"
            },
            {
                name: "David Kim",
                role: "Verified Expert in UX",
                title: "Investment Platform Designer",
                expertise: ["UI/UX Design", "User Research", "Prototyping", "Design Systems"],
                previouslyAt: "Robinhood",
                image: "/images/david-kim.jpg",
                category: "designers"
            },
            {
                name: "Isabella Rossi",
                role: "Verified Expert in Design",
                title: "Financial UI Designer",
                expertise: ["Visual Design", "Interactive Design", "Figma", "User Testing"],
                previouslyAt: "Revolut",
                image: "/images/isabella-rossi.jpg",
                category: "designers"
            },
            {
                name: "Oliver Schmidt",
                role: "Verified Expert in Marketing",
                title: "Growth Marketing Director",
                expertise: ["Digital Strategy", "SEO/SEM", "Content Marketing", "Conversion Optimization"],
                previouslyAt: "Binance",
                image: "/images/oliver-schmidt.jpg",
                category: "marketing"
            },
            {
                name: "Nina Patel",
                role: "Verified Expert in Marketing",
                title: "Brand Strategy Consultant",
                expertise: ["Brand Positioning", "Market Research", "Social Media", "Campaign Management"],
                previouslyAt: "eToro",
                image: "/images/nina-patel.jpg",
                category: "marketing"
            },
            {
                name: "James O'Connor",
                role: "Verified Expert in Consulting",
                title: "Financial Management Consultant",
                expertise: ["M&A Strategy", "Financial Modeling", "Due Diligence", "FP&A"],
                previouslyAt: "McKinsey & Company",
                image: "/images/james-oconnor.jpg",
                category: "consultants"
            },
            {
                name: "Wei Zhang",
                role: "Verified Expert in Consulting",
                title: "Risk Management Consultant",
                expertise: ["Enterprise Risk", "Regulatory Compliance", "Stress Testing", "Basel III"],
                previouslyAt: "Deloitte",
                image: "/images/wei-zhang.jpg",
                category: "consultants"
            },
            {
                name: "Carlos Mendez",
                role: "Verified Expert in Management",
                title: "Project Management Lead",
                expertise: ["Agile Methodology", "Scrum Master", "JIRA", "Stakeholder Management"],
                previouslyAt: "BlackRock",
                image: "/images/carlos-mendez.jpg",
                category: "managers"
            },
            {
                name: "Amara Okonkwo",
                role: "Verified Expert in Product",
                title: "Product Manager - Trading Platforms",
                expertise: ["Product Strategy", "Roadmap Planning", "User Stories", "A/B Testing"],
                previouslyAt: "Coinbase",
                image: "/images/amara-okonkwo.jpg",
                category: "managers"
            },
            {
                name: "Thomas Anderson",
                role: "Verified Expert in Sales",
                title: "Institutional Sales Director",
                expertise: ["Client Acquisition", "Relationship Management", "Negotiation", "CRM"],
                previouslyAt: "Fidelity Investments",
                image: "/images/thomas-anderson.jpg",
                category: "sales"
            },
            {
                name: "Sophie Laurent",
                role: "Verified Expert in Sales",
                title: "Business Development Executive",
                expertise: ["Lead Generation", "Sales Strategy", "Partnerships", "Account Management"],
                previouslyAt: "Interactive Brokers",
                image: "/images/sophie-laurent.jpg",
                category: "sales"
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

    // Function to render talent cards (3 profiles + 1 CTA card)
    function renderTalentCards(profiles) {
        const grid = document.getElementById('talentGrid');
        if (!grid) return;
        
        // Take only first 3 profiles for the grid
        const displayProfiles = profiles.slice(0, 3);
        
        let html = '';
        
        // Render profile cards
        displayProfiles.forEach(profile => {
            html += `
                <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 group">
                    <!-- Profile Image - Same background style for all -->
                    <div class="relative bg-gradient-to-br from-gray-900 to-red-900 h-64 flex items-center justify-center">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-300"></div>
                        <div class="text-center z-10">
                            <div class="w-28 h-28 mx-auto bg-white/10 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm border-2 border-white/30">
                                <span class="text-5xl font-bold text-white">${profile.name.charAt(0)}</span>
                            </div>
                            <p class="text-white/80 text-sm font-medium">View full profile</p>
                        </div>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="p-5">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">${profile.name}</h3>
                        <p class="text-red-600 text-sm font-semibold mb-2">${profile.role}</p>
                        <p class="text-gray-700 text-base font-medium mb-3">${profile.title}</p>
                        
                        <!-- Expertise Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            ${profile.expertise.map(skill => `<span class="text-xs px-2 py-1 bg-gray-100 text-gray-600 rounded-full">${skill}</span>`).join('')}
                        </div>
                        
                        <!-- Previously at -->
                        <div class="flex items-center gap-2 text-sm text-gray-500 pt-2 border-t border-gray-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Previously at <span class="font-semibold text-gray-700">${profile.previouslyAt}</span></span>
                        </div>
                    </div>
                </div>
            `;
        });
        
        // Add CTA Card (4th grid item)
        html += `
            <div class="bg-gradient-to-br from-red-600 to-red-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col items-center justify-center text-center p-8 min-h-[450px]">
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
        
        grid.innerHTML = html;
    }

    // Function to update active toggle button styling
    function updateActiveButton(activeCategory) {
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
            const category = btn.getAttribute('data-category');
            if (category === activeCategory) {
                btn.style.backgroundPosition = '0% 0';
                btn.style.color = 'white';
                btn.style.fontWeight = 'bold';
            } else {
                btn.style.backgroundPosition = '100% 0';
                btn.style.color = '#1f2937';
                btn.style.fontWeight = '500';
            }
        });
    }

    // Function to filter and render based on category
    function filterByCategory(category) {
        let profiles = [];
        if (category === 'all') {
            profiles = [...talentData.all];
        } else {
            profiles = [...(talentData[category] || [])];
        }
        
        // Shuffle array for variety
        for (let i = profiles.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [profiles[i], profiles[j]] = [profiles[j], profiles[i]];
        }
        
        renderTalentCards(profiles);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        // Initial render with all profiles
        const shuffledAll = [...talentData.all];
        for (let i = shuffledAll.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffledAll[i], shuffledAll[j]] = [shuffledAll[j], shuffledAll[i]];
        }
        renderTalentCards(shuffledAll);
        
        // Set default active button
        updateActiveButton('all');
        
        // Desktop toggle buttons
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
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
                filterByCategory(category);
            });
        }
    });
</script>

<style>
    /* Smooth transitions for toggle buttons */
    .toggle-btn {
        background-repeat: no-repeat;
        transition: background-position 0.4s ease, color 0.3s ease;
    }
    
    .toggle-btn:hover {
        background-position: 0% 0 !important;
        color: white !important;
    }
    
    /* Grid card hover effects */
    .group:hover {
        transform: translateY(-4px);
    }
    
    /* Custom scrollbar for expertise tags if needed */
    .flex-wrap {
        scrollbar-width: thin;
    }
</style>