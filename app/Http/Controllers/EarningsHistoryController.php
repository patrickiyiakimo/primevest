<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EarningsHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get all profit transactions from the database
        $earnings = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Calculate summary statistics
        $totalEarnings = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->sum('amount');
        
        $averageEarnings = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->avg('amount') ?? 0;
        
        // Calculate monthly earnings (current month)
        $currentMonth = date('Y-m');
        $monthlyEarnings = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->whereRaw("strftime('%Y-%m', created_at) = ?", [$currentMonth])
            ->sum('amount');
        
        // Calculate today's earnings
        $today = date('Y-m-d');
        $todayEarnings = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->whereDate('created_at', $today)
            ->sum('amount');
        
        return view('dashboard.earnings-history', compact(
            'earnings', 
            'totalEarnings', 
            'averageEarnings', 
            'monthlyEarnings', 
            'todayEarnings'
        ));
    }
}