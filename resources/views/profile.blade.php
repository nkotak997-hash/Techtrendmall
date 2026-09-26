@if (Auth::check())
@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Electronic Shop')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- fonts links -->
    @stack('styles')
    <style>
        body {
            background-color: #f4f4f9;
        }

        .profile-header {
            display: flex;
            padding: 20px;
            background-color: rgb(126, 149, 147);
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .profile-header img {
            border-radius: 50%;
            border: 5px solid #fff;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .profile-header div {
            margin-left: 20px;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 28px;
        }

        .profile-header p {
            margin: 5px 0;
            font-size: 16px;
        }

        .card-body h3 {
            border-bottom: 2px solid #040404;
            padding-bottom: 5px;
            margin-bottom: 15px;
            color: #333;
        }

        .card-body p {
            color: #ffffff;
            line-height: 1.9;
        }

        .list-group-item {
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #291414;
        }

        .profile-details {
            margin-top: 20px;
        }

        .profile-details .row > div {
            margin-bottom: 15px;
        }
        .btn-primary {
    background-color:#6c757d;
    color: #ffffff;
}

.btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
}

.btn-secondary a {
    color: #ffffff;
    text-decoration: none;
}
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="profile-header">
                    <!-- Display profile image -->
                    @if($user->p_img)
                        <img src="{{ asset('images/' . $user->p_img) }}" alt="Profile Picture" class="img-thumbnail">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="img-thumbnail">
                    @endif

                    <div class="card-body">
                        <h3>Profile Details</h3>
                        <div class="profile-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Fullname:</h5>
                                    <p>{{ $user->name }}</p>
                                </div>
                                <hr>

                                <div class="col-md-6">
                                    <h5>Email:</h5>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <hr>

                                <div class="col-md-6">
                                    <h5>Phone Number:</h5>
                                    <p>{{ $user->pn }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Edit and Go Back Buttons -->
                        <div class="actions mt-3">
                            <a href="{{ url('/') }}" class="btn btn-secondary">← Go Back</a>
                            <a href="{{ route('edit_profile', $user->id) }}" class="btn btn-primary">✏️ Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
