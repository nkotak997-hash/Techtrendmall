@extends('layout')
@section('content')
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <!---Custom CSS File--->
    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 119%;
            background-color: #efe7e7;
        }

        .wrapper {
            margin-top: 5%;
            width: 500px;
            border-radius: 8px;
            padding: 30px;
            margin-left: 30%;
            background: rgba(255, 255, 255, 0.366);
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
        }

        .wrapper header {
            font-size: 2rem;
            color: #000000;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-field {
            position: relative;
            width: 100%;
            margin: 15px 0;
            border-bottom: 2px solid #000000;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 16px;
            color: #000000;
            pointer-events: none;
            transition: 0.15s ease;
        }

        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #000000;
            padding: 0;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }

        .error-message {
            color: red;
            font-size: 12px;
            text-align: left;
            width: 100%;
            padding-left: 5px;
        }

        .submit {
            width: 100%;
            height: 40px;
            background: #7b9092;
            color: #090808;
            font-weight: 600;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
            margin-top: 20px;
        }

        button:hover {
            color: #030303;
            border-color: #000000;
            background: rgba(255, 255, 255, 0.15);
        }

        .login {
            text-align: center;
            margin-top: 30px;
            color: #050505;
        }

        .login a {
            color: #000000;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>Registration Form</header>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="input-field">
                <input type="text" name="full_name" placeholder="Enter your Fullname" value="{{ old('full_name') }}">
            </div>
            @error('full_name')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-field">
                <input type="email" name="email" placeholder="Enter your Email" value="{{ old('email') }}">
            </div>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-field">
                <input type="number" name="phone_number" placeholder="Enter your Phone No" value="{{ old('phone_number') }}">
            </div>
            @error('phone_number')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-field">
                <input type="password" name="password" placeholder="Enter your Password">
            </div>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-field">
                <input type="password" name="password_confirmation" placeholder="Confirm your Password">
            </div>
            @error('password_confirmation')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-field">
                <input type="file" name="p_img">
            </div>
            @error('profile_image')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button type="submit" class="submit">Submit</button>
            <div class="login">
                <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
            </div>
        </form>

    </div>
</body>
</html>
@endsection
