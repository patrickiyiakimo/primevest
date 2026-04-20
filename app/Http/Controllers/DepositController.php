<?php

namespace App\Http\Controllers;

use App\Models\DepositRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function request(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'amount' => 'required|numeric|min:20|max:100000',
            'method' => 'required|string',
            'proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ]);
        
        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('deposit_proofs', 'public');
        }
        
        $depositRequest = DepositRequest::create([
            'user_id' => $user->id,
            'amount' => $validated['amount'],
            'method' => $validated['method'],
            'proof_path' => $proofPath,
            'status' => 'pending'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Deposit request submitted successfully!'
        ]);
    }
}