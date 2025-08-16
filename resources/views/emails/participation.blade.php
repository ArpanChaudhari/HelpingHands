<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Participation Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f6f6f6;
            padding: 20px;
            color: #333;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        h2 {
            color: #2c3e50;
        }
        .footer {
            font-size: 12px;
            margin-top: 30px;
            color: #888;
        }
        .highlight {
            color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Thank you for participating, {{ $participation->name }}!</h2>

        <p>We have received your participation request. Here are the details:</p>

        <ul>
            <li><strong>Name:</strong> {{ $participation->name }}</li>
            <li><strong>Email:</strong> {{ $participation->email }}</li>
            <li><strong>Phone:</strong> {{ $participation->phone }}</li>
            @if($participation->event)
                <li><strong>Event:</strong> {{ $participation->event->title }}</li>
            @else
                <li><strong>Event:</strong> General Participation (No specific event)</li>
            @endif
        </ul>

        <p>We’ll get back to you with more information soon. Stay connected and thank you for supporting our cause! 🙏</p>

        <p class="footer">HelpingHands NGO | This is an automated confirmation mail.</p>
    </div>
</body>
</html>
