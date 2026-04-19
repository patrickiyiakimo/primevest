@extends('admin.layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">User Management</h1>
    </div>
    
    <!-- Search -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
        <form method="GET" action="{{ route('admin.users') }}" class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Search</button>
        </form>
    </div>
    
    <!-- Users Table -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Balance</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Joined</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-500">#{{ $user->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-green-600">${{ number_format($user->balance, 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-green-600 hover:text-green-700 font-semibold">Edit Balance</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection