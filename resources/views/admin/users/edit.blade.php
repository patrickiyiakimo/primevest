@extends('admin.layouts.admin')

@section('admin-content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
            <h1 class="text-xl font-bold text-gray-900">Manage User Balance</h1>
            <p class="text-sm text-gray-500 mt-1">Update balance for {{ $user->name }}</p>
        </div>
        
        <div class="p-6">
            <!-- User Info -->
            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-gray-500">Full Name</p>
                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Email Address</p>
                        <p class="font-semibold text-gray-900">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Current Balance</p>
                        <p class="text-2xl font-bold text-green-600">${{ number_format($user->balance, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Total Profits</p>
                        <p class="text-2xl font-bold text-blue-600">${{ number_format($user->total_profits ?? 0, 2) }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Balance Adjustment Form -->
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Transaction Type</label>
                        <div class="grid md:grid-cols-3 gap-4">
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                                <input type="radio" name="transaction_type" value="credit" class="w-5 h-5 text-green-600" checked onchange="updateTransactionType()">
                                <span class="ml-3 font-semibold text-gray-700">Credit (Add Balance)</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                                <input type="radio" name="transaction_type" value="debit" class="w-5 h-5 text-red-600" onchange="updateTransactionType()">
                                <span class="ml-3 font-semibold text-gray-700">Debit (Deduct Balance)</span>
                            </label>
                            <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                                <input type="radio" name="transaction_type" value="profit" class="w-5 h-5 text-blue-600" onchange="updateTransactionType()">
                                <span class="ml-3 font-semibold text-gray-700">Add Profit</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Amount</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-bold">$</span>
                            <input type="number" name="amount" id="amount" step="0.01" min="0.01" required class="w-full pl-8 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="0.00">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description / Reason</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Enter reason for this transaction..."></textarea>
                    </div>
                    
                    <div id="newBalancePreview" class="bg-gray-50 rounded-xl p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">New Balance After Transaction:</span>
                            <span class="text-2xl font-bold text-green-600" id="newBalance">${{ number_format($user->balance, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="flex gap-4">
                        <button type="submit" class="flex-1 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl transition-all duration-300">
                            Process Transaction
                        </button>
                        <a href="{{ route('admin.users') }}" class="flex-1 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition-all duration-300 text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const currentBalance = {{ $user->balance }};
    const currentProfits = {{ $user->total_profits ?? 0 }};
    
    function updateTransactionType() {
        const amountInput = document.getElementById('amount');
        const newBalanceSpan = document.getElementById('newBalance');
        const amount = parseFloat(amountInput.value) || 0;
        const transactionType = document.querySelector('input[name="transaction_type"]:checked').value;
        
        let newBalance = currentBalance;
        if (transactionType === 'credit') {
            newBalance = currentBalance + amount;
        } else if (transactionType === 'debit') {
            newBalance = currentBalance - amount;
        } else {
            // Profit doesn't affect balance
            newBalance = currentBalance;
        }
        
        newBalanceSpan.innerText = '$' + newBalance.toFixed(2);
        
        // Color coding
        if (transactionType === 'credit') {
            newBalanceSpan.className = 'text-2xl font-bold text-green-600';
        } else if (transactionType === 'debit') {
            newBalanceSpan.className = 'text-2xl font-bold text-red-600';
        } else {
            newBalanceSpan.className = 'text-2xl font-bold text-blue-600';
        }
    }
    
    document.getElementById('amount').addEventListener('input', updateTransactionType);
</script>
@endsection