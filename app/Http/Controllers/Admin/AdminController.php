<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DepositRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\WithdrawalRequest;
use App\Models\CardApplication;

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

    public function investments()
    {
    $investments = Investment::with('user')
        ->latest()
        ->paginate(20);
    
    $totalInvested = Investment::sum('amount');
    $activeInvestments = Investment::where('status', 'active')->count();
    $completedInvestments = Investment::where('status', 'completed')->count();
    $totalReturns = Investment::where('status', 'completed')->sum('expected_return');
    
    return view('admin.investments', compact(
        'investments', 
        'totalInvested', 
        'activeInvestments', 
        'completedInvestments', 
        'totalReturns'
    ));
    }

public function withdrawals()
{
    $pendingWithdrawals = WithdrawalRequest::where('status', 'pending')
        ->with('user')
        ->latest()
        ->get();
    
    $approvedWithdrawals = WithdrawalRequest::where('status', 'approved')
        ->with('user')
        ->latest()
        ->take(20)
        ->get();
    
    $rejectedWithdrawals = WithdrawalRequest::where('status', 'rejected')
        ->with('user')
        ->latest()
        ->take(10)
        ->get();
    
    $totalPending = WithdrawalRequest::where('status', 'pending')->sum('amount');
    $totalApproved = WithdrawalRequest::where('status', 'approved')->sum('amount');
    
    return view('admin.withdrawals', compact(
        'pendingWithdrawals', 
        'approvedWithdrawals', 
        'rejectedWithdrawals',
        'totalPending',
        'totalApproved'
    ));
}

public function approveWithdrawal($id)
{
    $withdrawal = WithdrawalRequest::findOrFail($id);
    $user = $withdrawal->user;
    
    // Check if user has sufficient balance
    if ($withdrawal->amount > $user->balance) {
        return redirect()->back()->with('error', 'Insufficient user balance to process this withdrawal.');
    }
    
    // Update withdrawal status
    $withdrawal->status = 'approved';
    $withdrawal->approved_at = now();
    $withdrawal->save();
    
    // Deduct from user's balance
    $oldBalance = $user->balance;
    $user->balance -= $withdrawal->amount;
    $user->save();
    
    // Create transaction record
    Transaction::create([
        'user_id' => $user->id,
        'type' => 'withdrawal',
        'amount' => $withdrawal->amount,
        'balance_before' => $oldBalance,
        'balance_after' => $user->balance,
        'status' => 'completed',
        'reference' => 'WDL-' . strtoupper(uniqid()),
        'description' => 'Withdrawal via ' . ucfirst($withdrawal->method),
        'payment_method' => $withdrawal->method,
    ]);
    
    return redirect()->back()->with('success', 'Withdrawal approved and processed successfully!');
}

public function rejectWithdrawal(Request $request, $id)
{
    $withdrawal = WithdrawalRequest::findOrFail($id);
    $withdrawal->status = 'rejected';
    $withdrawal->admin_notes = $request->admin_notes;
    $withdrawal->save();
    
    return redirect()->back()->with('success', 'Withdrawal rejected successfully!');
}

public function cardApplications()
{
    $pendingApplications = CardApplication::where('status', 'pending')
        ->with('user')
        ->latest()
        ->get();
    
    $approvedApplications = CardApplication::where('status', 'approved')
        ->with('user')
        ->latest()
        ->take(20)
        ->get();
    
    $rejectedApplications = CardApplication::where('status', 'rejected')
        ->with('user')
        ->latest()
        ->take(20)
        ->get();
    
    $totalPending = CardApplication::where('status', 'pending')->count();
    
    return view('admin.card-applications', compact('pendingApplications', 'approvedApplications', 'rejectedApplications', 'totalPending'));
}

public function approveCardApplication($id)
{
    $application = CardApplication::findOrFail($id);
    $application->status = 'approved';
    $application->approved_at = now();
    $application->save();
    
    return redirect()->back()->with('success', 'Card application approved successfully!');
}

public function rejectCardApplication(Request $request, $id)
{
    $application = CardApplication::findOrFail($id);
    $application->status = 'rejected';
    $application->admin_notes = $request->admin_notes;
    $application->save();
    
    return redirect()->back()->with('success', 'Card application rejected successfully!');
}
}