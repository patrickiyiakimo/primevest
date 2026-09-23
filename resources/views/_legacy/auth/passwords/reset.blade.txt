@extends('layouts.app')

@section('content')
<div class="flex relative">
    
    <div class="w-full mx-auto flex flex-col lg:flex-row items-stretch">
        
        <!-- Left Side - Full Height Image -->
        <div class="w-full lg:block hidden">
            <div class="relative h-full overflow-hidden" style="min-height: 650px;">
                <img src="/images/beginners-success.jpg" 
                     alt="Create New Password" 
                     class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 bg-green-600 rounded-full text-sm font-semibold mb-3">
                            🔒 Create New Password
                        </span>
                    </div>
                    <h3 class="text-3xl font-bold mb-3">Create New Password</h3>
                    <p class="text-gray-200 text-lg mb-6">Choose a strong password for your account</p>
                    
                    <div class="flex gap-6">
                        <div>
                            <div class="text-2xl font-bold">Strong</div>
                            <div class="text-sm text-gray-300">Encryption</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">Secure</div>
                            <div class="text-sm text-gray-300">Storage</div>
                        </div>
                        <div class="w-px h-12 bg-white/30"></div>
                        <div>
                            <div class="text-2xl font-bold">Instant</div>
                            <div class="text-sm text-gray-300">Update</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Reset Password Form -->
        <div class="w-full">
            <div class="bg-white shadow-xl p-8" style="min-height: 650px;">
                <div class="text-center mb-8">
                    <div class="mb-4">
                        <svg class="w-16 h-16 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 pt-10 lg:pt-20">Create New Password</h2>
                    <p class="text-gray-600 mt-2">Please enter your new password below</p>
                </div>
                
                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <!-- Email Address -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <input type="email" 
                               name="email" 
                               value="{{ $email ?? old('email') }}" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror"
                               placeholder="Enter your email address"
                               required 
                               readonly
                               @readonly(true)>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- New Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">New Password</label>
                        <input type="password" 
                               name="password" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror"
                               placeholder="Enter new password"
                               required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Password must be at least 8 characters</p>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm New Password</label>
                        <input type="password" 
                               name="password_confirmation" 
                               class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               placeholder="Confirm new password"
                               required>
                    </div>
                    
                    <!-- Password Strength Indicator (Optional) -->
                    <div class="password-strength hidden">
                        <div class="flex gap-2 mt-2">
                            <div class="strength-bar flex-1 h-1 rounded-full bg-gray-200"></div>
                            <div class="strength-bar flex-1 h-1 rounded-full bg-gray-200"></div>
                            <div class="strength-bar flex-1 h-1 rounded-full bg-gray-200"></div>
                            <div class="strength-bar flex-1 h-1 rounded-full bg-gray-200"></div>
                        </div>
                        <p class="strength-text text-xs mt-1 text-gray-500"></p>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold transition-all duration-500 shadow-lg">
                        Reset Password
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
    
    /* Password strength indicator styles */
    .strength-bar {
        transition: all 0.3s ease;
    }
    
    .strength-bar.weak {
        background-color: #ef4444;
    }
    
    .strength-bar.medium {
        background-color: #f59e0b;
    }
    
    .strength-bar.strong {
        background-color: #10b981;
    }
</style>

@push('scripts')
<script>
    // Optional: Password strength checker
    const passwordInput = document.querySelector('input[name="password"]');
    const strengthContainer = document.querySelector('.password-strength');
    const strengthBars = document.querySelectorAll('.strength-bar');
    const strengthText = document.querySelector('.strength-text');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            
            if (password.length === 0) {
                strengthContainer.classList.add('hidden');
                return;
            }
            
            strengthContainer.classList.remove('hidden');
            
            // Calculate password strength
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[$@#&!]+/)) strength++;
            
            // Reset bars
            strengthBars.forEach(bar => {
                bar.classList.remove('weak', 'medium', 'strong');
                bar.style.backgroundColor = '#e5e7eb';
            });
            
            // Set strength level
            let strengthLevel = '';
            let strengthMessage = '';
            
            if (strength <= 2) {
                strengthLevel = 'weak';
                strengthMessage = 'Weak password';
                strengthBars[0].classList.add('weak');
            } else if (strength === 3) {
                strengthLevel = 'medium';
                strengthMessage = 'Medium password';
                strengthBars[0].classList.add('medium');
                strengthBars[1].classList.add('medium');
            } else if (strength >= 4) {
                strengthLevel = 'strong';
                strengthMessage = 'Strong password';
                strengthBars[0].classList.add('strong');
                strengthBars[1].classList.add('strong');
                strengthBars[2].classList.add('strong');
            }
            
            if (strength === 5) {
                strengthBars[3].classList.add('strong');
                strengthMessage = 'Very strong password';
            }
            
            strengthText.textContent = strengthMessage;
            strengthText.className = `strength-text text-xs mt-1 text-${strengthLevel === 'weak' ? 'red' : strengthLevel === 'medium' ? 'orange' : 'green'}-500`;
        });
    }
</script>
@endpush
@endsection
