<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockPortfolio;
use App\Models\StockTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StockManagementController extends Controller
{
    public function stockPrices()
    {
        $stocks = [
            'AAPL' => 'Apple Inc.',
            'MSFT' => 'Microsoft Corp',
            'GOOGL' => 'Alphabet Inc.',
            'AMZN' => 'Amazon.com Inc',
            'TSLA' => 'Tesla, Inc.',
            'NVDA' => 'NVIDIA Corp',
            'META' => 'Meta Platforms',
            'NFLX' => 'Netflix Inc.',
        ];
        
        $currentPrices = [];
        foreach ($stocks as $symbol => $name) {
            $cacheKey = "stock_price_{$symbol}";
            $currentPrices[$symbol] = Cache::get($cacheKey, $this->getDefaultPrice($symbol));
        }
        
        return view('admin.stock-prices', compact('stocks', 'currentPrices'));
    }

    public function updateStockPrice(Request $request)
    {
        $request->validate([
            'symbol' => 'required|string',
            'price' => 'required|numeric|min:0.01',
        ]);

        $cacheKey = "stock_price_{$request->symbol}";
        Cache::put($cacheKey, $request->price, now()->addDay());
        
        return response()->json([
            'success' => true,
            'message' => "{$request->symbol} price updated to $" . number_format($request->price, 2)
        ]);
    }

    public function updateAllStockPrices(Request $request)
    {
        $prices = $request->input('prices', []);
        
        foreach ($prices as $symbol => $price) {
            if ($price > 0) {
                $cacheKey = "stock_price_{$symbol}";
                Cache::put($cacheKey, $price, now()->addDay());
            }
        }
        
        return response()->json([
            'success' => true,
            'message' => 'All stock prices updated successfully'
        ]);
    }

   public function userPortfolios()
{
    $portfolios = StockPortfolio::with('user')
        ->orderBy('user_id')
        ->get()
        ->groupBy('user_id');
    
    $users = User::whereIn('id', $portfolios->keys())->get()->keyBy('id');
    
    $portfolioData = [];
    
    foreach ($portfolios as $userId => $userPortfolios) {
        $totalInvested = 0;
        $totalCurrentValue = 0;
        $holdings = [];
        
        foreach ($userPortfolios as $holding) {
            $currentPrice = $this->getCurrentPrice($holding->symbol);
            $currentValue = $holding->quantity * $currentPrice;
            $investedValue = $holding->quantity * $holding->average_price;
            $profitLoss = $currentValue - $investedValue;
            
            $totalInvested += $investedValue;
            $totalCurrentValue += $currentValue;
            
            $holdings[] = [
                'symbol' => $holding->symbol,
                'company_name' => $holding->company_name,
                'quantity' => $holding->quantity,
                'avg_price' => $holding->average_price,
                'current_price' => $currentPrice,
                'current_value' => $currentValue,
                'invested' => $investedValue,
                'profit_loss' => $profitLoss,
                'profit_loss_percent' => $investedValue > 0 ? ($profitLoss / $investedValue) * 100 : 0,
            ];
        }
        
        $totalProfitLoss = $totalCurrentValue - $totalInvested;
        
        $portfolioData[] = [
            'user' => $users[$userId] ?? null,
            'total_invested' => $totalInvested,
            'total_current_value' => $totalCurrentValue,
            'total_profit_loss' => $totalProfitLoss,
            'profit_loss_percent' => $totalInvested > 0 ? ($totalProfitLoss / $totalInvested) * 100 : 0,
            'holdings' => $holdings,
        ];
    }
    
    return view('admin.user-portfolios', compact('portfolioData'));
}

    public function stockTransactions(Request $request)
    {
        $transactions = StockTransaction::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        
        $totalBuyVolume = StockTransaction::where('type', 'buy')->sum('total_amount');
        $totalSellVolume = StockTransaction::where('type', 'sell')->sum('total_amount');
        $totalTransactions = StockTransaction::count();
        
        return view('admin.stock-transactions', compact('transactions', 'totalBuyVolume', 'totalSellVolume', 'totalTransactions'));
    }

    private function getCurrentPrice($symbol)
    {
        $cacheKey = "stock_price_{$symbol}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        return $this->getDefaultPrice($symbol);
    }

    private function getDefaultPrice($symbol)
    {
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