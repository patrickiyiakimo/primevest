@extends('layouts.app')

@section('title', 'Real Estate Investment')
@section('content')

<!-- Hero Section with Background Image -->
<div class="relative min-h-[500px] sm:min-h-[550px] md:min-h-[600px] overflow-hidden bg-gray-200">
    
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('/images/real-bg.jpg') }}')">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center min-h-[500px] sm:min-h-[550px] md:min-h-[600px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Side - Text Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl sm:text-5xl pt-10 md:text-5xl lg:text-5xl xl:text-6xl font-bold text-white mb-6 leading-tight">
                        Real Estate <span class="text-red-400">Investment</span>
                    </h1>
                    
                    <p class="text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        Diversify your portfolio with premium properties worldwide. Start with as little as $5,000 and earn passive income through fractional ownership.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center lg:justify-start">
                        <a href="#properties" class="group relative inline-flex items-center justify-center px-8 sm:px-10 py-4 sm:py-4 text-base sm:text-lg font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-500 shadow-lg hover:shadow-xl">
                            Explore Properties
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Right Side - Video -->
                <div class="flex justify-center lg:justify-end mt-10 lg:mt-20">
                    <div class="w-full max-w-sm lg:max-w-xs rounded-xl overflow-hidden shadow-2xl">
                        <video autoplay muted loop playsinline class="w-full h-auto rounded-xl">
                            <source src="{{ asset('/videos/real estate video.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-12 bg-white border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-3xl font-bold text-red-600">$2.5B+</div>
                <div class="text-sm text-gray-600 mt-1">Total Property Value</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">25+</div>
                <div class="text-sm text-gray-600 mt-1">Premium Properties</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">8-12%</div>
                <div class="text-sm text-gray-600 mt-1">Average Annual ROI</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">15,000+</div>
                <div class="text-sm text-gray-600 mt-1">Active Investors</div>
            </div>
        </div>
    </div>
</div>

<!-- Property Showcase Carousel -->
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Property Showcase</h2>
            <p class="text-gray-600 text-md">Explore our premium collection of luxury properties</p>
        </div>
        
        <div class="relative">
            <!-- Carousel Container -->
            <div class="overflow-hidden rounded-xl shadow-lg">
                <div id="carouselTrack" class="flex transition-transform duration-500 ease-in-out">
                    @for($i = 1; $i <= 6; $i++)
                    <div class="w-full flex-shrink-0">
                        <img src="{{ asset('/images/estate/caro-' . $i . '.jpg') }}" 
                             alt="Property Showcase {{ $i }}" 
                             class="w-full h-64 sm:h-80 md:h-96 object-cover">
                    </div>
                    @endfor
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <button id="carouselPrev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="carouselNext" class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-2 rounded-full transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Dots Indicator -->
            <div class="flex justify-center gap-2 mt-4">
                @for($i = 0; $i < 6; $i++)
                <button class="carousel-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-red-600 w-6' : 'bg-gray-400' }}" data-index="{{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>
</div>

<!-- Properties Section with Filters -->
<div id="properties" class="py-16 lg:py-20 bg-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Featured Properties</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Discover your dream home from our collection of premium properties</p>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- LEFT SIDE - FILTERS -->
            <div class="lg:w-80 flex-shrink-0">
                <div class="bg-gray-200 rounded-lg border border-gray-300 sticky top-24">
                    
                    <!-- Filter Header -->
                    <div class="p-5 border-b border-gray-300">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-gray-800">Filter Properties</h3>
                            <button id="resetFilters" class="text-sm text-red-600 hover:text-red-700 font-medium">Reset All</button>
                        </div>
                    </div>
                    
                    <!-- Filter Content -->
                    <div class="p-5 space-y-6">
                        
                        <!-- Property Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Property Type</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="filter-checkbox w-4 h-4 text-red-600 rounded border-gray-400 focus:ring-red-500" data-filter="type" value="Mini-homes">
                                    <span class="ml-2 text-sm text-gray-700">Mini-homes</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="filter-checkbox w-4 h-4 text-red-600 rounded border-gray-400 focus:ring-red-500" data-filter="type" value="Single-story">
                                    <span class="ml-2 text-sm text-gray-700">Single-story</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="filter-checkbox w-4 h-4 text-red-600 rounded border-gray-400 focus:ring-red-500" data-filter="type" value="Two-story">
                                    <span class="ml-2 text-sm text-gray-700">Two-story</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="filter-checkbox w-4 h-4 text-red-600 rounded border-gray-400 focus:ring-red-500" data-filter="type" value="Duplex">
                                    <span class="ml-2 text-sm text-gray-700">Duplex</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="filter-checkbox w-4 h-4 text-red-600 rounded border-gray-400 focus:ring-red-500" data-filter="type" value="Townhome">
                                    <span class="ml-2 text-sm text-gray-700">Townhome</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Bedrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Bedrooms</label>
                            <div class="flex flex-wrap gap-2">
                                <button class="filter-bedroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bedroom="1">1</button>
                                <button class="filter-bedroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bedroom="2">2</button>
                                <button class="filter-bedroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bedroom="3">3</button>
                                <button class="filter-bedroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bedroom="4">4</button>
                            </div>
                        </div>
                        
                        <!-- Bathrooms -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Bathrooms</label>
                            <div class="flex flex-wrap gap-2">
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="1">1</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="1.5">1.5</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="2">2</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="2.5">2.5</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="3">3</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="3.5">3.5</button>
                                <button class="filter-bathroom px-3 py-1 text-sm border border-gray-400 rounded-md text-gray-700 hover:border-red-500 hover:text-red-600 transition" data-bathroom="4">4</button>
                            </div>
                        </div>
                        
                        <!-- Active Filters Display -->
                        <div id="activeFilters" class="text-sm text-gray-600"></div>
                    </div>
                </div>
            </div>
            
            <!-- RIGHT SIDE - PROPERTIES GRID -->
            <div class="flex-1">
                <div id="propertiesGrid" class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    
                                        @php
                        $properties = [
                            ['id' => 1, 'name' => 'Fernie', 'type' => 'Mini-homes', 'price' => 167400, 'bedrooms' => 1, 'bathrooms' => 1, 'sqft' => 532, 'modules' => 1, 'footprint' => "15.5' x 34'", 'image' => '/images/estate/fernie.jpeg', 'blueprint' => '/images/estate/ferni-bp.jpg'],
                            ['id' => 2, 'name' => 'Baffin One', 'type' => 'Mini-homes', 'price' => 218300, 'bedrooms' => 1, 'bathrooms' => 1, 'sqft' => 694, 'modules' => 1, 'footprint' => "15.1' x 43.7'", 'image' => '/images/estate/baffine-one.jpeg', 'blueprint' => '/images/estate/baffine-one-bp.jpg'],
                            ['id' => 3, 'name' => 'Baffin Two', 'type' => 'Single-story', 'price' => 283200, 'bedrooms' => 2, 'bathrooms' => 1, 'sqft' => 900, 'modules' => 1, 'footprint' => "15.5' x 57'", 'image' => '/images/estate/baffine-two.jpeg', 'blueprint' => '/images/estate/baffine-two-bp.jpg'],
                            ['id' => 4, 'name' => 'Cypress One', 'type' => 'Single-story', 'price' => 403200, 'bedrooms' => 2, 'bathrooms' => 1.5, 'sqft' => 1280, 'modules' => 2, 'footprint' => '--', 'image' => '/images/estate/cypress-one.png', 'blueprint' => '/images/estate/cypress-one-bp.png'],
                            ['id' => 5, 'name' => 'Gabriel', 'type' => 'Single-story', 'price' => 466900, 'bedrooms' => 2, 'bathrooms' => 2, 'sqft' => 1484, 'modules' => 4, 'footprint' => "32.6' x 44.2'", 'image' => '/images/estate/gabriel.jpeg', 'blueprint' => '/images/estate/gabriel-bp.png'],
                            ['id' => 6, 'name' => 'Cypress Two', 'type' => 'Single-story', 'price' => 482900, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1533, 'modules' => 2, 'footprint' => '--', 'image' => '/images/estate/cypress-two.png', 'blueprint' => '/images/estate/cypress-two-bp.jpg'],
                            ['id' => 7, 'name' => 'Seymour One', 'type' => 'Duplex', 'price' => 497700, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1580, 'modules' => 2, 'footprint' => "15.5' x 55'", 'image' => '/images/estate/seymour-one.png', 'blueprint' => '/images/estate/seymour-one-bp.jpg'],
                            ['id' => 8, 'name' => 'Seymour Two', 'type' => 'Townhome', 'price' => 497700, 'bedrooms' => 2, 'bathrooms' => 2.5, 'sqft' => 1580, 'modules' => 2, 'footprint' => "15.5' x 55'", 'image' => '/images/estate/seymour-two.png', 'blueprint' => '/images/estate/seymour-two-bp.jpg'],
                            ['id' => 9, 'name' => 'Denman', 'type' => 'Single-story', 'price' => 499300, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1585, 'modules' => 2, 'footprint' => "67' x 42'", 'image' => '/images/estate/denman.png', 'blueprint' => '/images/estate/denman-bp.jpg'],
                            ['id' => 10, 'name' => 'Sierra', 'type' => 'Single-story', 'price' => 528800, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1681, 'modules' => 4, 'footprint' => "32.6' x 68.2'", 'image' => '/images/estate/sierra.jpeg', 'blueprint' => '/images/estate/sierra-bp.png'],
                            ['id' => 11, 'name' => 'Solara', 'type' => 'Single-story', 'price' => 542400, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1724, 'modules' => 4, 'footprint' => "29.7' x 62.7'", 'image' => '/images/estate/solara.jpeg', 'blueprint' => '/images/estate/solara-bp.png'],
                            ['id' => 12, 'name' => 'Capilano One', 'type' => 'Two-story', 'price' => 562600, 'bedrooms' => 3, 'bathrooms' => 3.5, 'sqft' => 1786, 'modules' => 3, 'footprint' => "30' x 45'", 'image' => '/images/estate/capilano one.png', 'blueprint' => '/images/estate/capilano-one-bp.jpg'],
                            ['id' => 13, 'name' => 'Catalina', 'type' => 'Single-story', 'price' => 613800, 'bedrooms' => 3, 'bathrooms' => 2.5, 'sqft' => 1724, 'modules' => 4, 'footprint' => "42.9' x 72.3'", 'image' => '/images/estate/catalina.jpeg', 'blueprint' => '/images/estate/catalina-bp.png'],
                            ['id' => 14, 'name' => 'Lumina', 'type' => 'Single-story', 'price' => 645800, 'bedrooms' => 4, 'bathrooms' => 3, 'sqft' => 2053, 'modules' => 4, 'footprint' => "34' x 70.2", 'image' => '/images/estate/lumina.jpeg', 'blueprint' => '/images/estate/lumina-bp.png'],
                            ['id' => 15, 'name' => 'Capilano Two', 'type' => 'Two-story', 'price' => 657100, 'bedrooms' => 4, 'bathrooms' => 3.5, 'sqft' => 2086, 'modules' => 4, 'footprint' => "30' x 39'", 'image' => '/images/estate/capilano-two.png', 'blueprint' => '/images/estate/capilano-two-bp.jpg'],
                            ['id' => 16, 'name' => 'Capilano Three', 'type' => 'Two-story', 'price' => 686400, 'bedrooms' => 4, 'bathrooms' => 4.5, 'sqft' => 2179, 'modules' => 4, 'footprint' => "30' x 45'", 'image' => '/images/estate/capilano-three.png', 'blueprint' => '/images/estate/capilano-three-bp.jpg'],
                            ['id' => 17, 'name' => 'Westwood', 'type' => 'Two-story', 'price' => 711600, 'bedrooms' => 4, 'bathrooms' => 3.5, 'sqft' => 2259, 'modules' => 4, 'footprint' => "72' x 30'", 'image' => '/images/estate/westwood.png', 'blueprint' => '/images/estate/westwood-bp.jpg'],
                        ];
                    @endphp

                    @foreach($properties as $property)
                    <div class="property-card group rounded-lg shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden bg-gray-100" 
                         data-type="{{ $property['type'] }}"
                         data-bedrooms="{{ $property['bedrooms'] }}"
                         data-bathrooms="{{ $property['bathrooms'] }}">
                        
                        <!-- Main Property Image -->
                        <div class="relative h-96 overflow-hidden">
                            <img src="{{ asset($property['image']) }}" alt="{{ $property['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute top-3 right-3 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ $property['type'] }}
                            </div>
                        </div>
                        
                        <!-- Blueprint Thumbnail Row -->
                        <div class="px-4 pt-3 pb-2 bg-gray-100">
                            <div class="flex items-center gap-2">
                                <div class="w-16 h-16 bg-gray-200 rounded border border-gray-300 overflow-hidden flex items-center justify-center">
                                    <img src="{{ asset($property['blueprint']) }}" alt="Blueprint" class="w-full h-full object-cover opacity-70">
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-600">Floor Plan Available</p>
                                    <button onclick="showBlueprint('{{ asset($property['blueprint']) }}', '{{ $property['name'] }}')" class="text-xs text-red-600 hover:text-red-700 font-medium">
                                        View Blueprint →
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Property Details -->
                        <div class="p-4 pt-2 bg-gray-100">
                            <h3 class="text-lg font-bold text-gray-800">{{ $property['name'] }}</h3>
                            <p class="text-2xl font-bold text-red-600 mt-1">${{ number_format($property['price']) }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Estimated Starting Price before upgrades</p>
                            <p class="text-xs text-gray-500 mt-1">Does not include delivery or onsite costs</p>
                            
                            <!-- Specs Grid -->
                            <div class="grid grid-cols-3 gap-3 mt-4 pt-3 border-t border-gray-300">
                                <div>
                                    <p class="text-xs text-gray-500">Bedrooms</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $property['bedrooms'] }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Bathrooms</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $property['bathrooms'] }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Sq ft</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ number_format($property['sqft']) }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Modules</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $property['modules'] }}</p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-xs text-gray-500">Footprint</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $property['footprint'] }}</p>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex gap-3 mt-4 pt-3 border-t border-gray-300">
                                <a href="#" class="flex-1 text-center py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium transition rounded">
                                    Choose your options
                                </a>
                                <a href="{{ route('contact') }}" class="px-4 py-2 border border-gray-400 hover:border-red-500 text-gray-700 hover:text-red-600 text-sm font-medium transition rounded flex items-center gap-1">
                                    Message <span class="text-lg">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-10">
                    <nav class="flex items-center gap-2">
                        <a href="#" class="px-3 py-2 border border-gray-400 rounded-md text-gray-700 hover:bg-red-600 hover:text-white hover:border-red-600 transition text-sm">Previous</a>
                        <a href="#" class="px-3 py-2 bg-red-600 text-white border border-red-600 rounded-md text-sm">1</a>
                        <a href="#" class="px-3 py-2 border border-gray-400 rounded-md text-gray-700 hover:bg-red-600 hover:text-white hover:border-red-600 transition text-sm">2</a>
                        <a href="#" class="px-3 py-2 border border-gray-400 rounded-md text-gray-700 hover:bg-red-600 hover:text-white hover:border-red-600 transition text-sm">3</a>
                        <a href="#" class="px-3 py-2 border border-gray-400 rounded-md text-gray-700 hover:bg-red-600 hover:text-white hover:border-red-600 transition text-sm">Next</a>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- Blueprint Modal -->
<div id="blueprintModal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4" onclick="closeBlueprint()">
    <div class="bg-gray-200 rounded-lg max-w-4xl w-full max-h-[90vh] overflow-auto" onclick="event.stopPropagation()">
        <div class="sticky top-0 bg-gray-200 p-4 border-b border-gray-300 flex justify-between items-center">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-800">Floor Plan</h3>
            <button onclick="closeBlueprint()" class="text-gray-600 hover:text-red-600 text-2xl">&times;</button>
        </div>
        <div class="p-6">
            <img id="modalBlueprint" src="" alt="Blueprint" class="w-full h-auto">
        </div>
    </div>
</div>


<!-- Benefits Section -->
<div class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Benefits</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Factory-produced homes for the climate era</p>
        </div>
        
        <!-- Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-red-600 mb-2">84%</div>
                <p class="text-gray-700 text-sm">More energy efficient than conventional construction</p>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-red-600 mb-2">30%</div>
                <p class="text-gray-700 text-sm">Less cost of ownership over the 100‑year lifespan of the home</p>
            </div>
            <div class="text-center">
                <div class="text-4xl lg:text-5xl font-bold text-red-600 mb-2">16</div>
                <p class="text-gray-700 text-sm">Weeks to produce an entire home in the factory</p>
            </div>
        </div>
        
        <!-- Intro Text -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <p class="text-gray-700 text-lg leading-relaxed">
                Today, housing affordability and climate change are two of society's greatest challenges. Solving them will require brave leaders and a collective effort focused on health.
            </p>
        </div>
        
        <!-- Benefits Alternating Layout -->
        <div class="space-y-16">
            
            <!-- Benefit 1 - Image Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">Self-Powered™ Home</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        Protect your home from power outages and broken grids with energy independence. Your house will be able to produce its own clean energy, store it in batteries, and have the ability to create a microgrid – a distributed power generating and storage system. It's a simple, disaster-proof solution.
                    </p>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('/images/estate/self.jpg') }}" alt="Self-Powered home" class="w-full h-80 object-cover">
                </div>
            </div>
            
            <!-- Benefit 2 - Image Left -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-last lg:order-first rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('/images/estate/health.jpg') }}" alt="Health-centric design" class="w-full h-80 object-cover">
                </div>
                <div class="order-first lg:order-last">
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">Health‑Centric Design</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        Who's paying the medical bill for the health conditions attributed to the average American "sick" home? A home is where we spend most of our time, it must be one of the healthiest places we live. Sustainable materials, air and water filtration, continuous air circulation, and soundproofing are the path to well-being. Something all PrimeVest homes come standard with.
                    </p>
                </div>
            </div>
            
            <!-- Benefit 3 - Image Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">Advanced Manufacturing</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        It reduces costs and creates a predictable timeline by increasing quality and precision during the production process. We leverage economies of scale to purchase and install advanced materials and features too costly to include in the average family home.
                    </p>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('/images/estate/advance.jpg') }}" alt="Advanced manufacturing" class="w-full h-80 object-cover">
                </div>
            </div>
            
            <!-- Benefit 4 - Image Left -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-last lg:order-first rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('/images/estate/envirinment.jpg') }}" alt="Environmentally responsible" class="w-full h-80 object-cover">
                </div>
                <div class="order-first lg:order-last">
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">Environmentally Responsible</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        Each PrimeVest home is built to last 100 years, significantly reducing the environmental impact. Using high-quality materials and product design-based science, your home will require less maintenance, won't begin to rot in a matter of years, and will consume a fraction of the energy a typical home uses each year – for the lifetime of the home.
                    </p>
                </div>
            </div>
            
            <!-- Benefit 5 - Image Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">PrimeVest IQ™</h3>
                    <p class="text-gray-600 text-base leading-relaxed">
                        The only home operating system you need. The PrimeVest IQ app will improve your living experience by caring for you. It monitors the home's systems to protect your health, safety, and security. Over time, the software will learn how to improve your daily routines – almost serendipitously.
                    </p>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('/images/estate/primevest.jpg') }}" alt="PrimeVest IQ" class="w-full h-80 object-cover">
                </div>
            </div>
            
           <!-- Benefit 6 - Centered -->
<div class="flex justify-center">
    <div class="max-w-3xl text-center">
        <h3 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4">It's Possible to Change</h3>
        <p class="text-gray-600 text-base leading-relaxed">
            With our end-to-end platform, we're reducing our impact on the planet by producing sustainable homes. This one change can improve our health and create energy independence. It will lower our burden on the healthcare system, decrease the cost of housing, and see our homes thrive in climate emergencies.
        </p>
    </div>
</div>
            
        </div>
    </div>
</div>


<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    const bedroomBtns = document.querySelectorAll('.filter-bedroom');
    const bathroomBtns = document.querySelectorAll('.filter-bathroom');
    const resetBtn = document.getElementById('resetFilters');
    
    let selectedTypes = new Set();
    let selectedBedroom = null;
    let selectedBathroom = null;
    
    function updateFilters() {
        const cards = document.querySelectorAll('.property-card');
        
        cards.forEach(card => {
            let showByType = selectedTypes.size === 0 || selectedTypes.has(card.dataset.type);
            let showByBedroom = !selectedBedroom || card.dataset.bedrooms == selectedBedroom;
            let showByBathroom = !selectedBathroom || card.dataset.bathrooms == selectedBathroom;
            
            if (showByType && showByBedroom && showByBathroom) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Update active filters display
        const activeDiv = document.getElementById('activeFilters');
        const activeFilters = [];
        if (selectedTypes.size > 0) activeFilters.push(`Type: ${Array.from(selectedTypes).join(', ')}`);
        if (selectedBedroom) activeFilters.push(`${selectedBedroom} Bedroom`);
        if (selectedBathroom) activeFilters.push(`${selectedBathroom} Bathroom`);
        
        if (activeFilters.length > 0) {
            activeDiv.innerHTML = `<span class="font-medium">Active Filters:</span> ${activeFilters.join(' | ')}`;
        } else {
            activeDiv.innerHTML = '';
        }
    }
    
    // Type checkboxes
    checkboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            if (this.checked) {
                selectedTypes.add(this.value);
            } else {
                selectedTypes.delete(this.value);
            }
            updateFilters();
        });
    });
    
    // Bedroom buttons
    bedroomBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const value = this.dataset.bedroom;
            if (selectedBedroom === value) {
                selectedBedroom = null;
                bedroomBtns.forEach(b => b.classList.remove('bg-red-600', 'text-white', 'border-red-600'));
                bedroomBtns.forEach(b => b.classList.add('border-gray-400', 'text-gray-700'));
            } else {
                selectedBedroom = value;
                bedroomBtns.forEach(b => {
                    b.classList.remove('bg-red-600', 'text-white', 'border-red-600');
                    b.classList.add('border-gray-400', 'text-gray-700');
                });
                this.classList.remove('border-gray-400', 'text-gray-700');
                this.classList.add('bg-red-600', 'text-white', 'border-red-600');
            }
            updateFilters();
        });
    });
    
    // Bathroom buttons
    bathroomBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const value = parseFloat(this.dataset.bathroom);
            if (selectedBathroom === value) {
                selectedBathroom = null;
                bathroomBtns.forEach(b => b.classList.remove('bg-red-600', 'text-white', 'border-red-600'));
                bathroomBtns.forEach(b => b.classList.add('border-gray-400', 'text-gray-700'));
            } else {
                selectedBathroom = value;
                bathroomBtns.forEach(b => {
                    b.classList.remove('bg-red-600', 'text-white', 'border-red-600');
                    b.classList.add('border-gray-400', 'text-gray-700');
                });
                this.classList.remove('border-gray-400', 'text-gray-700');
                this.classList.add('bg-red-600', 'text-white', 'border-red-600');
            }
            updateFilters();
        });
    });
    
    // Reset all filters
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            checkboxes.forEach(cb => {
                cb.checked = false;
                selectedTypes.clear();
            });
            
            selectedBedroom = null;
            bedroomBtns.forEach(b => {
                b.classList.remove('bg-red-600', 'text-white', 'border-red-600');
                b.classList.add('border-gray-400', 'text-gray-700');
            });
            
            selectedBathroom = null;
            bathroomBtns.forEach(b => {
                b.classList.remove('bg-red-600', 'text-white', 'border-red-600');
                b.classList.add('border-gray-400', 'text-gray-700');
            });
            
            updateFilters();
        });
    }
});

// Blueprint Modal
function showBlueprint(imageUrl, propertyName) {
    const modal = document.getElementById('blueprintModal');
    const modalImg = document.getElementById('modalBlueprint');
    const modalTitle = document.getElementById('modalTitle');
    
    modalTitle.textContent = `${propertyName} - Floor Plan`;
    modalImg.src = imageUrl;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeBlueprint() {
    const modal = document.getElementById('blueprintModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeBlueprint();
    }
});

// Carousel functionality
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const dots = document.querySelectorAll('.carousel-dot');
    
    let currentIndex = 0;
    const totalSlides = 6;
    
    function updateCarousel() {
        const slideWidth = track.parentElement.clientWidth;
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.remove('bg-gray-400', 'w-2');
                dot.classList.add('bg-red-600', 'w-6');
            } else {
                dot.classList.remove('bg-red-600', 'w-6');
                dot.classList.add('bg-gray-400', 'w-2');
            }
        });
    }
    
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }
    
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    dots.forEach(dot => {
        dot.addEventListener('click', function() {
            currentIndex = parseInt(this.dataset.index);
            updateCarousel();
        });
    });
    
    // Auto-play every 5 seconds
    let autoPlay = setInterval(nextSlide, 5000);
    
    // Pause auto-play on hover
    const carouselContainer = document.querySelector('.relative');
    carouselContainer.addEventListener('mouseenter', () => {
        clearInterval(autoPlay);
    });
    
    carouselContainer.addEventListener('mouseleave', () => {
        autoPlay = setInterval(nextSlide, 5000);
    });
    
    // Update on window resize
    window.addEventListener('resize', updateCarousel);
});
</script>

@endsection