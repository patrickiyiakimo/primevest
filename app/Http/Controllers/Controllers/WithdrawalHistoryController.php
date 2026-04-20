<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get all withdrawals from the database
        $withdrawals = Withdrawal::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Calculate totals
        $totalWithdrawals = Withdrawal::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('amount');
        
        $averageWithdrawal = Withdrawal::where('user_id', $user->id)
            ->where('status', 'completed')
            ->avg('amount') ?? 0;
        
        $lastWithdrawal = Withdrawal::where('user_id', $user->id)
            ->where('status', 'completed')
            ->latest()
            ->first();
        $lastWithdrawalAmount = $lastWithdrawal ? $lastWithdrawal->amount : 0;
        
        $pendingCount = Withdrawal::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
        
        return view('dashboard.withdrawals-history', compact(
            'withdrawals', 
            'totalWithdrawals', 
            'averageWithdrawal', 
            'lastWithdrawalAmount', 
            'pendingCount'
        ));
    }
}