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
            height: 40px;
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
        .form-horizontal {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-group label {
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}

.form-group input, .form-group select {
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
    transition: border-color 0.3s ease;
}

.form-group input:focus, .form-group select:focus {
    border-color: #5cb85c;
    outline: none;
}

.form-group select {
    background-color: #fff;
}

button[type="submit"] {
    background-color: #788e7f;
    border: none;
    color: white;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #85a58c;
}

.custom-btn {
    height: 45px;
    background-color: #007bff;
    width: 80px;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px;
    font-size: 14px;
    cursor: pointer;
    text-align: center;
    transition: background-color 0.3s ease;
}

.custom-btn:hover {
    background-color: #0056b3;
}

.custom-btn.reset {
    background-color: #dc3545;
}

.custom-btn.reset:hover {
    background-color: #c82333;
}

.page-container {
    padding: 30px;
    background-color: #f7f7f7;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    font-weight: 700;
}

.agile-tables {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 30px;
    font-size: 16px;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.breadcrumb-item ion-icon {
    margin: 0 5px;
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
                        <ion-icon name="chevron-forward-outline"></ion-icon> Add Customer
                    </li>
                </ol>
<br>
                <div class="agile-grids">
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h3>Add Customer</h3><br>
                            <div class="tab-content">
                                <div class="tab-pane active" id="horizontal-form">

<form action="{{ route('customers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Customer Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div><br>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div><br>
    <div class="mb-3">
        <label for="pn" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="pn" name="pn" required>
    </div><br>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" class="form-control" id="role" name="role" required>
    </div><br>
    {{-- <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>--}}
    <br><br>
    <button type="submit" class="btn btn-primary">Add Customer</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</div>
@endsection
@else
<script type="text/javascript">
window.location.href = "{{ route('login') }}";
</script>
@endif
