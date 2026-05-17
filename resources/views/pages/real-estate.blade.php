@extends('layouts.app')

@section('title', 'Real Estate Investment')
@section('content')

<!-- Hero Section with Background Image -->
<div class="relative min-h-[500px] sm:min-h-[550px] md:min-h-[600px] overflow-hidden bg-white">
    
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=1920&h=1080&fit=crop');">
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
                    
                    <!-- Trust Indicators -->
                    <div class="mt-10 flex flex-wrap gap-5 sm:gap-6 md:gap-8 justify-center lg:justify-start">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-white/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-200 text-sm font-medium">Fractional Ownership</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-white/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-200 text-sm font-medium">Passive Income</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-white/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-gray-200 text-sm font-medium">Global Properties</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Empty -->
                <div></div>
                
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <div class="text-3xl font-bold text-red-600">$2.5B+</div>
                <div class="text-sm text-gray-500 mt-1">Total Property Value</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">25+</div>
                <div class="text-sm text-gray-500 mt-1">Premium Properties</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">8-12%</div>
                <div class="text-sm text-gray-500 mt-1">Average Annual ROI</div>
            </div>
            <div>
                <div class="text-3xl font-bold text-red-600">15,000+</div>
                <div class="text-sm text-gray-500 mt-1">Active Investors</div>
            </div>
        </div>
    </div>
</div>

<!-- Properties Section with Pagination -->
<div id="properties" class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Featured Properties</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Hand-picked premium properties from global markets</p>
        </div>
        
        <!-- Properties Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @php
                $properties = [
                    ['id' => 1, 'name' => 'Luxury Beachfront Villa', 'location' => 'Miami, Florida', 'price' => '1,250,000', 'min_investment' => '25,000', 'roi' => '9.5', 'image' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?w=600&h=400&fit=crop', 'type' => 'Residential', 'bedrooms' => 5, 'bathrooms' => 4, 'sqft' => '3,200'],
                    ['id' => 2, 'name' => 'Modern Downtown Tower', 'location' => 'New York, NY', 'price' => '2,500,000', 'min_investment' => '50,000', 'roi' => '8.2', 'image' => 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?w=600&h=400&fit=crop', 'type' => 'Commercial', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '5,500'],
                    ['id' => 3, 'name' => 'Historic European Estate', 'location' => 'London, UK', 'price' => '2,800,000', 'min_investment' => '40,000', 'roi' => '10.2', 'image' => 'https://images.pexels.com/photos/2587054/pexels-photo-2587054.jpeg?w=600&h=400&fit=crop', 'type' => 'Residential', 'bedrooms' => 6, 'bathrooms' => 5, 'sqft' => '4,500'],
                    ['id' => 4, 'name' => 'Tokyo Smart Tower', 'location' => 'Tokyo, Japan', 'price' => '3,200,000', 'min_investment' => '35,000', 'roi' => '11.5', 'image' => 'https://images.pexels.com/photos/2614818/pexels-photo-2614818.jpeg?w=600&h=400&fit=crop', 'type' => 'Mixed-Use', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '8,000'],
                    ['id' => 5, 'name' => 'Dubai Marina Residence', 'location' => 'Dubai, UAE', 'price' => '1,800,000', 'min_investment' => '20,000', 'roi' => '12.0', 'image' => 'https://images.pexels.com/photos/351283/pexels-photo-351283.jpeg?w=600&h=400&fit=crop', 'type' => 'Residential', 'bedrooms' => 3, 'bathrooms' => 3, 'sqft' => '2,800'],
                    ['id' => 6, 'name' => 'Singapore Financial Hub', 'location' => 'Singapore', 'price' => '4,500,000', 'min_investment' => '100,000', 'roi' => '7.5', 'image' => 'https://images.pexels.com/photos/3738836/pexels-photo-3738836.jpeg?w=600&h=400&fit=crop', 'type' => 'Commercial', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '12,000'],
                    ['id' => 7, 'name' => 'Paris Luxury Apartment', 'location' => 'Paris, France', 'price' => '1,500,000', 'min_investment' => '30,000', 'roi' => '8.8', 'image' => 'https://images.pexels.com/photos/1482956/pexels-photo-1482956.jpeg?w=600&h=400&fit=crop', 'type' => 'Residential', 'bedrooms' => 4, 'bathrooms' => 3, 'sqft' => '2,400'],
                    ['id' => 8, 'name' => 'Sydney Waterfront', 'location' => 'Sydney, Australia', 'price' => '2,200,000', 'min_investment' => '45,000', 'roi' => '9.2', 'image' => 'https://images.pexels.com/photos/3288102/pexels-photo-3288102.jpeg?w=600&h=400&fit=crop', 'type' => 'Residential', 'bedrooms' => 4, 'bathrooms' => 3, 'sqft' => '3,100'],
                    ['id' => 9, 'name' => 'Berlin Tech Campus', 'location' => 'Berlin, Germany', 'price' => '3,800,000', 'min_investment' => '75,000', 'roi' => '10.5', 'image' => 'https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?w=600&h=400&fit=crop', 'type' => 'Commercial', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '15,000'],
                ];
            @endphp

            @foreach($properties as $property)
            <div class="group bg-white border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-lg">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-3 py-1">
                        {{ $property['type'] }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-800">{{ $property['name'] }}</h3>
                    <p class="text-gray-500 text-sm mt-1 flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $property['location'] }}
                    </p>
                    
                    <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-100">
                        <div>
                            <p class="text-xs text-gray-400">Min Investment</p>
                            <p class="text-lg font-bold text-gray-800">${{ $property['min_investment'] }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Projected ROI</p>
                            <p class="text-lg font-bold text-green-600">{{ $property['roi'] }}%</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Property Value</p>
                            <p class="text-sm font-semibold text-gray-700">${{ $property['price'] }}</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('real-estate.show', $property['id']) }}" class="block text-center mt-4 py-2 bg-gray-100 text-gray-700 hover:bg-red-600 hover:text-white transition-all duration-300 font-medium text-sm">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="flex items-center gap-2">
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition">Previous</a>
                <a href="#" class="px-3 py-2 bg-red-600 text-white border border-red-600">1</a>
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition">2</a>
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition">3</a>
                <a href="#" class="px-3 py-2 border border-gray-300 text-gray-500 hover:bg-red-600 hover:text-white hover:border-red-600 transition">Next</a>
            </nav>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<div class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">How It Works</h2>
            <p class="text-gray-500 text-lg max-w-2xl mx-auto">Start investing in real estate in three simple steps</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div>
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-red-600">1</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Create Account</h3>
                <p class="text-gray-500 text-sm">Sign up and verify your identity in minutes</p>
            </div>
            <div>
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-red-600">2</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Choose Property</h3>
                <p class="text-gray-500 text-sm">Browse and select from premium properties worldwide</p>
            </div>
            <div>
                <div class="w-16 h-16 bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-red-600">3</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Start Earning</h3>
                <p class="text-gray-500 text-sm">Receive monthly rental income distributions</p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Start Investing?</h2>
            <p class="text-gray-300 text-lg mb-6">Join thousands of investors building wealth through real estate</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/register" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-500 shadow-lg hover:shadow-xl">
                    Create Free Account
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection