<?php

namespace App\Http\Controllers;

use App\Models\CardApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardApplicationController extends Controller
{
    public function submit(Request $request)
    {
        $user = Auth::user();
        
        // Check if user already has a pending application
        $existingApplication = CardApplication::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'processing'])
            ->first();
            
        if ($existingApplication) {
            return response()->json([
                'success' => false,
                'message' => 'You already have a pending card application. Please wait for processing.'
            ], 400);
        }
        
        // Check balance requirement
        if ($user->balance < 2000) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum balance of $2,000 required to apply for a card.'
            ], 400);
        }
        
        $validated = $request->validate([
            'card_type' => 'required|in:visa,mastercard',
            'card_tier' => 'required|in:platinum,gold',
            'delivery_address' => 'required|string',
            'phone' => 'required|string',
            'id_type' => 'required|string',
        ]);
        
        // Create card application
        $application = CardApplication::create([
            'user_id' => $user->id,
            'card_type' => $validated['card_type'],
            'card_tier' => $validated['card_tier'],
            'delivery_address' => $validated['delivery_address'],
            'phone' => $validated['phone'],
            'id_type' => $validated['id_type'],
            'status' => 'pending'
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Card application submitted successfully! Our team will review your application and contact you within 24-48 hours.'
        ]);
    }
}