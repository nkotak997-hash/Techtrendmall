<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        body {
            background-image: url('{{ asset('images/back-01.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 80%;
            background-color: #c9c9c9;
            z-index: -1;
        }

        .reset-password-container {
            width: 500px;
            margin: 5% auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-size: 40px;
            margin-bottom: 20px;
            color: #000;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000;
        }

        .form-group input {
            width: 100%;
            height: 40px;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #000;
            background-color: transparent;
            color: #000;
        }

        .form-group input:focus {
            outline: none;
            border-bottom-color: #7b9092;
        }

        .form-group input::placeholder {
            color: #7b9092;
        }

        .form-group input.is-invalid {
            border-bottom-color: red;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875rem;
        }

        button {
            width: 100%;
            background: #7b9092;
            color: #090808;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        button:hover {
            color: #030303;
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body>
    <div class="reset-password-container">
        <h4>Reset Password</h4>
        <form action="{{ route('reset.password.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your new password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password" required>
            </div>

            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
