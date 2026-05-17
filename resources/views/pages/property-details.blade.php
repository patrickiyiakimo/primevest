@extends('layouts.app')

@section('title', 'Property Details')
@section('content')

@php
    $properties = [
        1 => ['id' => 1, 'name' => 'Luxury Beachfront Villa', 'location' => 'Miami, Florida', 'price' => '1,250,000', 'min_investment' => '25,000', 'roi' => '9.5', 'image' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?w=800&h=600&fit=crop', 'type' => 'Residential', 'bedrooms' => 5, 'bathrooms' => 4, 'sqft' => '3,200', 'description' => 'Experience luxury living at its finest with this stunning beachfront villa in the heart of Miami. This property offers breathtaking ocean views, private beach access, and world-class amenities. The villa features high-end finishes, smart home technology, and a resort-style infinity pool. Perfect for investors seeking premium rental income from high-net-worth tenants.', 'amenities' => ['Private Beach Access', 'Infinity Pool', 'Smart Home System', 'Home Theater', 'Wine Cellar', 'Private Gym', '24/7 Security', 'Concierge Service'], 'rental_income' => '12,500', 'occupancy_rate' => '92', 'year_built' => '2018'],
        2 => ['id' => 2, 'name' => 'Modern Downtown Tower', 'location' => 'New York, NY', 'price' => '2,500,000', 'min_investment' => '50,000', 'roi' => '8.2', 'image' => 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?w=800&h=600&fit=crop', 'type' => 'Commercial', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '5,500', 'description' => 'A premier commercial property located in the heart of Manhattan\'s financial district. This modern tower offers prime office space with state-of-the-art facilities, LEED certification, and excellent transportation access. The property is fully leased to Fortune 500 companies, providing stable, long-term cash flow for investors.', 'amenities' => ['LEED Certified', '24/7 Security', 'Conference Center', 'Tenant Lounge', 'Bike Storage', 'EV Charging', 'Rooftop Terrace', 'Fitness Center'], 'rental_income' => '22,500', 'occupancy_rate' => '98', 'year_built' => '2015'],
        3 => ['id' => 3, 'name' => 'Historic European Estate', 'location' => 'London, UK', 'price' => '2,800,000', 'min_investment' => '40,000', 'roi' => '10.2', 'image' => 'https://images.pexels.com/photos/2587054/pexels-photo-2587054.jpeg?w=800&h=600&fit=crop', 'type' => 'Residential', 'bedrooms' => 6, 'bathrooms' => 5, 'sqft' => '4,500', 'description' => 'Step into history with this magnificent Georgian estate in London\'s prestigious Kensington district. This property combines classic architecture with modern luxury, featuring original period details, grand entertaining spaces, and a private garden. The estate has been meticulously maintained and updated with contemporary systems.', 'amenities' => ['Private Garden', 'Original Fireplaces', 'Crown Molding', 'Wine Cellar', 'Staff Quarters', 'Secure Parking', 'Home Office', 'Guest Suite'], 'rental_income' => '18,500', 'occupancy_rate' => '88', 'year_built' => '1885'],
        4 => ['id' => 4, 'name' => 'Tokyo Smart Tower', 'location' => 'Tokyo, Japan', 'price' => '3,200,000', 'min_investment' => '35,000', 'roi' => '11.5', 'image' => 'https://images.pexels.com/photos/2614818/pexels-photo-2614818.jpeg?w=800&h=600&fit=crop', 'type' => 'Mixed-Use', 'bedrooms' => 0, 'bathrooms' => 0, 'sqft' => '8,000', 'description' => 'A cutting-edge mixed-use development in Tokyo\'s Shibuya district. This smart tower features retail spaces on lower floors and premium office spaces above. The building is equipped with IoT technology, energy-efficient systems, and advanced security. Located in one of Tokyo\'s most vibrant neighborhoods.', 'amenities' => ['IoT Enabled', 'Energy Efficient', 'Retail Space', 'Rooftop Garden', 'Event Space', 'Bike Parking', 'Smart Security', 'High-speed Elevators'], 'rental_income' => '28,000', 'occupancy_rate' => '95', 'year_built' => '2020'],
    ];
    
    $property = $properties[$id] ?? null;
@endphp

@if($property)
<!-- Hero Section -->
<div class="relative min-h-[400px] overflow-hidden bg-white">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $property['image'] }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/40"></div>
        </div>
    </div>
    
    <div class="relative z-10 flex items-center min-h-[400px]">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 w-full">
            <div class="max-w-3xl">
                <div class="inline-flex items-center px-3 py-1 bg-red-100 mb-6">
                    <span class="text-red-700 text-xs font-semibold uppercase tracking-wider">{{ $property['type'] }}</span>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-5xl font-bold text-white mb-4">{{ $property['name'] }}</h1>
                <p class="text-xl text-gray-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $property['location'] }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Property Details Content -->
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column - Main Content -->
            <div class="lg:col-span-2">
                <!-- Description -->
                <div class="bg-white p-6 border border-gray-200 mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Property Description</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $property['description'] }}</p>
                </div>
                
                <!-- Key Features -->
                <div class="bg-white p-6 border border-gray-200 mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Key Features</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @if($property['bedrooms'] > 0)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span><strong>{{ $property['bedrooms'] }}</strong> Bedrooms</span>
                        </div>
                        @endif
                        @if($property['bathrooms'] > 0)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                            <span><strong>{{ $property['bathrooms'] }}</strong> Bathrooms</span>
                        </div>
                        @endif
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                            </svg>
                            <span><strong>{{ $property['sqft'] }}</strong> SQ FT</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Built in <strong>{{ $property['year_built'] }}</strong></span>
                        </div>
                    </div>
                </div>
                
                <!-- Amenities -->
                <div class="bg-white p-6 border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Amenities</h2>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($property['amenities'] as $amenity)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-600 text-sm">{{ $amenity }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Investment Summary -->
            <div>
                <div class="bg-white p-6 border border-gray-200 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Investment Summary</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between pb-3 border-b border-gray-100">
                            <span class="text-gray-500">Property Value</span>
                            <span class="font-bold text-gray-800">${{ $property['price'] }}</span>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-gray-100">
                            <span class="text-gray-500">Minimum Investment</span>
                            <span class="font-bold text-gray-800">${{ $property['min_investment'] }}</span>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-gray-100">
                            <span class="text-gray-500">Projected ROI</span>
                            <span class="font-bold text-green-600">{{ $property['roi'] }}%</span>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-gray-100">
                            <span class="text-gray-500">Est. Monthly Income</span>
                            <span class="font-bold text-gray-800">${{ $property['rental_income'] }}</span>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-gray-100">
                            <span class="text-gray-500">Occupancy Rate</span>
                            <span class="font-bold text-gray-800">{{ $property['occupancy_rate'] }}%</span>
                        </div>
                    </div>
                    
                    <a href="/register" class="block text-center mt-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold transition-all duration-300">
                        Invest Now
                    </a>
                    
                    <a href="/real-estate" class="block text-center mt-3 py-2 text-gray-600 hover:text-red-600 text-sm transition">
                        ← Back to Properties
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="py-20 text-center">
    <h2 class="text-2xl font-bold text-gray-800">Property Not Found</h2>
    <p class="text-gray-500 mt-2">The property you're looking for doesn't exist.</p>
    <a href="/real-estate" class="inline-block mt-4 text-red-600 hover:text-red-700">Back to Properties →</a>
</div>
@endif

@endsection