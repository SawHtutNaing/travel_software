@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Announcements</h1>
    <a href="{{ route('announcements.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Announcement</a>
    <table class="w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-4 text-left">Title</th>
                <th class="p-4 text-left">Content</th>
                <th class="p-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
                <tr>
                    <td class="p-4">{{ $announcement->title }}</td>
                    <td class="p-4">{{ Str::limit($announcement->content, 100) }}</td>
                    <td class="p-4">
                        <a href="{{ route('announcements.edit', $announcement) }}" class="text-green-600 hover:underline">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
