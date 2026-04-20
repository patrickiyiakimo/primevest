<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InvestmentController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'plan_name' => 'required|string',
            'amount' => 'required|numeric|min:1000|max:500000',
            'roi' => 'required|numeric',
            'duration' => 'required|string',
            'duration_days' => 'required|integer',
        ]);
        
        // Check if user has enough balance
        if ($validated['amount'] > $user->balance) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance. Please deposit funds first.'
            ], 400);
        }
        
        // Calculate expected return
        $expectedReturn = $validated['amount'] + ($validated['amount'] * $validated['roi'] / 100);
        
        // Create investment record
        $investment = Investment::create([
            'user_id' => $user->id,
            'plan_name' => $validated['plan_name'],
            'amount' => $validated['amount'],
            'roi' => $validated['roi'],
            'expected_return' => $expectedReturn,
            'duration' => $validated['duration'],
            'duration_days' => $validated['duration_days'],
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays($validated['duration_days']),
            'status' => 'active'
        ]);
        
        // Deduct from user balance
        $oldBalance = $user->balance;
        $user->balance -= $validated['amount'];
        $user->save();
        
        // Create transaction record
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'investment',
            'amount' => $validated['amount'],
            'balance_before' => $oldBalance,
            'balance_after' => $user->balance,
            'status' => 'completed',
            'reference' => 'INV-' . strtoupper(uniqid()),
            'description' => 'Investment in ' . $validated['plan_name'],
        ]);
        
        return response()->json([
            'success' => true,
            'message' => "Successfully invested $".number_format($validated['amount'], 2)." in {$validated['plan_name']}!",
            'investment' => $investment
        ]);
    }
}