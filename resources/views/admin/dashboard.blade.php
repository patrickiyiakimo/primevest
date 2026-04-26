@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6">
            <p class="text-gray-500 text-sm">Total Users</p>
            <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
        </div>
        
        <div class="bg-white rounded-2xl p-6">
            <p class="text-gray-500 text-sm">Total Balance</p>
            <p class="text-3xl font-bold text-green-600">${{ number_format($totalBalance, 2) }}</p>
        </div>
        
        <div class="bg-white rounded-2xl p-6">
            <p class="text-gray-500 text-sm">Pending Deposits</p>
            <p class="text-3xl font-bold text-yellow-600">{{ $pendingDepositsCount }}</p>
        </div>
        
        <div class="bg-white rounded-2xl p-6">
            <p class="text-gray-500 text-sm">Total Deposits</p>
            <p class="text-3xl font-bold text-blue-600">${{ number_format($totalDepositsAmount, 2) }}</p>
        </div>
    </div>

    <!-- Pending Deposit Requests -->
    <!-- <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-yellow-50">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-yellow-800">Pending Deposit Requests</h2>
                <a href="{{ route('admin.deposits') }}" class="text-sm text-yellow-600 hover:text-yellow-700">View All →</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">User</th>
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
                        <td class="px-4 py-3 text-sm">
                            {{ $deposit->user->name }}<br>
                            <span class="text-xs text-gray-500">{{ $deposit->user->email }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($deposit->amount, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ ucfirst($deposit->method) }}</td>
                        <td class="px-4 py-3 text-sm">{{ $deposit->created_at->format('Y-m-d H:i') }}</td>
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
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            No pending deposit requests
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> -->

    <!-- Recent Users -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Recent Users</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Balance</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Joined</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentUsers as $user)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-sm font-semibold text-green-600">${{ number_format($user->balance, 2) }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600 hover:text-green-700">Manage</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection