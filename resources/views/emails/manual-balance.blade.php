<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $type == 'credit' ? 'Funds Added' : ($type == 'debit' ? 'Funds Deducted' : 'Profit Added') }}</title>
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
            background: @if($type == 'credit') #059669 @elseif($type == 'debit') #dc2626 @else #f59e0b @endif;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 30px;
        }
        .details {
            background: @if($type == 'credit') #f0fdf4 @elseif($type == 'debit') #fef2f2 @else #fffbeb @endif;
            border-left: 4px solid @if($type == 'credit') #059669 @elseif($type == 'debit') #dc2626 @else #f59e0b @endif;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: @if($type == 'credit') #059669 @elseif($type == 'debit') #dc2626 @else #f59e0b @endif;
        }
        .description-box {
            background: #f9fafb;
            padding: 12px;
            border-radius: 4px;
            margin-top: 10px;
            font-style: italic;
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
            <h1>
                @if($type == 'credit')
                    Funds Added to Your Account
                @elseif($type == 'debit')
                    Funds Deducted from Your Account
                @else
                    Profit Added to Your Account
                @endif
            </h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            @if($type == 'credit')
                <p>Funds have been added to your trading account.</p>
            @elseif($type == 'debit')
                <p>Funds have been deducted from your trading account.</p>
            @else
                <p>Profit has been added to your trading account.</p>
            @endif
            
            <div class="details">
                <strong>Transaction Details:</strong><br><br>
                <strong>Amount:</strong> <span class="amount">${{ number_format($amount, 2) }}</span><br>
                <strong>Date:</strong> {{ $date->format('F j, Y g:i A') }}<br>
                <strong>New Balance:</strong> ${{ number_format($balance, 2) }}
                
                <div class="description-box">
                    <strong>Description/Reason:</strong><br>
                    {{ $description }}
                </div>
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/dashboard/transactions') }}" class="button">View Transaction History</a>
            </div>
            
            @if($type == 'debit')
                <p style="color: #dc2626; font-size: 12px;">If you did not expect this deduction, please contact our support team immediately.</p>
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