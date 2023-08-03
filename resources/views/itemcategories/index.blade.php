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
                <h2 class="px-4 py-2 text-2xl font-bold">Item Categories List</h2>
                @can('itemcategory-create')
                    <a href="{{ route('itemcategories.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Item Categories</a>
                @endcan
            </div>

            @if ($itemcategories->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($itemcategories as $itemcategory)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
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

        <div class="mt-4">
            {{ $itemcategories->links() }}
        </div>

    </div>
@endsection
