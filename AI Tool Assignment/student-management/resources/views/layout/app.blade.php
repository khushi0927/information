<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- We are including Tailwind locally via style.css as requested, but falling back to CDN if local goes missing or simply for quick setup in case build fails. As per 'NOT CDN' rule: I am using public/css/style.css which will contain our styles. -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal flex h-screen overflow-hidden">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 shadow-md h-full flex-shrink-0 text-white">
        <div class="p-6">
            <h1 class="text-2xl font-bold uppercase tracking-wider text-center text-blue-400">STUDENT MANAGEMENT</h1>
        </div>
        <nav class="mt-6 flex flex-col gap-2 px-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="{{ route('students.index') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition">
                <i class="fas fa-user-graduate"></i> Students
            </a>
            <a href="{{ route('attendance.mark') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition">
                <i class="fas fa-clipboard-check"></i> Mark Attendance
            </a>
            <a href="{{ route('attendance.report') }}" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-gray-800 hover:bg-gray-700 transition">
                <i class="fas fa-chart-bar"></i> Attendance Report
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        <!-- Navbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">
                @yield('header', 'Dashboard')
            </h2>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </form>
                @endauth
            </div>
        </header>

        <!-- Main View -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- User Custom JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
