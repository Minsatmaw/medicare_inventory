@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Item Categories List</h2>
                @can('itemcategory-create')
                    <a href="{{ route('itemcategories.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Item Categories</a>
                @endcan
            </div>
            @if ($itemcategories->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Code</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Slug</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($itemcategories as $itemcategory)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemcategory->code }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemcategory->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemcategory->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('itemcategories.show', $itemcategory->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('itemcategory-create')
                                        <a href="{{ route('itemcategories.edit', $itemcategory->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('itemcategory-delete')
                                        <form action="{{ route('itemcategories.destroy', $itemcategory->id) }}" method="POST" class="inline">
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
                <p>No itemcategories found.</p>
            @endif
        </div>
    </div>
@endsection
