@extends('main.master')

@section('body')
    <div class="py-4">

        @if(session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-green-500 bg-green-300 border">
                {{ session('success') }}
            </div>
        @endif

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
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Description</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Actions</th>
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

        <div class="mt-4">
            {{ $roles->links() }}
        </div>

    </div>
@endsection
