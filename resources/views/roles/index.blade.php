@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Roles List</h2>
                @can('role-create')
                    <a href="{{ route('roles.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Role</a>
                @endcan
            </div>
            @if ($roles->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Slug</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Description</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($roles as $role)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $role->description }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('roles.show', $role->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('role-create')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
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
                <p>No roles found.</p>
            @endif
        </div>
    </div>
@endsection
