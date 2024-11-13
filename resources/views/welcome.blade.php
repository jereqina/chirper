<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Applying Times New Roman font globally */
        body {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>
<body class="antialiased bg-gray-900 text-white">

    <!-- Fullscreen Background Image -->
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://laravel.com/assets/img/welcome/background.svg');">
        
        <!-- Top-center Logo -->
        <div class="absolute top-0 left-0 right-0 flex justify-center py-12">
            <img class="h-20 w-20" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>

        <!-- Top-right Login/Register Links -->
        <div class="absolute top-0 right-0 p-6 flex space-x-4 z-10">
            @guest
                <a href="{{ route('login') }}" class="text-lg font-semibold text-white hover:text-indigo-500">Login</a>
                <a href="{{ route('register') }}" class="text-lg font-semibold text-white hover:text-indigo-500">Register</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-white hover:text-indigo-500">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-lg font-semibold text-white hover:text-indigo-500">Logout</a>
            @endauth
        </div>

        <!-- Centered Content (Main Content) -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-4xl font-bold mb-4 text-white">Inventory Management System</h1>
            <p class="text-xl">We're here to meet your needs, quickly and effectively!</p>
        </div>
    </div>

</body>
</html>
