<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="relative" action="{{ route('login')}}">
        @csrf

        <div class="relative w-full mb-6">
            <input type="email" id="email" class="peer w-full p-3  bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-700 focus:border-blue-200 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 placeholder-transparent" placeholder="" required>
            <img src="{{asset('icons/user.svg')}}" alt="user icon" class="absolute transform -translate-y-1/2 top-1/2 right-4 pr-2 prw-5 h-5  transition-all duration-200 
            peer-focus:opacity-100 peer-focus:brightness-0 peer-focus:invert peer-valid:opacity-100 peer-valid:brightness-0 peer-valid:invert">
            <label for="email" class="peer-placeholder-shown peer-focus absolute left-3 top-3  text-gray-900 text-sm transition-all duration-200 dark:text-white 
                peer-valid:top-1 peer-valid:text-xs peer-valid:text-blue-700 
                peer-focus:top-1 peer-focus:text-xs peer-focus:text-blue-700">
                Email Addres
            </label>
        </div>

        <div class="relative w-full mb-6 mt-4">
            <input type="password" id="password" class="peer w-full p-3  bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-700 focus:border-blue-200 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 placeholder-transparent" placeholder="" required>
            <button type="button" id="togglePassword" class="absolute right-4 top-1/4 transform -translate-y-1/3 transition-all duration-200 
            peer-focus:opacity-100 peer-focus:brightness-0 peer-focus:invert peer-valid:opacity-100 peer-valid:brightness-0 peer-valid:invert">
                <img src="{{ asset('icons/eye-crossed.svg') }}" id="eyeIcon" class="w-5 h-5" 
                data-eye="{{asset('icons/eye.svg')}}"
                data-eye-crossed="{{asset('icons/eye-crossed.svg')}}"
                >
            </button>
            <label for="password" class="peer-placeholder-shown peer-focus absolute left-3 top-3  text-gray-900 text-sm transition-all duration-200 dark:text-white 
                peer-valid:top-1 peer-valid:text-xs peer-valid:text-blue-700 
                peer-focus:top-1 peer-focus:text-xs peer-focus:text-blue-700">
                Password
            </label>
            <h3 class="mt-2 mb-2 text-[20px] flex justify-end">Forgot Password?</h3>
        </div>

        <div class="flex justify-center items-center ms-3">
            <x-buttons.buttonCompanie>
                {{ __('Login') }}
            </x-buttons.buttonCompanie>
        </div>       

    </form>
</x-guest-layout>

