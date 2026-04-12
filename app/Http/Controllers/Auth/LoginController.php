<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    // Handle login
    public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        // Attempt to login
        if (Auth::attempt($credentials, $request->remember)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();
            
            // Redirect to dashboard
            return redirect()->intended('/dashboard');
        }
        
        // If login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}