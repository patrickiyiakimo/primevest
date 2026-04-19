<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'transaction_type' => 'required|in:credit,debit',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
        ]);
        
        $amount = $validated['amount'];
        
        if ($validated['transaction_type'] === 'credit') {
            $user->balance += $amount;
            $message = "Added $".number_format($amount, 2)." to {$user->name}'s account";
        } else {
            if ($amount > $user->balance) {
                return back()->with('error', 'Cannot deduct more than current balance');
            }
            $user->balance -= $amount;
            $message = "Deducted $".number_format($amount, 2)." from {$user->name}'s account";
        }
        
        $user->save();
        
        return redirect()->route('admin.users')->with('success', $message);
    }
}