@extends('admin.layouts.admin')

@section('page-title', 'User Stock Portfolios')
@section('breadcrumb', 'View all users stock holdings and manage their P&L')

@section('admin-content')
<div class="space-y-6">
    <!-- Summary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @php
            $totalUsers = count($portfolioData);
            $totalInvestedSum = array_sum(array_column($portfolioData, 'total_invested'));
            $totalCurrentValueSum = array_sum(array_column($portfolioData, 'total_current_value'));
            $totalProfitLossSum = array_sum(array_column($portfolioData, 'total_profit_loss'));
        @endphp
        
        <div class="bg-white border-l-4 border-blue-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total Users with Holdings</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white border-l-4 border-green-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total Invested (All Users)</p>
            <p class="text-2xl font-bold text-green-600">${{ number_format($totalInvestedSum, 2) }}</p>
        </div>
        <div class="bg-white border-l-4 border-purple-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total Current Value</p>
            <p class="text-2xl font-bold text-purple-600">${{ number_format($totalCurrentValueSum, 2) }}</p>
        </div>
        <div class="bg-white border-l-4 border-yellow-500 p-6 shadow-sm">
            <p class="text-gray-500 text-sm">Total P/L</p>
            <p class="text-2xl font-bold {{ $totalProfitLossSum >= 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $totalProfitLossSum >= 0 ? '+' : '' }}${{ number_format($totalProfitLossSum, 2) }}
            </p>
        </div>
    </div>

    <!-- Users with Stock Holdings -->
    @forelse($portfolioData as $index => $data)
    <div class="bg-white border border-gray-200 shadow-sm overflow-hidden" id="user-{{ $index }}">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ $data['user']->name ?? 'Unknown User' }}
                    </h2>
                    <p class="text-sm text-gray-500">{{ $data['user']->email ?? 'No email' }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">Total Value: <span class="font-bold text-green-600" id="total-value-{{ $index }}">${{ number_format($data['total_current_value'], 2) }}</span></p>
                    <p class="text-sm text-gray-500">P/L: <span class="font-bold {{ $data['total_profit_loss'] >= 0 ? 'text-green-600' : 'text-red-600' }}" id="total-pl-{{ $index }}">{{ $data['total_profit_loss'] >= 0 ? '+' : '' }}${{ number_format($data['total_profit_loss'], 2) }}</span></p>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Symbol</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Company</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Quantity</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Avg Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Current Price</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Invested</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Current Value</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase">P/L</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($data['holdings'] as $holdingIndex => $holding)
                    <tr class="hover:bg-gray-50" id="holding-{{ $index }}-{{ $holdingIndex }}">
                        <td class="px-4 py-3 font-bold text-gray-900">{{ $holding['symbol'] }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $holding['company_name'] }}</td>
                        <td class="px-4 py-3 text-right text-gray-900">{{ number_format($holding['quantity'], 4) }}</td>
                        <td class="px-4 py-3 text-right text-gray-900">${{ number_format($holding['avg_price'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-green-600" id="current-price-{{ $index }}-{{ $holdingIndex }}">${{ number_format($holding['current_price'], 2) }}</td>
                        <td class="px-4 py-3 text-right text-gray-600">${{ number_format($holding['invested'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-blue-600" id="current-value-{{ $index }}-{{ $holdingIndex }}">${{ number_format($holding['current_value'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-semibold {{ $holding['profit_loss'] >= 0 ? 'text-green-600' : 'text-red-600' }}" id="pl-{{ $index }}-{{ $holdingIndex }}">
                            {{ $holding['profit_loss'] >= 0 ? '+' : '' }}${{ number_format($holding['profit_loss'], 2) }}
                            <br>
                            <span class="text-xs">{{ $holding['profit_loss_percent'] >= 0 ? '+' : '' }}{{ number_format($holding['profit_loss_percent'], 2) }}%</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <button onclick="openPriceModal('{{ $holding['symbol'] }}', '{{ $index }}', '{{ $holdingIndex }}', {{ $holding['current_price'] }})" 
                                    class="px-3 py-1 bg-blue-600 text-white text-xs hover:bg-blue-700 transition">
                                Update Price
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-100 border-t border-gray-200">
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-right font-bold text-gray-900">Totals:</td>
                        <td class="px-4 py-3 text-right font-bold text-gray-900">${{ number_format($data['total_invested'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-bold text-gray-900" id="user-total-value-{{ $index }}">${{ number_format($data['total_current_value'], 2) }}</td>
                        <td class="px-4 py-3 text-right font-bold {{ $data['total_profit_loss'] >= 0 ? 'text-green-600' : 'text-red-600' }}" id="user-total-pl-{{ $index }}">
                            {{ $data['total_profit_loss'] >= 0 ? '+' : '' }}${{ number_format($data['total_profit_loss'], 2) }}
                            ({{ $data['profit_loss_percent'] >= 0 ? '+' : '' }}{{ number_format($data['profit_loss_percent'], 2) }}%)
                        </td>
                        <td class="px-4 py-3 text-center"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @empty
    <div class="bg-white border border-gray-200 text-center py-12">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
        </svg>
        <p class="text-gray-500">No users have stock holdings yet.</p>
        <p class="text-sm text-gray-400 mt-2">Users need to buy stocks to appear here.</p>
    </div>
    @endforelse
</div>

<!-- Modal for updating stock price -->
<div id="priceModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="bg-white w-full max-w-md">
        <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
            <h3 class="text-lg font-semibold text-gray-900">Update Stock Price</h3>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Stock Symbol</label>
                <input type="text" id="modalSymbol" class="w-full px-3 py-2 border border-gray-200 bg-gray-100" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">New Price ($)</label>
                <input type="number" id="modalPrice" step="0.01" class="w-full px-3 py-2 border border-gray-200 focus:border-blue-500 focus:outline-none">
            </div>
            <div class="flex gap-3">
                <button onclick="updateStockPrice()" class="px-4 py-2 bg-green-600 text-white hover:bg-green-700 transition">Update Price</button>
                <button onclick="closePriceModal()" class="px-4 py-2 bg-gray-300 text-gray-700 hover:bg-gray-400 transition">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-4 right-4 z-50 hidden">
    <div class="bg-green-600 text-white px-5 py-3 shadow-lg flex items-center gap-3">
        <span class="font-bold text-lg">✓</span>
        <span id="toastMessage">Success</span>
    </div>
</div>

<script>
    let currentContext = {
        symbol: null,
        userId: null,
        holdingId: null,
        oldPrice: null
    };

    function openPriceModal(symbol, userId, holdingId, currentPrice) {
        currentContext = {
            symbol: symbol,
            userId: userId,
            holdingId: holdingId,
            oldPrice: currentPrice
        };
        
        document.getElementById('modalSymbol').value = symbol;
        document.getElementById('modalPrice').value = currentPrice;
        document.getElementById('priceModal').classList.remove('hidden');
        document.getElementById('priceModal').classList.add('flex');
    }

    function closePriceModal() {
        document.getElementById('priceModal').classList.add('hidden');
        document.getElementById('priceModal').classList.remove('flex');
        currentContext = { symbol: null, userId: null, holdingId: null, oldPrice: null };
    }

    function showToast(message, isError = false) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        const toastDiv = toast.querySelector('div');
        
        toastMessage.innerText = message;
        
        if (isError) {
            toastDiv.classList.remove('bg-green-600');
            toastDiv.classList.add('bg-red-600');
            toast.querySelector('span:first-child').innerHTML = '✗';
        } else {
            toastDiv.classList.remove('bg-red-600');
            toastDiv.classList.add('bg-green-600');
            toast.querySelector('span:first-child').innerHTML = '✓';
        }
        
        toast.classList.remove('hidden');
        toast.classList.add('block');
        
        setTimeout(() => {
            toast.classList.add('hidden');
            toast.classList.remove('block');
        }, 3000);
    }

    function updateStockPrice() {
        const newPrice = parseFloat(document.getElementById('modalPrice').value);
        
        if (!newPrice || newPrice <= 0) {
            showToast('Please enter a valid price', true);
            return;
        }
        
        fetch('{{ route("admin.stock.prices.update") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                symbol: currentContext.symbol,
                price: newPrice
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the UI with new calculations
                updateHoldingInUI(currentContext.userId, currentContext.holdingId, newPrice);
                showToast(data.message);
                closePriceModal();
                
                // Reload page after 1 second to refresh all calculations
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                showToast(data.message || 'Update failed', true);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Failed to update price', true);
        });
    }

    function updateHoldingInUI(userId, holdingId, newPrice) {
        // Get the holding elements
        const priceElement = document.getElementById(`current-price-${userId}-${holdingId}`);
        const valueElement = document.getElementById(`current-value-${userId}-${holdingId}`);
        const plElement = document.getElementById(`pl-${userId}-${holdingId}`);
        
        if (priceElement && valueElement && plElement) {
            // Get the quantity and average price from the table
            const row = document.getElementById(`holding-${userId}-${holdingId}`);
            if (row) {
                const quantityText = row.querySelector('td:nth-child(3)').innerText;
                const quantity = parseFloat(quantityText.replace(/,/g, ''));
                const avgPriceText = row.querySelector('td:nth-child(4)').innerText;
                const avgPrice = parseFloat(avgPriceText.replace('$', '').replace(/,/g, ''));
                
                // Calculate new values
                const newCurrentValue = quantity * newPrice;
                const newProfitLoss = newCurrentValue - (quantity * avgPrice);
                const newProfitLossPercent = (newProfitLoss / (quantity * avgPrice)) * 100;
                
                // Update the UI
                priceElement.innerText = `$${newPrice.toFixed(2)}`;
                valueElement.innerText = `$${newCurrentValue.toFixed(2)}`;
                plElement.innerHTML = `${newProfitLoss >= 0 ? '+' : ''}$${newProfitLoss.toFixed(2)}<br><span class="text-xs">${newProfitLossPercent >= 0 ? '+' : ''}${newProfitLossPercent.toFixed(2)}%</span>`;
                
                // Update color based on profit/loss
                if (newProfitLoss >= 0) {
                    plElement.classList.add('text-green-600');
                    plElement.classList.remove('text-red-600');
                } else {
                    plElement.classList.add('text-red-600');
                    plElement.classList.remove('text-green-600');
                }
                
                // Update user totals
                updateUserTotals(userId);
            }
        }
    }
    
    function updateUserTotals(userId) {
        const userSection = document.getElementById(`user-${userId}`);
        if (!userSection) return;
        
        let totalCurrentValue = 0;
        let totalInvested = 0;
        
        // Get all holdings in this user section
        const holdings = userSection.querySelectorAll(`tbody tr`);
        holdings.forEach(row => {
            const valueText = row.querySelector('td:nth-child(7)').innerText;
            const investedText = row.querySelector('td:nth-child(6)').innerText;
            
            const currentValue = parseFloat(valueText.replace('$', '').replace(/,/g, ''));
            const invested = parseFloat(investedText.replace('$', '').replace(/,/g, ''));
            
            totalCurrentValue += currentValue;
            totalInvested += invested;
        });
        
        const totalProfitLoss = totalCurrentValue - totalInvested;
        const profitLossPercent = totalInvested > 0 ? (totalProfitLoss / totalInvested) * 100 : 0;
        
        // Update user totals in UI
        const userTotalValue = document.getElementById(`user-total-value-${userId}`);
        const userTotalPL = document.getElementById(`user-total-pl-${userId}`);
        const totalValueSpan = document.getElementById(`total-value-${userId}`);
        const totalPLSpan = document.getElementById(`total-pl-${userId}`);
        
        if (userTotalValue) userTotalValue.innerText = `$${totalCurrentValue.toFixed(2)}`;
        if (userTotalPL) {
            userTotalPL.innerHTML = `${totalProfitLoss >= 0 ? '+' : ''}$${totalProfitLoss.toFixed(2)} (${totalProfitLoss >= 0 ? '+' : ''}${profitLossPercent.toFixed(2)}%)`;
            if (totalProfitLoss >= 0) {
                userTotalPL.classList.add('text-green-600');
                userTotalPL.classList.remove('text-red-600');
            } else {
                userTotalPL.classList.add('text-red-600');
                userTotalPL.classList.remove('text-green-600');
            }
        }
        if (totalValueSpan) totalValueSpan.innerText = `$${totalCurrentValue.toFixed(2)}`;
        if (totalPLSpan) {
            totalPLSpan.innerText = `${totalProfitLoss >= 0 ? '+' : ''}$${totalProfitLoss.toFixed(2)}`;
            if (totalProfitLoss >= 0) {
                totalPLSpan.classList.add('text-green-600');
                totalPLSpan.classList.remove('text-red-600');
            } else {
                totalPLSpan.classList.add('text-red-600');
                totalPLSpan.classList.remove('text-green-600');
            }
        }
    }

    // Close modal when clicking outside
    document.getElementById('priceModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closePriceModal();
        }
    });
</script>

<style>
    .bg-white, .border, button, a {
        border-radius: 0 !important;
    }
    * {
        border-radius: 0 !important;
    }
</style>
@endsection