@extends('layouts.dashboard')

@section('page-title', 'Deposit Funds')
@section('breadcrumb', 'Add funds to your trading account')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold">Deposit Funds</h1>
                <p class="text-gray-300 mt-1">Add money to your trading account securely</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/20">
                <span class="text-green-400 text-sm font-semibold">💰 Available Balance: ${{ number_format(Auth::user()->balance, 2) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Side - Main Deposit Form -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Amount Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Enter Amount
                    </h2>
                </div>
                <div class="p-6">
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-2xl text-gray-500 font-bold">$</span>
                        <input type="number" 
                               id="depositAmount" 
                               placeholder="0.00" 
                               class="w-full pl-8 pr-4 py-4 text-2xl border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                               oninput="updateAmount()">
                    </div>
                    <div class="flex flex-wrap gap-3 mt-4">
                        <button onclick="setAmount(100)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$100</button>
                        <button onclick="setAmount(250)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$250</button>
                        <button onclick="setAmount(500)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$500</button>
                        <button onclick="setAmount(1000)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$1,000</button>
                        <button onclick="setAmount(5000)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$5,000</button>
                        <button onclick="setAmount(10000)" class="px-4 py-2 text-sm bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">$10,000</button>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Choose your method of payment
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Select a payment method to see instructions</p>
                </div>
                <div class="p-4 space-y-3 max-h-[400px] overflow-y-auto">
                    <!-- Payment Method Options -->
                    @php
                        $paymentMethods = [
                            ['value' => 'solana', 'name' => 'Solana (SOL)', 'icon' => '🟣', 'bg' => 'from-purple-500 to-purple-600', 'desc' => 'Fast and low-cost transactions'],
                            ['value' => 'usdt_erc20', 'name' => 'Tether USD (ERC20)', 'icon' => '🔵', 'bg' => 'from-blue-500 to-blue-600', 'desc' => 'Ethereum network'],
                            ['value' => 'etransfer', 'name' => 'E-Transfer', 'icon' => '🔴', 'bg' => 'from-red-500 to-red-600', 'desc' => 'Instant bank transfer (Canada)'],
                            ['value' => 'paypal', 'name' => 'PayPal', 'icon' => '💙', 'bg' => 'from-blue-400 to-blue-500', 'desc' => 'Send as Family & Friends'],
                            ['value' => 'bank_transfer', 'name' => 'Bank Transfer', 'icon' => '🏦', 'bg' => 'from-gray-500 to-gray-600', 'desc' => 'Wire transfer (1-3 business days)'],
                            ['value' => 'usdt_trc20', 'name' => 'Tether USD (TRC20)', 'icon' => '🟢', 'bg' => 'from-teal-500 to-teal-600', 'desc' => 'TRON network - Low fees'],
                            ['value' => 'ethereum', 'name' => 'Ethereum (ETH)', 'icon' => '💜', 'bg' => 'from-indigo-500 to-indigo-600', 'desc' => 'Smart contract platform'],
                            ['value' => 'bitcoin', 'name' => 'Bitcoin (BTC)', 'icon' => '🟠', 'bg' => 'from-orange-500 to-orange-600', 'desc' => 'World\'s leading cryptocurrency'],
                        ];
                    @endphp

                    @foreach($paymentMethods as $method)
                    <label class="payment-method flex items-center justify-between p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300" data-method="{{ $method['value'] }}">
                        <div class="flex items-center space-x-4">
                            <input type="radio" name="payment_method" value="{{ $method['value'] }}" class="w-5 h-5 text-green-600 focus:ring-green-500" onchange="selectPaymentMethod(this)">
                            <div class="w-12 h-12 bg-gradient-to-br {{ $method['bg'] }} rounded-xl flex items-center justify-center shadow-md">
                                <span class="text-white font-bold text-xl">{{ $method['icon'] }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $method['name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $method['desc'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Min: ${{ $method['value'] == 'etransfer' ? '100' : ($method['value'] == 'paypal' ? '20' : ($method['value'] == 'bank_transfer' ? '500' : '50')) }}</p>
                            <p class="text-xs text-gray-400">Max: ${{ $method['value'] == 'etransfer' ? '10,000' : ($method['value'] == 'paypal' ? '5,000' : '100,000') }}</p>
                        </div>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Sidebar - Payment Instructions -->
        <div class="space-y-6">
            <!-- Payment Instructions Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-6" id="paymentInstructionsCard">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-lg font-bold text-white">Payment Instructions</h2>
                    </div>
                </div>
                <div class="p-6" id="paymentInstructions">
                    <div class="text-center py-8 text-gray-500">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <p>Select a payment method to see instructions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification Styles -->
<style>
    .toast-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }
    .toast {
        min-width: 320px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        margin-bottom: 12px;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        overflow: hidden;
    }
    .toast.show { transform: translateX(0); }
    .toast-success { border-left: 4px solid #10b981; }
    .toast-error { border-left: 4px solid #ef4444; }
    .toast-warning { border-left: 4px solid #f59e0b; }
    .toast-info { border-left: 4px solid #3b82f6; }
    .toast-content { padding: 14px 16px; display: flex; align-items: center; gap: 12px; }
    .toast-icon { flex-shrink: 0; }
    .toast-message { flex: 1; font-size: 14px; color: #1f2937; font-weight: 500; }
    .toast-close { cursor: pointer; color: #9ca3af; transition: color 0.2s; }
    .toast-close:hover { color: #4b5563; }
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
    .sticky { position: sticky; top: 100px; }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button { opacity: 0.5; }
    .file-upload-label:hover { background-color: #f3f4f6; }
</style>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

<script>
    // Toast Notification System
    class Toast {
        constructor() {
            this.container = document.getElementById('toastContainer');
            if (!this.container) {
                this.container = document.createElement('div');
                this.container.id = 'toastContainer';
                this.container.className = 'toast-container';
                document.body.appendChild(this.container);
            }
        }
        
        show(message, type = 'success', duration = 4000) {
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            let icon = '';
            switch(type) {
                case 'success': icon = `<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>`; break;
                case 'error': icon = `<svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>`; break;
                case 'warning': icon = `<svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>`; break;
                case 'info': icon = `<svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`; break;
            }
            toast.innerHTML = `<div class="toast-content"><div class="toast-icon">${icon}</div><div class="toast-message">${message}</div><div class="toast-close" onclick="this.closest('.toast').remove()"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></div></div>`;
            this.container.appendChild(toast);
            setTimeout(() => toast.classList.add('show'), 10);
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease forwards';
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        success(message, duration = 4000) { this.show(message, 'success', duration); }
        error(message, duration = 4000) { this.show(message, 'error', duration); }
        warning(message, duration = 4000) { this.show(message, 'warning', duration); }
        info(message, duration = 4000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    let selectedPaymentMethod = null;
    let currentAmount = 0;

    // Payment methods configuration with addresses
    const paymentConfig = {
        solana: {
            name: 'Solana (SOL)',
            instruction: 'Pay via Solana',
            address: 'iNTTRrsvJU4TMP2k7iGaaSkQJphswRWdJroPSLC4ReK',
            minAmount: 50,
            maxAmount: 50000
        },
        usdt_erc20: {
            name: 'Tether USD (ERC20)',
            instruction: 'Pay via USDT (ERC20)',
            address: '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb8',
            minAmount: 50,
            maxAmount: 100000
        },
        etransfer: {
            name: 'E-Transfer',
            instruction: 'Pay via Interac E-Transfer',
            address: 'deposits@primevest.com',
            minAmount: 100,
            maxAmount: 10000
        },
        paypal: {
            name: 'PayPal',
            instruction: 'Send as Family & Friends',
            address: 'payments@primevest.com',
            minAmount: 20,
            maxAmount: 5000
        },
        bank_transfer: {
            name: 'Bank Transfer',
            instruction: 'Wire Transfer Details',
            address: 'Account: 1234567890\nRouting: 021000021\nBeneficiary: PrimeVest Ltd',
            minAmount: 500,
            maxAmount: 100000
        },
        usdt_trc20: {
            name: 'Tether USD (TRC20)',
            instruction: 'Pay via USDT (TRC20)',
            address: 'TXRqQ8jLnKqWqjJqjLjKjLqWqjJqjLjKjLqWq',
            minAmount: 50,
            maxAmount: 100000
        },
        ethereum: {
            name: 'Ethereum (ETH)',
            instruction: 'Pay via Ethereum',
            address: '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb8',
            minAmount: 100,
            maxAmount: 100000
        },
        bitcoin: {
            name: 'Bitcoin (BTC)',
            instruction: 'Pay via Bitcoin',
            address: 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
            minAmount: 50,
            maxAmount: 100000
        }
    };

    function setAmount(amount) {
        document.getElementById('depositAmount').value = amount;
        updateAmount();
        toast.success(`$${amount} amount selected`);
    }

    function updateAmount() {
        currentAmount = parseFloat(document.getElementById('depositAmount').value) || 0;
        updatePaymentInstructions();
    }

    function selectPaymentMethod(radio) {
        selectedPaymentMethod = radio.value;
        updatePaymentInstructions();
        toast.info(`${paymentConfig[selectedPaymentMethod].name} selected as payment method`);
    }

    function updatePaymentInstructions() {
        const instructionsDiv = document.getElementById('paymentInstructions');
        
        if (!selectedPaymentMethod) {
            instructionsDiv.innerHTML = `
                <div class="text-center py-8 text-gray-500">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <p>Select a payment method to see instructions</p>
                </div>
            `;
            return;
        }

        const config = paymentConfig[selectedPaymentMethod];
        const amount = currentAmount || 0;
        
        instructionsDiv.innerHTML = `
            <div class="space-y-5">
                <!-- Payment Method Header -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">${config.name}</h3>
                    <p class="text-sm text-gray-500">${config.instruction}</p>
                </div>

                <!-- Amount to Pay -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-1">Amount to Pay:</p>
                    <p class="text-3xl font-bold text-green-600">$${amount.toLocaleString()}</p>
                </div>

                <!-- Payment Address -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-2">Payment Address (${selectedPaymentMethod.toUpperCase()}):</p>
                    <div class="flex items-center justify-between gap-2">
                        <code class="text-xs bg-white p-2 rounded border border-gray-200 break-all flex-1 font-mono">${config.address}</code>
                        <button onclick="copyAddress('${config.address}')" class="px-3 py-2 bg-gray-200 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Upload Payment Proof -->
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                    <p class="text-sm text-gray-500 mb-2">Upload Payment Proof:</p>
                    <div class="relative">
                        <input type="file" id="paymentProof" class="hidden" accept="image/*,.pdf,.jpg,.png">
                        <label for="paymentProof" class="flex items-center justify-between w-full px-4 py-3 bg-white border-2 border-dashed border-gray-300 rounded-xl cursor-pointer hover:border-green-500 transition-all duration-300">
                            <span id="fileName" class="text-sm text-gray-500">No file chosen</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm">Browse</span>
                        </label>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Upload screenshot or PDF of your payment transaction</p>
                </div>

                <!-- Submit Button -->
                <button onclick="submitDeposit()" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-500 shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Submit Deposit
                </button>

                <!-- Warning Note -->
                <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-200">
                    <div class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <p class="text-xs text-yellow-700">Please ensure you send the exact amount to the address above. Include your transaction ID in the proof.</p>
                    </div>
                </div>
            </div>
        `;
        
        // Add file input listener
        const fileInput = document.getElementById('paymentProof');
        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'No file chosen';
                document.getElementById('fileName').innerText = fileName;
            });
        }
    }

    function copyAddress(address) {
        navigator.clipboard.writeText(address);
        toast.success('Address copied to clipboard!');
    }

    function submitDeposit() {
        const amount = currentAmount;
        const fileInput = document.getElementById('paymentProof');
        const file = fileInput?.files[0];
        
        if (!amount || amount <= 0) {
            toast.warning('Please enter a valid deposit amount');
            return;
        }
        
        if (!selectedPaymentMethod) {
            toast.warning('Please select a payment method');
            return;
        }
        
        if (!file) {
            toast.warning('Please upload payment proof');
            return;
        }
        
        const config = paymentConfig[selectedPaymentMethod];
        toast.success(`Deposit request submitted! Amount: $${amount.toLocaleString()}`);
        toast.info('Our team will verify your payment within 15-30 minutes', 5000);
        
        // Here you would submit the form data to your backend
        // const formData = new FormData();
        // formData.append('amount', amount);
        // formData.append('method', selectedPaymentMethod);
        // formData.append('proof', file);
    }

    // Update instructions when amount changes
    document.getElementById('depositAmount').addEventListener('input', updateAmount);
</script>
@endsection