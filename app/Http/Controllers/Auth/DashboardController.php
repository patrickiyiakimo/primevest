<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\StockPortfolio;
use App\Models\Investment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Stock prices for calculating current value
    private function getCurrentPrice($symbol)
    {
        $prices = [
            'AAPL' => 175.50,
            'MSFT' => 420.75,
            'GOOGL' => 140.25,
            'AMZN' => 145.80,
            'TSLA' => 245.50,
            'NVDA' => 895.20,
            'META' => 485.30,
            'NFLX' => 620.40,
        ];
        return $prices[$symbol] ?? 100.00;
    }

    public function index()
    {
        $user = Auth::user();
        
        // Get total profits from user field and investments
        $profitsFromUserField = $user->total_profits ?? 0;
        $profitsFromInvestments = Investment::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('expected_return') ?? 0;
        $profits = $profitsFromUserField + $profitsFromInvestments;
        
        // Get stocks current value
        $stocksPortfolio = StockPortfolio::where('user_id', $user->id)->get();
        $stocksCount = $stocksPortfolio->count();
        $totalInvested = 0;
        $stocksCurrentValue = 0;
        
        foreach ($stocksPortfolio as $holding) {
            $currentPrice = $this->getCurrentPrice($holding->symbol);
            $totalInvested += $holding->quantity * $holding->average_price;
            $stocksCurrentValue += $holding->quantity * $currentPrice;
        }
        
        $totalProfitLoss = $stocksCurrentValue - $totalInvested;
        $totalCurrentValue = $stocksCurrentValue;
        
        // Get last deposit
        $lastDeposit = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->where('status', 'completed')
            ->latest()
            ->first();
        $lastDepositAmount = $lastDeposit ? $lastDeposit->amount : 0;
        $lastDepositDate = $lastDeposit ? $lastDeposit->created_at->format('Y-m-d') : null;
        
        // Get last withdrawal
        $lastWithdrawal = Transaction::where('user_id', $user->id)
            ->where('type', 'withdrawal')
            ->where('status', 'completed')
            ->latest()
            ->first();
        $lastWithdrawalAmount = $lastWithdrawal ? $lastWithdrawal->amount : 0;
        $lastWithdrawalDate = $lastWithdrawal ? $lastWithdrawal->created_at->format('Y-m-d') : null;
        
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
        
        // Calculate spendable balance
        $spendableBalance = $user->balance + $profits + $stocksCurrentValue;
        
        // Profit percentage
        $profitPercentage = $user->balance > 0 ? ($profits / $user->balance) * 100 : 0;
        
        return view('dashboard.index', compact(
            'user',
            'profits',
            'profitPercentage',
            'lastDepositAmount',
            'lastDepositDate',
            'lastWithdrawalAmount',
            'lastWithdrawalDate',
            'transactions',
            'stocksCount',
            'totalProfitLoss',
            'totalInvested',
            'totalCurrentValue',
            'stocksCurrentValue',
            'spendableBalance'
        ));
    }
}