@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <head>
<style>/* General body and container styling */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .form-group .alert {
        margin-top: 10px;
        font-size: 14px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
    .alert {
        color: red;
    }
    </style>
        <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">

        <link rel="stylesheet" href="{{ asset('css/stylea.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>
    <div class="page-container">
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon>Add Coupon</li>
                </ol>
    <h1>Add New Coupon</h1>

    <form action="{{ route('coupon') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Coupon Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control">
            @error('code')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount">Discount Percentage:</label>
            <input type="number" id="discount" name="discount" value="{{ old('discount') }}" class="form-control" step="1">
            @error('discount')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="expires_at">Expiration Date:</label>
            <input type="datetime-local" id="expires_at" name="expires_at" value="{{ old('expires_at') }}" class="form-control">
            @error('expires_at')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Coupon</button>
        <a href="{{ route('coupon') }}" class="btn btn-secondary">Cancel</a>
    </form>
    </div>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif


{{-- @if (Auth::check())
@extends('admin.layout_ad')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <head>
<style>/* General body and container styling */
    body {
        font-family: Arial, sans-serif;
        /* background-color: #f8f9fa; */
        /* color: #343a40; */
    }

    .container {
        /* max-width: 800px; */
        /* margin: 0 auto; */
        /* padding: 20px; */
        /* background: #ffffff; */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* Form elements styling */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .form-group .alert {
        margin-top: 10px;
        font-size: 14px;
    }

    /* Button styling */
    .btn {
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
    .alert {
        color: red
    }
    </style>
        <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">

        <link rel="stylesheet" href="{{ asset('css/stylea.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>
    {{-- <title>CWMS | Manage Car Wash Point</title> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Bootstrap Core CSS -->
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' /> --}}
    {{-- <!-- Custom CSS --> --}}
    {{-- <link href="{{ asset('css/stylea.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('css/morris.css') }}" type="text/css"/>
    <!-- Graph CSS -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <!-- //jQuery -->
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/basictable.css') }}" />
    <script type="text/javascript" src="{{ asset('js/jquery.basictable.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();
            $('#table-breakpoint').basictable({ breakpoint: 768 });
            $('#table-swap-axis').basictable({ swapAxis: true });
            $('#table-force-off').basictable({ forceResponsive: false });
            $('#table-no-resize').basictable({ noResize: true });
            $('#table-two-axis').basictable();
            $('#table-max-height').basictable({ tableWrapper: true });
        });
    </script>
    <!-- //tables -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ asset('css/icon-font.min.css') }}" type='text/css' />
    <!-- //lined-icons -->
</head>
<body>
    <div class="page-container" >
        <!--/content-inner-->
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon>Add Coupon</li>
                </ol>
    <h1>Add New Coupon</h1>

    <form action="{{ route('coupon') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Coupon Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control">
            @error('code')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Discount Type:</label>
            <select id="type" name="type" class="form-control">
                <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
            @error('type')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="amount">Discount Amount:</label>
            <input type="number" id="amount" name="amount" value="{{ old('amount') }}" step="0.01" class="form-control">
            @error('amount')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="min_purchase_amount">Minimum Purchase Amount:</label>
            <input type="number" id="min_purchase_amount" name="min_purchase_amount" value="{{ old('min_purchase_amount') }}" step="0.01" class="form-control">
            @error('min_purchase_amount')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="form-control">
            @error('start_date')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="form-control">
            @error('end_date')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_limit">Usage Limit:</label>
            <input type="number" id="usage_limit" name="usage_limit" value="{{ old('usage_limit') }}" class="form-control">
            @error('usage_limit')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Coupon</button>
        <a href="{{ route('coupon') }}" class="btn btn-secondary">Cancel</a>
    </form>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
@endsection --}}

