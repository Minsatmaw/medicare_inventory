@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Roles</h2>
                <a href="{{ route('roles.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Role</a>
            </div>
            @if ($roles->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-200">Name</th>
                            <th class="px-4 py-2 border-b border-gray-200">Slug</th>
                            <th class="px-4 py-2 border-b border-gray-200">Description</th>
                            <th class="px-4 py-2 border-b border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->description }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('roles.show', $role->id) }}" class="text-blue-500 hover:underline">View</a>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No roles found.</p>
            @endif
        </div>
    </div>
@endsection
