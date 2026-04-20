<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DepositRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBalance = User::sum('balance');
        $pendingDepositsCount = DepositRequest::where('status', 'pending')->count();
        $totalDepositsAmount = Transaction::where('type', 'deposit')->sum('amount');
        
        $pendingDeposits = DepositRequest::where('status', 'pending')
            ->with('user')
            ->latest()
            ->take(10)
            ->get();
        
        $recentUsers = User::latest()->take(10)->get();
        
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalBalance', 
            'pendingDepositsCount', 
            'totalDepositsAmount',
            'pendingDeposits',
            'recentUsers'
        ));
    }
    
    public function deposits()
    {
        $pendingDeposits = DepositRequest::where('status', 'pending')
            ->with('user')
            ->latest()
            ->get();
        
        $approvedDeposits = DepositRequest::where('status', 'approved')
            ->with('user')
            ->latest()
            ->take(20)
            ->get();
        
        return view('admin.deposits', compact('pendingDeposits', 'approvedDeposits'));
    }
    
    public function approveDeposit($id)
{
    $deposit = DepositRequest::findOrFail($id);
    $deposit->status = 'approved';
    $deposit->approved_at = now(); // This creates a Carbon instance
    $deposit->save();
    
    // Add to user's balance
    $user = $deposit->user;
    $oldBalance = $user->balance;
    $user->balance += $deposit->amount;
    $user->save();
    
    // Create transaction record
    Transaction::create([
        'user_id' => $user->id,
        'type' => 'deposit',
        'amount' => $deposit->amount,
        'balance_before' => $oldBalance,
        'balance_after' => $user->balance,
        'status' => 'completed',
        'reference' => 'DEP-' . strtoupper(uniqid()),
        'description' => 'Deposit via ' . ucfirst($deposit->method),
        'payment_method' => $deposit->method,
    ]);
    
    return redirect()->back()->with('success', 'Deposit approved successfully!');
}
    
    public function rejectDeposit($id)
    {
        $deposit = DepositRequest::findOrFail($id);
        $deposit->status = 'rejected';
        $deposit->save();
        
        return redirect()->back()->with('success', 'Deposit rejected successfully!');
    }
}