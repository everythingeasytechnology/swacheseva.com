<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Candidate Registration Request</title>
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
        }
        .content h2 {
            color: #002984;
            margin-top: 0;
            font-size: 20px;
            font-weight: 700;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }
        .details-table th, .details-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .details-table th {
            color: #475569;
            font-weight: 600;
            width: 150px;
        }
        .details-table td {
            color: #0f172a;
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
            margin: 20px 0;
            text-align: center;
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
            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">Swacheseva Admin Registry</h1>
            <small style="color: #FE7B01; font-weight: bold; letter-spacing: 1px;">NEW APPLICATION RECEIVED</small>
        </div>

        <div class="content">
            <h2>Hello Administrator,</h2>
            <p>A new franchisee registration request has been submitted by a candidate. The details of the applicant are listed below:</p>

            <table class="details-table">
                <tr>
                    <th>Candidate Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>UTR Transaction ID</th>
                    <td style="font-family: monospace; font-weight: bold; color: #002984;">{{ $user->utr_code }}</td>
                </tr>
                <tr>
                    <th>Shop / Centre Name</th>
                    <td>{{ $user->shop_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Shop Address</th>
                    <td>{{ $user->shop_address ?? 'N/A' }}</td>
                </tr>
            </table>

            <p>Please log in to the administrator dashboard to verify their payment UTR screenshot, credentials, and activate their candidate services portal.</p>

            <div style="text-align: center;">
                <a href="{{ route('login') }}" class="action-button" target="_blank">Access Admin Dashboard</a>
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Swacheseva. All rights reserved.
        </div>
    </div>
</body>
</html>
