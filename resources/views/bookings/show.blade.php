@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Booking Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>Tour:</strong> {{ $booking->tour->name }}</p>
        <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
        <p><strong>Persons:</strong> {{ $booking->persons }}</p>
        <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        <a href="{{ route('bookings.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Back to Bookings</a>
    </div>
@endsection
