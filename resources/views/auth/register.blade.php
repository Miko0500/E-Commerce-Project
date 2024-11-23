<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Register - Shee Auto Polish & Ceramic Coating</title>
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
            height: 620px;
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
            width: 50px; /* Large logo size */
    height: 30px;
            border-radius: 20%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            animation: logoAnimation 8s ease-in-out infinite; /* Animation lasts 8s (spin + 2s cooldown) */
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

        /* Right Section: Register Form */
        .right-section {
            flex: 1;
            background: #f5f5f5;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 0 20px 20px 0;
            height: 550px;
        }

        .right-section h2 {
            color: #003366;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: bold;
            margin-top: -10px;
        }

        /* Input Fields */
        .form-group {
            width: 100%;
            margin-bottom: 7px;
            position: relative;
        }

        .form-group label {
            color: #333;
            font-size: 12px;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            width: 250px;
            padding: 14px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 1px;
            outline: none;
            transition: all 0.3s ease;
            height: 1px;
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
            margin-top: 9px;
        }

        /* Submit Button */
        .register-button {
            width: 100%;
            height: 40px;
            padding: 14px;
            background: #003366;
            color: white;
            font-size: 13px;
            font-weight: 550;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .register-button:hover {
            background: #005599;
        }

        /* Links */
        .extra-links {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 50px;
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

            .register-button {
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

            .register-button {
                font-size: 14px;
            }

            .extra-links {
                font-size: 10px;
            }
        }

         /* Adjust error messages color */
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
        <!-- Left Section: Register Section -->
        <div class="left-section">
            <!-- <img src="{{ asset('/images/logo.jpg') }}" alt="Logo"> -->
            <h1>Register Now!</h1>
            <p>Sign up today to enjoy the benefits of our premium carwash services.</p>
        </div>

        <!-- Right Section: Register Form -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="right-section">
            <h2>Create an Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
<div class="form-group">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="form-group">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Address -->
<div class="form-group">
    <x-input-label for="address" :value="__('Address')" />
    <x-text-input id="address" class="form-control" type="text" name="address" :value="old('address')" required autocomplete="address" />
    <x-input-error :messages="$errors->get('address')" class="mt-2" />
</div>

<!-- Phone -->
<div class="form-group">
    <x-input-label for="phone" :value="__('Phone')" />
    <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" required autocomplete="phone" />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

<!-- Password -->
<div class="form-group password-wrapper">
    <x-input-label for="password" :value="__('Password')" />
    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
    <i class="eye-icon fa fa-eye" onclick="togglePassword('password', this)"></i>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="form-group password-wrapper">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
    <i class="eye-icon fa fa-eye" onclick="togglePassword('password_confirmation', this)"></i>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>


                <button type="submit" class="register-button"> {{ __('Register') }}</button>

                <div class="extra-links">
                    <a href="{{ route('login') }}">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconElement) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = iconElement;

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
