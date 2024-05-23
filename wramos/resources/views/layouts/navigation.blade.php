<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('index') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link href="#home">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="#services" >
                    {{ __('Services') }}
                </x-nav-link>
                <x-nav-link href="#contact">
                    {{ __('Contact Us') }}
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</nav>
