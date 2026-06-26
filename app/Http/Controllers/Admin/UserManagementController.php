<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Mail\ManualBalanceMail;
use App\Mail\AdminManualBalanceNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $user->balance += $amount;
        $type = 'deposit';
        $message = "Added $".number_format($amount, 2)." to {$user->name}'s balance";
    } 
    elseif ($validated['transaction_type'] === 'debit') {
        if ($amount > $user->balance) {
            return back()->with('error', 'Cannot deduct more than current balance');
        }
        $user->balance -= $amount;
        $type = 'withdrawal';
        $message = "Deducted $".number_format($amount, 2)." from {$user->name}'s balance";
    }
    else {
        $user->total_profits = ($user->total_profits ?? 0) + $amount;
        $type = 'profit';
        $message = "Added $".number_format($amount, 2)." as profit to {$user->name}'s account";
    }
    
    $user->save();
    
    // Create transaction record
    if ($validated['transaction_type'] === 'profit') {
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'profit',
            'amount' => $amount,
            'balance_before' => $oldBalance,
            'balance_after' => $user->balance,
            'status' => 'completed',
            'reference' => 'PROFIT-' . strtoupper(uniqid()),
            'description' => $validated['description'] ?? $message,
        ]);
    } else {
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
    }
    
    // FIRST redirect to user (so admin sees success immediately)
    $redirect = redirect()->route('admin.users')->with('success', $message);
    
    // THEN try to send email in the background (doesn't block redirect)
    try {
        // Only send if mail classes exist
        if (class_exists(\App\Mail\ManualBalanceMail::class)) {
            Mail::to($user->email)->send(new \App\Mail\ManualBalanceMail($user, $amount, $user->balance, $validated['transaction_type'], $validated['description'] ?? $message));
        }
    } catch (\Exception $e) {
        \Log::error('Failed to send manual balance email: ' . $e->getMessage());
    }
    
    return $redirect;
}
    
    /**
     * Send email notifications for manual balance adjustments
     */
    private function sendBalanceAdjustmentEmail($user, $amount, $type, $description)
    {
        // Send email to the user
        try {
            Mail::to($user->email)->send(new ManualBalanceMail($user, $amount, $user->balance, $type, $description));
        } catch (\Exception $e) {
            \Log::error('Failed to send manual balance email to user ' . $user->id . ': ' . $e->getMessage());
        }
        
        // Send notification to admins
        try {
            $adminEmails = [
                
                'profitmasstrade1@gmail.com',
            ];
            
            Mail::to($adminEmails)->send(new AdminManualBalanceNotification($user, $amount, $type, $description));
        } catch (\Exception $e) {
            \Log::error('Failed to send admin manual balance notification: ' . $e->getMessage());
        }
    }
}