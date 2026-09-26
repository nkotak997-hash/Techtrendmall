@if (Auth::check())
@extends('admin.layout_ad')
{{-- @section('title', 'Responsive Admin Dashboard | Korsat X Parmaga') --}}
@section('content')
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
          $('#table-breakpoint').basictable({ breakpoint: 768 });
          $('#table-swap-axis').basictable({ swapAxis: true });
          $('#table-force-off').basictable({ forceResponsive: false });
          $('#table-no-resize').basictable({ noResize: true });
          $('#table-two-axis').basictable();
          $('#table-max-height').basictable({ tableWrapper: true });
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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon> Order Details</li>
                </ol>
                <div class="agile-grids">
                    <!-- tables -->
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Order Details #12345</h2>
                            <table id="table">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <th width="200">Order Id#</th>
                                        <td>12345</td>
                                        <th>Image</th>
                                        <td><img src="{{ asset('images/01.JBL_Live_770NC_Product Image_Hero_White.png') }}" style="height: 65px" alt="JBL Live 770NC Product Image Hero White"></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td width="300">John Doe</td>
                                        <th>Mobile No</th>
                                        <td>+123456789</td>
                                    </tr>
                                    <tr>
                                        <th>Category Type</th>
                                        <td>HeadPhone</td>
                                        <th>Delivery address</th>
                                        <td>Rajkot</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>2023-12-01</td>
                                        <th>Delivery date</th>
                                        <td>01-01-2024</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td colspan="3">JBL headphones are designed with comfort in mind. These bestsellers are lightweight and often come with soft padding on the ear cups and headband. They are perfectly comfortable to wear for extended periods of time</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td colspan="3">Pending</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button data-toggle="modal" style="height: 40px; background-color: rgba(106, 137, 139, 0.8); width: 120px; color: white; border: none; border-radius: 4px; padding: 10px; font-size: 16px; cursor: pointer;"data-target="#myModal" class="custom-btn">Take Action</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--Model-->
                    {{-- <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Booking #12345</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <p>
                                            <select name="txntype" required class="form-control">
                                                <option value="">Transaction Type</option>
                                                <option value="e-Wallet">e-Wallet</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Debit/Credit Card">Debit/Credit Card</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </p>
                                        <p><input type="text" name="transactionno" class="form-control" placeholder="Transaction Number (if any)"></p>
                                        <p><textarea name="message" class="form-control" placeholder="Admin Remark" required></textarea></p>
                                        <p><input type="submit" class="btn btn-custom" name="update" value="Update"></p>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--//content-inner-->
            <!--js -->
            <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
            <script src="{{ asset('js/scripts.js') }}"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
