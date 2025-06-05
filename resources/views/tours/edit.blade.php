@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Tour</h1>
    <form action="{{ route('tours.update', $tour) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Tour Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2 @error('name') border-red-500 @enderror" value="{{ old('name', $tour->name) }}">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full border rounded p-2 @error('description') border-red-500 @enderror">{{ old('description', $tour->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" name="price" id="price" step="0.01" class="w-full border rounded p-2 @error('price') border-red-500 @enderror" value="{{ old('price', $tour->price) }}">
            @error('price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="start_date" class="block text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="w-full border rounded p-2 @error('start_date') border-red-500 @enderror" value="{{ old('start_date', $tour->start_date) }}">
            @error('start_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="end_date" class="block text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" class="w-full border rounded p-2 @error('end_date') border-red-500 @enderror" value="{{ old('end_date', $tour->end_date) }}">
            @error('end_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="destination" class="block text-gray-700">Destination</label>
            <input type="text" name="destination" id="destination" class="w-full border rounded p-2 @error('destination') border-red-500 @enderror" value="{{ old('destination', $tour->destination) }}">
            @error('destination')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="available_spots" class="block text-gray-700">Available Spots</label>
            <input type="number" name="available_spots" id="available_spots" class="w-full border rounded p-2 @error('available_spots') border-red-500 @enderror" value="{{ old('available_spots', $tour->available_spots) }}">
            @error('available_spots')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="is_star" class="block text-gray-700">Mark as Star Package</label>
            <input type="checkbox" name="is_star" id="is_star" value="1" {{ old('is_star', $tour->is_star) ? 'checked' : '' }} class="rounded">
            @error('is_star')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Tour Image</label>
            @if ($tour->image)
                <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-32 h-32 object-cover mb-2">
            @endif
            <input type="file" name="image" id="image" class="w-full border rounded p-2 @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Tour</button>
    </form>
@endsection 
