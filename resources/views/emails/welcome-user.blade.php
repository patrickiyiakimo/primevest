<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to {{ config('app.name') }}</title>
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
            background: #059669;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .info-box {
            background: #f0fdf4;
            border-left: 4px solid #059669;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .step {
            display: flex;
            align-items: center;
            margin: 15px 0;
            padding: 10px;
            background: #f9fafb;
            border-radius: 8px;
        }
        .step-number {
            width: 40px;
            height: 40px;
            background: #059669;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        .step-content {
            flex: 1;
        }
        .step-title {
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 4px;
        }
        .step-desc {
            font-size: 13px;
            color: #6b7280;
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
            font-weight: normal;
        }
        .divider {
            height: 1px;
            background: #e5e7eb;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{ config('app.name') }}</h1>
            <p style="font-size: 16px; opacity: 0.9;">Your trading account is ready</p>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            <p>Thank you for joining {{ config('app.name') }}. Your account has been successfully created and is ready for trading.</p>
            
            <div class="info-box">
                <strong>Account Information:</strong><br><br>
                <strong>Email:</strong> {{ $user->email }}<br><br>
                <strong>Password:</strong> {{ $plainPassword }}<br><br>
                <strong>Registered On:</strong> {{ $user->created_at->format('F j, Y g:i A') }}<br>
            </div>
            
            <h3>Next steps to start trading:</h3>
            
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <div class="step-title">Complete KYC verification</div>
                    <div class="step-desc">Verify your identity to enable withdrawals and full account features</div>
                </div>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <div class="step-title">Make a deposit</div>
                    <div class="step-desc">Fund your account to begin investing and trading</div>
                </div>
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/login') }}" class="button">Access your account</a>
            </div>
            
            <div class="divider"></div>
            
            <h3>Account features:</h3>
            <ul>
                <li>Invest in trading plans</li>
                <li>Copy successful traders</li>
                <li>Trade stocks and cryptocurrencies</li>
                <li>Withdraw earnings</li>
                <li>Track portfolio performance</li>
            </ul>
            
            <p>If you have questions about getting started, our support team is available to help.</p>
            
            <p>Best regards,<br>
            <strong>{{ config('app.name') }} Team</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>This message was sent to {{ $user->email }} because you registered at {{ config('app.name') }}.</p>
            <p>If you did not create this account, please ignore this email.</p>
        </div>
    </div>
</body>
</html>