<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">





<x-guest-layout>
    <style>
        body {
            background-image: url('/images/carbg.jpg'); /* Set the background image */
            background-size: cover; /* Cover entire background */
            background-position: center; /* Center the background image */
            font-family: 'Arial', sans-serif;
            color: #000; /* Set default text color to black */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-content{
            width: 450px;
            height: 680px;
        }

        .form-section {
            max-width: 90000px; /* Increase the maximum width for a wider form */
            width: 100%;
            
            color: #000; /* Black text color */
            text-align: center;
            /* Removed background and box-shadow to make it blend into the page */
        }

        h1 {
            color: #333; /* Darker color for heading */
            margin-bottom: 1rem;
            font-size: 1.8rem;
            font-weight: 700;
        }

        label {
            display: block;
            color: #333;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            max-width: 100000px;
            padding: 0.5rem;
            margin-bottom: .5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff; /* White background for inputs */
            color: #000; /* Black text color */
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #f0f0f0;
            outline: none;
        }

        button {
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
            margin-top: 1rem;
        }

        button:hover {
            background: #555;
        }

        .link {
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .link:hover {
            color: #555;
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
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="form-section">
        <h1>{{ __('Register') }}</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Address -->
            <div>
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="password-container">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <i class="eye-icon fa fa-eye" onclick="togglePassword('password', this)"></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="password-container">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <i class="eye-icon fa fa-eye" onclick="togglePassword('password_confirmation', this)"></i>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end">
                <a class="link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button>
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword(inputId, iconElement) {
            var passwordInput = document.getElementById(inputId);
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                iconElement.classList.remove("fa-eye");
                iconElement.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                iconElement.classList.remove("fa-eye-slash");
                iconElement.classList.add("fa-eye");
            }
        }
    </script>
</x-guest-layout>
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
            background-image: url('/images/carbg.jpg'); /* Set the background image */
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