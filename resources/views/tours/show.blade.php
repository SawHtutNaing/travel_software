@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">{{ $tour->name }} @if ($tour->is_star) <span class="text-yellow-500">★</span> @endif</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        @if ($tour->image)
            <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-full h-64 object-cover rounded mb-4">
        @endif
        <p class="text-gray-600">{{ $tour->description }}</p>
        <p class="text-blue-600 font-bold mt-2">${{ number_format($tour->price, 2) }}</p>
        <p class="text-gray-500">Destination: {{ $tour->destination }}</p>
        <p class="text-gray-500">From: {{ $tour->start_date }} to {{ $tour->end_date }}</p>
        <p class="text-gray-500">Available Spots: {{ $tour->available_spots }}</p>
        @auth
            @if (auth()->user()->role === 'user')
                <a href="{{ route('bookings.create', $tour) }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Now</a>
                @if (\App\Models\Booking::where('user_id', auth()->id())->where('tour_id', $tour->id)->exists())
                    <a href="{{ route('reviews.create', $tour) }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Write Review</a>
                @endif
            @endif
        @else
            <a href="{{ route('login') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login to Book</a>
        @endauth
        <h2 class="text-2xl font-semibold mt-6 mb-4">Reviews</h2>
        @if ($reviews->isEmpty())
            <p class="text-gray-500">No reviews yet.</p>
        @else
            @foreach ($reviews as $review)
                <div class="border-t pt-4 mt-4">
                    <p><strong>{{ $review->user->name }}</strong> rated {{ $review->rating }} stars</p>
                    <p class="text-gray-600">{{ $review->comment }}</p>
                    <p class="text-gray-500 text-sm">{{ $review->created_at->format('M d, Y') }}</p>
                </div>
            @endforeach
        @endif
    </div>
@endsection
