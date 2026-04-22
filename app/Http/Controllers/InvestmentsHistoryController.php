<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentsHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Make sure we're getting the correct user ID
        \Log::info('User ID: ' . $user->id);
        
        // Get user's investments from database
        $investments = Investment::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        \Log::info('Found investments: ' . $investments->count());
        
        // Calculate summary statistics for this user only
        $totalInvested = Investment::where('user_id', $user->id)->sum('amount');
        $activeInvestments = Investment::where('user_id', $user->id)->where('status', 'active')->count();
        $completedInvestments = Investment::where('user_id', $user->id)->where('status', 'completed')->count();
        $totalReturns = Investment::where('user_id', $user->id)->where('status', 'completed')->sum('expected_return');
        
        // Calculate ROI
        $roi = 0;
        if ($totalInvested > 0) {
            $roi = ($totalReturns / $totalInvested) * 100;
        }
        
        // Calculate distribution percentages for this user only
        $vipAmount = Investment::where('user_id', $user->id)->where('plan_name', 'VIP Elite Plan')->sum('amount');
        $diamondAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Diamond Plan')->sum('amount');
        $platinumAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Platinum Plan')->sum('amount');
        $goldAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Gold Plan')->sum('amount');
        $silverAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Silver Plan')->sum('amount');
        $starterAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Starter Plan')->sum('amount');
        
        $otherAmount = $totalInvested - ($vipAmount + $diamondAmount + $platinumAmount + $goldAmount + $silverAmount + $starterAmount);
        
        $vipPercentage = $totalInvested > 0 ? round(($vipAmount / $totalInvested) * 100, 1) : 0;
        $diamondPercentage = $totalInvested > 0 ? round(($diamondAmount / $totalInvested) * 100, 1) : 0;
        $platinumPercentage = $totalInvested > 0 ? round(($platinumAmount / $totalInvested) * 100, 1) : 0;
        $goldPercentage = $totalInvested > 0 ? round(($goldAmount / $totalInvested) * 100, 1) : 0;
        $silverPercentage = $totalInvested > 0 ? round(($silverAmount / $totalInvested) * 100, 1) : 0;
        $starterPercentage = $totalInvested > 0 ? round(($starterAmount / $totalInvested) * 100, 1) : 0;
        $otherPercentage = $totalInvested > 0 ? round(($otherAmount / $totalInvested) * 100, 1) : 0;
        
        return view('dashboard.investments-history', compact(
            'investments',
            'totalInvested',
            'activeInvestments',
            'completedInvestments',
            'totalReturns',
            'roi',
            'vipPercentage',
            'diamondPercentage',
            'platinumPercentage',
            'goldPercentage',
            'silverPercentage',
            'starterPercentage',
            'otherPercentage'
        ));
    }
}