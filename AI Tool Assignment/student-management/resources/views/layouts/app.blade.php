<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Student Management System') }}</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">
    <div id="app" class="min-h-screen flex flex-col">
        <!-- Minimal Navbar for guests -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center text-xl font-bold text-blue-600">
                            {{ config('app.name', 'STUDENT MANAGEMENT SYSTEM') }}
                        </a>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        @guest
                            @if (Route::has('login'))
                                <a class="text-gray-600 hover:text-gray-900 font-medium" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 font-medium transition" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 font-medium">Dashboard</a>
                            <a class="text-gray-600 hover:text-gray-900 font-medium" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow py-12">
            @yield('content')
        </main>
    </div>
</body>
</html>
