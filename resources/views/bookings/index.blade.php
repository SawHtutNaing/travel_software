@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">My Booking History</h1>

    <h2 class="text-2xl font-semibold mb-4">Upcoming Bookings</h2>
    <table class="w-full bg-white shadow-md rounded-lg mb-6">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 text-left">Tour</th>
                <th class="p-4 text-left">Booking Date</th>
                <th class="p-4 text-left">Persons</th>
                <th class="p-4 text-left">Total Price</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings->where('booking_date', '>=', now()) as $booking)
                <tr>
                    <td class="p-4">{{ $booking->tour->name }}</td>
                    <td class="p-4">{{ $booking->booking_date }}</td>
                    <td class="p-4">{{ $booking->persons }}</td>
                    <td class="p-4">${{ number_format($booking->total_price, 2) }}</td>
                    <td class="p-4">{{ ucfirst($booking->status) }}</td>
                    <td class="p-4">
                        <a href="{{ route('bookings.show', $booking) }}" class="text-blue-600 hover:underline">View</a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-2xl font-semibold mb-4">Past Bookings</h2>
    <table class="w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 text-left">Tour</th>
                <th class="p-4 text-left">Booking Date</th>
                <th class="p-4 text-left">Persons</th>
                <th class="p-4 text-left">Total Price</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings->where('booking_date', '<', now()) as $booking)
                <tr>
                    <td class="p-4">{{ $booking->tour->name }}</td>
                    <td class="p-4">{{ $booking->booking_date }}</td>
                    <td class="p-4">{{ $booking->persons }}</td>
                    <td class="p-4">${{ number_format($booking->total_price, 2) }}</td>
                    <td class="p-4">{{ ucfirst($booking->status) }}</td>
                    <td class="p-4">
                        <a href="{{ route('bookings.show', $booking) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('reviews.create', $booking->tour) }}" class="text-green-600 hover:underline ml-2">Review</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
