<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #555555;
        }

        .otp-code {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #888888;
        }

        .contact-info {
            margin-top: 30px;
            font-size: 14px;
            color: #444444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TechTrendMall</h1>
        <p>Your OTP code is: <span class="otp-code">{{ $otp }}</span></p>
        <p>This code will expire in 10 minutes.</p>
        <div class="note">
            <p>To verify your account, enter the above code in the verification field on our website.</p>
            <p>If you did not request this OTP or if you need help, please contact our support team.</p>
        </div>
        <div class="contact-info">
            <p>Support Email: techtrendmall111@gmail.com</p>
            <p>Support Phone: 6354470814</p>
            <p>Support Phone: 6353050513</p>
            <p>Support Phone: 9316071717</p>
        </div>
    </div>
</body>
</html>
