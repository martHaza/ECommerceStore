<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Art Store') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="{ showLoginModal: false, activeTab: 'login' }">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Left - Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-emerald-700 font-medium">Home</a>
                    <a href="/products" class="text-gray-700 hover:text-emerald-700 font-medium">Products</a>
                </div>

                <!-- Center - Logo -->
                <div class="flex-1 md:flex-none text-center">
                    <a href="/" class="text-2xl font-bold text-gray-900">
                        Art Store
                    </a>
                </div>

                <!-- Right side - Icons -->
                <div class="flex items-center space-x-6">
                    @auth
                        <!-- Logged in user - Profile dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="text-gray-700 hover:text-emerald-700 flex items-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
            
                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" x-cloak
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 border border-gray-200 z-50">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                    <!-- Guest - Profile icon -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-gray-700 hover:text-emerald-700 flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
            
                        <!-- Dropdown -->
                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 border border-gray-200 z-50">
                            <button @click="showLoginModal = true; activeTab = 'login'; open = false" 
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Login
                            </button>
                            <button @click="showLoginModal = true; activeTab = 'register'; open = false" 
                                    class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Register
                            </button>
                        </div>
                    </div>
                @endauth

                <!-- Cart -->
                <a href="/cart" class="text-gray-700 hover:text-emerald-700 flex items-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Login/Register Modal -->
    <div 
        x-show="showLoginModal" 
        x-cloak
        class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm flex items-center justify-center z-50"
        @click.self="showLoginModal = false"
    >
        <div class="bg-white p-10 max-w-md w-full relative shadow-2xl">
            
            <!-- Close button -->
            <button 
                @click="showLoginModal = false"
                class="absolute top-6 right-6 text-gray-400 hover:text-gray-700 text-3xl font-light leading-none"
            >
                ×
            </button>

            <!-- Tabs -->
            <div class="flex border-b border-gray-200 mb-8">
                <button 
                    @click="activeTab = 'login'"
                    :class="activeTab === 'login' ? 'border-b-2 border-emerald-700 text-emerald-700' : 'text-gray-400'"
                    class="flex-1 pb-4 font-medium text-sm uppercase tracking-wider transition"
                >
                    Sign in
                </button>
                <button 
                    @click="activeTab = 'register'"
                    :class="activeTab === 'register' ? 'border-b-2 border-emerald-700 text-emerald-700' : 'text-gray-400'"
                    class="flex-1 pb-4 font-medium text-sm uppercase tracking-wider transition"
                >
                    Create account
                </button>
            </div>

            <!-- Login Form -->
            <form x-show="activeTab === 'login'" method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div class="mb-4">
                    <input 
                        type="email" 
                        name="email" 
                        required
                        autofocus
                        placeholder="Email"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <input 
                        type="password" 
                        name="password" 
                        required
                        placeholder="Password"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6 text-xs">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-700">
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-emerald-700 hover:text-emerald-800">
                        Forgot Password?
                    </a>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-emerald-700 hover:bg-emerald-600 text-white py-3 font-medium transition uppercase text-sm tracking-wider"
                >
                    Sign in
                </button>

                <p class="text-center mt-6 text-xs text-gray-500">
                    Don't have an account? 
                    <button type="button" @click="activeTab = 'register'" class="text-emerald-700 hover:text-emerald-800">
                        Create account
                    </button>
                </p>
            </form>

            <!-- Register Form -->
            <form x-show="activeTab === 'register'" method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- First Name & Last Name -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input 
                        type="text" 
                        name="name" 
                        required
                        placeholder="First Name"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                    <input 
                        type="text" 
                        name="surname" 
                        required
                        placeholder="Last Name"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <input 
                        type="email" 
                        name="email" 
                        required
                        placeholder="Email"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input 
                        type="password" 
                        name="password" 
                        required
                        placeholder="Create Password"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        required
                        placeholder="Re-Type Password"
                        class="w-full px-0 py-3 border-0 border-b border-gray-300 focus:border-emerald-700 focus:ring-0 text-sm"
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full bg-emerald-700 hover:bg-emerald-600 text-white py-3 font-medium transition uppercase text-sm tracking-wider"
                >
                    Create account
                </button>

                <p class="text-center mt-6 text-xs text-gray-500">
                    Already have an account? 
                    <button type="button" @click="activeTab = 'login'" class="text-emerald-700 hover:text-emerald-800">
                        Sign in
                    </button>
                </p>
            </form>
        </div>
    </div>

    <!-- x-cloak styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

</body>
</html>