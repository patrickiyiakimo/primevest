@extends('layouts.dashboard')

@section('page-title', 'KYC Verification')
@section('breadcrumb', 'Complete your identity verification')

@section('dashboard-content')
<div class="max-w-4xl mx-auto">
    <!-- Success Message -->
    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 p-4">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-green-800">{{ session('success') }}</p>
        </div>
    </div>
    @endif
    
    <!-- Error Message -->
    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 p-4">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-red-800">{{ session('error') }}</p>
        </div>
    </div>
    @endif
    
    <div class="bg-white border border-gray-200 shadow-sm">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <h2 class="text-xl font-semibold text-gray-900">Identity Verification (KYC)</h2>
            </div>
            <p class="text-sm text-gray-500 mt-1">Verify your identity to unlock full account features</p>
        </div>
        
        <div class="p-6">
            @if($user->kyc_status == 'verified')
                <!-- Already Verified -->
                <div class="bg-green-50 border border-green-200 p-6 text-center">
                    <svg class="w-16 h-16 text-green-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-green-800 mb-2">Already Verified</h3>
                    <p class="text-green-600">Your identity has been verified. Thank you for your trust.</p>
                    <a href="{{ route('profile') }}" class="inline-block mt-4 text-green-600 hover:text-green-700 font-medium">Back to Profile →</a>
                </div>
            @elseif($user->kyc_status == 'pending')
                <!-- Pending Review -->
                <div class="bg-yellow-50 border border-yellow-200 p-6 text-center">
                    <svg class="w-16 h-16 text-yellow-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-yellow-800 mb-2">Pending Review</h3>
                    <p class="text-yellow-600">Your documents are being reviewed by our compliance team.</p>
                    <p class="text-sm text-yellow-500 mt-2">This typically takes 1-2 business days.</p>
                    <a href="{{ route('kyc.status') }}" class="inline-block mt-4 text-red-600 hover:text-red-700 font-medium">Check Status →</a>
                </div>
            @elseif($user->kyc_status == 'rejected')
                <!-- Rejected - Show Form to Resubmit -->
                <div class="bg-red-50 border border-red-200 p-4 mb-6">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-red-800">Verification Failed</p>
                            <p class="text-sm text-red-600 mt-1">{{ $user->kyc_rejection_reason ?? 'Please resubmit your documents with clear images.' }}</p>
                        </div>
                    </div>
                </div>
                
                @include('dashboard.kyc-form-fields')
            @else
                <!-- Not Submitted - Show Form -->
                @include('dashboard.kyc-form-fields')
            @endif
        </div>
    </div>
</div>
@endsection