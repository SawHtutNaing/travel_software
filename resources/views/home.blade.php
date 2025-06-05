@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gray-100 py-12 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg">Explore the World with Us</h1>
            <p class="text-lg md:text-xl text-white mb-6 drop-shadow-md">Unforgettable adventures await at our premier travel agency</p>
            <a href="#tours" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300">Discover Tours</a>
        </div>
    </section>

    <!-- Announcements Section -->
    @if ($announcements->isNotEmpty())
        <section class="container mx-auto px-4 py-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Latest Announcements</h2>
            <div class="bg-white p-6 rounded-xl shadow-lg">
                @foreach ($announcements as $announcement)
                    <div class="mb-6 last:mb-0">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $announcement->title }}</h3>
                        <p class="text-gray-600 mt-2">{{ $announcement->content }}</p>
                        <p class="text-gray-500 text-sm mt-1">{{ $announcement->created_at->format('M d, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Search Form Section -->
    <section class="container mx-auto px-4 py-12" id="search">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Find Your Perfect Trip</h2>
        <form action="{{ route('search') }}" method="GET" class="bg-white p-8 rounded-xl shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="destination" class="block text-gray-700 font-medium mb-2">Destination</label>
                    <input type="text" name="destination" id="destination" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ request('destination') }}">
                </div>
                <div>
                    <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ request('start_date') }}">
                </div>
                <div>
                    <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ request('end_date') }}">
                </div>
            </div>
            <div class="text-center mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300">Search Trips</button>
            </div>
        </form>
    </section>

    <!-- Tours Section -->
    <section class="container mx-auto px-4 py-12" id="tours">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Featured Tours</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tours as $tour)
                <div class="bg-white rounded-xl shadow-lg p-6 {{ $tour->is_star ? 'border-2 border-yellow-400' : '' }} hover:shadow-xl transition duration-300">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $tour->name }} @if ($tour->is_star) <span class="text-yellow-500">★</span> @endif</h2>
                    @if ($tour->image)
                        <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="https://images.unsplash.com/photo-1508672019048-805c376b7191?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Default Tour" class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif
                    <p class="text-gray-600 mb-4">{{ $tour->description }}</p>
                    <p class="text-blue-600 font-bold mb-2">${{ number_format($tour->price, 2) }}</p>
                    <p class="text-gray-500 mb-1">Destination: {{ $tour->destination }}</p>
                    <p class="text-gray-500 mb-1">From: {{ $tour->start_date }} to {{ $tour->end_date }}</p>
                    <p class="text-gray-500 mb-4">Available Spots: {{ $tour->available_spots }}</p>
                    @auth
                        <a href="{{ route('bookings.create', $tour) }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300">View Details</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300">Login to Book</a>
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

    <!-- About Us Section -->
    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">About Our Travel Agency</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-6">We are passionate about creating unforgettable travel experiences. With years of expertise and a commitment to customer satisfaction, we curate the best tours to destinations around the globe.</p>
            <img src="https://images.unsplash.com/photo-1512100356356-de1b84283e18?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="About Us" class="w-full max-w-3xl mx-auto h-64 object-cover rounded-lg shadow-md">
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="container mx-auto px-4 py-12" id="contact">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Get in Touch</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-6 text-center">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg max-w-2xl mx-auto">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>
            <div class="mt-6">
                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
            <div class="text-center mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 transition duration-300">Send Message</button>
            </div>
        </form>
    </section>
@endsection
