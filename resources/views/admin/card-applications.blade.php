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

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-yellow-50">
            <h2 class="text-lg font-semibold text-yellow-800">Pending Card Applications</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
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
                                <form method="POST" action="{{ route('admin.card-applications.approve', $app) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs">Approve</button>
                                </form>
                                <button onclick="showRejectModal({{ $app->id }})" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-xs">Reject</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            No pending card applications
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

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