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
                <h2 class="text-2xl font-bold">Item List</h2>
                @can('item-create')
                    <a href="{{ route('items.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Item</a>
                @endcan
            </div>
            @if ($items->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Code</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Department</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Category</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Location</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Supplier</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($items as $item)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->code }}</td>

                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->name }}</td>

                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->department->name }}</td>


                                @if ($item->itemcategory_id)
                                    <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->itemcategory->name }}</td>
                                @else
                                    <td class="flex justify-center px-4 py-2 border-b border-gray-200">
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-orange-600 bg-orange-200 rounded-full">No Item Category assigned</span>
                                    </td>
                                @endif

                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->location->name }}</td>


                                @if ($item->supplier_id)
                                    <td class="px-4 py-2 text-center border-b border-gray-200">{{ $item->supplier->name }}</td>
                                @else
                                    <td class="flex justify-center px-4 py-2 border-b border-gray-200">
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">No Supplier assigned</span>
                                    </td>
                                @endif

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

        <div class="mt-4">
            {{ $items->links() }}
        </div>

    </div>
@endsection
