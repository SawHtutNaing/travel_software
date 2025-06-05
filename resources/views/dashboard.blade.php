@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">Total Tours</h2>
            <p class="text-3xl text-blue-600">{{ $totalTours }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">Total Bookings</h2>
            <p class="text-3xl text-blue-600">{{ $totalBookings }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">Total Revenue</h2>
            <p class="text-3xl text-blue-600">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>
    <h2 class="text-2xl font-semibold mt-6 mb-4">Star Packages</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($starTours as $tour)
            <div class="bg-yellow-100 rounded-lg shadow-md p-6 border-2 border-yellow-400">
                <h3 class="text-xl font-semibold">{{ $tour->name }} <span class="text-yellow-500">★</span></h3>
                <p class="text-gray-600">{{ $tour->description }}</p>
                <p class="text-blue-600 font-bold">${{ number_format($tour->price, 2) }}</p>
                <p class="text-gray-500">Available Spots: {{ $tour->available_spots }}</p>
                @if ($tour->image)
                    <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="mt-2 w-full h-48 object-cover rounded">
                @endif
            </div>
        @endforeach
    </div>
    <a href="{{ route('reports.index') }}" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Reports</a>
@endsection
