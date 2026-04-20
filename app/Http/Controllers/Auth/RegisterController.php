<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string',
            'country' => 'nullable|string',
            'ref' => 'nullable|string',
        ]);
        
        // Find referrer if referral code exists
        $referredBy = null;
        if ($request->has('ref') && !empty($request->ref)) {
            $referrer = User::where('referral_code', $request->ref)->first();
            if ($referrer) {
                $referredBy = $referrer->id;
            }
        }
        
        // Generate unique referral code
        $referralCode = Str::random(8);
        
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'balance' => 0,
            'referred_by' => $referredBy,
            'referral_code' => $referralCode,
        ]);
        
        // Log the user in
        Auth::login($user);
        
        return redirect()->route('dashboard');
    }
}