<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login - Shee Auto Polish & Ceramic Coating</title>
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

        /* Left Section: Futuristic Carwash Design */
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

       

/* Apply the updated animation to the logo */
.left-section img {
    width: 300px; /* Large logo size */
    height: 80px;
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

        /* Right Section: Login Form */
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

        /* Input Fields */
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

        /* Password Eye Icon */
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #003366;
            cursor: pointer;
            margin-top: 8px;
        }

        /* Submit Button */
        .login-button {
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

        .login-button:hover {
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

            .login-button {
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

            .login-button {
                font-size: 14px;
            }

            .extra-links {
                font-size: 10px;
            }
        }

        .mt-2 {
            color: #ff6b6b;
            text-align: left;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section: Welcome Section -->
        <div class="left-section">
            <!-- <img src="{{ asset('/images/logo.jpg') }}" alt="Logo"> -->
            <h1>Welcome!</h1>
            <p>Book your carwash with ease and enjoy our top-quality services.</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Right Section: Login Form -->
        <div class="right-section">
    <h2>{{ __('Log in') }}</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Field -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            
            <!-- Display email error below the email input -->
            @error('email')
                <span class="text-danger mt-2" style="display:block;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="form-group password-wrapper">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"/>

            <i class="eye-icon fa fa-eye" onclick="togglePassword()"></i>
            
            <!-- Display password error below the password input -->
            @error('password')
                <span class="text-danger mt-2" style="display:block;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="login-button">Log in</button>

        <div class="extra-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
            <a href="{{ url('register') }}">Create an Account</a>
        </div>
    </form>
</div>


    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
