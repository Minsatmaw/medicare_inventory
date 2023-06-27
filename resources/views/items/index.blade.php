@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="inline-block min-w-full overflow-hidden align-middle">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Item List</h2>
                @can('item-create')
                    <a href="{{ route('items.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Item</a>
                @endcan
            </div>
            @if ($items->count() > 0)
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Code</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Location</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Stock</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Supplier</th>
                            <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->itemcategory->code }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->itemCategory->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->location->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->stock }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->supplier>name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('items.show', $item->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('item-create')
                                        <a href="{{ route('items.edit', $item->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('item-delete')
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
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
                <p>No items found.</p>
            @endif
        </div>
    </div>
@endsection
