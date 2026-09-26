@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <style>
        .primary-button {
  background-color: #3d4145; /* Primary color (Bootstrap's default primary blue) */
  border: none;
  color: white; /* Text color */
  padding: 10px 20px; /* Padding for size */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px; /* Rounded corners */
}

.primary-button:hover {
  background-color: #0056b3; /* Darker shade for hover effect */
}

        .container .content {
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
        .container .content .left-side {
          width: 15%;
          height: 100%;
          margin-top: 20%;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          margin-top: 15px;
          position: relative;
        }
        .content .left-side::before {
          content: "";
          position: absolute;
          height: 70%;
          width: 2px;
          right: -15px;
          top: 50%;
          transform: translateY(-50%);
          background: #afafb6;
        }
        .content .left-side .details {
          margin: 14px;
          text-align: center;
        }
        .content .left-side .details i {
          font-size: 30px;
          color: #0a0a0a;
          margin-bottom: 10px;
        }
        .content .left-side .details .topic {
          font-size: 18px;
          font-weight: 500;
        }
        .content .left-side .details .text-one,
        .content .left-side .details .text-two {
          font-size: 14px;
          color: #afafb6;
        }

        .container .content .right-side {
          width: 75%;
          margin-left: 75px;
        }
        .content .right-side .topic-text {
          font-size: 23px;
          font-weight: 600;
          color: #000000;
        }
        .right-side .input-box {
          height: 55px;
          width: 100%;
          margin: 12px 0;
        }
        .right-side .input-box input,
        .right-side .input-box textarea {
          height: 100%;
          width: 100%;
          border: none;
          outline: none;
          font-size: 16px;
          background: #f0f1f8;
          border-radius: 6px;
          padding: 0 15px;
          resize: none;
        }

        .right-side .message-box {
          min-height: 110px;
        }

        .right-side .input-box textarea {
          padding-top: 6px;
        }

        .right-side .button {
          display: inline-block;
          margin-top: 12px;
        }

        .right-side .button input[type="button"] {
          color: #fff;
          font-size: 18px;
          outline: none;
          border: none;
          padding: 8px 16px;
          border-radius: 6px;
          background: #030303;
          cursor: pointer;
          transition: all 0.3s ease;
        }

        .button input[type="button"]:hover {
            color: #000000;
          background: #8aa8b1;
        }

        @media (max-width: 950px) {
          .container {
            width: 90%;
            padding: 30px 40px 40px 35px;
          }
          .container .content .right-side {
            width: 75%;
            margin-left: 55px;
          }
        }
        @media (max-width: 820px) {
          .container {
            margin: 40px 0;
            height: 100%;
          }
          .container .content {
            flex-direction: column-reverse;
          }
          .container .content .left-side {
            width: 100%;
            flex-direction: row;
            margin-top: 40px;
            justify-content: center;
            flex-wrap: wrap;
          }
          .container .content .left-side::before {
            display: none;
          }
          .container .content .right-side {
            width: 100%;
            margin-left: 0;
          }
        }

        /* /// */

                </style>
    <!-- fonts links -->
</head>
<br>

<body>
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Baktinager circle near,</div>
            <div class="text-two">nilkanth cinema  near,</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+91 6353065513</div>
            <div class="text-two">+91 9316071717</div>
            <div class="text-two">+91 6354470814</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">mkava@gmail.com</div>
            <div class="text-two">jjadav@gmail.com</div>
            <div class="text-two">Nkotak@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">Send us a message</div>
          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="input-box">
              <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" />

            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            <div class="input-box">
              <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}" />

            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
            <div class="input-box message-box">
              <textarea name="message" placeholder="Enter your message">{{ old('message') }}</textarea>

            </div>
            @error('message')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
        <div class="button">
            <input type="submit" value="Send Now" class="primary-button" />
          </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection
