<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EarningsHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Sample earnings data - replace with your actual database queries
        $earnings = [
            [
                'source' => 'investment',
                'amount' => 250.00,
                'type' => 'crypto',
                'date' => '2024-01-15 14:30:00',
                'status' => 'credited'
            ],
            [
                'source' => 'referral',
                'amount' => 150.00,
                'type' => 'bonus',
                'date' => '2024-01-14 09:15:00',
                'status' => 'credited'
            ],
            [
                'source' => 'investment',
                'amount' => 89.50,
                'type' => 'stock',
                'date' => '2024-01-12 16:45:00',
                'status' => 'credited'
            ],
            [
                'source' => 'dividend',
                'amount' => 45.00,
                'type' => 'stock',
                'date' => '2024-01-10 12:00:00',
                'status' => 'credited'
            ],
            [
                'source' => 'investment',
                'amount' => 120.75,
                'type' => 'forex',
                'date' => '2024-01-08 10:30:00',
                'status' => 'credited'
            ],
            [
                'source' => 'bonus',
                'amount' => 500.00,
                'type' => 'welcome',
                'date' => '2024-01-05 08:00:00',
                'status' => 'credited'
            ],
            [
                'source' => 'referral',
                'amount' => 75.00,
                'type' => 'commission',
                'date' => '2024-01-03 14:20:00',
                'status' => 'credited'
            ],
            [
                'source' => 'investment',
                'amount' => 200.00,
                'type' => 'crypto',
                'date' => '2024-01-01 11:00:00',
                'status' => 'credited'
            ],
        ];
        
        // Calculate summary statistics
        $totalEarnings = array_sum(array_column($earnings, 'amount'));
        $averageEarnings = count($earnings) > 0 ? $totalEarnings / count($earnings) : 0;
        
        // Calculate monthly earnings (current month)
        $currentMonth = date('Y-m');
        $monthlyEarnings = array_sum(array_filter(array_column($earnings, 'amount'), function($key) use ($earnings, $currentMonth) {
            return substr($earnings[$key]['date'], 0, 7) == $currentMonth;
        }, ARRAY_FILTER_USE_KEY));
        
        // Calculate today's earnings
        $today = date('Y-m-d');
        $todayEarnings = array_sum(array_filter(array_column($earnings, 'amount'), function($key) use ($earnings, $today) {
            return substr($earnings[$key]['date'], 0, 10) == $today;
        }, ARRAY_FILTER_USE_KEY));
        
        return view('dashboard.earnings-history', compact('earnings', 'totalEarnings', 'averageEarnings', 'monthlyEarnings', 'todayEarnings'));
    }
}