<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositHistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Get deposit transactions with pagination
        $deposits = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Calculate totals
        $totalDeposits = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->sum('amount');
        
        $averageDeposit = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->avg('amount') ?? 0;
        
        $lastDeposit = Transaction::where('user_id', $user->id)
            ->where('type', 'deposit')
            ->latest()
            ->first();
        $lastDepositAmount = $lastDeposit ? $lastDeposit->amount : 0;
        
        // Transform deposits for the view
        $depositsCollection = $deposits->map(function($transaction) {
            return [
                'amount' => $transaction->amount,
                'method' => $transaction->payment_method ?? 'bank_transfer',
                'date' => $transaction->created_at->format('Y-m-d H:i:s'),
                'status' => $transaction->status,
            ];
        });
        
        // Replace the collection with paginated data
        $deposits->setCollection($depositsCollection);
        
        return view('dashboard.deposits-history', compact('deposits', 'totalDeposits', 'averageDeposit', 'lastDepositAmount'));
    }
}