<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New User Registration</title>
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
        }
        .footer {
            background: #f9fafb;
            padding: 20px;
            text-align: center;
            color: #6b7280;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New User Registration</h1>
        </div>
        
        <div class="content">
            <p>A new user has registered on {{ config('app.name') }}.</p>
            
            <div class="user-info">
                <strong>User Details:</strong><br><br>
                <strong>Name:</strong> {{ $user->name }}<br>
                <strong>Email:</strong> {{ $user->email }}<br>
                <strong>Password:</strong> {{ $plainPassword }}<br>
                <strong>Registered:</strong> {{ $user->created_at->format('F j, Y g:i A') }}<br>
            </div>
            
            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/admin/users') }}" style="background: #059669; color: white; padding: 12px 24px; text-decoration: none;">View User Details</a>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Admin Notification</p>
        </div>
    </div>
</body>
</html>
