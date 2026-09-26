@extends('layout')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Your Wishlist</h1>

    @if ($wishlists->isEmpty())
        <p class="text-center">Your wishlist is empty.</p>
    @else
    <div class="row">
        @foreach ($wishlists as $wishlist)
            <div class="col-md-3 col-sm-6 col-12 mb-4">
                <div class="card wishlist-card shadow-sm">
                    <!-- Display Product Image -->
                    @if ($wishlist->product->img)
                        <img src="{{ asset('images/'.$wishlist->product->img) }}" class="card-img-top" alt="Product Image">
                    @else
                        <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif

                    <div class="card-body text-center">
                        <!-- Display Product Name -->
                        <h5 class="card-title">{{ $wishlist->product->name }}</h5>

                        <!-- Display Product Description -->
                        <p class="card-text">{{ $wishlist->product->des ?? 'No description available.' }}</p>

                        <!-- Remove Button -->
                        <form action="{{ route('wishlist.remove', $wishlist->product_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-remove">
                                <i class="fa fa-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>


<!-- Styles for Wishlist Card -->
<style>
.wishlist-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff; /* Ensure white background */
    height: 100%;
    width: 100%;  /* Ensure the card takes full width of the column */
    max-width: 300px; /* Set a max-width for larger screens */
    margin: 0 auto; /* Centers the card within its column */
}

.wishlist-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    object-fit: cover;
    width: 100%;   /* Ensure the width spans the card */
    height: 200px; /* Set a fixed height for images */
    display: block; /* Prevents any unwanted gaps below images */
}

.card-body {
    padding: 5%;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
    color: #555; /* Lighter text color */
    margin-bottom: 15px;
}

.btn-remove {
    margin-top: 10px;
    font-size: 0.9em;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    color: #fff;
    background-color: #dc3545; /* Bootstrap danger color */
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    transition: background-color 0.3s ease;
}

.btn-remove:hover {
    background-color: #c82333; /* Darker shade of red on hover */
}

.btn-remove i {
    font-size: 1.1em;
}

/* Ensure responsiveness for smaller screens */
@media (max-width: 768px) {
    .wishlist-card {
        width: 100%; /* Full width on small screens */
        max-width: 100%; /* Remove max-width on smaller screens */
    }

    .card-img-top {
        height: 180px; /* Slightly smaller image size on mobile */
    }

    .card-title {
        font-size: 1.1rem; /* Smaller font on mobile */
    }

    .card-text {
        font-size: 0.9rem; /* Smaller text on mobile */
    }
}

@media (max-width: 576px) {
    .wishlist-card {
        width: 100%; /* Full width on extra small screens */
    }
}

</style>

@endsection
