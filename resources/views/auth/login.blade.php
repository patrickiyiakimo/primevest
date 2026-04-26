@extends('layouts.app')

@section('content')
<div class="flex relative">
    
    <div class="w-full mx-auto flex flex-col lg:flex-row items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class=" w-full lg:block hidden">
            <div class="relative h-full overflow-hidden" style="min-height: 650px;">
                <img src="https://images.pexels.com/photos/8370752/pexels-photo-8370752.jpeg?w=800&h=1200&fit=crop" 
                     alt="Welcome Back" 
                     class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 bg-red-600 rounded-full text-sm font-semibold mb-3">
                            👋 Welcome Back
                        </span>
                    </div>
                    <h3 class="text-3xl font-bold mb-3">Continue Your Journey</h3>
                    <p class="text-gray-200 text-lg mb-6">Access your portfolio and track your investments</p>
                    
                    <div class="flex gap-6">
                        <div>
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm text-gray-300">Trading Access</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">99.9%</div>
                            <div class="text-sm text-gray-300">Uptime</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">Instant</div>
                            <div class="text-sm text-gray-300">Withdrawals</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class=" w-full">
            <div class="bg-white shadow-xl p-8" style="min-height: 650px;">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
                    <p class="text-gray-600">Access your investment dashboard</p>
                </div>
                
                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                        <p class="text-red-700 text-sm">{{ session('error') }}</p>
                    </div>
                @endif
                
                <form method="POST" action="/login" class="space-y-6">
                    @csrf
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                               placeholder="Enter your email address"
                               required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input type="password" 
                               name="password" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
                               placeholder="Enter your password"
                               required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="/forgot-password" class="text-sm text-red-600 hover:text-red-700 font-semibold">
                            Forgot password?
                        </a>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition-all duration-500 shadow-lg">
                        Sign In
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/register" class="text-red-600 hover:text-red-700 font-semibold ml-1">
                            Create free account
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styling */
    input:focus {
        outline: none;
    }
    
    input {
        transition: all 0.3s ease;
    }
    
    /* No spacing between sections */
    .rounded-l-2xl {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    
    .rounded-r-2xl {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
@endsection