@extends('layouts.dashboard')

@section('page-title', 'KYC Verification Status')
@section('breadcrumb', 'Track your verification progress')

@section('dashboard-content')
<div class="max-w-3xl mx-auto">
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
    
    <div class="bg-white border border-gray-200 shadow-sm">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <h2 class="text-xl font-semibold text-gray-900">Verification Status</h2>
            <p class="text-sm text-gray-500 mt-1">Track the progress of your identity verification</p>
        </div>
        
        <div class="p-6">
            <!-- Progress Steps -->
            <div class="mb-10">
                <div class="flex items-center">
                    <!-- Step 1: Submitted -->
                    <div class="flex-1 text-center">
                        <div class="relative">
                            <div class="w-12 h-12 mx-auto rounded-full flex items-center justify-center {{ $user->kyc_status != 'not_submitted' ? 'bg-green-600' : 'bg-gray-300' }} text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold mt-2 {{ $user->kyc_status != 'not_submitted' ? 'text-green-600' : 'text-gray-500' }}">Submitted</p>
                        </div>
                    </div>
                    
                    <!-- Connector Line 1 -->
                    <div class="flex-1 h-0.5 {{ $user->kyc_status == 'pending' || $user->kyc_status == 'verified' || $user->kyc_status == 'rejected' ? 'bg-green-600' : 'bg-gray-300' }}"></div>
                    
                    <!-- Step 2: Under Review -->
                    <div class="flex-1 text-center">
                        <div class="relative">
                            <div class="w-12 h-12 mx-auto rounded-full flex items-center justify-center {{ $user->kyc_status == 'pending' ? 'bg-yellow-500' : ($user->kyc_status == 'verified' || $user->kyc_status == 'rejected' ? 'bg-green-600' : 'bg-gray-300') }} text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold mt-2 {{ $user->kyc_status == 'pending' ? 'text-yellow-600' : ($user->kyc_status == 'verified' || $user->kyc_status == 'rejected' ? 'text-green-600' : 'text-gray-500') }}">Under Review</p>
                        </div>
                    </div>
                    
                    <!-- Connector Line 2 -->
                    <div class="flex-1 h-0.5 {{ $user->kyc_status == 'verified' || $user->kyc_status == 'rejected' ? 'bg-green-600' : 'bg-gray-300' }}"></div>
                    
                    <!-- Step 3: Final Decision -->
                    <div class="flex-1 text-center">
                        <div class="relative">
                            <div class="w-12 h-12 mx-auto rounded-full flex items-center justify-center {{ $user->kyc_status == 'verified' ? 'bg-green-600' : ($user->kyc_status == 'rejected' ? 'bg-red-600' : 'bg-gray-300') }} text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-semibold mt-2 {{ $user->kyc_status == 'verified' ? 'text-green-600' : ($user->kyc_status == 'rejected' ? 'text-red-600' : 'text-gray-500') }}">Final Decision</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Helper function to safely format dates -->
            @php
                function safeFormatDate($dateValue, $format = 'F d, Y \a\t h:i A') {
                    if (empty($dateValue)) {
                        return 'N/A';
                    }
                    
                    if ($dateValue instanceof \Carbon\Carbon || $dateValue instanceof \DateTime) {
                        return $dateValue->format($format);
                    }
                    
                    if (is_string($dateValue)) {
                        try {
                            return \Carbon\Carbon::parse($dateValue)->format($format);
                        } catch (\Exception $e) {
                            return 'N/A';
                        }
                    }
                    
                    return 'N/A';
                }
            @endphp
            
            <!-- Status Content -->
            @if($user->kyc_status == 'pending')
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Verification in Progress</h3>
                    <p class="text-gray-600 max-w-md mx-auto">Your documents have been submitted and are currently being reviewed by our compliance team.</p>
                    <p class="text-sm text-gray-500 mt-4">Submitted on: {{ safeFormatDate($user->kyc_submitted_at) }}</p>
                    <div class="mt-6 p-4 bg-gray-50 border border-gray-200">
                        <p class="text-sm text-gray-600">⏳ Estimated completion: 1-2 business days</p>
                    </div>
                </div>
            @elseif($user->kyc_status == 'verified')
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-green-800 mb-3">Verification Complete!</h3>
                    <p class="text-green-600 max-w-md mx-auto">Your identity has been successfully verified. You now have full access to all platform features.</p>
                    <p class="text-sm text-gray-500 mt-4">Verified on: {{ safeFormatDate($user->kyc_verified_at) }}</p>
                    <div class="mt-6">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition-all duration-300">
                            Go to Dashboard
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @elseif($user->kyc_status == 'rejected')
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-red-800 mb-3">Verification Failed</h3>
                    <div class="bg-red-50 border border-red-200 p-4 max-w-md mx-auto mb-6">
                        <p class="text-red-700">{{ $user->kyc_rejection_reason ?? 'Your submitted documents could not be verified. Please ensure images are clear and all information is visible.' }}</p>
                    </div>
                    <a href="{{ route('kyc.form') }}" class="inline-flex items-center px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition-all duration-300">
                        Resubmit Documents
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </a>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Verification Not Started</h3>
                    <p class="text-gray-600 max-w-md mx-auto">You haven't submitted any verification documents yet. Complete KYC to unlock full account features.</p>
                    <div class="mt-6">
                        <a href="{{ route('kyc.form') }}" class="inline-flex items-center px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition-all duration-300">
                            Start Verification
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection