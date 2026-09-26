@extends('layout')
@section('content')
<br><br><br>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

    body::before {
      content: "";
      position: absolute;
      width: 100%;
      height: 80%;
      background-color: #c9c9c9;
    }

    .wrapper {
      width: 500px;
      border-radius: 8px;
      padding: 30px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.1);
      text-align: center;
      border: 1px solid rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(9px);
      -webkit-backdrop-filter: blur(9px);
    }

    h4 {
      font-size: 1.5rem;
      margin-bottom: 20px;
      color: #000;
    }

    .form-group {
      text-align: left;
      margin-bottom: 15px;
    }

    .form-group label {
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

    button {
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

    .invalid-feedback {
      color: red;
      font-size: 0.875rem;
    }

  </style>
</head>
<body>
  <div class="container">
    <br><br>
    <div class="forgot-password-container">
      <div class="wrapper">
        <h4>Forgot Password</h4>
        <form action="{{ route('forgot.password.sendOtp') }}" method="POST">
          @csrf
          <br><br>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your registered email" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <br>
          <button type="submit">Send OTP</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
@endsection
