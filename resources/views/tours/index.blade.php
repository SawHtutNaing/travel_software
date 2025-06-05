@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Tours</h1>
    <a href="{{ route('tours.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Tour</a>
    <table class="w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 text-left">Name</th>
                <th class="p-4 text-left">Destination</th>
                <th class="p-4 text-left">Price</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td class="p-4">{{ $tour->name }}</td>
                    <td class="p-4">{{ $tour->destination }}</td>
                    <td class="p-4">${{ number_format($tour->price, 2) }}</td>
                    <td class="p-4">
                        <a href="{{ route('tours.show', $tour) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('tours.edit', $tour) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                        <form action="{{ route('tours.destroy', $tour) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
