<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\AdminKycNotificationMail;

class KYCController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        return view('dashboard.kyc-form', compact('user'));
    }
    
    public function showStatus()
    {
        $user = Auth::user();
        return view('dashboard.kyc-status', compact('user'));
    }
    
    public function submit(Request $request)
    {
        $user = Auth::user();
        
        // Check if user already has pending KYC
        if ($user->kyc_status == 'pending') {
            return redirect()->back()->with('error', 'You already have a pending KYC submission. Please wait for review.');
        }
        
        if ($user->kyc_status == 'verified') {
            return redirect()->back()->with('error', 'Your KYC is already verified.');
        }
        
        $validated = $request->validate([
            'document_type' => 'required|in:passport,drivers_license,national_id',
            'document_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'document_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // Store documents
        $frontPath = $request->file('document_front')->store('kyc/' . $user->id, 'public');
        $backPath = $request->hasFile('document_back') 
            ? $request->file('document_back')->store('kyc/' . $user->id, 'public') 
            : null;
        
        // Update user KYC information
        $user->kyc_document_type = $validated['document_type'];
        $user->kyc_document_front = $frontPath;
        $user->kyc_document_back = $backPath;
        $user->kyc_status = 'pending';
        $user->kyc_submitted_at = now();
        $user->kyc_rejection_reason = null;
        $user->save();
        
        // === ADDED: Send email notification to admins ===
        try {
            $adminEmails = [
                
                'profitmasstrade1@gmail.com',
            ];
            
            Mail::to($adminEmails)->send(new AdminKycNotificationMail($user));
        } catch (\Exception $e) {
            \Log::error('Failed to send admin KYC notification for user ' . $user->id . ': ' . $e->getMessage());
        }
        // === END ADDED ===
        
        return redirect()->route('kyc.status')->with('success', 'KYC documents submitted successfully. Our team will review your application.');
    }
}