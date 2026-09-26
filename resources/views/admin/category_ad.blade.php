@if (Auth::check())
@extends('admin.layout_ad')
{{-- @section('title', 'Responsive Admin Dashboard | Korsat X Parmaga') --}}
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
    </style>
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon> Category</li>
                </ol>
                <br>
                <!-- Trigger the modal with a button -->
                <a href="{{ route('add_catagory_ad') }}" class="custom-btn" style="height: 40px; background-color: rgba(106, 137, 139, 0.8); width: 120px; color: white; border: none; border-radius: 4px; padding: 10px; font-size: 16px; cursor: pointer;">
                    Add Category
                  </a>
                  <br><br>

                <div class="agile-grids">
                    <!-- tables -->
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Category Items</h2>
                            <table id="table">
                                <thead>
                                    <tr>
            <th>#</th>
            <th width="250">Category Image</th>
            <th width="250">Category Video</th>
            <th width="300">Category Name</th>
            <th colspan="2">Action</th>
        </tr>
      </thead>
        @foreach($category as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>
                <img src="{{ asset('images/' . $category->img) }}" style="height: 65px" alt="{{ $category->pname }}">
            </td>
            <td>
            <video autoplay muted loop src="{{ asset('images/' . $category->video) }}" height="100" style="margin-left: -10%">
            </video>
        </td>
            <td>{{ $category->name }}</td>

        <td>
            <a href="{{ route('category.edit_cat', $category->id) }}">
                <button class="custom-btn" style="height: 40px; background-color: blue; width: 50px; color: white; border: none; border-radius: 4px; padding: 5px; font-size: 14px; cursor: pointer;">
                    Edit
                </button>
            </a>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="custom-btn" style="height: 40px; background-color: red; width: 50px; color: white; border: none; border-radius: 4px; padding: 5px; font-size: 14px; cursor: pointer;">
                    Delete
                </button>
            </form>
            </td>
        </tr>
@endforeach
    </table>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}

  </div>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
