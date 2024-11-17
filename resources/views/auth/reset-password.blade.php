<x-guest-layout>
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

        /* Form Container */
        .form-container {
            max-width: 450px;
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
            padding: 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 10px;
            background: #20232a;
            color: #ffffff;
            font-size: 1rem;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            background-color: #282c34;
            box-shadow: 0 0 10px #ff66b2;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background: #ff66b2;
            color: #20232a;
            font-size: 1.1rem;
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

        /* Success message styling */
        .success-msg {
            color: #66ff66;
            font-size: 1rem;
            margin-top: 10px;
            text-align: center;
        }

        /* Error Messages Styling */
        .mt-2 {
            color: #ff6b6b;
            text-align: left;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 1.5rem;
            }

            .form-container h1 {
                font-size: 1.6rem;
            }

            .form-container input[type="email"],
            .form-container input[type="password"] {
                font-size: 0.9rem;
                padding: 0.8rem;
            }

            .form-container button {
                font-size: 1rem;
                padding: 0.9rem;
            }
        }

    </style>

    <!-- Form Content -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label style="color: #000; text-align: center;" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label style="color: #000; text-align: center;" for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label style="color: #000; text-align: center;" for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Success Message (only visible when successful reset is sent) -->
        @if(session('status'))
            <div class="success-msg">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button style="color: #fff;">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
