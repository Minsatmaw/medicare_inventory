@extends('main.master')

@section('body')
    <div class="py-4">

        @if(session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-green-500 bg-green-300 border">
                {{ session('success') }}
            </div>
        @endif

        <div class="inline-block min-w-full overflow-hidden align-middle rounded-b-xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Users List</h2>
                @can('user-create')
                    <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create User</a>
                @endcan
            </div>

            @if ($users->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Email</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Roles</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Departments</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                {{-- <td class="px-4 py-2 text-center border-b border-gray-200 ">{{ $user->name }}</td> --}}
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="font-medium text-gray-700">{{$user->name}}</div>
                                    <div class="text-gray-400">{{$user->email}}</div>
                                </td>

                                <td class="px-4 py-2 border-b border-gray-200">{{ $user->email }}</td>

                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    @foreach($user->roles as $role)
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-purple-500 rounded-full">{{ $role->name }}</span>
                                    @endforeach
                                </td>

                                <td class="px-4 py-2 border-b border-gray-200">{{ $user->departments->name }}</td>

                                <td class="px-4 py-2 border-b border-gray-200">
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

        <div class="mt-4">
            {{ $users->links() }}
        </div>

    </div>
@endsection
