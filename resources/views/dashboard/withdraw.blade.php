@extends('layouts.dashboard')

@section('page-title', 'Withdraw Funds')
@section('breadcrumb', 'Request a withdrawal from your account')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="border-l-4 border-green-600 shadow-md p-6 bg-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Withdraw Funds</h1>
                <p class="text-gray-500 mt-1">Request a withdrawal from your trading account</p>
            </div>
            <div class="bg-green-50 border border-green-200 px-5 py-2.5">
                <span class="text-green-600 text-sm font-semibold">💰 Available Balance: $<span id="userBalanceDisplay">{{ number_format(Auth::user()->balance, 2) }}</span></span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Side - Payment Methods -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Choose Your Preferred Payment Method</h2>
                    </div>
                </div>
                <div class="p-4 space-y-3">
                    <!-- Tether USD (TRC20) -->
                    <div class="payment-option cursor-pointer transition-all duration-300" data-method="usdt_trc20">
                        <div class="flex items-center justify-between p-4 border-2 border-gray-200 hover:border-green-500 transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-teal-600 flex items-center justify-center shadow-sm">
                                    <span class="text-white font-bold text-sm">USDT</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Tether USD (TRC20)</p>
                                    <p class="text-xs text-gray-500">TRON Network</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">Min: $1,000</p>
                                <p class="text-xs text-gray-400">Max: $500,000</p>
                                <p class="text-xs text-green-600">0% fee</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ethereum (ERC20) -->
                    <div class="payment-option cursor-pointer transition-all duration-300" data-method="ethereum">
                        <div class="flex items-center justify-between p-4 border-2 border-gray-200 hover:border-green-500 transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-indigo-600 flex items-center justify-center shadow-sm">
                                    <span class="text-white font-bold text-sm">ETH</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Ethereum (ERC20)</p>
                                    <p class="text-xs text-gray-500">Ethereum Network</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">Min: $1,000</p>
                                <p class="text-xs text-gray-400">Max: $500,000</p>
                                <p class="text-xs text-green-600">0% fee</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bitcoin (BTC) -->
                    <div class="payment-option cursor-pointer transition-all duration-300" data-method="bitcoin">
                        <div class="flex items-center justify-between p-4 border-2 border-gray-200 hover:border-green-500 transition-all duration-300">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-orange-600 flex items-center justify-center shadow-sm">
                                    <span class="text-white font-bold text-sm">BTC</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Bitcoin (BTC)</p>
                                    <p class="text-xs text-gray-500">Bitcoin Network</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">Min: $1,000</p>
                                <p class="text-xs text-gray-400">Max: $500,000</p>
                                <p class="text-xs text-green-600">0% fee</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account Summary -->
            <div class="bg-green-50 p-5 border border-green-200">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm text-green-700">Available Balance</span>
                    <span class="text-2xl font-bold text-green-600" id="accountBalanceSummary">${{ number_format(Auth::user()->balance, 2) }}</span>
                </div>
                <div class="border-t border-green-200 pt-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-green-700">Pending Withdrawals</span>
                        <span class="text-green-800 font-semibold" id="pendingWithdrawals">$0.00</span>
                    </div>
                    <div class="flex justify-between text-sm mt-1">
                        <span class="text-green-700">Withdrawal Limit (24h)</span>
                        <span class="text-green-800 font-semibold">$50,000</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Withdrawal Form -->
        <div class="lg:col-span-2">
            <div class="bg-white border border-gray-200 shadow-sm overflow-hidden" id="withdrawalForm">
                <!-- Dynamic form will be loaded here -->
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <p class="text-gray-500">Select a payment method to continue</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-50"></div>

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
            const colors = {
                success: 'bg-green-600',
                error: 'bg-red-600',
                warning: 'bg-yellow-600',
                info: 'bg-blue-600'
            };
            const icons = {
                success: '✓',
                error: '✗',
                warning: '⚠',
                info: 'ℹ'
            };
            
            toast.className = `${colors[type]} text-white px-5 py-3 shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 4000) { this.show(message, 'success', duration); }
        error(message, duration = 4000) { this.show(message, 'error', duration); }
        warning(message, duration = 4000) { this.show(message, 'warning', duration); }
        info(message, duration = 4000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    let selectedMethod = null;
    
    // Function to fetch spendable balance from server
    async function fetchSpendableBalance() {
        try {
            const response = await fetch('/user/balance');
            const data = await response.json();
            if (data.success) {
                const newBalance = data.balance;
                document.getElementById('userBalanceDisplay').innerText = newBalance.toFixed(2);
                document.getElementById('accountBalanceSummary').innerText = '$' + newBalance.toFixed(2);
                return newBalance;
            }
        } catch (error) {
            console.error('Error fetching balance:', error);
        }
        return parseFloat(document.getElementById('userBalanceDisplay').innerText.replace(/,/g, ''));
    }
    
    // Get initial balance (this will be updated by API call)
    let userBalance = parseFloat({{ Auth::user()->balance }});

    // Payment methods configuration
    const paymentMethods = {
        usdt_trc20: {
            name: 'Tether USD (TRC20)',
            network: 'TRON Network',
            icon: 'USDT',
            minAmount: 1000,
            maxAmount: 500000,
            fee: 0,
            bgColor: 'teal'
        },
        ethereum: {
            name: 'Ethereum (ERC20)',
            network: 'Ethereum Network',
            icon: 'ETH',
            minAmount: 1000,
            maxAmount: 500000,
            fee: 0,
            bgColor: 'indigo'
        },
        bitcoin: {
            name: 'Bitcoin (BTC)',
            network: 'Bitcoin Network',
            icon: 'BTC',
            minAmount: 1000,
            maxAmount: 500000,
            fee: 0,
            bgColor: 'orange'
        }
    };

    // Payment option click handlers
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', async function() {
            // Fetch latest spendable balance before loading form
            userBalance = await fetchSpendableBalance();
            
            // Remove selected class from all options
            document.querySelectorAll('.payment-option .border-2').forEach(opt => {
                opt.classList.remove('border-green-500', 'bg-green-50');
                opt.classList.add('border-gray-200');
            });
            
            // Add selected class to clicked option
            const innerDiv = this.querySelector('.border-2');
            innerDiv.classList.remove('border-gray-200');
            innerDiv.classList.add('border-green-500', 'bg-green-50');
            
            selectedMethod = this.dataset.method;
            loadWithdrawalForm(selectedMethod);
        });
    });

    function loadWithdrawalForm(method) {
        const config = paymentMethods[method];
        const formContainer = document.getElementById('withdrawalForm');
        const maxAmount = Math.min(config.maxAmount, userBalance);
        
        formContainer.innerHTML = `
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-800 flex items-center justify-center">
                        <span class="text-white font-bold text-lg">${config.icon}</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">${config.name}</h2>
                        <p class="text-gray-500 text-sm">${config.network}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <form id="withdrawForm" method="POST" action="{{ route('withdraw.request') }}">
                    @csrf
                    <input type="hidden" name="method" value="${method}">
                    
                    <div class="space-y-5">
                        <!-- Enter Amount -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Enter Amount (USD)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 font-bold text-lg">$</span>
                                </div>
                                <input type="number" 
                                       name="amount" 
                                       id="withdrawAmount" 
                                       class="w-full pl-8 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                       placeholder="0.00"
                                       min="${config.minAmount}"
                                       max="${maxAmount}"
                                       oninput="updateWithdrawSummary()"
                                       required>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Min: $${config.minAmount.toLocaleString()}, Max: $${maxAmount.toLocaleString()}</p>
                        </div>
                        
                        <!-- Wallet Address -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Wallet Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <input type="text" 
                                       name="wallet_address" 
                                       class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 focus:outline-none focus:border-green-500 transition-all duration-300"
                                       placeholder="Enter your ${config.name} wallet address"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Network -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Network</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                </div>
                                <input type="text" 
                                       name="network" 
                                       value="${config.network}"
                                       class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 bg-gray-50 text-gray-600"
                                       readonly>
                            </div>
                        </div>
                        
                        <!-- Withdrawal Summary -->
                        <div class="bg-gray-50 p-4 border border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-3">Withdrawal Summary</h3>
                            <div class="space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Withdrawal Amount:</span>
                                    <span class="font-semibold text-gray-800" id="summaryAmount">$0.00</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Processing Fee (${config.fee}%):</span>
                                    <span class="font-semibold text-gray-800" id="summaryFee">$0.00</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-800">Total Deducted:</span>
                                        <span class="font-bold text-green-600 text-lg" id="summaryTotal">$0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Minimum/Maximum Info -->
                        <div class="bg-yellow-50 p-3 border border-yellow-200">
                            <div class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-yellow-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <p class="text-xs text-yellow-700">Minimum: $${config.minAmount.toLocaleString()} | Maximum: $${maxAmount.toLocaleString()}</p>
                                    <p class="text-xs text-yellow-700 mt-1">Charges: ${config.fee}% processing fee</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-3.5 bg-green-600 hover:bg-green-700 text-white font-semibold transition-all duration-500 shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Request Withdraw
                        </button>
                    </div>
                </form>
            </div>
        `;
        
        // Add form submit handler
        const form = document.getElementById('withdrawForm');
        if (form) {
            form.addEventListener('submit', handleWithdrawSubmit);
        }
    }
    
    function updateWithdrawSummary() {
        const amountInput = document.getElementById('withdrawAmount');
        if (!amountInput) return;
        
        let amount = parseFloat(amountInput.value) || 0;
        const config = paymentMethods[selectedMethod];
        
        if (config) {
            const fee = (amount * config.fee) / 100;
            const total = amount + fee;
            
            document.getElementById('summaryAmount').innerText = `$${amount.toLocaleString()}`;
            document.getElementById('summaryFee').innerText = `$${fee.toLocaleString()}`;
            document.getElementById('summaryTotal').innerText = `$${total.toLocaleString()}`;
        }
    }
    
    async function handleWithdrawSubmit(e) {
        e.preventDefault();
        
        // Fetch latest spendable balance before processing
        const currentBalance = await fetchSpendableBalance();
        userBalance = currentBalance;
        
        const form = e.target;
        const formData = new FormData(form);
        const amount = parseFloat(formData.get('amount'));
        const config = paymentMethods[selectedMethod];
        
        if (!amount || amount <= 0) {
            toast.warning('Please enter a valid withdrawal amount');
            return;
        }
        
        if (amount < config.minAmount) {
            toast.warning(`Minimum withdrawal amount is $${config.minAmount.toLocaleString()}`);
            return;
        }
        
        if (amount > config.maxAmount) {
            toast.warning(`Maximum withdrawal amount is $${config.maxAmount.toLocaleString()}`);
            return;
        }
        
        if (amount > userBalance) {
            toast.error(`Insufficient balance. Available: $${userBalance.toLocaleString()}`);
            return;
        }
        
        const walletAddress = formData.get('wallet_address');
        if (!walletAddress) {
            toast.warning('Please enter your wallet address');
            return;
        }
        
        // Disable button and show loading
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div> Processing...';
        
        // Submit the form via fetch
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toast.success(data.message);
                // Refresh the page to show updated balance
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                toast.error(data.message);
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                // Refresh balance display
                fetchSpendableBalance();
            }
        })
        .catch(error => {
            toast.error('Something went wrong. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    }
    
    // Initialize - fetch spendable balance on page load
    document.addEventListener('DOMContentLoaded', async function() {
        userBalance = await fetchSpendableBalance();
    });
</script>

<style>
    /* No rounded corners */
    .bg-white, .border, button, input, .payment-option, .bg-green-50, .bg-gray-50, .bg-yellow-50 {
        border-radius: 0 !important;
    }
    
    /* Remove all border-radius */
    * {
        border-radius: 0 !important;
    }
    
    .payment-option {
        transition: all 0.3s ease;
    }
    
    .payment-option .border-2 {
        transition: all 0.3s ease;
    }
    
    input:focus {
        outline: none;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    #withdrawalForm {
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    .animate-spin {
        animation: spin 1s linear infinite;
    }
</style>
@endsection