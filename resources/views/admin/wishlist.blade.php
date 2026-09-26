@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">

        <link rel="stylesheet" href="{{ asset('css/stylea.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>
    {{-- <title>CWMS | Manage Car Wash Point</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Bootstrap Core CSS -->
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' /> --}}
    {{-- <!-- Custom CSS --> --}}
    <link href="{{ asset('css/stylea.css') }}" rel='stylesheet' type='text/css' />
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
    <style>
        select.form-select {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    padding: 10px;
    font-size: 1.1rem;
    color: #495057;
    transition: all 0.3s ease;
}

select.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    outline: none;
}

select.form-select option {
    padding: 5px 10px;
}

select.form-select:hover {
    background-color: #e9ecef;
    cursor: pointer;
}
    </style>
    <!-- //tables -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ asset('css/icon-font.min.css') }}" type='text/css' />
    <!-- //lined-icons -->
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
        <div class="left-content" style="margin-left: 3% ; margin-right: 3%">
            <div class="mother-grid-inner" style="margin-top: 5%">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon> Wishlist</li>
                </ol>
                <br><br>
                <div class="agile-grids">
                    <!-- tables -->
                    <div class="agile-tables" >
                        <div class="w3l-table-info">
                            <h2 style="text-align: center">Wishlist</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wishlists as $key => $wishlist)
                                        <tr>
                                            <td>{{ $key + 1 }}</td> <!-- Serial number -->
                                            <td>{{ $wishlist->user->name }}</td> <!-- Customer Name -->
                                            <td><img src="{{ asset('images/' . $wishlist->product->img) }}" alt="{{ $wishlist->product->name }}" style="width: 50px; height: auto;"></td> <!-- Product Image -->
                                            <td>{{ $wishlist->product->name }}</td> <!-- Product Name -->
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
