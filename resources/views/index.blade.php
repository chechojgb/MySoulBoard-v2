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

        <div class="fixed bottom-4 right-4">
            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
            x-on:click="darkMode = !darkMode"
            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            role="switch" aria-checked="false">
            <span class="sr-only">Dark mode toggle</span>
            <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out">
                <span
                x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
                </span>
                <span
                x-bind:class="darkMode ?  'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    clip-rule="evenodd" />
                </svg>
                </span>
            </span>
            </button>
        </div>

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
