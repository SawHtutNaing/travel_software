@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Review Tour: {{ $tour->name }}</h1>
    <form action="{{ route('reviews.store', $tour) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block text-gray-700">Rating (1-5)</label>
            <select name="rating" id="rating" class="w-full border rounded p-2 @error('rating') border-red-500 @enderror">
                <option value="">Select a rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('rating')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="comment" class="block text-gray-700">Comment</label>
            <textarea name="comment" id="comment" class="w-full border rounded p-2 @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
            @error('comment')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit Review</button>
    </form>
@endsection
