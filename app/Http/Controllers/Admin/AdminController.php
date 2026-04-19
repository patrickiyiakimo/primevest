<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalBalance = User::sum('balance');
        $todayDeposits = 0;
        $todayWithdrawals = 0;
        $recentUsers = User::latest()->take(10)->get();
        
        return view('admin.dashboard', compact('totalUsers', 'totalBalance', 'todayDeposits', 'todayWithdrawals', 'recentUsers'));
    }
}