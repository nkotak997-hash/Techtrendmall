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
    <h2>Edit Product</h2>
    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="des">Description:</label>
            <textarea name="des" class="form-control" required>{{ $product->des }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="brand">Brand:</label>
            <input type="text" name="brand" class="form-control" value="{{ $product->brand }}">
        </div>

        <div class="form-group">
            <label for="ram">RAM (GB):</label>
            <input type="number" name="ram" class="form-control" value="{{ $product->ram }}">
        </div>

        <div class="form-group">
            <label for="rom">ROM (GB):</label>
            <input type="number" name="rom" class="form-control" value="{{ $product->rom }}">
        </div>

        <div class="form-group">
            <label for="processor">Processor:</label>
            <input type="text" name="processor" class="form-control" value="{{ $product->processor }}">
        </div>

        <div class="form-group">
            <label for="battery">Battery:</label>
            <input type="text" name="battery" class="form-control" value="{{ $product->battery }}">
        </div>

        <div class="form-group">
            <label for="camera">Camera:</label>
            <input type="text" name="camera" class="form-control" value="{{ $product->camera }}">
        </div>

        <div class="form-group">
            <label for="display">Display (inches):</label>
            <input type="text" name="display" class="form-control" value="{{ $product->display }}">
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="img">Product Image:</label>
            <input type="file" name="img" class="form-control">
            <img src="{{ asset('images/' . $product->img) }}" alt="{{ $product->name }}" style="width: 150px; margin-top: 10px;">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
</body>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
