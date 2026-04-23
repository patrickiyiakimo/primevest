<?php

namespace App\Http\Controllers;

use App\Models\ChatHistory;
use App\Models\Transaction;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AISupportController extends Controller
{
    public function ask(Request $request)
    {
        $user = Auth::user();
        $question = strtolower($request->input('question'));
        
        $response = $this->getAIResponse($question, $user);
        
        // Save to database
        ChatHistory::create([
            'user_id' => $user->id,
            'question' => $question,
            'answer' => $response,
        ]);
        
        return response()->json([
            'success' => true,
            'response' => $response
        ]);
    }
    
    public function getHistory()
    {
        $history = ChatHistory::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
            
        return response()->json([
            'success' => true,
            'history' => $history
        ]);
    }
    
    public function clearHistory()
    {
        ChatHistory::where('user_id', Auth::id())->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Chat history cleared successfully'
        ]);
    }
    
    private function getAIResponse($question, $user)
    {
        // FAQs about PrimeVest
        if (str_contains($question, 'what is primevest') || str_contains($question, 'about primevest')) {
            return "PrimeVest is a premier investment platform that offers copy trading on cryptocurrency, stocks, forex, indices, and share CFDs. We provide users with access to global markets and professional trading tools.";
        }
        
        if (str_contains($question, 'how to deposit') || str_contains($question, 'deposit funds')) {
            return "To deposit funds, go to the 'Deposit' section in your dashboard. Select your preferred payment method (Bitcoin, Ethereum, USDT, PayPal, or Bank Transfer), enter the amount, and follow the instructions. Deposits are typically processed within 15-30 minutes.";
        }
        
        if (str_contains($question, 'how to withdraw') || str_contains($question, 'withdraw funds')) {
            return "To withdraw funds, navigate to the 'Withdraw' section. Select your withdrawal method, enter your wallet address, specify the amount (minimum $1,000), and submit your request. Withdrawals are processed within 24 hours after verification.";
        }
        
        if (str_contains($question, 'minimum deposit') || str_contains($question, 'minimum investment')) {
            return "The minimum deposit amount is $20 for most payment methods. For investment plans, minimum amounts vary: Starter Plan ($1,000), Silver Plan ($5,000), Gold Plan ($10,000), Platinum Plan ($25,000), Diamond Plan ($50,000), and VIP Elite Plan ($100,000).";
        }
        
        if (str_contains($question, 'fees') || str_contains($question, 'commission')) {
            return "PrimeVest offers competitive fees with zero commissions on all trades. There are no hidden fees for deposits or withdrawals. Some payment methods may have minimal network fees (gas fees) that are charged by the blockchain network, not by PrimeVest.";
        }
        
        if (str_contains($question, 'security') || str_contains($question, 'safe') || str_contains($question, 'protected')) {
            return "PrimeVest employs bank-level security measures including SSL encryption, two-factor authentication (2FA), cold storage for funds, and regular security audits. Your account is protected with advanced security protocols.";
        }
        
        if (str_contains($question, 'referral') || str_contains($question, 'refer')) {
            return "Our referral program gives you 5% commission on every deposit made by users you refer. Share your unique referral link found in your Profile section. You earn 5% of each deposit made by your referrals!";
        }
        
        if (str_contains($question, 'card application') || str_contains($question, 'debit card')) {
            return "You can apply for a PrimeVest debit card in the 'Card Application' section. Requirements include a minimum balance of $2,000. Once approved, your card will be delivered within 7-10 business days. The card offers 0% foreign fees and up to 5% cashback rewards.";
        }
        
        if (str_contains($question, 'investment plan') || str_contains($question, 'plan')) {
            return "PrimeVest offers 6 investment plans: Starter (3% ROI, $1,000), Silver (8% ROI, $5,000), Gold (7% ROI, $10,000), Platinum (9% ROI, $25,000), Diamond (11% ROI, $50,000), and VIP Elite (15% ROI, $100,000). Each plan has different durations and returns.";
        }
        
        if (str_contains($question, 'how to invest') || str_contains($question, 'start investing')) {
            return "To start investing, go to the 'Invest' section, choose your preferred plan, enter the amount (minimum varies by plan), and confirm. The amount will be deducted from your account balance, and you'll start earning returns based on the plan's ROI.";
        }
        
        if (str_contains($question, 'profit') || str_contains($question, 'earning')) {
            return "Your profits are calculated based on your active investment plans. Each plan has a specific ROI percentage. Profits are automatically credited to your account balance. You can view your earnings history in the 'Earnings History' section.";
        }
        
        if (str_contains($question, 'contact support') || str_contains($question, 'customer support')) {
            return "You can reach our customer support team via email at support@primevest.com or through the Contact page. Our support team is available 24/7 to assist you with any questions or concerns.";
        }
        
        if (str_contains($question, 'verification') || str_contains($question, 'verify account')) {
            return "Account verification helps secure your account. You can verify your account by completing your profile with accurate personal information and submitting the required identification documents in the Profile section.";
        }
        
        if (str_contains($question, 'kyc')) {
            return "KYC (Know Your Customer) verification is required for withdrawals above $10,000. You'll need to provide a valid government-issued ID and proof of address. This is a standard security measure to prevent fraud.";
        }
        
        // Monthly profit report request
        if (str_contains($question, 'monthly report') || str_contains($question, 'profit report') || str_contains($question, 'this month profit')) {
            return $this->getMonthlyProfitReport($user);
        }
        
        if (str_contains($question, 'current balance') || str_contains($question, 'account balance')) {
            return "Your current account balance is **$" . number_format($user->balance, 2) . "**. This includes your available funds for trading and investment.";
        }
        
        if (str_contains($question, 'total invested')) {
            $totalInvested = Investment::where('user_id', $user->id)->sum('amount');
            return "Your total invested amount across all plans is **$" . number_format($totalInvested, 2) . "**.";
        }
        
        if (str_contains($question, 'active investments')) {
            $activeCount = Investment::where('user_id', $user->id)->where('status', 'active')->count();
            return "You currently have **{$activeCount} active investment** plan(s). You can view all your investments in the 'Investments History' section.";
        }
        
        // Default response
        return "I'm here to help! You can ask me about:\n\n• Investment plans and ROI\n• Deposits and withdrawals\n• Account security\n• Card applications\n• Referral program\n• Monthly profit reports\n• Account balance\n\nWhat would you like to know?";
    }
    
    private function getMonthlyProfitReport($user)
    {
        $currentMonth = date('F Y');
        $monthlyProfits = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('amount');
        
        $lastMonth = date('F', strtotime('-1 month'));
        $lastMonthProfits = Transaction::where('user_id', $user->id)
            ->where('type', 'profit')
            ->whereMonth('created_at', date('m', strtotime('-1 month')))
            ->whereYear('created_at', date('Y'))
            ->sum('amount');
        
        $activeInvestments = Investment::where('user_id', $user->id)
            ->where('status', 'active')
            ->get();
        
        $report = "📊 **Monthly Profit Report - {$currentMonth}**\n\n";
        $report .= "💰 **Total Profit This Month:** $" . number_format($monthlyProfits, 2) . "\n\n";
        
        if ($lastMonthProfits > 0) {
            $percentageChange = $lastMonthProfits > 0 ? (($monthlyProfits - $lastMonthProfits) / $lastMonthProfits) * 100 : 100;
            $trend = $percentageChange >= 0 ? "📈 +" . number_format($percentageChange, 1) . "%" : "📉 " . number_format($percentageChange, 1) . "%";
            $report .= "📊 **Compared to last month ({$lastMonth}):** {$trend}\n\n";
        }
        
        $report .= "💼 **Active Investments:** " . $activeInvestments->count() . " plan(s)\n\n";
        
        if ($activeInvestments->count() > 0) {
            $report .= "📋 **Your Active Plans:**\n";
            foreach ($activeInvestments as $investment) {
                $report .= "• {$investment->plan_name}: $" . number_format($investment->amount, 2) . " at {$investment->roi}% ROI\n";
            }
        }
        
        $report .= "\n💡 **Tip:** Keep your investments active to maximize your earnings!";
        
        return $report;
    }
}