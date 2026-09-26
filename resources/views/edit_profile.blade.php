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
            <div class="card">
                <div class="card-body">
                    <h3>Edit Profile</h3>

                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Fullname -->
                        <div class="form-group">
                            <label for="name">Fullname:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <td>{{ $user->email }}</td>
                            {{-- <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"> --}}
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="pn">Phone Number:</label>
                            <input type="text" name="pn" class="form-control" value="{{ old('pn', $user->pn) }}">
                        </div>

                        <!-- Profile Image -->
                        <div class="form-group">
                            <label for="p_img">Profile Image:</label>
                            <input type="file" name="p_img" class="form-control">
                        </div>

                        <div class="actions mt-3">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                            <a href="{{ route('profile', $user->id) }}" class="btn btn-secondary">Cancel</a>
                            <a href="{{ route('change.password.form',$user->password) }}" class="btn btn-primary"> change password</a>
                        </div>
                    </form>
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
