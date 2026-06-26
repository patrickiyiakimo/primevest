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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

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
        
        $recentUsers = User::latest()->take(50)->get();
        
        // KYC Statistics
        $pendingKYC = User::where('kyc_status', 'pending')->count();
        $verifiedKYC = User::where('kyc_status', 'verified')->count();
        $notSubmittedKYC = User::where('kyc_status', 'not_submitted')->count();
        $rejectedKYC = User::where('kyc_status', 'rejected')->count();
        
        $pendingKYCSumbissions = User::where('kyc_status', 'pending')
            ->latest()
            ->take(10)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalBalance', 
            'pendingDepositsCount', 
            'totalDepositsAmount',
            'pendingDeposits',
            'recentUsers',
            'pendingKYC',
            'verifiedKYC',
            'notSubmittedKYC',
            'rejectedKYC',
            'pendingKYCSumbissions'
        ));
    }
    
    // ============================================
    // KYC MANAGEMENT METHODS
    // ============================================
    
    public function kycSubmissions()
    {
        $pendingSubmissions = User::where('kyc_status', 'pending')
            ->orderBy('kyc_submitted_at', 'desc')
            ->get();
        
        $verifiedSubmissions = User::where('kyc_status', 'verified')
            ->orderBy('kyc_verified_at', 'desc')
            ->take(20)
            ->get();
        
        $rejectedSubmissions = User::where('kyc_status', 'rejected')
            ->orderBy('updated_at', 'desc')
            ->take(20)
            ->get();
        
        return view('admin.kyc-submissions', compact('pendingSubmissions', 'verifiedSubmissions', 'rejectedSubmissions'));
    }
    
    public function viewKycSubmission($id)
    {
        $user = User::findOrFail($id);
        
        // Check if user has submitted KYC documents
        if (!$user->kyc_document_front && !$user->kyc_document_back) {
            return redirect()->back()->with('error', 'No KYC documents found for this user.');
        }
        
        return view('admin.kyc-view', compact('user'));
    }
    
   public function approveKyc($id)
{
    $user = User::findOrFail($id);
    
    $user->kyc_status = 'verified';
    $user->kyc_verified_at = now();
    $user->kyc_rejection_reason = null;
    $user->save();
    
    // === ADDED: Send email notification to user ===
    try {
        Mail::to($user->email)->send(new \App\Mail\KycStatusMail($user, 'verified'));
    } catch (\Exception $e) {
        \Log::error('Failed to send KYC approval email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
    return redirect()->back()->with('success', 'KYC approved successfully for ' . $user->name);
}
    
   public function rejectKyc(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    $request->validate([
        'rejection_reason' => 'required|string|min:5'
    ]);
    
    $user->kyc_status = 'rejected';
    $user->kyc_rejection_reason = $request->rejection_reason;
    $user->save();
    
    // === ADDED: Send email notification to user ===
    try {
        Mail::to($user->email)->send(new \App\Mail\KycStatusMail($user, 'rejected', $request->rejection_reason));
    } catch (\Exception $e) {
        \Log::error('Failed to send KYC rejection email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
    return redirect()->back()->with('success', 'KYC rejected for ' . $user->name);
}
    
    public function downloadKycDocument($id, $type)
    {
        $user = User::findOrFail($id);
        
        if ($type == 'front') {
            $path = $user->kyc_document_front;
            $filename = $user->name . '_document_front.' . pathinfo($path, PATHINFO_EXTENSION);
        } elseif ($type == 'back') {
            $path = $user->kyc_document_back;
            $filename = $user->name . '_document_back.' . pathinfo($path, PATHINFO_EXTENSION);
        } else {
            return redirect()->back()->with('error', 'Invalid document type');
        }
        
        if (!$path || !Storage::disk('public')->exists($path)) {
            return redirect()->back()->with('error', 'Document not found');
        }
        
        return Storage::disk('public')->download($path, $filename);
    }
    
    // ============================================
    // EXISTING METHODS (unchanged)
    // ============================================
    
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
    $deposit->approved_at = now();
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
    
    // === ADDED: Send email notification to user ===
    try {
        Mail::to($user->email)->send(new \App\Mail\DepositStatusMail($deposit, $user, 'approved'));
    } catch (\Exception $e) {
        \Log::error('Failed to send deposit approval email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
    return redirect()->back()->with('success', 'Deposit approved successfully!');
}
    
   public function rejectDeposit($id)
{
    $deposit = DepositRequest::findOrFail($id);
    $deposit->status = 'rejected';
    $deposit->save();
    
    // === ADDED: Send email notification to user ===
    try {
        $user = $deposit->user;
        Mail::to($user->email)->send(new \App\Mail\DepositStatusMail($deposit, $user, 'rejected'));
    } catch (\Exception $e) {
        \Log::error('Failed to send deposit rejection email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
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
    
    // Create transaction record with ALL required fields
    Transaction::create([
        'user_id' => $user->id,
        'type' => 'withdrawal',
        'amount' => $withdrawal->amount,
        'balance_before' => $oldBalance,
        'balance_after' => $user->balance,
        'profit_before' => $user->total_profits ?? 0,
        'profit_after' => $user->total_profits ?? 0,
        'status' => 'completed',
        'reference' => 'WDL-' . strtoupper(uniqid()),
        'description' => 'Withdrawal via ' . ucfirst($withdrawal->method),
        'payment_method' => $withdrawal->method,
    ]);
    
    // === ADDED: Send email notification to user ===
    try {
        Mail::to($user->email)->send(new \App\Mail\WithdrawalStatusMail($withdrawal, $user, 'approved'));
    } catch (\Exception $e) {
        \Log::error('Failed to send withdrawal approval email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
    return redirect()->back()->with('success', 'Withdrawal approved and processed successfully!');
}

   public function rejectWithdrawal(Request $request, $id)
{
    $withdrawal = WithdrawalRequest::findOrFail($id);
    $withdrawal->status = 'rejected';
    $withdrawal->admin_notes = $request->admin_notes;
    $withdrawal->save();
    
    // === ADDED: Send email notification to user ===
    try {
        $user = $withdrawal->user;
        Mail::to($user->email)->send(new \App\Mail\WithdrawalStatusMail($withdrawal, $user, 'rejected', $request->admin_notes));
    } catch (\Exception $e) {
        \Log::error('Failed to send withdrawal rejection email: ' . $e->getMessage());
    }
    // === END ADDED ===
    
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