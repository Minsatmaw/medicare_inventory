@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Item Details</h2>
            </div>
            <div class="p-6 bg-white rounded-md shadow-md">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Code:</h3>
                    <p>{{ $item->$itemcategory->code }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Name:</h3>
                    <p>{{ $item->$itemcategory->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Location:</h3>
                    <p>{{ $item->location->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Location:</h3>
                    <p>{{ $item->stock }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Location:</h3>
                    <p>{{ $item->supplier->name }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('itemcategories.index') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
