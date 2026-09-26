@if (Auth::check())
@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- FontAwesome for icons -->
    <style>
        /* styles.css */

        .text-center {
            text-align: center;
        }

        .cart {
            margin: 20px 0;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }

        td img {
            width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
        }

        .item-total {
            font-weight: bold;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 0.875rem;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }

        .cart-summary {
            margin-top: 20px;
        }

        .cart-summary h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .cart-summary p {
            font-size: 1rem;
            margin: 5px 0;
        }

        .cart-summary .btn-primary {
            margin-top: 10px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            text-align: center;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .text-center {
            text-align: center;
        }

        /* Cart Section */
        .cart {
            margin: 20px auto;
            max-width: 1200px; /* Set max width for content */
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }

        td img {
            width: 100px;
            height: auto;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
        }

        .item-total {
            font-weight: bold;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 0.875rem;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #ffffff;
        }

        /* Cart Summary Section */
        .cart-summary {
            margin-top: 20px;
            text-align: center;
        }

        .cart-summary h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .cart-summary p {
            font-size: 1rem;
            margin: 5px 0;
        }

        .cart-summary .btn-primary {
            margin-top: 10px;
        }

        /* Coupon Section */
        .coupon-input {
            max-width: 300px;
            margin: 0 auto;
        }

        #discount-message {
            font-weight: bold;
            font-size: 1rem;
            color: #28a745;
        }

        #invalid-message {
            font-weight: bold;
            font-size: 1rem;
            color: #dc3545;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            text-align: center;
            width: 400px;
            max-width: 90%;
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .close-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #0056b3;
        }

        /* Checkout Modal */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .modal-header h3 {
            margin: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .close-btn, .submit-btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="text-center">Your Cart</h1>
        </div>
    </header>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <div class="container cart">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr data-product-id="{{ $cartItem->product->id }}">
                        <td>
                            <img src="{{ asset('images/' . $cartItem->product->img) }}" alt="{{ $cartItem->product->name }}">
                        </td>
                        <td>{{ $cartItem->product->name }}</td>
                        <td>
                           {{ $cartItem->quantity }}
                        </td>
                        <td>₹ {{ number_format($cartItem->product->price, 2) }}</td>
                        <td class="item-total">₹ {{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="remove-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="cart-summary">
            <h2>Cart Summary</h2>
            <p>Total Items: <span class="total-items">{{ $cartItems->sum('quantity') }}</span></p>
            <p>Total Price: <span class="total-price">₹ {{ number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }} </span></p>

            <!-- Coupon Input -->
            <div class="coupon-input">
                <input type="text" id="coupon-code" class="form-control" placeholder="Enter Coupon Code">
                <br>
                <button id="apply-coupon" class="btn btn-success btn-sm">Apply Coupon</button>
            </div>

            <!-- Feedback Messages -->
            <p id="discount-message" class="text-success mt-3 d-none"></p>
            <p id="invalid-message" class="text-danger mt-3 d-none">Invalid Coupon Code</p>
            <p id="updated-total" class="mt-3 d-none">
                <strong>Updated Total Price:</strong> <span id="final-total-price"></span>
            </p>

            <button id="buy-now" class="btn btn-primary">Buy Now</button>
        </div>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


        <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm">Your Orders</a>


<!-- Checkout Modal -->
<div class="modal" id="checkout-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Checkout</h3>
        </div>
        <div class="modal-body">
            <form id="checkout-form" action="{{ route('checkout.handle') }}" method="POST">
                 @csrf
                <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" id="username" name="username" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="payment">Payment Method</label>
                    <select id="payment" name="payment" required>
                        {{-- <option value="card">Credit/Debit Card</option> --}}
                        <option value="paypal">Razorpay</option>
                        <option value="cod">Cash on Delivery</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
                <button type="button" class="close-btn" onclick="closeCheckoutModal()">Close</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script>
    //coupon script
    document.getElementById('apply-coupon').addEventListener('click', function () {
    const couponCode = document.getElementById('coupon-code').value;

    fetch('{{ route("apply.coupon") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ coupon_code: couponCode })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('discount-message').textContent = data.message;
            document.getElementById('discount-message').classList.remove('d-none');
            document.getElementById('invalid-message').classList.add('d-none');

            // Update the total price in the UI
            document.querySelector('.total-price').textContent = `₹ ${data.discounted_price}`;
        } else {
            document.getElementById('invalid-message').textContent = data.message;
            document.getElementById('invalid-message').classList.remove('d-none');
            document.getElementById('discount-message').classList.add('d-none');
        }
    })
    .catch(error => console.error('Error:', error));
});


</script>
    <script>
        //remove cart script
document.querySelectorAll('.btn-danger').forEach(button => {
    button.addEventListener('click', (e) => {
        const row = e.target.closest('tr');  // Get the closest <tr> (the row that was clicked)
        const productId = row.dataset.productId;  // Get the product ID from the row's data-product-id

        // Send a DELETE request to the server to remove the product
        fetch(`/cart/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  row.remove();  // Remove the row from the DOM
                  updateCartSummary();  // Update the cart summary after removal
              } else {
                  alert('Failed to remove item');
              }
          })
          .catch(err => {
              console.error('Error removing item:', err);
              alert('Error removing item');
          });
    });
});
    </script>
    <script>
//input cart script
      document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', (e) => {
        const row = e.target.closest('tr');
        const price = parseFloat(row.querySelector('td:nth-child(4)').textContent.replace('₹', '').trim());
        const quantity = parseInt(e.target.value);
        const total = price * quantity;

        // Update the item's total price
        row.querySelector('.item-total').textContent = `₹ ${total.toFixed(2)}`;

        // Update cart summary
        updateCartSummary();
    });
});

function updateCartSummary() {
    let totalItems = 0;
    let totalPrice = 0;

    // Loop through each quantity input to calculate the total number of items
    document.querySelectorAll('.quantity-input').forEach(input => {
        totalItems += parseInt(input.value);
    });

    // Loop through each item total to calculate the overall total price
    document.querySelectorAll('.item-total').forEach(total => {
        totalPrice += parseFloat(total.textContent.replace('₹', '').trim());
    });

    // Update the total items and price in the cart summary
    document.querySelector('.total-items').textContent = totalItems;
    document.querySelector('.total-price').textContent = `₹ ${totalPrice.toFixed(2)}`;
}

// Handle remove item functionality
document.querySelectorAll('.btn-danger').forEach(button => {
    button.addEventListener('click', (e) => {
        const row = e.target.closest('tr');
        const productId = row.dataset.productId;

        // Send request to remove the item (using AJAX)
        fetch(`/cart/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  row.remove(); // Remove the row from the cart table
                  updateCartSummary(); // Update the cart summary after removal
              } else {
                  alert('Failed to remove item');
              }
          })
          .catch(err => {
              console.error('Error removing item:', err);
              alert('Error removing item');
          });
    });
});

    </script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
        const buyNowButton = document.getElementById("buy-now");
        const checkoutModal = document.getElementById("checkout-modal");

        buyNowButton.addEventListener("click", () => {
            checkoutModal.style.display = "flex";
        });

        function closeCheckoutModal() {
            checkoutModal.style.display = "none";
        }
        window.closeCheckoutModal = closeCheckoutModal;

        const checkoutForm = document.getElementById("checkout-form");
        checkoutForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const paymentMethod = document.getElementById("payment").value;

            // Fetch final price: discounted price if available, otherwise total price
            const discountedPrice = "{{ session('discounted_price') }}";
            const totalPrice = "{{ session('total_price') }}";
            const finalPrice = discountedPrice ? discountedPrice : totalPrice;

            if (!finalPrice) {
                alert("Price information is missing. Please try again.");
                return;
            }

            if (paymentMethod === "paypal") {
                const amountInPaise = Math.round(finalPrice * 100);

                const options = {
                    key: "rzp_test_FUijwPsI1t6dUR",
                    amount: amountInPaise,
                    currency: "INR",
                    name: "TechTrendMall",
                    description: "Purchase Description",
                    image: "https://example.com/your-logo.png",
                    handler: function (response) {
                        alert("Payment successful! Payment ID: " + response.razorpay_payment_id);

                        const paymentMethodInput = document.createElement("input");
                        paymentMethodInput.type = "hidden";
                        paymentMethodInput.name = "payment_method";
                        paymentMethodInput.value = "razorpay";
                        checkoutForm.appendChild(paymentMethodInput);

                        const paymentIdInput = document.createElement("input");
                        paymentIdInput.type = "hidden";
                        paymentIdInput.name = "payment_id";
                        paymentIdInput.value = response.razorpay_payment_id;
                        checkoutForm.appendChild(paymentIdInput);

                        checkoutForm.submit();
                    },
                    prefill: {
                        name: document.getElementById("username").value,
                        email: document.getElementById("email").value,
                        contact: document.getElementById("phone").value,
                    },
                    theme: {
                        color: "#F37254",
                    },
                };

                const razorpay = new Razorpay(options);
                razorpay.open();

            } else if (paymentMethod === "cod") {
                alert("Your order has been successfully placed with Cash on Delivery!");

                const paymentMethodInput = document.createElement("input");
                paymentMethodInput.type = "hidden";
                paymentMethodInput.name = "payment_method";
                paymentMethodInput.value = "cod";
                checkoutForm.appendChild(paymentMethodInput);

                checkoutForm.submit();
            } else {
                alert("Please select a valid payment method.");
            }
        });
    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
@else
<script type="text/javascript">
    window.location.href = "{{ route('login') }}";
</script>
@endif
