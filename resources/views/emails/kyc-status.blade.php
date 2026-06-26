<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>KYC {{ ucfirst($status) }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: white; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .header { background: linear-gradient(135deg, {{ $status == 'verified' ? '#059669' : '#dc2626' }}, {{ $status == 'verified' ? '#047857' : '#b91c1c' }}); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .details { background: {{ $status == 'verified' ? '#f0fdf4' : '#fef2f2' }}; border-left: 4px solid {{ $status == 'verified' ? '#059669' : '#dc2626' }}; padding: 15px; margin: 20px 0; }
        .footer { background: #f9fafb; padding: 20px; text-align: center; color: #6b7280; font-size: 12px; }
        .button { background: #059669; color: white; padding: 12px 24px; text-decoration: none; display: inline-block; margin: 20px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>KYC {{ ucfirst($status) }} {{ $status == 'verified' ? '✓' : '✗' }}</h1>
        </div>
        
        <div class="content">
            <h2>Hello {{ $user->name }},</h2>
            
            @if($status == 'verified')
                <p>Congratulations! Your KYC verification has been <strong>approved</strong>. You now have full access to all features on {{ config('app.name') }}.</p>
            @else
                <p>We regret to inform you that your KYC verification has been <strong>rejected</strong>.</p>
            @endif
            
            <div class="details">
                <strong>KYC Details:</strong><br><br>
                <strong>Status:</strong> {{ ucfirst($status) }}<br>
                <strong>Date:</strong> {{ now()->format('F j, Y g:i A') }}
                
                @if($status == 'rejected' && $reason)
                    <br><br>
                    <strong>Reason for rejection:</strong><br>
                    {{ $reason }}
                    <br><br>
                    <strong>Next Steps:</strong><br>
                    Please submit new KYC documents with correct information.
                @endif
            </div>
            
            @if($status == 'verified')
                <div style="text-align: center;">
                    <a href="{{ url('/dashboard') }}" class="button">Go to Dashboard</a>
                </div>
            @else
                <div style="text-align: center;">
                    <a href="{{ url('/kyc') }}" class="button">Submit New KYC</a>
                </div>
            @endif
            
            <p>Best regards,<br><strong>{{ config('app.name') }} Team</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>