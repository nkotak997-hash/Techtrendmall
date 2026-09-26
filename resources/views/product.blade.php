@extends('layout')
@section('content')
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
    <!-- fonts links -->
    <style>
.card {
    display: flex;
    flex-direction: column;
    height: 100%;
    border: none; /* Optional: remove the default border if desired */
}

.card-img-top {
    height: 200px; /* Fixed height for consistent image size */
    width: 100%; /* Full width */
    object-fit: contain; /* Ensure the image is fully visible without cropping */
}

.card-body {
    flex: 1; /* Allow the body to expand and fill available space */
    text-align: center; /* Center text */
}

.card-title {
    margin-bottom: 0.5rem; /* Add some space below the title */
}

.card-footer {
    background: none; /* Remove background from footer if not needed */
    border-top: none; /* Remove top border if desired */
}

.card-link {
    text-decoration: none; /* Remove underline from links */
}

.card-link:hover {
    color: inherit; /* Ensure the link color does not change on hover */
}

    </style>
</head>
<body>
   <!-- product cards -->

   <div class="container" id="product-cards">
    <h1 class="text-center mb-4">PRODUCTS</h1>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="{{ route('product.category', $category->id) }}" class="card-link">
                    <img src="{{ asset('images/' . $category->img) }}" alt="{{ $category->name }}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">{{ $category->name }}</h2>
                        <h3 class="text-center"><i class="fa-solid fa-cart-shopping"></i></h3>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- <div class="col-md-3 mb-4">
    <div class="card">
        <a href="{{ route('product.category', $category->id) }}" class="card-link">
            <img src="{{ asset('images/' . $category->img) }}" alt="{{ $category->name }}" class="card-img-top">
            <div class="card-body">
                <h2 class="card-title">{{ $category->name }}</h2>
                <h3 class="text-center">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <a href="{{ route('wishlist.add', $category->id) }}" class="btn btn-outline-secondary btn-sm">
                        Add to Wishlist
                    </a>
                </h3>
            </div>
        </a>
    </div>
</div> --}}

<!-- product cards -->

    <hr>

    <!-- other cards -->
    <div class="container" id="other-cards">
        <div class="row">
            <div class="col-md-6 py-3 py-md-0">
                <div class="card">
                    <img src="./images/c1.png" alt="" class="img-fluid">
                    <div class="card-img-overlay">
                        <h3>Best Laptop</h3>
                        <h5>Latest Collection</h5>
                        <p>Up To 50% Off</p>
                        <button id="shopnow">Shop Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 py-3 py-md-0">
                <div class="card">
                    <img src="./images/c2.png" alt="" class="img-fluid">
                    <div class="card-img-overlay">
                        <h3>Best Headphone</h3>
                        <h5>Latest Collection</h5>
                        <p>Up To 50% Off</p>
                        <button id="shopnow">Shop Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- other cards -->
</body>
</html>
@endsection
