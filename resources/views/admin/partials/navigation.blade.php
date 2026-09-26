<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Ensure the container is scrollable */
        .navigation {
            height: 100vh; /* Full height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        /* Optional: Customize the scrollbar */
        .navigation::-webkit-scrollbar {
            width: 8px;
        }

        .navigation::-webkit-scrollbar-thumb {
            background: #888; /* Scrollbar color */
            border-radius: 4px;
        }

        .navigation::-webkit-scrollbar-thumb:hover {
            background: #555; /* Hover effect on scrollbar */
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="{{ asset('images/images.png') }}" alt="Brand Logo"
                                style="width: 240px; height: 110px; margin-top:2%">
                        </span>
                        {{-- <span class="title">Brand Name</span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customers') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('messages') }}">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view_products') }}">
                        <span class="icon">
                            <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('adminindex') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Index</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category') }}">
                        <span class="icon">
                            <ion-icon name="reorder-four-sharp"></ion-icon>
                        </span>
                        <span class="title">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders') }}">
                        <span class="icon">
                            <ion-icon name="cart-sharp"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('about_us') }}">
                        <span class="icon">
                            <ion-icon name="information-circle-outline"></ion-icon>
                        </span>
                        <span class="title">About us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart') }}">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Cart</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('wishlist') }}">
                        <span class="icon">
                            <ion-icon name="heart"></ion-icon>
                        </span>
                        <span class="title">Wishlist</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reviews') }}">
                        <span class="icon">
                            <ion-icon name="star-outline"></ion-icon>
                        </span>
                        <span class="title">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('coupondetail') }}">
                        <span class="icon">
                            <ion-icon name="card-outline"></ion-icon>
                        </span>
                        <span class="title">Coupon</span>
                    </a>
                </li>
                @if (Auth::check())
                <li>
                    <a href="{{ route('logout') }}">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
    </ul>
<a href="#">
    {{-- {{ route('profile_ad') }} --}}
            <div class="user">
                <img src="{{ asset('images/nikhil.jpg') }}" alt="">
            </div>
        </a>
        </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
    <script>// main.js
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.querySelector('.toggle');
            const navigation = document.querySelector('.navigation');
            const main = document.querySelector('.main');

            toggle.addEventListener('click', () => {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            });
        });</script>
</body>
