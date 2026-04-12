@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-stretch py-12 px-4 sm:px-6 lg:px-8 relative">
    <div class="green-particles"></div>
    
    <div class="max-w-7xl w-full mx-auto flex flex-col lg:flex-row-reverse gap-0 lg:gap-8 items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class="lg:w-1/2 w-full lg:block hidden">
            <div class="relative h-full rounded-2xl overflow-hidden shadow-2xl group" style="min-height: 600px;">
                <!-- Full Image -->
                <img src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?w=800&h=1200&fit=crop" 
                     alt="Investment Growth" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <!-- Overlay Content -->
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <h3 class="text-3xl font-bold mb-3">Start Your Investment Journey</h3>
                    <p class="text-gray-200 text-lg mb-6">Join thousands of successful investors on PrimeVest</p>
                    
                    <!-- Stats -->
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
        
        <!-- Right Side - Registration Form (Full Width) -->
        <div class="lg:w-1/2 w-full">
            <div class="glass-card h-full flex flex-col justify-center" style="min-height: 600px;">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                    <p class="text-gray-600">Start your free account today</p>
                </div>
                
                <form method="POST" action="/register" class="space-y-6">
                    @csrf
                    
                    <div class="input-group">
                        <input id="name" name="name" type="text" required placeholder=" " class="modern-input @error('name') modern-input-error @enderror" value="{{ old('name') }}">
                        <label for="name" class="floating-label">
                            <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                    </div>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    <div class="input-group">
                        <input id="email" name="email" type="email" required placeholder=" " class="modern-input @error('email') modern-input-error @enderror" value="{{ old('email') }}">
                        <label for="email" class="floating-label">
                            <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email Address
                        </label>
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    <div class="input-group">
                        <input id="password" name="password" type="password" required placeholder=" " class="modern-input @error('password') modern-input-error @enderror">
                        <label for="password" class="floating-label">
                            <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </label>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    <div class="input-group">
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder=" " class="modern-input">
                        <label for="password_confirmation" class="floating-label">
                            <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Confirm Password
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-primary group">
                        <span class="flex items-center justify-center">
                            Create Account
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="/login" class="link-green font-semibold ml-1">
                            Sign in instead
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection