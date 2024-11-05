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
                background: linear-gradient(135deg, #0a0b0d, #1a1d21);
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
                background-color: transparent;
                color: #ffffff;
            }

            .shadow-md {
                box-shadow: none;
            }

            .overflow-hidden {
                overflow: hidden;
            }

            .sm\:rounded-lg {
                border-radius: 0;
            }

            .text-gray-500 {
                color: #00ffcc;
            }

            .text-gray-900 {
                color: #00ffcc;
            }

            a:hover .text-gray-500 {
                color: #00bfa5;
            }

            .logo {
                padding-top: 10px;
            }

            .form-content {
                background: rgba(40, 44, 52, 0.85);
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                width: 100%;
                max-width: 500px;
                text-align: center;
                border: 1px solid #00ffcc;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="form-content">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
