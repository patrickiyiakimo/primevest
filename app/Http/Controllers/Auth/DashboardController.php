<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Calculate profits (example - 10% of balance)
        $profits = $user->balance * 0.10;
        
        // Get last deposit (you'll implement this when you create deposits table)
        $lastDeposit = 0;
        
        // Get last withdrawal (you'll implement this when you create withdrawals table)
        $lastWithdrawal = 0;
        
        return view('dashboard.index', compact('user', 'profits', 'lastDeposit', 'lastWithdrawal'));
    }
}