
    <style>
        /* General styling */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: #001f3d; /* Darker background for futuristic look */
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        /* Container to hold left and right sections */
        .container {
            display: flex;
            width: 85%;
            max-width: 1200px;
            height: 550px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: #fff;
            overflow: hidden;
        }

        /* Left Section: Futuristic Design */
        .left-section {
            flex: 1.5;
            background: linear-gradient(135deg, #003366, #0066cc); /* Futuristic blue tones */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
        }

        .left-section img {
            width: 350px;
            height: 180px;
            border-radius: 20%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .left-section h1 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .left-section p {
            font-size: 16px;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Right Section: Verification Form */
        .right-section {
            flex: 1;
            background: #f5f5f5;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 0 20px 20px 0;
        }

        .right-section h2 {
            color: #003366;
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        /* Form Group */
        .form-group {
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            width: 250px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #003366;
            box-shadow: 0 0 10px rgba(0, 51, 102, 0.4);
        }

        /* Submit Button */
        .resend-button {
            width: 100%;
            padding: 14px;
            background: #003366;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .resend-button:hover {
            background: #005599;
        }

        /* Links */
        .extra-links {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
            font-size: 14px;
        }

        .extra-links a {
            color: #003366;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .extra-links a:hover {
            color: #005599;
            text-decoration: underline;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .left-section h1 {
                font-size: 28px;
            }

            .left-section p {
                font-size: 14px;
                margin-bottom: 15px;
            }

            .right-section {
                padding: 25px;
            }

            .right-section h2 {
                font-size: 24px;
            }

            .form-group input {
                padding: 12px;
                font-size: 14px;
            }

            .resend-button {
                font-size: 16px;
            }

            .extra-links {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .left-section h1 {
                font-size: 22px;
            }

            .form-group input {
                padding: 10px;
                font-size: 12px;
            }

            .resend-button {
                font-size: 14px;
            }

            .extra-links {
                font-size: 10px;
            }
        }
    </style>

    <!-- Left Section: Futuristic Design -->
    <div class="container">
        <div class="left-section">
            <img src="{{ asset('/images/logo.jpg') }}" alt="Logo">
            <h1>Complete Registration!</h1>
            <p>Complete your registration and join us for a top-quality carwash experience.</p>
        </div>

        <!-- Right Section: Verification Form -->
        <div class="right-section">
            <h2>Verify Your Email</h2>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group">
                    <x-primary-button class="resend-button">
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="message">
    <p>Check your Gmail messages for the verification link!</p>
</div>

<style>
    /* Styling for the message container */
    .message {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        margin: 30px 0;
        background: linear-gradient(135deg, #003366, #0066cc);
        color: #fff;
        font-size: 1.2rem;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Message Text Styling */
    .message p {
        font-weight: bold;
        margin: 0;
    }

    /* Animation for the message box */
    .message::before {
        content: '';
        position: absolute;
        top: 10px;
        left: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #ff66b2; /* Pink accent color */
        animation: pulse 1.5s infinite ease-in-out;
    }

    /* Pulse animation for the small circle */
    @keyframes pulse {
        0% {
            transform: scale(0.5);
            opacity: 1;
        }
        50% {
            transform: scale(1);
            opacity: 0.7;
        }
        100% {
            transform: scale(0.5);
            opacity: 1;
        }
    }
</style>


            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="resend-button" type="submit">
                    {{ __('Go Back') }}
                </button>
            </form>

            <div class="extra-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <a href="{{ url('login') }}">Login</a>
            </div>
        </div>
    </div>

