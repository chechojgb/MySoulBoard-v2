<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-data="{ darkMode: false }" 
     x-bind:class="{'dark': darkMode === true}" 
     x-init="
       if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
         localStorage.setItem('darkMode', JSON.stringify(true));
       }
       darkMode = JSON.parse(localStorage.getItem('darkMode'));
       $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
     " 
     x-cloak
     class="transition-colors duration-500 antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
         
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>