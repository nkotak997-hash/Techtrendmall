@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <title>Manage Enquiries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <link href="{{ asset('css/stylea.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/basictable.css') }}" />
    <script type="text/javascript" src="{{ asset('js/jquery.basictable.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/icon-font.min.css') }}" type='text/css' />
    <style>

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .form-horizontal {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group select, .form-group input, .form-group textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }
        .form-group textarea {
            resize: vertical;
        }
        .row {
            display: flex;
            gap: 10px;
        }
        .custom-btn {
            height: 50px;
            background-color: rgba(106, 137, 139, 0.8);
            width: 60px;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
        }
        .custom-btn.reset {
            width: 70px;
        }
        .btn-primary {
    background-color: #698e92; /* Custom green color */
    border-color: #000000; /* Border matches background */
    color: white; /* White text */
    padding: 10px 20px; /* Padding for a larger button */
    font-size: 16px; /* Larger font size */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s ease, border-color 0.3s ease; /* Smooth transition */
}

.btn-primary:hover {
    background-color: #000000; /* Darker green on hover */
    border-color: #4a6a4a; /* Darker border on hover */
}

.btn-primary:focus {
    outline: none; /* Remove default focus outline */
    box-shadow: 0 0 0 3px rgba(72, 180, 97, 0.5); /* Custom focus shadow */
}

    </style>
</head>
<body>
    <div class="page-container">
        <div class="left-content" style="margin-left: 3%; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Home</a>
                        <ion-icon name="chevron-forward-outline"></ion-icon> About Us
                    </li>
                </ol>

                <div class="container">
                    <h2>About Us</h2>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <br>
                    <form action="{{ route('about_us.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <img src="{{ asset('images/' . $aboutUs->image) }}" height="200" width="300" class="uploaded-video"></img>
                        <div class="mb-3 form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-group">
                            <label for="des" class="form-label">Description</label>
                            <textarea class="form-control" id="des" name="des" rows="5">{{ old('des', $aboutUs->des ?? '') }}</textarea>
                            @error('des')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
