<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            background-image: url('{{ asset('images/back-01.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        .otp-verification-container {
            width: 40%;
            margin: 0 auto;
            padding: 40px;
            background-color: #CCCCCC;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 15%;
        }

        .otp-verification-container h4 {
            text-align: center;
            color: black;
            margin-bottom: 10px;
            font-size: 40px;
            margin-top: 0%;
        }

        .otp-verification-container .form-group {
            margin-bottom: 15px;
        }

        .otp-verification-container .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: black;
        }

        .otp-verification-container .form-group input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            color: black;
            background-color: white;
        }

        .otp-verification-container .form-group input.is-invalid {
            border-color: red;
        }

        .otp-verification-container .invalid-feedback {
            color: red;
            font-size: 14px;
        }

        .otp-verification-container button {
            width: 100%;
            background-color: black;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .otp-verification-container button:hover {
            background-color: gray;
            color: black;
        }

button {
  background: #7b9092;
  color: #090808;
  font-weight: 600;
  border: none;
  padding: 12px 20px;
  cursor: pointer;
  border-radius: 3px;
  font-size: 16px;
  border: 2px solid transparent;
  transition: 0.3s ease;
}

button:hover {
  color: #030303;
  border-color: #000000;
  background: rgba(255, 255, 255, 0.15);
}
    </style>
</head>
<body>
    <br><br>
    <div class="otp-verification-container">
        <h4>OTP Verification</h4>
        <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <br>
            <div class="form-group">
                <label for="otp">Enter OTP</label>
                <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" placeholder="Enter the OTP sent to your email" required>
                @error('otp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>
</html>
