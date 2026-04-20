@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold text-gray-900">Deposit Management</h1>
    
    <!-- Pending Deposits -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-yellow-50">
            <h2 class="text-lg font-semibold text-yellow-800">Pending Deposit Requests</h2>
            <p class="text-sm text-yellow-600">Review and process deposit requests</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Method</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Proof</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendingDeposits as $deposit)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">#{{ $deposit->id }}</td>
                        <td class="px-4 py-3 text-sm font-medium">{{ $deposit->user->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $deposit->user->email }}</td>
                        <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($deposit->amount, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ ucfirst($deposit->method) }}</td>
                        <td class="px-4 py-3 text-sm">{{ $deposit->created_at ? $deposit->created_at->format('Y-m-d H:i:s') : 'N/A' }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($deposit->proof_path)
                                <a href="{{ Storage::url($deposit->proof_path) }}" target="_blank" class="text-blue-600 hover:underline">View Proof</a>
                            @else
                                <span class="text-gray-400">No proof</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('admin.deposits.approve', $deposit) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.deposits.reject', $deposit) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 text-xs">Reject</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            No pending deposit requests
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recently Approved Deposits -->
    @if(isset($approvedDeposits) && $approvedDeposits->count() > 0)
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-green-50">
            <h2 class="text-lg font-semibold text-green-800">Recently Approved</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">User</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Amount</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Method</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Approved Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvedDeposits as $deposit)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-3 text-sm">{{ $deposit->user->name }}</td>
                        <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($deposit->amount, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ ucfirst($deposit->method) }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($deposit->approved_at)
                                {{ $deposit->approved_at instanceof \Carbon\Carbon ? $deposit->approved_at->format('Y-m-d H:i') : date('Y-m-d H:i', strtotime($deposit->approved_at)) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection