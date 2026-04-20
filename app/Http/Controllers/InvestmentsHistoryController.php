public function index()
{
    $user = Auth::user();
    
    $investments = Investment::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->paginate(15);
    
    $totalInvested = Investment::where('user_id', $user->id)->sum('amount');
    $activeInvestments = Investment::where('user_id', $user->id)->where('status', 'active')->count();
    $completedInvestments = Investment::where('user_id', $user->id)->where('status', 'completed')->count();
    $totalReturns = Investment::where('user_id', $user->id)->where('status', 'completed')->sum('expected_return');
    
    $roi = $totalInvested > 0 ? ($totalReturns / $totalInvested) * 100 : 0;
    
    // Distribution percentages
    $vipAmount = Investment::where('user_id', $user->id)->where('plan_name', 'VIP Elite Plan')->sum('amount');
    $diamondAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Diamond Plan')->sum('amount');
    $platinumAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Platinum Plan')->sum('amount');
    $goldAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Gold Plan')->sum('amount');
    $silverAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Silver Plan')->sum('amount');
    $starterAmount = Investment::where('user_id', $user->id)->where('plan_name', 'Starter Plan')->sum('amount');
    
    $otherAmount = $totalInvested - ($vipAmount + $diamondAmount + $platinumAmount + $goldAmount + $silverAmount + $starterAmount);
    
    $vipPercentage = $totalInvested > 0 ? round(($vipAmount / $totalInvested) * 100, 1) : 0;
    $diamondPercentage = $totalInvested > 0 ? round(($diamondAmount / $totalInvested) * 100, 1) : 0;
    $platinumPercentage = $totalInvested > 0 ? round(($platinumAmount / $totalInvested) * 100, 1) : 0;
    $goldPercentage = $totalInvested > 0 ? round(($goldAmount / $totalInvested) * 100, 1) : 0;
    $silverPercentage = $totalInvested > 0 ? round(($silverAmount / $totalInvested) * 100, 1) : 0;
    $starterPercentage = $totalInvested > 0 ? round(($starterAmount / $totalInvested) * 100, 1) : 0;
    $otherPercentage = $totalInvested > 0 ? round(($otherAmount / $totalInvested) * 100, 1) : 0;
    
    return view('dashboard.investments-history', compact(
        'investments', 'totalInvested', 'activeInvestments', 'completedInvestments',
        'totalReturns', 'roi', 'vipPercentage', 'diamondPercentage', 'platinumPercentage',
        'goldPercentage', 'silverPercentage', 'starterPercentage', 'otherPercentage'
    ));
}