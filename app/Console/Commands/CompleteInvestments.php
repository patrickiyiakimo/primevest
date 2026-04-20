<?php

namespace App\Console\Commands;

use App\Models\Investment;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CompleteInvestments extends Command
{
    protected $signature = 'investments:complete';
    protected $description = 'Complete investments that have reached their end date';

    public function handle()
    {
        $investments = Investment::where('status', 'active')
            ->where('end_date', '<=', Carbon::now())
            ->get();

        foreach ($investments as $investment) {
            // Mark investment as completed
            $investment->status = 'completed';
            $investment->save();

            // Add returns to user balance
            $user = $investment->user;
            $oldBalance = $user->balance;
            $user->balance += $investment->expected_return;
            $user->save();

            // Create transaction record for returns
            Transaction::create([
                'user_id' => $user->id,
                'type' => 'profit',
                'amount' => $investment->expected_return,
                'balance_before' => $oldBalance,
                'balance_after' => $user->balance,
                'status' => 'completed',
                'reference' => 'INV-RET-' . strtoupper(uniqid()),
                'description' => 'Return from ' . $investment->plan_name,
            ]);

            $this->info("Completed investment #{$investment->id} for user {$user->name}");
        }

        $this->info("Completed {$investments->count()} investments");
    }
}