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
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            /* border-radius: 8px; */
            /* padding: 30px; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* max-width: 800px; */
            /* margin: 50px auto; */
        }
        h2 {
            margin-left: 10px;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }
        .form-group {
            margin-left: 10px;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 16px;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            border-radius: 4px;
            padding: 12px 20px;
            text-transform: uppercase;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .form-group img {
            border-radius: 4px;
            margin-top: 10px;
            max-width: 100%;
        }
        select.form-control {
            height: auto;
        }
    </style>

    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/icon-font.min.css') }}" type='text/css' />
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h2>Edit Coupon</h2>
    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method spoofing for PUT request -->

        <div class="form-group">
            <label for="code">Coupon Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code', $coupon->code) }}" class="form-control">
            @error('code')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="discount">Discount Percentage:</label>
            <input type="number" id="discount" name="discount" value="{{ old('discount', $coupon->discount) }}" step="0.01" class="form-control">
            @error('discount')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="expires_at">Expiration Date:</label>
            <input type="datetime-local" id="expires_at" name="expires_at"
                   value="{{ old('expires_at', $coupon->expires_at->format('Y-m-d\TH:i')) }}"
                   class="form-control">
            @error('expires_at')
                <div class="alert">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Update Coupon</button>
        <a href="{{ route('coupon') }}" class="btn btn-secondary">Cancel</a>
    </form>

    {{-- <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method spoofing for PUT request -->

        <div class="form-group">
            <label for="code">Coupon Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code', $coupon->code) }}" class="form-control" required>
            @error('code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Discount Type:</label>
            <select id="type" name="type" class="form-control" required>
                <option value="percentage" {{ $coupon->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="amount">Discount Amount:</label>
            <input type="number" id="amount" name="amount" value="{{ old('amount', $coupon->amount) }}" step="0.01" class="form-control" required>
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="min_purchase_amount">Minimum Purchase Amount:</label>
            <input type="number" id="min_purchase_amount" name="min_purchase_amount" value="{{ old('min_purchase_amount', $coupon->min_purchase_amount) }}" step="0.01" class="form-control">
            @error('min_purchase_amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $coupon->start_date) }}" class="form-control" required>
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $coupon->end_date) }}" class="form-control" required>
            @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_limit">Usage Limit:</label>
            <input type="number" id="usage_limit" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" class="form-control">
            @error('usage_limit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <option value="active" {{ $coupon->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $coupon->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Coupon</button>
        <a href="{{ route('coupondetail') }}" class="btn btn-secondary">Cancel</a>
    </form> --}}
</div>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
