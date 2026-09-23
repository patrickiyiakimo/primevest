<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - KYC Review | PrimeVest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f7f9fc;
        }
        
        /* No rounded corners */
        .bg-white, .border, button, a, div, .toast {
            border-radius: 0 !important;
        }
        
        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            height: 100vh;
            background: #0a1a2f;
            z-index: 50;
            overflow-y: auto;
        }
        
        .admin-sidebar::-webkit-scrollbar {
            width: 4px;
        }
        
        .admin-sidebar::-webkit-scrollbar-track {
            background: #1a2a3f;
        }
        
        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #dc2626;
        }
        
        /* Main Content */
        .admin-main {
            margin-left: 280px;
            min-height: 100vh;
        }
        
        /* Top Navbar */
        .admin-top-navbar {
            position: sticky;
            top: 0;
            right: 0;
            left: 280px;
            z-index: 40;
            background: white;
            border-bottom: 1px solid #eef2f6;
            padding: 0.875rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .admin-sidebar.open {
                transform: translateX(0);
            }
            .admin-main, .admin-top-navbar {
                margin-left: 0;
                left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="admin-sidebar">
    <div class="p-6 border-b border-gray-700">
        <a href="/admin" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-red-600 flex items-center justify-center">
                <span class="text-white font-bold text-sm">PV</span>
            </div>
            <span class="text-white font-bold">PrimeVest</span>
        </a>
    </div>
    
    <nav class="p-4">
        <div class="mb-6">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">MAIN MENU</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Users</span>
            </a>
            <a href="{{ route('admin.deposits') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Deposits</span>
            </a>
            <a href="{{ route('admin.withdrawals') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Withdrawals</span>
            </a>
            <a href="{{ route('admin.investments') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span>Investments</span>
            </a>
            <a href="{{ route('admin.card-applications') }}" class="flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                <span>Card Apps</span>
            </a>
            <a href="{{ route('admin.kyc.index') }}" class="flex items-center gap-3 px-4 py-2 bg-red-600/20 text-red-400 transition-all duration-300 mt-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>KYC Submissions</span>
            </a>
        </div>
        
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-gray-300 hover:bg-red-600 hover:text-white transition-all duration-300 mt-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>

<!-- Main Content -->
<main class="admin-main">
    <nav class="admin-top-navbar">
        <div>
            <h1 class="text-xl font-bold text-gray-900">KYC Review</h1>
            <p class="text-sm text-gray-500">Review documents for {{ $user->name }}</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">Administrator</p>
            </div>
            <div class="w-10 h-10 bg-red-600 flex items-center justify-center">
                <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
        </div>
    </nav>
    
    <div class="p-6">
        <div class="bg-white border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">KYC Review</h1>
                    <p class="text-sm text-gray-500">Review documents for {{ $user->name }}</p>
                </div>
                <a href="{{ route('admin.kyc.index') }}" class="text-red-600 hover:text-red-700">← Back to List</a>
            </div>
            
            <div class="p-6">
                <!-- Helper function to safely format dates - check if exists first -->
                @if (!function_exists('safeFormatDate'))
                    @php
                        function safeFormatDate($dateValue, $format = 'M d, Y H:i') {
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
                                    return 'Invalid date';
                                }
                            }
                            
                            return 'N/A';
                        }
                    @endphp
                @endif

                <!-- User Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="border border-gray-200 p-4">
                        <h2 class="font-semibold text-gray-800 mb-3">User Information</h2>
                        <div class="space-y-2">
                            <p><span class="text-gray-500 w-32 inline-block">Name:</span> <span class="font-medium">{{ $user->name }}</span></p>
                            <p><span class="text-gray-500 w-32 inline-block">Email:</span> <span class="font-medium">{{ $user->email }}</span></p>
                            <p><span class="text-gray-500 w-32 inline-block">Phone:</span> <span class="font-medium">{{ $user->phone ?? 'N/A' }}</span></p>
                            <p><span class="text-gray-500 w-32 inline-block">Country:</span> <span class="font-medium">{{ $user->country ?? 'N/A' }}</span></p>
                            <p><span class="text-gray-500 w-32 inline-block">Submitted:</span> <span class="font-medium">{{ safeFormatDate($user->kyc_submitted_at) }}</span></p>
                            <p><span class="text-gray-500 w-32 inline-block">Document Type:</span> <span class="font-medium">{{ ucfirst(str_replace('_', ' ', $user->kyc_document_type ?? 'N/A')) }}</span></p>
                        </div>
                    </div>
                    
                    <!-- Documents -->
                    <div class="border border-gray-200 p-4">
                        <h2 class="font-semibold text-gray-800 mb-3">Uploaded Documents</h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-600 mb-2">Front Side:</p>
                                @if($user->kyc_document_front)
                                    <a href="{{ route('admin.kyc.download', [$user->id, 'front']) }}" class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm hover:bg-red-700 transition">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download Front Side
                                    </a>
                                @else
                                    <p class="text-gray-400">No document uploaded</p>
                                @endif
                            </div>
                            <div>
                                <p class="text-gray-600 mb-2">Back Side:</p>
                                @if($user->kyc_document_back)
                                    <a href="{{ route('admin.kyc.download', [$user->id, 'back']) }}" class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm hover:bg-red-700 transition">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Download Back Side
                                    </a>
                                @else
                                    <p class="text-gray-400">No document uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Status Information (if already processed) -->
                @if(in_array($user->kyc_status, ['verified', 'rejected']))
                <div class="mb-6 p-4 border {{ $user->kyc_status == 'verified' ? 'border-green-200 bg-green-50' : 'border-red-200 bg-red-50' }}">
                    <h3 class="font-semibold {{ $user->kyc_status == 'verified' ? 'text-green-800' : 'text-red-800' }} mb-2">
                        {{ $user->kyc_status == 'verified' ? '✓ Verification Approved' : '✗ Verification Rejected' }}
                    </h3>
                    @if($user->kyc_status == 'verified')
                        <p class="text-sm text-green-700">Verified on: {{ safeFormatDate($user->kyc_verified_at) }}</p>
                    @else
                        <p class="text-sm text-red-700">Rejection reason: {{ $user->kyc_rejection_reason ?? 'No reason provided' }}</p>
                    @endif
                </div>
                @endif
                
                <!-- Action Buttons (only show if status is pending) -->
                @if($user->kyc_status == 'pending')
                <div class="flex gap-4">
                    <form action="{{ route('admin.kyc.approve', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold transition">
                            Approve KYC
                        </button>
                    </form>
                    
                    <button onclick="showRejectModal()" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition">
                        Reject KYC
                    </button>
                </div>
                @else
                <div class="flex gap-4">
                    <a href="{{ route('admin.kyc.index') }}" class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold transition inline-block">
                        Back to KYC List
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white w-full max-w-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Reject KYC</h2>
        <form action="{{ route('admin.kyc.reject', $user->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Rejection Reason</label>
                <textarea name="rejection_reason" rows="4" class="w-full border border-gray-300 p-2 focus:outline-none focus:border-red-500" required placeholder="Please specify why this KYC is being rejected..."></textarea>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold transition">Confirm Reject</button>
                <button type="button" onclick="hideRejectModal()" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold transition">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showRejectModal() {
        document.getElementById('rejectModal').classList.add('flex');
        document.getElementById('rejectModal').classList.remove('hidden');
    }
    
    function hideRejectModal() {
        document.getElementById('rejectModal').classList.remove('flex');
        document.getElementById('rejectModal').classList.add('hidden');
    }
    
    // Close modal when clicking outside
    document.getElementById('rejectModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            hideRejectModal();
        }
    });
</script>

</body>
</html>