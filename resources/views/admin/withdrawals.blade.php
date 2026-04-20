@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Withdrawal Management</h1>
            <p class="text-sm text-gray-500 mt-1">Review and process withdrawal requests</p>
        </div>
        <div class="flex gap-3">
            <div class="bg-yellow-50 px-4 py-2 rounded-xl">
                <span class="text-yellow-600 font-semibold">Pending: ${{ number_format($totalPending, 2) }}</span>
            </div>
            <div class="bg-green-50 px-4 py-2 rounded-xl">
                <span class="text-green-600 font-semibold">Approved: ${{ number_format($totalApproved, 2) }}</span>
            </div>
        </div>
    </div>

    <!-- Pending Withdrawals -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-yellow-50">
            <h2 class="text-lg font-semibold text-yellow-800">Pending Withdrawal Requests</h2>
            <p class="text-sm text-yellow-600">Review and process withdrawal requests</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Method</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Wallet Address</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Network</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingWithdrawals as $withdrawal)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">#{{ $withdrawal->id }}</td>
                        <td class="px-4 py-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $withdrawal->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $withdrawal->user->email }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold text-red-600">${{ number_format($withdrawal->amount, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ ucfirst($withdrawal->method) }}</td>
                        <td class="px-4 py-3 text-sm font-mono">{{ substr($withdrawal->wallet_address, 0, 20) }}...</td>
                        <td class="px-4 py-3 text-sm">{{ $withdrawal->network }}</td>
                        <td class="px-4 py-3 text-sm">{{ $withdrawal->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <button onclick="approveWithdrawal({{ $withdrawal->id }}, {{ $withdrawal->amount }})" class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs">Approve</button>
                                <button onclick="showRejectModal({{ $withdrawal->id }})" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-xs">Reject</button>
                            </div>
                        </td>
                     </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            No pending withdrawal requests
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Approved Withdrawals -->
    @if($approvedWithdrawals->count() > 0)
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-green-50">
            <h2 class="text-lg font-semibold text-green-800">Recently Approved</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Method</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Approved Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedWithdrawals as $withdrawal)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-3 text-sm">{{ $withdrawal->user->name }}</td>
                        <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($withdrawal->amount, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ ucfirst($withdrawal->method) }}</td>
                        <td class="px-4 py-3 text-sm">{{ $withdrawal->approved_at ? $withdrawal->approved_at->format('Y-m-d H:i') : 'N/A' }}</td>
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
        <h3 class="text-xl font-bold text-gray-900 mb-4">Reject Withdrawal Request</h3>
        <p class="text-gray-600 mb-4">Please provide a reason for rejecting this withdrawal request.</p>
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
    function approveWithdrawal(id, amount) {
        if (confirm(`Are you sure you want to approve this withdrawal of $${amount.toLocaleString()}?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/withdrawals/${id}/approve`;
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }
    }
    
    function showRejectModal(id) {
        const modal = document.getElementById('rejectModal');
        const form = document.getElementById('rejectForm');
        form.action = `/admin/withdrawals/${id}/reject`;
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