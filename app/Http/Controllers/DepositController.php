<?php

namespace App\Http\Controllers;

use App\Models\DepositRequest;
use App\Models\Transaction;
use App\Mail\DepositConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        
        // Send confirmation email to user
        try {
            Mail::to($user->email)->send(new DepositConfirmationMail($user, $validated['amount'], $validated['method']));
        } catch (\Exception $e) {
            \Log::error('Failed to send deposit confirmation email to ' . $user->email . ': ' . $e->getMessage());
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Deposit request submitted successfully! A confirmation email has been sent to your inbox.'
        ]);
    }
}