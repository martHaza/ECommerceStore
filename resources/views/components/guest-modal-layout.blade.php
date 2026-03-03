<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mākslas veikals') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="{ showLoginModal: false, activeTab: 'login' }">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left side - Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-gray-800">
                        Mākslas veikals
                    </a>
                </div>

                <!-- Center - Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-gray-900 font-medium">Sākums</a>
                    <a href="/products" class="text-gray-700 hover:text-gray-900 font-medium">Produkti</a>
                    <a href="/cart" class="text-gray-700 hover:text-gray-900 font-medium">Grozs</a>
                </div>

                <!-- Right side - Auth buttons -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Logged in user -->
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-gray-900">
                                Iziet
                            </button>
                        </form>
                    @else
                        <!-- Guest - Show Login button -->
                        <button 
                            @click="showLoginModal = true; activeTab = 'login'"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition"
                        >
                            Ielogoties
                        </button>
                        <button 
                            @click="showLoginModal = true; activeTab = 'register'"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-medium transition"
                        >
                            Reģistrēties
                        </button>
                    @endauth
                </div>
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
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
        @click.self="showLoginModal = false"
    >
        <div class="bg-white rounded-lg shadow-2xl p-8 max-w-md w-full relative">
            
            <!-- Close button -->
            <button 
                @click="showLoginModal = false"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl"
            >
                ✕
            </button>

            <!-- Tabs -->
            <div class="flex border-b mb-6">
                <button 
                    @click="activeTab = 'login'"
                    :class="activeTab === 'login' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                    class="flex-1 py-3 font-semibold text-lg transition"
                >
                    Ielogoties
                </button>
                <button 
                    @click="activeTab = 'register'"
                    :class="activeTab === 'register' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                    class="flex-1 py-3 font-semibold text-lg transition"
                >
                    Reģistrēties
                </button>
            </div>

            <!-- Login Form -->
            <form x-show="activeTab === 'login'" method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="login-email" class="block text-sm font-medium text-gray-700 mb-2">
                        E-pasts
                    </label>
                    <input 
                        id="login-email"
                        type="email" 
                        name="email" 
                        required
                        autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="login-password" class="block text-sm font-medium text-gray-700 mb-2">
                        Parole
                    </label>
                    <input 
                        id="login-password"
                        type="password" 
                        name="password" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Atcerēties mani</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        Aizmirsi paroli?
                    </a>
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition"
                >
                    Ielogoties
                </button>
            </form>

            <!-- Register Form -->
            <form x-show="activeTab === 'register'" method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="mb-4">
                    <label for="register-name" class="block text-sm font-medium text-gray-700 mb-2">
                        Vārds
                    </label>
                    <input 
                        id="register-name"
                        type="text" 
                        name="name" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Surname -->
                <div class="mb-4">
                    <label for="register-surname" class="block text-sm font-medium text-gray-700 mb-2">
                        Uzvārds
                    </label>
                    <input 
                        id="register-surname"
                        type="text" 
                        name="surname" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="register-email" class="block text-sm font-medium text-gray-700 mb-2">
                        E-pasts
                    </label>
                    <input 
                        id="register-email"
                        type="email" 
                        name="email" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="register-password" class="block text-sm font-medium text-gray-700 mb-2">
                        Parole
                    </label>
                    <input 
                        id="register-password"
                        type="password" 
                        name="password" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password-confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Apstiprināt paroli
                    </label>
                    <input 
                        id="password-confirmation"
                        type="password" 
                        name="password_confirmation" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                </div>

                <button 
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition"
                >
                    Reģistrēties
                </button>
            </form>
        </div>
    </div>

    <!-- x-cloak styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

</body>
</html>