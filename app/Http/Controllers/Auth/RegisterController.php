<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\WelcomeNewUserMail;
use App\Mail\NewUserRegistrationAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        $ref = $request->query('ref');
        return view('auth.register', compact('ref'));
    }
    
    public function register(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'referral_code' => 'nullable|string|max:20',
        ]);
        
        // Find referrer if referral code exists
        $referredBy = null;
        $referralCode = $request->input('referral_code');
        
        if (!empty($referralCode)) {
            $referrer = User::where('referral_code', $referralCode)->first();
            if ($referrer) {
                $referredBy = $referrer->id;
            }
        }
        
        // Store the plain password before hashing (for email)
        $plainPassword = $validated['password'];
        
        // Generate unique referral code for the new user
        $newReferralCode = User::generateReferralCode();
        
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
            'balance' => 0,
            'referred_by' => $referredBy,
            'referral_code' => $newReferralCode,
        ]);
        
        // Send welcome email to the new user
        try {
            Mail::to($user->email)->send(new WelcomeNewUserMail($user, $plainPassword));
        } catch (\Exception $e) {
            // Log error but don't stop registration
            \Log::error('Failed to send welcome email to ' . $user->email . ': ' . $e->getMessage());
        }
        
        // Send admin notification email
        try {
            $adminEmail = env('ADMIN_EMAIL', 'profitmasstrade1@gmail.com');
            Mail::to($adminEmail)->send(new NewUserRegistrationAdminMail($user, $plainPassword));
        } catch (\Exception $e) {
            // Log error but don't stop registration
            \Log::error('Failed to send admin notification email: ' . $e->getMessage());
        }
        
        // Log the user in
        Auth::login($user);
        
        return redirect()->route('dashboard')->with('success', 'Welcome to Profit Mass Trade! Your account has been created successfully. A welcome email has been sent to your inbox.');
    }
}