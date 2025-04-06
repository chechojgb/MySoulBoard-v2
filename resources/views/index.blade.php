<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MySoulBoard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
    </head>
    <body 
    x-data="{ darkMode: false }" 
    x-bind:class="{'dark': darkMode === true}" 
    x-init="
      if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
      }
      darkMode = JSON.parse(localStorage.getItem('darkMode'));
      $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    " 
    x-cloak
    class="transition-colors duration-500 antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100"
    >

        <x-dark.buttonChange/>

        <div class="bg-white dark:bg-gray-900 h-screen">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else

                    @endauth
                </div>
            @endif
            <header class="">
                <div class="px-4 mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 lg:h-20">
                        <div class="flex-shrink-0">
                            <a href="#" title="" class="flex items-center text-lg font-semibold transition-colors duration-200 dark:text-white">
                                <img src="{{ asset('images/Soul.svg') }}" class="h-10 w-10 mr-2" alt="">
                                MySoulBoard
                            </a>
                        </div>
                    </div>
                </div>
            </header>
        
            <section class="py-10 sm:py-16 lg:py-24">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                        <div>
                            <h1 class="text-4xl font-bold text-black sm:text-6xl lg:text-7xl dark:text-white">
                                ¡Bienvenido al Control de Agentes!
                                <div class="relative inline-flex">
                                    <span class="absolute inset-x-0 bottom-0 border-b-[30px] border-[#00acc1]"></span>
                                    <h1 class="relative text-4xl font-bold text-black sm:text-6xl lg:text-7xl dark:text-white">MySoulBoard.</h1>
                                </div>
                            </h1>
        
                            <p class="mt-8 text-base text-black sm:text-xl dark:text-gray-300">
                                Tu espacio centralizado para visualizar, monitorear y gestionar la actividad de tus agentes en tiempo real.
                            </p>
        
                            <div class="mt-10 sm:flex sm:items-center sm:space-x-8">
                                <a href="{{ route('login') }}">
                                    <x-buttons.buttonLarge>Ingresa</x-buttons.buttonLarge>
                                </a>     
                            </div>
                        </div>
        
                        <div>
                            <img class="w-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/hero/2/hero-img.png" alt="" />
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </body>
</html>
