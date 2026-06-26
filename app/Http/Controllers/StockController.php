<?php

namespace App\Http\Controllers;

use App\Models\StockPortfolio;
use App\Models\StockTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    private $stocks = [
        'AAPL' => ['name' => 'Apple Inc.', 'open' => 174.20, 'high' => 176.80, 'low' => 173.50, 'volume' => 52.4, 'market_cap' => '2.85T'],
        'MSFT' => ['name' => 'Microsoft Corp', 'open' => 418.30, 'high' => 422.90, 'low' => 417.20, 'volume' => 28.7, 'market_cap' => '3.12T'],
        'GOOGL' => ['name' => 'Alphabet Inc.', 'open' => 139.80, 'high' => 141.50, 'low' => 139.20, 'volume' => 18.9, 'market_cap' => '1.78T'],
        'AMZN' => ['name' => 'Amazon.com Inc', 'open' => 144.50, 'high' => 146.90, 'low' => 144.00, 'volume' => 32.1, 'market_cap' => '1.51T'],
        'TSLA' => ['name' => 'Tesla, Inc.', 'open' => 242.50, 'high' => 249.80, 'low' => 241.20, 'volume' => 45.2, 'market_cap' => '789.4B'],
        'NVDA' => ['name' => 'NVIDIA Corp', 'open' => 880.00, 'high' => 902.50, 'low' => 875.30, 'volume' => 38.5, 'market_cap' => '2.21T'],
        'META' => ['name' => 'Meta Platforms', 'open' => 482.00, 'high' => 488.50, 'low' => 480.00, 'volume' => 22.3, 'market_cap' => '1.23T'],
        'NFLX' => ['name' => 'Netflix Inc.', 'open' => 615.00, 'high' => 625.00, 'low' => 612.00, 'volume' => 8.7, 'market_cap' => '267.5B'],
    ];

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
     * Calculate cash available for buying stocks (balance + profits ONLY - no stocks)
     * You cannot use stocks value to buy more stocks
     */
    private function getCashAvailableForBuying($user)
    {
        // ONLY cash - no stocks value
        return $user->balance + ($user->total_profits ?? 0);
    }

    /**
     * Calculate total net worth (balance + profits + stocks value)
     * This is for display purposes only
     */
    private function getTotalNetWorth($user)
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

    public function index(Request $request)
    {
        $symbol = $request->get('symbol', 'TSLA');
        $stock = $this->getStockData($symbol);
        $portfolio = $this->getUserPortfolio();
        $cashAvailable = $this->getCashAvailableForBuying(Auth::user());
        $totalNetWorth = $this->getTotalNetWorth(Auth::user());
        $recentTransactions = StockTransaction::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.stock-trading', compact('stock', 'portfolio', 'recentTransactions', 'cashAvailable', 'totalNetWorth'));
    }

    public function buy(Request $request)
    {
        try {
            $request->validate([
                'symbol' => 'required|string',
                'quantity' => 'required|numeric|min:0.01',
                'order_type' => 'required|in:market,limit,stop',
            ]);

            $user = Auth::user();
            $stock = $this->getStockData($request->symbol);
            $quantity = (float) $request->quantity;
            $totalCost = $quantity * $stock['price'];
            
            // Get cash available for buying (balance + profits ONLY)
            $cashAvailable = $this->getCashAvailableForBuying($user);
            
            Log::info('Buy request - Balance check', [
                'user_id' => $user->id,
                'main_balance' => $user->balance,
                'total_profits' => $user->total_profits ?? 0,
                'cash_available' => $cashAvailable,
                'total_cost' => $totalCost
            ]);

            // Check if user has enough CASH to buy
            if ($totalCost > $cashAvailable) {
                return response()->json([
                    'success' => false,
                    'message' => "Insufficient cash available. Required: $" . number_format($totalCost, 2) . ", Available Cash: $" . number_format($cashAvailable, 2)
                ], 200);
            }

            DB::beginTransaction();

            // Deduct from main balance first
            $deductFromMain = min($totalCost, $user->balance);
            $deductFromProfits = $totalCost - $deductFromMain;
            
            // Update main balance
            $oldBalance = $user->balance;
            $user->balance -= $deductFromMain;
            
            // Update profits if needed
            if ($deductFromProfits > 0) {
                if (isset($user->total_profits) && $user->total_profits > 0) {
                    $user->total_profits -= $deductFromProfits;
                    if ($user->total_profits < 0) $user->total_profits = 0;
                }
            }
            
            $user->save();

            // Record stock transaction
            $transaction = StockTransaction::create([
                'user_id' => $user->id,
                'symbol' => $request->symbol,
                'company_name' => $stock['name'],
                'type' => 'buy',
                'quantity' => $quantity,
                'price_per_share' => $stock['price'],
                'total_amount' => $totalCost,
                'order_type' => $request->order_type,
                'status' => 'completed',
            ]);

            // Update portfolio
            $portfolio = StockPortfolio::where('user_id', $user->id)
                ->where('symbol', $request->symbol)
                ->first();

            if ($portfolio) {
                $totalShares = $portfolio->quantity + $quantity;
                $totalValue = ($portfolio->quantity * $portfolio->average_price) + $totalCost;
                $newAveragePrice = $totalValue / $totalShares;

                $portfolio->quantity = $totalShares;
                $portfolio->average_price = $newAveragePrice;
                $portfolio->save();
            } else {
                StockPortfolio::create([
                    'user_id' => $user->id,
                    'symbol' => $request->symbol,
                    'company_name' => $stock['name'],
                    'quantity' => $quantity,
                    'average_price' => $stock['price'],
                ]);
            }

            // Create transaction record
            Transaction::create([
                'user_id' => $user->id,
                'type' => 'stock_purchase',
                'amount' => $totalCost,
                'balance_before' => $oldBalance,
                'balance_after' => $user->balance,
                'status' => 'completed',
                'reference' => 'STOCK-BUY-' . strtoupper(uniqid()),
                'description' => "Bought {$quantity} shares of {$request->symbol} at $" . number_format($stock['price'], 2),
                'metadata' => json_encode([
                    'symbol' => $request->symbol,
                    'quantity' => $quantity,
                    'price' => $stock['price'],
                    'deducted_from_main' => $deductFromMain,
                    'deducted_from_profits' => $deductFromProfits
                ])
            ]);

            DB::commit();

            $newCashAvailable = $this->getCashAvailableForBuying($user);
            $newTotalNetWorth = $this->getTotalNetWorth($user);

            $message = "Successfully bought {$quantity} shares of {$request->symbol} for $" . number_format($totalCost, 2);
            if ($deductFromProfits > 0) {
                $message .= " (Used $" . number_format($deductFromProfits, 2) . " from your profits)";
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'new_balance' => $user->balance,
                'new_cash_available' => $newCashAvailable,
                'new_total_net_worth' => $newTotalNetWorth,
                'deducted_from_main' => $deductFromMain,
                'deducted_from_profits' => $deductFromProfits,
                'transaction' => $transaction,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . $e->getMessage()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Buy transaction failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Transaction failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function sell(Request $request)
    {
        try {
            $request->validate([
                'symbol' => 'required|string',
                'quantity' => 'required|numeric|min:0.01',
                'order_type' => 'required|in:market,limit,stop',
            ]);

            $user = Auth::user();
            $stock = $this->getStockData($request->symbol);
            $quantity = (float) $request->quantity;

            $portfolio = StockPortfolio::where('user_id', $user->id)
                ->where('symbol', $request->symbol)
                ->first();

            if (!$portfolio || $portfolio->quantity < $quantity) {
                return response()->json([
                    'success' => false,
                    'message' => "Insufficient shares. You own " . ($portfolio ? $portfolio->quantity : 0) . " shares of {$request->symbol}"
                ], 200);
            }

            $totalValue = $quantity * $stock['price'];

            DB::beginTransaction();

            $oldBalance = $user->balance;
            $user->balance += $totalValue;
            $user->save();

            $transaction = StockTransaction::create([
                'user_id' => $user->id,
                'symbol' => $request->symbol,
                'company_name' => $stock['name'],
                'type' => 'sell',
                'quantity' => $quantity,
                'price_per_share' => $stock['price'],
                'total_amount' => $totalValue,
                'order_type' => $request->order_type,
                'status' => 'completed',
            ]);

            Transaction::create([
                'user_id' => $user->id,
                'type' => 'stock_sale',
                'amount' => $totalValue,
                'balance_before' => $oldBalance,
                'balance_after' => $user->balance,
                'status' => 'completed',
                'reference' => 'STOCK-SELL-' . strtoupper(uniqid()),
                'description' => "Sold {$quantity} shares of {$request->symbol} at $" . number_format($stock['price'], 2),
                'metadata' => json_encode([
                    'symbol' => $request->symbol,
                    'quantity' => $quantity,
                    'price' => $stock['price']
                ])
            ]);

            $newQuantity = $portfolio->quantity - $quantity;

            if ($newQuantity <= 0) {
                $portfolio->delete();
            } else {
                $portfolio->quantity = $newQuantity;
                $portfolio->save();
            }

            DB::commit();

            $newCashAvailable = $this->getCashAvailableForBuying($user);
            $newTotalNetWorth = $this->getTotalNetWorth($user);

            return response()->json([
                'success' => true,
                'message' => "Successfully sold {$quantity} shares of {$request->symbol} for $" . number_format($totalValue, 2),
                'new_balance' => $user->balance,
                'new_cash_available' => $newCashAvailable,
                'new_total_net_worth' => $newTotalNetWorth,
                'transaction' => $transaction,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . $e->getMessage()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Sell transaction failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Transaction failed: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function getStockQuote(Request $request)
    {
        $symbol = $request->get('symbol', 'TSLA');
        $stock = $this->getStockData($symbol);
        $cashAvailable = $this->getCashAvailableForBuying(Auth::user());
        $totalNetWorth = $this->getTotalNetWorth(Auth::user());
        
        return response()->json([
            'success' => true,
            'stock' => $stock,
            'cash_available' => $cashAvailable,
            'total_net_worth' => $totalNetWorth,
            'main_balance' => Auth::user()->balance,
            'total_profits' => Auth::user()->total_profits ?? 0
        ]);
    }

    public function history()
    {
        $userId = Auth::id();
        
        $transactions = StockTransaction::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $portfolioData = $this->getUserPortfolio();
        
        $totalInvested = 0;
        $totalCurrentValue = 0;
        
        foreach ($portfolioData as $item) {
            $totalInvested += $item['invested'];
            $totalCurrentValue += $item['current_value'];
        }
        
        $totalProfitLoss = $totalCurrentValue - $totalInvested;
        $cashAvailable = $this->getCashAvailableForBuying(Auth::user());
        $totalNetWorth = $this->getTotalNetWorth(Auth::user());
        
        return view('dashboard.stock-history', compact('transactions', 'portfolioData', 'totalInvested', 'totalCurrentValue', 'totalProfitLoss', 'cashAvailable', 'totalNetWorth'));
    }

    private function getUserPortfolio()
    {
        $userId = Auth::id();
        $portfolio = StockPortfolio::where('user_id', $userId)->get();
        
        $result = [];
        foreach ($portfolio as $holding) {
            $currentPrice = $this->getCurrentPrice($holding->symbol);
            $currentValue = $holding->quantity * $currentPrice;
            $invested = $holding->quantity * $holding->average_price;
            $profitLoss = $currentValue - $invested;
            $profitLossPercent = $invested > 0 ? ($profitLoss / $invested) * 100 : 0;
            $priceChangePercent = $holding->average_price > 0 ? (($currentPrice - $holding->average_price) / $holding->average_price) * 100 : 0;
            
            $result[] = [
                'symbol' => $holding->symbol,
                'company_name' => $holding->company_name,
                'quantity' => $holding->quantity,
                'average_price' => $holding->average_price,
                'current_price' => $currentPrice,
                'current_value' => $currentValue,
                'invested' => $invested,
                'profit_loss' => $profitLoss,
                'profit_loss_percent' => $profitLossPercent,
                'price_change_percent' => $priceChangePercent,
            ];
        }
        
        return $result;
    }

    private function getStockData($symbol)
    {
        $symbol = strtoupper($symbol);
        $currentPrice = $this->getCurrentPrice($symbol);
        
        if (isset($this->stocks[$symbol])) {
            return [
                'symbol' => $symbol,
                'name' => $this->stocks[$symbol]['name'],
                'price' => $currentPrice,
                'open' => $this->stocks[$symbol]['open'],
                'high' => $this->stocks[$symbol]['high'],
                'low' => $this->stocks[$symbol]['low'],
                'previous_close' => $currentPrice - 0.50,
                'volume' => $this->stocks[$symbol]['volume'],
                'market_cap' => $this->stocks[$symbol]['market_cap'],
            ];
        }
        
        return [
            'symbol' => 'TSLA',
            'name' => 'Tesla, Inc.',
            'price' => $currentPrice,
            'open' => 242.50,
            'high' => 249.80,
            'low' => 241.20,
            'previous_close' => $currentPrice - 0.50,
            'volume' => 45.2,
            'market_cap' => '789.4B',
        ];
    }

    private function getCurrentPrice($symbol)
    {
        $cacheKey = "stock_price_{$symbol}";
        
        if (Cache::has($cacheKey)) {
            return (float) Cache::get($cacheKey);
        }
        
        $defaultPrices = [
            'AAPL' => 175.50,
            'MSFT' => 420.75,
            'GOOGL' => 140.25,
            'AMZN' => 145.80,
            'TSLA' => 245.50,
            'NVDA' => 895.20,
            'META' => 485.30,
            'NFLX' => 620.40,
        ];
        
        return $defaultPrices[$symbol] ?? 100.00;
    }
}
