<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Submitted - Swacheseva</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6fc;
            margin: 0;
            padding: 0;
            color: #333333;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e1e7f0;
        }
        .header {
            background-color: #002984;
            padding: 30px;
            text-align: center;
        }
        .header img {
            height: 50px;
            width: auto;
        }
        .content {
            padding: 35px 30px;
            line-height: 1.6;
        }
        .content h2 {
            color: #002984;
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
        }
        .status-badge {
            display: inline-block;
            background-color: #ffe8cc;
            color: #d97706;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 50px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .credential-box {
            background-color: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .credential-item {
            margin-bottom: 10px;
            font-size: 14px;
        }
        .credential-item:last-child {
            margin-bottom: 0;
        }
        .credential-item strong {
            color: #475569;
            width: 100px;
            display: inline-block;
        }
        .credential-item span {
            color: #0f172a;
            font-family: monospace;
            font-weight: bold;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 30px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
        .footer a {
            color: #002984;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Header -->
        <div class="header">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">Swacheseva</h1>
            <small style="color: #FE7B01; font-weight: bold; letter-spacing: 1px;">YOUTH EMPLOYMENT SERVICE</small>
        </div>

        <!-- Main Body Content -->
        <div class="content">
            <h2>Hi {{ $name }},</h2>
            
            <div class="status-badge">
                Pending Verification &amp; Approval
            </div>

            <p>Your Swacheseva Franchisee application form has been submitted successfully! Your request is currently under review by our administrative verification officers.</p>
            
            <p>Please note that your portal access will activate once the administrator verifies and approves your application. You will receive another notification when your verification status changes.</p>

            <div class="credential-box">
                <div style="font-weight: bold; color: #0f172a; margin-bottom: 12px; font-size: 14px;">Your Account Login Credentials:</div>
                <div class="credential-item">
                    <strong>Username:</strong> <span>{{ $email }}</span>
                </div>
                <div class="credential-item">
                    <strong>Password:</strong> <span>{{ $password }}</span>
                </div>
            </div>

            <p>If you have any questions or need to make changes to your application, please don't hesitate to reach out to our verification support team.</p>

            <p style="margin-top: 30px; margin-bottom: 0;">Warm regards,<br><strong>Swacheseva Support Team</strong></p>
        </div>

        <!-- Email Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Swacheseva. All rights reserved.<br>
            Website: <a href="https://swacheseva.com" target="_blank">swacheseva.com</a>
        </div>
    </div>
</body>
</html>
