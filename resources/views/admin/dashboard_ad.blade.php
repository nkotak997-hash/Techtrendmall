@if (Auth::check())
@extends('admin.layout_ad')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">
        <link rel="stylesheet" href="{{ asset('css/stylea.css') }}">
    </head>
    <body>
        <!-- ======================= Cards ================== -->
        <div class="cardBox" style="margin-top: 7%; margin-left:5%">
            <div class="card">
                <div>
                    <div class="numbers">10</div>
                    <div class="cardName">Customers</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">80</div>
                    <div class="cardName">Orders</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cart-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">284</div>
                    <div class="cardName">Messages</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                </div>
            </div>
        </div>

        <div class="cardBox" style="margin-top: 3%; margin-left:5%">
            <div class="card">
                <div>
                    <div class="numbers">10000079</div>
                    <div class="cardName">Earning</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
