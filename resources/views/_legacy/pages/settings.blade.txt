@extends('layouts.dashboard')

@section('page-title', 'Account Settings')
@section('breadcrumb', 'Manage your account preferences')

@section('dashboard-content')
<div class="space-y-6">
    
    <!-- Settings Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
                <p class="text-gray-400 text-sm">Manage your profile, security, and notification preferences</p>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        
        <!-- Settings Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-20">
                <nav class="flex flex-col">
                    <button onclick="showTab('profile')" id="tab-profile-btn" class="settings-tab-btn active flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-red-500 bg-red-50">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Profile Information</span>
                    </button>
                    <button onclick="showTab('security')" id="tab-security-btn" class="settings-tab-btn flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-transparent hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Security & 2FA</span>
                    </button>
                    <button onclick="showTab('notifications')" id="tab-notifications-btn" class="settings-tab-btn flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-transparent hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Notifications</span>
                    </button>
                    <button onclick="showTab('banking')" id="tab-banking-btn" class="settings-tab-btn flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-transparent hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Banking & Payments</span>
                    </button>
                    <button onclick="showTab('preferences')" id="tab-preferences-btn" class="settings-tab-btn flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-transparent hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        </svg>
                        <span class="font-medium text-gray-700">Preferences</span>
                    </button>
                    <button onclick="showTab('api')" id="tab-api-btn" class="settings-tab-btn flex items-center gap-3 px-6 py-4 text-left transition-all duration-300 border-l-4 border-transparent hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-gray-700">API Access</span>
                    </button>
                </nav>
            </div>
        </div>
        
        <!-- Settings Content -->
        <div class="lg:col-span-3">
            
            <!-- Profile Information Tab -->
            <div id="profile-tab" class="settings-tab-content">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">Profile Information</h2>
                        <p class="text-gray-400 text-sm mt-1">Update your personal information and public profile</p>
                    </div>
                    <form class="p-6 space-y-6" method="POST" action="{{ route('settings.profile.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Avatar Section -->
                        <div class="flex items-center gap-6 pb-6 border-b border-gray-100">
                            <div class="w-24 h-24 bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white text-3xl font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <button type="button" class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">Change Avatar</button>
                                <p class="text-gray-400 text-xs mt-2">JPG, GIF or PNG. Max size 2MB</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed" readonly>
                                <p class="text-xs text-gray-400 mt-1">Email cannot be changed. Contact support for assistance.</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}" placeholder="+1 234 567 8900" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                                <input type="date" name="dob" value="{{ Auth::user()->dob ?? '' }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <input type="text" name="address" value="{{ Auth::user()->address ?? '' }}" placeholder="Your residential address" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                            </div>
                        </div>
                        
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Security Tab -->
            <div id="security-tab" class="settings-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">Security Settings</h2>
                        <p class="text-gray-400 text-sm mt-1">Manage your password and two-factor authentication</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Change Password -->
                        <form method="POST" action="{{ route('settings.password.update') }}" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Change Password</h3>
                                <div class="grid grid-cols-1 gap-5">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                        <input type="password" name="current_password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                        <input type="password" name="new_password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                                        <p class="text-xs text-gray-400 mt-1">Minimum 8 characters with at least one uppercase, one lowercase, and one number</p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg">
                                    Update Password
                                </button>
                            </div>
                        </form>
                        
                        <!-- Two-Factor Authentication -->
                        <div class="pt-6 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Two-Factor Authentication</h3>
                                    <p class="text-gray-400 text-sm mt-1">Add an extra layer of security to your account</p>
                                </div>
                                <button class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition">
                                    Enable 2FA
                                </button>
                            </div>
                            <div class="mt-4 p-4 bg-gray-50 rounded-xl">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-600">Two-factor authentication adds an extra layer of security to your account. Once enabled, you'll need to enter a verification code from your authenticator app each time you log in.</p>
                                        <a href="#" class="text-red-600 text-sm font-medium hover:text-red-700 mt-2 inline-block">Learn more →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Active Sessions -->
                        <div class="pt-6 border-t border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Active Sessions</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-gray-800">Chrome on Windows</p>
                                            <p class="text-xs text-gray-400">New York, USA · Last active now</p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-green-600 font-medium">Current Session</span>
                                </div>
                            </div>
                            <button class="mt-4 text-red-600 text-sm font-medium hover:text-red-700">Log out all other devices</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Notifications Tab -->
            <div id="notifications-tab" class="settings-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">Notification Preferences</h2>
                        <p class="text-gray-400 text-sm mt-1">Choose what emails and alerts you receive</p>
                    </div>
                    <form class="p-6 space-y-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Account Activity</h3>
                                    <p class="text-sm text-gray-400">Login alerts and security notifications</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Trading Updates</h3>
                                    <p class="text-sm text-gray-400">Trade confirmations and order executions</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Market News & Analysis</h3>
                                    <p class="text-sm text-gray-400">Daily market insights and trading ideas</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Deposit & Withdrawal</h3>
                                    <p class="text-sm text-gray-400">Confirmations for all financial transactions</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                                <div>
                                    <h3 class="font-semibold text-gray-800">Promotional Offers</h3>
                                    <p class="text-sm text-gray-400">Special promotions and bonus opportunities</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg">
                                Save Preferences
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Banking & Payments Tab -->
            <div id="banking-tab" class="settings-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">Banking & Payments</h2>
                        <p class="text-gray-400 text-sm mt-1">Manage your linked bank accounts and payment methods</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Linked Accounts -->
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Linked Bank Accounts</h3>
                                <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">+ Add Account</button>
                            </div>
                            <div class="border border-gray-200 rounded-xl p-4 text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                <p class="text-gray-500 text-sm">No bank accounts linked yet</p>
                                <p class="text-gray-400 text-xs mt-1">Add a bank account to deposit and withdraw funds</p>
                            </div>
                        </div>
                        
                        <!-- Default Currency -->
                        <div class="pt-6 border-t border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Default Currency</h3>
                            <select class="w-full max-w-xs px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                <option value="USD">USD - US Dollar ($)</option>
                                <option value="EUR">EUR - Euro (€)</option>
                                <option value="GBP">GBP - British Pound (£)</option>
                                <option value="CAD">CAD - Canadian Dollar (C$)</option>
                                <option value="AUD">AUD - Australian Dollar (A$)</option>
                                <option value="JPY">JPY - Japanese Yen (¥)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Preferences Tab -->
            <div id="preferences-tab" class="settings-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">Platform Preferences</h2>
                        <p class="text-gray-400 text-sm mt-1">Customize your trading experience</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Theme Preference</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="theme" checked class="w-4 h-4 text-red-600 focus:ring-red-500">
                                        <span>Light Mode</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="theme" class="w-4 h-4 text-red-600 focus:ring-red-500">
                                        <span>Dark Mode</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="radio" name="theme" class="w-4 h-4 text-red-600 focus:ring-red-500">
                                        <span>System Default</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                                <select class="w-full max-w-md px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    <option value="America/New_York">Eastern Time (ET)</option>
                                    <option value="America/Chicago">Central Time (CT)</option>
                                    <option value="America/Denver">Mountain Time (MT)</option>
                                    <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                    <option value="Europe/London">GMT (London)</option>
                                    <option value="Asia/Tokyo">JST (Tokyo)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Chart Preferences</label>
                                <select class="w-full max-w-md px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    <option value="candlestick">Candlestick Chart</option>
                                    <option value="bar">Bar Chart</option>
                                    <option value="line">Line Chart</option>
                                    <option value="area">Area Chart</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg">
                                Save Preferences
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- API Access Tab -->
            <div id="api-tab" class="settings-tab-content hidden">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 px-6 py-5">
                        <h2 class="text-xl font-bold text-gray-800">API Access</h2>
                        <p class="text-gray-400 text-sm mt-1">Manage your API keys for programmatic trading</p>
                    </div>
                    <div class="p-6">
                        <div class="mb-6 p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-amber-800">API keys provide full access to your account. Keep them secure and never share them publicly.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                            <p class="text-gray-500 font-medium mb-1">No API keys created</p>
                            <p class="text-gray-400 text-sm mb-4">Create an API key to automate your trading strategies</p>
                            <button class="px-6 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-lg transition shadow-md hover:shadow-lg">
                                + Generate API Key
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.settings-tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active styles from all buttons
        document.querySelectorAll('.settings-tab-btn').forEach(btn => {
            btn.classList.remove('active', 'border-red-500', 'bg-red-50');
            btn.classList.add('border-transparent');
            const svg = btn.querySelector('svg');
            if (svg) {
                svg.classList.remove('text-red-600');
                svg.classList.add('text-gray-400');
            }
            const span = btn.querySelector('span');
            if (span) {
                span.classList.remove('text-gray-700');
            }
        });
        
        // Show selected tab content
        const selectedTab = document.getElementById(`${tabName}-tab`);
        if (selectedTab) {
            selectedTab.classList.remove('hidden');
        }
        
        // Add active styles to clicked button
        const activeBtn = document.getElementById(`tab-${tabName}-btn`);
        if (activeBtn) {
            activeBtn.classList.add('active', 'border-red-500', 'bg-red-50');
            activeBtn.classList.remove('border-transparent');
            const svg = activeBtn.querySelector('svg');
            if (svg) {
                svg.classList.remove('text-gray-400');
                svg.classList.add('text-red-600');
            }
            const span = activeBtn.querySelector('span');
            if (span) {
                span.classList.add('text-gray-700');
            }
        }
    }
</script>

<style>
    .settings-tab-btn {
        transition: all 0.3s ease;
    }
    
    .settings-tab-btn.active {
        background-color: #fef2f2;
        border-left-color: #ef4444;
    }
    
    .settings-tab-btn:hover svg {
        color: #ef4444;
    }
    
    .settings-tab-btn:hover span {
        color: #374151;
    }
</style>
@endsection