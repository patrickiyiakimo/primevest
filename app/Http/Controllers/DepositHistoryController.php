<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Sample deposit data - replace with your actual database queries
        $deposits = [
            [
                'amount' => 1000.00,
                'method' => 'bitcoin',
                'date' => '2024-01-15 14:30:00',
                'status' => 'completed'
            ],
            [
                'amount' => 500.00,
                'method' => 'ethereum',
                'date' => '2024-01-10 09:15:00',
                'status' => 'completed'
            ],
            [
                'amount' => 2500.00,
                'method' => 'bank_transfer',
                'date' => '2024-01-05 11:45:00',
                'status' => 'completed'
            ],
            [
                'amount' => 750.00,
                'method' => 'paypal',
                'date' => '2023-12-28 16:20:00',
                'status' => 'completed'
            ],
            [
                'amount' => 2000.00,
                'method' => 'usdt_erc20',
                'date' => '2023-12-20 10:00:00',
                'status' => 'completed'
            ],
        ];
        
        $totalDeposits = array_sum(array_column($deposits, 'amount'));
        $averageDeposit = count($deposits) > 0 ? $totalDeposits / count($deposits) : 0;
        $lastDepositAmount = count($deposits) > 0 ? $deposits[0]['amount'] : 0;
        
        return view('dashboard.deposits-history', compact('deposits', 'totalDeposits', 'averageDeposit', 'lastDepositAmount'));
    }
}