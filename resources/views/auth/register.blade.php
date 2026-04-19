@extends('layouts.app')

@section('content')
<div class="flex items-stretch relative">
    
    <div class="w-full mx-auto flex flex-col lg:flex-row items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class=" w-full lg:block hidden">
            <div class="relative h-full overflow-hidden shadow-2xl group" style="min-height: 650px;">
                <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?w=800&h=1200&fit=crop" 
                     alt="Investment Growth" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 bg-green-600 rounded-full text-sm font-semibold mb-3">
                            🚀 Join Now
                        </span>
                    </div>
                    <h3 class="text-3xl font-bold mb-3">Start Your Investment Journey</h3>
                    <p class="text-gray-200 text-lg mb-6">Join thousands of successful investors on PrimeVest</p>
                    
                    <div class="flex gap-6">
                        <div>
                            <div class="text-2xl font-bold">50K+</div>
                            <div class="text-sm text-gray-300">Active Investors</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">$2.5B+</div>
                            <div class="text-sm text-gray-300">Assets Managed</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm text-gray-300">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Registration Form -->
        <div class="w-full">
            <div class="bg-white shadow-xl p-8" style="min-height: 650px;">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                    <p class="text-gray-600">Start your free account today</p>
                </div>
                
                <form method="POST" action="/register" class="space-y-5">
                    @csrf
                    
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('name') border-red-500 @enderror"
                               placeholder="Enter your full name"
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                               placeholder="Enter your email address"
                               required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number (Optional) -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number (Optional)</label>
                        <input type="tel" 
                               name="phone" 
                               value="{{ old('phone') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('phone') border-red-500 @enderror"
                               placeholder="+1234567890">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Country (Optional) -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Country (Optional)</label>
                        <select name="country" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300">
                            <option value="">Select Country</option>
                            <option value="Nigeria" {{ old('country') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                            <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                            <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                            <option value="Germany" {{ old('country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                            <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
                            <option value="South Africa" {{ old('country') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                            <option value="Kenya" {{ old('country') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                            <option value="Ghana" {{ old('country') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                        </select>
                        @error('country')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password *</label>
                        <input type="password" 
                               name="password" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
                               placeholder="Create a password"
                               required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password *</label>
                        <input type="password" 
                               name="password_confirmation" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Confirm your password"
                               required>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Create Account
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="/login" class="text-green-600 hover:text-green-700 font-semibold ml-1">
                            Sign in instead
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styling */
    input:focus, select:focus {
        outline: none;
    }
    
    input, select {
        transition: all 0.3s ease;
    }
</style>
@endsection