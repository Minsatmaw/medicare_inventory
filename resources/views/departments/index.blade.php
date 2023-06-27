@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
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
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Slug</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($departments as $department)
                            <tr>
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
    </div>
@endsection
