@extends('layouts.app')

@section('content')
<div class="flex relative">
    
    <div class="w-full mx-auto flex flex-col lg:flex-row items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class="w-full lg:block hidden">
            <div class="relative h-full overflow-hidden" style="min-height: 650px;">
                <img src="/images/beginners-success.jpg" 
                     alt="Reset Password" 
                     class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 bg-green-600 rounded-full text-sm font-semibold mb-3">
                            🔐 Password Recovery
                        </span>
                    </div>
                    <h3 class="text-3xl font-bold mb-3">Forgot Your Password?</h3>
                    <p class="text-gray-200 text-lg mb-6">Don't worry, we'll help you reset it</p>
                    
                    <div class="flex gap-6">
                        <div>
                            <div class="text-2xl font-bold">Secure</div>
                            <div class="text-sm text-gray-300">Process</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">Fast</div>
                            <div class="text-sm text-gray-300">Recovery</div>
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
        
        <!-- Right Side - Reset Form -->
        <div class="w-full">
            <div class="bg-white shadow-xl p-8" style="min-height: 650px;">
                <div class="text-center mb-8">
                   
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 pt-10 lg:pt-20">Reset Password</h2>
                    <p class="text-gray-600 mt-2">Enter your email address and we'll send you a link to reset your password</p>
                </div>
                
                @if(session('status'))
                    <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-green-700 text-sm">{{ session('status') }}</p>
                        </div>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                        <p class="text-red-700 text-sm">{{ session('error') }}</p>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                               placeholder="Enter your email address"
                               required 
                               autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold transition-all duration-500 shadow-lg">
                        Send Password Reset Link
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Remember your password?
                        <a href="/login" class="text-green-600 hover:text-green-700 font-semibold ml-1">
                            Back to Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    input:focus {
        outline: none;
    }
    
    input {
        transition: all 0.3s ease;
    }
</style>
@endsection