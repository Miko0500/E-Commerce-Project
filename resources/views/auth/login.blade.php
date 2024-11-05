<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #0a0b0d 0%, #1a1d21 100%);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
        }

        .form-container {
            max-width: 500px;
            width: 100%;
            padding: 2.5rem;
            background: rgba(30, 34, 40, 0.95);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            border: 1px solid #00bfff;
        }

        .form-container h1 {
            color: #00bfff;
            margin-bottom: 1.5rem;
            font-size: 2.2rem;
        }

        .form-container label {
            display: block;
            color: #00bfff;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.2rem;
            border: none;
            border-radius: 6px;
            background: #15171b;
            color: #ffffff;
            transition: background-color 0.3s, box-shadow 0.3s;
            font-size: 1.1rem;
            position: relative;
        }

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            background-color: #1f2125;
            box-shadow: 0 0 10px #00bfff;
            outline: none;
        }

        .form-container input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .form-container button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 6px;
            background: #00bfff;
            color: #0a0b0d;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .form-container button:hover {
            background: #0099cc;
            box-shadow: 0 0 15px #00bfff;
        }

        .form-container .link {
            color: #00bfff;
            text-decoration: none;
            margin-top: 1rem;
            display: inline-block;
            transition: color 0.3s;
            font-size: 1rem;
        }

        .form-container .link:hover {
            color: #0099cc;
        }

        .form-container .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }

        .flex {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .items-center {
            align-items: center;
        }

        .text-sm {
            font-size: 1rem;
        }

        .text-gray-400 {
            color: #b3b3b3;
        }
        .password-container {
    position: relative;
}

.password-container .eye-icon {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 70%;
    transform: translateY(-50%);
    font-size: 1.2rem;
    color: #00bfff;
    z-index: 1; /* Ensure the icon is above the input */
}

/* Ensure the input styles are consistent */
.form-container input[type="password"] {
   
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
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
           <!-- Password -->
<!-- Password -->
<div class="mt-4 password-container">
    <x-input-label for="password" :value="__('Password')" />
    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="background-color: #1f2125;
            
            padding: 1rem;
            margin-bottom: 1.2rem;
            border: none;
            border-radius: 6px;
            background: #15171b;
            color: #ffffff;
            
            font-size: 1.1rem;
            position: relative;" />

    <i class="eye-icon fa fa-eye" onclick="togglePassword()"></i>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>



            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
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
            
            <div>Don't have an account?
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
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}


    </script>
</x-guest-layout>
