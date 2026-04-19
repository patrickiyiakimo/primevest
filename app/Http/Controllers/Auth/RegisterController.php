<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    // Handle registration
    public function register(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => null, // Optional field, set to null by default
            'country' => null, // Optional field, set to null by default
            'password' => bcrypt($validated['password']), // Hash the password using bcrypt
            'balance' => 0, // Default balance for new users
        ]);
        
        // Log the user in
        Auth::login($user);
        
        // Redirect to dashboard
        return redirect()->route('dashboard');
    }
}