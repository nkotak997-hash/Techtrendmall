<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.819), rgba(117, 255, 255, 0.7)); /* Subtle gradient */
    overflow: hidden;
    color: #000000; /* White text for contrast */
    position: relative;
    transition: background-color 1s, color 1s;
}
        h1 {
            font-size: 2.5rem;
            animation: float 3s ease-in-out infinite;
        }

        p {
            font-size: 1.2rem;
            margin-top: 1rem;
            animation: fadeIn 2s ease-in-out forwards;
            opacity: 0;
        }



        /* Fade-in animation for the paragraph */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Decorative glowing elements */
        .glow {
            position: absolute;
            top: 20%;
            left: 50%;
            width: 200px;
            height: 200px;
            background: rgba(0, 0, 0, 0.978);
            border-radius: 50%;
            filter: blur(50px);
            animation: moveGlow 5s infinite;
        }

        .glow:nth-child(1) {
            background: rgb(255, 255, 255);
            animation-duration: 4s;
        }

        .glow:nth-child(2) {
            background: rgba(255, 255, 255, 0);
            animation-duration: 6s;
        }

        /* Animation for glowing elements */
        @keyframes moveGlow {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
            }
        }

        .checkmark {
    position: absolute;
    top: 35%;
    left: 50%;
    width: 100%;
    height: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0; /* Initially invisible */
    animation: checkmarkAppear .30s forwards; /* Smooth easing */
}

.checkmark svg {
    width: 100%;
    height: 100%;
    fill: none;
    stroke: #32CD32; /* Green color */
    stroke-width: 3;
    stroke-linecap: right;
    stroke-linejoin: left;
}
@keyframes checkmarkAppear {
    0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(1.5) rotate(0deg);
    }
    25% {
        opacity: 0.5;
        transform: translate(-50%, -50%) scale(1.8) rotate(10deg); /* Rotate faster */
    }
    50% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1.5) rotate(180deg); /* Rotate faster */
    }
    75% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1.5) rotate(270deg); /* Rotate faster */
    }
    100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1.5) rotate(360deg); /* Complete 360-degree rotation */
    }
}

        .content {
    display: flex;
    flex-direction: column; /* Arrange content vertically */
    align-items: center; /* Center horizontally */
    justify-content: center; /* Center vertically */
    position: absolute; /* Use absolute positioning */
    top: 80%; /* Move content vertically to the center */
    left: 50%; /* Move content horizontally to the center */
    transform: translate(-50%, -50%); /* Offset to truly center the content */
    text-align: center; /* Center text inside */
}
    </style>
</head>
<body>  <div class="checkmark" id="checkmark">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
        <path d="M26 1C12.76 1 1 12.76 1 26s11.76 25 25 25 25-11.76 25-25S39.24 1 26 1zm0 48C13.19 49 3 38.81 3 26S13.19 3 26 3s23 10.19 23 23-10.19 23-23 23z"/>
        <path d="M36.23 16.79l-14.7 14.7-7.06-7.06-1.42 1.41 8.48 8.48 16.12-16.12z"/>
    </svg>
</div>
    {{-- <div class="glow"></div>
    <div class="glow"></div> --}}
    <div class="content">
        <h1>Thank you for your order!</h1>
        <p>Your order has been successfully placed.You will receive an email confirmation shortly with the details of your order.
            We are preparing your items for shipment and will notify you once they are on the way.
            Thank you for shopping with us. We hope you enjoy your purchase!
        </p>
    </div>


    <script>
        // Add interaction for glowing effect and background/text change after animation
        document.body.addEventListener('click', () => {
            const checkmark = document.getElementById('checkmark');
            checkmark.style.animation = "checkmarkAppear 2s ease-out forwards";


        });
    </script>
</body>
</html>
