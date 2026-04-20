<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get total profits from database (manually added by admin)
        $profits = $user->total_profits ?? 0;
        
        // Get last deposit and withdrawal from transactions
        $lastDeposit = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->latest()
            ->first();
        $lastDepositAmount = $lastDeposit ? $lastDeposit->amount : 0;
        
        $lastWithdrawal = Transaction::where('user_id', $user->id)
            ->where('type', 'withdrawal')
            ->latest()
            ->first();
        $lastWithdrawalAmount = $lastWithdrawal ? $lastWithdrawal->amount : 0;
        
        // Get recent transactions
        $transactions = Transaction::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get()
            ->map(function($transaction) {
                return [
                    'date' => $transaction->created_at->format('Y-m-d H:i:s'),
                    'type' => $transaction->type,
                    'amount' => $transaction->amount,
                    'status' => $transaction->status,
                    'ref' => $transaction->reference,
                ];
            });
        
        // Sample recent activities (replace with actual trading activities)
        $recentActivities = [
            [
                'type' => 'crypto',
                'title' => 'Bitcoin Investment',
                'amount' => 250.00,
                'time' => 'Today, 09:30 AM'
            ],
            [
                'type' => 'stock',
                'title' => 'Stock Trading - AAPL',
                'amount' => 89.50,
                'time' => 'Yesterday, 03:45 PM'
            ],
        ];
        
        return view('dashboard.index', compact(
            'user', 'profits', 'lastDepositAmount', 'lastWithdrawalAmount', 
            'transactions', 'recentActivities'
        ));
    }
}