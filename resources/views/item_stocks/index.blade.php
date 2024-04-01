@extends('main.master')

@section('body')
    <div class="py-4">

        @if(session('success'))
          <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-green-500 bg-green-300 border">
              {{ session('success') }}
          </div>
        @endif
        @if(session('error'))
          <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="px-3 py-3 mt-2 text-red-500 bg-red-300 border">
              {{ session('error') }}
          </div>
        @endif

        <div>
            <h2 class="px-4 py-2 text-2xl font-bold rounded-md">Item Stock Lists</h2>

            <div class="flex items-center justify-between mb-2">
                @can('item-in-out')
                    <div class="flex items-center justify-between mb-2">
                        <span><a href="{{ route('item_stocks.create') }}"><button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Item In/Out Form</button></a></span>
                    </div>
                @endcan

                <div class="flex items-center justify-center mb-4">
                    <form action="{{ route('item_stock.search') }}" method="GET" class="flex items-center">
                        @csrf
                        <input type="text" name="search" id="search" placeholder="Search" class="px-4 py-2 mr-1 border rounded-lg" value="{{ request()->query('search') }}" />

                        <button type="submit" class="px-4 py-2 font-bold text-white bg-indigo-500 rounded-lg hover:bg-blue-700">Search</button>
                        <button type="button" onclick="document.getElementById('search').value=''; this.form.submit();" class="px-4 py-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Clear</button>
                    </form>
                </div>

                <div class="flex items-center justify-between mb-2">
                    <span><a href="{{ route('item_stock.export') }}"><button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Export</button></a></span>
                </div>
            </div>

        </div>



        <div class="inline-block min-w-full overflow-hidden align-middle rounded-b-xl">

            @if ($itemStocks->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Item</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Item Category</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Department</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Location</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Supplier</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Stock</th>
                            {{-- <th class="px-4 py-2 uppercase border-b border-gray-200 bg-gray-50">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($itemStocks as $itemStock)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemStock->item->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemStock->item->itemcategory->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemStock->item->department->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-purple-500 rounded-full">{{ $itemStock->item->location->name }}</span>
                                </td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemStock->item->supplier->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $itemStock->stock }}</td>

                                {{-- <td class="px-4 py-2 text-center border-b border-gray-200">
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
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Item Record found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $itemStocks->links() }}
        </div>

    </div>




@endsection
