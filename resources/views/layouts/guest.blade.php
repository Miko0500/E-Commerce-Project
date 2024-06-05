<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Crochet With Me') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
            body {
                background: linear-gradient(135deg, #ff99cc, #ff66b2);
                font-family: 'Figtree', sans-serif;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
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

            .bg-gray-100 {
                background: rgba(40, 44, 52, 0.85);
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
                background-color: rgba(40, 44, 52, 0.85);
                border: 1px solid #ff66b2;
                border-radius: 15px;
            }

            .shadow-md {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            }

            .overflow-hidden {
                overflow: hidden;
            }

            .sm\:rounded-lg {
                border-radius: 15px;
            }

            .text-gray-500 {
                color: #ff66b2;
            }

            .text-gray-900 {
                color: #ff66b2;
            }

            a:hover .text-gray-500 {
                color: #ff3385;
            }
            .logo
            {
                padding-top: 10px;
            }

        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img class="logo" style="width:120px; height:120px" src="/images/mainlogo1.png" >
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>