<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class= "dark:bg-DarkPrimary bg-gray-100 flex items-center justify-center min-h-screen w-full ">
        <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-4xl overflow-hidden shadow-[10px_10px_20px_70px_rgba(100,100,100,0.2)] rounded-[40px]">
            <!-- Imagen -->
            <div class="md:w-1/2 w-full relative">
                <img src="{{ asset('images/Imagen Login.png') }}" alt="Image Cover" class="w-full h-full rounded-[40px]">

                <div class=" absolute bottom-3 left-3 bg-secondary p-4 w-3/4 rounded-[40px]">
                    <h1 class="font-poppins font-bold text-[20px]">Control your area</h1>
                    <h2 class="font-poppins font-regular text-[14px]">Find various information regarding your area as well as various things</h2>
                </div>
            </div>
    
            <!-- Formulario -->
            <div class="md:w-1/2 w-full p-8 flex flex-col items-end justify-between text-left">
                <div class="relative bottom-4">
                    <x-application-logo class="w-20 h-20 object-cover" />
                </div>
                <h1 class="text-3xl font-poppins font-bold text-[40px] self-start relative bottom-3">Welcome Back!</h1>
                <h2 class="text-lg font-poppins font-regular mb-6 text-[14px] text-white-100 self-start relative bottom-2">Welcome to the area of ​change</h2>
    
                <div class="w-full">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
    

</html>


{{-- <img src="{{asset('images/Imagen Login.png')}}" alt="Image Cover" class=""> --}}



{{-- w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}