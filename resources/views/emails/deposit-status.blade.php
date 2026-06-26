<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Deposit {{ ucfirst($status) }}</title>
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
            background: linear-gradient(135deg, {{ $status == 'approved' ? '#059669' : '#dc2626' }}, {{ $status == 'approved' ? '#047857' : '#b91c1c' }});
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .details {
            background: {{ $status == 'approved' ? '#f0fdf4' : '#fef2f2' }};
            border-left: 4px solid {{ $status == 'approved' ? '#059669' : '#dc2626' }};
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: {{ $status == 'approved' ? '#059669' : '#dc2626' }};
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
            <h1>Deposit {{ ucfirst($status) }} {{ $status == 'approved' ? '✓' : '✗' }}</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            @if($status == 'approved')
                <p>Great news! Your deposit request has been <strong>approved</strong> and the funds have been added to your account.</p>
            @else
                <p>We regret to inform you that your deposit request has been <strong>rejected</strong>.</p>
            @endif
            
            <div class="details">
                <strong>Deposit Details:</strong><br><br>
                <strong>Amount:</strong> <span class="amount">${{ number_format($deposit->amount, 2) }}</span><br>
                <strong>Method:</strong> {{ ucfirst($deposit->method) }}<br>
                <strong>Status:</strong> {{ ucfirst($status) }}<br>
                <strong>Date:</strong> {{ $deposit->updated_at->format('F j, Y g:i A') }}
                
                @if($status == 'rejected' && $reason)
                    <br><br>
                    <strong>Reason for rejection:</strong><br>
                    {{ $reason }}
                @endif
            </div>
            
            @if($status == 'approved')
                <p>Your new balance is: <strong>${{ number_format($user->balance, 2) }}</strong></p>
                <div style="text-align: center;">
                    <a href="{{ url('/dashboard/deposits') }}" class="button">View Deposit History</a>
                </div>
            @else
                <div class="warning">
                    ⚠️ <strong>Need help?</strong><br>
                    Please contact our support team if you have any questions about this decision or need assistance with a new deposit.
                </div>
                <div style="text-align: center;">
                    <a href="{{ url('/dashboard/deposits') }}" class="button">Try Again</a>
                </div>
            @endif
            
            <p>Best regards,<br><strong>{{ config('app.name') }} Team</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>This is an automated notification, please do not reply.</p>
        </div>
    </div>
</body>
</html>