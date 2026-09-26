<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #3498db;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        strong {
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        .signature {
            font-size: 16px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reply to your message</h1>

        <p>Hello {{ $contact->name }},</p>
        <p>This is Your Message: <br> {{ $contact->message }},</p>
        <p>Thank you for reaching out to us. Here is our reply to your inquiry:</p>

        <p>{{ $replyContent }}</p>

        <p>Best regards,<br>Your Support Team</p>
    </div>
    <div class="footer">
        &copy; 2024 TechTrendMall Team
    </div>
</body>


</html>
