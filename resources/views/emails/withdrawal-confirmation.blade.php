<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Withdrawal Request Confirmation</title>
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
        .details {
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
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #dc2626;
        }
        .warning {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 12px;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Withdrawal Request Received</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>We have received your withdrawal request and it is now being processed.</p>
            
            <div class="details">
                <strong>Withdrawal Details:</strong><br><br>
                <strong>Amount:</strong> <span class="amount">${{ number_format($amount, 2) }}</span><br>
                <strong>Method:</strong> {{ ucfirst($method) }}<br>
                <strong>Network:</strong> {{ strtoupper($network) }}<br>
                <strong>Wallet Address:</strong> {{ $wallet_address }}<br>
                <strong>Date Submitted:</strong> {{ $date->format('F j, Y g:i A') }}<br>
                <strong>Status:</strong> <span style="color: #f59e0b;">Pending Approval</span>
            </div>
            
            <div class="warning">
                ⚠️ <strong>Important:</strong> Please allow 1-3 business days for processing. You will receive a confirmation email once your withdrawal is completed.
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/dashboard/withdrawals') }}" class="button">View Withdrawal Status</a>
            </div>
            
            <p>If you did not request this withdrawal, please contact our support team immediately.</p>
            <p>Best regards,<br><strong>{{ config('app.name') }} Team</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>This is an automated confirmation, please do not reply.</p>
        </div>
    </div>
</body>
</html>