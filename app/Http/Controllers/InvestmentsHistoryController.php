<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentsHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Sample investments data - replace with your actual database queries
        $investments = [
            [
                'plan' => 'VIP Elite',
                'amount' => 100000,
                'roi' => 15,
                'expected_return' => 115000,
                'start_date' => '2024-01-01',
                'end_date' => '2024-01-08',
                'status' => 'active'
            ],
            [
                'plan' => 'Diamond',
                'amount' => 50000,
                'roi' => 11,
                'expected_return' => 55500,
                'start_date' => '2024-01-05',
                'end_date' => '2024-02-05',
                'status' => 'active'
            ],
            [
                'plan' => 'Gold',
                'amount' => 10000,
                'roi' => 7,
                'expected_return' => 10700,
                'start_date' => '2023-12-15',
                'end_date' => '2024-01-05',
                'status' => 'completed'
            ],
            [
                'plan' => 'Silver',
                'amount' => 5000,
                'roi' => 8,
                'expected_return' => 5400,
                'start_date' => '2023-12-20',
                'end_date' => '2024-01-03',
                'status' => 'completed'
            ],
            [
                'plan' => 'Starter',
                'amount' => 1000,
                'roi' => 3,
                'expected_return' => 1030,
                'start_date' => '2024-01-10',
                'end_date' => '2024-02-10',
                'status' => 'pending'
            ],
        ];
        
        // Calculate summary statistics
        $totalInvested = array_sum(array_column($investments, 'amount'));
        $activeInvestments = count(array_filter($investments, function($inv) { return $inv['status'] == 'active'; }));
        $completedInvestments = count(array_filter($investments, function($inv) { return $inv['status'] == 'completed'; }));
        
        $totalReturns = array_sum(array_column($investments, 'expected_return'));
        $roi = $totalInvested > 0 ? (($totalReturns - $totalInvested) / $totalInvested) * 100 : 0;
        
        // Calculate distribution percentages
        $vipAmount = array_sum(array_column(array_filter($investments, function($inv) { return $inv['plan'] == 'VIP Elite'; }), 'amount'));
        $diamondAmount = array_sum(array_column(array_filter($investments, function($inv) { return $inv['plan'] == 'Diamond'; }), 'amount'));
        $platinumAmount = array_sum(array_column(array_filter($investments, function($inv) { return $inv['plan'] == 'Platinum'; }), 'amount'));
        $goldAmount = array_sum(array_column(array_filter($investments, function($inv) { return $inv['plan'] == 'Gold'; }), 'amount'));
        $otherAmount = $totalInvested - ($vipAmount + $diamondAmount + $platinumAmount + $goldAmount);
        
        $vipPercentage = $totalInvested > 0 ? round(($vipAmount / $totalInvested) * 100, 1) : 0;
        $diamondPercentage = $totalInvested > 0 ? round(($diamondAmount / $totalInvested) * 100, 1) : 0;
        $platinumPercentage = $totalInvested > 0 ? round(($platinumAmount / $totalInvested) * 100, 1) : 0;
        $goldPercentage = $totalInvested > 0 ? round(($goldAmount / $totalInvested) * 100, 1) : 0;
        $otherPercentage = $totalInvested > 0 ? round(($otherAmount / $totalInvested) * 100, 1) : 0;
        
        return view('dashboard.investments-history', compact(
            'investments', 'totalInvested', 'activeInvestments', 'completedInvestments', 
            'totalReturns', 'roi', 'vipPercentage', 'diamondPercentage', 
            'platinumPercentage', 'goldPercentage', 'otherPercentage'
        ));
    }
}