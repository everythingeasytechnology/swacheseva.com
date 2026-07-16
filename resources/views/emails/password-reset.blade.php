<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password - Swacheseva</title>
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
        .content {
            padding: 35px 30px;
            line-height: 1.6;
            text-align: center;
        }
        .content h2 {
            color: #002984;
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
        }
        .action-button {
            display: inline-block;
            background-color: #FE7B01;
            color: #ffffff !important;
            padding: 12px 30px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .info-box {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            font-size: 13px;
            color: #64748b;
            text-align: left;
            margin-top: 25px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 30px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">Swacheseva</h1>
            <small style="color: #FE7B01; font-weight: bold; letter-spacing: 1px;">PASSWORD RESET REQUEST</small>
        </div>

        <div class="content">
            <h2>Reset Your Password</h2>
            <p>We received a request to reset the password for your Swacheseva candidate portal account. Click the button below to secure your account and set a new password:</p>

            <a href="{{ $resetUrl }}" class="action-button" target="_blank">Reset Password Now</a>

            <p style="font-size: 13px; color: #64748b;">This password reset link will expire in 60 minutes.</p>

            <div class="info-box">
                <strong>Didn't request this?</strong> If you did not request a password reset, you can safely ignore this email. Your current password remains active and secure.
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Swacheseva. All rights reserved.<br>
            Website: <a href="https://swacheseva.com" target="_blank" style="color: #002984; text-decoration: none;">swacheseva.com</a>
        </div>
    </div>
</body>
</html>
