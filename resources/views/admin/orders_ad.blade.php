@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
<!DOCTYPE HTML>
<html>
<head>
{{-- <title>CWMS | New Bookings</title> --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
.succWrap{
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
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a><ion-icon name="chevron-forward-outline"></ion-icon> All Orders</li>
                </ol>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <div class="agile-grids">
                    <!-- tables -->
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                      <h2>New Orders</h2>
                        <table id="table">
                        <thead>
                          <tr>
                          <th>Order No.</th>
                          <th>Customer Name</th>
                            {{-- <th>Image</th> --}}
                            {{-- <th width="200">Category</th> --}}
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Payment Method</th>
                            <th>Payment ID</th>
                            <th width="100">Order Date</th>
                            <th>Status</th>
                            {{-- <th>Action </th> --}}

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Serial number -->
                                <td>{{ $order->username }}</td> <!-- Customer Name -->
                                {{-- <td><img src="{{ asset('images/' . $order->product->img) }}" alt="{{ $order->product->name }}" style="width: 50px; height: auto;"></td> <!-- Product Image --> --}}
                                <td>{{ $order->product_name }}</td> <!-- Product Name -->
                                <td>{{ $order->total_price }}</td> <!-- Quantity -->
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select" onchange="this.form.submit()">
                                            <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="Ready for Delivery" {{ $order->status == 'Ready for Delivery' ? 'selected' : '' }}>Ready for Delivery</option>
                                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </table>
            </div>
            <script>
                document.querySelectorAll('.status-dropdown').forEach(dropdown => {
                    dropdown.addEventListener('change', function () {
                        const orderId = this.getAttribute('data-order-id');
                        const status = this.value;

                        fetch(`/orders/update-status/${orderId}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ status })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Order status updated successfully!');
                            } else {
                                alert('Failed to update order status. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                    });
                });
            </script>

<div class="inner-block">
</div>
</div>
</div>

<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
