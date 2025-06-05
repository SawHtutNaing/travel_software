<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Travel Agency') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">Travel Agency</a>
            <div>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                        <a href="{{ route('tours.index') }}" class="mr-4">Manage Tours</a>
                        <a href="{{ route('reports.index') }}" class="mr-4">Reports</a>
                        <a href="{{ route('announcements.index') }}" class="mr-4">Announcements</a>
                    @endif
                    @if (Auth::user()->role === 'user')
                        <a href="{{ route('bookings.index') }}" class="mr-4">My Bookings</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="mr-4">Profile</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4">Login</a>
                    <a href="{{ route('register') }}" class="mr-4">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
