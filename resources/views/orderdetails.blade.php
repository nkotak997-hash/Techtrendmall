@if (Auth::check())
@extends('layout')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Order Details</h2>

    @foreach($products as $product)
    <div class="order-card card shadow-sm mb-4 p-3 rounded">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Product Description:</strong> {{ $product->des }}</p>
            <p class="card-text"><strong>Price:</strong> ₹{{ number_format($product->price, 2) }}</p>
            <p class="card-text"><strong>Order Status:</strong> {{ $order->status }}</p>
            <p class="card-text"><strong>Ordered on:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
        </div>

        <!-- Rating & Review Form -->
        <div class="review-form">
            <h4>Add Your Review</h4>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select><br>
                    <label for="message">Review</label>
                    <input type="text" name="message" id="message" class="form-control" placeholder="Add Your Review">
                </div>
<br>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
