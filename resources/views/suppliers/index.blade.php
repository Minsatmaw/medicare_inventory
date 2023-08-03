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
                <h2 class="text-2xl font-bold">Supplier List</h2>
                @can('supplier-create')
                    <a href="{{ route('suppliers.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create Supplier</a>
                @endcan
            </div>
            @if ($suppliers->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Name</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Slug</th>
                            <th class="px-4 py-2 text-lg text-gray-100 uppercase bg-purple-400 border border-gray-200">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white ">
                        @foreach ($suppliers as $supplier)
                            <tr class="{{ $loop->even ? 'bg-purple-200' : 'bg-purple-100' }}">
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $supplier->name }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">{{ $supplier->slug }}</td>
                                <td class="px-4 py-2 text-center border-b border-gray-200">
                                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-blue-500 hover:underline">View</a>
                                    @can('supplier-create')
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                                    @endcan
                                    @can('supplier-delete')
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="inline">
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
                <p>No suppliers found.</p>
            @endif
        </div>

        <div class="mt-4">
            {{ $suppliers->links() }}
        </div>

    </div>
@endsection
