<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0 5%; /* Adding padding for better spacing */
            background: linear-gradient(135deg, #e0f7fa, #f1f8e9); /* Soft gradient background */
        }

        .welcome-container {
            max-width: 60%; /* Larger width for left side */
            padding: 40px;
            margin-right: 50px; /* Add gap between welcome text and form */
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.85); /* Subtle white overlay with transparency */
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15); /* Enhanced shadow */
            transition: transform 0.3s ease-in-out;
        }

        .welcome-container:hover {
            transform: translateY(-5px); /* Lift on hover for a subtle effect */
        }

        .welcome-title {
            font-size: 70px;
    font-weight: 900;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: black; /* Set color to black */
    text-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Adjust shadow if desired */
        }

        .highlight {
            font-size: 50px;
    font-weight: 600;
    margin: 20px 0;
    letter-spacing: 1px;
    color: #007bff;
        }

        .welcome-description {
            font-size: 1.6rem; /* Larger font size for readability */
            color: #444;
            line-height: 1.8;
            margin-top: 0;
            max-width: 90%; /* Take up most of the container width */
        }

        .welcome-description span {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <h1 class="welcome-title">
        Welcome to <br> <span class="highlight">Shee Auto Polish & Ceramic Coating</span>
    </h1>
    <p class="welcome-description">
        Discover <span>unmatched car care</span> with our expert polishing and ceramic coating services,
        ensuring a lasting shine and protection for your vehicle.
    </p>
</div>

<!-- Your login form goes here, to the right of the welcome text -->

</body>
</html>

<!-- Your login form goes here, to the right of the welcome text -->

</body>
</html>




<x-guest-layout>
    <style>
        body {
            background-color: #fff; /* Set background image */
            background-size: cover; /* Cover entire background */
            background-position: center; /* Center the background image */
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
        }

        .form-content{
            width: 400px;
            height: 510px;
        }
        

        .form-container h1 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
        }

        .form-container label {
            display: block;
            color: #333;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
            font-size: 1rem;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff; /* White background for input */
            color: #000; /* Black text color */
            font-size: 1rem;
            transition: background 0.3s;
        }

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            background-color: #f0f0f0; /* Slightly lighter on focus */
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            background: #333;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            
        }

        .form-container button:hover {
            background: #555;
        }

        .form-container .link {
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .form-container .link:hover {
            color: #555;
        }

        .form-container .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
            color: #ffffff;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .password-container {
            position: relative;
        }

        .password-container .eye-icon {
    cursor: pointer;
    position: absolute;
    right: 10px; /* Space from the right edge */
    top: 70%; /* Center vertically within the input field */
    transform: translateY(-50%); /* Adjust vertical alignment */
    font-size: 1.2rem;
    color: #000;
    z-index: 1; /* Ensure the icon is above the input */
}

        /* Adjust error messages color */
        .mt-2 {
            color: #ff6b6b;
            text-align: left;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        #password {
        width: 100%;
        padding: 0.8rem;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #ffffff; /* White background */
        color: #000000; /* Default text color is black */
        font-size: 1rem;
        transition: color 0.3s; /* Smooth transition for color */
    }
    </style>
    

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-container">
        <h1>{{ __('Log in') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full"
                              type="email" name="email" :value="old('email')"
                              required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 password-container">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password" name="password" required
                              autocomplete="current-password" />
                <i class="eye-icon fa fa-eye" onclick="togglePassword()"></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <button type="submit">
                    {{ __('Log in') }}
                </button>
            </div>

            <div class="mt-4">
                <span>Don't have an account?</span>
                <a class="link" href="{{ route('register') }}">
                    {{ __('Register here!') }}
                </a>
            </div>
        </form>
    </div>
    <script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.querySelector(".eye-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordInput.style.color = "#000000"; // Set text color to black when visible
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            passwordInput.style.color = "#000000"; // Keep text color black for consistency
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>

</x-guest-layout>
