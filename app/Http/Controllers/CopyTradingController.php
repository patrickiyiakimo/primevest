<?php

namespace App\Http\Controllers;

use App\Models\CopyTrader;
use App\Models\CopyTradingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopyTradingController extends Controller
{
    public function index()
    {
        $traders = CopyTrader::with('performances')
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('dashboard.copy-traders', compact('traders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'copy_trader_id' => 'required|exists:copy_traders,id',
            'amount' => 'required|numeric|min:1',
        ]);

        CopyTradingRequest::create([
            'user_id' => Auth::id(),
            'copy_trader_id' => $request->copy_trader_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('copy-traders')->with('success', 'Copy trading request submitted — pending approval.');
    }
}