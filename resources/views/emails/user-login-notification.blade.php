<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Login to Your Account</title>
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
            background: linear-gradient(135deg, #059669, #047857);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .alert-box {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .login-details {
            background: #f0fdf4;
            border-left: 4px solid #059669;
            padding: 15px;
            margin: 20px 0;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Login Detected</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>We noticed a new login to your {{ config('app.name') }} account.</p>
            
            <div class="login-details">
                <strong>Login Details:</strong><br><br>
                <strong>Time:</strong> {{ $loginTime->format('F j, Y g:i A') }}<br>
                <strong>IP Address:</strong> {{ $ipAddress }}<br>
                <strong>Browser:</strong> {{ $userAgent }}<br>
                <strong>Email:</strong> {{ $user->email }}
            </div>
            
            <div class="alert-box">
                ⚠️ <strong>If this wasn't you:</strong><br>
                Please reset your password immediately by clicking the button below and contact our support team.
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/password/reset') }}" class="button">Reset Your Password</a>
            </div>
            
            <p>If this was you, you can safely ignore this email.</p>
            <p>Best regards,<br><strong>{{ config('app.name') }} Security Team</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>This is an automated security notification.</p>
        </div>
    </div>
</body>
</html>