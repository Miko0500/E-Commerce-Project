<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Reset Password</title>
    <style>
        /* Body Styling */
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

        /* Container for the Left and Right Sections */
        .container {
            display: flex;
            width: 85%;
            max-width: 1000px;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            background: #fff;
            overflow: hidden;
            flex-direction: column;
            align-items: center;
        }

        /* Left Section: Futuristic Look */
        .left-section {
            width: 100%;
            background: linear-gradient(135deg, #003366, #0066cc); /* Futuristic blue tones */
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .left-section h1 {
            font-size: 36px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .left-section p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        /* Right Section: Form Container */
        .right-section {
            width: 100%;
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
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Form Inputs Styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #333;
            font-size: 14px;
            margin-bottom: 8px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #1e49a1;
            box-shadow: 0 0 10px rgba(30, 73, 161, 0.4);
        }

        /* Submit Button */
        .login-button {
            background: #1e49a1;
            color: white;
            padding: 14px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-button:hover {
            background: #39a2db;
        }

        /* Links Styling */
        .extra-links2 {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: 20px;
            font-size: 14px;
        }

        .extra-links2 a {
            color: #003366;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .extra-links2 a:hover {
            color: #39a2db;
            text-decoration: underline;
        }

        /* Reset Button Styling */
        .reset-button {
            background: linear-gradient(135deg, #003366, #0066cc); /* Futuristic blue tones */
            color: white;
            font-size: 10px;
            font-weight: 600;
            
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 170px;
            height: 30px;
            text-align: center;
            
        }

        .reset-button:hover {
            background-color: #ff3385; /* Slightly darker pink on hover */
            transform: translateY(-2px); /* Adds subtle lift effect */
        }

        .reset-button:active {
            background-color: #ff1f6e; /* Even darker pink when pressed */
            transform: translateY(0); /* Reset lift effect when pressed */
        }

        .reset-button:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(255, 102, 178, 0.6); /* Soft glow effect on focus */
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .right-section h2 {
                font-size: 24px;
            }

            .form-group input {
                padding: 10px;
                font-size: 14px;
            }

            .login-button {
                font-size: 16px;
            }

            .extra-links {
                font-size: 12px;
            }

            .left-section h1 {
                font-size: 28px;
            }

            .left-section p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .left-section h1 {
                font-size: 22px;
            }

            .form-group input {
                padding: 8px;
                font-size: 12px;
            }

            .login-button {
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

        .mt-3 {
            color: #4CAF50;
            text-align: left;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        .mb-4 {
            color: #4CAF50;
            text-align: left;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section: Welcome Message -->
        <div class="left-section">
            <h1>Reset Now!</h1>
            <p>Having trouble logging in? No worries! Simply enter your email address, and we will send you a link to reset your password. It's quick, easy, and secure!</p>
        </div>

        <!-- Right Section: Reset Password Form -->
        <div class="right-section">
            <h2>Reset Your Password</h2>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Back to Login and Reset Link -->
                <div class="extra-links">
                    
                    <x-primary-button class="reset-button">{{ __('Email Password Reset Link') }}</x-primary-button>
                </div>

                <div class="extra-links2">
                    <a href="{{ route('login') }}">Back to login</a>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
