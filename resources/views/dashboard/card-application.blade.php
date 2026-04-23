@extends('layouts.dashboard')

@section('page-title', 'Card Application')
@section('breadcrumb', 'Apply for your PrimeVest debit card')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold">Apply for Card</h1>
                <p class="text-gray-300 mt-1">Get your PrimeVest debit card for easy access to your funds</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/20">
                <span class="text-green-400 text-sm font-semibold">💰 Available Balance: ${{ number_format(Auth::user()->balance, 2) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Left Side - Card Preview -->
        <div class="space-y-6">
            <!-- Debit Card Image - Static Image -->
            <div class="flex justify-center">
                <img src="{{ asset('/images/Gemini_Generated_Image_ydhjqgydhjqgydhj.png') }}" alt="PrimeVest Debit Card" class="w-full max-w-md rounded-2xl shadow-2xl transition-all duration-300">
            </div>

            <!-- Card Benefits -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Card Benefits
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">0% Foreign Fees</p>
                                <p class="text-xs text-gray-500">No transaction fees</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Cashback Rewards</p>
                                <p class="text-xs text-gray-500">Up to 5% cashback</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Secure Payments</p>
                                <p class="text-xs text-gray-500">3D Secure enabled</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">Worldwide Access</p>
                                <p class="text-xs text-gray-500">Accepted globally</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Application Form -->
        <div class="space-y-6">
            <!-- Eligibility Notice -->
            @if(Auth::user()->balance < 2000)
            <div class="bg-yellow-50 rounded-2xl p-4 border border-yellow-200">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-yellow-800">Minimum Balance Required</p>
                        <p class="text-xs text-yellow-700 mt-1">The minimum balance for the card application process is <strong>$2,000</strong></p>
                        <p class="text-xs text-yellow-700 mt-1">Your current balance: <strong>${{ number_format(Auth::user()->balance, 2) }}</strong></p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Application Form -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Card Application
                    </h2>
                </div>
                <div class="p-6">
                    <form id="cardApplicationForm" method="POST" action="{{ route('card-application.submit') }}">
                        @csrf
                        
                        <!-- Card Type Selection - Mastercard or Visa -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">SELECT CARD TYPE</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="card-type-option cursor-pointer">
                                    <input type="radio" name="card_type" value="visa" class="hidden peer" checked>
                                    <div class="border-2 border-gray-200 rounded-xl p-3 text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <span class="text-white font-bold text-sm">VISA</span>
                                        </div>
                                        <p class="font-semibold text-gray-800 text-sm">Visa Card</p>
                                        <p class="text-xs text-gray-500">Global Acceptance</p>
                                    </div>
                                </label>
                                <label class="card-type-option cursor-pointer">
                                    <input type="radio" name="card_type" value="mastercard" class="hidden peer">
                                    <div class="border-2 border-gray-200 rounded-xl p-3 text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-700 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <span class="text-white font-bold text-sm">MC</span>
                                        </div>
                                        <p class="font-semibold text-gray-800 text-sm">Mastercard</p>
                                        <p class="text-xs text-gray-500">Premium Benefits</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Card Tier Selection -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-3">SELECT CARD TIER</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="card-tier-option cursor-pointer">
                                    <input type="radio" name="card_tier" value="platinum" class="hidden peer" checked>
                                    <div class="border-2 border-gray-200 rounded-xl p-3 text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-gray-500 to-gray-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <span class="text-white font-bold text-sm">P</span>
                                        </div>
                                        <p class="font-semibold text-gray-800 text-sm">Platinum</p>
                                        <p class="text-xs text-gray-500">Premium Benefits</p>
                                    </div>
                                </label>
                                <label class="card-tier-option cursor-pointer">
                                    <input type="radio" name="card_tier" value="gold" class="hidden peer">
                                    <div class="border-2 border-gray-200 rounded-xl p-3 text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-300">
                                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-2">
                                            <span class="text-white font-bold text-sm">G</span>
                                        </div>
                                        <p class="font-semibold text-gray-800 text-sm">Gold</p>
                                        <p class="text-xs text-gray-500">Classic Benefits</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Delivery Address -->
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">DELIVERY ADDRESS</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <textarea name="delivery_address" rows="3" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" placeholder="Enter Your Delivery Address..." required></textarea>
                            </div>
                        </div>
                        
                        <!-- Additional Info -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Your phone number" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">ID Type</label>
                                <select name="id_type" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                    <option value="passport">International Passport</option>
                                    <option value="driver_license">Driver's License</option>
                                    <option value="national_id">National ID Card</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2" {{ Auth::user()->balance < 2000 ? 'disabled' : '' }}>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Submit Application
                        </button>
                        
                        @if(Auth::user()->balance < 2000)
                        <p class="text-xs text-center text-red-500 mt-3">
                            You need a minimum balance of $2,000 to apply for a card
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

<script>
    class Toast {
        constructor() {
            this.container = document.getElementById('toastContainer');
        }
        
        show(message, type = 'success', duration = 4000) {
            const toast = document.createElement('div');
            const colors = {
                success: 'bg-green-600',
                error: 'bg-red-600',
                warning: 'bg-yellow-600',
                info: 'bg-blue-600'
            };
            const icons = {
                success: '✓',
                error: '✗',
                warning: '⚠',
                info: 'ℹ'
            };
            
            toast.className = `${colors[type]} text-white px-5 py-3 rounded-xl shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 4000) { this.show(message, 'success', duration); }
        error(message, duration = 4000) { this.show(message, 'error', duration); }
        warning(message, duration = 4000) { this.show(message, 'warning', duration); }
        info(message, duration = 4000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    
    // Form submission
    document.getElementById('cardApplicationForm')?.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const balance = {{ Auth::user()->balance }};
        if (balance < 2000) {
            toast.warning('Minimum balance of $2,000 required to apply for a card');
            return;
        }
        
        const deliveryAddress = document.querySelector('textarea[name="delivery_address"]').value;
        if (!deliveryAddress) {
            toast.warning('Please enter your delivery address');
            return;
        }
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div> Submitting...';
        
        try {
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                toast.success(data.message);
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 3000);
            } else {
                toast.error(data.message);
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        } catch (error) {
            toast.error('Something went wrong. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
</script>

<style>
    input:focus, select:focus, textarea:focus {
        outline: none;
    }
    
    .card-type-option input:checked + div,
    .card-tier-option input:checked + div {
        border-color: #10b981;
        background-color: #ecfdf5;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .animate-spin {
        animation: spin 1s linear infinite;
    }
</style>
@endsection