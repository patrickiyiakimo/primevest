<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Transaction;
use App\Models\StockPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InvestmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $spendableBalance = $this->getSpendableBalance($user);
        
        return view('invest.index', compact('spendableBalance'));
    }
    
    /**
     * Get current stock prices
     */
    private function getStockPrices()
    {
        return [
            'AAPL' => 175.50,
            'MSFT' => 420.75,
            'GOOGL' => 140.25,
            'AMZN' => 145.80,
            'TSLA' => 245.50,
            'NVDA' => 895.20,
            'META' => 485.30,
            'NFLX' => 620.40,
        ];
    }
    
    /**
     * Calculate user's spendable balance (balance + profits + stocks value)
     */
    private function getSpendableBalance($user)
    {
        $prices = $this->getStockPrices();
        
        // Get stocks current value
        $stocksValue = 0;
        try {
            $stocksPortfolio = StockPortfolio::where('user_id', $user->id)->get();
            
            foreach ($stocksPortfolio as $holding) {
                $currentPrice = $prices[$holding->symbol] ?? 100.00;
                $stocksValue += $holding->quantity * $currentPrice;
            }
        } catch (\Exception $e) {
            // StockPortfolio table might not exist
            \Log::info('StockPortfolio not available: ' . $e->getMessage());
        }
        
        // Get total profits from transactions
        $totalProfits = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->sum('amount') ?? 0;
        
        // Also check if user has total_profits column
        $userTotalProfits = $user->total_profits ?? 0;
        
        // Calculate total spendable balance
        $totalSpendable = $user->balance + $totalProfits + $userTotalProfits + $stocksValue;
        
        \Log::info('Spendable balance calculation', [
            'user_id' => $user->id,
            'main_balance' => $user->balance,
            'profits_from_transactions' => $totalProfits,
            'user_total_profits' => $userTotalProfits,
            'stocks_value' => $stocksValue,
            'total_spendable' => $totalSpendable
        ]);
        
        return $totalSpendable;
    }
    
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            
            $validated = $request->validate([
                'plan_name' => 'required|string',
                'amount' => 'required|numeric|min:1000|max:500000',
                'roi' => 'required|numeric',
                'duration' => 'required|string',
                'duration_days' => 'required|integer',
                'bonus' => 'nullable|numeric'
            ]);
            
            // Calculate total spendable balance
            $spendableBalance = $this->getSpendableBalance($user);
            
            // Get current profits
            $totalProfits = Transaction::where('user_id', $user->id)
                ->where('type', 'profit')
                ->sum('amount') ?? 0;
            
            $userTotalProfits = $user->total_profits ?? 0;
            $totalProfitsAmount = $totalProfits + $userTotalProfits;
            
            // Check if user has enough TOTAL spendable balance
            if ($validated['amount'] > $spendableBalance) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient funds. Available: $' . number_format($spendableBalance, 2)
                ], 400);
            }
            
            // Calculate how much to deduct from main balance and profits
            $amountToInvest = $validated['amount'];
            $mainBalanceAvailable = $user->balance;
            
            // Deduct from main balance first
            $deductFromMain = min($amountToInvest, $mainBalanceAvailable);
            $deductFromProfits = $amountToInvest - $deductFromMain;
            
            // Update main balance
            $oldBalance = $user->balance;
            $user->balance -= $deductFromMain;
            $user->save();
            
            // Update profits (deduct from total_profits column if it exists)
            if ($deductFromProfits > 0) {
                // Deduct from user's total_profits column
                if (isset($user->total_profits) && $user->total_profits > 0) {
                    $user->total_profits -= $deductFromProfits;
                    $user->save();
                    
                    \Log::info('Investment deducted from profits', [
                        'user_id' => $user->id,
                        'amount_deducted' => $deductFromProfits,
                        'remaining_profits' => $user->total_profits
                    ]);
                } else {
                    // If no total_profits column, create a negative profit transaction
                    Transaction::create([
                        'user_id' => $user->id,
                        'type' => 'profit_withdrawal',
                        'amount' => -$deductFromProfits,
                        'balance_before' => $oldBalance,
                        'balance_after' => $user->balance,
                        'status' => 'completed',
                        'reference' => 'PROFIT-USD-' . strtoupper(uniqid()),
                        'description' => 'Investment used from profits',
                    ]);
                }
            }
            
            // Calculate expected return (including bonus)
            $bonus = $request->input('bonus', 0);
            $expectedReturn = $validated['amount'] + ($validated['amount'] * $validated['roi'] / 100) + $bonus;
            
            // Create investment record
            $investment = Investment::create([
                'user_id' => $user->id,
                'plan_name' => $validated['plan_name'],
                'amount' => $validated['amount'],
                'roi' => $validated['roi'],
                'expected_return' => $expectedReturn,
                'duration' => $validated['duration'],
                'duration_days' => $validated['duration_days'],
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays($validated['duration_days']),
                'status' => 'active'
            ]);
            
            // Create transaction record for the investment
            Transaction::create([
                'user_id' => $user->id,
                'type' => 'investment',
                'amount' => $validated['amount'],
                'balance_before' => $oldBalance,
                'balance_after' => $user->balance,
                'status' => 'completed',
                'reference' => 'INV-' . strtoupper(uniqid()),
                'description' => 'Investment in ' . $validated['plan_name'] . ' with ' . $validated['roi'] . '% ROI',
                'metadata' => json_encode([
                    'deducted_from_main' => $deductFromMain,
                    'deducted_from_profits' => $deductFromProfits
                ])
            ]);
            
            return response()->json([
                'success' => true,
                'message' => "Successfully invested $" . number_format($validated['amount'], 2) . " in {$validated['plan_name']}!",
                'investment' => $investment,
                'new_balance' => $user->balance,
                'profits_remaining' => $user->total_profits ?? ($totalProfitsAmount - $deductFromProfits)
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . implode(', ', $e->errors())
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Investment error: ' . $e->getMessage());
            \Log::error('Investment error trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }
}