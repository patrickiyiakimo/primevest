@extends('layouts.dashboard')

@section('page-title', 'Investment Plans')
@section('breadcrumb', 'Choose your investment strategy')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <h1 class="text-2xl font-bold">Choose a Plan</h1>
                <p class="text-gray-300 mt-1">Select an investment plan that suits your financial goals</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-full px-5 py-2.5 border border-white/20">
                <span class="text-green-400 text-sm font-semibold">💰 Account Balance: ${{ number_format(Auth::user()->balance, 2) }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Side - Plan Selection -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Plan Dropdown -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Select Investment Plan
                    </h2>
                </div>
                <div class="p-6">
                    <div class="relative">
                        <select id="planSelect" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent appearance-none bg-white text-gray-900 font-medium cursor-pointer">
                            <option value="vip">👑 VIP Elite Plan - $100,000 (15% ROI)</option>
                            <option value="diamond">💎 Diamond Plan - $50,000 (11% ROI)</option>
                            <option value="platinum">⚡ Platinum Plan - $25,000 (9% ROI)</option>
                            <option value="gold">🥇 Gold Plan - $10,000 (7% ROI)</option>
                            <option value="silver">🥈 Silver Plan - $5,000 (8% ROI)</option>
                            <option value="starter">🚀 Starter Plan - $1,000 (3% ROI)</option>
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
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Choose quick amount to invest
                    </h2>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-3" id="quickAmounts"></div>
                    <div class="mt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Or enter custom amount</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-bold">$</span>
                            <input type="number" id="customAmount" placeholder="0.00" class="w-full pl-8 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Payment Method
                    </h2>
                </div>
                <div class="p-6">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900 text-lg">Account Balance</p>
                                    <p class="text-sm text-gray-600">Use your available balance to invest</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Available Balance</p>
                                <p class="text-2xl font-bold text-green-600">${{ number_format(Auth::user()->balance, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Plan Details & Investment Summary -->
        <div class="space-y-6">
            <!-- Plan Details Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden sticky top-6">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h2 class="text-lg font-bold text-white">Plan Details</h2>
                    </div>
                </div>
                <div class="p-6 space-y-3" id="planDetails"></div>
            </div>

            <!-- Investment Summary -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 px-6 py-4 bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-900">Investment Summary</h2>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Amount to Invest</span>
                        <span class="text-2xl font-bold text-gray-900" id="investAmount">$0</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Expected ROI</span>
                        <span class="text-green-600 font-bold text-lg" id="expectedRoi">0%</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Expected Return</span>
                        <span class="text-green-600 font-bold text-lg" id="expectedReturn">$0</span>
                    </div>
                    <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                        <span class="text-gray-600">Duration</span>
                        <span class="text-gray-900 font-medium" id="duration">-</span>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <span class="text-gray-600">Welcome Bonus</span>
                        <span class="text-yellow-600 font-bold text-lg" id="bonus">$0</span>
                    </div>
                </div>
                
                <!-- Confirm Button -->
                <div class="border-t border-gray-100 p-6 bg-gray-50">
                    <button id="confirmInvestBtn" class="w-full py-3.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
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
        
        show(message, type = 'success', duration = 5000) {
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
            
            toast.className = `${colors[type]} text-white px-5 py-3 rounded-xl shadow-lg mb-3 flex items-center gap-3 transform translate-x-full transition-all duration-300`;
            toast.innerHTML = `<span class="font-bold text-lg">${icons[type]}</span><span>${message}</span>`;
            this.container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 10);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
        
        success(message, duration = 5000) { this.show(message, 'success', duration); }
        error(message, duration = 5000) { this.show(message, 'error', duration); }
        warning(message, duration = 5000) { this.show(message, 'warning', duration); }
        info(message, duration = 5000) { this.show(message, 'info', duration); }
    }
    
    const toast = new Toast();
    
    // Plan Data with duration in days
    const plans = {
        vip: {
            name: 'VIP Elite Plan',
            price: 100000,
            duration: '7 Day(s)',
            durationDays: 7,
            roi: 15.00,
            minAmount: 100000,
            maxAmount: 500000,
            bonus: 0,
            quickAmounts: [100000, 200000, 300000, 400000, 500000]
        },
        diamond: {
            name: 'Diamond Plan',
            price: 50000,
            duration: '30 Day(s)',
            durationDays: 30,
            roi: 11.00,
            minAmount: 50000,
            maxAmount: 99999,
            bonus: 0,
            quickAmounts: [50000, 60000, 70000, 80000, 90000]
        },
        platinum: {
            name: 'Platinum Plan',
            price: 25000,
            duration: '30 Day(s)',
            durationDays: 30,
            roi: 9.00,
            minAmount: 25000,
            maxAmount: 49999,
            bonus: 0,
            quickAmounts: [25000, 30000, 35000, 40000, 45000]
        },
        gold: {
            name: 'Gold Plan',
            price: 10000,
            duration: '21 Day(s)',
            durationDays: 21,
            roi: 7.00,
            minAmount: 10000,
            maxAmount: 24999,
            bonus: 0,
            quickAmounts: [10000, 15000, 20000]
        },
        silver: {
            name: 'Silver Plan',
            price: 5000,
            duration: '14 Day(s)',
            durationDays: 14,
            roi: 8.00,
            minAmount: 5000,
            maxAmount: 9999,
            bonus: 0,
            quickAmounts: [5000, 6000, 7000, 8000, 9000]
        },
        starter: {
            name: 'Starter Plan',
            price: 1000,
            duration: '30 Day(s)',
            durationDays: 30,
            roi: 3.00,
            minAmount: 1000,
            maxAmount: 4999,
            bonus: 0,
            quickAmounts: [1000, 2000, 3000, 4000]
        }
    };

    let currentPlan = 'vip';
    let currentAmount = 0;
    const userBalance = {{ Auth::user()->balance }};

    function updatePlanDetails() {
        const plan = plans[currentPlan];
        document.getElementById('planDetails').innerHTML = `
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                    <span class="text-gray-500 text-sm">Plan Name:</span>
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
                    <span class="text-gray-500 text-sm">Min/Max Amount:</span>
                    <span class="text-gray-900 font-semibold">$${plan.minAmount.toLocaleString()} - $${plan.maxAmount.toLocaleString()}</span>
                </div>
                <div class="flex justify-between items-center pt-2">
                    <span class="text-gray-500 text-sm">Bonus:</span>
                    <span class="text-yellow-600 font-bold">$${plan.bonus.toLocaleString()}</span>
                </div>
            </div>
        `;
        updateQuickAmounts();
        document.getElementById('customAmount').value = '';
        currentAmount = 0;
        updateInvestmentSummary();
    }

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

    function setAmount(amount) {
        const plan = plans[currentPlan];
        if (amount < plan.minAmount) {
            toast.warning(`Minimum investment for ${plan.name} is $${plan.minAmount.toLocaleString()}`);
            return;
        }
        if (amount > plan.maxAmount) {
            toast.warning(`Maximum investment for ${plan.name} is $${plan.maxAmount.toLocaleString()}`);
            return;
        }
        if (amount > userBalance) {
            toast.error(`Insufficient balance! Available: $${userBalance.toLocaleString()}`);
            return;
        }
        currentAmount = amount;
        document.getElementById('customAmount').value = amount;
        updateInvestmentSummary();
        toast.success(`$${amount.toLocaleString()} selected for ${plan.name}`);
    }

    function updateInvestmentSummary() {
        const plan = plans[currentPlan];
        const amount = currentAmount || 0;
        const expectedReturnAmount = (amount * plan.roi) / 100;
        
        document.getElementById('investAmount').innerHTML = `$${amount.toLocaleString()}`;
        document.getElementById('expectedRoi').innerHTML = `${plan.roi}%`;
        document.getElementById('expectedReturn').innerHTML = `$${expectedReturnAmount.toLocaleString()}`;
        document.getElementById('duration').innerHTML = plan.duration;
        document.getElementById('bonus').innerHTML = `$${plan.bonus.toLocaleString()}`;
        
        const confirmBtn = document.getElementById('confirmInvestBtn');
        confirmBtn.disabled = !(amount >= plan.minAmount && amount <= plan.maxAmount && amount <= userBalance && amount > 0);
    }

    document.getElementById('planSelect').addEventListener('change', function(e) {
        currentPlan = e.target.value;
        updatePlanDetails();
        toast.info(`${plans[currentPlan].name} selected`, 2500);
    });

    document.getElementById('customAmount').addEventListener('input', function(e) {
        const plan = plans[currentPlan];
        let amount = parseFloat(e.target.value) || 0;
        
        if (amount > 0 && amount < plan.minAmount) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
            toast.warning(`Minimum amount is $${plan.minAmount.toLocaleString()}`, 2500);
        } else if (amount > plan.maxAmount) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
            toast.warning(`Maximum amount is $${plan.maxAmount.toLocaleString()}`, 2500);
        } else if (amount > userBalance) {
            document.getElementById('customAmount').style.borderColor = '#ef4444';
            toast.error(`Insufficient balance! Available: $${userBalance.toLocaleString()}`, 2500);
        } else if (amount > 0) {
            document.getElementById('customAmount').style.borderColor = '#10b981';
        }
        
        currentAmount = amount;
        updateInvestmentSummary();
    });

    document.getElementById('confirmInvestBtn').addEventListener('click', async function() {
        const plan = plans[currentPlan];
        const amount = currentAmount;
        
        if (!amount || amount <= 0) {
            toast.warning('Please enter an investment amount');
            return;
        }
        if (amount < plan.minAmount) {
            toast.warning(`Minimum investment amount is $${plan.minAmount.toLocaleString()}`);
            return;
        }
        if (amount > plan.maxAmount) {
            toast.warning(`Maximum investment amount is $${plan.maxAmount.toLocaleString()}`);
            return;
        }
        if (amount > userBalance) {
            toast.error(`Insufficient balance. Available: $${userBalance.toLocaleString()}`);
            return;
        }
        
        const expectedReturn = (amount * plan.roi) / 100;
        
        // Disable button and show loading
        const btn = this;
        btn.disabled = true;
        btn.innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div> Processing...';
        
        try {
            const response = await fetch('/invest/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    plan_name: plan.name,
                    amount: amount,
                    roi: plan.roi,
                    duration: plan.duration,
                    duration_days: plan.durationDays
                })
            });
            
            const data = await response.json();
            
            if (data.success) {
                toast.success(data.message);
                toast.info(`Your investment will mature on ${new Date(Date.now() + plan.durationDays * 86400000).toLocaleDateString()}`, 6000);
                
                setTimeout(() => {
                    window.location.href = '/investments-history';
                }, 3000);
            } else {
                toast.error(data.message);
                btn.disabled = false;
                btn.innerHTML = 'Confirm & Invest';
            }
        } catch (error) {
            toast.error('Something went wrong. Please try again.');
            btn.disabled = false;
            btn.innerHTML = 'Confirm & Invest';
        }
    });

    updatePlanDetails();
</script>

<style>
    .sticky { position: sticky; top: 100px; }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button { opacity: 0.5; }
    select { cursor: pointer; }
    @keyframes spin { to { transform: rotate(360deg); } }
    .animate-spin { animation: spin 1s linear infinite; }
</style>
@endsection