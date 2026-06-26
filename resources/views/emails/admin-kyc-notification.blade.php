<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New KYC Submission</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .user-info {
            background: #fef2f2;
            border-left: 4px solid #dc2626;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            color: #6b7280;
            font-size: 12px;
        }
        .button {
            background: #059669;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
            border-radius: 5px;
        }
        .alert-box {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 12px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 New KYC Submission</h1>
            <p>Action Required: Review KYC Documents</p>
        </div>
        
        <div class="content">
            <div class="alert-box">
                ⚠️ <strong>Attention Admin:</strong> A user has submitted their KYC documents for verification.
            </div>
            
            <div class="user-info">
                <strong>👤 User Details:</strong><br><br>
                <strong>Full Name:</strong> {{ $user->name }}<br>
                <strong>Email Address:</strong> {{ $user->email }}<br>
                <strong>User ID:</strong> #{{ $user->id }}<br>
                <strong>Phone:</strong> {{ $user->phone ?? 'Not provided' }}<br>
                <strong>Country:</strong> {{ $user->country ?? 'Not provided' }}<br>
                <strong>Submitted At:</strong> {{ $user->kyc_submitted_at ? $user->kyc_submitted_at->format('F j, Y g:i A') : now()->format('F j, Y g:i A') }}<br>
                <strong>Account Created:</strong> {{ $user->created_at->format('F j, Y') }}
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/admin/kyc/' . $user->id) }}" class="button">Review KYC Documents</a>
            </div>
            
            <div class="alert-box">
                💡 <strong>Quick Actions:</strong><br>
                - Review submitted documents<br>
                - Verify user identity<br>
                - Approve or reject with reason<br>
                - User will be notified automatically
            </div>
            
            <p style="color: #6b7280; font-size: 12px; margin-top: 20px;">
                This is an automated notification from {{ config('app.name') }}.
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Admin Notification</p>
            <p>KYC Verification Required</p>
        </div>
    </div>
</body>
</html>