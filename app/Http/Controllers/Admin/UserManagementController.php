<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Loss;
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
        $losses = Loss::where('user_id', $user->id)
            ->with(['admin', 'reversedBy'])
            ->orderByDesc('applied_at')
            ->orderByDesc('id')
            ->take(20)
            ->get();

        return view('admin.users.edit', compact('user', 'losses'));
    }
    
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'transaction_type' => 'required|in:credit,debit,profit,loss',
        'amount' => 'required|numeric|min:0.01',
        'description' => 'nullable|string',
    ]);
    
    $amount = round((float) $validated['amount'], 2);
    $oldBalance = (float) ($user->balance ?? 0);
    $oldProfits = (float) ($user->total_profits ?? 0);
    
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
    elseif ($validated['transaction_type'] === 'loss') {
        // Losses are absorbed by total profits first, then spill onto balance.
        $available = round(max($oldProfits, 0) + max($oldBalance, 0), 2);
        
        if ($amount > $available) {
            return back()->with('error', sprintf(
                'Cannot apply a loss of $%s — %s only has $%s available ($%s profits + $%s balance).',
                number_format($amount, 2),
                $user->name,
                number_format($available, 2),
                number_format(max($oldProfits, 0), 2),
                number_format(max($oldBalance, 0), 2)
            ));
        }
        
        $fromProfit = min(max($oldProfits, 0), $amount);
        $fromBalance = round($amount - $fromProfit, 2);
        
        $user->total_profits = round($oldProfits - $fromProfit, 2);
        $user->balance = round($oldBalance - $fromBalance, 2);
        $type = 'loss';
        $message = sprintf(
            "Applied a loss of $%s to %s — $%s from profits, $%s from balance",
            number_format($amount, 2),
            $user->name,
            number_format($fromProfit, 2),
            number_format($fromBalance, 2)
        );

        // Reversal needs the exact profits/balance split, so persist it.
        $loss = Loss::create([
            'user_id' => $user->id,
            'admin_id' => $request->user()->id,
            'amount' => $amount,
            'profit_deducted' => $fromProfit,
            'balance_deducted' => $fromBalance,
            'reason' => $validated['description'] ?? null,
            'status' => 'applied',
            'applied_at' => now(),
        ]);
    }
    else {
        $user->total_profits = ($user->total_profits ?? 0) + $amount;
        $type = 'profit';
        $message = "Added $".number_format($amount, 2)." as profit to {$user->name}'s account";
    }
    
    $user->save();
    
    // Create transaction record
    $prefix = match ($type) {
        'profit' => 'PROFIT',
        'loss' => 'LOSS',
        default => strtoupper(substr($type, 0, 3)),
    };
    
    Transaction::create([
        'user_id' => $user->id,
        'type' => $type,
        'amount' => $amount,
        'balance_before' => $oldBalance,
        'balance_after' => (float) $user->balance,
        'profit_before' => $oldProfits,
        'profit_after' => (float) ($user->total_profits ?? 0),
        'status' => 'completed',
        'reference' => $prefix . '-' . strtoupper(uniqid()),
        'description' => $validated['description'] ?? $message,
    ]);
    
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
     * Reverse an applied loss and refund the exact profits/balance split.
     */
    public function reverseLoss(Request $request, Loss $loss)
    {
        $validated = $request->validate([
            'reversal_reason' => 'nullable|string|max:500',
        ]);

        if ($loss->isReversed()) {
            return redirect()
                ->route('admin.users.edit', $loss->user_id)
                ->with('error', 'That loss was already reversed.');
        }

        $user = $loss->user;

        $oldBalance = (float) ($user->balance ?? 0);
        $oldProfits = (float) ($user->total_profits ?? 0);

        $user->balance = round($oldBalance + (float) $loss->balance_deducted, 2);
        $user->total_profits = round($oldProfits + (float) $loss->profit_deducted, 2);
        $user->save();

        $loss->update([
            'status' => 'reversed',
            'reversed_at' => now(),
            'reversed_by' => $request->user()->id,
            'reversal_reason' => $validated['reversal_reason'] ?? 'Reversed by admin',
        ]);

        // Compensating ledger entry. The original loss stays "completed" so the
        // PnL history nets the two out instead of showing a phantom gain.
        Transaction::create([
            'user_id' => $user->id,
            'type' => 'loss_reversal',
            'amount' => (float) $loss->amount,
            'balance_before' => $oldBalance,
            'balance_after' => (float) $user->balance,
            'profit_before' => $oldProfits,
            'profit_after' => (float) $user->total_profits,
            'status' => 'completed',
            'reference' => 'LOSS-REV-' . strtoupper(uniqid()),
            'description' => $validated['reversal_reason'] ?? ('Reversal of loss #' . $loss->id),
        ]);

        $message = sprintf(
            'Reversed loss #%d of $%s for %s — refunded $%s to profits and $%s to balance',
            $loss->id,
            number_format((float) $loss->amount, 2),
            $user->name,
            number_format((float) $loss->profit_deducted, 2),
            number_format((float) $loss->balance_deducted, 2)
        );

        try {
            if (class_exists(ManualBalanceMail::class)) {
                Mail::to($user->email)->send(new ManualBalanceMail($user, (float) $loss->amount, $user->balance, 'loss_reversal', $message));
            }
        } catch (\Exception $e) {
            \Log::error('Failed to send loss reversal email: ' . $e->getMessage());
        }

        return redirect()
            ->route('admin.users.edit', $user->id)
            ->with('success', $message);
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