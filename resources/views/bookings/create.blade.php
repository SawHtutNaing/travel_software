@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Book Tour: {{ $tour->name }}</h1>
    <form action="{{ route('bookings.store', $tour) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" id="booking-form">
        @csrf
        <div class="mb-4">
            <label for="booking_date" class="block text-gray-700">Booking Date</label>
            <input type="date" name="booking_date" id="booking_date" class="w-full border rounded p-2 @error('booking_date') border-red-500 @enderror" value="{{ old('booking_date') }}">
            @error('booking_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="persons" class="block text-gray-700">Number of Persons</label>
            <input type="number" name="persons" id="persons" min="1" class="w-full border rounded p-2 @error('persons') border-red-500 @enderror" value="{{ old('persons') }}">
            @error('persons')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Now</button>
    </form>
@endsection
