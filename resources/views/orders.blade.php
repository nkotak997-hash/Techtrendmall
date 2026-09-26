@if (Auth::check())
@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .sidebar {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .order-card {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-card img {
            width: 100px;
            height: auto;
            border-radius: 8px;
            margin-right: 15px;
        }

        .order-details {
            flex-grow: 1;
            padding: 0 15px;
        }

        .order-details h5 {
            margin: 0;
            font-size: 1.25rem;
        }

        .order-details p {
            margin: 5px 0;
            font-size: 0.875rem;
            color: #6c757d;
        }

        .order-actions {
            text-align: right;
        }

        .order-actions .btn {
            margin-top: 5px;
        }

        .filters label {
            font-weight: bold;
        }

        .filters input[type="checkbox"] {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .order-card {
                flex-wrap: wrap;
            }

            .order-actions {
                text-align: left;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Order Cards -->
        <div class="col-md-9">
            <h2>My Orders</h2>
            @if($orders->isEmpty())
                <p>You have no orders.</p>
            @else
                @foreach($orders as $order)
                    <div class="order-card">
                        <div class="order-details">
                            <h5>{{ $order->product_name }}</h5>
                            {{-- <p> {{ $order->product->des }}</p> --}}
                            <p>₹ {{ number_format($order->total_price, 2) }}</p>
                            <p>Status: <strong>{{ $order->status }}</strong> | Ordered on: {{ $order->created_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="order-actions">
                            @if(!in_array($order->status, ['Processing', 'ordered', 'Cancelled','Ready for Delivery']))
                            <a href="{{ route('order.details', ['order' => $order->id]) }}" class="btn btn-outline-primary btn-sm">Rate & Review</a>
                            @else
                             <p class="text-muted"></p>
                             @endif
                            @if(!in_array($order->status, ['Shipped', 'Delivered', 'Cancelled']))
                             <form action="{{ route('order.cancel', $order->id) }}"
                                 method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                  @csrf
                                  <button type="submit" class="btn btn-outline-danger btn-sm">Cancel Order</button>
                            </form>
                             @else
                             <p class="text-muted">Cannot cancel</p>
                             @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.cancel-btn').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                const orderId = this.getAttribute('data-order-id');

                if (confirm('Are you sure you want to cancel this order?')) {
                    // Send AJAX request to cancel the order
                    fetch(`/cancel/${orderId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Order cancelled successfully!');
                            // Hide the link or update the status dynamically
                            this.parentElement.innerHTML = '<p class="text-muted">Order Cancelled</p>';
                        } else {
                            alert(data.message || 'Failed to cancel the order. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    });
                }
            });
        });
    });
</script>
 --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
