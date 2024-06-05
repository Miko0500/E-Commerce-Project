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
    <div style="color: #ff66b2;" class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div >
            <x-input-label style="color: #ff66b2;" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class=" flex items-center justify-between mt-4">
            <!-- Back Button -->
            <x-primary-button>
    <a style="color: #ff66b2; text-decoration: none;" href="{{ route('login') }}">Back to login</a>
</x-primary-button>

            <!-- Submit Button -->
            <x-primary-button style="color: #ff66b2;">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
