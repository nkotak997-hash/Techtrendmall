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
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' /> --}}
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
        body {
        background-color: #f4f7fa; /* Soft light background color for the page */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font family */
        color: #495057; /* Dark gray text color for better readability */
    }

    h2 {
        color: #343a40; /* Darker text color for the heading */
        font-weight: 600; /* Semi-bold heading */
        margin-bottom: 1.5rem; /* Space below heading */
    }

    .card {
        border-radius: 10px; /* Slightly rounded corners */
        background-color: #ffffff; /* White background for the card */
        border: none; /* No border */
        padding: 2rem; /* Increased padding inside card */
    }

    .card-title {
        margin-bottom: 1rem; /* Space below the title */
        font-size: 1.5rem; /* Larger font size for title */
        color: #48515a; /* Primary color for the title */
    }

    .form-group {
        margin-bottom: 1.5rem; /* Space below form groups */
    }

    label {
        font-weight: 600; /* Semi-bold label */
        margin-bottom: 0.5rem; /* Space below label */
        display: block; /* Ensuring the label is on a new line */
    }

    .form-control {
        border-radius: 5px; /* Rounded corners for the textarea */
        border: 1px solid #ced4da; /* Light border */
        transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transition */
    }

    .form-control:focus {
        border-color: #6a7179; /* Border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Shadow effect on focus */
        outline: none; /* Remove default outline */
    }

    .btn-primary {
    background-color: #40464d; /* Primary button color */
    color: #ffffff; /* White text color */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    font-size: 1rem; /* Font size */
    font-weight: 600; /* Semi-bold font */
    padding: 10px 20px; /* Padding around the text */
    transition: background-color 0.3s, transform 0.3s; /* Smooth transition for hover effects */
    cursor: pointer; /* Pointer cursor on hover */
}

.btn-primary:hover {
    background-color: #67717b; /* Darker color on hover */
    transform: translateY(-2px); /* Lift effect on hover */
}

.btn-primary:active {
    background-color: #4d545b; /* Even darker color when active */
    transform: translateY(0); /* Reset lift effect */
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2); /* Inner shadow for pressed effect */
}

.btn-primary:focus {
    outline: none; /* Remove default outline */
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Custom focus outline */
}

    .text-muted {
        color: #6c757d; /* Muted text color */
    }

    @media (max-width: 768px) {
        .container {
            padding: 15px; /* Adjust padding for smaller screens */
        }
    }
    </style>
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon> Reply</li>
                </ol>
                <div class="container my-5">
                    <h2 class="text-center mb-4">Reply to Inquiry</h2>

                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title">Inquiry Details</h5>
                            <p><strong>Name:</strong> <span class="text-muted">{{ $message->name }}</span></p>
                            <p><strong>Email:</strong> <span class="text-muted">{{ $message->email }}</span></p>
                            <p><strong>Subject:</strong> <span class="text-muted">{{ $message->message }}</span></p>

                            <form action="{{ route('sendReply', $message->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="reply" class="font-weight-bold">Your Reply:</label>
                                    <textarea name="reply" id="reply" class="form-control" rows="5" required placeholder="Type your reply here...">{{ $message->reply }}</textarea>


                                </div>
                                <button type="submit" class="btn btn-primary">Send Reply</button>

                            </form>
                        </div>
                    </div>
                </div>
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
