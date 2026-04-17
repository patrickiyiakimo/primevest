@extends('layouts.dashboard')

@section('dashboard-content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Main Balance Card -->
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6">
                <p class="text-gray-400 text-sm mb-2">Main Balance</p>
                <p class="text-3xl font-bold text-white">${{ number_format($user->balance, 2) }}</p>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <p class="text-xs text-gray-500">VALID THRU</p>
                    <p class="text-sm text-white font-semibold">08/28</p>
                    <p class="text-xs text-gray-500 mt-2">CARD HOLDER</p>
                    <p class="text-sm text-white font-semibold">{{ strtoupper($user->name) }}</p>
                </div>
            </div>
        </div>

        <!-- Profits Card -->
        <div class="bg-gradient-to-br from-green-900 to-green-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6">
                <p class="text-gray-300 text-sm mb-2">Profits</p>
                <p class="text-3xl font-bold text-white">${{ number_format($profits ?? 0, 2) }}</p>
                <div class="mt-4 pt-4 border-t border-green-700">
                    <p class="text-xs text-gray-400">VALID THRU</p>
                    <p class="text-sm text-white font-semibold">08/28</p>
                    <p class="text-xs text-gray-400 mt-2">CARD HOLDER</p>
                    <p class="text-sm text-white font-semibold">{{ strtoupper($user->name) }}</p>
                </div>
            </div>
        </div>

        <!-- Last Deposit Card -->
        <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6">
                <p class="text-gray-300 text-sm mb-2">Last Deposit</p>
                <p class="text-3xl font-bold text-white">${{ number_format($lastDeposit ?? 0, 2) }}</p>
                <div class="mt-4 pt-4 border-t border-blue-700">
                    <p class="text-xs text-gray-400">VALID THRU</p>
                    <p class="text-sm text-white font-semibold">08/28</p>
                    <p class="text-xs text-gray-400 mt-2">CARD HOLDER</p>
                    <p class="text-sm text-white font-semibold">{{ strtoupper($user->name) }}</p>
                </div>
            </div>
        </div>

        <!-- Last Withdrawal Card -->
        <div class="bg-gradient-to-br from-purple-900 to-purple-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-6">
                <p class="text-gray-300 text-sm mb-2">Last Withdrawal</p>
                <p class="text-3xl font-bold text-white">${{ number_format($lastWithdrawal ?? 0, 2) }}</p>
                <div class="mt-4 pt-4 border-t border-purple-700">
                    <p class="text-xs text-gray-400">VALID THRU</p>
                    <p class="text-sm text-white font-semibold">08/28</p>
                    <p class="text-xs text-gray-400 mt-2">CARD HOLDER</p>
                    <p class="text-sm text-white font-semibold">{{ strtoupper($user->name) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Daily News Roundup -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Daily News Roundup</h2>
            </div>
            <div class="p-6 space-y-4">
                <div class="border-b border-gray-200 pb-3">
                    <p class="text-sm text-green-600 font-semibold">📈 Bitcoin Surges Past $67,000</p>
                    <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                </div>
                <div class="border-b border-gray-200 pb-3">
                    <p class="text-sm text-green-600 font-semibold">📊 Stock Markets Hit New Highs</p>
                    <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                </div>
                <div class="border-b border-gray-200 pb-3">
                    <p class="text-sm text-yellow-600 font-semibold">💱 Fed Announces Interest Rate Decision</p>
                    <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                </div>
                <div class="pb-3">
                    <p class="text-sm text-blue-600 font-semibold">🏦 New Investment Opportunities in Tech Sector</p>
                    <p class="text-xs text-gray-500 mt-1">Yesterday</p>
                </div>
            </div>
        </div>

        <!-- Recent Trading Activities -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Recent Trading Activities</h2>
                <p class="text-xs text-gray-400">Watch your daily earnings top up...</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Bitcoin Investment</p>
                            <p class="text-xs text-gray-500">Today, 09:30 AM</p>
                        </div>
                        <p class="text-sm font-bold text-green-600">+$250.00</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Ethereum Staking</p>
                            <p class="text-xs text-gray-500">Today, 08:15 AM</p>
                        </div>
                        <p class="text-sm font-bold text-green-600">+$150.00</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Stock Trading - AAPL</p>
                            <p class="text-xs text-gray-500">Yesterday, 03:45 PM</p>
                        </div>
                        <p class="text-sm font-bold text-green-600">+$89.50</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Dividend Payout</p>
                            <p class="text-xs text-gray-500">Yesterday, 12:00 PM</p>
                        </div>
                        <p class="text-sm font-bold text-green-600">+$45.00</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <a href="#" class="text-green-600 hover:text-green-700 text-sm font-semibold">View All Activities →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Investment Performance Chart Placeholder -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Investment Performance</h2>
        </div>
        <div class="p-6">
            <div class="h-64 flex items-center justify-center bg-gray-50 rounded-lg">
                <p class="text-gray-500">Investment chart will appear here</p>
            </div>
        </div>
    </div>
</div>
@endsection