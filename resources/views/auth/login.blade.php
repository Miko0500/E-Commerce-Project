<x-guest-layout>
    <style>
        body {
            background: #E37383;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ffffff;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: rgba(40, 44, 52, 0.85);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            border: 1px solid #ff66b2;
        }

        .form-container h1 {
            color: #ff66b2;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .form-container label {
            display: block;
            color: #ff66b2;
            text-align: left;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            background: #20232a;
            color: #ffffff;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            background-color: #282c34;
            box-shadow: 0 0 10px #ff66b2;
            outline: none;
        }

        .form-container input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .form-container button {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            background: #ff66b2;
            color: #20232a;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .form-container button:hover {
            background: #ff3385;
            box-shadow: 0 0 15px #ff3385;
        }

        .form-container .link {
            color: #ff66b2;
            text-decoration: none;
            margin-top: 1rem;
            display: inline-block;
            transition: color 0.3s;
        }

        .form-container .link:hover {
            color: #ff3385;
        }

        .form-container .remember-me {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }
        .link {
    color: blue; /* blue color */
    text-decoration: none; /* remove default underline */
}

.link:hover {
    text-decoration: underline; /* add underline on hover */
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
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
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
</x-guest-layout>
