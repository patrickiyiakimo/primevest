@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Card Applications</h1>
            <p class="text-sm text-gray-500 mt-1">Review and process card applications</p>
        </div>
        <div class="bg-yellow-50 px-4 py-2 rounded-xl">
            <span class="text-yellow-600 font-semibold">Pending: {{ $totalPending }}</span>
        </div>
    </div>

    <!-- Pending Applications -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-yellow-50">
            <h2 class="text-lg font-semibold text-yellow-800">Pending Card Applications</h2>
            <p class="text-sm text-yellow-600">Applications awaiting review</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-[1000px] w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Card Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tier</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Phone</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Address</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingApplications as $app)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">#{{ $app->id }}</td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $app->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $app->user->email }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold uppercase">{{ $app->card_type }}</td>
                        <td class="px-4 py-3 text-sm capitalize">{{ $app->card_tier }}</td>
                        <td class="px-4 py-3 text-sm">{{ $app->phone }}</td>
                        <td class="px-4 py-3 text-sm max-w-xs truncate">{{ substr($app->delivery_address, 0, 30) }}...</td>
                        <td class="px-4 py-3 text-sm">{{ $app->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <button onclick="approveApplication({{ $app->id }})" class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs">Approve</button>
                                <button onclick="showRejectModal({{ $app->id }})" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-xs">Reject</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <p>No pending card applications</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Approved Applications -->
    @if($approvedApplications->count() > 0)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-green-50">
            <h2 class="text-lg font-semibold text-green-800">Approved Applications</h2>
            <p class="text-sm text-green-600">Cards that have been approved and are being processed</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-[1000px] w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Card Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tier</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Approved Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedApplications as $app)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">#{{ $app->id }}</td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $app->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $app->user->email }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold uppercase">{{ $app->card_type }}</td>
                        <td class="px-4 py-3 text-sm capitalize">{{ $app->card_tier }}</td>
                        <td class="px-4 py-3 text-sm">{{ $app->approved_at ? $app->approved_at->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                                Approved
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Rejected Applications -->
    @if(isset($rejectedApplications) && $rejectedApplications->count() > 0)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-red-50">
            <h2 class="text-lg font-semibold text-red-800">Rejected Applications</h2>
            <p class="text-sm text-red-600">Applications that have been declined</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-[1000px] w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Card Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Tier</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Reason</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Rejected Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rejectedApplications as $app)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">#{{ $app->id }}</td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $app->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $app->user->email }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold uppercase">{{ $app->card_type }}</td>
                        <td class="px-4 py-3 text-sm capitalize">{{ $app->card_tier }}</td>
                        <td class="px-4 py-3 text-sm max-w-xs truncate">{{ $app->admin_notes ?? 'No reason provided' }}</td>
                        <td class="px-4 py-3 text-sm">{{ $app->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Reject Card Application</h3>
        <p class="text-gray-600 mb-4">Please provide a reason for rejecting this application.</p>
        <form id="rejectForm" method="POST">
            @csrf
            <textarea name="admin_notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Reason for rejection..."></textarea>
            <div class="flex gap-3 mt-4">
                <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Reject</button>
                <button type="button" onclick="closeRejectModal()" class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function approveApplication(id) {
        if (confirm('Are you sure you want to approve this card application?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/card-applications/${id}/approve`;
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }
    }
    
    function showRejectModal(id) {
        const modal = document.getElementById('rejectModal');
        const form = document.getElementById('rejectForm');
        form.action = `/admin/card-applications/${id}/reject`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }
    
    function closeRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection