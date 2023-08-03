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
                <h2 class="text-2xl font-bold">Department List</h2>
                @can('department-create')
                    <a href="{{ route('departments.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Department</a>
                @endcan
            </div>
            @if ($departments->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($departments as $department)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $department->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $department->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('departments.show', $department->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('department-create')
                                        <a href="{{ route('departments.edit', $department->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('department-delete')
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
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
                <p>No departments found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $departments->links() }}
        </div>

    </div>
@endsection
