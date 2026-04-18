<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Sample withdrawal data - replace with your actual database queries
        $withdrawals = [
            [
                'amount' => 1500.00,
                'method' => 'bitcoin',
                'wallet_address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
                'date' => '2024-01-14 10:30:00',
                'status' => 'completed'
            ],
            [
                'amount' => 500.00,
                'method' => 'ethereum',
                'wallet_address' => '0x742d35Cc6634C0532925a3b844Bc9e7595f0bEb8',
                'date' => '2024-01-08 14:45:00',
                'status' => 'completed'
            ],
            [
                'amount' => 2000.00,
                'method' => 'usdt_trc20',
                'wallet_address' => 'TXRqQ8jLnKqWqjJqjLjKjLqWqjJqjLjKjLqWq',
                'date' => '2024-01-02 09:15:00',
                'status' => 'pending'
            ],
            [
                'amount' => 750.00,
                'method' => 'solana',
                'wallet_address' => 'iNTTRrsvJU4TMP2k7iGaaSkQJphswRWdJroPSLC4ReK',
                'date' => '2023-12-28 16:20:00',
                'status' => 'processing'
            ],
            [
                'amount' => 3000.00,
                'method' => 'bank_transfer',
                'wallet_address' => 'Account: 1234567890',
                'date' => '2023-12-20 11:00:00',
                'status' => 'completed'
            ],
        ];
        
        $totalWithdrawals = array_sum(array_column($withdrawals, 'amount'));
        $averageWithdrawal = count($withdrawals) > 0 ? $totalWithdrawals / count($withdrawals) : 0;
        $lastWithdrawalAmount = count($withdrawals) > 0 ? $withdrawals[0]['amount'] : 0;
        $pendingCount = count(array_filter($withdrawals, function($w) { return $w['status'] == 'pending'; }));
        
        return view('dashboard.withdrawals-history', compact('withdrawals', 'totalWithdrawals', 'averageWithdrawal', 'lastWithdrawalAmount', 'pendingCount'));
    }
}