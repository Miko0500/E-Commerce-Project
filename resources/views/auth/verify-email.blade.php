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
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button style="color: #ff66b2;">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button style="color: #ff66b2;" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
