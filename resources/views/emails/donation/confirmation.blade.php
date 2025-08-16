<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 40px 0;
            color: #333;
        }

        .email-container {
            max-width: 620px;
            margin: auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #e55a2b;
            font-size: 26px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .donation-details {
            background-color: #fafafa;
            border-left: 4px solid #e55a2b;
            padding: 16px 20px;
            border-radius: 8px;
            margin-top: 25px;
        }

        .donation-details p {
            margin: 6px 0;
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #e55a2b;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
        }

        .footer {
            margin-top: 40px;
            font-size: 13px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Thank You, {{ $donation->name }}! 🎉</h2>

        <p>Your kind donation of <strong>₹{{ number_format($donation->amount) }}</strong> has been received successfully.</p>

        @if ($donation->campaign_id)
            <p>You contributed to: <strong>{{ $donation->campaign->title ?? 'Our Campaign' }}</strong>.</p>
        @endif

        <div class="donation-details">
            <p><strong>Name:</strong> {{ $donation->name }}</p>
            <p><strong>Email:</strong> {{ $donation->email }}</p>
            <p><strong>Phone:</strong> {{ $donation->phone }}</p>
            <p><strong>Nationality:</strong> {{ $donation->nationality }}</p>
            <p><strong>Amount Donated:</strong> ₹{{ number_format($donation->amount) }}</p>
        </div>

        <a href="{{ url('/') }}" class="btn">Visit Our Website</a>

        <div class="footer">
            <p>Thank you for supporting HelpingHands ❤️</p>
            <p>— The HelpingHands Team</p>
        </div>
    </div>
</body>
</html>
