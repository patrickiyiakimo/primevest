@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-stretch py-12 px-4 sm:px-6 lg:px-8 relative">
    <div class="green-particles"></div>
    
    <div class="max-w-7xl w-full mx-auto flex flex-col lg:flex-row gap-0 lg:gap-8 items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class="lg:w-1/2 w-full lg:block hidden">
            <div class="relative h-full rounded-2xl overflow-hidden shadow-2xl group" style="min-height: 600px;">
                <img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?w=800&h=1200&fit=crop" 
                     alt="Welcome Back" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
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
        <div class="lg:w-1/2 w-full">
            <div class="glass-card h-full flex flex-col justify-center" style="min-height: 600px;">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Sign In</h2>
                    <p class="text-gray-600">Access your investment dashboard</p>
                </div>
                
                @if(session('error'))
                    <div class="alert-error mb-6">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form method="POST" action="/login" class="space-y-6">
                    @csrf
                    
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
                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="checkbox-green">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        <a href="/forgot-password" class="link-green text-sm">
                            Forgot password?
                        </a>
                    </div>
                    
                    <button type="submit" class="btn-primary group">
                        <span class="flex items-center justify-center">
                            Sign In
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/register" class="link-green font-semibold ml-1">
                            Create free account
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection