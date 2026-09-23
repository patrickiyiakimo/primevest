<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CopyTrader;
use App\Models\CopyTraderPerformance;
use App\Models\CopyTradingRequest;
use Illuminate\Http\Request;

class CopyTraderController extends Controller
{
    public function index()
    {
        $traders = CopyTrader::with('performances')->latest()->get();

        return view('admin.copy-traders.index', compact('traders'));
    }

    public function create()
    {
        return view('admin.copy-traders.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        CopyTrader::create($data);

        return redirect()->route('admin.copy-traders.index')->with('success', 'Copy trader created successfully!');
    }

    public function edit(CopyTrader $trader)
    {
        return view('admin.copy-traders.edit', compact('trader'));
    }

    public function update(Request $request, CopyTrader $trader)
    {
        $data = $this->validateData($request);
        $trader->update($data);

        return redirect()->route('admin.copy-traders.index')->with('success', 'Copy trader updated successfully!');
    }

    public function destroy(CopyTrader $trader)
    {
        $trader->delete();

        return redirect()->route('admin.copy-traders.index')->with('success', 'Copy trader removed.');
    }

    public function storePerformance(Request $request, CopyTrader $trader)
    {
        $request->validate([
            'month' => 'required|string|max:20',
            'return_percent' => 'required|numeric',
            'equity' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:255',
        ]);

        CopyTraderPerformance::create([
            'copy_trader_id' => $trader->id,
            'month' => $request->month,
            'return_percent' => $request->return_percent,
            'equity' => $request->equity,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.copy-traders.index')->with('success', 'Performance record added.');
    }

    public function destroyPerformance(CopyTraderPerformance $performance)
    {
        $performance->delete();

        return redirect()->route('admin.copy-traders.index')->with('success', 'Performance record removed.');
    }

    public function requests()
    {
        $requests = CopyTradingRequest::with(['user', 'copyTrader'])->latest()->get();

        return view('admin.copy-traders.requests', compact('requests'));
    }

    public function approveRequest($id)
    {
        $requestModel = CopyTradingRequest::findOrFail($id);
        $requestModel->status = 'approved';
        $requestModel->approved_at = now();
        $requestModel->save();

        return redirect()->back()->with('success', 'Copy trading request approved.');
    }

    public function rejectRequest($id)
    {
        $requestModel = CopyTradingRequest::findOrFail($id);
        $requestModel->status = 'rejected';
        $requestModel->rejected_at = now();
        $requestModel->save();

        return redirect()->back()->with('success', 'Copy trading request rejected.');
    }

    private function validateData(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'display_name' => 'required|string|max:100',
            'avatar_initials' => 'nullable|string|max:4',
            'avatar_color' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'win_rate' => 'nullable|numeric|min:0|max:100',
            'total_roi' => 'nullable|numeric',
            'roi_period' => 'nullable|string|max:40',
            'copiers' => 'nullable|integer|min:0',
            'risk_score' => 'nullable|numeric|min:0|max:100',
            'ytd_return' => 'nullable|numeric',
            'is_featured' => 'nullable',
            'status' => 'nullable|in:active,inactive',
        ]);

        $data['is_featured'] = $request->has('is_featured') ? true : false;

        return $data;
    }
}