@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Booking Reports</h1>
    <div class="mb-4">
        <a href="{{ route('reports.export') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Export to CSV</a>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold">Summary</h2>
        <p><strong>Total Bookings:</strong> {{ $totalBookings }}</p>
        <p><strong>Total Revenue:</strong> ${{ number_format($totalRevenue, 2) }}</p>
    </div>
    <h2 class="text-2xl font-semibold mb-4">Bookings by Tour</h2>
    <table class="w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 text-left">Tour Name</th>
                <th class="p-4 text-left">Number of Bookings</th>
                <th class="p-4 text-left">Total Revenue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookingsByTour as $report)
                <tr>
                    <td class="p-4">{{ $report['tour_name'] }}</td>
                    <td class="p-4">{{ $report['booking_count'] }}</td>
                    <td class="p-4">${{ number_format($report['total_revenue'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
