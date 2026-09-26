@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    background-color: #ffffff;
}

h1 {
    margin-bottom: 40px;
    color: #343a40;
}

.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

.offer-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #28a745;
}

.original-price {
    text-decoration: line-through;
    margin-left: 10px;
    color: #000000;
}
.banner {
            position: relative;
            overflow: hidden;
            width: 111%;
            margin-left: -15%;
            height: 500px; /* Adjust height as needed */
            width: 130%;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease; /* Smooth zoom effect */
        }

        .banner:hover img {
            transform: scale(1.1); /* Zoom in effect on hover */
        }

        .banner-content {
            margin-top: -5%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            z-index: 2; /* Ensure text is above the image */
        }

        .banner-content h1 {
            font-size: 2.5rem; /* Adjust font size */
            margin-bottom: 1rem;
        }

        .banner-content button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            background-color: #0066ff; /* Bootstrap primary color */
            color: rgb(255, 255, 255);
            border-radius: 5px;
            cursor: pointer;
            margin-left:-40%;
        }

        .banner-content button:hover {
            background-color: #ffffff00; /* Darker shade on hover */
        }
        .marquee-container {
    overflow: hidden;
    white-space: nowrap; /* Prevent line breaks */
}

.marquee {
    display: inline-block;
    animation: scroll 20s linear infinite; /* Adjust duration as needed */
}

.marquee img {
    width: 100px; /* Fixed width */
    height: 100px; /* Fixed height */
    margin-right: 20px; /* Space between images */
    background-color: transparent; /* Ensures background is transparent */
    border-radius: 10px; /* Optional: adds rounded corners */
    object-fit: cover; /* Ensures the image covers the defined width/height */
}


@keyframes scroll {
    0% {
        transform: translateX(100%); /* Start from the right */
    }
    100% {
        transform: translateX(-100%); /* Move to the left */
    }
}




    </style>
</head>
<body>
    <section class="banner">
        <img src="./images/banner2.jpg "  alt="Banner Image">
        <div class="banner-content">
            <button class="btn btn-primary">Shop Now</button>
        </section>
        <marquee behavior="scroll" direction="left" scrollamount="5">
            <img src="./images/Apple-Logo.jpg" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/images (1).png" alt="Offer 2" style="width: 100px; margin-right: 20px;">
            <img src="./images/caec2ddfc4c22d0978bf4f6030294cb0.jpg" alt="Offer 3" style="width: 100px; margin-right: 20px;">
            <img src="./images/vivo-brand-logo-phone-symbol-name-black-design-chinese-mobile-illustration-free-vector.jpg" alt="Offer 3" style="width: 100px; margin-right: 20px;">
            <img src="./images/oneplus-logo-black-and-white.png" alt="Offer 3" style="width: 100px; margin-right: 20px;">
            <img src="./images/xiaomi-brand-logo-phone-symbol-with-name-black-design-chinese-mobile-illustration-free-vector.jpg" alt="Offer 3" style="width: 100px; margin-right: 20px;">
            <img src="./images/9005b8fd54773b8ed68157d761436b84.jpg" alt="Offer 3" style="width: 100px; margin-right: 20px;">
            <img src="./images/images (2).png" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/aa8s698qd.webp" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/images (3).png" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/png-clipart-logo-nikon-camera-nikon-logo-text-logo.png" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/kisspng-logo-brand-panasonic-chhota-bheem-hd-5b562230c12204.7153067515323715047911.jpg" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/png-transparent-pentax-hd-logo.png" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/Apple-Logo.jpg" alt="Offer 1" style="width: 100px; margin-right: 20px;">
            <img src="./images/Apple-Logo.jpg" alt="Offer 1" style="width: 100px; margin-right: 20px;">

        </marquee>
    <div class="container my-5">
        <h1 class="text-center">Special Offers</h1>
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="offer1.jpg" class="card-img-top" alt="Offer 1">
                    <div class="card-body">
                        <h5 class="card-title">Offer Title 1</h5>
                        <p class="card-text">Description of the first offer. Great savings await!</p>
                        <p class="offer-price">$99 <span class="original-price">$199</span></p>
                        <a href="#" class="btn btn-primary">Get Offer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="offer2.jpg" class="card-img-top" alt="Offer 2">
                    <div class="card-body">
                        <h5 class="card-title">Offer Title 2</h5>
                        <p class="card-text">Description of the second offer. Don’t miss out!</p>
                        <p class="offer-price">$79 <span class="original-price">$149</span></p>
                        <a href="#" class="btn btn-primary">Get Offer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="offer3.jpg" class="card-img-top" alt="Offer 3">
                    <div class="card-body">
                        <h5 class="card-title">Offer Title 3</h5>
                        <p class="card-text">Description of the third offer. Limited time only!</p>
                        <p class="offer-price">$49 <span class="original-price">$99</span></p>
                        <a href="#" class="btn btn-primary">Get Offer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container my-5">
    <h1 class="text-center"></h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="offer1.jpg" class="card-img-top" alt="Offer 1">
                <div class="card-body">
                    <h5 class="card-title">Offer Title 1</h5>
                    <p class="card-text">Description of the first offer. Great savings await!</p>
                    <p class="offer-price">$99 <span class="original-price">$199</span></p>
                    <a href="#" class="btn btn-primary">Get Offer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="offer2.jpg" class="card-img-top" alt="Offer 2">
                <div class="card-body">
                    <h5 class="card-title">Offer Title 2</h5>
                    <p class="card-text">Description of the second offer. Don’t miss out!</p>
                    <p class="offer-price">$79 <span class="original-price">$149</span></p>
                    <a href="#" class="btn btn-primary">Get Offer</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="offer3.jpg" class="card-img-top" alt="Offer 3">
                <div class="card-body">
                    <h5 class="card-title">Offer Title 3</h5>
                    <p class="card-text">Description of the third offer. Limited time only!</p>
                    <p class="offer-price">$49 <span class="original-price">$99</span></p>
                    <a href="#" class="btn btn-primary">Get Offer</a>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection 
