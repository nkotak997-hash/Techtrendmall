@extends('layout')
@section('content')
<br>
<br>
<br>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Glassmorphism Login Form</title>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

  body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: #e9e2e2;
  }
  .wrapper {
    width: 500px;
    border-radius: 8px;
    padding: 30px;
    margin-left: 30%;
    background: rgba(255, 255, 255, 0.1);
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(9px);
    -webkit-backdrop-filter: blur(9px);
  }

  .forms {
    text-align: center;
    display: flex;
    flex-direction: column;
  }

  h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #000000;
  }

  .input-field {
    position: relative;
    border-bottom: 2px solid #000000;
    margin: 15px 0;
  }

  .input-field label {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    color: #000000;
    font-size: 16px;
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
  }

  .input-field input:focus~label,
  .input-field input:valid~label {
    font-size: 0.8rem;
    top: 10px;
    transform: translateY(-120%);
  }

  .forget {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 25px 0 35px 0;
    color: #000000;
  }

  #remember {
    accent-color: #000000;
  }

  .forget label {
    display: flex;
    align-items: center;
  }

  .forget label p {
    margin-left: 8px;
  }

  .wrapper a {
    color: #000000;
    text-decoration: none;
  }

  .wrapper a:hover {
    text-decoration: underline;
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

  .register {
    text-align: center;
    margin-top: 30px;
    color: #050505;
  }
</style>
</head>
<body>
  <div class="wrapper">
    <form class="forms" method="POST" action="{{ route('login') }}">
      @csrf
      <h2>Login</h2>
      <div class="input-field">
        <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
      </div>
      @error('email')
          <span class="text-danger"  style="margin-right:41px">{{ $message }}</span>
        @enderror
      <div class="input-field">
        <input type="password" name="password" placeholder="Enter your Password" >
      </div>
      @error('password')
      <span class="text-danger" style="margin-right:41px">{{ $message }}</span>
    @enderror
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember" name="remember"> Remember Me
        </label>
        <a href="{{ url('forgot') }}">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="{{ route('Register') }}">Register</a></p>
      </div>
      {{-- <div class="register">
        <p>Admin Login <a href="{{ route('dashboard') }}">Admin</a></p>
      </div> --}}
    </form>
  </div>
</body>
</html>
@endsection
