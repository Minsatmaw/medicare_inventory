@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Users List</h2>
                @can('user-create')
                    <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create User</a>
                @endcan
            </div>

            @if ($users->count() > 0)
                <table class="min-w-full text-left bg-white border shadow-md border-gray-250">
                    <thead>
                        <tr class="bg-gray-100 ">
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Email</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Roles</th>
                            <th class="px-4 py-2 text-white uppercase bg-gray-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr class=" hover:bg-gray-50">
                                {{-- <td class="px-4 py-2 text-center border-b border-gray-200 ">{{ $user->name }}</td> --}}
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <div class="font-medium text-gray-700">{{$user->name}}</div>
                                    <div class="text-gray-400">{{$user->email}}</div>
                                  </td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $user->email }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    @foreach($user->roles as $role)
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full ">{{ $role->slug }}</span>
                                    @endforeach
                                </td>
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
    </div>
@endsection
