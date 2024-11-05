<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #0a0b0d 0%, #1a1d21 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #00bfff; /* Bluish neon color */
            margin-bottom: 1rem;
            font-size: 1.8rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
        }

        label {
            display: block;
            color: #00bfff;
            margin-bottom: 0.5rem;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            
            width: 100%;
            padding: 0.5rem;
            padding-left: 10px;
            padding-right: 150px;
            margin-bottom: 0.75rem;
            border: none;
            border-radius: 4px;
            background: #15171b;
            color: #e0e0e0;
            transition: background-color 0.3s, box-shadow 0.3s;
            font-size: 0.95rem;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #1f2125;
            box-shadow: 0 0 10px #00bfff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
            background: #00bfff;
            color: #0a0b0d;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
            margin-top: 1rem;
        }

        button:hover {
            background: #0099cc;
            box-shadow: 0 0 15px #00bfff;
        }

        .link {
            color: #00bfff;
            text-decoration: none;
            margin-top: 0.5rem;
            display: inline-block;
            transition: color 0.3s;
            text-align: center;
        }

        .link:hover {
            color: #0099cc;
        }

        .form-section {
            width: 100%; /* Adjusted width to ensure it fits within smaller screens */
            max-width: 500px; /* Increased width to make the form wider */
            padding: 1rem 1rem; /* Adjusted padding for better spacing */
            background: rgba(40, 44, 52, 0.85); /* Dark translucent background */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
            border: 1px solid #00bfff; /* Bluish neon border */
        }

        .flex {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .items-center {
            align-items: center;
        }
        .container {
            width: 150%; /* Adjust this percentage to control the width */
            max-width: 800px; /* Set a max-width to limit how wide it can get */
        }
        .text-gray-700 {
    --tw-text-opacity: 1;
    color: #00bfff;
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
    color: #00bfff;
    z-index: 1; /* Ensure the icon is above the input */
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

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
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
     // Function to toggle visibility for a single password field
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

// Use the same function for both password fields, passing the input ID and icon element



    </script>
    
</x-guest-layout>
