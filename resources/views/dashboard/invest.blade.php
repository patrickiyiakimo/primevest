@extends('layouts.dashboard')

@section('page-title', 'Investment Plans')
@section('breadcrumb', 'Choose your investment strategy')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Choose a Plan</h1>
                <p class="text-gray-500 mt-1">Select an investment plan that suits your financial goals</p>
            </div>
            <div class="bg-green-100 rounded-full px-4 py-2">
                <span class="text-green-600 text-sm font-semibold">Account Balance: ${{ number_format(Auth::user()->balance, 2) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Side - Plan Selection -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Plan Dropdown -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Select Investment Plan</h2>
                </div>
                <div class="p-6">
                    <div class="relative">
                        <select id="planSelect" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none bg-white text-gray-900 font-medium cursor-pointer">
                            <option value="vip">VIP Elite Plan - $100,000 (15% ROI)</option>
                            <option value="diamond">Diamond Plan - $50,000 (11% ROI)</option>
                            <option value="platinum">Platinum Plan - $25,000 (9% ROI)</option>
                            <option value="gold">Gold Plan - $10,000 (7% ROI)</option>
                            <option value="silver">Silver Plan - $5,000 (8% ROI)</option>
                            <option value="starter">Starter Plan - $1,000 (3% ROI)</option>
                        </select>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Amount Selection -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Choose quick amount to invest:</h2>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-3" id="quickAmounts">
                        <!-- Dynamic quick amounts will be populated by JavaScript -->
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Or enter custom amount</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">$</span>
                            <input type="number" id="customAmount" placeholder="Enter amount" class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Payment Method</h2>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Account Balance</p>
                                    <p class="text-sm text-gray-500">Use your available balance</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Available:</p>
                                <p class="text-lg font-bold text-green-600">${{ number_format(Auth::user()->balance, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Plan Details & Investment Summary -->
        <div class="space-y-6">
            <!-- Plan Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden sticky top-6">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                    <h2 class="text-lg font-bold text-white">Plan Details</h2>
                </div>
                <div class="p-6 space-y-4" id="planDetails">
                    <!-- Dynamic plan details will be populated here -->
                </div>
            </div>

            <!-- Investment Summary -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="border-b border-gray-200 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-lg font-semibold text-gray-900">Investment Summary</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Amount to Invest</span>
                        <span class="text-xl font-bold text-gray-900" id="investAmount">$0</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Expected ROI</span>
                        <span class="text-green-600 font-bold" id="expectedRoi">0%</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Expected Return</span>
                        <span class="text-green-600 font-bold" id="expectedReturn">$0</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Duration</span>
                        <span class="text-gray-900 font-medium" id="duration">-</span>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="text-gray-600">Bonus</span>
                        <span class="text-yellow-600 font-bold" id="bonus">$0</span>
                    </div>
                </div>
                
                <!-- Confirm Button -->
                <div class="border-t border-gray-200 p-6 bg-gray-50">
                    <button id="confirmInvestBtn" class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-all duration-500 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                        Confirm & Invest
                    </button>
                    <p class="text-xs text-center text-gray-500 mt-3">
                        By confirming, you agree to our investment terms and conditions
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Plan Data
    const plans = {
        vip: {
            name: 'VIP Elite Plan',
            price: 100000,
            duration: '7 Day(s)',
            roi: 15.00,
            minAmount: 100000,
            maxAmount: 500000,
            minReturn: 2.50,
            maxReturn: 4.00,
            bonus: 0,
            quickAmounts: [1000, 2500, 5000, 30000, 45500, 20000, 100000]
        },
        diamond: {
            name: 'Diamond Plan',
            price: 50000,
            duration: '1 Month(s)',
            roi: 11.00,
            minAmount: 50000,
            maxAmount: 99999,
            minReturn: 3.00,
            maxReturn: 4.50,
            bonus: 0,
            quickAmounts: [1000, 2500, 5000, 10000, 25000, 50000]
        },
        platinum: {
            name: 'Platinum Plan',
            price: 25000,
            duration: '1 Month(s)',
            roi: 9.00,
            minAmount: 25000,
            maxAmount: 49999,
            minReturn: 3.50,
            maxReturn: 5.00,
            bonus: 0,
            quickAmounts: [1000, 2500, 5000, 10000, 25000]
        },
        gold: {
            name: 'Gold Plan',
            price: 10000,
            duration: '3 Week(s)',
            roi: 7.00,
            minAmount: 10000,
            maxAmount: 24999,
            minReturn: 4.50,
            maxReturn: 6.00,
            bonus: 0,
            quickAmounts: [1000, 2500, 5000, 10000]
        },
        silver: {
            name: 'Silver Plan',
            price: 5000,
            duration: '2 Week(s)',
            roi: 8.00,
            minAmount: 5000,
            maxAmount: 9999,
            minReturn: 5.00,
            maxReturn: 7.00,
            bonus: 0,
            quickAmounts: [1000, 2500, 5000]
        },
        starter: {
            name: 'Starter Plan',
            price: 1000,
            duration: '1 Month(s)',
            roi: 3.00,
            minAmount: 1000,
            maxAmount: 4999,
            minReturn: 6.00,
            maxReturn: 8.00,
            bonus: 0,
            quickAmounts: [1000, 2500]
        }
    };

    let currentPlan = 'vip';
    let currentAmount = 0;
    const userBalance = {{ Auth::user()->balance }};

    // Populate plan details
    function updatePlanDetails() {
        const plan = plans[currentPlan];
        const detailsHtml = `
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Name of Plan:</span>
                    <span class="text-gray-900 font-semibold">${plan.name}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Plan Price:</span>
                    <span class="text-gray-900 font-semibold">$${plan.price.toLocaleString()}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Duration:</span>
                    <span class="text-gray-900 font-semibold">${plan.duration}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">ROI:</span>
                    <span class="text-green-600 font-bold">${plan.roi}%</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Minimum Amount:</span>
                    <span class="text-gray-900 font-semibold">$${plan.minAmount.toLocaleString()}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Maximum Amount:</span>
                    <span class="text-gray-900 font-semibold">$${plan.maxAmount.toLocaleString()}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Minimum Return:</span>
                    <span class="text-green-600 font-semibold">${plan.minReturn}%</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Maximum Return:</span>
                    <span class="text-green-600 font-semibold">${plan.maxReturn}%</span>
                </div>
                <div class="flex justify-between items-center pt-2">
                    <span class="text-gray-500 text-sm">Bonus:</span>
                    <span class="text-yellow-600 font-bold">$${plan.bonus.toLocaleString()}</span>
                </div>
            </div>
        `;
        document.getElementById('planDetails').innerHTML = detailsHtml;
        
        // Update quick amounts
        updateQuickAmounts();
        
        // Reset amount
        document.getElementById('customAmount').value = '';
        currentAmount = 0;
        updateInvestmentSummary();
    }

    // Update quick amount buttons
    function updateQuickAmounts() {
        const plan = plans[currentPlan];
        const container = document.getElementById('quickAmounts');
        container.innerHTML = '';
        
        plan.quickAmounts.forEach(amount => {
            const btn = document.createElement('button');
            btn.textContent = `$${amount.toLocaleString()}`;
            btn.className = 'px-4 py-2 bg-gray-100 hover:bg-green-500 hover:text-white rounded-lg transition-all duration-300 text-sm font-medium';
            btn.onclick = () => setAmount(amount);
            container.appendChild(btn);
        });
    }

    // Set amount from quick button
    function setAmount(amount) {
        const plan = plans[currentPlan];
        if (amount < plan.minAmount) {
            alert(`Minimum investment for ${plan.name} is $${plan.minAmount.toLocaleString()}`);
            return;
        }
        if (amount > plan.maxAmount) {
            alert(`Maximum investment for ${plan.name} is $${plan.maxAmount.toLocaleString()}`);
            return;
        }
        if (amount > userBalance) {
            alert(`Insufficient balance. Your available balance is $${userBalance.toLocaleString()}`);
            return;
        }
        currentAmount = amount;
        document.getElementById('customAmount').value = amount;
        updateInvestmentSummary();
    }

    // Update investment summary
    function updateInvestmentSummary() {
        const plan = plans[currentPlan];
        const amount = currentAmount || 0;
        const expectedReturnAmount = (amount * plan.roi) / 100;
        
        document.getElementById('investAmount').innerHTML = `$${amount.toLocaleString()}`;
        document.getElementById('expectedRoi').innerHTML = `${plan.roi}%`;
        document.getElementById('expectedReturn').innerHTML = `$${expectedReturnAmount.toLocaleString()}`;
        document.getElementById('duration').innerHTML = plan.duration;
        document.getElementById('bonus').innerHTML = `$${plan.bonus.toLocaleString()}`;
        
        // Enable/disable confirm button based on amount
        const confirmBtn = document.getElementById('confirmInvestBtn');
        if (amount >= plan.minAmount && amount <= plan.maxAmount && amount <= userBalance && amount > 0) {
            confirmBtn.disabled = false;
        } else {
            confirmBtn.disabled = true;
        }
    }

    // Handle plan selection change
    document.getElementById('planSelect').addEventListener('change', function(e) {
        currentPlan = e.target.value;
        updatePlanDetails();
    });

    // Handle custom amount input
    document.getElementById('customAmount').addEventListener('input', function(e) {
        const plan = plans[currentPlan];
        let amount = parseFloat(e.target.value) || 0;
        
        if (amount < plan.minAmount) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
        } else if (amount > plan.maxAmount) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
        } else if (amount > userBalance) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
        } else {
            document.getElementById('customAmount').style.borderColor = '#10b981';
        }
        
        currentAmount = amount;
        updateInvestmentSummary();
    });

    // Confirm Investment
    document.getElementById('confirmInvestBtn').addEventListener('click', function() {
        const plan = plans[currentPlan];
        const amount = currentAmount;
        
        if (!amount || amount <= 0) {
            alert('Please enter an investment amount');
            return;
        }
        
        if (amount < plan.minAmount) {
            alert(`Minimum investment amount is $${plan.minAmount.toLocaleString()}`);
            return;
        }
        
        if (amount > plan.maxAmount) {
            alert(`Maximum investment amount is $${plan.maxAmount.toLocaleString()}`);
            return;
        }
        
        if (amount > userBalance) {
            alert(`Insufficient balance. Your available balance is $${userBalance.toLocaleString()}`);
            return;
        }
        
        const expectedReturn = (amount * plan.roi) / 100;
        
        if (confirm(`Confirm Investment:\n\nPlan: ${plan.name}\nAmount: $${amount.toLocaleString()}\nExpected ROI: ${plan.roi}%\nExpected Return: $${expectedReturn.toLocaleString()}\nDuration: ${plan.duration}\n\nDo you want to proceed?`)) {
            // Here you would submit the investment to your backend
            alert(`Investment of $${amount.toLocaleString()} in ${plan.name} has been initiated!\n\nYou will receive $${expectedReturn.toLocaleString()} after ${plan.duration}`);
            
            // Redirect or submit form
            // window.location.href = '/process-investment';
        }
    });

    // Initialize page
    updatePlanDetails();
</script>

<style>
    /* Sticky sidebar */
    .sticky {
        position: sticky;
        top: 100px;
    }
    
    /* Remove spinner from number input */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        opacity: 0.5;
    }
    
    /* Select dropdown styling */
    select {
        cursor: pointer;
    }

    <!-- Toast Notification Styles -->
<style>
    .toast-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }
    
    .toast {
        min-width: 300px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        overflow: hidden;
    }
    
    .toast.show {
        transform: translateX(0);
    }
    
    .toast-success {
        border-left: 4px solid #10b981;
    }
    
    .toast-error {
        border-left: 4px solid #ef4444;
    }
    
    .toast-warning {
        border-left: 4px solid #f59e0b;
    }
    
    .toast-info {
        border-left: 4px solid #3b82f6;
    }
    
    .toast-content {
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .toast-icon {
        flex-shrink: 0;
    }
    
    .toast-message {
        flex: 1;
        font-size: 14px;
        color: #1f2937;
        line-height: 1.4;
    }
    
    .toast-close {
        cursor: pointer;
        color: #9ca3af;
        transition: color 0.2s;
    }
    
    .toast-close:hover {
        color: #4b5563;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
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
        
        show(message, type = 'success', duration = 3000) {
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            
            let icon = '';
            switch(type) {
                case 'success':
                    icon = `<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>`;
                    break;
                case 'error':
                    icon = `<svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>`;
                    break;
                case 'warning':
                    icon = `<svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>`;
                    break;
                case 'info':
                    icon = `<svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>`;
                    break;
            }
            
            toast.innerHTML = `
                <div class="toast-content">
                    <div class="toast-icon">${icon}</div>
                    <div class="toast-message">${message}</div>
                    <div class="toast-close" onclick="this.closest('.toast').remove()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            `;
            
            this.container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => {
                toast.classList.add('show');
            }, 10);
            
            // Auto remove after duration
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease forwards';
                setTimeout(() => {
                    if (toast.parentNode) toast.remove();
                }, 300);
            }, duration);
        }
        
        success(message, duration = 3000) {
            this.show(message, 'success', duration);
        }
        
        error(message, duration = 3000) {
            this.show(message, 'error', duration);
        }
        
        warning(message, duration = 3000) {
            this.show(message, 'warning', duration);
        }
        
        info(message, duration = 3000) {
            this.show(message, 'info', duration);
        }
    }
    
    // Initialize toast
    const toast = new Toast();
</script>
</style>
@endsection