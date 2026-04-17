@extends('layouts.dashboard')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-2xl shadow-xl overflow-hidden">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">Hi, welcome back!</h1>
                    <p class="text-gray-400 mt-1">Edit your profile</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Profile Form -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Account Profile Section -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-800">Account Profile</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-5">
                            <!-- First Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                                <input type="text" 
                                       name="name" 
                                       value="{{ old('name', $user->name) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Enter your full name">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Email Address -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                <input type="email" 
                                       name="email" 
                                       value="{{ old('email', $user->email) }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Enter your email address">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Country -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Country *</label>
                                <select name="country" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300">
                                    <option value="Nigeria" {{ old('country', $user->country ?? '') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                    <option value="United States" {{ old('country', $user->country ?? '') == 'United States' ? 'selected' : '' }}>United States</option>
                                    <option value="United Kingdom" {{ old('country', $user->country ?? '') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="Canada" {{ old('country', $user->country ?? '') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="Australia" {{ old('country', $user->country ?? '') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                    <option value="Germany" {{ old('country', $user->country ?? '') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                    <option value="France" {{ old('country', $user->country ?? '') == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="South Africa" {{ old('country', $user->country ?? '') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                    <option value="Kenya" {{ old('country', $user->country ?? '') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                    <option value="Ghana" {{ old('country', $user->country ?? '') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                </select>
                            </div>
                            
                            <!-- Phone Number -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                <input type="tel" 
                                       name="phone" 
                                       value="{{ old('phone', $user->phone ?? '') }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="+234XXXXXXXXXX">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <button type="submit" class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-all duration-300">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-800">Change Password</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-5">
                            <!-- Old Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Old password *</label>
                                <input type="password" 
                                       name="current_password" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Enter your old password...">
                                @error('current_password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- New Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">New password *</label>
                                <input type="password" 
                                       name="password" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Enter your new password...">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Confirm New Password -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm new password *</label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                       placeholder="Confirm your new password...">
                            </div>
                            
                            <button type="submit" class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-all duration-300">
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="space-y-6">
            <!-- Referral Link Section -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-800">Referral Link</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Referral Link</label>
                            <div class="flex items-center space-x-2">
                                <input type="text" 
                                       id="referralLink" 
                                       value="{{ url('/register?referral=' . Auth::user()->email) }}" 
                                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 text-sm"
                                       readonly>
                                <button onclick="copyReferralLink()" class="px-4 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
                            <p class="text-sm text-blue-700">
                                Copy and paste this link to send to friends or use in your articles. 
                                When users sign up using this link, your account will be credited with a <strong class="font-bold">5% referral bonus</strong>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Affiliates Table -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-800">Affiliates</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">S/N</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">FULLNAME</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">EMAIL</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ACCOUNT ID</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">STATUS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($affiliates ?? [] as $index => $affiliate)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $affiliate->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $affiliate->email ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $affiliate->id ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Active</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                    <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p>No affiliates yet</p>
                                    <p class="text-xs mt-1">Share your referral link to start earning</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyReferralLink() {
        const linkInput = document.getElementById('referralLink');
        linkInput.select();
        linkInput.setSelectionRange(0, 99999);
        document.execCommand('copy');
        
        // Show notification
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-pulse';
        notification.innerHTML = 'Referral link copied to clipboard!';
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }
</script>

<style>
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
@endsection