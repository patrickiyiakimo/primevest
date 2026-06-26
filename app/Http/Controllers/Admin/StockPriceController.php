<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockPortfolio;
use Illuminate\Http\Request;

class StockPriceController extends Controller
{
    public function index()
    {
        $portfolios = StockPortfolio::with('user')->get();
        return view('admin.stock-prices', compact('portfolios'));
    }
    
    public function updatePrices(Request $request)
    {
        // This would typically update from an API
        // For now, we'll just return success
        return response()->json(['success' => true]);
    }
}