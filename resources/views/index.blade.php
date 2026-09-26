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
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- inline styles -->
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
    {{-- <video autoplay muted loop src="images/Iphone16.webm" height="864.4" style="margin-left: -10%">
        <video src="videoplayback.mp4"></video>
        </video> --}}

        @foreach($video as $item)
                <video autoplay muted loop src="{{ asset('images/' . $item->video) }}" height="864.4" style="margin-left: -10%"></video>
                <input type="hidden" name="current_video" value="{{ $item->video }}">
                <input type="hidden" name="video_id" value="{{ $item->id }}">
            @endforeach


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


<!-- product cards -->

<!-- Other Cards -->
{{-- <div class="container" id="other-cards">
    <div class="row">
        <div class="col-md-6 py-3 py-md-0">
            <div class="card">
                <img src="./images/c1.png" alt="Best Laptop" class="card-img-top">
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
                <img src="./images/c2.png" alt="Best Headphone" class="card-img-top">
                <div class="card-img-overlay">
                    <h3>Best Headphone</h3>
                    <h5>Latest Collection</h5>
                    <p>Up To 50% Off</p>
                    <button id="shopnow">Shop Now</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- other cards -->
    @foreach($video as $item)
    <section class="banner">
        <div class="img">
            {{-- <img src="./images/asus16.jpg" alt="Banner Image"> --}}
            <img src="{{ asset('images/' . $item->image) }}" alt="Banner Image">
        </div>
    </section>
    @endforeach

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
</body>
</html>
@endsection
