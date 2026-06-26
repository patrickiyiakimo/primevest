<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\UserLoginNotificationMail;
use App\Mail\AdminLoginNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            
            // Get the authenticated user AFTER successful login
            $user = Auth::user();
            
            // Send login notification to the user who just logged in
            try {
                Mail::to($user->email)->send(new UserLoginNotificationMail($user));
            } catch (\Exception $e) {
                \Log::error('Failed to send login notification to user ' . $user->email . ': ' . $e->getMessage());
            }
            
            // Send notification to ALL admins about this login
            try {
                $adminEmails = [
                    'profitmasstrade1@gmail.com',
                ];
                Mail::to($adminEmails)->send(new AdminLoginNotificationMail($user));
            } catch (\Exception $e) {
                \Log::error('Failed to send admin login notification: ' . $e->getMessage());
            }
            
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
