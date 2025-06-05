@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2 @error('name') border-red-500 @enderror" value="{{ old('name', $user->name) }}">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2 @error('email') border-red-500 @enderror" value="{{ old('email', $user->email) }}">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full border rounded p-2 @error('phone') border-red-500 @enderror" value="{{ old('phone', $user->phone) }}">
            @error('phone')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <input type="text" id="role" class="w-full border rounded p-2 bg-gray-100" value="{{ ucfirst($user->role) }}" readonly>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Profile</button>
    </form>
@endsection
