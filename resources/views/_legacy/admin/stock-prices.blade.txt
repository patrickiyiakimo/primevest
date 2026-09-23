@extends('admin.layouts.admin')

@section('page-title', 'Stock Price Management')
@section('breadcrumb', 'Update stock prices to calculate user P&L')

@section('admin-content')
<div class="bg-white border border-gray-200">
    <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
        <h2 class="text-lg font-semibold text-gray-900">Stock Price Management</h2>
        <p class="text-sm text-gray-500 mt-1">Update stock prices to automatically recalculate all user portfolio values and P&L</p>
    </div>
    
    <div class="p-6">
        @php
            $stocks = [
                'AAPL' => 'Apple Inc.',
                'MSFT' => 'Microsoft Corp',
                'GOOGL' => 'Alphabet Inc.',
                'AMZN' => 'Amazon.com Inc',
                'TSLA' => 'Tesla, Inc.',
                'NVDA' => 'NVIDIA Corp',
                'META' => 'Meta Platforms',
                'NFLX' => 'Netflix Inc.',
            ];
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            @foreach($stocks as $symbol => $name)
            <div class="border border-gray-200 p-4 hover:shadow-md transition">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-bold text-lg text-gray-900">{{ $symbol }}</h3>
                    <span class="text-xs text-gray-500">{{ $name }}</span>
                </div>
                <div class="flex gap-2">
                    <input type="number" id="price_{{ $symbol }}" step="0.01" value="{{ $currentPrices[$symbol] ?? 100 }}" class="w-full px-3 py-2 border border-gray-200 focus:border-green-500 focus:outline-none text-sm">
                    <button onclick="updateStockPrice('{{ $symbol }}')" class="px-4 py-2 bg-green-600 text-white text-sm hover:bg-green-700 transition whitespace-nowrap">
                        Update
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="border-t border-gray-200 pt-6 mt-4">
            <div class="flex gap-4">
                <button onclick="updateAllPrices()" class="px-6 py-2 bg-blue-600 text-white hover:bg-blue-700 transition">
                    Update All Prices
                </button>
                <button onclick="resetToDefault()" class="px-6 py-2 bg-gray-600 text-white hover:bg-gray-700 transition">
                    Reset to Default
                </button>
            </div>
            <p class="text-xs text-gray-400 mt-3">
                Note: Updating stock prices will automatically recalculate all user portfolio values and profit/loss.
            </p>
        </div>
    </div>
</div>

<script>
function updateStockPrice(symbol) {
    const price = document.getElementById(`price_${symbol}`).value;
    if (!price || price <= 0) {
        alert('Please enter a valid price');
        return;
    }
    
    fetch('{{ route("admin.stock.prices.update") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ symbol: symbol, price: price })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
        } else {
            alert('Update failed');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Update failed');
    });
}

function updateAllPrices() {
    const prices = {};
    const symbols = ['AAPL', 'MSFT', 'GOOGL', 'AMZN', 'TSLA', 'NVDA', 'META', 'NFLX'];
    
    symbols.forEach(symbol => {
        const price = document.getElementById(`price_${symbol}`).value;
        if (price && price > 0) {
            prices[symbol] = price;
        }
    });
    
    fetch('{{ route("admin.stock.prices.update-all") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ prices: prices })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
        }
    });
}

function resetToDefault() {
    const defaultPrices = {
        'AAPL': 175.50,
        'MSFT': 420.75,
        'GOOGL': 140.25,
        'AMZN': 145.80,
        'TSLA': 245.50,
        'NVDA': 895.20,
        'META': 485.30,
        'NFLX': 620.40
    };
    
    for (const [symbol, price] of Object.entries(defaultPrices)) {
        document.getElementById(`price_${symbol}`).value = price;
        updateStockPrice(symbol);
    }
}
</script>
@endsection