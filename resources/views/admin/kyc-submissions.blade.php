<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - KYC Submissions | PrimeVest</title>
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
        
        table {
            min-width: 600px;
        }
        
        .active-tab {
            border-bottom-color: #dc2626 !important;
            color: #dc2626 !important;
        }
        
        .tab-content {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            <h1 class="text-xl font-bold text-gray-900">KYC Submissions</h1>
            <p class="text-sm text-gray-500">Manage and verify user identity documents</p>
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
        <div class="space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white border-l-4 border-yellow-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Pending Verification</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $pendingSubmissions->count() }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-green-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Verified Users</p>
                    <p class="text-3xl font-bold text-green-600">{{ $verifiedSubmissions->count() }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-red-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Rejected</p>
                    <p class="text-3xl font-bold text-red-600">{{ $rejectedSubmissions->count() }}</p>
                </div>
                
                <div class="bg-white border-l-4 border-blue-500 p-6 shadow-sm">
                    <p class="text-gray-500 text-sm">Total Submissions</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $pendingSubmissions->count() + $verifiedSubmissions->count() + $rejectedSubmissions->count() }}</p>
                </div>
            </div>

            <!-- Tabs -->
            <div class="bg-white border border-gray-200 shadow-sm">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px">
                        <button onclick="showTab('pending')" id="tab-pending" class="active-tab px-6 py-3 text-sm font-medium border-b-2 border-red-600 text-red-600">
                            Pending (<span id="pending-count">{{ $pendingSubmissions->count() }}</span>)
                        </button>
                        <button onclick="showTab('verified')" id="tab-verified" class="px-6 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Verified (<span id="verified-count">{{ $verifiedSubmissions->count() }}</span>)
                        </button>
                        <button onclick="showTab('rejected')" id="tab-rejected" class="px-6 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            Rejected (<span id="rejected-count">{{ $rejectedSubmissions->count() }}</span>)
                        </button>
                    </nav>
                </div>

                <!-- Helper functions -->
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
                    
                    function getDocumentTypeLabel($type) {
                        $labels = [
                            'passport' => 'Passport',
                            'national_id' => 'National ID',
                            'drivers_license' => "Driver's License",
                            'voter_card' => 'Voter Card',
                            'nin' => 'NIN (National ID)',
                        ];
                        return $labels[$type] ?? ucfirst(str_replace('_', ' ', $type));
                    }
                @endphp

                <!-- Pending Tab -->
                <div id="pending-tab" class="tab-content">
                    <div class="overflow-x-auto">
                        @if($pendingSubmissions->count() > 0)
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Document Type</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Submitted Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($pendingSubmissions as $submission)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-4 py-3">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $submission->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $submission->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ getDocumentTypeLabel($submission->kyc_document_type ?? 'unknown') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-500">{{ safeFormatDate($submission->kyc_submitted_at) }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700">Pending</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.kyc.view', $submission->id) }}" class="px-3 py-1 bg-red-600 text-white text-sm hover:bg-red-700 transition inline-block">Review</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500">No pending KYC submissions</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Verified Tab -->
                <div id="verified-tab" class="tab-content" style="display: none;">
                    <div class="overflow-x-auto">
                        @if($verifiedSubmissions->count() > 0)
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Document Type</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Verified Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($verifiedSubmissions as $submission)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-4 py-3">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $submission->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $submission->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ getDocumentTypeLabel($submission->kyc_document_type ?? 'unknown') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-500">{{ safeFormatDate($submission->kyc_verified_at, 'M d, Y H:i') }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-green-100 text-green-700">Verified</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-gray-500">No verified submissions yet</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Rejected Tab -->
                <div id="rejected-tab" class="tab-content" style="display: none;">
                    <div class="overflow-x-auto">
                        @if($rejectedSubmissions->count() > 0)
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Document Type</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rejection Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Reason</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($rejectedSubmissions as $submission)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-4 py-3">
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $submission->name }}</div>
                                                <div class="text-sm text-gray-500">{{ $submission->email }}</div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ getDocumentTypeLabel($submission->kyc_document_type ?? 'unknown') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-500">{{ safeFormatDate($submission->updated_at, 'M d, Y H:i') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600 max-w-xs">{{ Str::limit($submission->kyc_rejection_reason ?? 'No reason provided', 50) }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold bg-red-100 text-red-700">Rejected</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <p class="text-gray-500">No rejected submissions</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function showTab(tab) {
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(content => {
            content.style.display = 'none';
        });
        
        // Show selected tab
        document.getElementById(`${tab}-tab`).style.display = 'block';
        
        // Update tab styles
        const tabs = ['pending', 'verified', 'rejected'];
        tabs.forEach(t => {
            const tabButton = document.getElementById(`tab-${t}`);
            if (tabButton) {
                if (t === tab) {
                    tabButton.classList.add('border-red-600', 'text-red-600');
                    tabButton.classList.remove('border-transparent', 'text-gray-500');
                } else {
                    tabButton.classList.remove('border-red-600', 'text-red-600');
                    tabButton.classList.add('border-transparent', 'text-gray-500');
                }
            }
        });
    }
    
    // Set initial active tab
    const hash = window.location.hash.substring(1);
    if (hash === 'verified' || hash === 'rejected') {
        showTab(hash);
    } else {
        showTab('pending');
    }
</script>

</body>
</html>