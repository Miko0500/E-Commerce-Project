<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shee Auto Polish & Ceramic Coating') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        body {
            background-image: url('/images/carbg.jpg'); /* Set the background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent tiling */
            font-family: 'Figtree', sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .sm\:justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .pt-6 {
            padding-top: 1.5rem;
        }

        .sm\:pt-0 {
            padding-top: 0;
        }

        .w-full {
            width: 100%;
        }

        .sm\:max-w-md {
            max-width: 28rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .bg-white {
            background-color: rgba(255, 255, 255, 0.9); /* Slight transparency */
            color: #333333;
        }

        .shadow-md {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .sm\:rounded-lg {
            border-radius: 8px;
        }

        .text-gray-500 {
            color: #666666;
        }

        .text-gray-900 {
            color: #333333;
        }

        .text-teal-600 {
            color: #00bfa5;
        }

        a.text-teal-600:hover {
            color: #00796b;
        }

        .logo {
            padding-top: 10px;
        }

        .form-content {
            background: rgba(255, 255, 255, 0.9); /* White with slight opacity for readability */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
            border: 1px solid #e0e0e0;
        }

        /* Link Styling */
        a {
            color: #00bfa5;
            text-decoration: none;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="form-content shadow-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
