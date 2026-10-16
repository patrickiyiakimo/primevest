<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Investment Confirmed</title>
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
        .details {
            background: #f0fdf4;
            border-left: 4px solid #059669;
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
            color: #059669;
        }
    </style>
</head>
<body>
    <div class="container">
        @include('emails.partials.logo')
        <div class="header">
            <h1>Investment Confirmed</h1>
        </div>

        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            <p>Thank you for investing with {{ config('app.name') }}. Your investment has been successfully placed and is now active.</p>

            <div class="details">
                <strong>Investment Details:</strong><br><br>
                <strong>Plan:</strong> {{ $investment->plan_name }}<br>
                <strong>Amount Invested:</strong> <span class="amount">${{ number_format($investment->amount, 2) }}</span><br>
                <strong>ROI:</strong> {{ $investment->roi }}%<br>
                <strong>Expected Return:</strong> ${{ number_format($investment->expected_return, 2) }}<br>
                <strong>Duration:</strong> {{ $investment->duration }}<br>
                <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($investment->start_date)->format('F j, Y g:i A') }}<br>
                <strong>End Date:</strong> {{ \Carbon\Carbon::parse($investment->end_date)->format('F j, Y') }}<br>
                <strong>Status:</strong> <span style="color: #059669;">Active</span>
            </div>

            <p>Your profits will be credited to your account according to the plan schedule. You can track this investment from your dashboard at any time.</p>

            <div style="text-align: center;">
                <a href="{{ url('/investments-history') }}" class="button">View My Investments</a>
            </div>

            <p>If you did not authorize this investment, please contact our support team immediately.</p>
            <p>Best regards,<br><strong>{{ config('app.name') }} Team</strong></p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            <p>This is an automated notification, please do not reply.</p>
        </div>
    </div>
</body>
</html>
