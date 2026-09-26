@if (Auth::check())
@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <style>
        /* styles.css */


/* General styles */
body {
    font-family: 'Merriweather', serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

hr {
    border: 1px solid #ddd;
}

/* Product detail section */
.product-detail {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.product-image img {
    width: 100%;
    border-radius: 10px;
    object-fit: cover;
    max-height: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-info {
    flex: 1;
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.product-info h2 {
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.price {
    font-size: 1.8rem;
    color: #28a745;
    font-weight: 500;
    margin: 15px 0;
}

.description {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
}

/* Buttons */
.actions {
    margin-top: 30px;
    display: flex;
    gap: 15px;
}

.btn {
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.btn-secondary a {
    color: white;
    text-decoration: none;
}

.btn-secondary a:hover {
    text-decoration: underline;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .product-detail {
        flex-direction: column;
        align-items: center;
    }

    .product-info {
        padding-left: 0;
        margin-top: 20px;
    }

    .product-info h2 {
        text-align: center;
    }

    .actions {
        justify-content: center;
    }
}
.product-image img {
    transition: transform 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
}
.btn {
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
.specifications ul {
    list-style: none;
    padding-left: 0;
}

.specifications li {
    font-size: 1rem;
    color: #333;
    border: 1px solid #ddd;
    margin-bottom: 5px;
}

.review {
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 5px;
    margin-bottom: 15px;
}

.review p {
    margin: 0;
}

.review-text {
    font-size: 0.9rem;
    color: #555;
    margin-top: 5px;
}

/* Review Form Styles */
.review-form {
        margin-top: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .review-form h4 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
    }

    .review-form .form-group {
        margin-bottom: 15px;
    }

    .review-form select.form-control {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .review-form button {
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 500;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .review-form button:hover {
        background-color: #0056b3;
    }

    /* Customer Reviews Section */
    .customer-reviews {
        margin-top: 30px;
    }

    .customer-reviews h4 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .review {
        background-color: #ffffff;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.05);
    }

    .review strong {
        font-size: 1.1rem;
        color: #333;
    }

    .review .rating i {
        font-size: 1.1rem;
        margin-right: 2px;
        color: #FFD700;
    }

    .review p.review-text {
        font-size: 0.95rem;
        color: #555;
        margin-top: 5px;
    }

    /* Media Query for Mobile Responsiveness */
    @media (max-width: 768px) {
        .review-form, .customer-reviews {
            padding: 10px;
        }

        .review-form h4, .customer-reviews h4 {
            font-size: 1.25rem;
        }

        .review strong {
            font-size: 1rem;
        }

        .review p.review-text {
            font-size: 0.9rem;
        }
    }



    </style>
    <!-- fonts links -->
</head>
<body>
    <header>
        <div class="container">
            <h1 class="text-center">Product Details</h1>
            <hr>
        </div>
    </header>
    <br><br>
    <div class="container py-5 product-detail">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-5 product-image">
                <img src="{{ asset('images/' . $product->img) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>

            <!-- Product Info -->
            <div class="col-lg-7 product-info">
                <h2>{{ $product->name }}</h2>
                <p class="price">₹ {{ $product->price }}</p>
                <p class="description"></p>
            </div>
             <!-- Additional Information -->
 <div class="row mt-5">
    <div class="col-lg-12">
        <h4>Product Description</h4>
        <p>{{ $product->des }}</p>
    </div>
</div>
              <!-- Specifications -->
            @if(!in_array($product->category_id, [2, 3, 5, 8]))
            <div class="specifications mt-3">
                <h4>Product Specifications</h4>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Brand:</strong> {{ $product->brand }}</li>
                    <li class="list-group-item"><strong>RAM:</strong> {{ $product->ram }} GB</li>
                    <li class="list-group-item"><strong>ROM:</strong> {{ $product->rom }} GB</li>
                    <li class="list-group-item"><strong>Processor:</strong> {{ $product->processor }}</li>
                    <li class="list-group-item"><strong>Battery:</strong> {{ $product->battery }}</li>
                    <li class="list-group-item"><strong>Camera:</strong> {{ $product->camera }}</li>
                    <li class="list-group-item"><strong>Display:</strong> {{ $product->display }} inches</li>
                </ul>
            </div>
            @endif

                <!-- Actions -->
                <div class="actions mt-4">
                      <!-- Add Quantity Dropdown -->
                      <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <select name="quantity" id="quantity" class="form-control" required>
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select><br>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                {{-- </div>
                    <div class="actions mt-4">
                    <button class="btn btn-primary">Buy Now</button>
                </div> --}}

        </div>

        {{-- <div class="review-form">
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

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div> --}}

        <div class="customer-reviews">
            <h4>Customer Reviews</h4>
            @foreach ($product->reviews as $review)
                <div class="review">
                    <p>
                        <strong>{{ $review->user->name }}</strong>
                        <span class="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review->rating ? ' fa-star' : ' fa-star-o' }}"></i>
                            @endfor
                        </span>
                        - "{{ $review->message }}"
                    </p>
                    {{-- <p class="review-text">{{ $review->rating }}</p> --}}
                </div>
            @endforeach
        </div>

    <!-- offer -->
    <div class="container" id="offer">
        <div class="row">
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Free Shipping</h3>
                <p>On order over</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>Free Returns</h3>
                <p>Within 30 days</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h3>Fast Delivery</h3>
                <p>World Wide</p>
            </div>
            <div class="col-md-3 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h3>Big choice</h3>
                <p>Of products</p>
            </div>
        </div>
    </div>
    <!-- offer -->
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
