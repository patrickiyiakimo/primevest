<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get only approved withdrawals
        $withdrawals = WithdrawalRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        $totalWithdrawals = WithdrawalRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('amount');
        
        $averageWithdrawal = WithdrawalRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->avg('amount') ?? 0;
        
        $lastWithdrawal = WithdrawalRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->latest()
            ->first();
        $lastWithdrawalAmount = $lastWithdrawal ? $lastWithdrawal->amount : 0;
        
        $pendingCount = WithdrawalRequest::where('user_id', $user->id)
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