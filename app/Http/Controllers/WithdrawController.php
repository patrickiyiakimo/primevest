<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRequest;
use App\Models\StockPortfolio;
use App\Mail\WithdrawalConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WithdrawalController extends Controller
{
    public function index()
    {
        return view('dashboard.withdraw');
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
     * Calculate user's spendable balance
     */
    private function getSpendableBalance($user)
    {
        $prices = $this->getStockPrices();
        
        // Get stocks current value
        $stocksValue = 0;
        $stocksPortfolio = StockPortfolio::where('user_id', $user->id)->get();
        
        foreach ($stocksPortfolio as $holding) {
            $currentPrice = $prices[$holding->symbol] ?? 100.00;
            $stocksValue += $holding->quantity * $currentPrice;
        }
        
        return $user->balance + ($user->total_profits ?? 0) + $stocksValue;
    }
    
    public function request(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric|min:1000|max:500000',
            'wallet_address' => 'required|string|max:255',
            'network' => 'required|string',
        ]);
        
        // Get spendable balance
        $spendableBalance = $this->getSpendableBalance($user);
        
        // Check if user has sufficient spendable balance
        if ($validated['amount'] > $spendableBalance) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance. Available: $' . number_format($spendableBalance, 2)
            ], 400);
        }
        
        // Create withdrawal request
        $withdrawal = WithdrawalRequest::create([
            'user_id' => $user->id,
            'amount' => $validated['amount'],
            'method' => $validated['method'],
            'wallet_address' => $validated['wallet_address'],
            'network' => $validated['network'],
            'status' => 'pending'
        ]);
        
        // Send confirmation email to user
        try {
            Mail::to($user->email)->send(new WithdrawalConfirmationMail(
                $user, 
                $validated['amount'], 
                $validated['method'], 
                $validated['wallet_address'], 
                $validated['network']
            ));
        } catch (\Exception $e) {
            \Log::error('Failed to send withdrawal confirmation email to ' . $user->email . ': ' . $e->getMessage());
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Withdrawal request submitted successfully! A confirmation email has been sent to your inbox.'
        ]);
    }
}