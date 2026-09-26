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
        .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    padding: 5px 10px;
    font-size: 14px;
    border-radius: 4px;
    text-transform: uppercase;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
    padding: 5px 10px;
    font-size: 14px;
    border-radius: 4px;
    text-transform: uppercase;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

    </style>
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon>View Products</li>
                </ol>
                <br><br>
                <a href="{{ route('add_pro') }}" class="custom-btn" style="height: 40px; background-color: rgba(106, 137, 139, 0.8); width: 120px; color: white; border: none; border-radius: 4px; padding: 10px; font-size: 16px; cursor: pointer;">
                    Add Product
                </a><br><br>
                <div class="agile-grids">
                    <!-- tables -->
                    {{-- <div class="agile-tables">
                        <div class="w3l-table-info"> --}}
                            <h2>Products Items</h2>
                            <div style="overflow-x: auto;">
                                <table id="table" class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th width="100">Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Category Name</th>
                                        <th>Brand</th> <!-- New column for Brand -->
                                        <th>RAM</th>
                                        <th>ROM</th>
                                        <th>Processor</th>
                                        <th>Battery</th> <!-- New column for Battery -->
                                        <th>Camera</th> <!-- New column for Camera -->
                                        <th>Display</th> <!-- New column for Display -->
                                        <th width="100">Unit Price</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td width="50">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $product->img) }}" style="height: 65px" alt="{{ $product->name }}">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->des }}</td>
                                        <td>{{ $product->category ? $product->category->name : 'No Category' }}</td>
                                        <td>{{ $product->brand }}</td> <!-- Display Brand -->
                                        <td>
                                            @if(!in_array($product->category_id, [2, 3, 5, 8]))
                                                {{ $product->ram }} GB
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!in_array($product->category_id, [2, 3, 5, 8]))
                                                {{ $product->rom }} GB
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!in_array($product->category_id, [2, 5, 8]))
                                                {{ $product->processor }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $product->battery }}</td> <!-- Display Battery -->
                                        <td>
                                            @if(!in_array($product->category_id, [2, 4 ,5 ,8]))
                                                {{ $product->camera }} <!-- Display Camera -->
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!in_array($product->category_id, [2, 4 ,5 ,8]))
                                                {{ $product->display }} inches <!-- Display Display -->
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>₹ {{ $product->price }}</td>
                                        <td>
                                            @if($product->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">
                                                     Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>



    <br>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  </div>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
