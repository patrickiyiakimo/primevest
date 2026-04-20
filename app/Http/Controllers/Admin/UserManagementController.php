<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }
        
        $users = $query->latest()->paginate(20);
        
        return view('admin.users.index', compact('users'));
    }
    
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'transaction_type' => 'required|in:credit,debit,profit',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
        ]);
        
        $amount = $validated['amount'];
        $oldBalance = $user->balance;
        $oldProfits = $user->total_profits ?? 0;
        
        if ($validated['transaction_type'] === 'credit') {
            // Add to main balance only
            $user->balance += $amount;
            $type = 'deposit';
            $message = "Added $".number_format($amount, 2)." to {$user->name}'s balance";
        } 
        elseif ($validated['transaction_type'] === 'debit') {
            // Deduct from main balance only
            if ($amount > $user->balance) {
                return back()->with('error', 'Cannot deduct more than current balance');
            }
            $user->balance -= $amount;
            $type = 'withdrawal';
            $message = "Deducted $".number_format($amount, 2)." from {$user->name}'s balance";
        }
        else {
            // Add to profits only (does not affect main balance)
            $user->total_profits = ($user->total_profits ?? 0) + $amount;
            $type = 'profit';
            $message = "Added $".number_format($amount, 2)." as profit to {$user->name}'s account";
        }
        
        $user->save();
        
        // Create transaction record (without profit columns)
        Transaction::create([
            'user_id' => $user->id,
            'type' => $type,
            'amount' => $amount,
            'balance_before' => $oldBalance,
            'balance_after' => $user->balance,
            'status' => 'completed',
            'reference' => strtoupper(substr($type, 0, 3)) . '-' . strtoupper(uniqid()),
            'description' => $validated['description'] ?? $message,
        ]);
        
        return redirect()->route('admin.users')->with('success', $message);
    }
}