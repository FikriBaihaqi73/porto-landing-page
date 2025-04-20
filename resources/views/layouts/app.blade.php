<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }} - @yield('title', 'Welcome')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- dark mode script-->
        <script>
            if (localStorage.theme === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-300">
    <div class="min-h-screen flex flex-col">
        @include('components.navbar')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('components.footer')
    </div>

       <!-- AOS JS -->
       <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
       <script>
           // Initialize AOS
           document.addEventListener('DOMContentLoaded', function() {
               AOS.init({
                   duration: 800,
                   easing: 'ease-in-out',
                   once: true
               });
           });
       </script>
</body>
</html>
