@if (Auth::check())
@extends('layout')
@section('content')
<html lang="en">
<head>
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
    <!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- fonts links -->
    <style>
         #product-cards, #other-cards {
    margin-top: 2rem;
}

.card {
    border: 1px solid #ddd; /* Optional: Adds border for clarity */
    border-radius: 8px; /* Rounded corners for the card */
    overflow: hidden; /* Ensures content stays within the card */
}
        a {
            color: black;
            text-decoration: none;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            border: 2px solid transparent; /* Initial border */
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 30px;
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1;
            padding: 15px;
        }

        .card:hover {
            transform: scale(1.05); /* Zoom in effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional: Adds shadow for a lifted effect */
            border: 2px solid #090909; /* Border color on hover (adjust color as needed) */
        }
        .card img {
            width: 100%;
            height: 300px; /* Set a fixed height for images */
            object-fit: cover;
        }
        .card {
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        /* Ensure the button is square with equal width and height */
/* Ensure the button is borderless with just the icon */
.btn-icon {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2px; /* Add padding to control the size */
    width: 50px; /* Adjust width */
    height: 50px; /* Adjust height */
    background-color: white; /* Set background color */
    border: none; /* Remove the border */
    font-size: 24px; /* Set icon size */
    cursor: pointer; /* Change the cursor on hover */
}

/* Change the background color when hovering */
.btn-icon:hover {
    background-color: #ffffff; /* Hover background color */
}

/* Icon size adjustments */
.btn-icon i {
    font-size: 24px; /* Set icon size */
    color: #ff0088; /* Icon color */
}

/* Hover effect for the icon */
.btn-icon:hover i {
    transform: scale(1.2); /* Slightly scale the icon on hover */
    transition: transform 0.3s ease-in-out; /* Smooth scaling transition */
}

/* Optional: Button smooth transition */
.btn-icon {
    transition: background-color 0.3s ease; /* Smooth background color transition */
}


    </style>
</head>
<body>
    <!-- Display the category video only once -->
<video autoplay muted loop src="{{ asset('images/' . $category->video) }}" height="864.4" style="margin-left: -10%">
</video>

<!-- product cards -->
<div class="container" id="product-cards">
    <div class="overlay">
        <h1 class="text-center"></h1>
    </div>

    <div class="row" style="margin-top: 30px;">
        @foreach($products as $product)
        <div class="col-md-3 py-3 py-md-0">
            <div class="card">
                <a href="{{ route('product.details', $product->id) }}">
                    <img src="{{ asset('images/' . $product->img) }}" alt="{{ $product->name }}" class="card-img-top">
                </a>
                <div class="card-body">
                    <h3 class="text-center">
                        <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                    </h3>
                    <h6>₹{{ $product->price }}</h6>
                    <h6>save {{ $product->discount }}%</h6>
                    <div class="star text-center"></div>
                    <h2><span><li class="fa-solid fa-cart-shopping"></li></span></h2>
                     <!-- Add Wishlist Button -->
                     <div class="text-center mt-2">
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <!-- Add heart icon inside the button -->
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <!-- Add heart icon inside the button -->
                                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-icon" title="Add to Wishlist">
                                        <i class="bi bi-heart-fill"></i> <!-- Bootstrap Heart Icon -->
                                    </button>
                                </form>




                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

    <!-- product cards -->
</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
