<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function index()
    {
        return view('dashboard.withdraw');
    }
    
    public function request(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric|min:1000|max:500000',
            'wallet_address' => 'required|string|max:255',
            'network' => 'required|string',
        ]);
        
        // Check if user has sufficient balance
        if ($validated['amount'] > $user->balance) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance.'
            ], 400);
        }
        
        // Create withdrawal request
        $withdrawal = WithdrawalRequest::create([
            'user_id' => $user->id,
            'amount' => $validated['amount'],
            'method' => $validated['method'],
            'wallet_address' => $validated['wallet_address'],
            'network' => $validated['network'],
            'status' => 'pending'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Withdrawal request submitted successfully! Awaiting admin approval.'
        ]);
    }
}