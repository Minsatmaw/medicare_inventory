@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Users</h2>
                @can('user-create')
                    <a href="{{ route('users.create') }}" class="px-4 py-2 text-black bg-blue-500 rounded ">Create User</a>
                @endcan
            </div>

            @if ($users->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-200">Name</th>
                            <th class="px-4 py-2 border-b border-gray-200">Email</th>
                            <th class="px-4 py-2 border-b border-gray-200">Roles</th>
                            <th class="px-4 py-2 border-b border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200 ">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    @foreach($user->roles as $role)
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $role->slug }}</span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:underline">View</a>
                                  @can('user-edit')
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                  @endcan
                                  @can('user-delete')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                  @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No users found.</p>
            @endif
        </div>
    </div>
@endsection
