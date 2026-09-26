<nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}" id="logo"><span id="span1">Tech </span>Trend <span> Mall</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="{{ asset('images/menu.png') }}" alt="" width="30px"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product')}}">Product</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/offer')}}">Offers</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                </li>

                <!-- Conditionally show Login or Logout -->
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
            <div class="d-flex align-items-center" id="search-profile">
                <!-- Search Icon -->
                <a href="#" class="ms-2" id="search-icon" title="Search" onclick="toggleSearch()">
                    <i class="fa fa-search medium-icon" aria-hidden="true"></i>
                </a>
                <div id="search-box" class="d-none">
                    <form id="search-form" action="/search" method="GET">
                        <input type="text" name="query" placeholder="Search..." class="form-control">
                    </form>
                </div>

                @if (Auth::check())
                <a href="{{ url('add_to_cart') }}" class="ms-2">
                    <i class="fa fa-shopping-cart medium-icon" aria-hidden="true"></i>
                </a>
                <a href="{{ url('profile') }}" class="ms-2">
                    <i class="fa fa-user medium-icon" aria-hidden="true"></i>
                </a>
                <a href="{{ route('wishlist.index') }}" class="ms-2" title="Wishlist"> <!-- Add Wishlist Link Here -->
                    <i class="fa fa-heart medium-icon" aria-hidden="true"></i> <!-- Heart Icon for Wishlist -->
                </a>
                <a href="{{ route('orders.index') }}" class="ms-2" title="Orders">
                <i class="fa fa-cube medium-icon" aria-hidden="true"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</nav>
<script>
function toggleSearch() {
    const searchBox = document.getElementById('search-box');
    searchBox.classList.toggle('d-none');
}
</script>
<style>
    .medium-icon {
        font-size: 1.5em; /* Adjust the size as needed */
        color: black; /* Set the icon color to black */
        transition: transform 0.2s ease; /* Smooth transition */
    }

    #search-icon:hover .medium-icon {
        transform: translateY(3px); /* Move down on hover */
    }

    #search-box {
        margin-left: 10px; /* Space between icon and input */
        transition: opacity 0.3s ease; /* Smooth transition for visibility */
    }

    #search-box input {
        width: 200px; /* Set a fixed width for the input */
    }
</style>

<script>
    function toggleSearch() {
        const searchBox = document.getElementById('search-box');
        searchBox.classList.toggle('d-none'); // Toggle visibility
    }
</script>
