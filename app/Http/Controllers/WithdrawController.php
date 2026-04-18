<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
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
            return redirect()->back()->with('error', 'Insufficient balance.')->withInput();
        }
        
        // TODO: Create withdrawal record in database
        // You'll create a withdrawals table later
        
        return redirect()->route('withdraw')->with('success', 'Withdrawal request submitted successfully! Our team will process it within 24 hours.');
    }
}