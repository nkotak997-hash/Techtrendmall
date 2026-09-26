@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
    <!-- Your HTML content here -->
    <head>
        <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">
        <link rel="stylesheet" href="{{ asset('css/stylea.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

        <!-- fonts links -->
        @stack('styles')

        <style>
            body {
                background-color: #f4f4f9;
            }

            .profile-header {
                display: flex;
                padding: 20px;
                background-color: #2c3e50;
                color: #fff;
                border-radius: 8px 8px 0 0;
                align-items: center;
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
                color: black;
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
                background-color: #6c757d;
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

            .btn-secondary:hover {
                background-color: #5a6268;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="profile-header">
                        <img src="./images/nikhil.jpg" alt="Profile Picture" class="img-thumbnail">
                        <div>
                            <h2>Nikhil Kotak</h2>
                            <p>Profile Details</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Profile Details</h3>
                        <div class="profile-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Fullname:</h6>
                                    <p>Nikhil Kotak</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Email:</h6>
                                    <p>kotaknikhil0@gmail.com</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Phone Number:</h6>
                                    <p>+91 6353050513</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="actions mt-3">
                                        <a href="{{ url('/dashboard_ad') }}" class="btn btn-secondary">← Go Back</a>
                                    </div>
                                </div>
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
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
